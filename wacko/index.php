<?php

define('IN_WACKO', true);

// initialize engine api
require('class/init.php');
$init = new init();

// define settings
if ($cached_config = $init->load_cached_settings('config'))
{
	$init->config = $cached_config;	// retrieving from cache
}
else
{
	$init->settings();	// populate from config.php

	if (!isset($init->config['wacko_version']))
	{
		$init->installer(); // install
	}

	$init->settings();	// initialize DBAL and populate from config table.

	if (!empty($init->config['wacko_version']))
	{
		$init->installer(); // upgrade R5 and on or show reminder to upgrade to 5.0.x first
	}
}

$init->dbal();
$init->settings('theme_url',	$init->config['base_url'].$init->config['theme_path'].'/'.$init->config['theme'].'/');
$init->settings('user_table',	$init->config['table_prefix'].'user');
$init->settings('cookie_hash',	hash('sha1', $init->config['base_url'].$init->config['system_seed']));
$init->settings('ap_mode',		false);

// run in tls mode?
if ($init->config['tls'] == true && (( ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') && !empty($init->config['tls_proxy'])) || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ) ))
{
	$init->settings('base_url',	str_replace('http://', 'https://'.($init->config['tls_proxy'] ? $init->config['tls_proxy'].'/' : ''), $init->config['base_url']));
}

$init->settings('cookie_path',	preg_replace('|https?://[^/]+|i', '', $init->config['base_url'].''));

if ($init->is_locked() === true || RECOVERY_MODE)
{
	if (!headers_sent())
	{
		header('HTTP/1.1 503 Service Temporarily Unavailable');
	}

	echo 'The site is temporarily unavailable due to system maintenance. Please try again later.';
	exit;
}

// misc
$init->request();
$init->session();
$init->http_security_headers();

// engine start
$init->cache();
$init->cache('check');
$engine	= $init->engine();
$init->cache('log');

if (!empty($init->config['ext_bad_behavior']))
{
	require_once('lib/bad_behavior/bad-behavior-wackowiki.php');
}

// execute and cache
$init->engine('run');
$init->cache('store');
$init->debug();

// closing tags
if (strpos($init->method, '.xml') === false)
{
	echo "\n</body>\n</html>";
}

// out
if ( !headers_sent() )
{
	header('Cache-Control: public');
	header('Pragma: cache');
}

ob_end_flush();

?>
