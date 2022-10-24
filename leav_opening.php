<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning"></i> Employee Salary Info</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Employee Salary Info</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px; padding-bottom:20px;">
					<br />
					 <div  style="width:600px; margin:0px auto; background:#eee; border:
						3px solid #ff8800; border-radius:5px; margin-top:20px; padding:20px; padding-top:0; ">
						
						
						
						 <h5 style="margin:0px;padding:20px; width:100%;" class="bg-warning">Leave Opening Information</h5>
							 <hr>
							<div class="col-sm-12 form-group">
								<label for="sex">Select Employee</label>
								<select id="sex" class="form-control browser-default custom-select">
									<option value="male">Md. Abdul Mannan</option>
									<option value="female">Md. Ibrahim Ali</option>
									<option value="unspesified">Adnan Kabir</option>
								</select>
							</div>
							<div class="col-sm-12 form-group">
								<label for="sex">Leave Type</label>
								<select id="sex" class="form-control browser-default custom-select">
									<option value="male">Casual Leave</option>
									<option value="female">Earn Leave</option>
									<option value="unspesified">Maternity Leave</option>
									<option value="unspesified">Medical Leave</option>
								</select>
							</div>
							<div class="col-sm-12 form-group">
								<label for="name-f">Day</label>
								<input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter Day" required>
							</div>
						<button class="btn btn-warning ">Show</button>	

						
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
<script  src="js/script.js"></script>