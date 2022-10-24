<?php 
include ('include/header.php'); 
?>

<?php
	if(isset($_GET['id'])){
			$tid =$_GET['id'];
			$id= preg_replace("/[^0-9a-zA-Z]/", "", $tid);
			$getid = $id;			
	}else{
		echo"Wrong Command";
	}
	
	?>
						
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i> Employee single Salary Info</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Employee Single Salary Info</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					
			
					<br />
				
						<div class="" style="width:600px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
							
							
						 <table class="table table-bordered table-striped">
						<tr class="bg-warning">
							<td>Description</td>
							<td>:</td>
							<td>Subject</td>
							
						</tr>
					
						<?php  
							
							$query1="select * from salary_details_info where employee_id='".$getid."'"; 
							$basic1=$db->select($query1);												
							if ($basic1==true){
									while($salary_info1=$basic1->fetch_assoc()){
										
										 $grade_id		= $salary_info1['grade_id'];// Grade_id from salary_details_info table 
										 $basic			= $salary_info1['basic_salary']; 
										 $personalPay	= $salary_info1['personal_pay'];
										 $FixedPay		= $salary_info1['fixed_pay'];	
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
											 $houserent		=$hr* $basic; 
											 $dearallowance	=$d_a* $basic;  
											 $totalsalary	=$basic+$personalPay+$FixedPay+$houserent+$dearallowance+$medical;
									 
									 
							?>
							
							<?php  
							
							$query2="select * from employee where em_id='".$getid."'"; 
							$results=$db->select($query2);												
							if ($results==true){
									while($res=$results->fetch_assoc()){								 
									 
							?>
							
							
											
						<tr>
							<td>Employee Name</td>
							<td>:</td>
							<td><?php echo $res['name'];?></td>
							
						</tr><tr>
							<td>Department</td>
							<td>:</td>
							<td>
							<?php 
								$dpid= $res['department_id'];  
								
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
						</tr>
						<tr>
							<td>Desigination</td>
							<td>:</td>
							<td><?php echo $res['desigination'];?></td>
						</tr>
						<?php if(!$FixedPay==true){ ?> 
						<tr>
							<td>Basic Salary</td>
							<td>:</td>
							<td><?php echo number_format((float)$salary_info1['basic_salary'], 2, '.', ',');?></td>
						</tr>
						<tr>
							<td>House Rent</td>
							<td>:</td>
							<td><?php echo number_format((float)$houserent, 2, '.', ','); $houserent;?></td>
						</tr>
						<tr>
							<td>Dearness Allowance</td>
							<td>:</td>
							<td><?php echo number_format((float)$dearallowance, 2, '.', ','); ?></td>
						</tr>
						<?php 
							if (!$personalPay==true){ 
						
						?>
						<tr>
							<td>Personal Pay</td>
							<td>:</td>
							<td><?php echo number_format((float)$personalPay, 2, '.', ','); ?></td>
						</tr>
						<?php } ?> 
					
						<tr>
							<td>Medical</td>
							<td>:</td>
							<td><?php echo number_format((float)$medical, 2, '.', ','); ;?></td>
						</tr>
						<tr class="bg-warning text-bold">
							<td class="text-right">Total=</td>
							<td>:</td>
							<td><?php echo number_format((float)$totalsalary, 2, '.', ',');?></td>
						</tr>
						<?php }else{?>
							<tr>
								<td>Fixed Salary</td>
								<td>:</td>
								<td><?php echo number_format((float)$FixedPay, 2, '.', ','); ;?></td>
							</tr>
							<tr class="bg-warning text-bold">
								<td class="text-right">Total=</td>
								<td>:</td>
								<td><?php echo number_format((float)$FixedPay, 2, '.', ',');?></td>
							</tr>
						
						<?php }?>
						
						
						
									<?php }}}}}}  ?>
					 
					 
					 </table>
							<a href="view_employee.php" class="btn btn-warning btn-sm text-white ">Back to Employee Table</a>									 
						</div> 
					
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