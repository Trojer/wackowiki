<?php

if (!defined('IN_WACKO'))
{
	exit;
}

$text = $this->format($text, 'wacko');

// by default links and actions are parsed dynamically via show handler
if (isset($options['post_wacko']))
{
	$options['strip_ignore'] = true;

	// parsing links and actions
	include Ut::join_path(FORMATTER_DIR, 'post_wacko.php');
}
else
{
	echo $text;
}
