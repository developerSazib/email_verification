<?php require_once 'inc/header.php'; ?>
  <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
          <div class="registration_area mt-5">
            <h2 class="text-light text-center">Sign up area</h2>
            <?php
            if (isset($_POST['register'])) {
            //get data from form
            $user_id    = rand(100000, 999999);
            $f_name     =  mysqli_real_escape_string($link , $_POST['f_name']);
            $l_name     =  mysqli_real_escape_string($link ,$_POST['l_name']);
            $email      =  mysqli_real_escape_string($link ,$_POST['email']);
            $c_email    =  mysqli_real_escape_string($link , $_POST['c_email']);
            $password   =  mysqli_real_escape_string($link ,$_POST['password']);
            $c_password =  mysqli_real_escape_string($link,$_POST['c_password']);
            // generate verification key
            $v_key = md5(time().$email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (!empty($f_name) && !empty($l_name) && !empty($email) && !empty($c_email) && !empty($password) && !empty($c_password)) {
            if ($email == $c_email) {
            $chk_mail = mysqli_query($link , "SELECT * FROM `user_info` WHERE `email` = '$email'");
            if (mysqli_num_rows($chk_mail) < 1) {
            if (strlen($password) > 7) {
            if ($password == $c_password) {
            $pass = md5($password);
            // code processign
            $sql = "INSERT INTO `user_info`(`user_id`, `f_name`, `l_name`, `email`, `password`, `status`,`verified_key`) VALUES ('$user_id','$f_name','$l_name','$email','$pass',0,'$v_key')";
            $res = mysqli_query($link , $sql);
            if ($res) {
            // mail sending script
            $to = $email;
            $subject = "email verification";
            $message = "<a href='http://rawscripters.com/testpro/verify.php?vkey=$v_key'>verify your mail</a>";
            // To send HTML mail, the Content-type header must be set
            $headers = 'From:sazibuddin19@gmail.com';
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html'. "\r\n";
            $send_mail = mail($to, $subject, $message , $headers);
              if ($send_mail) {
                echo "<div class='alert alert-success text-center'>"."successfull , please check your email inbox or spam folder for active your account"."</div>";
              }else{
                echo "<div class='alert alert-danger text-center'>"."something wrong please try again later !"."</div>";
              }
            }else{
            echo "<div class='alert alert-danger text-center'>"."something wrong please try again later !"."</div>";
            }
            }else{
            echo "<div class='alert alert-danger text-center'>"."Password not match"."</div>";
            }
            }else{
            echo "<div class='alert alert-danger text-center'>"."Password must be eight chracter"."</div>";
            }
            }else{
            
            echo "<div class='alert alert-danger text-center'>"."This email alredy userd"."</div>";
            }
            }else{
            echo "<div class='alert alert-danger text-center'>"."Email not match"."</div>";
            }
            
            }else{
            echo "<div class='alert alert-danger text-center'>"."All field must be required"."</div>";
            }
            }else{
            echo "<div class='alert alert-danger text-center'>"."This email is not valid"."</div>";
            }
            
            }
            ?>
            <!-- regstration form  -->
            <form action="registration.php" id="reg_form" method="post">
              <div class="form-group">
                <label for="f_name">First name</label>
                <input type="text" id="f_name" name="f_name" value="<?php if (isset($f_name)) {echo $f_name;}?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="l_name">Last name</label>
                <input type="text" id="l_name" name="l_name" value="<?php if (isset($l_name)) {echo $l_name;}?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php if (isset($email)) {echo $email;}?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="c_email">Conform Email</label>
                <input type="email" id="c_email" value="<?php if (isset($c_email)) {echo $c_email;}?>" name="c_email" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" value="<?php if (isset($password)) {echo $password;}?>" name="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="c_password">Conform Password</label>
                <input type="password" id="c_password" value="<?php if (isset($c_password)) {echo $c_password;}?>" name="c_password" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" name="register" class="btn btn-primary btn-block rounded-0" value="register">
              </div>
            </form>
            <p style="color: #fff; text-align: center;">Already have an account ? please <a style="text-decoration: none;" href="login.php">login</a></p>
          </div>
        </div>
      </div>
    </div>
<?php require_once 'inc/footer.php'; ?>