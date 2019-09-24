/*
* @author Shailesh
*/
<?php include_once('innerHeader.php');
session_start();
if (!isset($_SESSION['username'])) {
	header("location:login.php");
}	
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th {
  background-color:#3390FF;
  color:white;
}
td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<?php 
	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 5;
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$db = mysqli_connect('localhost', 'root', '', 'dbusers');
	$query1 = "SELECT count(*) FROM users";
	$results1 = mysqli_query($db, $query1);
	$total_rows = mysqli_fetch_array($results1)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

	$query2 = "SELECT * FROM users  LIMIT $offset, $no_of_records_per_page";
	$results2 = mysqli_query($db, $query2);
?>

<main class="my-form" style="margin:100px 0px 57px 0px">
    <div class="container"><div class="row offset-md-10"><button class="btn btn-primary btn-sm">Download PDF</button></div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                    <div class="card" style="height:357px">
                        <div class="card-header" style="background-color:#3390FF">Registered Users</div>
                        <div class="card-body">
						<table>
						<tr>
							<th>First Name</th>
							<th>Email</th>
							<th>User Name</th>
							<th>Address</th>
						</tr>
						<?php
						if (mysqli_num_rows($results2) >= 1) {
							 while($row = $results2->fetch_assoc()) { ?>
								<tr>
									<td><?php echo $row['fname'] ?></td>
									<td><?php echo $row['email'] ?></td>
									<td><?php echo $row['uname'] ?></td>
									<td><?php echo $row['address'] ?></td>
								</tr>
					<?php	}
						}
						?>
						</table>
						</div>
						<!-- Pagination -->
						<div class="offset-md-8">
							<nav>
							  <ul class="pagination pagination-circle pg-red">
								<li class="page-item"><a href="?pageno=1">First</a></li>
								<li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
								  <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">
									<span>&laquo;</span>
									<span class="sr-only">Previous</span>
								  </a>
								</li>
								<?php for($i=1; $i<=$total_pages; $i++) {?>
								<li class="page-item <?php if($pageno == $i){ echo 'active'; } ?>"><a class="page-link" href="/website/adminRegisteredUsers.php?pageno=<?php echo $i ?>"><?php echo $i ?></a></li>
								<?php } ?>

								<li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
								  <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">
									<span>&raquo;</span>
									<span class="sr-only">Next</span>
								  </a>
								</li>
								<li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
							  </ul>
							</nav>
						</div>
						<!-- /Pagination -->
                    </div>
            </div>
        </div>
    </div>
</main>


<?php include_once('innerFooter.php'); ?>