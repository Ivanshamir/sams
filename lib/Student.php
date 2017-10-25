<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/Database.php';
?>

<?php
	class Student{

		private $db;
		public function __construct(){
			$this->db = new Database();
		}

		public function get_student(){
			$query = "SELECT * FROM tbl_student ";
			$result = $this->db->selectDb($query);
			return $result;
		}

		public function insert_stu_data($name, $roll){
			$name = mysqli_real_escape_string($this->db->link, $name);
			$roll = mysqli_real_escape_string($this->db->link, $roll);
			if(empty($name) || empty($roll)){
				$msg = "<div class='alert alert-danger'><strong>ERROR ! </strong> Field Must Not Be empty</div>";
				return $msg;
			}else{
				$stu_query = "INSERT INTO tbl_student(name, roll) VALUES('$name', '$roll')";
				$stuq_result = $this->db->dbCreate($stu_query);

				$atten_query = "INSERT INTO tbl_attendence(roll) VALUES('$roll')";
				$stuq_result = $this->db->dbCreate($atten_query);

				if($stuq_result){
					$msg = "<div class='alert alert-success'><strong>Success ! </strong> Student Data inserted successfully</div>";
					return $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Student Data can not be inserted</div>";
					return $msg;
				}
			}
		}

		public function insert_stu_atten($cur_time, $attend = array()){
			$sql_atten = "SELECT DISTINCT attend_time FROM tbl_attendence";
			$atten_result = $this->db->selectDb($sql_atten);
			while ($result = $atten_result->fetch_assoc()) {
				$db_date = $result['attend_time'];
				if ($cur_time == $db_date) {
					$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Student Attendance already taken!</div>";
					return $msg;
				}
			}

 			foreach ($attend as $stu_key => $stu_value) {
				if($stu_value == "present"){
					$data_query = "INSERT INTO tbl_attendence(roll, attend, attend_time) VALUES('$stu_key', 'present', now())";
					$data_insert = $this->db->dbCreate($data_query);
				}elseif ($stu_value == "absent") {
					$data_query = "INSERT INTO tbl_attendence(roll, attend, attend_time) VALUES('$stu_key', 'absent', now())";
					$data_insert = $this->db->dbCreate($data_query);
				} 
			}
			if($data_insert){
				$msg = "<div class='alert alert-success'><strong>Success ! </strong> Attendence Data inserted successfully</div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Attendence Data can not be inserted</div>";
				return $msg;
			}
		}

		public function get_student_atten(){
			$query = "SELECT DISTINCT attend_time FROM tbl_attendence";
			$result = $this->db->selectDb($query);
			return $result;
		}

		public function get_studentData_all($dt){
			$query = "SELECT tbl_student.name,tbl_attendence.* 
					 FROM tbl_student
					 INNER JOIN tbl_attendence
					 ON tbl_student.roll = tbl_attendence.roll
					 WHERE tbl_attendence.attend_time = '$dt'";
			$result = $this->db->selectDb($query);
			return $result;
		}

		public function update_stu_atten($dt, $attend){
			foreach ($attend as $stu_key => $stu_value) {
				if($stu_value == "present"){
					$query = "UPDATE tbl_attendence
							SET attend = 'present'
							WHERE roll = '".$stu_key."' AND attend_time = '".$dt."'  ";
					$data_update = $this->db->dbUpdate($query);
				}elseif ($stu_value == "absent") {
					$query = "UPDATE tbl_attendence
							SET attend = 'absent'
							WHERE roll = '".$stu_key."' AND attend_time = '".$dt."'  ";
					$data_update = $this->db->dbUpdate($query);
				} 
			}
			if($data_update){
				$msg = "<div class='alert alert-success'><strong>Success ! </strong> Attendence Data Updated successfully</div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Attendence Data can not be updated</div>";
				return $msg;
			}
		}

	}
?>