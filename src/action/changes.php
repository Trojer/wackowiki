<?php

if (!defined('IN_WACKO'))
{
	exit;
}

if (!isset($page))		$page = '';
if (!isset($date))		$date = $_GET['date'] ?? '';
if (!isset($hide_minor_edit)) $hide_minor_edit = (int) ($_GET['minor_edit'] ?? 0);
if (!isset($noxml))		$noxml = 0;
if (!isset($title))		$title = 0;
if (!isset($max))		$max = null;

$tag	= $this->unwrap_link($page);
$user	= $this->get_user();

// check and validate YYYY-MM-DD date
$is_valid_date = function($date)
{
	return preg_match("/^(\d{4})-(\d{1,2})-(\d{1,2})$/", $date, $m)
		? checkdate(intval($m[2]), intval($m[3]), intval($m[1]))
		: false;
};

if ($date && !$is_valid_date($date))
{
	$date = '';
}

// process 'mark read' - reset session time
if (isset($_GET['markread']) && $user)
{
	$this->update_last_mark($user);
	$this->set_user_setting('last_mark', date('Y-m-d H:i:s'));
}

if ([$pages, $pagination] = $this->load_changed($max, $tag, $date, $hide_minor_edit))
{
	if ($user)
	{
		$tpl->mark_href = $this->href('', '', ['markread' => 1]);
	}

	if (!$tag && !(int) $noxml)
	{
		$tpl->xml_href = $this->db->base_path . XML_DIR . '/changes_' . preg_replace('/[^a-zA-Z0-9]/', '', mb_strtolower($this->db->site_name)) . '.xml';
	}

	$tpl->pagination_text = $pagination['text'];

	$curday = '';

	$tpl->enter('page_');

	foreach ($pages as $page)
	{
		if (!$this->db->hide_locked || $this->has_access('read', $page['page_id']))
		{
			$this->sql2datetime($page['modified'], $day, $time);

			if ($day != $curday)
			{
				$tpl->day = $curday = $day;
			}

			$this->page_id_cache[$page['tag']] = $page['page_id'];

			// page_size change
			$size_delta = $page['page_size'] - $page['parent_size'];

			// print entry
			$tpl->l_revisions =
				(!$this->hide_revisions
					? $this->compose_link_to_page($page['tag'], 'revisions', $time, $this->_t('RevisionTip')) . ' '
					: $time
				);
			$tpl->l_page =
				($title == 1
					? $this->link('/' . $page['tag'], '', $page['title'], '', 0, 1, 0)
					: $this->link('/' . $page['tag'], '', $page['tag'], $page['title'], 0, 1, 0)
				);

			$tpl->l_user = $this->user_link($page['user_name'], true, false);

			if (isset($user['last_mark']) && $user['last_mark']
				&& $page['user_name'] != $user['user_name']
				&& $page['modified'] > $user['last_mark'])
			{
				$tpl->l_viewed = ' class="viewed"';
			}

			// review
			if ($this->db->review && $this->is_reviewer() && !$page['reviewed'])
			{
				$tpl->l_review_href = $this->compose_link_to_page($page['tag'], 'revisions', $this->_t('Review'));
			}

			if ($page['edit_note'])
			{
				$tpl->l_edit_note = $page['edit_note'];
			}

			# $tpl->l_delta =  $this->delta_formatted($size_delta); // TODO: looks odd here
		}
	}

	$tpl->leave(); // page_
}
else
{
	$tpl->nopages = true;
}
