<?php

if (!defined('IN_WACKO'))
{
	exit;
}

/*
	{{anchor
		[href="anchor"]
		[text="Index"]
		[title="Title"]
	}}
*/

if (!isset($name))		$name	= ''; // depreciated, legacy support
if ($name)				$href	= $name;

if (!isset($text))	$text = '';
if (!isset($title))	$title = '';

// Param name
if (isset($href))
{
	$text		= str_replace('~', $href, $text);

	$tpl->href	= $href;
	$tpl->text	= $text;
	$tpl->title	= $title;
}
