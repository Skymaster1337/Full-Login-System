<?php
session_start();
require_once('../admin/includes/class.user.php');
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
<?php include('head.php');?>
    <link rel="stylesheet" type="text/css" href="../assets-system/css/custom.css">
  </head>

  <body>
    <div class="container">
      <center>Admin: Name: spar - Code spar</center>
      <center>Member: Name: hej - Code 1234</center>
      <center>Member2: Name: test - Code 1234</center>
      <h1>Login Here</h1>
      <form action="" method="POST" name="login">
        <table class="table " width="400">
          <tr>
            <th>Username:</th>
            <td>
              <input type="text" name="emailusername" required>
            </td>
          </tr>
          <tr>
            <th>Password:</th>
            <td>
              <input type="password" name="password" required>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>
            Remember me<input id="checkBox" type="checkbox"></input><br>
            <div class="ned">
            <form action="../admin/adminPage.php">
              <input class="btn" type="submit" name="submit" value="Login" onclick="submitlogin()">
              </form>
              <a class="hoejre" href="forgotpassword.php">forgot password?</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><a href="registration.php">Register new user</a></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>