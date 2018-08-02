<?php
session_start();
require_once('class.user.php');
$user = User::getInstance();
$uid = $_SESSION['uid'];

if (!$user->get_session()){
    header("Location: home.php");
	exit(); # Stop Loading
}
//$userData = $user->get_user_by_id($uid);
$userData = User::getUser();

// Check User Perms
if(!$user->has_role($uid, array("ADMIN", "MODERATOR") )){
  header("Location: home.php");
}

$role_level = 0;
$role = $user->fetch_role($uid);
switch(strtoupper($role)){
	case "MODERATOR":
		// Authorized
	break;

	case "ADMIN":
		// Authorized
	break;

	default:
		http_response_code(403);
		header("Location: home.php");
	exit(); # Stop Loading
	break;
}
?>