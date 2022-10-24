<?php
include("lib/config.php");
include("lib/database.php");
include("lib/helper.php");

$db = new Database();
$fm = new Formate();

include("lib/function.php");
?> 
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>I-Payrole</title>
<link rel='stylesheet' href='css/bootstrap.4.1.css'>
<link rel='stylesheet' href='css/bootstrap.css'>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/select2.min.css">
<link rel="stylesheet" href="css/datatables.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<link rel='stylesheet' href='css/all.css'>
<link rel="stylesheet" href="css/stylesidebar.css">

<!-- Data Table  -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css'> 
<link rel='stylesheet' href='https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css'> 
<link rel='stylesheet' href='https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css'> 
<!-- End Data Table  -->

<link rel="stylesheet" href="css/style.css">



</head>
<body>
<!-- partial:index.partial.html -->
<div class="top_backround">
	<img src="image/Logo.png" class="img-fluid"alt="" />
</div>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <!--<div class="sidebar-brand">
        <a href="#">Online Payroll Solution</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
       <!--<div class="sidebar-header">
           </div>
       -->
      <div class="sidebar-menu">
        <ul>
         <li class="header-menu">
            <img src="image/logo.png" class="img-fluid" alt="" style="padding:30px;"/>
          </li>
          <li class="active">
			   <a href="index.php">
				  <i class="fa fa-tachometer-alt"></i>
				  <span>Dashboard</span>          
				</a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-users"></i>
              <span>Employee Managment</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="new_department.php">New Department </a></li>
                <li><a href="add_employee.php">Add New Employee </a></li>
                <li><a href="view_employee.php">Active Employees </a></li>
                <li><a href="view_inactive_employee.php">Inactive Employees </a></li>
                <li><a href="import_employee_information.php">Upload Employee Info </a></li>
                 <!--<li><a href="employee_info.php">Employee Information </a></li>--> 
                <li><a href="employee_salary_info.php">Employee Salary Info. </a></li>
                <li><a href="service_charge_update.php">Service Charge Update </a></li>
                <li><a href="employee_bank_account.php">Bank A/C Info. </a></li> 
              </ul>
            </div>
          </li>
		   <!--
		  
		   <li class="sidebar-dropdown">
            <a href="#">
            <i class="fa fa-clock" ></i>
              <span>Attandance</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
			    <li><a href="regular_attandance.php">Regular Attendance</a></li>
                <li><a href="attandance.php">Attendance</a></li>
                <li><a href="leav_entry.php">Leave Entry</a></li>
                <li><a href="leav_opening.php">Leave Opening</a></li>
                <li><a href="shift_maintainance.php">Shift Maintainace</a></li> 
             
              </ul>
            </div>
          </li> --> 
		  
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Leave & Deduction</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
				<li><a href="leav_entry.php">Leave Entry</a></li>		 
                <li><a href="leav_opening.php">Leave Opening</a></li>
				<li><a href="lwp_entry.php">LWP Entry</a></li>
              </ul>
            </div>
          </li>
		  <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Salary & Service Charge</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
			     <li><a href="process_salary.php">Process Salary</a></li>
                <li><a href="service_charge.php">Service Charge</a></li>
				 <!--
				<li class="divider bg-success text-white">Wages Area </li>
				<li><a href="#">Tax Entry</a></li>
                <li><a href="#">Overtime Daily</a></li>
                <li><a href="#">Overtime Monthly</a></li>                
                <li><a href="#">Increment Process</a></li>
                <li><a href="#">Bonus Process</a></li>
				--> 
              </ul>
            </div>
          </li>
		  
		
		  
			<li class="sidebar-dropdown">
				<a href="#">
				  <i class="fas fa-donate"></i>
				  <span>Loan & Salary Advanced</span>
				</a>
				<div class="sidebar-submenu">
				  <ul>
					<li><a href="pf_loan.php"> PF Loan </a></li>
					<li><a href="salary_advanced.php"> Salary Advance </a></li>  
					<li><a href="#"> PF Loan Statement </a></li>
					<li><a href="#"> Salary Adv. Statement </a></li>				
				  </ul>
				</div>
			
			</li> 
			
		 <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-file"></i>
              <span>Reports</span>
            </a>
            <div class="sidebar-submenu">
              <ul> 
                <li><a href="#">Monthly Salary & Wages</a></li>
                <li><a href="#">Salary Statement</a></li>
              </ul>
            </div>
          </li>
			<li class="sidebar-dropdown">
				<a href="#">
				  <i class="fa fa-cog"></i>
				  <span>Setting</span>
				</a>
				
				<div class="sidebar-submenu">
				  <ul>
					<li><a href="#">Salary Setting</a></li>
					<li><a href="#">Leave Setting</a></li>
					<li><a href="#">Increment Setting</a></li>
					<li><a href="#">Shif Setting</a></li>               
				  </ul>
				</div>
			</li>
			<hr />
			<li class="sidebar-dropdown">
				<a href="#">
				  <i class="fa fa-cog"></i>
				  <span>NCL Members</span>
				</a>
				
				<div class="sidebar-submenu">
				  <ul>
					<li><a href="import_ncl_members.php">Upload Data</a></li>
					<li><a href="import_am_to_pm.php">Upload AM To PM</a></li>
					<li><a href="striker_ncl_members.php">All Members Striker</a></li>
					<li><a href="mother_members.php">All Mothers Members</a></li>
					<li><a href="#">Envlope</a></li>				          
				  </ul>
				</div>
			</li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>