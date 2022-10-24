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

			<div class="col-md-4">
			
				<div class="card-wrapper" style="margin-top:10px; height:595px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<br />
					<div class="" style= "margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<?php 
							error_reporting(1);
							if(isset($_POST['submitsalary'])){
								$department_id		=$_POST['department']; 
								$employee_name		=$_POST['emname'];
								$service_charge		=$_POST['service_charge']; 
								$status				=$_POST['status'];					
								$date				= date('Y-m-d');  
								
								$query2="UPDATE`service_charge_info` SET
								`department_id`		='$department_id', 								
								`service_charge`	='$service_charge',
								`status` 			='$status',
								`update_at` 		='$date'
								
								where em_id='$employee_name'";
								 $result2=$db->update($query2);
								
								
								if($result2==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Service Charge Updated</strong>  
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
						<div class="row">
							 
							<h5 style="padding:20px;" class="bg-warning">Service Charge Update:</h5>	

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
									<option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
									<?php }} ?>									
								</select>
							</div>
							
							
							
							<div class="col-sm-12 form-group">
								<label for="sex">Select Employee</label>
								<select id="emname" name="emname" class="form-control browser-default custom-select">
									<option >Select</option>								
								</select>
							</div>							
							<div class="col-sm-12 form-group">
								<label for="tel">Service Charge</label>
								<input type="tel" name="service_charge" class="form-control" id="tel" placeholder="Enter Service Charge here" required>
							</div>						
							<div class="col-sm-3 form-group">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="check1" name="status" value="1" Checked>
								  <label class="form-check-label">Active</label>
								</div>			
							</div>	
							
							<div class="col-sm-3 form-group">
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="check1" name="status" value="0" >
								  <label class="form-check-label">Inctive</label>
								</div>			
							</div>				
							
						</div>
							<div class="col-sm-12 form-group mb-0">
							   <button type="submit" name="submitsalary"class="btn btn-warning" >Submit</button>
							 </div>
							</div>
					 </form>
						
					</div> 
			</div>
			<div class="col-md-8">
			<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; 
			padding-top: 20px; padding-bottom:20px;">
				<table id="example" class="table table-bordered table-striped nowrap" style="padding:20px;  ">
					<thead>
						<tr class="bg-success text-white">
							<th>S.L No</th>																						
							<th>Name</th>							
							<th>Desigination</th>
							<th>Department</th>
							<th>Amount</th>						
						</tr>
					</thead>
					<tbody>
										
					
					<?php 
					$query="select * from service_charge_info ORDER BY `department_id` ASC"; 
					$results=$db->select($query);
					$id=0; 
					if ($results==true){
							while($res=$results->fetch_assoc()){
								$id++; 
					
					?> 
						<tr>
							<td><?php echo $id; ?></td>	
							
							<?php 
								$em_id=$res['em_id'];

								$query2="select * from employee where em_id='".$em_id."'"; 
								$results2=$db->select($query2);									
								if ($results2==true){
								while($res2=$results2->fetch_assoc()){	
							?>
							<td><?php echo $employee_name=$res2['name'];?></td>
							
							<td><?php echo $res2['desigination'] ?></td>
							<?php
								}
								}else{
										echo 'Not Set'; 
									}
							?> 																
							<td>
							<?php
							
							$de_id=$res['department_id'];
							$query="select * from department where id='".$de_id."'"; 
							$results2=$db->select($query);									
							if ($results2==true){
							while($res2=$results2->fetch_assoc()){	
									$department=$res2['name'];
									echo $department; 												
								}
							}else{
									echo 'Not Set'; 
								}
					
							
							?>
							
							</td>
							<td><?php echo $res['service_charge'];; ?> </td>
							
						
						</tr>
						
							<?php }}?>
					  
					</tbody>
				</table>
				</div>
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


<!-- Data Table  -->
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js'></script>
<!--End Data Table  -->

<script  src="js/script.js"></script>