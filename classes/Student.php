<?php
$filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../lib/Database.php');
/**
 * Student Class
 */
class Student{

	private $db;
	
	public function __construct()
	{
		$this->db = new Database();
	}

	public function getStudentData(){
		$sql = "SELECT * FROM  tbl_students ORDER BY roll_number ASC";
		$result = $this->db->select($sql);
		return $result;
	}
	public function insertStudentData($data){
        $name = $data['name'];
        $roll = $data['roll_number'];

        $name = mysqli_real_escape_string($this->db->link, $name);
        $roll = mysqli_real_escape_string($this->db->link, $roll);

        $chekRoll = "SELECT * FROM tbl_students WHERE roll_number = '$roll'";
        $checkResult = $this->db->select($chekRoll);
        if (empty($name) || empty($roll)) {
        	$msg = '<div class="alert alert-danger"><strong>Error!</strong> Field Must Not be Empty!</div>';
        	return $msg;
        }elseif (strlen($name) >= 255) {
        	$msg = '<div class="alert alert-danger"><strong>Error!</strong> Name is Too Long.</div>';
        	return $msg;
        }elseif (strlen($roll) >= 11) {
        	$msg = '<div class="alert alert-danger"><strong>Error!</strong> Roll Number is Too Long.</div>';
        	return $msg;
        }elseif($checkResult != false){
            $msg = '<div class="alert alert-danger"><strong>Error!</strong> This Roll Number Already Exists.</div>';
        	return $msg;
        }else{
          $sql = "INSERT INTO tbl_students(name,roll_number) VALUES('$name','$roll')";
          $insert = $this->db->insert($sql);

          $rsql = "INSERT INTO  tbl_attendance(roll_number) VALUES('$roll')";
          $insert = $this->db->insert($rsql);
          if($insert){
          	$msg = '<div class="alert alert-success"><strong>Success! </strong> Student Add Successfully.</div>';
        	return $msg;
          }else{
          	$msg = '<div class="alert alert-danger"><strong>Error!</strong> Something went Warring.</div>';
        	return $msg;
          }

        }
	}
	public function insertStudentAttend($attendace = array()){
         
         $dateTime  = date('Y-m-d');

        //$attendace = mysqli_real_escape_string($this->db->link, $attendace);

        $query = "SELECT DISTINCT attend_time FROM tbl_attendance";
        $getdata = $this->db->select($query);
        if(!empty($getdata)){
        while ($result = $getdata->fetch_assoc()) {
        	$db_date = $result['attend_time'];
        	if ($db_date == $dateTime) {
        		$msg = '<div class="alert alert-danger"><strong>Error!</strong> Attendance Already Taken Today.</div>';
        	    return $msg;
        	}
        }
       }
        foreach ($attendace as $atn_key => $atn_value) {

        	if (empty($atn_value)) {
        		$msg = '<div class="alert alert-danger"><strong>Error!</strong> Somethine one Messing.</div>';
        	    return $msg;
        	}else{

        	if ($atn_value == "present") {

        		$pres_query = "INSERT INTO tbl_attendance (roll_number,attend,attend_time) VALUES('$atn_key','present', now())";

        		$insert_pers = $this->db->insert($pres_query);

        	}elseif($atn_value == "absent"){

        		$efsent_query = "INSERT INTO tbl_attendance (roll_number,attend,attend_time) VALUES('$atn_key','absent', now())";

        		$insert_pers = $this->db->insert($efsent_query);
        	}
          }
        }

        if (!empty($insert_pers)) {
        	$msg = '<div class="alert alert-success"><strong>Success! </strong> Attendance Data Inserted.</div>';
        	    return $msg;
        }else{
          $msg = '<div class="alert alert-danger"><strong>Error!</strong> Attendance Data not Inserted.</div>';
        	    return $msg;
        }
	}

  // Student Attendtance Update query here.....

    public function updateStudentAttend($dt, $attendace = array()){
         
      
        foreach ($attendace as $atn_key => $atn_value) {

          if (empty($atn_value)) {
            $msg = '<div class="alert alert-danger"><strong>Error!</strong> Somethine one Messing.</div>';
              return $msg;
          }else{

          if ($atn_value == "present") {
            $upres_query = "UPDATE tbl_attendance 
                            SET 
                            attend = 'present'
                             WHERE roll_number = '$atn_key' && attend_time = '$dt'";
            $update_pers = $this->db->update($upres_query);

          }elseif($atn_value == "absent"){

            $uabset_query = "UPDATE tbl_attendance 
                            SET 
                            attend = 'absent'
                             WHERE roll_number = '$atn_key' && attend_time = '$dt'";

            $update_pers = $this->db->update($uabset_query);
          }
          }
        }

        if (!empty($update_pers)) {
          $msg = '<div class="alert alert-success"><strong>Success! </strong> Attendance Data Updated.</div>';
              return $msg;
        }else{
          $msg = '<div class="alert alert-danger"><strong>Error!</strong> Attendance Data not Updated.</div>';
              return $msg;
        }
  }

  // Show date list..code...
	public function getDateList(){
		$query = "SELECT DISTINCT attend_time FROM tbl_attendance";
        $getdata = $this->db->select($query);
        return $getdata;
	}

  public function getStudentDataByDate($dt){
    $dt = mysqli_real_escape_string($this->db->link, $dt);
    $sql = "SELECT tbl_students.name,tbl_attendance.* FROM tbl_students INNER JOIN tbl_attendance ON tbl_students.roll_number = tbl_attendance.roll_number WHERE tbl_attendance.attend_time = '$dt'";
    $result = $this->db->select($sql);
    return $result;
  }
}