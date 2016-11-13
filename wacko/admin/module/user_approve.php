<?php

if (!defined('IN_WACKO'))
{
	exit;
}

########################################################
##   Approve Users                                    ##
########################################################
$_mode = 'user_approve';

$module[$_mode] = [
		'order'	=> 400,
		'cat'	=> 'users',
		'status'=> (RECOVERY_MODE ? false : true),
		'mode'	=> $_mode,
		'name'	=> $engine->_t($_mode)['name'],		// Approve
		'title'	=> $engine->_t($_mode)['title'],	// User registration approval
	];

########################################################

function admin_user_approve(&$engine, &$module)
{
	$where = '';
	$order = '';
	$error = '';

	#$engine->debug_print_r($_POST);
	#$engine->debug_print_r($_REQUEST);
?>
	<h1><?php echo $module['title']; ?></h1>
	<br />
	<p>
		<?php echo $engine->_t('UserApproveInfo'); ?>
	</p>
	<br />
<?php


	// simple and rude input sanitization
	foreach ($_POST as $key => $val)
	{
		$_POST[$key] = htmlspecialchars($val, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET);
	}

	// IDs PROCESSING (COMMON PROCEDURES)
	$set = [];

	// pass previously selected items
	if (isset($_REQUEST['ids']))
	{
		$ids = explode('-', $_REQUEST['ids']);

		foreach ($ids as $id)
		{
			if (!in_array($id, $set) && !empty($id))
			{
				$set[] = $id;
			}
		}

		unset($ids, $id);
	}

	// keep currently selected list items
	foreach ($_POST as $val => $key)
	{
		if ($key == 'id' && !in_array($val, $set) && !empty($val))
		{
			$set[] = $val;
		}
	}

	unset($key, $val);

	// save user ids for later operations (correct if needed)
	if (isset($_POST['set']))
	{
		$set = [];

		foreach ($_POST as $val => $key)
		{
			if ($key == 'id' && !empty($val))
			{
				$set[] = $val;
			}
		}

		unset($key, $val);
	}
	// reset user ids
	else if (isset($_POST['reset']))
	{
		$set = [];
	}

	reset($set);

	/////////////////////////////////////////////
	//   list change/update
	/////////////////////////////////////////////

	#$user_id = (isset($_POST['user_id']) ? $_POST['user_id'] : isset($_GET['user_id']) ? $_GET['user_id'] : '');
	$user_id = (isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : '');

	// get user
	if (isset($_GET['user_id']) || isset($_POST['user_id']))
	{
		$user = $engine->db->load_single(
			"SELECT u.user_name, u.real_name, u.email, s.theme, s.user_lang, u.enabled, u.account_status ".
			"FROM {$engine->db->table_prefix}user u ".
				"LEFT JOIN " . $engine->db->table_prefix . "user_setting s ON (u.user_id = s.user_id) ".
			"WHERE u.user_id = '" . (int) $user_id . "' ".
				"AND u.account_type = '0' ".
			"LIMIT 1");
	}

	// approve user
	if (isset($_GET['approve']) && $user_id )
	{
		$user = $engine->db->load_single(
			"SELECT u.user_id, u.user_name, u.real_name, u.email, s.theme, s.user_lang, u.enabled, u.account_status ".
			"FROM {$engine->db->table_prefix}user u ".
				"LEFT JOIN " . $engine->db->table_prefix . "user_setting s ON (u.user_id = s.user_id) ".
			"WHERE u.user_id = '" . (int) $user_id . "' ".
				"AND u.account_type = '0' ".
			"LIMIT 1");

		if ($_GET['approve'] == 1)
		{
			// Approved registration
			$engine->approve_user($user, false);
			$engine->add_user_page($user['user_name'], $user['user_lang']);

			$engine->show_message($engine->_t('RegistrationApproved'));
			$engine->log(4, "User ##{$user['user_name']}## approved");
		}
		else if ($_GET['approve'] == 2)
		{
			// Deny registration
			$engine->set_account_status($user_id, 2);

			$engine->show_message($engine->_t('RegistrationDenied'));
			$engine->log(4, "User ##{$user['user_name']}## blocked");
		}
	}
	// approve user
	else if (isset($_POST['approve']) && ($user_id || $set == true))
	{
		if (array_filter($set) == false && empty($user_id))
		{
			$error = 'Please select at least one user via the Set button.';//$this->_t('ModerateMoveNotExists');
			$engine->show_message($error);
		}
			//(int) $_POST['user_id']
		if ($error != true || !empty($user_id))
		{
			if (!empty($user_id))
			{
				$set[]	= (int) $user_id;
				$set	= array_unique($set);
			}

			foreach ($set as $user_id)
			{
				if ((int) $user_id)
				{
					$user = $engine->db->load_single(
						"SELECT u.user_name ".
						"FROM {$engine->db->table_prefix}user u ".
						"WHERE u.user_id = '" . $user_id . "' ".
							"AND u.account_type = '0' ".
						"LIMIT 1");

					$engine->show_message($engine->_t('UsersDeleted'));
					$engine->log(4, "User //'{$user['user_name']}'// removed from the database");
				}
			}

			$set = [];
		}
	}
#}
	// manage approving and denying users

		// defining WHERE and ORDER clauses
		if (isset($_GET['user']) && $_GET['user'] == true && strlen($_GET['user']) > 2)
		{
			$where			= "WHERE user_name LIKE " . $engine->db->q('%' . $_GET['user'] . '%') . " ";
		}
		// set signuptime ordering
		else if (isset($_GET['order']) && $_GET['order'] == 'signup_asc')
		{
			$order			= 'ORDER BY signup_time ASC ';
			$signup_time	= 'signup_desc';
		}
		else if (isset($_GET['order']) && $_GET['order'] == 'signup_desc')
		{
			$order			= 'ORDER BY signup_time DESC ';
			$signup_time	= 'signup_asc';
		}
		else
		{
			$signup_time	= 'signup_asc';
		}

		// filter by account_status
		if (isset($_GET['account_status']))
		{
			$where	= "WHERE u.account_status = '" . (int) $_GET['account_status'] . "' ";
		}
		else
		{
			$where	= "WHERE u.account_status = '1' ";
		}

		// set user_name ordering
		if (isset($_GET['order']) && $_GET['order'] == 'user_asc')
		{
			$order			= 'ORDER BY user_name DESC ';
			$orderuser		= 'user_desc';
		}
		else if (isset($_GET['order']) && $_GET['order'] == 'user_desc')
		{
			$order			= 'ORDER BY user_name ASC ';
			$orderuser		= 'user_asc';
		}
		else
		{
			$orderuser		= 'user_desc';
		}

		// filter by lang
		if (isset($_GET['user_lang']))
		{
			$where			= "WHERE p.user_lang = " . $engine->db->q($_GET['user_lang']) . " ";
		}

		// entries to display
		$limit = 100;

		$status = $engine->_t('AccountStatusArray');

		// collecting data
		$count = $engine->db->load_single(
			"SELECT COUNT(user_name) AS n ".
			"FROM {$engine->db->table_prefix}user u ".
				"LEFT JOIN " . $engine->db->table_prefix . "user_setting s ON (u.user_id = s.user_id) ".
			( $where ? $where : '' ).
			( $where ? 'AND ' : "WHERE ").
				"u.user_name <> '" . $engine->db->admin_name."' "
			);

		$order_pagination	= isset($_GET['order']) ? $_GET['order'] : '';
		$pagination			= $engine->pagination($count['n'], $limit, 'p', 'mode=' . $module['mode'].(!empty($order_pagination) ? '&amp;order=' . htmlspecialchars($order_pagination, ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET) : ''), '', 'admin.php');

		$users = $engine->db->load_all(
			"SELECT u.user_id, u.user_name, u.email, u.user_ip, u.signup_time, u.enabled, u.account_status, s.user_lang ".
			"FROM {$engine->db->table_prefix}user u ".
				"LEFT JOIN " . $engine->db->table_prefix . "user_setting s ON (u.user_id = s.user_id) ".
			( $where ? $where : '' ).
			( $where ? 'AND ' : "WHERE ").
				"u.account_type = '0' ".
				"AND u.user_name <> '" . $engine->db->admin_name."' ".
			( $order ? $order : 'ORDER BY u.user_id DESC ' ).
			$pagination['limit']);

		// count records by status
		$account_stati =  $engine->db->load_all(
				"SELECT account_status, count(account_status) AS n
				FROM " . $engine->db->table_prefix . "user
				WHERE account_type = '0'
					AND user_name <> '" . $engine->db->admin_name."'
				GROUP BY account_status");

		// set default status count
		$status_count['0'] = 0; // approved
		$status_count['1'] = 0; // pending
		$status_count['2'] = 0; // denied

		foreach ($account_stati as $account_status)
		{
			if ($account_status['account_status'] < 3)
			{
				$status_count[$account_status['account_status']] = $account_status['n'];
			}
		}

		// user filter form
		$search =			$engine->form_open('search_user', ['form_method' => 'get']).
							'<input type="hidden" name="mode" value="' . $module['mode'] . '" />' .  // required to pass mode module via GET
							$engine->_t('UsersSearch') . ': </td><td>' . 
							'<input type="search" name="user" maxchars="40" size="30" value="' . (isset($_GET['user']) ? htmlspecialchars($_GET['user'], ENT_COMPAT | ENT_HTML401, HTML_ENTITIES_CHARSET) : '') . '" /> '.
							'<input type="submit" id="submit" value="' . $engine->_t('UsersFilter') . '" /> '.
							$engine->form_close();
		$filter_status =	'<p class="right">' . 
							(isset($_GET['account_status']) && $_GET['account_status'] == 1 || !isset($_GET['account_status'])
								? '<span class="active">' . $engine->_t('Pending') . '</span>'
								: '<a href="' . $engine->href() . '&amp;account_status=1">' . $engine->_t('Pending') . '</a>' ) . ' (' . $status_count['1'] . ')'.
							(isset($_GET['account_status']) && $_GET['account_status'] == 0
								? ' | <span class="active">' . $engine->_t('Approved') . '</span>'
								: ' | <a href="' . $engine->href() . '&amp;account_status=0">' . $engine->_t('Approved') . '</a>') . ' (' . $status_count['0'] . ')'.
							(isset($_GET['account_status']) && $_GET['account_status'] == 2
								? ' | <span class="active">' . $engine->_t('Denied') . '</span>'
								: ' | <a href="' . $engine->href() . '&amp;account_status=2">' . $engine->_t('Denied') . '</a>') . ' (' . $status_count['2'] . ')'.
							'</p>';

		echo '<span class="right">' . $search . '</span><br />';
		echo $filter_status;

		echo $engine->form_open('approve');

		/////////////////////////////////////////////
		//   control buttons
		/////////////////////////////////////////////

		$control_buttons =	'<br />' . 
							'<input type="submit" id="button" name="approve" value="' . $engine->_t('Approve') . '" /> '.
							'<input type="submit" id="button" name="remove" value="' . $engine->_t('Deny') . '" /> '.
							'<input type="hidden" name="ids" value="' . implode('-', $set) . '" />' . 
							'<br />' . "\n".
								'<input type="submit" name="set" id="submit" value="' . $engine->_t('ModerateSet') . '" /> '.
								($set
										? '<input type="submit" name="reset" id="submit" value="' . $engine->_t('ModerateReset') . '" /> '.
										'&nbsp;&nbsp;&nbsp;<small>ids: '.implode(', ', $set) . '</small>'
										: ''
								);

		$approve_icon	= '<img src="' . $engine->db->theme_url.'icon/spacer.png" title="' . $engine->_t('Approve') . '" alt="' . $engine->_t('Approve') . '" class="btn-approve"/>';
		$deny_icon		= '<img src="' . $engine->db->theme_url.'icon/spacer.png" title="' . $engine->_t('Deny') . '" alt="' . $engine->_t('Deny') . '" class="btn-deny"/>';

		# echo $control_buttons;
		echo '<br />';

		$engine->print_pagination($pagination);
?>
		<table style="padding: 3px;" class="formation listcenter">
			<tr>
				<!--<th style="width:5px;"></th>-->
				<!--<th style="width:5px;"></th>-->
				<th style="width:5px;">ID</th>
				<th style="width:20px;"><a href="<?php echo $engine->href() . '&amp;order=' . $orderuser; ?>"><?php echo $engine->_t('UserName'); ?></a></th>
				<th><?php echo $engine->_t('UserEmail'); ?></th>
				<th><?php echo $engine->_t('UserIP'); ?></th>
				<th style="width:20px;"><?php echo $engine->_t('UserLanguage'); ?></th>
				<th style="width:20px;"><a href="<?php echo $engine->href() . '&amp;order=' . $signup_time; ?>"><?php echo $engine->_t('UserSignuptime'); ?></a></th>
				<th style="width:20px;"><?php echo $engine->_t('UserEnabled'); ?></th>
				<th style="width:20px;"><?php echo $engine->_t('AccountStatus'); ?></th>
				<th style="width:200px;"><?php echo $engine->_t('UserActions'); ?></th>
			</tr>
<?php
		if ($users)
		{
			foreach ($users as $row)
			{
				echo '<tr class="lined">' . "\n".
						'<input type="hidden" name="user_id" value="' . $row['user_id'] . '" />' . 
						#'<td style="vertical-align:middle; width:10px;" class="label">' . 
						#	'<input type="checkbox" name="' . $row['user_id'] . '" value="id" '.( in_array($row['user_id'], $set) ? ' checked="checked "' : '' ) . '/>' . 
						#'</td>' . 
						#'<td>' . 
						#	'<input type="radio" name="user_id" value="' . $row['user_id'] . '" />' . 
						#'</td>' . <a href="?mode=db_restore">Restore database</a>
						'<td>' . $row['user_id'] . '</td>' . 
						'<td style="padding-left:5px; padding-right:5px;"><strong><a href="?mode=user_users'.'&amp;user_id=' . $row['user_id'] . '">' . $row['user_name'] . '</a></strong></td>' . 
						'<td>' . $row['email'] . '</td>' . 
						'<td>' . $row['user_ip'] . '</td>' . 
						'<td><small><a href="' . $engine->href() . '&amp;user_lang=' . $row['user_lang'] . '">' . $row['user_lang'] . '</a></small></td>' . 
						'<td><small>' . date($engine->db->date_precise_format, strtotime($row['signup_time'])) . '</small></td>' . 
						'<td>' . $row['enabled'] . '</td>' . 
						'<td><a href="' . $engine->href() . '&amp;account_status=' . $row['account_status'] . '">' . $status[$row['account_status']] . '</a></td>' . 
						'<td>' . 
							((isset($_GET['account_status']) && $_GET['account_status'] > 0) || !isset($_GET['account_status'])
								? '<a href="' . $engine->href() . '&amp;approve=1&amp;user_id=' . $row['user_id'] . '">' . $approve_icon.'' . $engine->_t('Approve') . '</a>'
								: '').
							((isset($_GET['account_status']) && $_GET['account_status'] < 2) || !isset($_GET['account_status'])
								? '<a href="' . $engine->href() . '&amp;approve=2&amp;user_id=' . $row['user_id'] . '">' . $deny_icon.'' . $engine->_t('Deny') . '</a>'
								: '').
						'</td>' . 
					'</tr>';
			}
		}
		else
		{
			echo '<tr><td colspan="5"><br /><em>' . $engine->_t('NoMatchingUser') . '</em></td></tr>';
		}
?>
			</table>
<?php
		$engine->print_pagination($pagination);

		/////////////////////////////////////////////
		//   control buttons
		/////////////////////////////////////////////

		# echo $control_buttons;
		echo $engine->form_close();
	}

?>
