<?php

if (!defined('IN_WACKO'))
{
	exit;
}

// Action parameters:
// id=[id]			Only show given survey voting form.
//					Default: null
// results=[1|0]	Return poll results instead of voting form.
//					Default: 0
// align=['h'|'v']	Orientation of surveys table: horizontal
//					or vertical.
//					Default: 'h'

$align		= '';
$results	= '';
$vote		= '';

// create polls object
$polls_obj = new Polls($this);

// processing input
if (isset($_POST['vote']) && isset($_POST['poll']))
{
	$header	= $polls_obj->get_poll_title((int) $_POST['poll']);

	if ($header['start'] && !$header['end'] && !$polls_obj->poll_is_voted($header['poll_id']))
	{
		if ($header['plural'] == 1)
		{
			// making plural ballot
			foreach ($_POST as $key => $value)
			{
				if (preg_match('/^[0-9]{1,2}$/', $key) && $value === '1') $ballot[] = (int) $key;
			}
		}
		else
		{
			// making singular ballot
			$ballot = (int) $_POST['id'];
		}

		// checking ballot: we need at least one vote
		if ($ballot && count($ballot) > 0)
		{
			// putting ballot into the ballot-box
			$polls_obj->vote_poll($header['poll_id'], $ballot);
			$polls_obj->set_poll_cookie($header['poll_id']);
			$vote = $header['poll_id'];

			// update cache
			$this->set_message($this->_t('PollsDone'));
			$this->http->invalidate_page($this->tag);
		}
	}
	else if ($polls_obj->poll_is_voted($header['poll_id']))
	{
		$vote = $header['poll_id'];
		$this->set_message($this->_t('PollsAlreadyVoted'));
		$this->http->invalidate_page($this->tag);
	}
	else if ($header['start'] && $header['end'])
	{
		$vote = $header['poll_id'];
		$this->set_message($this->_t('PollsAlreadyEnded'));
		$this->http->invalidate_page($this->tag);
	}
	else
	{
		$vote = $header['poll_id'];
	}
}
else if (isset($_POST['results']) && isset($_POST['poll']))
{
	$vote		= (int) $_POST['poll'];
	$results	= 1;
}

// print survey forms/results
if (isset($id))
{
	$header	= $polls_obj->get_poll_title($id);

	if ($results == 1 || $polls_obj->poll_is_voted($id) || $header['end'])
	{
		echo $polls_obj->show_poll_results($id);
	}
	else
	{
		echo $polls_obj->show_poll_vote($id);
	}
}
else
{
	if ($align != 'v') $align = 'h';

	if ($polls = $polls_obj->get_polls_list('active'))
	{
		echo '<table>';
		echo ($align == 'h' ? '<tr>' : '');

		foreach ($polls as $poll)
		{
			echo ($align == 'v' ? '<tr>' : '') . '<td>';

			if ($results == 1 || $vote == $poll['poll_id'] || $polls_obj->poll_is_voted($poll['poll_id']))
			{
				echo $polls_obj->show_poll_results($poll['poll_id']);
			}
			else
			{
				echo $polls_obj->show_poll_vote($poll['poll_id']);
			}

			echo '</td>' . ($align == 'v' ? '</tr>' : '');
		}

		echo ($align == 'h' ? '</tr>' : '');
		echo '</table>';
	}
	else
	{
		echo '<table class="formation"><tr><td><em>';
		echo $this->_t('PollsNone');
		echo '</em></td></tr></table>';
	}
}

// destroy polls object
unset($polls_obj);

