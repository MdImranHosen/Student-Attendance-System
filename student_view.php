<?php include "inc/header.php"; ?>

<div class="card">
  <div class="card-header">
    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">Add Student</a>
    <a href="date_view.php" class="btn btn-primary float-right">Back</a>
  </div>
  <div id="errorhid" class="alert alert-danger" style="display: none;"><strong>Error!</strong> Somethine one Messing.</div>
  <div class="card-body">
    <form id="attend" action="" method="post">
    <table class="table table-striped">
      <thead>
        <tr>
        <th>Serial</th>
        <th>Student Name</th>
        <th>Student Roll</th>
        <th>Attendance</th>
      </tr>
      </thead>
      <tbody>
            <?php 
                $get_student = $std->getStudentDataByDate($dt);
                if($get_student){
                  $i = 0;
                  while ($result = $get_student->fetch_assoc()) {
                   $i++;
            ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $result['name']; ?></td>
          <td><?php echo $result['roll_number']; ?></td>
          <td>
            <input type="radio" name="attendace[<?php echo $result['roll_number']; ?>]" value="present" <?php if($result['attend'] == "present"){ echo "checked"; } ?> > P

            <input type="radio" name="attendace[<?php echo $result['roll_number']; ?>]" value="absent" <?php if($result['attend'] == "absent"){ echo "checked"; } ?> > A
          </td>
        </tr>
        <?php } }else{
          echo "No Data Avables";
        } ?>
      </tbody>
    </table>


     <button type="submit" name="attendUpdate" class="btn btn-success float-right">Update</button>
  </form>
  </div>
</div>
<?php  include "inc/footer.php"; ?>