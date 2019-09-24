/*
* @author Shailesh
*/
<?php include_once('header.php'); ?>
<?php error_reporting(0); ?>

<?php
if(isset($_POST['contact_submit'])) {
	$name = $_POST['form-name'];
	$formEmail = $_POST['form-email'];
	$emailSubject = $_POST['form-Subject'];
	$message = $_POST['form-message'];
	
	$company = 'Shailesh & Co.';
	$email='shailesh.shanbhags@gmail.com';
	
	$emailSubject = 'Contact Request Submitted by '.$name;
	$htmlContent = '<h2>Contact Request Submitted</h2>
		<h4>Name</h4><p>'.$name.'</p>
		<h4>Email</h4><p>'.$formEmail.'</p>
		<h4>Subject</h4><p>'.$emailSubject.'</p>
		<h4>Message</h4><p>'.$message.'</p>';

	// Set content-type header for sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// Additional headers
	$headers .= 'From: '.$company.'<'.$email.'>'. "\r\n";

	// Send email
	mail($formEmail,$emailSubject,$htmlContent,$headers);

	// INSERT
	$conn = new mysqli('localhost', 'root', '','dbusers');

	$sql = "INSERT INTO contact (uname, email, subject, message)
	VALUES ('".$_POST['form-name']."', '".$_POST['form-email']."', '".$_POST['form-Subject']."', '".$_POST['form-message']."')";

	if ($conn->query($sql) === TRUE) {
	   header("location:contactus.php?success=1");
	} else {
	   echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();	
	
}
?>

<style>
.map-container-section {
  overflow:hidden;
  padding-bottom:50.25%;
  position:relative;
  height:0;
}
.map-container-section iframe {
  left:0;
  top:0;
  height:100%;
  width:100%;
  position:absolute;
}
</style>
<!-- Contact Us -->
<!--
<main class="my-form" style="margin:100px 0px 100px 0px">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color:#3333">Contact Us</div>
                        <div class="card-body">
                            <form name="my-form" onsubmit="" action="" method="">
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
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                                    <div class="col-md-6">
                                        <textarea id="message" class="form-control"> </textarea>
                                    </div>
                                </div>

                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                        Send
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
-->
<!-- /Contact Us -->

<!-- Section: Contact v.1 -->
<section class="my-5">

  <!-- Section heading -->
  <h2 class="h1-responsive font-weight-bold text-center my-5" style="font-family:cursive; color:blue; padding-top: 80px">Contact us</h2>
  <!-- Section description -->
  <p class="text-center w-responsive mx-auto pb-5">If any queries, don't hesitate. Feel free to ask any question.
  Or you can write to us below. Or reach us at the below location.</p>

  <!-- Grid row -->
  <div class="row" style="margin: 1rem;">

    <!-- Grid column -->
    <div class="col-lg-5 mb-lg-0 mb-4">

      <!-- Form with header -->
      <div class="card">
        <div class="card-body">
		<?php
		 $display="none";
		 if($_GET['success'] == 1){
			 $display="block";
			 $bgcolor="green";
			 $text="Message sent Successfully.";
		 }
		 ?>
		<div id="Page_AlertBox" class="alert text-left z-depth-2 offset-md-0" style="display:<?php echo $display ?>;padding: 5px 5px 5px 15px;margin-bottom: 1rem; color:white; width:480px; background-color:<?php echo $bgcolor ?>">
			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
			<i class="fa fa-exclamation-circle"></i> <b id="Page_AlertBoxHeading"><?php echo $text ?></b>
			<ul id="Page_AlertBoxMessage" style="padding-left:15px;"></ul>
		</div>
          <!-- Header -->
          <div class="form-header blue accent-1" style="padding:1rem">
            <h3 class="mt-2"><i class="fas fa-envelope"></i> Write to us:</h3>
          </div>
          <p class="dark-blue-text">We'll write rarely, but only the best content.</p>
          <!-- Body -->
		  <form name="my-form" method="POST">
          <div class="md-form">
            <i class="fas fa-user prefix blue-text"></i>
            <input type="text" id="form-name" name="form-name" class="form-control" required>
            <label for="form-name">Your name</label>
          </div>
          <div class="md-form">
            <i class="fas fa-envelope prefix blue-text"></i>
            <input type="email" id="form-email" name="form-email" class="form-control" required>
            <label for="form-email">Your email</label>
          </div>
          <div class="md-form">
            <i class="fas fa-tag prefix blue-text"></i>
            <input type="text" id="form-Subject" name="form-Subject" class="form-control" required>
            <label for="form-Subject">Subject</label>
          </div>
          <div class="md-form">
            <i class="fas fa-pencil-alt prefix blue-text"></i>
            <textarea id="form-message" name="form-message" class="form-control md-textarea" rows="3" required></textarea>
            <label for="form-message">Send message</label>
          </div>
          <div class="text-center">
            <button class="btn btn-primary" name="contact_submit" style="border-radius:30px">Submit</button>
          </div>
		 </form>
        </div>
      </div>
      <!-- Form with header -->

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!--Google map-->
	  <div id="map-container-section" class="z-depth-1-half map-container-section mb-4" style="height: 400px">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.1001250268764!2d77.53250891384354!3d12.9654445185237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3ddf41f88089%3A0x7de4d4b920436899!2sVijayanagara+TTMC!5e0!3m2!1sen!2sin!4v1555665350281!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>

      <!-- Buttons-->
      <div class="row text-center">
        <div class="col-md-4">
          <a class="btn-floating blue accent-1">
            <i class="fas fa-map-marker-alt"></i>
          </a>
          <p>New York, 94126</p>
          <p class="mb-md-0">United States</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating blue accent-1">
            <i class="fas fa-phone"></i>
          </a>
          <p>+ 01 234 567 89</p>
          <p class="mb-md-0">Mon - Fri, 8:00-22:00</p>
        </div>
        <div class="col-md-4">
          <a class="btn-floating blue accent-1">
            <i class="fas fa-envelope"></i>
          </a>
          <p>info@gmail.com</p>
          <p class="mb-0">sale@gmail.com</p>
        </div>
      </div>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</section>
<!-- Section: Contact v.1 -->

<?php include_once('footer.php'); ?>