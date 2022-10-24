<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i> Employee Salary Info</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Employee Salary Info</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
				<?php 
							error_reporting(0); 
							if(isset($_POST['leave_entry'])){
								$department_id		=$_POST['department']; 
								$employee_name		=$_POST['emname']; 
								$leave_from			=$_POST['leave_from'];  
								$days				=$_POST['days']; 
								$leave_type			=$_POST['leave_type'];	
								
								$enddate			=date('Y-m-d', strtotime($leave_from. ' + '.$days.' days'));
						
								$query="INSERT INTO `leave_entry`(`department_id`, `employee_id`, `leave_from`,`leave_to`, 
								`leave_type`, `days`, `issued_by`)  values 
								('$department_id','$employee_name','$leave_from','$enddate',
								'$days','$leave_type','0')"; 
								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Leave Entry Successfully Completed</strong>  
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

					<form action="" method="post" > 
					<br />
				
						<div class="" style="width:650px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Leave Entry</h5>
							  
						<div class="col-sm-12 form-group">
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
									<option value="<?php echo $res['em_id']; ?>"><?php echo $res['name']; ?></option>
									<?php }} ?>									
								</select>
							</div>
							
							
							
						<div class="col-sm-12 form-group">
							<label for="sex">Select Employee</label>
							<select id="emname" name="emname" class="form-control browser-default custom-select">
								<option >Select</option>								
							</select>
						</div>	
						<div class="col-sm-6 form-group">
						<label for="Date">Leave From (Inclusive)</label>
						<input type="Date" name="leave_from" class="form-control" id="Date" placeholder="" required>
						</div>						
						<div class="col-sm-6 form-group">
							<label for="sex">Leave Type</label>
							<select id="sex" name="leave_type" class="form-control browser-default custom-select">
								<option value="Casual Leave">Casual Leave</option>
								<option value="Earn Leave">Earn Leave</option>
								<option value="Maternity Leave">Maternity Leave</option>
								<option value="Medical Leave">Medical Leave</option>
								<option value="Other Leave">Other Leave</option>
							</select>
						</div>
						<div class="col-sm-6 form-group">
							<label for="name-f">Days</label>
							<input type="text" class="form-control" name="days" id="name-f" placeholder="Enter Day" required>
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">
							  <button type="submit" name="leave_entry" class="btn btn-success">Save</button>
							  <button type="button" class="btn btn-info">Leave Application</button>
							  <button type="button" class="btn btn-danger">Delete</button>		
							  <button type="button" class="btn btn-info">Details</button>
							  <button type="button" class="btn btn-primary">Monthly </button>
							  <button type="button" class="btn btn-warning">Yearly</button>
							  <button type="button" class="btn btn-primary">Summery</button>
							</div>
						</div>
						
						</div>
					
						</form>
					
				</div>
			</div>
		</div> 
	</div>
</main>
  <!-- page-content" -->
</div>

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