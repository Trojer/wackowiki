
<?php
/**
 * Auto-generated class. CPP syntax highlighting
 *
 *
 * Thanks to Aaron Kalin for initial
 * implementation of this highlighter
 *
 * LICENSE: This source file is subject to version 3.0 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_0.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @copyright  2004-2006 Andrey Demenev
 * @license	http://www.php.net/license/3_0.txt  PHP License
 * @link	   http://pear.php.net/package/Text_Highlighter
 * @category   Text
 * @package	Text_Highlighter
 * @version	generated from: cpp.xml
 * @author Aaron Kalin
 * @author Andrey Demenev <demenev@gmail.com>
 *
 */

class Text_Highlighter_CPP extends Text_Highlighter
{
	var $_language = 'cpp';

	/**
	 *  Constructor
	 *
	 * @param array  $options
	 * @access public
	 */
	function __construct($options = [])
	{
		$this->_options = $options;
		$this->_regs = [
			-1 => '/((?i)")|((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)[a-z_]\\w*)|((?i)\\b0[xX][\\da-f]+)|((?i)\\b\\d\\d*|\\b0\\b)|((?i)\\b0[0-7]+)|((?i)\\b(\\d*\\.\\d+)|(\\d+\\.\\d*))|((?mi)^[ \\t]*#include)|((?mii)^[ \\t]*#[ \\t]*[a-z]+)|((?i)\\d*\\.?\\d+)|((?i)\\/\\*)|((?i)\\/\\/.+)/',
			0 => '/((?i)\\\\)/',
			1 => '/((?i)")|((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)[a-z_]\\w*)|((?i)\\b0[xX][\\da-f]+)|((?i)\\b\\d\\d*|\\b0\\b)|((?i)\\b0[0-7]+)|((?i)\\b(\\d*\\.\\d+)|(\\d+\\.\\d*))|((?mi)^[ \\t]*#include)|((?mii)^[ \\t]*#[ \\t]*[a-z]+)|((?i)\\d*\\.?\\d+)|((?i)\\/\\*)|((?i)\\/\\/.+)/',
			2 => '/((?i)")|((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)[a-z_]\\w*)|((?i)\\b0[xX][\\da-f]+)|((?i)\\b\\d\\d*|\\b0\\b)|((?i)\\b0[0-7]+)|((?i)\\b(\\d*\\.\\d+)|(\\d+\\.\\d*))|((?mi)^[ \\t]*#include)|((?mii)^[ \\t]*#[ \\t]*[a-z]+)|((?i)\\d*\\.?\\d+)|((?i)\\/\\*)|((?i)\\/\\/.+)/',
			3 => '/((?i)")|((?i)\\{)|((?i)\\()|((?i)\\[)|((?i)[a-z_]\\w*)|((?i)\\b0[xX][\\da-f]+)|((?i)\\b\\d\\d*|\\b0\\b)|((?i)\\b0[0-7]+)|((?i)\\b(\\d*\\.\\d+)|(\\d+\\.\\d*))|((?mi)^[ \\t]*#include)|((?mii)^[ \\t]*#[ \\t]*[a-z]+)|((?i)\\d*\\.?\\d+)|((?i)\\/\\*)|((?i)\\/\\/.+)/',
			4 => '//',
			5 => '/((?i)")|((?i)<)/',
			6 => '/((?i)")|((?i)\\{)|((?i)\\()|((?i)[a-z_]\\w*)|((?i)\\b0[xX][\\da-f]+)|((?i)\\b\\d\\d*|\\b0\\b)|((?i)\\b0[0-7]+)|((?i)\\b(\\d*\\.\\d+)|(\\d+\\.\\d*))|((?i)\\/\\*)|((?i)\\/\\/.+)/',
			7 => '/((?i)\\$\\w+\\s*:.+\\$)/',
			8 => '/((?i)\\$\\w+\\s*:.+\\$)/',
		];
		$this->_counts = [
			-1 =>
			[
				0 => 0,
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0,
				8 => 2,
				9 => 0,
				10 => 0,
				11 => 0,
				12 => 0,
				13 => 0,
			],
			0 =>
			[
				0 => 0,
			],
			1 =>
			[
				0 => 0,
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0,
				8 => 2,
				9 => 0,
				10 => 0,
				11 => 0,
				12 => 0,
				13 => 0,
			],
			2 =>
			[
				0 => 0,
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0,
				8 => 2,
				9 => 0,
				10 => 0,
				11 => 0,
				12 => 0,
				13 => 0,
			],
			3 =>
			[
				0 => 0,
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 0,
				8 => 2,
				9 => 0,
				10 => 0,
				11 => 0,
				12 => 0,
				13 => 0,
			],
			4 =>
			[
			],
			5 =>
			[
				0 => 0,
				1 => 0,
			],
			6 =>
			[
				0 => 0,
				1 => 0,
				2 => 0,
				3 => 0,
				4 => 0,
				5 => 0,
				6 => 0,
				7 => 2,
				8 => 0,
				9 => 0,
			],
			7 =>
			[
				0 => 0,
			],
			8 =>
			[
				0 => 0,
			],
		];
		$this->_delim = [
			-1 =>
			[
				0 => 'quotes',
				1 => 'brackets',
				2 => 'brackets',
				3 => 'brackets',
				4 => '',
				5 => '',
				6 => '',
				7 => '',
				8 => '',
				9 => 'prepro',
				10 => 'prepro',
				11 => '',
				12 => 'mlcomment',
				13 => 'comment',
			],
			0 =>
			[
				0 => '',
			],
			1 =>
			[
				0 => 'quotes',
				1 => 'brackets',
				2 => 'brackets',
				3 => 'brackets',
				4 => '',
				5 => '',
				6 => '',
				7 => '',
				8 => '',
				9 => 'prepro',
				10 => 'prepro',
				11 => '',
				12 => 'mlcomment',
				13 => 'comment',
			],
			2 =>
			[
				0 => 'quotes',
				1 => 'brackets',
				2 => 'brackets',
				3 => 'brackets',
				4 => '',
				5 => '',
				6 => '',
				7 => '',
				8 => '',
				9 => 'prepro',
				10 => 'prepro',
				11 => '',
				12 => 'mlcomment',
				13 => 'comment',
			],
			3 =>
			[
				0 => 'quotes',
				1 => 'brackets',
				2 => 'brackets',
				3 => 'brackets',
				4 => '',
				5 => '',
				6 => '',
				7 => '',
				8 => '',
				9 => 'prepro',
				10 => 'prepro',
				11 => '',
				12 => 'mlcomment',
				13 => 'comment',
			],
			4 =>
			[
			],
			5 =>
			[
				0 => 'quotes',
				1 => 'quotes',
			],
			6 =>
			[
				0 => 'quotes',
				1 => 'brackets',
				2 => 'brackets',
				3 => '',
				4 => '',
				5 => '',
				6 => '',
				7 => '',
				8 => 'mlcomment',
				9 => 'comment',
			],
			7 =>
			[
				0 => '',
			],
			8 =>
			[
				0 => '',
			],
		];
		$this->_inner = [
			-1 =>
			[
				0 => 'string',
				1 => 'code',
				2 => 'code',
				3 => 'code',
				4 => 'identifier',
				5 => 'number',
				6 => 'number',
				7 => 'number',
				8 => 'number',
				9 => 'prepro',
				10 => 'code',
				11 => 'number',
				12 => 'mlcomment',
				13 => 'comment',
			],
			0 =>
			[
				0 => 'special',
			],
			1 =>
			[
				0 => 'string',
				1 => 'code',
				2 => 'code',
				3 => 'code',
				4 => 'identifier',
				5 => 'number',
				6 => 'number',
				7 => 'number',
				8 => 'number',
				9 => 'prepro',
				10 => 'code',
				11 => 'number',
				12 => 'mlcomment',
				13 => 'comment',
			],
			2 =>
			[
				0 => 'string',
				1 => 'code',
				2 => 'code',
				3 => 'code',
				4 => 'identifier',
				5 => 'number',
				6 => 'number',
				7 => 'number',
				8 => 'number',
				9 => 'prepro',
				10 => 'code',
				11 => 'number',
				12 => 'mlcomment',
				13 => 'comment',
			],
			3 =>
			[
				0 => 'string',
				1 => 'code',
				2 => 'code',
				3 => 'code',
				4 => 'identifier',
				5 => 'number',
				6 => 'number',
				7 => 'number',
				8 => 'number',
				9 => 'prepro',
				10 => 'code',
				11 => 'number',
				12 => 'mlcomment',
				13 => 'comment',
			],
			4 =>
			[
			],
			5 =>
			[
				0 => 'string',
				1 => 'string',
			],
			6 =>
			[
				0 => 'string',
				1 => 'code',
				2 => 'code',
				3 => 'identifier',
				4 => 'number',
				5 => 'number',
				6 => 'number',
				7 => 'number',
				8 => 'mlcomment',
				9 => 'comment',
			],
			7 =>
			[
				0 => 'inlinedoc',
			],
			8 =>
			[
				0 => 'inlinedoc',
			],
		];
		$this->_end = [
			0 => '/(?i)"/',
			1 => '/(?i)\\}/',
			2 => '/(?i)\\)/',
			3 => '/(?i)\\]/',
			4 => '/(?i)>/',
			5 => '/(?mi)(?<!\\\\)$/',
			6 => '/(?mi)(?<!\\\\)$/',
			7 => '/(?i)\\*\\//',
			8 => '/(?mi)$/',
		];
		$this->_states = [
			-1 =>
			[
				0 => 0,
				1 => 1,
				2 => 2,
				3 => 3,
				4 => -1,
				5 => -1,
				6 => -1,
				7 => -1,
				8 => -1,
				9 => 5,
				10 => 6,
				11 => -1,
				12 => 7,
				13 => 8,
			],
			0 =>
			[
				0 => -1,
			],
			1 =>
			[
				0 => 0,
				1 => 1,
				2 => 2,
				3 => 3,
				4 => -1,
				5 => -1,
				6 => -1,
				7 => -1,
				8 => -1,
				9 => 5,
				10 => 6,
				11 => -1,
				12 => 7,
				13 => 8,
			],
			2 =>
			[
				0 => 0,
				1 => 1,
				2 => 2,
				3 => 3,
				4 => -1,
				5 => -1,
				6 => -1,
				7 => -1,
				8 => -1,
				9 => 5,
				10 => 6,
				11 => -1,
				12 => 7,
				13 => 8,
			],
			3 =>
			[
				0 => 0,
				1 => 1,
				2 => 2,
				3 => 3,
				4 => -1,
				5 => -1,
				6 => -1,
				7 => -1,
				8 => -1,
				9 => 5,
				10 => 6,
				11 => -1,
				12 => 7,
				13 => 8,
			],
			4 =>
			[
			],
			5 =>
			[
				0 => 0,
				1 => 4,
			],
			6 =>
			[
				0 => 0,
				1 => 1,
				2 => 2,
				3 => -1,
				4 => -1,
				5 => -1,
				6 => -1,
				7 => -1,
				8 => 7,
				9 => 8,
			],
			7 =>
			[
				0 => -1,
			],
			8 =>
			[
				0 => -1,
			],
		];
		$this->_keywords = [
			-1 =>
			[
				0 => -1,
				1 => -1,
				2 => -1,
				3 => -1,
				4 =>
				[
					'reserved' => '/^(and|and_eq|asm|bitand|bitor|break|case|catch|compl|const_cast|continue|default|delete|do|dynamic_cast|else|for|fortran|friend|goto|if|new|not|not_eq|operator|or|or_eq|private|protected|public|reinterpret_cast|return|sizeof|static_cast|switch|this|throw|try|typeid|using|while|xor|xor_eq|false|true)$/',
					'types' => '/^(auto|bool|char|class|const|double|enum|explicit|export|extern|float|inline|int|long|mutable|namespace|register|short|signed|static|struct|template|typedef|typename|union|unsigned|virtual|void|volatile|wchar_t)$/',
					'Common Macros' => '/^(NULL|TRUE|FALSE|MAX|MIN|__LINE__|__DATA__|__FILE__|__TIME__|__STDC__)$/',
				],
				5 =>
				[
				],
				6 =>
				[
				],
				7 =>
				[
				],
				8 =>
				[
				],
				9 => -1,
				10 => -1,
				11 =>
				[
				],
				12 => -1,
				13 => -1,
			],
			0 =>
			[
				0 =>
				[
				],
			],
			1 =>
			[
				0 => -1,
				1 => -1,
				2 => -1,
				3 => -1,
				4 =>
				[
					'reserved' => '/^(and|and_eq|asm|bitand|bitor|break|case|catch|compl|const_cast|continue|default|delete|do|dynamic_cast|else|for|fortran|friend|goto|if|new|not|not_eq|operator|or|or_eq|private|protected|public|reinterpret_cast|return|sizeof|static_cast|switch|this|throw|try|typeid|using|while|xor|xor_eq|false|true)$/',
					'types' => '/^(auto|bool|char|class|const|double|enum|explicit|export|extern|float|inline|int|long|mutable|namespace|register|short|signed|static|struct|template|typedef|typename|union|unsigned|virtual|void|volatile|wchar_t)$/',
					'Common Macros' => '/^(NULL|TRUE|FALSE|MAX|MIN|__LINE__|__DATA__|__FILE__|__TIME__|__STDC__)$/',
				],
				5 =>
				[
				],
				6 =>
				[
				],
				7 =>
				[
				],
				8 =>
				[
				],
				9 => -1,
				10 => -1,
				11 =>
				[
				],
				12 => -1,
				13 => -1,
			],
			2 =>
			[
				0 => -1,
				1 => -1,
				2 => -1,
				3 => -1,
				4 =>
				[
					'reserved' => '/^(and|and_eq|asm|bitand|bitor|break|case|catch|compl|const_cast|continue|default|delete|do|dynamic_cast|else|for|fortran|friend|goto|if|new|not|not_eq|operator|or|or_eq|private|protected|public|reinterpret_cast|return|sizeof|static_cast|switch|this|throw|try|typeid|using|while|xor|xor_eq|false|true)$/',
					'types' => '/^(auto|bool|char|class|const|double|enum|explicit|export|extern|float|inline|int|long|mutable|namespace|register|short|signed|static|struct|template|typedef|typename|union|unsigned|virtual|void|volatile|wchar_t)$/',
					'Common Macros' => '/^(NULL|TRUE|FALSE|MAX|MIN|__LINE__|__DATA__|__FILE__|__TIME__|__STDC__)$/',
				],
				5 =>
				[
				],
				6 =>
				[
				],
				7 =>
				[
				],
				8 =>
				[
				],
				9 => -1,
				10 => -1,
				11 =>
				[
				],
				12 => -1,
				13 => -1,
			],
			3 =>
			[
				0 => -1,
				1 => -1,
				2 => -1,
				3 => -1,
				4 =>
				[
					'reserved' => '/^(and|and_eq|asm|bitand|bitor|break|case|catch|compl|const_cast|continue|default|delete|do|dynamic_cast|else|for|fortran|friend|goto|if|new|not|not_eq|operator|or|or_eq|private|protected|public|reinterpret_cast|return|sizeof|static_cast|switch|this|throw|try|typeid|using|while|xor|xor_eq|false|true)$/',
					'types' => '/^(auto|bool|char|class|const|double|enum|explicit|export|extern|float|inline|int|long|mutable|namespace|register|short|signed|static|struct|template|typedef|typename|union|unsigned|virtual|void|volatile|wchar_t)$/',
					'Common Macros' => '/^(NULL|TRUE|FALSE|MAX|MIN|__LINE__|__DATA__|__FILE__|__TIME__|__STDC__)$/',
				],
				5 =>
				[
				],
				6 =>
				[
				],
				7 =>
				[
				],
				8 =>
				[
				],
				9 => -1,
				10 => -1,
				11 =>
				[
				],
				12 => -1,
				13 => -1,
			],
			4 =>
			[
			],
			5 =>
			[
				0 => -1,
				1 => -1,
			],
			6 =>
			[
				0 => -1,
				1 => -1,
				2 => -1,
				3 =>
				[
					'reserved' => '/^(and|and_eq|asm|bitand|bitor|break|case|catch|compl|const_cast|continue|default|delete|do|dynamic_cast|else|for|fortran|friend|goto|if|new|not|not_eq|operator|or|or_eq|private|protected|public|reinterpret_cast|return|sizeof|static_cast|switch|this|throw|try|typeid|using|while|xor|xor_eq|false|true)$/',
					'types' => '/^(auto|bool|char|class|const|double|enum|explicit|export|extern|float|inline|int|long|mutable|namespace|register|short|signed|static|struct|template|typedef|typename|union|unsigned|virtual|void|volatile|wchar_t)$/',
					'Common Macros' => '/^(NULL|TRUE|FALSE|MAX|MIN|__LINE__|__DATA__|__FILE__|__TIME__|__STDC__)$/',
				],
				4 =>
				[
				],
				5 =>
				[
				],
				6 =>
				[
				],
				7 =>
				[
				],
				8 => -1,
				9 => -1,
			],
			7 =>
			[
				0 =>
				[
				],
			],
			8 =>
			[
				0 =>
				[
				],
			],
		];
		$this->_parts = [
			0 =>
			[
				0 => NULL,
			],
			1 =>
			[
				0 => NULL,
				1 => NULL,
				2 => NULL,
				3 => NULL,
				4 => NULL,
				5 => NULL,
				6 => NULL,
				7 => NULL,
				8 => NULL,
				9 => NULL,
				10 => NULL,
				11 => NULL,
				12 => NULL,
				13 => NULL,
			],
			2 =>
			[
				0 => NULL,
				1 => NULL,
				2 => NULL,
				3 => NULL,
				4 => NULL,
				5 => NULL,
				6 => NULL,
				7 => NULL,
				8 => NULL,
				9 => NULL,
				10 => NULL,
				11 => NULL,
				12 => NULL,
				13 => NULL,
			],
			3 =>
			[
				0 => NULL,
				1 => NULL,
				2 => NULL,
				3 => NULL,
				4 => NULL,
				5 => NULL,
				6 => NULL,
				7 => NULL,
				8 => NULL,
				9 => NULL,
				10 => NULL,
				11 => NULL,
				12 => NULL,
				13 => NULL,
			],
			4 =>
			[
			],
			5 =>
			[
				0 => NULL,
				1 => NULL,
			],
			6 =>
			[
				0 => NULL,
				1 => NULL,
				2 => NULL,
				3 => NULL,
				4 => NULL,
				5 => NULL,
				6 => NULL,
				7 => NULL,
				8 => NULL,
				9 => NULL,
			],
			7 =>
			[
				0 => NULL,
			],
			8 =>
			[
				0 => NULL,
			],
		];
		$this->_subst = [
			-1 =>
			[
				0 => false,
				1 => false,
				2 => false,
				3 => false,
				4 => false,
				5 => false,
				6 => false,
				7 => false,
				8 => false,
				9 => false,
				10 => false,
				11 => false,
				12 => false,
				13 => false,
			],
			0 =>
			[
				0 => false,
			],
			1 =>
			[
				0 => false,
				1 => false,
				2 => false,
				3 => false,
				4 => false,
				5 => false,
				6 => false,
				7 => false,
				8 => false,
				9 => false,
				10 => false,
				11 => false,
				12 => false,
				13 => false,
			],
			2 =>
			[
				0 => false,
				1 => false,
				2 => false,
				3 => false,
				4 => false,
				5 => false,
				6 => false,
				7 => false,
				8 => false,
				9 => false,
				10 => false,
				11 => false,
				12 => false,
				13 => false,
			],
			3 =>
			[
				0 => false,
				1 => false,
				2 => false,
				3 => false,
				4 => false,
				5 => false,
				6 => false,
				7 => false,
				8 => false,
				9 => false,
				10 => false,
				11 => false,
				12 => false,
				13 => false,
			],
			4 =>
			[
			],
			5 =>
			[
				0 => false,
				1 => false,
			],
			6 =>
			[
				0 => false,
				1 => false,
				2 => false,
				3 => false,
				4 => false,
				5 => false,
				6 => false,
				7 => false,
				8 => false,
				9 => false,
			],
			7 =>
			[
				0 => false,
			],
			8 =>
			[
				0 => false,
			],
		];
		$this->_conditions = [
		];
		$this->_kwmap = [
			'reserved' => 'reserved',
			'types' => 'types',
			'Common Macros' => 'prepro',
		];
		$this->_defClass = 'code';
		$this->_checkDefines();
	}

}