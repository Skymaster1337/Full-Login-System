<?php
session_start();
require_once('admin/admin-includes/class.user.php');
$user = User::getInstance();

if ($user->get_session() && !isset($_GET['q'])){
	echo "User is Logged in.";
	echo "Click <a href=\"?q\">Here</a> to Logout!";
	exit();
}
if (isset($_GET['q'])){
	$user->user_logout();
	header( "Refresh:2; url=login.php", true, 303);
	echo "Ok, You are OUT! Bye, See you next time!";
	exit();
}


function i(&$i, $n = "Data") { if(isset($i) && $i !== "") { return $i; } else { die("Missing ".$n."!"); } }

if (isset($_POST['submit'])) {
		$P = $_POST;
	    $login = $user->check_login( i($P['emailusername']), i($P['password']) );
	    if($login == true) {
			if($user->has_role($_SESSION['uid'], "ADMIN")){
				header("Location: admin/adminPage.php");
			} else {
                header("Location: home.php");
            }
	    } else {
	        // Login Failed
	        echo 'Wrong username or password';
	    }
	}
?>
<style type="text/css"> @import url("Assets-System/css/all.css"); </style>
<style type="text/css"> @import url("Assets-System/css/adminuser.css"); </style>
<?php include('includes/head.php');?>

<br><br><br><br>
  <body>
    <div class="container centerALL">
      <form action="" method="POST" name="login">
		<div>
		  <input type="text" name="emailusername" required="">
			<label>Username</label>   
		</div>
		  
        <div>
		  <input type="password" name="password" required="">
			<label>Password</label>   
		</div>
		  
		<div>
		  <p>Remember me<input id="checkBox" type="checkbox" name="remember"></p>
		</div>
		  
            <div class="row">
		 <div class="col-md-6"><input class="btn" type="submit" name="submit" value="Login" onclick="submitlogin()"></div>
			<div class="col-md-6"><a href="forgotpassword.php">forgot password?</a></div><br><br><br>
              <a href="registration.php">Register new user</a>
		   </div>
      </form>
    </div>

  </body>
</html>