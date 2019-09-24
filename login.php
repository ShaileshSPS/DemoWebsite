/*
* @author Shailesh
*/
<?php include_once('header.php'); ?>
<?php error_reporting(0);?>
<script type='text/javascript'>
$(document).ready(function(){
  $(".refresh-captcha").click(function(){
      document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
  });
});
</script>
<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'dbusers');

if (isset($_POST['login_user'])) {
	if ($_POST['captcha_challenge'] != $_SESSION['captcha_text']) {
		 header('location: login.php?incorrect_captcha=1');
	}
	else {
		  $username = mysqli_real_escape_string($db, $_POST['form-uname']);
		  $password = mysqli_real_escape_string($db, $_POST['form-password']);

		  $password = md5($password);
		  $query = "SELECT * FROM users WHERE uname='$username' AND password='$password'";
		  $results = mysqli_query($db, $query);
		  
		  if (mysqli_num_rows($results) == 1) {
		   $_SESSION['username'] = $username;
		   $_SESSION['success'] = "You are now logged in";
		   header('location: home.php');
		  }
		  else {
		   header('location: login.php?invalid=1');
		   exit();
		  }
	}
}

?>

<!-- Login -->
<main class="my-form" style="margin:100px 0px 99px 0px">
    <div class="container">
		<!--
		<?php if($_GET['success'] == 1) { ?> <p align="center" class="w3-panel w3-green" style="padding:1rem">User registration Successfull....</p> <?php } ?>
		<?php if($_GET['invalid'] == 1) { ?> <p align="center" class="w3-panel w3-red" style="padding:1rem">Invalid Username Or Password....</p> <?php } ?>
		<?php if($_GET['logout'] == 1) { ?> <p align="center" class="w3-panel w3-blue" style="padding:1rem">You have Successfully Logged Out....</p> <?php } ?>
		--> 
		<?php
		 $display="none";
		 if($_GET['success'] == 1){
			 $display="block";
			 $bgcolor="green";
			 $text="User registration Successfull.";
		 }
		 else if($_GET['invalid'] == 1) {
			 $display="block";
			 $bgcolor="red";
			 $text="Invalid Username Or Password.";
		 }
		 else if($_GET['logout'] == 1) {
			 $display="block";
			 $bgcolor="blue";
			 $text="You have Successfully Logged Out.";
		 }
		 else if($_GET['incorrect_captcha'] == 1) {
			 $display="block";
			 $bgcolor="red";
			 $text="Captcha dint match.";
		 }
		 ?>
		<div id="Page_AlertBox" class="alert text-left z-depth-2 offset-md-3" style="display:<?php echo $display ?>;padding: 5px 5px 5px 15px;margin-bottom: 1rem; color:white; width:550px; background-color:<?php echo $bgcolor ?>">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
			<i class="fa fa-exclamation-circle"></i> <b id="Page_AlertBoxHeading"><?php echo $text ?></b>
			<ul id="Page_AlertBoxMessage" style="padding-left:15px;"></ul>
		</div>
		<div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:#3390FF">Login</div>
                        <div class="card-body">
                            <form name="my-form" method="POST">
                                <!--
								<div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" class="form-control" name="username">
                                    </div>
                                </div>
								
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control">
                                    </div>
                                </div>
								-->
								<div class="md-form">
									<i class="fas fa-user prefix blue-text"></i>
									<input type="text" id="form-uname" name="form-uname" value="<?php $_POST['form-uname'] ?>" class="form-control" required>
									<label for="form-uname">User name</label>
								</div>
								
								<div class="md-form">
									<i class="fas fa-key prefix blue-text"></i>
									<input type="password" id="form-password" name="form-password" value="<?php $_POST['form-password'] ?>" class="form-control" required>
									<label for="form-password">Password</label>
								</div>
								
								<div class="md-form" style="display: inline-flex;">
									<i class="fa fa-edit prefix blue-text"></i>
									<input type="text" class="form-control" style="width:200px"  id="captcha" name="captcha_challenge" pattern="[A-Z]{6}" required>
									<label for="captcha_challenge">Enter Captcha</label>
									<img src="captcha.php" alt="CAPTCHA" class="captcha-image" style="margin-left: 1rem;"><i class="fas fa-redo refresh-captcha" style="position: absolute;right: -25px;top: 1rem;cursor:pointer"></i><br>
								</div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="login_user" class="btn btn-primary" style="border-radius:30px">
                                        Login
                                        </button>
                                    </div>
									<p align="center">
										Not yet a member? <u><a href="register.php">Sign up</a></u>
									</p>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
<!-- /Login -->

<?php include_once('footer.php'); ?>
