<div class="col-md-9 profile-background">
		<form class="form-horizontal" method="post" action="" onsubmit="return valider(this)">
			<input type="hidden" name="uid" value="<?php echo $userData['uid']; ?>">
	<fieldset>
		<legend>User Profile <?php echo doTell($_SESSION['UPDATE'])?" (Updated)":""; ?></legend>
			<div class="input-group mb-3">
				<label class="col-md-3 control-label" for="fname">Full name:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
      				</div>
   						<input id="fname" name="fname" type="text" placeholder="" value="<?php echo doTell($userData['fname']); ?>" class="form-control input-md">
   			 </div>
			<div class="input-group mb-3">
				<label class="col-md-3 control-label" for="lname">Last name:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
      				</div>
   						<input id="lname" name="lname" type="text" placeholder="" value="<?php echo doTell($userData['lname']); ?>" class="form-control input-md">
   			 </div>			
			<div class="input-group mb-3">
				<label class="col-md-3 control-label" for="email">Email Address:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
      				</div>
   						<input id="email" name="email" type="text" placeholder="" value="<?php echo doTell($userData['uemail']); ?>" class="form-control input-md">
   			 </div>
			<div class="input-group mb-3">
				<label class="col-md-3 control-label" for="address">Address:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card"></i></span>
      				</div>
   						<input id="address" name="address" type="text" placeholder="" value="<?php echo doTell($userData['address']); ?>" class="form-control input-md">
   			 </div>
			 <div class="input-group mb-3">
				<label class="col-md-3 control-label" for="zipcode">Zipcode:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-sticky-note-o"></i></span>
      				</div>
   						<input id="zipcode" name="zipcode" type="text" placeholder="" maxlength="6" value="<?php echo doTell($userData['zipcode']); ?>" class="form-control input-md">
   			 </div>
			<div class="input-group mb-3">
				<label class="col-md-3 control-label" for="city">City:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-building"></i></span>
      				</div>
   						<input id="city" name="city" type="text" placeholder="" value="<?php echo doTell($userData['city']); ?>" class="form-control input-md">
   			 </div>
			 <div class="input-group mb-3">
				<label class="col-md-3 control-label" for="phonephone">Phone Number:</label>
      				<div class="input-group-prepend active">  
       					 <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
      				</div>
   						<input id="phone" name="phone" type="text" placeholder="" maxlength="12" value="<?php echo doTell($userData['phone']); ?>" class="form-control input-md">
   			 </div>

						<div class="form-group">
							<label class="col-md-4 control-label" ></label>
							<div class="col-md-4">
								<input class="btn btn-success" type="submit" value="Submit" name="Submit">
							</div>
						</div>
					</fieldset>
				</form>
                 <div class="main">
    <form action="" method="POST" enctype="multipart/form-data">
		<div class="previewImage2"><img class="icon" src='<?php echo $target_file; ?>'></div>
      <input type="file" name="image" class="inp" required>
		<p>Accepted JPG, JPEG, PNG & GIF files are allowed
			<br>Max 2mb</p>
      <input type="submit" name="submit" value="Upload" class="btn">
      <h2><?php 
	      if(!$result){
		      echo "<div class='fail'>". $error . $reason."</div>";
	      }else{
	      echo "<div class='success'>". $result .'</div>';
	      }
	      ?></h2>
    </form>
	  <br>
    
</div>
				<?php include ('change-pw-email.php');?>
		   </div>