<?php
session_start();
    include_once '../../../../../admin/admin-includes/class.user.php';
    $user = User::getInstance();
    $uid = $_SESSION['uid'];
    if (!$user->get_session()){
       header("Location: ../../../../login.php");
    }
    if (isset($_GET['q'])){
        header("Location: ../../../../login.php?q");
    }
	$userData = $user->get_user_by_id($uid);
?>
	<head>
		<?php include_once '../../../../../admin/admin-includes/head.php';?>
		<link rel="stylesheet" href="../../../../../Assets-System/css/user.css"/>
		<link rel="stylesheet" href="../../assets/library.css"/>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
				<a class="navbar-left" href="../../../../home.php">Home</a>
				<?php
					// Offer the Admin Page if Admin
					if($user->has_role($uid, array("ADMIN", "MODERATOR") )){
						echo '<a class="navbar-left" href="../../../../adminPage.php">Mgr Page</a>';
					}
				?>
				<a class="navbar-right" href="../../../../home.php?q=logout">LOGOUT</a>
		  </div>
		</nav>
		
		<div class="d-flex background-nav2">
			<div class="mr-auto p-2">Welcome Back <?php echo $userData ['fname']?></div>
			<div class="p-2 nav2">|<a href="">Support</a></div>
			<div class="p-2 nav2">|<a href="">My Favorites</a></div>
			<div class="p-2 nav2">|<a href="../../../../../admin/navbar/library/anime/admin/navbar/library/library-php/library.php">Library</a></div>
			<div class="p-2 nav2">|<a href="">My Recommendations</a></div>
			<div class="p-2 nav2">|<a href="../../../../../admin/navbar/library/anime/admin/navbar/settings/settings.php">Settings</a></div>
			<div class="p-2 nav2">|<a href="">Messages</a></div>
			<div class="p-2 nav2">|</div>
		</div>
		
		<div class="d-flex all">
			<div class="mr-auto p-2">
				<a href="../../all/currently-watching.php">All</a>
				<a href="../../movies/currently-watching.php">Movies</a>
				<a href="../../series/currently-watching.php">Series</a>
				<a href="../anime.php" class="grey ">Anime</a>
				<a href="../all.php">All</a>
				<a href="currently-watching.php">Movies</a>
				<a class="active" href="../../../../../admin/navbar/library/anime/series/series/currently-watching.php">Series</a>
			</div>
		</div>
		
		<br>
		
		<div class="container">
					<nav class="greycolor">
						<ul>
                        <a href="all.php" class="">All Series</a>
						<a href="currently-watching.php" class="">Currently Watching</a>
						<a href="completed.php" class="">Completed</a>
						<a href="onhold.php" class="">On Hold</a>
						<a href="dropped.php" class="">Dropped</a>
						<a href="plan-to-watch.php" class="active2">Plan to Watch</a>
						<div class="search-container">
							<div id="search-box">
								<input type="text" value=""><a id="search-button" href="javascript: void(0);"><i class="fa fa-search backsearch"></i></a>
							</div>
							</ul>
							</div>
							</nav>
					
				
		
		<div class="row">
			<div class="col-md-12">
				<div class="list-status-title">
					<span class="text">Plan to Watch</span>
				</div>
				<table id="maltest">
					<tr>
						<th class="tagless">#</th>
						<th class="imageless">Image</th>
						<th class="titleless">Title</th>
						<th class="typeless">Type</th>
						<th class="scoreless">Score</th>
						<th class="progressless">Progress</th>
						<th class="noteless">Note</th>
					</tr>
					<tr>
						<td>1</td>
						<td><img src="../../images/sword-art-online.jpg" height=70px width=50px></td>
								  <td><span class="left">Sword Art Online</span><span class="right"><a href="../../../../../admin/navbar/library/anime/more.php">More</a> - <a herf="edit.php">edit</a></span></td>
						<td>Serie</td>
						<td>9.2</td>
						<td>- / xx <i class="fa fa-plus-circle blue plusicon"></i></td>
						<td>
                                <button id="edit">Edit</button>
                                    <div id="note" style="display: none;">
                                        <textarea rows="5" cols="35" id="editMessage"/></textarea>
                                <button id="save">Save</button>
                                    </div>
                           </td>
					</tr>
					      <div>
					<tr>
						<td>2</td>
						<td><img src="../../images/spider-man.jpg" height=70px width=50px></td>
								  <td><span class="left">Spider-man</span><span class="right"><a href="../../../../../admin/navbar/library/anime/more.php">More</a> - <a herf="edit.php">edit</a></span></td>
						<td>Movie</td>
						<td>6.8</td>
						<td>- / xx&nbsp;<i class="fa fa-plus-circle blue"></i></td>
						<div>
							<td>
                                <button id="edit">Edit</button>
                                    <div id="note" style="display: none;">
                                        <textarea rows="5" cols="35" id="editMessage"/></textarea>
                                <button id="save">Save</button>
                                    </div>
                           </td>
						</div>
					</tr>
					<tr>
						<td>3</td>
						<td><img src="../../images/ncis.jpg" height=70px width=50px></td>
								  <td><span class="left">NCIS</span><span class="right"><a href="../../../../../admin/navbar/library/anime/more.php">More</a> - <a herf="edit.php">edit</a></span></td>
						<td>Serie</td>
						<td>7.7</td>
						<td>- / xx <i class="fa fa-plus-circle blue"></i></td>
						<td>
                                <button id="edit">Edit</button>
                                    <div id="note" style="display: none;">
                                        <textarea rows="5" cols="35" id="editMessage"/></textarea>
                                <button id="save">Save</button>
                                    </div>
                           </td>
					</tr>
					<tr>
						<td>4</td>
						<td><img src="../../images/batman.jpg" height=70px width=50px></td>
								  <td><span class="left">Batman</span><span class="right"><a href="../../../../../admin/navbar/library/anime/more.php">More</a> - <a herf="edit.php">edit</a></span></td>
						<td>Movie</td>
						<td>6.2</td>
						<td>- / xx <i class="fa fa-plus-circle blue"></i></td>
						<td>
                                <button id="edit">Edit</button>
                                    <div id="note" style="display: none;">
                                        <textarea rows="5" cols="35" id="editMessage"/></textarea>
                                <button id="save">Save</button>
                                    </div>
                           </td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	</body>

<script src="../../../../../admin/navbar/library/anime/assets/library.js"></script>
