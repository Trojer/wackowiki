<?php
/*
* WackoFormatter.
*
* Formats text with wacko-formatting.
* Links and actions aren't processed. Its processed by PostWacko formatter
*/

class WackoFormatter
{
	var $object;
	var $page_id;
	var $table_scope;
	var $old_indent_level	= 0;
	var $indent_closers		= [];
	var $tdold_indent_level	= 0;
	var $auto_fn			= [];
	var $tdindent_closers	= [];
	var $br					= 1;
	var $intable			= 0;
	var $intablebr			= 0;
	var $cols				= 0;
	var $colors				= [
								'blue' => 'blue',
								'green' => 'green',
								'red' => 'red',
								'yellow' => 'yellow',
								];
	var $x11_colors			= [
								'aliceblue' => 'aliceblue',
								'antiquewhite' => 'antiquewhite',
								'aqua' => 'aqua',
								'aquamarine' => 'aquamarine',
								'azure' => 'azure',
								'beige' => 'beige',
								'bisque' => 'bisque',
								'black' => 'black',
								'blanchedalmond' => 'blanchedalmond',
								'blue' => 'blue',
								'blueviolet' => 'blueviolet',
								'brown' => 'brown',
								'burlywood' => 'burlywood',
								'cadetblue' => 'cadetblue',
								'chartreuse' => 'chartreuse',
								'chocolate' => 'chocolate',
								'coral' => 'coral',
								'cornflowerblue' => 'cornflowerblue',
								'cornsilk' => 'cornsilk',
								'crimson' => 'crimson',
								'cyan' => 'cyan',
								'darkblue' => 'darkblue',
								'darkcyan' => 'darkcyan',
								'darkgoldenrod' => 'darkgoldenrod',
								'darkgray' => 'darkgray',
								'darkgreen' => 'darkgreen',
								'darkkhaki' => 'darkkhaki',
								'darkmagenta' => 'darkmagenta',
								'darkolivegreen' => 'darkolivegreen',
								'darkorange' => 'darkorange',
								'darkorchid' => 'darkorchid',
								'darkred' => 'darkred',
								'darksalmon' => 'darksalmon',
								'darkseagreen' => 'darkseagreen',
								'darkslateblue' => 'darkslateblue',
								'darkslategray' => 'darkslategray',
								'darkturquoise' => 'darkturquoise',
								'darkviolet' => 'darkviolet',
								'deeppink' => 'deeppink',
								'deepskyblue' => 'deepskyblue',
								'dimgray' => 'dimgray',
								'dodgerblue' => 'dodgerblue',
								'firebrick' => 'firebrick',
								'floralwhite' => 'floralwhite',
								'forestgreen' => 'forestgreen',
								'fuchsia' => 'fuchsia',
								'gainsboro' => 'gainsboro',
								'ghostwhite' => 'ghostwhite',
								'gold' => 'gold',
								'goldenrod' => 'goldenrod',
								'gray' => 'gray',
								'green' => 'green',
								'greenyellow' => 'greenyellow',
								'honeydew' => 'honeydew',
								'hotpink' => 'hotpink',
								'indianred' => 'indianred',
								'indigo' => 'indigo',
								'ivory' => 'ivory',
								'khaki' => 'khaki',
								'lavender' => 'lavender',
								'lavenderblush' => 'lavenderblush',
								'lawngreen' => 'lawngreen',
								'lemonchiffon' => 'lemonchiffon',
								'lightblue' => 'lightblue',
								'lightcoral' => 'lightcoral',
								'lightcyan' => 'lightcyan',
								'lightgoldenrodyellow' => 'lightgoldenrodyellow',
								'lightgreen' => 'lightgreen',
								'lightgrey' => 'lightgrey',
								'lightpink' => 'lightpink',
								'lightsalmon' => 'lightsalmon',
								'lightseagreen' => 'lightseagreen',
								'lightskyblue' => 'lightskyblue',
								'lightslategray' => 'lightslategray',
								'lightsteelblue' => 'lightsteelblue',
								'lightyellow' => 'lightyellow',
								'lime' => 'lime',
								'limegreen' => 'limegreen',
								'linen' => 'linen',
								'magenta' => 'magenta',
								'maroon' => 'maroon',
								'mediumaquamarine' => 'mediumaquamarine',
								'mediumblue' => 'mediumblue',
								'mediumorchid' => 'mediumorchid',
								'mediumpurple' => 'mediumpurple',
								'mediumseagreen' => 'mediumseagreen',
								'mediumslateblue' => 'mediumslateblue',
								'mediumspringgreen' => 'mediumspringgreen',
								'mediumturquoise' => 'mediumturquoise',
								'mediumvioletred' => 'mediumvioletred',
								'midnightblue' => 'midnightblue',
								'mintcream' => 'mintcream',
								'mistyrose' => 'mistyrose',
								'moccasin' => 'moccasin',
								'navajowhite' => 'navajowhite',
								'navy' => 'navy',
								'oldlace' => 'oldlace',
								'olive' => 'olive',
								'olivedrab' => 'olivedrab',
								'orange' => 'orange',
								'orangered' => 'orangered',
								'orchid' => 'orchid',
								'palegoldenrod' => 'palegoldenrod',
								'palegreen' => 'palegreen',
								'paleturquoise' => 'paleturquoise',
								'palevioletred' => 'palevioletred',
								'papayawhip' => 'papayawhip',
								'peachpuff' => 'peachpuff',
								'peru' => 'peru',
								'pink' => 'pink',
								'plum' => 'plum',
								'powderblue' => 'powderblue',
								'purple' => 'purple',
								'red' => 'red',
								'rosybrown' => 'rosybrown',
								'royalblue' => 'royalblue',
								'saddlebrown' => 'saddlebrown',
								'salmon' => 'salmon',
								'sandybrown' => 'sandybrown',
								'seagreen' => 'seagreen',
								'seashell' => 'seashell',
								'sienna' => 'sienna',
								'silver' => 'silver',
								'skyblue' => 'skyblue',
								'slateblue' => 'slateblue',
								'slategray' => 'slategray',
								'snow' => 'snow',
								'springgreen' => 'springgreen',
								'steelblue' => 'steelblue',
								'tan' => 'tan',
								'teal' => 'teal',
								'thistle' => 'thistle',
								'tomato' => 'tomato',
								'turquoise' => 'turquoise',
								'violet' => 'violet',
								'wheat' => 'wheat',
								'white' => 'white',
								'whitesmoke' => 'whitesmoke',
								'yellow' => 'yellow',
								'yellowgreen' => 'yellowgreen',
								];

	function __construct( &$object )
	{
		$this->object = &$object;

		$this->LONGREGEXP =
			'/(' .
			// escaped text
			"<!--escaped-->.*?<!--escaped-->|" .
			// escaped html <#...#>
			($this->object->db->allow_rawhtml == 1
				? '\<\#.*?\#\>|'
				: '') .
			// html comments
			#"<!--.*-->|" .
			//? (?...?)
			"\(\?(\S+?)([ \t]+([^\n]+?))?\?\)|" .
			// bracket links [[tag description]] or ((tag description))
			($this->object->db->disable_bracketslinks == 1
				? ''
				: "\[\[(\S+?)([ \t]+([^\n]+?))?\]\]|" .
				  "\(\((\S+?)([ \t]+([^\n]+?))?\)\)|" .
				  "\[\*\[(\S+?)([ \t]+(file:[^\n]+?))?\]\*\]|" .
				  "\(\*\((\S+?)([ \t]+(file:[^\n]+?))?\)\*\)|") .
			// ?
			"\n[ \t]*>+[^\n]*|" .
			// cite text <[...]>
			"<\[.*?\]>|" .
			// small text ++...++
			"\+\+\S\+\+|" .
			"\+\+(\S[^\n]*?\S)\+\+|" .
			// link ...://... or [mailto|xmpp]:...@...
			"\b[[:alpha:]]+:\/\/\S+|(mailto|xmpp)\:[[:alnum:]\-\_\.]+\@[[:alnum:]\-\_\.]+|" .
			// highlighting  ??...??
			"\?\?\S\?\?|" .
			"\?\?(\S.*?\S)\?\?|" .
			// \\\\...
			"\\\\\\\\[" . $object->language['ALPHANUM_P'] . "\-\_\\\!\.]+|" .
			// **...**
			"\*\*[^\n]*?\*\*|" .
			// ##...##
			"\#\#[^\n]*?\#\#|" .
			// ¹¹...¹¹
			"\¹\¹[^\n]*?\¹\¹|" .
			// ''...'''
			"\'\'.*?\'\'|" .
			// !!...!!
			"\!\!\S\!\!|" .
			"\!\!(\S.*?\S)\!\!|" .
			// __...__
			"__[^\n]*?__|" .
			// upper and lower indexes ^^...^^ and vv...vv
			"\^\^\S*?\^\^|" .
			"vv\S*?vv|" .
			// deleted text for diff
			// inserted text for diff
			"<!--markup:1:begin-->\S<!--markup:1:end-->|" .
			"<!--markup:2:begin-->\S<!--markup:2:end-->|" .
			"<!--markup:1:begin-->(\S.*?\S)<!--markup:1:end-->|" .
			"<!--markup:2:begin-->(\S.*?\S)<!--markup:2:end-->|" .
			// tables #|| #| ||...|| ||# |#
			"\#\|\||" .
			"\#\||" .
			"\|\|\#|" .
			"\|\#|" .
			"\|\|.*?\|\||" .
			"\*\|.*?\|\*|" .
			// symbols < or >
			"<|>|" .
			// italic //...//
			"\/\/[^\n]*?(?<!http:|https:|ftp:|file:|nntp:)\/\/|" .
			// headers
			"\n[ \t]*=======.*?={2,7}|" .
			"\n[ \t]*======.*?={2,7}|" .
			"\n[ \t]*=====.*?={2,7}|" .
			"\n[ \t]*====.*?={2,7}|" .
			"\n[ \t]*===.*?={2,7}|" .
			"\n[ \t]*==.*?={2,7}|" .
			// separator
			"[-]{4,}|" .
			// line break
			"---\n?\s*|" .
			// strikethrough
			"--\S--|" .
			"--(\S.*?[^- \t\n\r])--|" .
			// list including multilevel
			"\n(\t+|([ ]{2})+)(-|\*|([a-zA-Z]|([0-9]{1,3}))[\.\)](\#[0-9]{1,3})?)?|" .
			// media links
			"file:((\.\.|!)?\/)?[\p{L}\p{Nd}][\p{L}\p{Nd}\/\-\_\.]+\.(mp4|ogv|webm|m4a|mp3|ogg|opus|gif|jp(?:eg|e|g)|png|svg|webp)(\?[[:alnum:]\&]+)?|" .
			// interwiki links
			"\b[[:alnum:]]+[:][" . $object->language['ALPHANUM_P'] . "\!\.][" . $object->language['ALPHANUM_P'] . "\(\)\-\_\.\+\&\=\#]+|" .
			// disabled WikiNames
			"~([^ \t\n]+)|" .
			// wiki links (beside actions)
			($this->object->db->disable_wikilinks
				? ''
				: "(~?)(?<=[^\." . $object->language['ALPHANUM_P'] . "]|^)(((\.\.|!)?\/)?" . $object->language['UPPER'] . $object->language['LOWER'] . "+" . $object->language['UPPERNUM'] . $object->language['ALPHANUM'] . "*)\b|") .
				# "(~?)(?<=[^\.[[:alpha:]][[:digit:]]\_\-\/]|^)(((\.\.|!)?\/)?[[:upper:][:lower:]\/]+[[:upper:][:digit:]][[:alpha:][:digit:]\_\-\/]*)\b|") .
			"\n)/usm";

		$this->NOTLONGREGEXP =
			"/(" . ($this->object->db->disable_formatters
				? ''
				: "\%\%.*?\%\%|") .
			"~([^ \t\n]+)|" .
			"\"\".*?\"\"|" .
			"\{\{[^\n]*?\}\}|" .
			"<!--escaped-->.*?<!--escaped-->" .
			")/usm";

		$this->MOREREGEXP =
			"/(>>.*?<<|" .
			"~([^ \t\n]+)|" .
			"<!--escaped-->.*?<!--escaped-->" .
			")/usm";
	}

	function indent_close()
	{
		$result = '';

		if ($this->intable)
		{
			$closers = &$this->tdindent_closers;
		}
		else
		{
			$closers = &$this->indent_closers;
		}

		$c = count($closers);

		for ($i = 0; $i < $c; $i++)
		{
			$result .= array_pop($closers);
		}

		if ($this->intable)
		{
			$this->tdold_indent_level	= 0;
		}
		else
		{
			$this->old_indent_level		= 0;
		}

		return $result;
	}

	function wacko_preprocess($things)
	{
		$formatter	= '';
		$output		= '';
		$thing		= $things[1];
		$wacko		= &$this->object;
		$callback	= [&$this, 'wacko_preprocess'];

		if (!empty($thing[0]) && $thing[0] == '~')
		{
			if ($thing[1] == '~')
			{
				return '~~' . $this->wacko_preprocess([0, mb_substr($thing, 2)]);
			}
		}

		// escaped text
		if (preg_match('/^<!--escaped-->(.*)<!--escaped-->$/us', $thing, $matches))
		{
			return $matches[1];
		}
		// escaped text
		else if (preg_match('/^\"\"(.*)\"\"$/us', $thing, $matches))
		{
			return '<!--escaped--><!--notypo-->' . str_replace("\n", '<br>', Ut::html($matches[1])) . '<!--/notypo--><!--escaped-->';
		}
		// code text
		else if (preg_match('/^\%\%(.*)\%\%$/us', $thing, $matches))
		{
			// check if a formatter has been specified
			$code = $matches[1];

			if (preg_match('/^\(([^\n]+?)\)(.*)$/us', $code, $matches))
			{
				$code = $matches[2];

				if ($matches[1])
				{
					// check for formatter parameters
					$sep = mb_strpos($matches[1], ' ');

					if ($sep === false)
					{
						$formatter	= $matches[1];
						$params		= [];
					}
					else
					{
						$formatter	= mb_substr($matches[1], 0, $sep);
						$p			= ' ' . mb_substr($matches[1], $sep) . ' ';
						$paramcount	= preg_match_all('/(([^\s=]+)(\=((\"(.*?)\")|([^\"\s]+)))?)\s/u', $p, $matches, PREG_SET_ORDER);
						$params		= [];
						$c			= 0;

						foreach ($matches as $m)
						{
							$value			= isset($m[3]) && $m[3] ? ($m[5] ? $m[6] : $m[7]) : '1';
							$params[$c]		= $value;
							$params[$m[2]]	= $value;

							if ($c == 0)
							{
								$params['_default'] = $m[2];
							}

							$c++;
						}
					}
				}
			}

			$formatter = mb_strtolower($formatter);

			// no formatter specified, use default
			if ($formatter == '')
			{
				$formatter = 'code';
			}

			// TODO: Trim empty, whitespace only lines at the beginning
			// disabled trim($code), whitespace (or other characters) might be intentional in code examples
			$code = ltrim($code, "\n\r\0");		// TODO: utf8_ltrim($code, "\n\r\0") won't work, why?
			$code = rtrim($code);

			$result = $wacko->_format($code, 'highlight/' . $formatter, $params);

			// add wrapper
			if (isset($params['wrapper']) && ($params['wrapper'] != 'none'))
			{
				$wrapper			= 'wrapper_' . $params['wrapper'];
				$params['wrapper']	= ''; // no recursion
				$result				= $wacko->_format(trim($result), 'highlight/' . $wrapper, $params);
			}

			$output .= $result;

			return '<!--escaped-->' . $output . '<!--escaped-->';
		}
		// actions
		else if (preg_match('/^\{\{(.*?)\}\}$/us', $thing, $matches))
		{
			// used in paragrafica, too
			return '<!--escaped--><ignore><!--notypo--><!--action:begin-->' . $matches[1] . '<!--action:end--><!--/notypo--></ignore><!--escaped-->';
		}

		// if we reach this point, it must have been an accident
		return $thing;
	}

	function wacko_middleprocess($things)
	{
		$thing		= $things[1];
		$wacko		= &$this->object;
		$callback	= [&$this, 'wacko_callback'];

		if (!empty($thing[0]) && $thing[0] == '~')
		{
			if ($thing[1] == '~')
			{
				return '~~' . $this->wacko_middleprocess( [0, mb_substr($thing, 2)] );
			}
		}

		// escaped text
		if (preg_match('/^<!--escaped-->(.*)<!--escaped-->$/us', $thing, $matches))
		{
			return $matches[1];
		}
		// centered text
		else if (preg_match('/^>>(.*)<<$/us', $thing, $matches))
		{
			return '<!--escaped--><div class="center">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</div><!--escaped-->';
		}

		return $thing;
	}

	function wacko_callback($things)
	{
		$result		= null;
		$li			= '';
		$thing		= $things[1];
		$wacko		= & $this->object;
		$callback	= [&$this, 'wacko_callback'];

		if (isset($wacko->page['page_id']))
		{
			$this->page_id = $wacko->page['page_id'];
		}

		if (!$this->page_id)
		{
			$this->page_id = trim(substr(crc32(time()), 0, 5), '-');
		}

		// convert HTML thingies
		if ($thing == '<')
		{
			return '&lt;';
		}
		else if ($thing == '>')
		{
			return '&gt;';
		}
		// escaped text
		else if (preg_match('/^<!--escaped-->(.*)<!--escaped-->$/us', $thing, $matches))
		{
			return $matches[1];
		}
		// escaped html
		else if (preg_match('/^\<\#(.*)\#\>$/us', $thing, $matches))
		{
			if ($this->object->db->disable_safehtml)
			{
				return '<!--notypo-->' . $matches[1] . '<!--/notypo-->';
			}
			else
			{
				return '<!--notypo-->' . $wacko->format($matches[1], 'safehtml') . '<!--/notypo-->';
			}
		}
		// table begin
		else if ($thing == '#||')
		{
			$this->br			= 0;
			$this->cols			= 0;
			$this->intablebr	= true;
			$this->table_scope	= true;

			return '<table class="dtable">';
		}
		else if ($thing == '#|')
		{
			$this->br			= 0;
			$this->cols			= 0;
			$this->intablebr	= true;
			$this->table_scope	= true;

			return '<table class="usertable">';
		}
		// table end
		else if (($thing == '|#' || $thing == '||#') && $this->table_scope)
		{
			$this->br			= 0;
			$this->intablebr	= false;
			$this->table_scope	= false;

			return '</table>';
		}
		// table head
		else if (preg_match('/^\*\|(.*?)\|\*$/us', $thing, $matches) && $this->table_scope)
		{
			$this->br			= 1;
			$this->intable		= true;
			$this->intablebr	= false;

			$output		= '<tr class="userrow">';
			$cells		= preg_split('/\|/', $matches[1]);
			$count		= count($cells);
			$count--;

			for ($i = 0; $i < $count; $i++)
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$i] = substr($cells[$i], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<th class="userhead">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$i])));
				$output	.= $this->indent_close();
				$output	.= '</th>';
			}

			if (($this->cols <> 0) and ($count < $this->cols))
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$count] = substr($cells[$count], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<th class="userhead" colspan="' . ($this->cols - $count + 1) . '">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$count])));
				$output	.= $this->indent_close();
				$output	.= '</th>';
			}
			else
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$count] = substr($cells[$count], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<th class="userhead">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$count])));
				$output	.= $this->indent_close();
				$output	.= '</th>';
			}

			$output .= '</tr>';

			if ($this->cols == 0)
			{
				$this->cols	= $count;
			}

			$this->intablebr	= true;
			$this->intable		= false;

			return $output;
		}
		// table row and cells
		else if (preg_match('/^\|\|(.*?)\|\|$/us', $thing, $matches) && $this->table_scope)
		{
			$this->br			= 1;
			$this->intable		= true;
			$this->intablebr	= false;

			$output		= '<tr class="userrow">';
			$cells		= preg_split('/\|/', $matches[1]);
			$count		= count($cells);
			$count--;

			for ($i = 0; $i < $count; $i++)
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$i] = substr($cells[$i], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<td class="usercell">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$i])));
				$output	.= $this->indent_close();
				$output	.= '</td>';
			}

			if (($this->cols <> 0) and ($count < $this->cols))
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$count] = substr($cells[$count], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<td class="usercell" colspan="' . ($this->cols - $count + 1) . '">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$count])));
				$output	.= $this->indent_close();
				$output	.= '</td>';
			}
			else
			{
				$this->tdold_indent_level	= 0;
				$this->tdindent_closers		= [];

				if ($cells[$i][0] == "\n")
				{
					$cells[$count] = substr($cells[$count], 1);
				}

				$output	.= str_replace("\u{2592}", '', str_replace("\u{2592}" . "<br>\n", '', '<td class="usercell">' . preg_replace_callback($this->LONGREGEXP, $callback, "\u{2592}\n" . $cells[$count])));
				$output	.= $this->indent_close();
				$output	.= '</td>';
			}

			$output	.= '</tr>';

			if ($this->cols == 0)
			{
				$this->cols = $count;
			}

			$this->intablebr	= true;
			$this->intable		= false;

			return $output;
		}
		// deleted
		else if (preg_match('/^<!--markup:1:begin-->((\S.*?\S)|(\S))<!--markup:1:end-->$/us', $thing, $matches))
		{
			$this->br = 0;

			return '<del class="diff">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</del>';
		}
		// inserted
		else if (preg_match('/^<!--markup:2:begin-->((\S.*?\S)|(\S))<!--markup:2:end-->$/us', $thing, $matches))
		{
			$this->br = 0;

			return '<ins class="diff">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</ins>';
		}
		// bold
		else if (preg_match('/^\*\*(.*?)\*\*$/u', $thing, $matches))
		{
			return '<strong>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</strong>';
		}
		// italic
		else if (preg_match('/^\/\/(.*?)\/\/$/u', $thing, $matches))
		{
			return '<em>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</em>';
		}
		// underline
		else if (preg_match('/^__(.*?)__$/u', $thing, $matches))
		{
			return '<span class="underline">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</span>';
		}
		// code
		else if (  preg_match('/^\#\#(.*?)\#\#$/u', $thing, $matches)
				|| preg_match('/^\¹\¹(.*?)\¹\¹$/u', $thing, $matches))
		{
			return '<code>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</code>';
		}
		// small
		else if (preg_match('/^\+\+(.*?)\+\+$/u', $thing, $matches))
		{
			return '<small>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</small>';
		}
		// cite
		else if (  preg_match('/^\'\'(.*?)\'\'$/us', $thing, $matches)
				|| preg_match('/^\!\!((\((\S*?)\)(.*?\S))|(\S.*?\S)|(\S))\!\!$/us', $thing, $matches))
		{
			$this->br = 1;

			if (isset($matches[3]) && $color = ($this->object->db->allow_x11colors ? ($this->x11_colors[$matches[3]] ?? '') : ($this->colors[$matches[3]] ?? '')))
			{
				return '<span class="cl-' . $color . '">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[4]) . '</span>';
			}

			return '<span class="cite">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</span>';
		}
		// mark
		else if (preg_match('/^\?\?((\((\S*?)\)(.*?\S))|(\S.*?\S)|(\S))\?\?$/us', $thing, $matches))
		{
			$this->br = 1;

			if (isset($matches[3]) && $color = ($this->object->db->allow_x11colors ? ($this->x11_colors[$matches[3]] ?? '') : ($this->colors[$matches[3]] ?? '')))
			{
				return '<mark class="mark-' . $color . '">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[4]) . '</mark>';
			}

			return '<mark>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</mark>';
		}
		// urls
		else if (  preg_match('/^([[:alpha:]]+:\/\/\S+?)([^[:alnum:]^\/\(\)\-\_\=]?)$/u', $thing, $matches)
				|| preg_match('/^(mailto\:[[:alnum:]\-\_\.]+\@[[:alnum:]\-\.\_]+?|xmpp\:[[:alnum:]\-\_\.]+\@[[:alnum:]\-\.\_]+?)([^[:alnum:]^\/\-\_\=]?)$/u', $thing, $matches))
		{
			$url = mb_strtolower($matches[1]);

			if (preg_match('/^(http|https|ftp):\/\/([^\\s\"<>]+)\.((m4a|mp3|ogg|opus)|(gif|jpg|jpe|jpeg|png|svg|webp)|(mp4|ogv|webm))$/u', $url, $media))
			{
				// audio
				if ($media[4])
				{
					return '<audio src="' . $matches[1] . '" controls></audio>' . $matches[2];
				}
				// image
				if ($media[5])
				{
					return '<img src="' . $matches[1] . '">' . $matches[2];
				}
				// video
				if ($media[6])
				{
					return '<video src="' . $matches[1] . '" controls></video>' . $matches[2];
				}
			}
			// shorten url name if too long
			else if (mb_strlen($url) > 55)
			{
				$url = mb_substr($matches[1], 0, 30) . '[...]' . mb_substr($matches[1], -20);

				return $wacko->pre_link($matches[1], $url) . $matches[2];
			}
			else
			{
				return $wacko->pre_link($matches[1], $matches[1]) . $matches[2];
			}
		}
		// lan path
		else if (preg_match('/^\\\\\\\\([' . $wacko->language['ALPHANUM_P'] . '\\\!\.\-\_]+)$/u', $thing, $matches))
		{
			return '<a href="file://///' . str_replace('\\', '/', $matches[1]) . '">\\\\' . $matches[1] . '</a>';
		}
		// citated
		else if (preg_match('/^\n[ \t]*(>+)(.*)$/us', $thing, $matches))
		{
			return '<div class="email' . strlen($matches[1]) . ' email-' . (strlen($matches[1]) % 2 ? 'odd' : 'even') . '">' . Ut::html($matches[1]) . preg_replace_callback($this->LONGREGEXP, $callback, $matches[2]) . '</div>';
		}
		// blockquote
		else if (preg_match('/^<\[(.*)\]>$/us', $thing, $matches))
		{
			// trivial substitution (is there a security hole?)
			$matches[0] = str_replace('<[', '<!--escaped--><blockquote><!--escaped-->', $matches[0]);
			$matches[0] = str_replace(']>', '<!--escaped--></blockquote><!--escaped-->', $matches[0]);

			$result = preg_replace_callback($this->LONGREGEXP, $callback, $matches[0]);
			$result = preg_replace('/^(<br>)+/i', '', $result );
			$result = preg_replace('/(<br>)+$/i', '', $result );

			return $result; // '<blockquote>' . $result . '</blockquote>';
		}
		// super
		else if (preg_match('/^\^\^(.*)\^\^$/u', $thing, $matches))
		{
			return '<sup>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</sup>';
		}
		// sub
		else if (preg_match('/^vv(.*)vv$/u', $thing, $matches))
		{
			return '<sub>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</sub>';
		}
		// headers
		else if (preg_match('/\n[ \t]*=======(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h6 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h6>';
		}
		else if (preg_match('/\n[ \t]*======(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h5 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h5>';
		}
		else if (preg_match('/\n[ \t]*=====(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h4 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h4>';
		}
		else if (preg_match('/\n[ \t]*====(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h3 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h3>';
		}
		else if (preg_match('/\n[ \t]*===(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h2 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h2>';
		}
		else if (preg_match('/\n[ \t]*==(.*?)={2,7}$/', $thing, $matches))
		{
			$result		= $this->indent_close();
			$this->br	= 0;
			$wacko->header_count++;
			$header_id	= 'h' . $this->page_id . '-' . $wacko->header_count;

			return $result . '<h1 id="' . $header_id . '" class="heading">' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '<a class="self-link" href="#' . $header_id . '"></a></h1>';
		}
		// separators
		else if (preg_match('/^[-]{4,}$/u', $thing))
		{
			$this->br = 0;

			return "<hr>\n";
		}
		// forced line breaks
		else if (preg_match('/^---\n?\s*$/u', $thing, $matches))
		{
			return "<br>\n";
		}
		// strike
		else if (preg_match('/^--((\S.*?\S)|(\S))--$/us', $thing, $matches))    //NB: wrong
		{
			return '<del>' . preg_replace_callback($this->LONGREGEXP, $callback, $matches[1]) . '</del>';
		}
		// definitions
		else if (  preg_match('/^\(\?(.+?)(==|\|\|)(.*)\?\)$/u', $thing, $matches)
				|| preg_match('/^\(\?(\S+)(\s+(.+))?\?\)$/u', $thing, $matches))
		{
			list (, $def, ,$text) = $matches;

			if ($def)
			{
				if ($text == '')
				{
					$text = $def;
				}

				$text = preg_replace('/<!--markup:1:[\w]+-->|__|\[\[|\(\(/u', '', $text);

				return '<dfn title="' . Ut::html($text) . '">' . $def . '</dfn>';
			}

			return '';
		}
		// forced links & footnotes
		else if (  preg_match('/^\[\[(.+)(==|\|)(.*)\]\]$/u', $thing, $matches)
				|| preg_match('/^\(\((.+)(==|\|)(.*)\)\)$/u', $thing, $matches)
				|| preg_match('/^\[\[(\S+)(\s+(.+))?\]\]$/u', $thing, $matches)
				|| preg_match('/^\(\((\S+)(\s+(.+))?\)\)$/u', $thing, $matches))
		{
			$url	= $matches[1] ?? '';
			$text	= $matches[3] ?? '';

			if ($url)
			{
				// footnote [[*]], [[**]], [[*1]], [[*2]]
				if ($url[0] == '*')
				{
					$sup = 1;

					if (preg_match('/^\*+$/u', $url))
					{
						$aname	= 'ftn' . mb_strlen($url);

						if (!$text)
						{
							$text = $url;
						}
					}
					else if (preg_match('/^\*\d+$/u', $url))
					{
						$aname	= 'ftnd' . mb_substr($url, 1);
					}
					else
					{
						$aname	= Ut::html(mb_substr($url, 1));
						$sup	= 0;
					}

					if (!$text)
					{
						$text = mb_substr($url, 1);
					}

					return ($sup ? '<sup>' : '') . '<a href="#o' . $aname . '" id="' . $aname . '">' . $text . '</a>' . ($sup ? '</sup>' : '');
				}
				// footnote [[#*]], [[#**]], [[#1]], [[#2]]
				else if ($url[0] == '#')
				{
					$anchor	= mb_substr($url, 1);
					$sup	= 1;

					if (preg_match('/^\*+$/u', $anchor))
					{
						$ahref	= 'ftn' . mb_strlen($anchor);
					}
					else if (preg_match('/^\d+$/u', $anchor))
					{
						$ahref	= 'ftnd' . $anchor;
					}
					else
					{
						$ahref	= Ut::html($anchor);
						$sup	= 0;
					}

					if (!$text)
					{
						$text = mb_substr($url, 1);
					}

					return ($sup ? '<sup>' : '') . '<a href="#' . $ahref . '" id="o' . $ahref . '">' . $text . '</a>' . ($sup ? '</sup>' : '');
				}
				// autogenerated footnote [[fn footnote here]]
				else if (mb_substr($url, 0, 2) == 'fn')
				{
					$sup = 1;

					if (!$text)
					{
						$text = mb_substr($url, 1);
					}

					if (!isset($this->auto_fn['count']))
					{
						$this->auto_fn['count'] = 0;
					}

					$this->auto_fn['count']++;
					$footnote_count = $this->auto_fn['count'];

					if (!isset($this->auto_fn['content']))
					{
						$this->auto_fn['content'] = null;
					}

					$this->auto_fn['content'][$footnote_count] = trim($text);

					return ($sup ? '<sup class="footnote">' : '') . '<a href="#footnote-' . $footnote_count . '" id="footnote-' . $footnote_count . '-ref" title="footnote ' . $footnote_count . '" >[' . $footnote_count . ']</a>' . ($sup ? '</sup>' : '');
				}
				else
				{
					if ($url != ($url = (preg_replace('/<!--markup:1:[\w]+-->|<!--markup:2:[\w]+-->|\[\[|\(\(/u', '', $url))))
					{
						$result	= '</span>';
					}

					if ($url[0] == '(')
					{
						$url	= mb_substr($url, 1);
						$result	.= '(';
					}

					if ($url[0] == '[')
					{
						$url	= mb_substr($url, 1);
						$result	.= '[';
					}

					if (!$text)
					{
						$text = $url;
					}

					$url	= str_replace(' ', '', $url);
					$text	= preg_replace('/<!--markup:1:[\w]+-->|<!--markup:2:[\w]+-->|\[\[|\(\(/u', '', $text);

					#Diag::dbg('GOLD', ' ::forced:: ' . $thing . ' => ' . $url . ' -> ' . $text);
					return $result . $wacko->pre_link($url, $text);
				}
			}

			return '';
		}
		// experimental: backported from openSpace
		// image link (*(http://example.com file:image.png)*)
		else if (  preg_match('/^\[\*\[(\S+?)([ \t]+(file:[^\n]+?))?\]\*\]$/u', $thing, $matches)
				|| preg_match('/^\(\*\((\S+?)([ \t]+(file:[^\n]+?))?\)\*\)$/u', $thing, $matches)
				)
		{
			$url	= $matches[1] ?? '';
			$img	= $matches[3] ?? '';

			if ($url && $img)
			{
				if ($url != ($url = (preg_replace('/<!--imgprelink:begin-->|<!--imgprelink:end-->|\[\*\[|\(\*\(/u', '', $url))))
				{
					$result	= '</span>';
				}

				if ($url[0] == '(')
				{
					$url	 = mb_substr($url, 1);
					$result	.= '(';
				}

				if ($url[0] == '[')
				{
					$url	 = mb_substr($url, 1);
					$result	.= '[';
				}

				$img		= preg_replace('/<!--imgprelink:begin-->|<!--imgprelink:end-->|\[\*\[|\(\*\(|/u', '', $img);

				return $result . $wacko->pre_link($url, $img, 1, 1);
			}
			else
			{
				return '';
			}
		}
		// indented text
		else if (preg_match('/(\n)(\t+|(?:[ ]{2})+)(-|\*|([a-zA-Z]|[0-9]{1,3})[\.\)](\#[0-9]{1,3})?)?(\n|$)/us', $thing, $matches))
		{
			// new line
			$result .= ($this->br ? "<br>\n" : "\n");

			//intable or not?
			if ($this->intable)
			{
				$closers	= &$this->tdindent_closers;
				$old_level	= &$this->tdold_indent_level;
				$old_type	= &$this->tdold_indent_type;
			}
			else
			{
				$closers	= &$this->indent_closers;
				$old_level	= &$this->old_indent_level;
				$old_type	= &$this->old_indent_type;
			}

			// we definitely want no line break in this one.
			$this->br = 0;

			// #18 syntax support
			if ($matches[5])
			{
				$start = mb_substr($matches[5], 1);
			}
			else
			{
				$start = '';
			}

			// find out which indent type we want
			$new_indent_type = $matches[3][0] ?? '';

			if (!$new_indent_type)
			{
				$opener		= '<div class="indent">';
				$closer		= '</div>' . "\n";
				$this->br	= 1;
				$new_type	= 'i';
			}
			else if ($new_indent_type == '-' || $new_indent_type == '*')
			{
				$opener		= '<ul><li>';
				$closer		= '</li></ul>' . "\n";
				$new_type	= '*';
				$li			= 1;
			}
			else
			{
				$opener		= '<ol type="' . $new_indent_type . '"><li' .
							  ($start ? ' value="' . $start . '"' : '') . '>';
				$closer		= '</li></ol>' . "\n";
				$new_type	= 1;
				$li			= 1;
			}

			// get new indent level
			if ($matches[2][0] == ' ')
			{
				$new_indent_level = (int) mb_strlen($matches[2]) / 2;
			}
			else
			{
				$new_indent_level = mb_strlen($matches[2]);
			}

			if ($new_indent_level > $old_level)
			{
				for ($i = 0; $i < $new_indent_level - $old_level; $i++)
				{
					$result .= $opener;
					array_push($closers, $closer);
				}
			}
			else if ($new_indent_level < $old_level)
			{
				for ($i = 0; $i < $old_level - $new_indent_level; $i++)
				{
					$result .= array_pop($closers);
				}
			}
			else if ($new_indent_level == $old_level && $old_type != $new_type)
			{
				$result .= array_pop($closers);
				$result .= $opener;
				array_push($closers, $closer);
			}

			$old_level	= $new_indent_level;
			$old_type	= $new_type;

			if ($li && !preg_match('/' . str_replace(')', '\)', $opener) . '$/u', $result))
			{
				$result .= '</li>' . "\n" . '<li' . ($start ? ' value="' . $start . '"' : '') . '>';
			}

			return $result;
		}
		// new lines
		else if ($thing == "\n" && !$this->intablebr)
		{
			// if we got here, there was no tab in the next line;
			// this means that we can close all open indents.
			$result = $this->indent_close();

			if ($result)
			{
				$this->br = 0;
			}

			$result .= $this->br ? "<br>\n" : "\n";

			$this->br = 1;

			return $result;
		}
		// media file links
		else if (preg_match('/^file:((\.\.|!)?\/)?[\p{L}\p{Nd}][\p{L}\p{Nd}\/\-\_\.]+\.(mp4|ogv|webm|m4a|mp3|ogg|opus|gif|jpg|jpe|jpeg|png|svg|webp)(\?[[:alnum:]\&]+)?$/us', $thing, $matches))
		{
			$caption = 0;
			if(!empty($matches[4]) && preg_match('/caption/ui', $matches[4]))
			{
				$caption = 2;
			}
			#Diag::dbg('GOLD', ' ::fileimg:: ' . $thing . ' => ' . $matches[1] . ' -> ' . $matches[2]);
			return $wacko->pre_link($thing, '', 1, $caption);
		}
		// interwiki links
		else if (preg_match('/^([[:alnum:]]+[:][' . $wacko->language['ALPHANUM_P'] . '\!\.][' . $wacko->language['ALPHANUM_P'] . '\(\)\-\_\.\+\&\=\#]+?)([^[:alnum:]^\/\(\)\-\_\=]?)$/us', $thing, $matches))
		{
			#Diag::dbg('GOLD', ' ::iw:: ' . $thing . ' => ' . $matches[1] . ' -> ' . $matches[2]);
			return $wacko->pre_link($matches[1]) . $matches[2];
		}
		// wacko links!
		else if ((!$wacko->_formatter_noautolinks)
				&& (preg_match('/^(((\.\.)|!)?\/?|~)?(' . $wacko->language['UPPER'] . $wacko->language['LOWER'] . '+' . $wacko->language['UPPERNUM'] . $wacko->language['ALPHANUM'] . '*)$/us', $thing, $matches)))
		{
			if ($matches[1] == '~')
			{
				return $matches[4];
			}

			return $wacko->pre_link($thing);
		}

		if (($thing[0] == '~') && ($thing[1] != '~'))
		{
			$thing = ltrim($thing, '~');
		}

		if (($thing[0] == '~') && ($thing[1] == '~'))
		{
			return '~' . preg_replace_callback($this->LONGREGEXP, $callback, mb_substr($thing, 2));
		}

		// if we reach this point, it must have been an accident.
		return Ut::html($thing);
	}

}
