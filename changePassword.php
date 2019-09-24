/*
* @author Shailesh
*/
<?php include_once('innerHeader.php');
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}	
?>
<?php error_reporting(0);?>

<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'dbusers');

if (isset($_POST['change_password'])) {
  $username = $_SESSION['username'];
  $current_password = mysqli_real_escape_string($db, $_POST['form-current-password']);
  $new_password = mysqli_real_escape_string($db, $_POST['form-new-password']);
  $confirm_password = mysqli_real_escape_string($db, $_POST['form-confirm-password']);

  $current_password = md5($current_password);
  $new_password1 = md5($new_password);
  $confirm_password1 = md5($confirm_password);
  
  $query = "SELECT * FROM users WHERE uname='$username' AND password='$current_password'";
  $results = mysqli_query($db, $query);
  
  if (mysqli_num_rows($results) == 1) {
	if($new_password == $confirm_password) {
		$query1 = "UPDATE users SET password='$new_password1' WHERE uname='$username'";
		mysqli_query($db, $query1);
		header('location: changePassword.php?success=1');
	}  
	else {
		header('location: changePassword.php?invalid_confirm=1');
	}
  }
  else {
   header('location: changePassword.php?invalid_match=1');
  }
}
?>

<!-- Change Password -->
<main class="my-form" style="margin:100px 0px 120px 0px">
    <div class="container">
		<?php
		 $display="none";
		 if($_GET['success'] == 1){
			 $display="block";
			 $bgcolor="green";
			 $text="Password changed Successfully.";
		 }
		 else if($_GET['invalid_match'] == 1) {
			 $display="block";
			 $bgcolor="red";
			 $text="Current Password is incorrect.";
		 }
		 else if($_GET['invalid_confirm'] == 1) {
			 $display="block";
			 $bgcolor="red";
			 $text="New Password din't match with the confirm new password.";
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
                        <div class="card-header" style="background-color:#3390FF">Change Password</div>
                        <div class="card-body">
                            <form name="my-form" method="POST">
								<div class="md-form">
									<i class="fas fa-key prefix blue-text"></i>
									<input type="password" id="form-current-password" name="form-current-password" value="<?php $_POST['form-current-password'] ?>" class="form-control" required>
									<label for="form-current-password">Current Password</label>
								</div>
								
								<div class="md-form">
									<i class="fas fa-key prefix blue-text"></i>
									<input type="password" id="form-new-password" name="form-new-password" value="<?php $_POST['form-new-password'] ?>" class="form-control" required>
									<label for="form-new-password">New Password</label>
								</div>
								
								<div class="md-form">
									<i class="fas fa-key prefix blue-text"></i>
									<input type="password" id="form-confirm-password" name="form-confirm-password" value="<?php $_POST['form-confirm-password'] ?>" class="form-control" required>
									<label for="form-confirm-password">Confirm New Password</label>
								</div>

                                    <div class="col-md-8 offset-md-3">
                                        <button type="submit" name="change_password" class="btn btn-primary" style="border-radius:30px">
                                        Save
                                        </button>
										<a href="/website/home.php" class="btn btn-cancel" style="background-color:#D3D3D5; color:white; border-radius:30px">
                                        Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
<!-- /Change Password -->

<?php include_once('innerFooter.php'); ?>