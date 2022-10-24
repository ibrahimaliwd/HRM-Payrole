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
<div class="container">
	<div class="row">
	<div class="col-md-12 bg-white">
		<h4 style="padding:20px; ">Add new employee</h4>
		<hr />
	</div>
					<div class="form-group col-md-12 bg-white" style="padding:20px ">  
						<?php 
							if(isset($_POST['addnew'])){
								$e_id			=$_POST['e_id']; 
								$card_no		=$_POST['card_no']; 
								$file_no		=$_POST['file_no']; 
								$name			=$_POST['name']; 
								$f_name			=$_POST['f_name']; 
								$m_name			=$_POST['m_name']; 
								$desigination	=$_POST['desigination']; 
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
								$department		=$_POST['department_id']; 
								$emtype			=$_POST['emtype'];

							
								$query="INSERT INTO `employee`(`em_id`, `card_no`, `file_no`, `name`, `desigination`, `fathers_name`, 
								`mothers_name`, `nationality`, `mailing_address`, `permanent_address`, `place_of_birth`,
								`marital_status`, `religion`, `phone`, `country`,`joining_date`,`date_of_birth`, `gender`, `department`, 
								`employee_type`, `photo`, `role`, `role_id`) values 
								('$e_id','$card_no','$file_no','$name','$desigination','$f_name',
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
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Fathers name </label>
								<input type="text" class="form-control" name="f_name" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Mothers name</label>
								<input type="text" class="form-control" name="m_name" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Desigination </label>
								<input type="text" class="form-control" name="desigination" id="name-l" placeholder="Enter your last name." required>
							</div>
							<div class="col-sm-3 form-group">
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
							<div class="col-sm-3 form-group">
								<label for="sex" style="font-weight:bold;">Employee Type <span style="color:red">*</span></label>
								<select id="sex" name="emtype" class="form-control browser-default custom-select">						
								
								</option>
								<option value="1">Permanent</option>
								<option value="2">On Probition Employee </option>
								<option value="3">Contructual</option>
							</select>
							</div> 							
							
							</div>  
							<div class="col-sm-4 form-group">
								<button type="submit" name="addnew" class="btn btn-warning text-white">Save info</button>
							</select>
							</div>
							</form> 
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
