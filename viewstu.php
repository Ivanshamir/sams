<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>
<?php 
	$stu = new Student();
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="index.php">Take attendence</a>
		</h2>
	</div>
		<div class="panel-body">
			<form action="" method="post">
				<table class="table table-striped">
					<tr>
						<th width="25%">No</th>
						<th width="25%">Attendence</th>
						<th width="25%">Action</th>
					</tr>

	<?php
			$atten_query = $stu->get_student_atten();
			if ($atten_query) {
				$i = 0;
				while ($value = $atten_query->fetch_assoc()) {
					$i++;
	 ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['attend_time']; ?></td>
						<td><a class="btn btn-primary" href="stn_details.php?dt=<?php echo $value['attend_time']; ?>">View</a></td>
					</tr>
	<?php } } ?>
				</table>
			</form>
		</div>
<?php include 'inc/footer.php'; ?>