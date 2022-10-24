<?php 
include ('include/header.php'); 
?>
<?php 
$tabId = isset($_GET['tabid'])?$_GET['tabid'] : "";
?>
<?php
	if(isset($_GET['em_id'])){
			$get_em_id =$_GET['em_id'];		
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
								$e_id			=mysqli_real_escape_string($db->link,$_POST['e_id']); 
								$card_no		=mysqli_real_escape_string($db->link,$_POST['card_no']); 
								$file_no		=mysqli_real_escape_string($db->link,$_POST['file_no']); 
								$name			=mysqli_real_escape_string($db->link,$_POST['name']); 
								$f_name			=mysqli_real_escape_string($db->link,$_POST['f_name']); 
								$m_name			=mysqli_real_escape_string($db->link,$_POST['m_name']); 
								$desigination	=mysqli_real_escape_string($db->link,$_POST['desigination']); 
								$nationality	=mysqli_real_escape_string($db->link,$_POST['nationality']); 
								$mail_address	=mysqli_real_escape_string($db->link,$_POST['mail_address']); 
								$per_address	=mysqli_real_escape_string($db->link,$_POST['per_address']); 
								$pob			=mysqli_real_escape_string($db->link,$_POST['pob']); 
								$m_status		=mysqli_real_escape_string($db->link,$_POST['m_status']); 
								$religion		=mysqli_real_escape_string($db->link,$_POST['religion']); 
								$phone			=mysqli_real_escape_string($db->link,$_POST['phone']); 
								$country		=mysqli_real_escape_string($db->link,$_POST['country']); 
								$joining		=mysqli_real_escape_string($db->link,$_POST['joining']); 
								$dob			=mysqli_real_escape_string($db->link,$_POST['dob']); 
								$gender			=mysqli_real_escape_string($db->link,$_POST['gender']); 
								$department		=mysqli_real_escape_string($db->link,$_POST['department_id']); 
								$emtype			=mysqli_real_escape_string($db->link,$_POST['emtype']);

							
								$query="UPDATE `employee` SET 							
								`em_id`				='$e_id',
								`card_no`			='$card_no',
								`file_no`			='$file_no',
								`name`				='$name',
								`desigination`		='$desigination',
								`fathers_name`		='$f_name',
								`mothers_name`		='$m_name',
								`nationality`		='$nationality',
								`mailing_address`	='$mail_address',
								`permanent_address`	='$per_address',
								`place_of_birth`	='$pob',
								`marital_status`	='$m_status	',
								`religion`			='$religion',
								`phone`				='$phone',
								`country`			='$country',
								`joining_date`		='$joining',
								`date_of_birth`		='$dob',
								`gender`			='$gender',
								`department_id`		='$department',
								`employee_type`		='$emtype'
								
								
									where em_id='$e_id'"; 							
							
								$results=$db->update($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Information Successfully Updated <a href="view_employee.php">Back</a></strong>  
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
						
						<?php 
							$query="select * from employee where em_id='".$get_em_id."'"; 
							$results=$db->select($query);
							$id=0; 
							if ($results==true){
									while($res=$results->fetch_assoc()){
										$id++; 
							
							?> 
						
						<form action="" method="post" enctype="multipart/form-data"> 
						<div class="row" style="font-weight:bold; ">				
							<div class="col-sm-4 form-group">
								<label for="name-f" style="font-weight:bold;">Employee ID <span style="color:red">*</span></label>
								<input type="text" class="form-control" name="e_id" id="name-f" value="<?php echo $res['em_id']; ?>" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="name-f" style="font-weight:bold;">Card No </label>
								<input type="text" class="form-control" name="card_no" id="name-f" value="<?php echo $res['card_no']; ?> " required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="name-f" style="font-weight:bold;">File No</label>
								
								<input type="text" class="form-control" name="file_no" id="name-f" value="<?php echo $res['file_no']; ?>" required>
							</div>
							
								
							<div class="col-sm-4 form-group">
								<label for="name-f" style="font-weight:bold;">Name <span style="color:red">*</span></label>
								<input type="text" class="form-control" name="name" id="name-f" value="<?php echo $res['name']; ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Fathers name </label>
								<input type="text" class="form-control" name="f_name" id="name-l" value="<?php echo $res['fathers_name']; ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Mothers name</label>
								<input type="text" class="form-control" name="m_name" id="name-l" value="<?php echo $res['mothers_name']; ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Desigination</label>
								<input type="text" class="form-control" name="desigination" id="name-l" value="<?php echo $res['desigination']; ?>" required>
							</div>
							<div class="col-sm-3 form-group">
								<label for="name-l" style="font-weight:bold;">Nationality </label>
								<input type="text" class="form-control" name="nationality" id="name-l" value="<?php echo $res['nationality']; ?>" required>
							</div>
							<div class="col-sm-6 form-group">
								<label for="email" style="font-weight:bold;">Mailling Address <span style="color:red">*</span> </label>
								  <textarea class = "form-control" rows = "3" name="mail_address" ><?php echo $res['mailing_address']; ?></textarea>
							</div>           
							<div class="col-sm-6 form-group">
								<label for="email" style="font-weight:bold;">Permanent Address</label>
								  <textarea class = "form-control" rows = "3" name="per_address" ><?php echo $res['permanent_address']; ?></textarea>
							</div>
							<div class="col-sm-2 form-group">
								<label for="State" style="font-weight:bold;">Place Of Birth </label>
								<input type="address" class="form-control" name="pob" id="State" value="<?php echo $res['place_of_birth']; ?>" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="zip" style="font-weight:bold;">Marital Status</label>
								<input type="zip" class="form-control" name="m_status" id="zip" value="<?php echo $res['marital_status']; ?>" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="zip" style="font-weight:bold;">Religion <span style="color:red">*</span></label>
								<input type="zip" class="form-control" name="religion" id="zip" value="<?php echo $res['religion']; ?>" required>
							</div>
							 <div class="col-sm-3 form-group">
								<label for="tel" style="font-weight:bold;">Phone <span style="color:red">*</span></label>
								<input type="tel" name="phone" class="form-control" id="tel" value="<?php echo $res['phone']; ?>" required>
							</div>
						
							<div class="col-sm-2 form-group">
								<label for="Country"  style="font-weight:bold;">Country</label>
								<select class="form-control custom-select browser-default" name="country">
									<option value="<?php echo $res['country']; ?>"><?php echo $res['country']; ?></option>								
								</select>
							</div>
							<div class="col-sm-2 form-group">
								<label for="Date" style="font-weight:bold;">Joining Date <span style="color:red">*</span></label>
								<input type="Date" name="joining" class="form-control" id="Date" value="<?php 
								
								$day	= date('d', strtotime($res['joining_date']));
								$month	= date('m', strtotime($res['joining_date']));
								$year	= date('Y', strtotime($res['joining_date']));
								
								$jd=$year.'-'.$month.'-'.$day; 
								echo $jd;
								
								?>" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="Date" style="font-weight:bold;">Date Of Birth <span style="color:red">*</span></label>
								<input type="date" name="dob" class="form-control" id="Date" value="<?php
																
								$day	= date('d', strtotime($res['date_of_birth']));
								$month	= date('m', strtotime($res['date_of_birth']));
								$year	= date('Y', strtotime($res['date_of_birth']));
								
								$dob=$year.'-'.$month.'-'.$day; 
								echo $dob; 

								?>" required>
							</div>
							<div class="col-sm-2 form-group">
								<label for="sex" style="font-weight:bold;">Gender</label>
								<select id="sex" name="gender" class="form-control browser-default custom-select">
									<option value="<?php echo $res['gender']; ?>" selected>
									<?php 

									if($res['gender']=1){
											echo 'Male';
									}else{
										echo 'Female'; 
									}

									?> 
									
									</option>
									<option value="1">Male</option>
									<option value="2">Female</option>
										
								</select>
							</div> 
							<!--
							<div class="col-sm-2 form-group">
								<label for="sex" style="font-weight:bold;">Department <span style="color:red">*</span></label>
								<select id="sex" name="department"class="form-control browser-default custom-select">
									<option value="">Select</option>
									
									<?php 
									$de_id=$res['department'];
									$query="select * from department where id='".$de_id."'"; 
									$results2=$db->select($query);									
									if ($results2==true){
											while($res2=$results2->fetch_assoc()){										
									
									?> 
									<option value="<?php echo $res2['id']?>" selected><?php echo $res['res2']?></option>
									
									<?php }} ?>	
									
									<?php 
									
									$query="select * from department"; 
									$results3=$db->select($query);									
									if ($results2==true){
											while($results3=$results3->fetch_assoc()){										
									
									?> 
									<option value="<?php echo $results3['id']?>"><?php echo $res['results3']?></option>
									
									<?php }} ?>
									
								</select>
								
							</div> 
								-->
							<div class="col-sm-3 form-group">
								<label for="sex" style="font-weight:bold;">Employee Type <span style="color:red">*</span></label>
								<select id="sex" name="emtype" class="form-control browser-default custom-select">
								
								
								<option value="<?php echo $res['employee_type']?>" selected>
								<?php 

									if($res['employee_type']=1){
										echo'Permanent'; 
									}elseif($res['employee_type']=2){
										echo'On Probition Employee'; 
									}else{
										echo'Contructual';
									}
									
									?>
								</option>
								<option value="1">Permanent</option>
								<option value="2">On Probition Employee </option>
								<option value="3">Contructual</option>
							</select>
							</div> 
							
							<div class="col-sm-2 form-group">
								<label style="font-weight:bold;">Department <span style="color:red">*</span></label>
								<select  name="department_id" class="form-control ">
								
								
								<?php 
									$de_id=$res['department_id'];
									$query="select * from department where id='".$de_id."'"; 
									$results2=$db->select($query);									
									if ($results2==true){
											while($res2=$results2->fetch_assoc()){										
									
									?> 
									<option value="<?php echo $res2['id']?>" selected><?php echo $res2['name']; ?></option>
									
									<?php }} ?>	
									
									<?php 
									
									$query3="select * from department"; 
									$res3=$db->select($query3);									
									if ($res3==true){
											while($res33=$res3->fetch_assoc()){										
									
									?> 
									<option value="<?php echo $res33['id']?>"> <?php echo $res33['name']; ?></option>
									
									<?php }} ?>
						 
								</select>
							</div>  
							
							<div class="col-sm-4 form-group">
								<button type="submit" name="addnew" class="btn btn-warning text-white">Update Now</button>
							</select>
							</div>
							
							</form> 
						</div>
						
							<?php }} ?>
						
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
