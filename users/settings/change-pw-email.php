<?php

if(isset($_POST['old_password'])){
  echo "<div class='red'>Your Password Has been updated</div>";
}

?>
		
        <form action="" method="POST">
          <div class="input-group mb-3">
            <!--<label for="inputPasswordOld" >Old Password</label>-->
            <div class="input-group-prepend active">
              <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i></span>
              <input type="password" name="old_password" id="inputPasswordOld"  class="form-control" placeholder="Old Password" aria-describedby="passwordHelpInline">
            </div>
          </div>
          <div class="input-group mb-3">
          <!--<label for="inputPasswordNew">New Password</label>-->
            <div class="input-group-prepend active">
              <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i></span>
              <input type="password" name="new_password" id="inputPasswordNew"  class="form-control" placeholder="New Password" aria-describedby="passwordHelpInline">
            </div>
          </div>
          <div class="form-group row">
            <div class="input-group">
              <button type="submit" class="btn btn-primary">Set Password</button>
            </div>
          </div>
        </form>
<?php

if(isset($_POST['old_email'])){
  echo "<div class='red'>Your email Has been updated</div>";
}

?>
		
        <form action="" method="POST">
          <div class="input-group mb-3">
            <!--<label for="inputPasswordOld" >Old Email</label>-->
            <div class="input-group-prepend active">
              <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i></span>
              <input type="email" name="old_email" id="inputEmailOld"  class="form-control" placeholder="Old Email" aria-describedby="emailHelpInline">
            </div>
          </div>
          <div class="input-group mb-3">
          <!--<label for="inputPasswordNew">New Email</label>-->
            <div class="input-group-prepend active">
              <span class="input-group-text" id="basic-addon1"> <i class="fa fa-lock"></i></span>
              <input type="password" name="new_email" id="inputEmailNew"  class="form-control" placeholder="New Email" aria-describedby="emailHelpInline">
            </div>
          </div>
          <div class="form-group row">
            <div class="input-group">
              <button type="submit" class="btn btn-primary">Set Email</button>
            </div>
          </div>
        </form>
  </body>
</html>


