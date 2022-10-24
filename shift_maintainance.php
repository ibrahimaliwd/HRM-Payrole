<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i>Bank Info</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Bank Info</h6>

			<div class="col-md-7">
			
				<?php 
							error_reporting(0); 
							if(isset($_POST['shift_save'])){
								$department_id	=$_POST['department'];  
								$employee_id	=$_POST['emname'];  
								$shift			=$_POST['shift'];  
								$holiday		=$_POST['holiday'];  
							
								$query="INSERT INTO `shift_table`(`department_id`, `employee_id`, `shif_id`, `holiday`)  values 
								('$department_id','$employee_id','$shift','$holiday')";

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Shift Setting Successfully Completed</strong>  
									</div>
									<?php 
								}else{
									?> 
									<div class="alert alert-danger">
									  <strong>Somthing Problem</strong>  
									</div>
									<?php 
								}
							}
						?> 

			
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<br />
					<div class="" style= "margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<form action="" method="post">
						<div class="row">
							 <h5 style="margin:0px;padding:20px; width:100%;" class="bg-warning">Shift Maintenance</h5>
						 	<div class="col-sm-6 form-group">
								<label for="sex">Select Department</label>
								<select id="department" name='department' onchange="getemploye(this.value)" class="form-control browser-default custom-select">
								<option value="">Select</option>
								<?php 
									$query="select * from department"; 
									$results=$db->select($query);
									$id=0; 
									if ($results==true){
											while($res=$results->fetch_assoc()){
											$id++; 
									?> 
									<option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
									<?php }} ?>									
								</select>
							</div>
							
							<div class="col-sm-6 form-group">
								<label for="sex">Select Employee</label>
								<select id="emname" name="emname" class="form-control browser-default custom-select">
									<option >Select</option>								
								</select>
							</div>
							<div class="col-md-6 form-group">
								<label for="sex">Select Shift</label>
								<select id="shift" name="shift" class="form-control browser-default custom-select">
									<option >Select</option>
									
									<?php 
									$query1="select * from shift_cat"; 
									$results1=$db->select($query1);
									$id=0; 
									if ($results1==true){
											while($shiftselect=$results1->fetch_assoc()){
											$id++; 
									?> 
									<option value="<?php echo $shiftselect['id']; ?>">
									<?php echo $shiftselect['shift_name'].'-'.$shiftselect['start_time'].'-'.$shiftselect['end_time']; ?>
									</option>
									<?php }} ?>									
								</select>
									
								</select> 
							 
							</div> 
							
							<div class="col-sm-6 form-group">
								<label for="sex">Select Holiday</label>
								<select id="sex" name="holiday" class="form-control browser-default custom-select">
									<option value="Saturday">Saturday</option>
									<option value="Sunday">Sunday</option>
									<option value="Monday">Monday</option>
									<option value="Tuesday">Tuesday</option>
									<option value="Wednesday">Wednesday</option>
									<option value="Thursday">Thursday</option>
									<option value="Friday">Friday</option>
									 
								</select>
							</div> 
							<button type="submit" name="shift_save" class="btn btn-warning">Save</button>		 
						</div>
						</form>
						
					</div> 
				</div>
			</div>
			<div class="col-md-5">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
							<?php 
							error_reporting(0); 
							if(isset($_POST['shift'])){
								$shift_name		=$_POST['shift_name'];  
								$start_time		=$_POST['start_time'];  
								$end_time		=$_POST['end_time'];  
							
								if ($shift_name==true){
								$query="INSERT INTO `shift_cat`(`shift_name`, `start_time`, `end_time`)  values 
								('$shift_name','$start_time','$end_time')";

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Shift Added Successfully</strong>  
									</div>
									<?php 
								}else{
									?> 
									<div class="alert alert-danger">
									  <strong>Somthing Problem</strong>  
									</div>
									<?php 
								}
							}
							}
							
						?> 



						<form action="" method="post" > 
						<br />
				
							<div class="" style="max-width:650px; margin:0px auto; background:#eee; border:
							3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
								<div class="row">
								<h5 style="padding:20px;" class="bg-warning">Create New Shift</h5>					
								<div class="col-sm-12 form-group">
									<label for="name-f">Shift Name:</label>
									<input type="text" class="form-control" name="shift_name" id="name-f" placeholder="Enter Bank Name" required>
								</div>	
								<div class="col-sm-6 form-group">
									<label for="name-f">Duty Start Time:</label>
									<input type="time" class="form-control" name="start_time" id="name-f" placeholder="Enter Account Name" required>
								</div>	
								<div class="col-sm-6 form-group">
									<label for="name-f">Duty End Time:</label>
									<input type="time" class="form-control" name="end_time" id="name-f" placeholder="Enter Account Name" required>
								</div>	
								<div class="col-sm-12 form-group">
									 <div class="btn-group">
									  <button type="submit" name="shift" class="btn btn-success">Save</button>							  
									</div>
								</div>
								
								</div>
							</div>
						</form>
						
						<br />
						
						<table id="example" class="table table-bordered table-striped" style="width:100%; padding:20px;  ">
							<thead>
								<tr class="bg-success text-white">												 																						
									<th>#ID</th>
									<th>Name</th>
									<th>Start_time</th> 
									<th>End_time</th> 
								</tr>
							</thead>
							<tbody>
							<?php 
								$query3="select * from shift_cat"; 
								$resultsift=$db->select($query3);
								$id=0; 
								if ($resultsift==true){
										while($shift=$resultsift->fetch_assoc()){
											$id++; 
							?>
								<tr>
									<td><?php echo $id; ?> </td>
									<td><?php echo $shift['shift_name']; ?></td>
									<td><?php echo $shift['start_time']; ?> </td>
									<td><?php echo $shift['end_time']; ?></td>
								</tr> 
							  
								<?php }} else{ ?> 
								
									<tr>
									<td colspan="4" class="text-center" style="font-weight:bold;"><?php echo "Shift Not Created Yet"; ?> </td>  
								</tr> 
									
								<?php } ?> 
							</tbody>
						</table>
				</div>
		</div>
		
	</div>
</div>
</main>
  <!-- page-content" -->


<script type="text/javascript">
		function getemploye(str) { 
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 document.getElementById("emname").innerHTML = this.responseText;
			}
		  };
		  xhttp.open("GET", "get_employee.php?emid="+str, true);
		  xhttp.open("GET", "get_employee.php?emid="+str, true);
		  xhttp.send();
		} 
</script>
<!-- page-wrapper -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script  src="js/script.js"></script>