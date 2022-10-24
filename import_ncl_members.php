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
			<h4 style="padding:20px; ">Upload NCL Members Information </h4>
			<hr />
		</div>
		<div class="col-md-12 bg-white" >  
			 <?php 
				if(isset($_POST['importSubmit'])){ 
				
					$filename	=$_FILES["file"]["tmp_name"];  
					if($_FILES["file"]["size"]> 0){
						$file= fopen($filename,"r");
						
						while(($column=fgetcsv($file, 10000, ",")) !== FALSE){
							
							  $query ="INSERT INTO `ncl_members`(`ac`, `name`, `address`, `type`) values 
										('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."')";
								
								$results=$db->insert($query);	
							}  
							if ($results==true) {
								?>
								
								<div class="form-group col-md-12">  			
									<div class="row ">
									<div style="width:650px; margin:0px auto; background:#eee; border:
										3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; ">
												<div class="bg-success" style="padding:20px; border-radius:5px;">
													<h5 class="text-white">Succesfully Upload Members information </h5>
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
		
				
				<div style="width:650px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; margin-bottom: 50px;  ">
						
					<form action="import_ncl_members.php" method="post" enctype="multipart/form-data">
						<div class="col-sm-12 form-group">
							<label for="name-l" style="font-weight:bold;">Select File </label>
							<input type="file" class="form-control" name="file" id="name-l" placeholder="Enter your last name." required>
						</div>
						<div class="col-sm-12 form-group">
							<button type="submit" name="importSubmit" class="btn btn-warning text-white">Save info</button>
						</div>
					</form>
					<p class="bg-white text-danger" style="padding: 10px; font-weight:bold;">N.B: You Can Only Upload CSV file (CSV file type Must be Comma delimited)</p>
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
