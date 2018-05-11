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
?>

<head>
	<?php include ("includes/head.php");?>
	<link rel="stylesheet" type="text/css" href="../assets-system/css/custom.css">
    <link rel="stylesheet" href="../assets-system/css/custom_admin.css"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container">
			<a class="navbar-left" href="../users/home.php">Home</a>
			<?php
				// Offer the Admin Page if Admin
				if($user->has_role($uid, array("ADMIN", "MODERATOR") )){
					echo '<a class="navbar-left" href="adminPage.php">Mgr Page</a>';
				}
			?>
            <?php
					if($user->has_role($uid, "ADMIN")){
						echo "Welcome Admin!";
					}
					else if($user->has_role($uid, "MODERATOR")) {
						echo "Welcome Mod!";
					}
					else {
						echo "Welcome User!";
					}
				?>
			<a class="navbar-right" href="../users/home.php?q=logout">LOGOUT</a>
	  </div>
	</nav>
    <div class="logo">
                    <span class="simple-text">
                        CMK Mobler
                    </span>
                </div>
                
	<div class="row">
		<?php include ("includes/adminPage_leftside.php");?>
		<div class="col-md-7">
		   <h1>
			<center>
				<br>Welcome <?php echo ucwords($userData['fname']); ?>
				<br>Status: <?php echo $user->get_status($uid); ?>
			</center>
		  </h1>
          <?php
                if($_GET)
                {
					if($_GET["task"] == 'CP')
                    {
                        echo '<h3>New Products</h3>
						<form action="indsaetPost.php" method="post">
                            Title: <input type="text" name="title">';
                            
                            // Dropdown, sql med mere
                            echo '<br><br>
                            <select name="kategori">
                                <option value="0">Choose Categori</option>';
                                $sql = "SELECT * FROM Kategorier";
                                $result=$mysqli->query($sql);
                                while($row=$result->fetch_array(MYSQLI_ASSOC))
                                {
                                    echo '<option value="'.$row["Id"].'">'.$row["Kategorinavn"].'</option>';
                                }
                            echo
                            '</select>';
                            //
                            
                            echo '
                            <br><br>
                            Besked:
                            <textarea cols="25" rows="10"  name="besked"></textarea>
                            <br><br>
                            <input type="submit" class="btn" name="nyBesked" value="Indsæt">
                        </form>
                        ';
                    }
					if($_GET["task"] == 'AP')
                    {
                        echo '<h3>New Products</h3>';
                    }
					if($_GET["task"] == 'CN')
                    {
                        echo '<h3>New Products</h3>';
                    }
					if($_GET["task"] == 'AN')
                    {
                        echo '<h3>New Products</h3>';
                    }
					if($_GET["task"] == 'UR')
                    {
                        echo '';
                    }
                }
                ?>
	   </div>
		<div class="col-md-3">
			<a href="adminPage_users.php">View Users</a><br>
			<a href="adminPage_users.php?edit">Edit Users</a><br>
			<a href="adminPage_users.php?reg">New Users</a><br>
		</div>
	</div>
</body>
