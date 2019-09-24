/*
* @author Shailesh
*/
<?php include_once('header.php'); ?>
<?php
if(isset($_POST['register_button'])) {
	$conn = new mysqli('localhost', 'root', '','dbusers');

	$sql = "INSERT INTO users (fname, email, uname, password, address)
	VALUES ('".$_POST['form-fullname']."', '".$_POST['form-email_address']."', '".$_POST['form-username']."', '".md5($_POST['form-password'])."', '".$_POST['form-address']."')";

	if ($conn->query($sql) === TRUE) {
	   header("location:login.php?success=1");
	} else {
	   echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}
?>
<!-- Register -->
<main class="my-form" style="margin:100px 0px 100px 0px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:#3390FF">Register</div>
                        <div class="card-body">
                            <form name="my-form" method="POST">
								<!--
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="full-name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email-address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="user_name" class="col-md-4 col-form-label text-md-right">User Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="user_name" class="form-control" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">Present Address</label>
                                    <div class="col-md-6">
                                        <textarea id="present_address" class="form-control"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Permanent Address</label>
                                    <div class="col-md-6">
                                        <textarea type="text" id="permanent_address" class="form-control" name="permanent-address"> </textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>
								-->
								<div class="md-form">
									<i class="fa fa-user prefix blue-text"></i>
									<input type="text" id="form-fullname" name="form-fullname" class="form-control" required>
									<label for="form-fullname">Full name</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-envelope prefix blue-text"></i>
									<input type="email" id="form-email_address" name="form-email_address" class="form-control" required>
									<label for="form-email_address">E-Mail</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-user prefix blue-text"></i>
									<input type="text" id="form-username" name="form-username" class="form-control" required>
									<label for="form-username">User Name</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-key prefix blue-text"></i>
									<input type="password" id="form-password" name="form-password" class="form-control" required>
									<label for="form-password">Password</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-phone prefix blue-text"></i>
									<input type="number" id="form-phone_number" name="form-phone_number" class="form-control" required>
									<label for="form-phone_number">Phone Number</label>
								</div>
								
								<div class="md-form">
									<i class="fa fa-address-card prefix blue-text"></i>
									<textarea id="form-address" name="form-address" class="form-control md-textarea" required></textarea>
									<label for="form-address">Address</label>
								</div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="register_button" class="btn btn-primary" style="border-radius:30px">
                                        Register
                                        </button>
                                    </div>
									<p align="center">
										Already a member? <u><a href="login.php">Sign in</a></u>
									</p>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
<!-- /Register -->

<?php include_once('footer.php'); ?>
