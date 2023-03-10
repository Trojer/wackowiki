<?php

if (!defined('IN_WACKO'))
{
	exit;
}

/*
	{{upload
		[global=1]
		[maxsize=200]
		[hide_description=1]
	}}
*/

if (!isset($global))			$global = '';
if (!isset($maxsize))			$maxsize = '';
if (!isset($hide_description))	$hide_description = '';

if ($global) $global = 'global';

// functions
$accept_types = function($types)
{
	$accept_types = array_map('trim', explode(',', $types));

	foreach($accept_types as $type)
	{
		if ($this->validate_extension($type))
		{
			$result[] = '.' . $type;
		}
	}

	return implode(',', $result);
};

// check who u are, can u upload?
if ($this->can_upload(true))
{
	if ($maxsize)
	{
		$tpl->u_s_maxsize = floor(1 * $maxsize);
	}

	// if you have no write access and you are not admin, you can upload only "global" file
	if (!(	$this->has_access('read')
		 && $this->has_access('write')
		 && $this->has_access('upload'))
		 && !$this->is_admin())
	{
		$global = 'global';
	}

	$maxfilesize	= $this->get_max_upload_size();
	$allowed_types	= $this->db->upload_allowed_exts ?? '';

	if ($maxsize && ($maxfilesize > 1 * $maxsize))
	{
		$maxfilesize = 1 * $maxsize;
	}

	$tpl->u_maxfilesize = $maxfilesize;

	if ($this->db->upload_images_only && !$this->is_admin())
	{
		$allowed_types = implode(', ' , self::EXT['bitmap']);
	}

	if ($allowed_types)
	{
		// adds 'accept' attribute depending on config settings
		// https://www.w3.org/TR/html5/forms.html#attr-input-accept
		$tpl->u_accecpt = 'accept="' . $accept_types($allowed_types) . '"';
		$tpl->u_allowed = Ut::perc_replace($this->_t('PermittedFiletype'), $allowed_types);
	}

	$tpl->u_size = $this->binary_multiples($maxfilesize, false, true, true);

	if ($global)
	{
		$tpl->u_global = true;
	}
	else
	{
		$tpl->u_local = true;
	}

	if (!$hide_description)
	{
		$tpl->u_desc = true;
	}
}
else
{
	$message		= '<em>' . $this->_t('UploadForbidden') . '</em>';
	$tpl->message	= $this->show_message($message, 'note', false);
}
