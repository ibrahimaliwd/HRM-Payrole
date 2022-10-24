<?php 
include ('include/header.php'); 
?>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
	<div class="board_marker">
		<h6>Home || Dashboard</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
				<!--Left side-->
			<div class="col-md-9">
				<div class="row text-center">
					<div class="col-md-4">
						<div class="card-wrapper">
						
						<?php  
						$query1="select COUNT(id) AS counem from employee"; 
						$em=$db->select($query1);												
						if ($em==true){
								while($count1=$em->fetch_assoc()){
						?> 
						<h4><?php echo $count1['counem'];?> </h4> 
						<?php } } ?>
						<p>Total Employee</p> 
						
						</div>
					</div>
					<div class="col-md-4">
						<div class="card-wrapper">
						<?php  
						$query2="select COUNT(id) AS coundp from department"; 
						$dp=$db->select($query2);												
						if ($dp==true){
								while($count2=$dp->fetch_assoc()){
						?> 
						<h4><?php echo $count2['coundp'];?> </h4> 
						<?php } } ?>
						<p>Department</p> 
						
						</div>
					</div>
					<div class="col-md-4">
						<div class="card-wrapper">
						<?php  
							
							$query3="select SUM(basic_salary) AS basic, SUM(personal_pay) AS personal,SUM(fixed_pay) AS fixed from salary_details_info"; 
							$basic1=$db->select($query3);												
							if ($basic1==true){
									while($salary_info1=$basic1->fetch_assoc()){
									 $basic			= $salary_info1['basic']; 
									 $personalPay	= $salary_info1['personal'];
									 $FixedPay		= $salary_info1['fixed'];
									 //calculation
									 $houserent		= 0.4 * $basic; 
									 $dearallowance	= 0.25 *$basic; 
									 $medical 		= 150; 
									 $totalsalary	= $basic+$personalPay+$FixedPay+$houserent+$dearallowance+$medical;
									 
							?>
						<h4><?php echo number_format((float)$totalsalary, 2, '.', ',');?></h4> 
						
						<?php } }?>
						
						<p>Total Salary </p> 
						
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="card-wrapper text-center" style="margin-top:20px; padding-top:200px; padding-bottom:300px;">			
						
							<h5>Welcome to Payrole & Employee Management System </h5>
							
						</div>
					</div>
				</div>
				
			</div>
			
			<!--Right side-->
			<div class="col-md-3">
					<div class="col-md-12">
						<div class="card-wrapper">
						<h4>5,000.00</h4> 
						<p>Total Decducation Last Month.</p> 
						</div>
					</div>
					<br />
					<div class="col-md-12">
						<div class="card-wrapper">
						<h4>30</h4> 
						<p>Total Employee Decducation Last</p> 
						</div>
					</div>
					<br />
					<div class="col-md-12">
						<div class="card-wrapper">
						<h4>00.00</h4> 
						<p>Add New Employee Last Month</p> 
						</div>
					</div>
			</div>
		</div> 
	</div>

  </main>
  <!-- page-content" -->
</div>
<?php 
include ('include/footer.php'); 
?>