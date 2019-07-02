<?php 
// MD Imran Hosen
// Github www.github.com/MdImranHosen
// Phone: 01983912645
// FB: www.fb.com/Md.ImranHosen.up
//error_reporting(0);
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../classes/Student.php');

  $std = new Student();

 // Student Add action get here.....
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addsutden'])) {
      $getMsg = $std->insertStudentData($_POST);
  }
  // Student Attendtance action get here......
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['attendstuden'])) {
      
      if (empty($_POST['attendace'])) {
        
        $getMsg = '<div class="alert alert-danger">Field must not be Empty!</div>';
             
      }else{
        $attendace = $_POST['attendace'];
        $getMsg  = $std->insertStudentAttend($attendace);
      }
      
  }

     # Get Date By Student Show Action get Code....
 if (isset($_GET['dt']) && $_GET['dt']) {
      $dt = $_GET['dt'];
  

   // Student Attendtance Update action get here......
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['attendUpdate'])) {
      
      if (empty($_POST['attendace'])) {
        
        $getMsg = '<div class="alert alert-danger">Field must not be Empty!</div>';
             
      }else{
        $attendace = $_POST['attendace'];
        $getMsg  = $std->updateStudentAttend($dt, $attendace);
      }
      
   }

  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student/Employee Attendance system with php</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="author" content="Md Imran Hosen" />
  <meta  name="keywords" content="Student / Employee Attendance Stystem">
  <meta  name="description" content= "Student / Employee Attendance Stystem">
  <meta name="application-name" content="Student Attendance Stystem"/>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/bootstrap.css">
  <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
</head>
<body>
	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
		  <div class="form-group">
		    <label for="name">Student Name</label>
		    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameError" placeholder="Enter Name">
		    <small id="nameError" class="form-text text-muted">This Field is Required</small>
		  </div>
		  <div class="form-group">
		    <label for="roll_number">Student Roll</label>
		    <input type="text" class="form-control" name="roll_number" id="roll_number" placeholder="Student Roll">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="addsutden" class="btn btn-success">Add Student</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container">
  <?php if (isset($getMsg)) {
    echo $getMsg;
  } ?>
  <div class="card card-body bg-light text-center">
  	<h2>Employee/Student Attendance System With PHP</h2>
  	 <br><strong>Date: <?php
     if(isset($dt)){ echo $dt; }else{
       echo date('Y-m-d'); 
     } 
    
     ?></strong>
  </div>

