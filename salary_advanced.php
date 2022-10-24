<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning" ></i> Salary Advanced Information</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">Salary Advance Information</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px;">
					<div class="row">
					 <ul class="nav nav-tabs text-white" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active bg-warning" data-toggle="tab" href="#employee">Salary Adv. Information</a>
						</li>
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#info">Salary Adv. Register</a>
						</li>
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#reports">Reports</a>
						</li>
					  </ul>
					</div>
					<div class="tab-content">
					  <div class="row tab-pane active" id="employee">
						<div class="form-group col-md-12">  
						<form> 
						<div class="row">	
								<div class="col-sm-4 form-group">
									<label for="name-f">Employee ID</label>
									<input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
								</div>
								
								<div class="col-sm-2 form-group">
									<label for="zip">Pay Mode</label>
									<select class="form-control custom-select browser-default">
										<option value="Afghanistan">No. Of Install</option>
										<option value="Åland Islands">Manual Rate</option>
									</select>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Issue Date</label>
									<input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Amount</label>
									<input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Rate/Installment</label>
									<input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
								</div>				
								<div class="col-sm-3 form-group">
									<label for="Country">Start of Month</label>
									<select class="form-control custom-select browser-default">
										<option value="Afghanistan">January</option>
										<option value="Åland Islands">Feruary</option>
									</select>
								</div>
								<div class="col-sm-3 form-group mb-0">
								<br />
									<button class="btn btn-dark btn-md ">Submit</button>
								</div>
							</div>
							<button type="submit" class="btn btn-warning text-white">Save info</button>
							</div>	
							<hr />
							<table class="table table-bordered">
								<thead>
								  <tr class="bg-success text-white">
									<th>PFID</th>
									<th>PFLoan ID</th>
									<th>Instl. Date</th>
									<th>Amount</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>01</td>
									<td>0001010010</td>
									<td>01 January, 2022 </td>
									<td>1000.00</td>			
									<td> <a href="" class="btn btn-success">Paid</a> <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
								  </tr>
								</tbody>
							  </table>
						</div>
						
						<div class="row tab-pane" id="info">
							<div class="form-group col-md-12">  			
								<div class="row ">
									<div class="col-sm-1 form-group">
										<div class="form-check">
										<br />
										  <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something" >
										  <label class="form-check-label">Show All</label>
										  <label class="form-check-label">Or</label> 
										</div>			
									</div>							
									<div class="col-sm-4 form-group">
										<label for="name-f">Employee ID</label>
										<input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
									</div> 
									<div class="col-sm-3 form-group">
										<label for="Date">From</label>
										<input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
									</div>
									<div class="col-sm-3 form-group">
										<label for="Date">To</label>
										<input type="Date" name="dob" class="form-control" id="Date" placeholder="" required>
									</div>
									<div class="col-sm-3 form-group">
										 <button class="btn btn-warning btn-md ">Submit</button>		
									</div>
								<hr />
								
										<table class="table table-bordered">
											<thead>
											  <tr class="bg-success text-white">
												<th>PFID</th>
												<th>PFLoan ID</th>
												<th>Instl. Date</th>
												<th>Amount</th>
												<th>Action</th>
											  </tr>
											</thead>
											<tbody>
											  <tr>
												<td>01</td>
												<td>0001010010</td>
												<td>01 January, 2022 </td>
												<td>1000.00</td>			
												<td> <a href="" class="btn btn-success">Paid</a> <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
											  </tr>
											</tbody>
										  </table>
										<ul class="pagination pagination-sm">
										  <li class="page-item "><a class="page-link bg-warning text-white" href="#">Previous</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">1</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">2</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">3</a></li>
										  <li class="page-item"><a class="page-link  bg-warning text-white" href="#">Next</a></li>
										</ul>
								</div>
							</div>
						</div>
						<div class="row tab-pane" id="reports">
							<div class="form-group col-md-12">  			
								<div class="row ">
									<div class="col-sm-4 form-group">
										<label for="name-f">Employee ID</label>
										<input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." required>
									</div> 
									<div class="col-sm-8 form-group">
									
										 <button class="btn btn-dark btn-md ">Salary Adv. Details</button>		
										 <button class="btn btn-dark btn-md ">Summery</button>
										 
									</div>	
									<div class="col-sm-12">
										<table class="table table-bordered">
											<thead>
											  <tr class="bg-success text-white">
												<th>ID</th>
												<th>Name of Employee</th>
												<th>Desigination</th>
												<th>Amount</th>
												<th>Payment</th>
												<th>Balance</th>
											  </tr>
											</thead>
											<tbody>
											  <tr>
												<td>01</td>
												<td>Md. Abdul Mannan</td>
												<td>Acting Secretary </td>
												<td>1000.00</td>			
												<td>1000.00</td>			
												<td>1000.00</td>			
												
											  </tr>
											</tbody>
										  </table>
										<ul class="pagination pagination-sm">
										  <li class="page-item"><a class="page-link bg-warning" href="#">Previous</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">1</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">2</a></li>
										  <li class="page-item"><a class="page-link bg-success text-white" href="#">3</a></li>
										  <li class="page-item"><a class="page-link bg-warning" href="#">Next</a></li>
										</ul>
									</div> 
									</div>
								</div>
							</div>
						</div>
						
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