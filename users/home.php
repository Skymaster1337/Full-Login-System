<?php
session_start();
    include_once '../../Movieverse/admin/admin-includes/class.user.php';
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

<style type="text/css"> @import url("../assets-system/css/all.css"); </style>
<?php include('../includes/head.php');?>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
        <a class="navbar-left" href="../index.php">MovieVerse</a>
		  <div class="container">
				<a class="navbar-left" href="home.php">Home</a>
				<?php
					// Offer the Admin Page if Admin
					if($user->has_role($uid, array("ADMIN", "MODERATOR") )){
						echo '<a class="navbar-left" href="../admin/adminPage.php">Mgr Page</a>';
					}
				?>
				<a class="navbar-right" href="home.php?q=logout">LOGOUT</a>
		  </div>
          
		</nav>
        <?php include 'usernav.php'?>
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
                    <div class="userstatsborder"><a href="../Lastpost.php">Last Post</a> 10 hours 20 mionutes ago</div>
                    <div class="userstatsborder">Location: Nowhere</div>
                    <div class="userstatsborder">Status: Chilling</div>
			</div>
		</div>
	</body>
