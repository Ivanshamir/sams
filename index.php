<?php include 'inc/header.php'; ?>
<?php include 'lib/Student.php'; ?>
<?php
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 
?>
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
	error_reporting(0);
	$stu = new Student();
	$cur_time = date("Y-m-d");
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$attend = $_POST['attend'];	
		$insertatten = $stu->insert_stu_atten($cur_time, $attend);
		
		}

 ?>

 <?php 
 	if (isset($insertatten)) {
 		echo $insertatten;
 	}
 ?>
 <div class='alert alert-danger' style="display: none;"><strong>Error ! </strong> Student roll missing</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>
			<a class="btn btn-success" href="add.php">Add Student</a>
			<a class="btn btn-info pull-right" href="viewstu.php">View</a>
		</h2>
	</div>
		<div class="panel-body">
			<div class="well text-center" style="font-size: 25px;">
				<strong>Date : </strong><?php echo $cur_time; ?>
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
			$stuvalue = $stu->get_student();
			if ($stuvalue) {
				$i = 0;
				while ($value = $stuvalue->fetch_assoc()) {
					$i++;
	 ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['roll']; ?></td>
						<td>
							<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="present">P
							<input type="radio" name="attend[<?php echo $value['roll']; ?>]" value="absent">A
						</td>
					</tr>
	<?php } } ?>
					<tr>
						<td colspan="4"><input class="btn btn-primary" type="submit" name="submit" value="Submit"></td>
					</tr>
				</table>
			</form>
		</div>
<?php include 'inc/footer.php'; ?>