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

			<div class="col-md-5">
			
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<br />
					<div class="" style= "margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<?php 
							error_reporting(0);
							if(isset($_POST['submitsalary'])){
								
								$getmonth		=$_POST['month']; 
								$department_id	=$_POST['department']; 
								$employee_name	=$_POST['emname']; 					
								$basic_salary	=$_POST['basic'];
								$deducat_days	=$_POST['days']; 
								
								//calculation part 
								//extract month & Year 
								$month_number 	= date("m",strtotime($getmonth));	
								$Year 			= date("Y",strtotime($getmonth));	
								
								//calculation days by month 
								$cal			= CAL_GREGORIAN; 								
								$month			= $month_number; 
								$year			= $Year; 
								$totaldays		= cal_days_in_month($cal, $month, $year); 
								
								$day_amount 			= $basic_salary/$totaldays; 
								$basic_deduct_amount 	= $deducat_days*$day_amount;
								
								
								$sldtailsq	="select * from salary_details_info where employee_id='".$employee_name."'"; // grade id table 
								$sldilsqr	=$db->select($sldtailsq);
										
								if ($sldilsqr==true){
										while($grade_info_from_salary_table=$sldilsqr->fetch_assoc()){
										$grade_id		= $grade_info_from_salary_table['grade_id'];// Grade_id from salary_details_info table 
									
										$gradeq="select * from salary_grade where id='".$grade_id."'"; // grade id table 
										$graderes=$db->select($gradeq);
											
									if ($graderes==true){
										while($grade_info=$graderes->fetch_assoc()){
										 //salary grade table data
										 $hr		= $grade_info['house_rent'];
										 $d_a		= $grade_info['dearness_allownce'];
										 $cn		= $grade_info['conveyence'];
										 $medical	= $grade_info['medical']; 
										 //end salary grade table data 
										  
										 //calculation
										 $houserent		=$hr* $basic_deduct_amount; 
										 $dearallowance	=$d_a* $basic_deduct_amount;  
										 $totalsalary	=$basic_deduct_amount+(float)$personalPay+(float)$FixedPay+$houserent+$dearallowance+(float)$medical+(float)$cn;
											
											
								
																															
								$chk="SELECT * FROM `lwp_entry` WHERE `employee_id` LIKE '$employee_name%' and `month` LIKE '$getmonth%'";
								$check=$db->select($chk);
								
								if(($check !== false && $check->num_rows)>0){
									echo "<script type='text/javascript'>alert('Already Deduct Salary This Month!')</script>";
								}else{
								$query="INSERT INTO `lwp_entry`(`department_id`, `employee_id`, `month`, `lwp_amount`, `days`)
								values 
								('$department_id','$employee_name','$getmonth','$totalsalary','$deducat_days')";
								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Salary Deduction Succesfully Completed</strong>  
									</div>
									<?php 
								}else{
									?> 
									<div class="alert alert-danger">
									  <strong>Somthing Problem</strong>  
									</div>
									<?php 
							}}}}}}}
								
								
						?>
						<form action="" method="post" >
						<div class="row">
							 
							<h5 style="padding:20px;" class="bg-warning">Salary Details:</h5>	
							<div class="col-sm-6 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" min="<?php echo date('Y-m')?>" value="<?php echo date('Y-m')?>" required>
							</div>	
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
								<select id="emname" onchange="getbasic(this.value)" name="emname" class="form-control browser-default custom-select">
									<option >Select</option>								
								</select>
							</div>	
							
							<div class="col-sm-6 form-group">
								<label for="sex">Basic</label>
								<select id="basic"  name="basic" class="form-control browser-default custom-select">
									<option >Select</option>
						 		
								</select>
							</div>								 
							<!--			
							<div class="col-sm-6 form-group">
								<label for="tel">Amount</label>
								<input type="tel" name="amount" class="form-control" id="tel" placeholder="Deduction Amount" required>
							</div>--> 
							
							<div class="col-sm-6 form-group">
								<label for="tel"> Days</label>
								<input type="tel" name="days" class="form-control" id="tel" placeholder="Days" required>
							</div>
							
						</div>
						<div class="col-sm-12 form-group mb-0">
						   <button type="submit" name="submitsalary"class="btn btn-warning" >Submit</button>
						 </div>
						</div>
					 </form>
						
					</div> 
			</div>
			<div class="col-md-7">
			
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						<br />
						<h5>Current Month Deduction Report</h5>
						<hr />
						<table id="example" class="table table-bordered table-striped" style="width:100%; padding:20px;  ">
							<thead>
								<tr class="bg-success text-white">												 																						
									<th>#ID</th>
									<th>Name</th>
									<th>Department</th> 
									<th>Month</th> 
									<th>Net D/A</th> 
									<th>Days</th> 
								</tr>
							</thead>
							<tbody>
							<?php 
								$month 	=date('Y-m'); 
								$query3="select * from lwp_entry where month='".$month ."'"; 
								$resultduct=$db->select($query3);
								$id=0; 
								if ($resultduct==true){
										while($dres=$resultduct->fetch_assoc()){
											$id++; 
							?>
								<tr>
									<td><?php echo $id; ?> </td>
									
										
									<td><?php 
										
										$em_id	= $dres['employee_id']; 
										
										$query2="select * from employee where em_id='".$em_id."'"; 
											$employee_res=$db->select($query2);												
											if ($employee_res==true){
													while($res=$employee_res->fetch_assoc()){
													echo $res['name'];
												}
											}else{
													echo "Select Department";
												}
									
									?> </td>
									
									
									
									<td>
									
									<?php 
									
										$dpid= $dres['department_id']; 
										
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
									
									$getmonth= $dres['month']; 
									$month_number 	= date("M",strtotime($getmonth));	
									$Year 			= date("Y",strtotime($getmonth));
									$month =$month_number.'-'.$Year ; 
									echo $month; 
									?>
									</td>
									
									
									<td><?php 
									$deduct_amount 	=$dres['lwp_amount'];
									
									echo rtrim(rtrim(number_format($deduct_amount, 2, ".", ""), '0'), '.'); ?></td>
									
									
									
									<td><?php echo $dres['days']; ?></td>
									
									
								</tr> 
							  
							  
								<?php }} else{ ?> 
								
									<tr>
									<td colspan="6" class="text-center" style="font-weight:bold;"><?php echo "No Data Found"; ?> </td>  
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
		  xhttp.send();
		} 
		
		function getbasic(str) { 
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			 document.getElementById("basic").innerHTML = this.responseText;
			}
		  };
		  xhttp.open("GET", "get_basic.php?emid="+str, true);
		  xhttp.send();
		} 
		
		
</script>
<!-- page-wrapper -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script  src="js/script.js"></script>