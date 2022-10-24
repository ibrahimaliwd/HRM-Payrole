<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i>Process Salary</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Process Salary</h6>
			<div class="col-md-5">
				<div class="card-wrapper" style=" width: 100%; margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						
					<!--Service Charge Proccesing Area-->	
						<?php 
				 
						if(isset($_POST["process_salary"])){					
							$servic_month =$_POST['month'];
							
							$chk="SELECT * FROM `temp_salary_sheet` WHERE `month_name` LIKE '$servic_month%'";
							$check=$db->select($chk);
							
							if(($check !== false && $check->num_rows)>0){
								echo "<script type='text/javascript'>alert('Already Generated!')</script>";
							}else{
							$query ="SELECT * FROM `salary_details_info` where status=1";
							$results=$db->select($query);
							
							while($data=$results->fetch_assoc()){
								$department_id		=$data['department_id'];
								$employee_id		=$data['employee_id'];
								$grade_id			=$data['grade_id'];
								$basic_salary		=$data['basic_salary'];
								$fixed_pay			=$data['fixed_pay'];
								$personal_pay		=$data['personal_pay'];
								$over_time			=$data['over_time'];
								$deduct_one_day		=$data['deduct_one_day'];
								$pf_contribution	=$data['pf_contribution'];
								$food_from_sc		=$data['food_from_sc']; 
								
								
								$lwp="SELECT * FROM `lwp_entry` WHERE `month` LIKE '$servic_month%'";
								$lwpres=$db->select($lwp);

										while($lwpres2=$lwpres->fetch_assoc()){
										$lwp_amount=$lwpres2['lwp_amount']; 
										$emid=$lwpres2['employee_id'];
										
										if ($employee_id==$emid){
												$ins="INSERT INTO `temp_salary_sheet`(`id`, `department_id`, `employee_id`, `grade_id`, `basic`, `fixed_pay`, 
												`personal_pay`, `over_time`, `deduct_one_day`, `pf_contribution`, `food_from_sc`, 
												`deducation_amount`, `tax`,`month_name`, `lwp_amount`, `authorize_by`) 
												VALUES 
												(NULL, '$department_id','$employee_id','$grade_id','$basic_salary','$fixed_pay',
												'$personal_pay','$over_time','$deduct_one_day','$pf_contribution','$food_from_sc',
												NULL,NULL,'$servic_month','$lwp_amount',NULL)";
												$insdata=$db->insert($ins);
												
										}else{
											$ins="INSERT INTO `temp_salary_sheet`(`id`, `department_id`, `employee_id`, `grade_id`, `basic`, `fixed_pay`, 
											`personal_pay`, `over_time`, `deduct_one_day`, `pf_contribution`, `food_from_sc`, 
											`deducation_amount`, `tax`,`month_name`,`authorize_by`) 
											VALUES 
											(NULL, '$department_id','$employee_id','$grade_id','$basic_salary','$fixed_pay',
											'$personal_pay','$over_time','$deduct_one_day','$pf_contribution','$food_from_sc',
											NULL,NULL,'$servic_month',NULL)";
											$insdata=$db->insert($ins);
										}
									}
								}							
								if($insdata==true){
										?> 
										<div class="alert alert-success alert-dismissible">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
										  <strong>Salary Successfully Generated</strong>  
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
				
						<div class="" style="width:100%; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Process Salary  </h5>
						
						<div class="col-sm-12 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" value="<?php echo date('Y-m')?>" >
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">
							  <button type="submit" name="process_salary"  class="btn btn-success text-white">Process Salary</button>				
							  <!--<button type="submit" name="View_info" class="btn btn-warning">View Details</button>	 --> 
							</div>
						</div>
						
						</div>
					</form>
					
					<!--	 
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
									<form action="">
										<table id="example2" class="table table-bordered" style="width:100%;">
											<thead>
											<tr class="bg-warning text-white">
												<th>#EMID</th>
												<th>Employee Name</th>
												<th>Department</th>	 
												<th>Desigination</th>	 
												<th>Basic</th>
												<th>H.Rent</th>
												<th>D/A</th>
												<th>Medical</th>
												<th>Conv.</th>
												<th>P.Pay</th>
												<th>Fixed Pay</th>
												<th>Gross</th>
												<th>P.F.</th>
												<th>C.Contribute</th>
												<!--<th>P.F. Loan</th>--> 
												<th>Salary Adv.</th>
												<th>L.W.P.</th> 
												<th>Total Deduct</th>
												<th>Net Pay</th>
											</tr>
											</thead>
											<tbody>

												
												<?php 
													$query2 ="SELECT * FROM `temp_salary_sheet` WHERE `month_name` LIKE '$servic_month%'";
													$results2=$db->select($query2);
													$id=0; 
													if ($results2==true){	
														while($res2=$results2->fetch_assoc()){
														$id++; 
														 $em_id=$res2['employee_id'];
														 $basic 			= $res2['basic'];
														 $grade_id			= $res2['grade_id'];// Grade_id from salary_details_info table 
														 $personalPay		= $res2['personal_pay'];
														 $FixedPay			= $res2['fixed_pay'];
														 $pf				= $res2['pf_contribution'];
														 $month_deducation	= $res2['month_name'];
														 
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
														 $grossalary	=$basic+$personalPay+$FixedPay+$houserent+$dearallowance+$medical;
														 
											 
													?> 
										
											  <tr style="padding:0px; margin:0px;">
												<td><?php echo $id;?></td>
												
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
															echo $res3['desigination'];
														}
													}else{
															echo "Not match";
														}
													?> 
												
												</td>												
												<td><?php echo $basic;?></td>					
												<td><?php echo $houserent; ?></td>	
												<td><?php echo $dearallowance; ?></td>	
												<td><?php echo $medical; ?></td>	
												<td><?php echo $cn; ?></td>	
												<td><?php echo $res2['personal_pay']; ?> </td>
												<td><?php echo $res2['fixed_pay']; ?></td>
												<td><?php echo $grossalary;?></td>
												
												<td>
													<?php 
														$pf=$res2['pf_contribution'];
														if ($pf==1){
															$pfr =$basic*0.10; 
															echo $pfr; 
														}else{
															echo "P.F. Not Active"; 
														} 
													?>
												</td>
												<td>
													
													<?php														
													$pfr=pf($db,$pf,$basic); 
													 echo $pfr; 
													?>
												</td>
												<!--<td></td>--> 
												<td></td>
												<td>
													<?php														
													 
													?>
												</td> 
												<td>
													<?php 
														$pfr=pf($db,$pf,$basic);
														$lwpt=lwp($db,$FixedPay,$personalPay,$em_id,$month_deducation); 														
														$total_deducat=(int)$pfr+(int)$lwpt; 
														echo $total_deducat; 
														
													?> 
													
												</td>
												<td>
												<?php 
													$pfr=pf($db,$pf,$basic);
													$ccontribute=cc($db,$pf,$basic);
													$lwpt=(int)lwp($db,$FixedPay,$personalPay,$em_id,$month_deducation);
													$grand_total_deducat=(int)$pfr+(int)$lwpt+(int)$ccontribute;
													$netpay=$grossalary-$grand_total_deducat; 
													echo $netpay; 
													
												?> 
												
												
												</td> 
											  </tr> 
												<?php 
													} }}}
												?> 
								 
											</tbody>
											</table>
											
											<br />
									
										<div class="col-sm-12 form-group">
													<div class="btn-group">
												  <button type="submit" name="process_salary" class="btn btn-success text-white">Authorized Salary</button>			
												
												</div>
											</div>
									</form>
									
										<?php 
										}
									}
					?>
					--> 
					<h6 class="text-danger"> N.B: First Complete below Step then Click to Process Button For generate Salary. </h6>
					<hr />
					<ul>
						<li> 1st Active Or Inactive Employee List</li>
						<li>Deduct Salary Or Lwp Entry</li>
						<li>Leave Entry</li>
					</ul>
					</div>
					
				</div>
			</div>
			<div class="col-md-3">
				<div class="card-wrapper" style=" margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						
					
					<form action="pdf/salary_sheet.php" target="_blank" method="post" > 
						<br />
				
						<div class="" style="width:360; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Download Salary Sheet</h5>
						
						<div class="col-sm-12 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" value="<?php echo date('Y-m')?>" required>
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">							
							  <button type="submit" name="salary_sheet" class="btn btn-warning">Download</button>							
							</div>
						</div>
						
						</div>
					</form>					
					
				</div>
				</div>
			</div> 
			<div class="col-md-4">
				<div class="card-wrapper" style=" margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
						
					
					<form action="pdf/salary_bank_letter.php" target="_blank" method="post" > 
						<br />
				
						<div class="" style="width:360; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						<div class="row">
						<h5 style="padding:20px;" class="bg-warning">Download Bank Letter</h5>
						
						<div class="col-sm-12 form-group">
							<label for="name-f">Selct Month</label>
							<input  type="month" id="start" class="form-control" name="month" value="<?php echo date('Y-m')?>" required>
						</div>				
						<div class="col-sm-12 form-group">
							 <div class="btn-group">							
							  <button type="submit" name="salary_bank_letter" class="btn btn-warning">Download</button>							
							</div>
						</div>
						
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