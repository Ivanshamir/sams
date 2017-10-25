<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("form").submit(function(){
			var roll = true;
			$(':radio').each(function(){
				name = $(this).attr('name');
				if (roll && !$(':radio[name="' + name + '"]:checked').length) {
					$('.alert').show();
					roll = false;
				}
			});
			return roll;
		});
	});
</script>

<?php
	if (!isset($_GET['dt']) || empty($_GET['dt'])) {
		echo "<script>window.location='index.php';</script>";
	}else{
		$dt = $_GET['dt'];
	}
	$stu = new Student();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$attend = $_POST['attend'];	
		$updateatten = $stu->update_stu_atten($dt, $attend);
	}

 ?>

 <?php 
 	if (isset($updateatten)) {
 		echo $updateatten;
 	}
 ?>
 <div class='alert alert-danger' style="display: none;"><strong>Error ! </strong> Student roll missing</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="viewstu.php">Back</a>
		</h2>
	</div>
		<div class="panel-body">
			<div class="well text-center" style="font-size: 25px;">
				<strong>Date : </strong><?php echo $dt; ?>
			</div>
			<form action="" method="post">
				<table class="table table-striped">
					<tr>
						<th width="25%">No</th>
						<th width="25%">Student Name</th>
						<th width="25%">Student Roll</th>
						<th width="25%">Attendance</th>
					</tr>

	<?php
			$upvalue = $stu->get_studentData_all($dt);
			if ($upvalue) {
				$i = 0;
				while ($value = $upvalue->fetch_assoc()) {
					$i++;
	 ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['roll']; ?></td>
						<td>
							<input type="radio" name="attend[<?php echo $value['roll']; ?>]" <?php if($value['attend'] == 'present'){echo "checked";} ?> value="present">P
							<input type="radio" name="attend[<?php echo $value['roll']; ?>]" <?php if($value['attend'] == 'absent'){echo "checked";} ?> value="absent">A
						</td>
					</tr>
	<?php } } ?>
					<tr>
						<td colspan="4"><input class="btn btn-primary" type="submit" name="update" value="Update"></td>
					</tr>
				</table>
			</form>
		</div>
<?php include 'inc/footer.php'; ?>