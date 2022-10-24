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

			<div class="col-md-8">
			
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<br />
					<div class="" style= "margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">

						<?php 
							error_reporting(0); 
							if(isset($_POST['employye_info'])){
								$department		=$_POST['department'];  
								$emname			=$_POST['emname'];  
								$bank_name		=$_POST['bank_name'];  
								$account_no		=$_POST['account_no'];  
							
								$chk="SELECT * FROM `employee_bank_info` WHERE `employee_id` LIKE '$emname%'";
								$check=$db->select($chk);
								
								if(($check !== false && $check->num_rows)>0){
									echo "<script type='text/javascript'>alert('Already Have Bank Account!')</script>";
								}else{
							
								$query="INSERT INTO `employee_bank_info`( `department_id`, `employee_id`, `account_no`, `account_type`)  values 
								('$department','$emname','$account_no','0')"; 

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Bank Added Successfully Completed</strong>  
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
								<div class="row">
								<h5 style="padding:20px;" class="bg-warning">Employee Bank Accounts Information</h5>
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
									<label for="name-f">Bank Name:</label> 
									<select id="bank" name="ACCO" class="form-control browser-default custom-select">
									<option value=""> Select</option>
									<?php 
									$query="select * from bank_name"; 
									$results=$db->select($query);
									$id=0; 
									if ($results==true){
											while($res=$results->fetch_assoc()){
											$id++; 
									?> 
									<option value="<?php echo $res['id']; ?>"><?php echo $res['bank_name']; ?></option>
									<?php }} ?>
									 
									</select>
								</div>	
								<div class="col-sm-12 form-group">
									<label for="name-f">Account No:</label>
									<input type="text" class="form-control" name="account_no" id="name-f" placeholder="Enter Bank Account No" required>
								</div>	 				
								<div class="col-sm-12 form-group">
									 <div class="btn-group">
									  <button type="submit" name="employye_info" class="btn btn-success">Save</button>							  
									</div>
								</div>
							</div>
						</form>
					</div> 
				</div>
			</div>
		
			<div class="col-md-4">
			<?php 
							if(isset($_POST['importSubmit'])){ 
							
								$filename	=$_FILES["file"]["tmp_name"];  
								if($_FILES["file"]["size"]> 0){
									$file= fopen($filename,"r");
									
									while(($column=fgetcsv($file, 10000, ",")) !== FALSE){
										
										  $query ="INSERT INTO `employee_bank_info`(`department_id`, `employee_id`, `account_no`,`account_type`) 
										  values('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."')";
											
											$results=$db->insert($query);	
										}  
										if ($results==true) {
											?>
											
											<div class="form-group col-md-12">  			
												<div class="row ">
												<div style="width:650px; margin:0px auto; background:#eee; border:
													3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
															<div class="bg-success" style="padding:20px; border-radius:5px;">
																<h5 class="text-white">Succesfully Upload Bank information </h5>
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
						<h5> Upload Bank Account Information </h5>
						<hr /> 
							<form action="employee_bank_account.php" method="post" enctype="multipart/form-data">
								<div class="col-sm-12 form-group">
									<label for="name-l" style="font-weight:bold;">Select File </label>
									<input type="file" class="form-control" name="file" id="name-l" placeholder="Enter your last name." required>
								</div>
								<div class="col-sm-12 form-group">
									<button type="submit" name="importSubmit" class="btn btn-success text-white">Upload Now</button>
								</div>
							</form>
							
							
						</div>
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
							<?php 
							error_reporting(0); 
							if(isset($_POST['com_bank_info'])){
								$ban_name		=$_POST['ban_name'];  
								$account		=$_POST['account'];  
								$account_type	=$_POST['account_type'];  
							
								$query="INSERT INTO `bank_name`(`bank_name`, `account`, `ac_type`)  values 
								('$ban_name','$account','$account_type')"; 

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Bank Added Successfully Completed</strong>  
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
				
							<div class="" style="max-width:650px; margin:0px auto; background:#eee; border:
							3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
								<div class="row">
								<h5 style="padding:20px;" class="bg-warning">Company Bank Info</h5>					
								<div class="col-sm-12 form-group">
									<label for="name-f">Bank Name:</label>
									<input type="text" class="form-control" name="ban_name" id="name-f" placeholder="Enter Bank Name" required>
								</div>	
								<div class="col-sm-12 form-group">
									<label for="name-f">Account No:</label>
									<input type="text" class="form-control" name="account" id="name-f" placeholder="Enter Account Name" required>
								</div>	
								<div class="col-sm-12 form-group">
									<label for="name-f">AC Type:</label>
									<input type="text" class="form-control" name="account_type" id="name-f" placeholder="Current or Salary" required>
								</div>							
								<div class="col-sm-12 form-group">
									 <div class="btn-group">
									  <button type="submit" name="com_bank_info" class="btn btn-success">Save</button>							  
									</div>
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