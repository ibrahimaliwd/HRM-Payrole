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
	<div class="row" >
	
					<div class="col-md-12 bg-white" >
						<h4 style="padding:20px; ">Department Information </h4>
						<hr />
					</div>
					<div class="col-md-12 bg-white" >  
						 <div class="row">
							<div class="col-md-6">
								
						<div style="width:100%; height:95%; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
						<h5 class="text-center bg-white text-warning" style="padding: 10px; font-weight:bold;"> Add New Department</h5>
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
															
									<form action="new_department.php" method="post">
										<div class="col-sm-12 form-group">
											<label for="name-l" style="font-weight:bold;">Department Name </label>
											<input type="text" class="form-control" name="name" id="name-l" placeholder="Enter Department Name." required>
										</div>
										<div class="col-sm-12 form-group">
											<button type="submit" name="department" class="btn btn-warning text-white">Save info</button>
										</div>
									</form>
									<p>N.B:</p>
									<ul>
										<li>Be careful for Creating Deparment Name </li>
										<li>You Can Create Only One Time</li>
										<li>You can't Delete Deparment name</li>
									</ul>
									</div>	
								</div>						
															
								<div class="col-md-6 ">
									<div style="width:100%; margin:0px auto; background:#eee; border:
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
												<td> <a href="view_employee_by_department.php?dpid='<?php echo $res['id'];?>'" class="btn btn-success btn-sm">View Employee</a> 
												</td>
											  </tr>
											 
											<?php }}?>  
											</tbody>
										  </table>
										
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
