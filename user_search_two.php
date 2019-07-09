<?php session_start();?>
<?php require_once 'inc/header.php'; ?>
<?php 
	if (!isset($_SESSION['user_login_success'])) {
		header("location:login.php");
	}
 ?>

<div class="profile_menu">
		<nav class="navbar navbar-expand-lg navbar-light bg-light"><!-- 
  <a class="navbar-brand" href="#">Navbar w/ text</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link" href="user_search_two.php">Search user one</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_profile.php">user profile</a>
      </li>
   <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
	</div>
 <div class="container">
 	<div class="row">
 		<div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
 			<form action="" id="searchForm" method="post">
 				<div class="row">
 					<div class="col-md-9 col-lg-9">
 					<div class="form-group">
 					<label for="user_id"><b>Slect a user id</b></label>
 				    <input type="text" name="user_id" class="form-control" id="user_id"> 
 				</div>
 				</div>
 				<div class="col-md-3 col-lg-3">
 					<div class="form-group text-right" style="margin-top: 30px;">
 					<input type="submit" class="btn btn-success" name="search_user" value="serch user">
 				</div>
 				</div>
 				</div>
 			</form>
 			<hr>
		<?php 
			if (isset($_POST['search_user'])) {
				 $user_id = $_POST['user_id'];

				 $search_res = mysqli_query($link , "SELECT * FROM `user_info` WHERE `user_id` = $user_id LIMIT 1");
				 	$row = mysqli_fetch_assoc($search_res);
				 	?>
						<div class="profile_box p-3">
          
                <h5 class="text-center pt-2">Welcome <?php echo $row['f_name']." ".$row['l_name'];?></h5>
          <hr>
            <div class="profile_img bg-info">
            <img class="img-circle" src="images/person-man.png" alt="">
          </div>  
          <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
              <table class="table">
            <tr>
              <td style="width: 40%"><b>first name</b> </td>
              <td style="width: 10%"><b>:</b></td>
              <td style="width: 50%"><?php echo $row['f_name'];?></td>
            </tr>
            <tr>
              <td style="width: 40%"><b>last name</b> </td>
              <td style="width: 10%"><b>:</b></td>
              <td style="width: 50%"><?php echo $row['l_name'];?></td>
            </tr>
            <tr>
              <td style="width: 40%"><b>email</b> </td>
              <td style="width: 10%"><b>:</b></td>
              <td style="width: 50%"><?php echo $row['email'];?></td>
            </tr>
            <tr>
              <td style="width: 40%"><b>User id</b> </td>
              <td style="width: 10%"><b>:</b></td>
              <td style="width: 50%"><?php echo $row['user_id'];?></td>
            </tr>
          </table>
            </div>

          <button class="btn btn-primary btn-block">submit</button>
          </div>  

            
 					
 				</div>
				 	<?php 

			}
		?>
 		</div>
 	</div>
 </div>



 <?php require_once 'inc/footer.php'; ?>