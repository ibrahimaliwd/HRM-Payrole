<?php 
include ('include/header.php'); 
?>
<?php 
$tabId = isset($_GET['tabid'])?$_GET['tabid'] : "";
?>
<?php
	if(isset($_GET['tabid'])){
			$tabId =$_GET['tabid'];		
	}else{
		echo"Wrong Command";
	}
	
	?>

 

<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning" ></i> Employee Information</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Employee Information</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px;">
					<div class="row">
					 <ul class="nav nav-tabs text-white" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active bg-warning" data-toggle="tab" href="#employee">Add New Employee</a>
						</li>
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#info">Information</a>
						</li>
						<!--
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#reports">Reports</a>
						</li>-->
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#newdepartment">Add New Department</a>
						</li><li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#import">Import Employee List</a>
						</li>
					  </ul>
					</div>
					<div class="tab-content">
					  <div class="row tab-pane <?php if($tabId=="") echo("active"); ?>" id="employee">
						<div class="form-group col-md-12">  
						<?php 
							if(isset($_POST['addnew'])){
								$e_id			=$_POST['e_id']; 
								$card_no		=$_POST['card_no']; 
								$file_no		=$_POST['file_no']; 
								$name			=$_POST['name']; 
								$f_name			=$_POST['f_name']; 
								$m_name			=$_POST['m_name']; 
								$nationality	=$_POST['nationality']; 
								$mail_address	=$_POST['mail_address']; 
								$per_address	=$_POST['per_address']; 
								$pob			=$_POST['pob']; 
								$m_status		=$_POST['m_status']; 
								$religion		=$_POST['religion']; 
								$phone			=$_POST['phone']; 
								$country		=$_POST['country']; 
								$joining		=$_POST['joining']; 
								$dob			=$_POST['dob']; 
								$gender			=$_POST['gender']; 
								$department		=$_POST['department']; 
								$emtype			=$_POST['emtype'];

							
								$query="INSERT INTO `employee`(`em_id`, `card_no`, `file_no`, `name`, `fathers_name`, 
								`mothers_name`, `nationality`, `mailing_address`, `permanent_address`, `place_of_birth`,
								`marital_status`, `religion`, `phone`, `country`,`joining_date`,`date_of_birth`, `gender`, `department`, 
								`employee_type`, `photo`, `role`, `role_id`) values 
								('$e_id','$card_no','$file_no','$name','$f_name',
								'$m_name','$nationality','$mail_address','$per_address','$pob',
								'$m_status','$religion','$phone','$country','$joining','$dob','$gender','$department',
								'$emtype','image','2','2')";
								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>New Bank Added Successfully</strong>  
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
						
						<form action="" method="post" enctype="multipart/form-data"> 
						<div class="row">				
							<div class="col-sm-4 form-group">
								<label for="name-f" style="font-weight:bold;">Employee ID <span style="color:red">*</span></label>
								<input type="text" class="form-control" name="e_id" id="name-f" placeholder="Enter your first name." required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="name-f" style="font-weight:bold;">Card No </label>
								<input type="text" class="form-control" name="card_no" id="name-f" placeholder="Enter your first name." required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="name-f" style="font-weight:bold;">File No</label>
								
								<input type="text" class="form-control" name="file_no" id="name-f" placeholder="Enter your first name." required>
							</div>
							<div class="col-sm-4 form-group">
								<label for="name-f" style="font-weight:bold;">Name <span style="color:red">*</span></label>
								<input type="text" class="form-control" name="name" id="name-f" placeholder="Enter your first name." required>
							</div>
							<div class="col-sm-4 form-group">
								<label for="name-l" style="font-weight:bold;">Fathers name </label>
								<input type="text" class="form-control" name="f_name" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-4 form-group">
								<label for="name-l" style="font-weight:bold;">Mothers name</label>
								<input type="text" class="form-control" name="m_name" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-4 form-group">
								<label for="name-l" style="font-weight:bold;">Nationality </label>
								<input type="text" class="form-control" name="nationality" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-6 form-group">
								<label for="email" style="font-weight:bold;">Mailling Address <span style="color:red">*</span> </label>
								  <textarea class = "form-control" rows = "3" name="mail_address" placeholder = "Mailling Address"></textarea>
							</div>           
							<div class="col-sm-6 form-group">
								<label for="email" style="font-weight:bold;">Permanent Address</label>
								  <textarea class = "form-control" rows = "3" name="per_address" placeholder = "Permanent Address"></textarea>
							</div>
							<div class="col-sm-2 form-group">
								<label for="State" style="font-weight:bold;">Place Of Birth </label>
								<input type="address" class="form-control" name="pob" id="State" placeholder="Enter Birth Place" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="zip" style="font-weight:bold;">Marital Status</label>
								<input type="zip" class="form-control" name="m_status" id="zip" placeholder="Postal-Code." required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="zip" style="font-weight:bold;">Religion <span style="color:red">*</span></label>
								<input type="zip" class="form-control" name="religion" id="zip" placeholder="Postal-Code." required>
							</div>
							 <div class="col-sm-3 form-group">
								<label for="tel" style="font-weight:bold;">Phone <span style="color:red">*</span></label>
								<input type="tel" name="phone" class="form-control" id="tel" placeholder="Enter Your Contact Number." required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="Country"  style="font-weight:bold;">Country</label>
								<select class="form-control custom-select browser-default" name="country">
									<option value="Afghanistan">Bangladesh</option>
									<option value="Åland Islands">India</option>
								</select>
							</div>
							<div class="col-sm-2 form-group">
								<label for="Date" style="font-weight:bold;">Joining Date <span style="color:red">*</span></label>
								<input type="Date" name="joining" class="form-control" id="Date" placeholder="" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="Date" style="font-weight:bold;">Date Of Birth <span style="color:red">*</span></label>
								<input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="sex" style="font-weight:bold;">Gender</label>
								<select id="sex" name="gender" class="form-control browser-default custom-select">
									<option value="male">Male</option>
									<option value="female">Female</option>
									<option value="unspesified">Unspecified</option>
								</select>
							</div> 
							<div class="col-sm-2 form-group">
								<label for="sex" style="font-weight:bold;">Department <span style="color:red">*</span></label>
								<select id="sex" name="department"class="form-control browser-default custom-select">
									<option value="">Select</option>
									<?php 
									$query="select * from department"; 
									$results=$db->select($query);									
									if ($results==true){
											while($res=$results->fetch_assoc()){										
									
								?> 
									<option value="<?php echo $res['id']?>"><?php echo $res['name']?></option>
									
									<?php }} ?>				
								</select>
							</div> 	
							<div class="col-sm-4 form-group">
								<label for="sex" style="font-weight:bold;">Employee Type <span style="color:red">*</span></label>
								<select id="sex" name="emtype" class="form-control browser-default custom-select">
								<option value="01">Permanent</option>
								<option value="02">Contructual</option>
								<option value="03">On Probition Employee</option>
							</select>
							</div>  
							<div class="col-sm-4 form-group">
								<button type="submit" name="addnew" class="btn btn-warning text-white">Save info</button>
							</select>
							</div>
							</form> 
						</div>
						
						</div>				
						</div>
						
						<div class="row tab-pane <?php if($tabId=="info") echo("active"); ?>" id="info">
							<div class="form-group col-md-12">  			
								<div class="row ">
									<div class="col-sm-12 " style=" padding:20px;">
									   <table id="example" class="table table-bordered table-striped nowrap" style="width:100%; padding:20px;  ">
											<thead>
												<tr class="bg-success text-white">
													<th>#EMID</th>																						
													<th>Name</th>
													<th>Desigination</th>
													<th>Joining Date</th>
													<th>Gender</th>
													<th>Department</th>
													<th>Basic/Fixed Salary</th>								
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php 
											$query="select * from employee"; 
											$results=$db->select($query);
											$id=0; 
											if ($results==true){
													while($res=$results->fetch_assoc()){
														$id++; 
											
											?> 
												<tr>
													<td><?php echo $res['em_id'] ?></td>																			
													<td><?php echo $res['name'] ?></td>
													<td><?php echo $res['desigination'] ?></td>
													<td><?php echo $res['joining_date'] ?></td>
													<td><?php echo $res['gender'] ?></td>
													<td><?php 
													$dpid= $res['department']; 
													
													$query2="select * from department where id='".$dpid."'"; 
														$dp=$db->select($query2);												
														if ($dp==true){
																while($dpname=$dp->fetch_assoc()){
																echo $dpname['name'];
															}
														}else{
																echo "Select Department";
															}
													
													?></td>
											 
													<td>
													<?php 
													$emid= $res['em_id']; 
													
													$query3="select * from salary_details_info where employee_id='".$emid."'"; 
														$basic=$db->select($query3);												
														if ($basic==true){
																while($salary_info=$basic->fetch_assoc()){
																$fixedpay=$salary_info['fixed_pay'];
																if(!$fixedpay==true){
																echo number_format((float)$salary_info['basic_salary'], 2, '.', ',');
																}else{
																	echo 'Fixed='.number_format((float)$fixedpay, 2, '.', ',').'' ;
																}
															}
														}else{
																echo "<a href='employee_salary_info.php'> Salary Not Updated</a>";
															}
													
													?>
													
													</td>
													<td>													
													<a href="single_salary_view.php?id=<?php echo $res['em_id'] ?>" class="btn btn-success btn-sm" >Salary Details</a>
													
													</td>
												</tr>
												
												

												
											<?php }}?>
											  
											</tbody>
										</table>
											
										
										</div>
								</div>
							</div>
						</div>
						<div class="row tab-pane" id="reports">
							<div class="form-group col-md-12">  			
								<div class="row ">
								   <h2 class="">Reports</h2>
								</div>
							</div>
						</div>
						
							
						<div class="row tab-pane <?php if($tabId=="newdepartment") echo("active"); ?>" id="newdepartment">
							<div class="form-group col-md-12">  			
								<div class="row ">
									<div style="width:650px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
							<?php 
								if(isset($_POST['department'])){
									$name			=$_POST['name']; 
									
									$query="INSERT INTO `department`(`name`) values 
									('$name')";
									$results=$db->insert($query);
									if($results==true){
										?> 																									
										<div class='alert alert-success alert-dismissible'>
											<button type='button' class='close' data-dismiss='alert'>&times;</button>
										  <strong>Deparment Created Succesfully</strong>  
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
									
									<form action="employee_info.php?tabid=newdepartment" method="post">
										<div class="col-sm-12 form-group">
											<label for="name-l" style="font-weight:bold;">Department Name </label>
											<input type="text" class="form-control" name="name" id="name-l" placeholder="Enter Department Name." required>
										</div>
										<div class="col-sm-12 form-group">
											<button type="submit" name="department" class="btn btn-warning text-white">Save info</button>
										</div>
									</form>
									</div>	
								</div>
								
								<div class="row ">
									<div style="width:650px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
						
						
										<table id="example2" class="table table-bordered" style="width:100%;">
											<thead>
											  <tr class="bg-warning text-white">
												<th>#S.L No</th>
												<th>Department Name</th>								
												<th>Total Employee</th>
												<th>Action</th>
											  </tr>
											</thead>
											<tbody>
											<?php 
												$query="select * from department"; 
												$results=$db->select($query);
												$id=0; 
												if ($results==true){
														while($res=$results->fetch_assoc()){
															$id++; 
												
											?> 
										
											  <tr style="padding:0px; margin:0px;">
												<td><?php echo $id;?></td>
												<td><?php echo $res['name'];?></td>					
												<td>10</td>			
												<td> <a href="" class="btn btn-success btn-sm">Paid</a> <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
											  </tr>
											 
											<?php }}?>  
											</tbody>
										  </table>
										
									</div>	
								</div>
							</div>
						</div>
						
						
						<?php 
							if(isset($_POST['importSubmit'])){ 
							
								$filename	=$_FILES["file"]["tmp_name"];  
								if($_FILES["file"]["size"]> 0){
									$file= fopen($filename,"r");
									
									while(($column=fgetcsv($file, 10000, ",")) !== FALSE){
										
										  $query ="INSERT INTO `employee`(`em_id`, `card_no`, `file_no`, `name`, `desigination`, 
										  `fathers_name`, `mothers_name`, `nationality`, 
										  `mailing_address`, `permanent_address`, 
										  `place_of_birth`, `marital_status`, `religion`, `phone`, 
										  `country`, `joining_date`, `date_of_birth`, `gender`, 
										  `employee_type`, `photo`, `role`, `role_id`) values 
													('".$column[0]."','".$column[1]."','".$column[2]."',
													'".$column[3]."','".$column[4]."','".$column[5]."',
													'".$column[6]."','".$column[7]."','".$column[8]."',
													'".$column[9]."','".$column[10]."','".$column[11]."',
													'".$column[12]."','".$column[13]."','".$column[14]."',
													'".$column[15]."','".$column[16]."','".$column[17]."',
													'".$column[18]."','".$column[19]."','".$column[20]."',
													'".$column[21]."')";
											
											$results=$db->insert($query);	
										}  
										if ($results==true) {
											?>
											
											<div class="form-group col-md-12">  			
												<div class="row ">
												<div style="width:650px; margin:0px auto; background:#eee; border:
													3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
															<div class="bg-success" style="padding:20px; border-radius:5px;">
																<h5 class="text-white">Succesfully Upload Employees information </h5>
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
						<div class="row tab-pane <?php if($tabId=="import") echo("active"); ?>" id="import">
							<div class="form-group col-md-12">  			
								<div class="row ">
									<div style="width:650px; margin:0px auto; background:#eee; border:
											3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
											
										<form action="import_employee_information.php" method="post" enctype="multipart/form-data">
											<div class="col-sm-12 form-group">
												<label for="name-l" style="font-weight:bold;">Select File </label>
												<input type="file" class="form-control" name="file" id="name-l" placeholder="Enter your last name." required>
											</div>
											<div class="col-sm-12 form-group">
												<button type="submit" name="importSubmit" class="btn btn-warning text-white">Save info</button>
											</div>
										</form>
									</div>	
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div> 
	</div>
	
	


</main>
  <!-- page-content" -->
</div>

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
