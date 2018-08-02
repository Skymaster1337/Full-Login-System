<?php
session_start();
    include_once '../../admin/admin-includes/class.user.php';
    $user = User::getInstance();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("Location: login.php");
    }
    if (isset($_GET['q'])){
        header("Location: login.php?q");
    }
	$userData = $user->get_user_by_id($uid);
?>

	<head>
		<?php include_once '../../admin/admin-includes/head.php';?>
		<link rel="stylesheet" type="text/css" href="../../Assets-System/css/user.css">
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
        <div class="d-flex background-nav2">
        	<div class="mr-auto p-2">Welcome Back <?php echo $userData ['fname']?></div>
			<div class="p-2 nav2">|<a href="support.inc.php">Support</a></div>
			<div class="p-2 nav2">|<a href="favorits.inc.php">My Favorites</a></div>
			<div class="p-2 nav2">|<a href="library/all/currently-watching.php">Library</a></div>
			<div class="p-2 nav2">|<a href="recommendations.inc.php">My Recommendations</a></div>
			<div class="p-2 nav2">|<a href="../settings/settings.php">Settings</a></div>
			<div class="p-2 nav2">|<a href="messages.inc.php">Messages</a></div>
			<div class="p-2 nav2">|</div>
		</div>
		<br>
		<div class="row margin">
			<div class="col-md-4">
            
			</div>
			<div class="col-md-4">
			   
		   </div>
           <div class="col-md-4">
           
			</div>
		</div>
	</body>
