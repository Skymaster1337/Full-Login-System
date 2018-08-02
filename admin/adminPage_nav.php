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