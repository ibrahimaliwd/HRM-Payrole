<?php 
include ('include/header.php'); 
?>

<!-- End Data Table  -->

<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

	
<main class="page-content">
<div class="container">
	<div class="row" >
		<div class="col-md-12 bg-white" style="padding:40px;" >  
			 
			
			<a href="pdf/all_members_striker.php" class="btn btn-danger" target="_blank">Download All</a>
			<br />
			<br />
			<div class="row ">
					<?php 
					$query="select * from ncl_members"; 
					$results=$db->select($query);
					$id=0; 
					if ($results==true){
							while($res=$results->fetch_assoc()){							
					
					?>
				<div class="col-md-4" style="border:1px solid #000;">
					<h6><?php echo $res['name'];  ?></h6>
					<p><?php echo $res['ac'];  ?></p>
					<p><?php echo $res['address'];  ?></p>
				</div>
				
				<?php }} ?>
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
