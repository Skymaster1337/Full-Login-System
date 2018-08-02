<style type="text/css"> @import url("../Assets-System/css/all.css"); </style>
<style type="text/css"> @import url("../Assets-System/css/adminuser.css"); </style>
<?php include('admin-includes/rules.php');?>
<?php include('../includes/head.php');?>
<?php include('adminPage_nav.php');?>

<body>     
	<div class="row">
		<?php include ("adminPage_leftside.php");?>
		<div class="col-md-8">
		  <?php
			if (!isset($_GET['s'])) {
						include("adminfrontPage.php");
					} else if (isset($_GET['s']) && file_exists($_GET['s'].".inc.php")) {
						include($_GET['s'].".inc.php");
					} else {
						echo'<center><img src="img/userpic/Coming-Soon.jpg"</center>';
					}
		?>
	   </div>
	</div>
</body>
