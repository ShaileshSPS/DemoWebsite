<?php include_once('innerHeader.php');
session_start();
?>

<main class="my-form" style="margin:100px 0px 358px 0px">
	<h1> Welcome <?php echo $_SESSION['username'] ?></h1> <br/>
	<p><?php echo $_SESSION['success'] ?></p>
</main>

<?php include_once('innerFooter.php'); ?>