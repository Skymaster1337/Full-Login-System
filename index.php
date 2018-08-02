<?php require_once('admin/admin-includes/class.user.php');?>
<?php include 'includes/head.php'?>
<style type="text/css"> @import url("Assets-System/css/all.css"); </style>
	
	<?php include 'includes/header.php'?>
	   <?php
			if (!isset($_GET['s'])) {
						include("includes/frontpage.php");
					} else if (isset($_GET['s']) && file_exists($_GET['s'].".inc.php")) {
						include($_GET['s'].".inc.php");
					} else {
						echo'<center><img src="img/userpic/Coming-Soon.jpg"</center>';
					}
		?>
<?php include'includes/footer.php'?>