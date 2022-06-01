<?php

/*
	%%(Formatter
		wrapper="box"
		[wrapper_align="left | center | right"]
		[wrapper_width="pixel"]
		[wrapper_title="Title"]
		[wrapper_type="default | error | example | important | note | question | quote | success | warning"]
		[col=2|3|4|5]
		[clear])
	content
	%%
*/

$align_class	= '';
$type_class		= '';
$types			= ['default', 'error', 'example', 'important', 'note', 'question', 'quote', 'success', 'warning'];

if (!isset($options['wrapper_type']))	$options['wrapper_type']	= 'default';
if (!isset($options['wrapper_title']))	$options['wrapper_title']	= null;
if (!isset($options['wrapper_align']))	$options['wrapper_align']	= 'right';
if (!isset($options['wrapper_width']))	$options['wrapper_width']	= 250;
if (!isset($options['clear']))			$options['clear']			= false;
if (!isset($options['col']))			$options['col']				= false;

if (in_array($options['wrapper_align'], ['center', 'left', 'right']))
{
	// wrapper-* align in wacko.css
	$align_class = ' wrapper-' . $options['wrapper_align'];
}

if (in_array($options['wrapper_type'], $types))
{
	// wrapper type-* in wacko.css
	$type_class = ' type-' . $options['wrapper_type'];
}

$col_class	= $options['col'] ? ' wrapper-col' . (int) $options['col'] : '';
$title		= $options['wrapper_title'] ?? null;

// output wrapper
echo	'<ignore><aside class="wrapper' . $type_class . $align_class . $col_class . '" style="width: ' . (int) $options['wrapper_width'] . 'px;">' . "\n" .
			($title
				? '<p class="wrapper-title">' . Ut::html($title) . '</p>' . "\n"
				: '') .
			'<div class="wrapper-content">' . "\n" .
				$text.
			"</div>\n" .
		"</aside></ignore>\n";

if ($options['clear'])
{
	echo '<span class="clearfix"></span>';
}
