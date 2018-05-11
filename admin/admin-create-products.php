<?php
session_start();
require_once('includes/class.user.php');
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

if($_POST)
{
	if(isset($_POST['CP']))
	{
		$overskrift = $_POST["overskrift"];
		$besked = $_POST["besked"];
        $userId = $_SESSION["userId"];
        $katId=$_POST["kategori"];
		// Se side 250
		$sqlStr = "INSERT INTO Beskeder (Overskrift, Besked, Dato, FK_BrugerId, FK_KategoriId)
		VALUES ('$overskrift', '$besked', Now(), $userId, $katId)";
		
		$result = $conn->query($sqlStr);
        if($result)
        {
            header('location:index.php');
            exit();
        }else{
            header('location:index.php?InsertError');
            exit();
        }
	}
    if(isset($_POST["submitGemNyKat"]))
    {
        $kategorinavn = $_POST["kategorinavn"];
		// Se side 250
		$sqlStr = "INSERT INTO Kategorier (Kategorinavn)
		VALUES ('$kategorinavn')";
		
		$result = $conn->query($sqlStr);
        if($result)
        {
            header('location:index.php?task=retKategori');
            exit();
        }else{
            header('location:index.php?InsertCatError');
            exit();
        }
    }
}