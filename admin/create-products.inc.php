<?php
/*session_start();
require_once('admin-includes/class.user.php');
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
}*/
?>
<br>
In this page you should be able to create a product.<br><br>

Pick movie or serie
<select>
  <option value="choose">Choose one </option>
  <option value="Movie">Movie</option>
  <option value="Serie">Serie</option>
</select>
	<br>

Pick Genre
<select>
  <option value="choose">Choose one </option>
  <option value="Action">Action</option>
  <option value="Adventure">Adventure</option>
  <option value="Fantasy">Fantasy</option>
  <option value="Thriller">Thriller</option>
  <option value="Comedy">Comedy</option>
</select>
	<br><br>

<input type="text" name="Year" placeholder="Input Year Release"> <button>Add Another Actor</button><br>
<input type="text" name="Actor" placeholder="Input Actor"> <button>Add Another Actor</button><br>
<input type="text" name="Director" placeholder="Input Director"> <button>Add Another Director</button><br>
<input type="text" name="Writer" placeholder="Input Writer"> <button>Add Another Writer</button><br>

Pick Age
<select>
  <option value="choose">Choose one </option>
  <option value="PG-13">PG-13</option>
	<option value="16">16</option>
  <option value="All">All</option>
  <option value="R">R</option>
</select>

<br><br><button type="button" class="btn btn-success">Add</button>