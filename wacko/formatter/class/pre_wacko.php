<?php

/**
 * Preformat text before when saving page: resolves macros and some more
 */

class PreFormatter
{
	var $object;

	function __construct(&$object)
	{
		$this->object		= &$object;
		$this->PREREGEXP	= '/(\%\%.*?\%\%|\"\".*?\"\"|::(\S)?::)/usm';
	}

	function precallback($things)
	{
		$wacko = &$this->object;

		$thing = $things[1];

		if (preg_match('/^\%\%(.*)\%\%$/us', $thing, $matches))
		{
			return '%%' . $matches[1] . '%%';
		}
		else if (preg_match('/^\"\"(.*)\"\"$/us', $thing, $matches))
		{
			return '""' . $matches[1] . '""';
		}
		else if ($thing == ':::::')
		{
			return '((user:' . $wacko->get_user_name() . ' ' . $wacko->get_user_name() . ')):';
		}
		else if ($thing == '::::')
		{
			return '((user:' . $wacko->get_user_name() . ' ' . $wacko->get_user_name() . '))';
		}
		else if ($thing == '::@::')
		{
			return sprintf($wacko->db->name_date_macro, '((user:' . $wacko->get_user_name() . ' ' . $wacko->get_user_name() . '))', date($wacko->db->date_format . ' ' . $wacko->db->time_format));
		}
		else if ($thing == '::+::')
		{
			return date($wacko->db->date_format . ' ' . $wacko->db->time_format);
		}

		return $thing;
	}
}
