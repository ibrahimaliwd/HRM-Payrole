<?php 
include ('include/header.php'); 
?>
<main class="page-content">
	<div class="board_marker">
		<h6>Home <i class="fa fa-circle text-warning" ></i> PF Information</h6>	
	</div>
	<div class="containter-fluid">
		<div class="row">
			<h6 style="color:#059605; font-weight:bold;">PF Information</h6>
			<div class="col-md-12">
				<div class="card-wrapper" style="margin-top:10px; padding-lef:15px; padding-right:30px;">
					<div class="row">
					 <ul class="nav nav-tabs text-white" role="tablist">
						<li class="nav-item">
						  <a class="nav-link active bg-warning" data-toggle="tab" href="#employee">PF Loan Information</a>
						</li>
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#info">Collect Installment</a>
						</li>
						<li class="nav-item text-white bg-warning">
						  <a class="nav-link " data-toggle="tab" href="#reports">Reports</a>
						</li>
					  </ul>
					</div>
					<div class="tab-content">
					  <div class="row tab-pane active" id="employee">
						<div class="form-group col-md-12">  
						<form action="" method="post" >
						<div class="row">
								<?php 
							error_reporting(0); 
							if(isset($_POST['loanentry'])){
								$department_id	=$_POST['department'];  
								$employee_id	=$_POST['emname'];  
								$pay_mode		=$_POST['pay_mode'];  
								$issue_date		=$_POST['issue_date'];  
								$amount			=$_POST['amount'];  
								$install_ment	=$_POST['install_ment'];  
								$month			=$_POST['month'];  
							
								$query="INSERT INTO `pf_loan`(`department_id`, `employee_id`, `pay_mode`, 
								`issue_date`, `amount`, `installment`, `install_start_month`)  values 
								('$department_id','$employee_id','$pay_mode','$issue_date','$amount','$install_ment','$month')";

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Shift Setting Successfully Completed</strong>  
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
						
							<div class="col-sm-3 form-group">
								<label for="sex">Select Department</label>
								<select id="department" name='department' onchange="getemploye(this.value)" class="form-control browser-default custom-select">
								<option value="">Select</option>
								<?php 
									$query="select * from department"; 
									$results=$db->select($query);
									$id=0; 
									if ($results==true){
											while($res=$results->fetch_assoc()){
											$id++; 
									?> 
									<option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
									<?php }} ?>									
								</select>
							</div>
							
							<div class="col-sm-3 form-group">
								<label for="sex">Select Employee</label>
								<select id="emname" name="emname" class="form-control browser-default custom-select">
									<option >Select</option>								
								</select>
							</div>
								<div class="col-sm-2 form-group">
									<label for="zip">Pay Mode</label>
									<select name="pay_mode" class="form-control custom-select browser-default">
										<option value="1">No. Of Install</option>
										<option value="2">Manual Rate</option>
									</select>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Issue Date</label>
									<input type="Date" name="issue_date" class="form-control" id="Date" placeholder="" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Amount</label>
									<input type="text" name="amount" class="form-control" id="Date" placeholder="Enter Amount" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Rate/Installment</label>
									<input type="text" class="form-control" name="install_ment" id="name-f" placeholder="Enter your first name." required>
								</div>				
								<div class="col-sm-3 form-group">
									<label for="Country">Start of Month</label>
									<select name="month" class="form-control custom-select ">
										<option value="1">January</option>
										<option value="2 ">Feruary</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
								</div>
								<div class="col-sm-3 form-group mb-0">
								<br />
									<button type="submit" name="loanentry" class="btn btn-warning btn-md ">Submit</button>
								</div>
							</div>
						</form>
							<hr />
							<h5 class="text-center"> Active Loan Summery Details </h5>
							<table class="table table-bordered">
								<thead>
								  <tr class="bg-warning text-white">
									<th>PFID</th>
									<th>Department </th>
									<th>Employee</th>
									<th>Install</th>
									<th>Amount</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
								$query="INSERT INTO `pf_loan`(`department_id`, `employee_id`, `pay_mode`, 
								`issue_date`, `amount`, `installment`, `install_start_month`)"; 
								
									$query2="select * from pf_loan"; 
									$results2=$db->select($query2);
									$id=0; 
									if ($results2==true){
											while($res2=$results2->fetch_assoc()){
											$id++; 
											
									?> 
								
								  <tr>
									<td><?php echo $res2['id']; ?> </td>
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
										$emid= $res2['employee_id']; 
														
										$query2="select * from employee where id='".$emid."'"; 
										$dp=$db->select($query2);												
										if ($dp==true){
												while($dpname=$dp->fetch_assoc()){
												echo $dpname['name'];
											}
										}else{
												echo "Somthing Wrong";
											} 
									?> 
									</td>
									<td><?php echo $res2['installment']; ?></td>			
									<td><?php echo $res2['amount']; ?></td>			
									<td> <a href="pf_loan_single_view.php?id=<?php echo $res2['id'];?>" class="btn btn-success">View Details</a></td>
								  </tr>
								  
									<?php }} ?> 
								  
								</tbody>
							  </table>
							 </div>
						</div>
						
						<div class="row tab-pane" id="info">
							<div class="form-group col-md-12">  			
								<div class="row ">
								 <div class="form-group col-md-12">  
						<form action="" method="post" >
						<div class="row">
								<?php 
							error_reporting(0); 
							if(isset($_POST['loanentry'])){
								$department_id	=$_POST['department'];  
								$employee_id	=$_POST['emname'];  
								$pay_mode		=$_POST['pay_mode'];  
								$issue_date		=$_POST['issue_date'];  
								$amount			=$_POST['amount'];  
								$install_ment	=$_POST['install_ment'];  
								$month			=$_POST['month'];  
							
								$query="INSERT INTO `pf_loan`(`department_id`, `employee_id`, `pay_mode`, 
								`issue_date`, `amount`, `installment`, `install_start_month`)  values 
								('$department_id','$employee_id','$pay_mode','$issue_date','$amount','$install_ment','$month')";

								$results=$db->insert($query);
								if($results==true){
									?> 
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
									  <strong>Shift Setting Successfully Completed</strong>  
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
						
							<div class="col-sm-3 form-group">
								<label for="sex">Select Department</label>
								<select id="department" name='department' onchange="getemploye(this.value)" class="form-control browser-default custom-select">
								<option value="">Select</option>
								<?php 
									$query="select * from department"; 
									$results=$db->select($query);
									$id=0; 
									if ($results==true){
											while($res=$results->fetch_assoc()){
											$id++; 
									?> 
									<option value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
									<?php }} ?>									
								</select>
							</div>
							
							<div class="col-sm-3 form-group">
								<label for="sex">Select Employee</label>
								<select id="emname" name="emname" class="form-control browser-default custom-select">
									<option >Select</option>								
								</select>
							</div>
								<div class="col-sm-2 form-group">
									<label for="zip">Pay Mode</label>
									<select name="pay_mode" class="form-control custom-select browser-default">
										<option value="1">No. Of Install</option>
										<option value="2">Manual Rate</option>
									</select>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Issue Date</label>
									<input type="Date" name="issue_date" class="form-control" id="Date" placeholder="" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Amount</label>
									<input type="text" name="amount" class="form-control" id="Date" placeholder="Enter Amount" required>
								</div>
								<div class="col-sm-3 form-group">
									<label for="Date">Rate/Installment</label>
									<input type="text" class="form-control" name="install_ment" id="name-f" placeholder="Enter your first name." required>
								</div>				
								<div class="col-sm-3 form-group">
									<label for="Country">Start of Month</label>
									<select name="month" class="form-control custom-select ">
										<option value="1">January</option>
										<option value="2 ">Feruary</option>
										<option value="3">March</option>
										<option value="4">April</option>
										<option value="5">May</option>
										<option value="6">June</option>
										<option value="7">July</option>
										<option value="8">August</option>
										<option value="9">September</option>
										<option value="10">October</option>
										<option value="11">November</option>
										<option value="12">December</option>
									</select>
								</div>
								<div class="col-sm-3 form-group mb-0">
								<br />
									<button type="submit" name="loanentry" class="btn btn-warning btn-md ">Submit</button>
								</div>
							</div>
						</form>
							<hr />
							<h5 class="text-center"> Active Loan Summery Details </h5>
							<table class="table table-bordered">
								<thead>
								  <tr class="bg-warning text-white">
									<th>PFID</th>
									<th>Department </th>
									<th>Employee</th>
									<th>Install</th>
									<th>Amount</th>
									<th>Action</th>
								  </tr>
								</thead>
								<tbody>
								<?php 
								$query="INSERT INTO `pf_loan`(`department_id`, `employee_id`, `pay_mode`, 
								`issue_date`, `amount`, `installment`, `install_start_month`)"; 
								
									$query2="select * from pf_loan"; 
									$results2=$db->select($query2);
									$id=0; 
									if ($results2==true){
											while($res2=$results2->fetch_assoc()){
											$id++; 
											
									?> 
								
								  <tr>
									<td><?php echo $res2['id']; ?> </td>
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
										$emid= $res2['employee_id']; 
														
										$query2="select * from employee where id='".$emid."'"; 
										$dp=$db->select($query2);												
										if ($dp==true){
												while($dpname=$dp->fetch_assoc()){
												echo $dpname['name'];
											}
										}else{
												echo "Somthing Wrong";
											} 
									?> 
									</td>
									<td><?php echo $res2['installment']; ?></td>			
									<td><?php echo $res2['amount']; ?></td>			
									<td> <a href="pf_loan_single_view.php?id=<?php echo $res2['id'];?>" class="btn btn-success">View Details</a></td>
								  </tr>
								  
									<?php }} ?> 
								  
								</tbody>
							  </table>
							 </div>
						</div>
							</div>
						</div>
						<div class="row tab-pane" id="reports">
							<div class="form-group col-md-12">  			
								<div class="row ">
								   <h2 class="">Reports</h2>
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