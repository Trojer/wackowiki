<?php

if (!defined('IN_WACKO'))
{
	exit;
}

/*
	Flash Action

	The first five arguments here are required.  The rest are optional.

	{{flash
	[url="file:the_movie.swf"]
	[width="100"]
	[height="100"]

	// Params
	play
	loop
	menu
	quality

	}}
*/
if (!isset($play)) $play = '';
if (!isset($loop)) $loop = '';
if (!isset($menu)) $menu = '';
if (!isset($quality)) $quality = '';
if (!isset($bgcolor)) $bgcolor = '';

if (!isset($allowfullscreen)) $allowfullscreen = '';


if (!isset($url)) $url = '';
if (!isset($width)) $width = '';
if (!isset($height)) $height = '';
if (!isset($name)) $name = '';


if (!isset($styleclass)) $styleclass = '';
if (!isset($align)) $align = '';

if (!$url) $url = isset($vars['url']) ? $vars['url'] : '';
$url = htmlspecialchars($url, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET);

if(!$width)		$width	= 550;
if(!$height)	$height	= 100;

if (!$url)
{
	echo '<p><em>'.$this->get_translation('FlashNoURL')."</em></p>\n";
}
else if($url)
{
	#echo '<video width="'.$width.'" height="'.$height.'" src="'.$url.'" controls>';
	echo '<embed src="'.$url.'" width="'.$width.'" height="'.$height.'" >';
	#echo "</video>\n";

}

?>