<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i> Employee Monthly Attandance Summery Report</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Employee Monthly Attandance Summery Report</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<table class="table"> 
						
						<table id="#example" class="table table-bordered" >
								<thead>
									<tr class="bg-success text-white">
										<td style="width:10px;">S.L </td>
										<td style="width:200px;">Employee Name </td>
										<td style="width:100px;">Department </td>
										<?php
										$maxDays=date('t');
										$counter = 0;
										$max = $maxDays ;

										 while ($counter < $max) {
										   $counter++;
										 
										?>
										<td style="width:2px;"> <?php echo $counter;?> </td>
										<?php }?>
									
								
									</tr>
								</thead>
								<tbody>
							<?php 
								$query="select * from employee"; 
								$results=$db->select($query);
								$id=0; 
								if ($results==true){
										while($res=$results->fetch_assoc()){
											$id++; 
								
								?> 
								<tr class="text-center">
								<td ><?php echo $res['em_id']; ?>  </td>
								<td ><?php echo $res['name']; ?> </td>
								<td><?php 
									$dpid= $res['department']; 
									
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
								
								<?php
								$maxDays=date('t');
								$counter = 0;
								$max = $maxDays ;

								 while ($counter < $max) {
								   $counter++;
								 
								?>
								<td style="width:2px;"> <span style="font-weight:bold; color:green;" >Y</span> </td>
								<?php }?>
								
								
								</td>	 
								</tr>
								 <?php }}?>
								</tbody>
							</table>
						
					</table>
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
<script  src="js/script.js"></script>


<!-- Data Table  -->
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js'></script>
<!--End Data Table  -->