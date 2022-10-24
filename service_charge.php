<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i>Process Service Charge</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Process Service Charge</h6>
			<div class="col-md-7">
				<div class="card-wrapper" style=" width: 100%; margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						
					<!--Service Charge Proccesing Area-->	
						<?php 
				 
						if(isset($_POST["process_service_charge"])){					
							$servic_month =$_POST['month'];
							
							$chk="SELECT * FROM `service_charge` WHERE `sevice_charge_month` LIKE '$servic_month%'";
							$check=$db->select($chk);
							
							if(($check !== false && $check->num_rows)>0){
								echo "<script type='text/javascript'>alert('Already Generated!')</script>";
							}else{
							$query ="SELECT * FROM `service_charge_info` where status=1";
							$results=$db->select($query);
							while($data=$results->fetch_assoc()){							
								$employee_id	=$data['em_id'];
								$department_id	=$data['department_id'];
								$service_charge	=$data['service_charge'];
								
								//$chk="";
								$ins="INSERT INTO `service_charge`(`department_id`,`employee_id`,`service_charge`, `sevice_charge_month`) 
								VALUES ('$department_id','$employee_id','$service_charge','$servic_month')";
								$insdata=$db->insert($ins); 
								}							
								if($insdata==true){
										?> 
										<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>Service Charge Successfully Generated</strong>  
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
				<!--Service Charge Proccesing Area-->	
			

					<form action="" method="post" > 
						<br />
				
						<div class="" style="width:650px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Service Charge </h5>
						
						<div class="col-sm-12 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" min="<?php echo date('Y-m')?>" value="<?php echo date('Y-m')?>" required>
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">
							  <button type="submit" name="process_service_charge" class="btn btn-success text-white">Process Service Charge</button>				
							  <button type="submit" name="View_info" class="btn btn-warning">View Details</button>	 
							</div>
						</div>
						
						</div>
					</form>
					<h6 class="text-danger"> N.B: First Complete below Step then Click to Process Button For generate Salary. </h6>
					<hr />
					<ul>
						<li> 1st Active Or Inactive Employee List</li>
						<li>Deduct Salary Or Lwp Entry</li>
						<li>Leave Entry</li>
					</ul>
					
					<?php 
				 
						if(isset($_POST["View_info"])){					
								$servic_month =$_POST['month'];
							
									if ($servic_month==true){
										?> 
										<h2 class="text-center text-success">												
										<?php								
										$month 	= date("F",strtotime($servic_month));
										$Year 	= date("Y",strtotime($servic_month));
										echo $month.'-'.$Year ;

										?>
										</h2>
										<table id="example2" class="table table-bordered" style="width:100%;">
											<thead>
											<tr class="bg-warning text-white">
												<th>#S.L No</th>
												<th>Department</th>								
												<th>Employee Name</th>
												<th>Amount</th>
												<th>Month</th>
											</tr>
											</thead>
											<tbody>

												
												<?php 
													$query2 ="SELECT * FROM `service_charge` WHERE `sevice_charge_month` LIKE '$servic_month%'";
													$results2=$db->select($query2);
													$id=0; 
													if ($results2==true){	
														while($res2=$results2->fetch_assoc()){
														$id++; 
												
													?> 
										
											  <tr style="padding:0px; margin:0px;">
												<td><?php echo $id;?></td>
												<td><?php 
												$dpid= $res2['department_id']; 
												
												$query2="select * from department where id='".$dpid."'"; 
													$dp=$db->select($query2);												
													if ($dp==true){
															while($dpname=$dp->fetch_assoc()){
															echo $dpname['name'];
														}
													}else{
															echo "Select Department";
														}
												
												?>
												</td>	
												<td>
													<?php 
													$em_id=$res2['employee_id']; 
													$query3="select * from employee where em_id='".$em_id."'"; 
													$results3=$db->select($query3);											
													if ($results3==true){
															while($res3=$results3->fetch_assoc()){
															echo $res3['name'];
														}
													}else{
															echo "Not match";
														}
													?> 
												
												</td>	 	
												<td><?php echo $res2['service_charge'];?></td>					
												<td><?php echo $res2['sevice_charge_month'];?></td>	
											  </tr> 
												<?php 
													} }
												?> 
								 
											</tbody>
											</table>
										<?php 
										}
									}
					?>
					
					
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card-wrapper" style=" margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						
					
					<form action="pdf/service_charge_bank_letter.php" target="_blank" method="post" > 
						<br />
				
						<div class="" style="width:360; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Print Bank Letter </h5>
						
						<div class="col-sm-12 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" min="<?php echo date('Y-m')?>" value="<?php echo date('Y-m')?>" required>
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">							
							  <button type="submit" name="bank_letter" class="btn btn-warning">Print Bank Letter</button>							
							</div>
						</div>
						
						</div>
					</form>					
					
				</div>
			</div>
		</div> 
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<?php 
							if(isset($_POST['importSubmit'])){ 
							
								$filename	=$_FILES["file"]["tmp_name"];  
								if($_FILES["file"]["size"]> 0){
									$file= fopen($filename,"r");
									
									while(($column=fgetcsv($file, 10000, ",")) !== FALSE){
										
										  $query ="INSERT INTO `service_charge_info`(`department_id`, `em_id`, `service_charge`, `status`) values 
													('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."')";
											
											$results=$db->insert($query);	
										}  
										if ($results==true) {
											?>
											
											<div class="form-group col-md-12">  			
												<div class="row ">
												<div style="width:650px; margin:0px auto; background:#eee; border:
													3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
															<div class="bg-success" style="padding:20px; border-radius:5px;">
																<h5 class="text-white">Succesfully Uploaded </h5>
															</div>
														</div>	
													</div>
												</div>
											
										 <?php 
										 }else {
											  echo"Failure"; 
										 }										
									}
								}
							?>
						<div class="card-wrapper" style="margin-top:10px; padding-top:10px;  padding-lef:15px; padding-right:30px; padding-bottom:20px;">
							<div style="margin: auto; width:400px; text-align:center;">
								<h5> Upload Employee Service Charge Info</h5>
								<hr />
									<form action="service_charge.php" method="post" enctype="multipart/form-data">
										<div class="col-sm-12 form-group">
											<label for="name-l" style="font-weight:bold;">Select File </label>
											<input type="file" class="form-control" name="file" id="name-l" placeholder="Enter your last name." required>
										</div>
										<div class="col-sm-12 form-group">
											<button type="submit" name="importSubmit" class="btn btn-success text-white">Upload Now</button>
										</div>
									</form>
									
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
<script  src="js/script.js"></script>


<!-- Data Table  -->
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js'></script>
<!--End Data Table  -->