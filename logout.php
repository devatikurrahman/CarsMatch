<?php 
	//error_reporting(E_ALL); ini_set('display_errors', 1);
	require_once("includes/config.inc.php"); 
	session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	
	
	unset($_COOKIE['user_jalan_cookie']);
    unset($_COOKIE['cookie_lead_id']);
    setcookie('user_jalan_cookie', null, -1, '/');
    setcookie('cookie_lead_id', null, -1, '/');
	
	
	header('Location: ' . site_url);

?>


