<?php include "inc/header.php"; ?>
<div class="card">
  <div class="card-header">
    <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">Add Student</a>
    <a href="index.php" class="btn btn-primary float-right">Take Attendance</a>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead>
      	<tr>
    		<th>Serial</th>
        <th>Attendance Date</th>
    		<th>Action</th>
    	</tr>
      </thead>
    	<tbody>
            <?php 
                $get_adate = $std->getDateList();
                if($get_adate){
                	$i = 0;
                	while ($result = $get_adate->fetch_assoc()) {
                	 $i++;
            ?>
    		<tr>
    			<td><?php echo $i; ?></td>
    			<td><?php echo $result['attend_time']; ?></td>
          <td><a class="btn btn-primary" href="student_view.php?dt=<?php echo $result['attend_time']; ?>">View</a></td>
    		</tr>
    		<?php } }else{
    			echo "No Data Avables";
    		} ?>
    	</tbody>
    </table>
  </div>
</div>


<?php  include "inc/footer.php"; ?>