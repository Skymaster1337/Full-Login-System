<?php
session_start();
    include_once '../../admin/admin-includes/class.user.php';
    $user = User::getInstance();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("Location: ../login.php");
    }
    if (isset($_GET['q'])){
        header("Location: ../login.php?q");
    }
	
	if(isset($_POST['Submit'])) {
		// $uid, $fname, $lname, $email, $address, $zipcode, $city, $phone
		User::updateProfile($uid, c($_POST["fname"]), c($_POST["lname"]), c($_POST["email"]), c($_POST["address"]), c($_POST["zipcode"]), c($_POST["city"]), c($_POST["phone"]));
		
		// Update Password if Matching stored Password.
		if( $user->match_password($user->get_uid(), $_POST['old_password']) == true){
			$user->update_password_cu($_POST['password']);
		}
		
		$_SESSION['UPDATE'] = true;
		if(mysqli_errno($mysqli)){
			echo mysqli_error($mysqli);
			exit();
		}
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	else {
		unset($_SESSION['UPDATE']);
	}

	function doTell(&$in, $default = ""){
		return isset($in)?$in:$default;
	}
		            
	$userData = $user->get_user_by_id($uid);
?>
<?php
// define variables and set to empty values
//$fname_error = $lname_error = $email_error = "";
//$fname = $lname = $uemail = "";
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    function test_input($data) {
//        $data = trim($data);
//        $data = stripslashes($data);
//        $data = htmlspecialchars($data);
//        return $data;
//      }
//
//      $checkPns = true;
//if (isset($_POST['submit'])){
//    
//    $fname = strip_tags(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING));
//	if (empty($_POST["fname"]) || strlen($_POST["fname"])<3) {
//    $fname_error = "Enter Your First Name";
//    $checkPns = false;
//  } else {
//    //echo 'succes';
//    }
//
//	$lname = strip_tags(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING));
//	 if (empty($_POST["lname"]) || strlen($_POST["lname"])<3) {
//    $lname_error = "Enter Your Last Name";
//    $checkPns = false;
//  } else {
//    //echo 'succes';
//    }
//
//    $exMail = substr($_POST["uemail"], strpos($_POST["uemail"], "@") + 1);    
//    $exMail = strpos($_POST["uemail"], '.');
//
//    if(strpos($_POST["uemail"], '@') > 0 && strpos($_POST["uemail"], '.')>0 && $exMail > strpos($_POST["uemail"], '@') ){
//        $chkEmail = true;
//    } else {
//        $chkEmail = false;
//    }
//
//	$uemail = strip_tags(filter_input(INPUT_POST, 'uemail', FILTER_SANITIZE_EMAIL));
//	 if (empty($_POST["uemail"]) || strlen($_POST["uemail"])<3 || $chkEmail == false) {
//    $email_error = "Enter Your Email (Example: xxx@hotmail.com)";
//    $checkPns = false;
//  }
//	if($checkPns == true){
//		echo'Your information have been updated'
//	;}
//}
?>
<?php
$result='';
$error = '';
$reason = '';
    
$target_file = "data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDMwLjMzNiAzMC4zMzYiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDMwLjMzNiAzMC4zMzY7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPGc+Cgk8Zz4KCQk8cGF0aCBkPSJNMTkuNDc1LDI3LjI1SDBjMC0zLjk2NywyLjYwMi03LjM0Niw2LjI2NC04LjY4NmMtMC43ODctMC43OTctMS4zNTctMi4wMTUtMS42NDMtMy44NDggICAgYy0wLjM3NywwLjA3Ny0wLjk2My0wLjM1NS0xLjEzNy0xLjAxNGMtMC4xNzYtMC42NjktMC4yOTEtMS43NSwwLjA5LTEuODUzYzAuMTEzLTAuMDMsMC4yMzItMC4wMDksMC4zNDgsMC4wNTJ2LTEuODYgICAgYzAtMi45MjktMC42ODktNC42NDgsNC4wOTYtNS4xMzlMNy45NzUsNC44OTJjMCwwLDMuNzcxLTAuMzYyLDQuNzY0LTEuMjU3YzAsMCwwLjAyNywwLjc1NCwwLjQzMSwxLjU4MiAgICBjMi4yMDcsMC44NDcsMi40ODMsMi44MDEsMi40MjEsNC44MjZ2MS44NmMwLjExOC0wLjA2MSwwLjIzNS0wLjA4MiwwLjM1LTAuMDUyYzAuMzgxLDAuMTA0LDAuMTc4LDEuMjI2LDAuMDAyLDEuODk2ICAgIGMtMC4xNywwLjY1Mi0wLjY2NiwxLjA0LTEuMDM5LDAuOTdjLTAuMjc5LDEuNzQ1LTAuODkyLDIuOTk2LTEuNzQsMy44MjlDMTYuODQ2LDE5Ljg3MiwxOS40NzUsMjMuMjYzLDE5LjQ3NSwyNy4yNXogICAgIE0yOS45ODYsOC44MzZjMC4yMTYtMC40MjgsMC4zNDktMC45MDQsMC4zNDktMS40MTZjMC0xLjc0OS0xLjQxOC0zLjE2Ny0zLjE2Ny0zLjE2N2MtMC40MjYsMC0wLjgzMSwwLjA4Ny0xLjIwMiwwLjIzOSAgICBjLTAuNTY3LTAuODQ3LTEuNTM0LTEuNDA2LTIuNjMxLTEuNDA2Yy0xLjUyMiwwLTIuNzk0LDEuMDc3LTMuMDk3LDIuNTFjLTEuNzAzLDAuMDUyLTMuMDcsMS40NDEtMy4wNywzLjE1NyAgICBjMCwxLjc0OSwxLjQxOCwzLjE2NywzLjE2NywzLjE2N2MwLjA0NSwwLDAuMDg2LTAuMDExLDAuMTMtMC4wMTNjMC41MDIsMS4wODcsMS41OTYsMS44NDYsMi44NywxLjg0NiAgICBjMC44MjMsMCwxLjU2NS0wLjMyMiwyLjEzLTAuODM3YzAuNDkzLDAuMzE2LDEuMDc1LDAuNTA1LDEuNzA0LDAuNTA1YzEuNzQ5LDAsMy4xNjctMS40MTgsMy4xNjctMy4xNjcgICAgQzMwLjMzNiw5Ljc0MSwzMC4yMDMsOS4yNjQsMjkuOTg2LDguODM2eiBNMjEuMzM1LDE0LjAwM2MtMC42OSwwLTEuMjUsMC41Ni0xLjI1LDEuMjVzMC41NiwxLjI1LDEuMjUsMS4yNXMxLjI1LTAuNTYsMS4yNS0xLjI1ICAgIFMyMi4wMjUsMTQuMDAzLDIxLjMzNSwxNC4wMDN6IE0xOS4xOTcsMTYuMjU0Yy0wLjU1My0wLjAxOC0xLjAxMiwwLjQxNy0xLjAyOSwwLjk2OWMtMC4wMTgsMC41NTMsMC40MTcsMS4wMTQsMC45NzEsMS4wMyAgICBjMC41NTMsMC4wMTcsMS4wMTItMC40MTcsMS4wMjktMC45NjlDMjAuMTg2LDE2LjczLDE5Ljc1MSwxNi4yNzEsMTkuMTk3LDE2LjI1NHoiIGZpbGw9IiMwMDAwMDAiLz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K";
    
    if(isset($_POST["submit"])) {
		$target_file='avatar/'.$_FILES['image']['name']; //keep the name when upload
	   //$target_file ='avatar/'. md5(file_get_contents($_FILES['image']['tmp_name'])); // hashing the name when upload
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
       // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['image']['tmp_name']);
        $valid_types = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_GIF);
    	  if(in_array($check[2],  $valid_types)) {
            $reason .= 'File is an image - ' . $check['mime'] . '.';
            $uploadOk = 1;
    } else {
        $reason .='Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }
				
		// Check if file already exists
		if (file_exists($target_file)) {
			$reason .= 'File already exists. ';
			$uploadOk = 0;
			//echo 'file already exist';
		}
		// Check file size
		if ($_FILES['image']['size'] > 500000) {
			$reason .= 'Your file is too large. ';
			$uploadOk = 0;
			//echo 'file to big';
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$error .= 'Sorry, your file was not uploaded. ';
			$target_file = '';
			
			if(!$uploadOk) { 
				$target_file = '';
			}
		// If everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
				$result .= 'The file '. basename( $_FILES['image']['name']). ' has been uploaded. ';
				$query = "INSERT INTO imageupload (image_path) VALUES ('image_path')";
			} else {
				$result= 'Sorry, there was an error uploading your file. '. $error;
				$target_file = '';
			}
		}
	}
?>
	<head>
		<?php include_once '../../admin/admin-includes/head.php';?>
		<link rel="stylesheet" href="../../Assets-System/css/user.css"/>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
				<a class="navbar-left" href="../home.php">Home</a>
				<?php
					// Offer the Admin Page if Admin
					if($user->has_role($uid, array("ADMIN", "MODERATOR") )){
						echo '<a class="navbar-left" href="../../../adminPage.php">Mgr Page</a>';
					}
				?>
				<a class="navbar-right" href="../home.php?q=logout">LOGOUT</a>
		  </div>
		</nav>
            <?php include('includes/nav2.php');?>
        
		<div class="row margin">
			<?php include('includes/leftUser.php');?>
			<?php include('includes/userData.php');?>
		</div>
	</body>
</html>
