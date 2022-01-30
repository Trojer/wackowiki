<?php

$page_lang = 'hi';

// insert these pages only for default language
if ($config['language'] == $page_lang)
{
	if (!$config['is_update'])
	{
		$home_page_body		=
			'file:/wacko_logo.png?right' . "\n" .
			'**आपकी ((WackoWiki:Doc/English WackoWiki)) साइट पर आपका स्वागत है!**' . "\n\n" .
			'आरंभ करने के लिए नीचे "इस पृष्ठ को संपादित करें" लिंक पर लॉग इन करने के बाद क्लिक करें।' . "\n\n" .
			'दस्तावेज़ीकरण यहां पाया जा सकता है  WackoWiki:Doc/English.' . "\n" .
			'Useful pages: ((WackoWiki:Doc/English/Formatting Formatting)), ((/खोजें खोजें)).' . "\n\n";
		$admin_page_body	= '((user:' . $config['admin_name'] . ' ' . $config['admin_name'] . '))';

		insert_page($config['root_page'], 'मुख पृष्ठ', $home_page_body, $page_lang, 'Admins', true, false, null, 0);
		insert_page($config['users_page'] . '/' . $config['admin_name'], $config['admin_name'], $admin_page_body . "\n\n", $page_lang, $config['admin_name'], true, false, null, 0);
	}

	insert_page($config['category_page'],		'वर्ग',						'{{category}}',			$page_lang, 'Admins', false, false);
	insert_page($config['groups_page'],			'समूह',					'{{groups}}',				$page_lang, 'Admins', false, false);
	insert_page($config['users_page'],			'उपयोगकर्ताओं',				'{{users}}',				$page_lang, 'Admins', false, false);

	# insert_page($config['help_page'],			'सहायता',					'',						$page_lang, 'Admins', false, false);
	# insert_page($config['terms_page'],			'उपयोग की शर्तें',				'',						$page_lang, 'Admins', false, false);
	# insert_page($config['privacy_page'],		'गोपनीयता नीति',				'',						$page_lang, 'Admins', false, false);

	insert_page($config['registration_page'],	'पंजीकरण',					'{{registration}}',		$page_lang, 'Admins', false, false);
	insert_page($config['password_page'],		'कूटशब्द',					'{{changepassword}}',		$page_lang, 'Admins', false, false);
	insert_page($config['search_page'],			'खोजें',					'{{search}}',				$page_lang, 'Admins', false, false);
	insert_page($config['login_page'],			'प्रवेश',					'{{login}}',				$page_lang, 'Admins', false, false);
	insert_page($config['account_page'],		'स्थापनायें',					'{{usersettings}}',			$page_lang, 'Admins', false, false);

	insert_page($config['changes_page'],		'हाल में हुए परिवर्तन',			'{{changes}}',				$page_lang, 'Admins', false, SET_MENU, 'Changes');
	insert_page($config['comments_page'],		'हाल की टिप्पणियाँ',			'{{commented}}',			$page_lang, 'Admins', false, SET_MENU, 'टिप्पणियाँ');
	insert_page($config['index_page'],			'Page Index',			'{{pageindex}}',		$page_lang, 'Admins', false, SET_MENU, 'अनुक्रमणिका');
	insert_page($config['random_page'],			'यादृच्छिक पृष्ठ',				'{{randompage}}',			$page_lang, 'Admins', false, SET_MENU, 'यादृच्छिक');
}
else
{
	// set only bookmarks
	insert_page($config['changes_page'],		'',		'',		$page_lang, '', false, SET_MENU_ONLY, 'Changes');
	insert_page($config['comments_page'],		'',		'',		$page_lang, '', false, SET_MENU_ONLY, 'टिप्पणियाँ');
	insert_page($config['index_page'],			'',		'',		$page_lang, '', false, SET_MENU_ONLY, 'अनुक्रमणिका');
	insert_page($config['random_page'],			'',		'',		$page_lang, '', false, SET_MENU_ONLY, 'यादृच्छिक');
}