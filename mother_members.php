<?php 
include ('include/header.php'); 
?>

<main class="page-content">
<div class="container">
	<div class="row" >
	
		<div class="col-md-12 bg-white" >
			<h4 style="padding:20px; ">NCL Mother Members </h4>
			<hr />
		</div>
		<div class="col-md-12 bg-white" > 
			
					<table id="" class="table table-bordered table-striped nowrap" style="padding:20px;  ">
							<thead>
								<tr class="bg-success text-white">
									<th>S.L No</th>																						
									<th>Account No</th>
									<th>Name</th>
									<th>Status</th>												
									
								</tr>
							</thead>
							<tbody>
				
				<?php /*
					*/
															
								$query2="select * from ncl_members"; 
								$results2=$db->select($query2);
								$id=0; 
								if ($results2==true){
									while($res2=$results2->fetch_assoc()){								
									$pmcode=$res2['ac']; 
									$id++; 
										
											
																	
								?> 
								<tr>
									<td><?php echo $id; ?> </td>
									<td><?php echo $res2['ac'] ?> </td>
									<td><?php echo $res2['name'] ?> </td>
									<td><?php 
										$query="select * from am_to_pm where ac ='$pmcode'"; 
										$results=$db->select($query);					
										if ($results==true){
											while($res=$results->fetch_assoc()){
												$ampmcode=$res['ac'];
												
												if($ampmcode==$pmcode){	
													if($pmcode==$ampmcode){
														echo"Am To PM";
													}else{
														echo "Mother Member"; 
													}
												}
												
											
											
									?> </td>
									
								</tr>
							
							<?php }}}} ?>
				</tbody>
			 </table>
	
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
