<?php
session_start();
    include_once '../admin/includes/class.user.php';
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
		<?php include_once '../admin/includes/head.php';?>
		<link rel="stylesheet" href="../assets-system/css/custom.css"/>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
        <a class="navbar-left" href="../../movieverse.php">MovieVerse</a>
		  <div class="container">
				<a class="navbar-left" href="home.php">Home</a>
				<?php
					// Offer the Admin Page if Admin
					if($user->has_role($uid, array("ADMIN", "MODERATOR") )){
						echo '<a class="navbar-left" href="admin/adminPage.php">Mgr Page</a>';
					}
				?>
				<a class="navbar-right" href="../../admin/home.php?q=logout">LOGOUT</a>
		  </div>
          
		</nav>
        <div class="d-flex background-nav2">
			<div class="mr-auto p-2">Welcome Back <?php echo $userData ['fname']?></div>
			<div class="p-2 nav2">|<a href="nav/support/support.php">Support</a></div>
			<div class="p-2 nav2">|<a href="nav/favorits/favorits.php">My Favorites</a></div>
			<div class="p-2 nav2">|<a href="nav/library/all/currently-watching.php">Library</a></div>
			<div class="p-2 nav2">|<a href="nav/recommendations/recommendations.php">My Recommendations</a></div>
			<div class="p-2 nav2">|<a href="settings/settings.php">Settings</a></div>
			<div class="p-2 nav2">|<a href="nav/messages/messages.php">Messages</a></div>
			<div class="p-2 nav2">|</div>
		</div>
		<br>
		<div class="row margin">
			<div class="col-md-4">
            <div class="previewImage"><img class="icon" src='<?php echo $target_file; ?>'></div>
				<br><b>
				</b>
				<br>First Name: <?php echo ucwords($userData['fname']); ?>
				<br>Last Name: <?php echo ucwords($userData['lname']); ?>
				<br>Email: <?php echo $userData['uemail']; ?>
				<br>Joined: 20 april 2018
			</div>
			<div class="col-md-4">
			   <h1>
				<center>
					alt indhold
				</center>
			  </h1>
		   </div>
           <div class="col-md-4 userstats-background">
           User stats<br>
           <div class="previewImage"><img src='<?php echo $target_file; ?>'></div><br>
            <div class="userstatsborder"><?php
				if($user->has_role($uid, "ADMIN")){
						echo "Group: Admin";
					}
					else if($user->has_role($uid, "MODERATOR")) {
						echo "Group: Mod";
					}
					else {
						echo "Group: User";
					}
					?>
             </div>
                    <div class="userstatsborder">Joined: 20 Jan 2018</div>
                    <div class="userstatsborder">Last Seen: 20:18</div>
                    <div class="userstatsborder">Local Time: 03:01am</div>
                    <div class="userstatsborder"><a href="../../Lastpost.php">Last Post</a> 10 hours 20 mionutes ago</div>
                    <div class="userstatsborder">Location: Nowhere</div>
                    <div class="userstatsborder">Status: Chilling</div>
			</div>
		</div>
	</body>
