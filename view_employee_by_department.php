<?php 
include ('include/header.php'); 
?>
<?php
	if(isset($_GET['dpid'])){
			$dpid =$_GET['dpid'];		
	}else{
		echo"Wrong Command";
	}
	
	?>
<main class="page-content">
<div class="container">
	<div class="row">
	<div class="col-md-12 bg-white">
		<h4 style="padding:20px; "> Employee List of
			<?php				
				$query="select * from department where id=$dpid"; 
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
			</h4>
		<hr />
	</div>
					<div class="form-group col-md-12 bg-white" style="padding:20px ">  
						 
						<table id="example" class="table table-bordered table-striped nowrap" style="padding:20px;  ">
											<thead>
												<tr class="bg-success text-white">
													<th>#EMID</th>																						
													<th>Name</th>
													<th>Desigination</th>
													<th>Joining Date</th>													
													<th>Department</th>
													<th>Basic/Fixed Salary</th>	
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php 
											$query="select * from employee where department_id=$dpid"; 
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
													
													<td><?php 
													$em_id= $res['em_id']; 
													
													$em_idquery="select * from salary_details_info where employee_id='".$em_id."'"; 
														$em_id_res=$db->select($em_idquery);
														if ($em_id_res==true){
															while($emidres=$em_id_res->fetch_assoc()){
																	$status=$emidres['status'];																													
																		if ($status==1){
																			?> 
																			 <h6 class="text-success">Active</h6>
																			 <?php																		
																		}else{
																			?>
																			 <h6 class="text-danger">Inactive</h6>
																			<?php
																		} 
															}
														}
													
													?></td>
													
													<td>													
													<a href="single_salary_view.php?id=<?php echo $res['em_id']; ?>" class="btn btn-success btn-sm" >S/D</a>
													<a href="edit_employee.php?em_id=<?php echo $res['em_id']; ?> "><i class="fa fa-edit text-white btn btn-warning"></i></a>
													</td>
												</tr>
												
												

												
											<?php }}?>
											  
											</tbody>
										</table>
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
