<?php
ob_start();
require('fpdf/fpdf.php');
include("../lib/config.php");
include("../lib/database.php");
include("../lib/helper.php");
include("../lib/function.php");
$db = new Database();
$fm = new Formate();


	if (isset($_POST['salary_bank_letter'])){
		$servic_month	= $_POST['month'];
	
	} else{
		echo"No Data Found";
	}
	
	
class PDF extends FPDF {  
	function Footer() {   
		$this->SetY(-15); // Arial italic 8
		$this->SetFont('Arial','I',7);	// Page number
		$this->Cell(130,2,'---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,1,'L'); 
		$this->Cell(70,5,'Software Developed By: Ibrahim Ali, +8801916859326',0,0,'L'); 
		$this->Cell(50,5,'Printing Date: '.date("Y-m-d h:i:sa") ,0,0,'R');
		$this->Cell(70,5,'Page '.$this->PageNo().'/{nb}',0,0,'R'); 
	}
}		
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');// for custome page array(100,150)
$pdf = new pdf();
$pdf->AliasNbPages();
$pdf->AddPage();
//set font to arial, bold, 14pt

//set font to arial, regular, 12pt


/*


$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(176,4,4);
$pdf->Cell(180	,10,'Narayanganj Club Ltd.',0,1,'C'); //end of line

$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180	,6,'95, Bangbandhu Road, Narayanganj',0,1,'C'); //end of line  
$pdf->Cell(45	,6,'',0,0,'L'); //end of line  

$pdf->Cell(180	,10,'',0,1,'C'); 
*/
//Get Month & Year 
$fuldate=date("d-F-Y"); 
$month 	= date("F",strtotime($servic_month));
$Year 	= date("Y",strtotime($servic_month));

//Date 
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,1);//left margin 
$pdf->Cell( 15, 5,'',0,1);//left margin 
$pdf->Cell( 15, 5,'',0,1);//left margin 
$pdf->Cell( 15, 5,'',0,0);//left margin 
$pdf->Cell( 200, 5,'Date:- '.$fuldate,0,1);
$pdf->Cell( 200, 5,'',0,1);

//To Address  
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell( 200, 5, 'The Manager', 0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell( 200, 5, 'United Commercial Bank Limited', 0,1);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell( 200, 5, 'Chashara Branch', 0,1);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell( 200, 5, 'Narayanganj.', 0,1);

$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 200, 5, '', 0,1);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell( 200, 5, 'Subject:- Employee Salary '.'-'.$month.'-'.$Year,0,1);

$query7="SELECT SUM(service_charge) AS TotalAmount from `service_charge` where sevice_charge_month='".$servic_month."'"; 
$results7=$db->select($query7);											
if ($results7==true){
		while($res7=$results7->fetch_assoc()){	
			 

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 200, 5, '', 0,1);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->MultiCell( 160, 5, 'Kindly debit below amount to our Account No. 12611010005677 maintained with your bank and credit the same to the savings bank account of the following employees as mentioned against their names. Kindly also provide us with a debit advice incorporating the above transaction for our record.',0,'J',0);
$pdf->Cell( 200, 5, '', 0,1);

		}
}else{
		$pdf->Cell(30	,8,'Problem',1,1,'R'); 
	}


//show title 
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(0,0,0);
//$pdf->Cell(180	,10,'Service Charge'.'-'.$month.'-'.$Year,0,1,'C');








//header Table 
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(13	,10,'S.L',1,0,'C',true); 
$pdf->Cell(45	,10,'Name',1,0,'C',true); 
$pdf->Cell(30	,10,'Department',1,0,'C',true); 
$pdf->Cell(30	,10,'Designation',1,0,'C',true);
$pdf->Cell(30	,10,'Bank Account',1,0,'C',true);
$pdf->Cell(20	,10,'Amount',1,1,'C',true); 

$query2 ="SELECT * FROM `temp_salary_sheet` WHERE `month_name` LIKE '$servic_month%'";
	$results2=$db->select($query2);
	$id=0; 
	if ($results2==true){	
		while($res2=$results2->fetch_assoc()){
		$id++; 
		 $em_id				= $res2['employee_id'];
		 $basic 			= $res2['basic'];
		 $grade_id			= $res2['grade_id'];// Grade_id from salary_details_info table 
		 $personalPay		= $res2['personal_pay'];
		 $FixedPay			= $res2['fixed_pay'];
		 $pf				= $res2['pf_contribution'];
		 $month_deducation	= $res2['month_name'];
		 $lwp_amount		= $res2['lwp_amount'];
		 
			$gradeq="select * from salary_grade where id='".$grade_id."'"; // grade id table 
			$graderes=$db->select($gradeq);
			
			if ($graderes==true){
				while($grade_info=$graderes->fetch_assoc()){
				 //salary grade table data
				 $hr		= $grade_info['house_rent'];
				 $d_a		= $grade_info['dearness_allownce'];
				 $cn		= $grade_info['conveyence'];
				 $medical	= $grade_info['medical'];
				 
				 //end salary grade table data 
				 //calculation
				 $houserent		=(float)$hr* (float)$basic; 
				 $dearallowance	=(float)$d_a* (float)$basic;  
				 $grossalary	=(float)$basic+(float)$personalPay+(float)$FixedPay+$houserent+$dearallowance+(float)$cn+(float)$medical;
				 
				 
				 
					//get employee Name
					$pdf->SetFont('Arial','B',8);
					$pdf->SetTextColor(0,0,0);
					$pdf->Cell( 15, 5,'',0,0);//left margin
					$pdf->Cell(13	,7,$id,1,0,'C');
				 	$em_id=$res2['employee_id']; 
					$query3="select * from employee where em_id='".$em_id."'"; 
					$results3=$db->select($query3);											
					if ($results3==true){
							while($res3=$results3->fetch_assoc()){
							$pdf->Cell(45	,7,$res3['name'],1,0,'L');
						}
					}else{
							$pdf->Cell(45	,7,'Not Match',1,0,'L');
						}
						
						
					//Get Deapertment Name from Department Table 
					$dpid= $res2['department_id'];  	
					$query4="select * from department where id='".$dpid."'"; 
					$dp=$db->select($query4);												
					if ($dp==true){
						while($dpname=$dp->fetch_assoc()){	
						$pdf->Cell(30	,7,$dpname['name'],1,0,'C');
					}
					}else{
							$pdf->Cell(30	,7,'Not Match',1,0,'C');
						}	
						
					// Get Designation
					$em_id=$res2['employee_id']; 
					$query3="select * from employee where em_id='".$em_id."'"; 
					$results3=$db->select($query3);											
					if ($results3==true){
							while($res3=$results3->fetch_assoc()){				
							$pdf->Cell(30	,7,$res3['desigination'],1,0,'L');
						}
					}else{
							echo "Not match";
						}
							
				
				 
					//Get PF & Compnay Contribute 
					$pfr=pf($db,$pf,$basic); 			
					
					
					
					
					$em_id2=$res2['employee_id']; 
					$query5="select * from employee_bank_info where employee_id='".$em_id2."'"; 
					$results5=$db->select($query5);											
					if ($results5==true){
							while($res5=$results5->fetch_assoc()){	
								$pdf->Cell(30	,7,$res5['account_no'],1,0,'L');
							}
					}else{
							$pdf->Cell(30	,7,'Not Match',1,0,'L');
						}
					//Net Pay Calculation 
					$pfr=pf($db,$pf,$basic);				
					$grand_total_deducat=(float)$pfr+(float)$lwp_amount;
					$netpay=$grossalary-$grand_total_deducat; 
					$pdf->Cell(20	,7,number_format((float)$netpay, 2, '.', ','),1,1,'C');
					
				}
			}

		}
	}

	  

// Total Calculation 
$pdf->SetFont('Arial','B',9);
$pdf->SetFillColor(20,193,71);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(148	,10,'Total',1,0,'R',true);

$query6="SELECT SUM(basic) AS TotalAmount from `temp_salary_sheet` where month_name='".$servic_month."'";
 
$results6=$db->select($query6);											
if ($results6==true){
		while($res6=$results6->fetch_assoc()){	
		
		$total_basic=$res6['TotalAmount'];//All Permanent Employee Total Basic Sum 
		
		//$pdf->Cell(20	,10,number_format((float)$total_basic, 2, '.', ','),1,0,'C',true); 
		
		
		$gradeq="select * from salary_grade where id='1'"; // grade id table 
			$graderes=$db->select($gradeq);
			
		if ($graderes==true){
			while($grade_info=$graderes->fetch_assoc()){
			 //salary grade table data
			 $hr		= $grade_info['house_rent'];
			 $d_a		= $grade_info['dearness_allownce'];
			 $cn		= $grade_info['conveyence'];
			 $medical	= $grade_info['medical'];			 
			
			 $total_houserent 		=$hr* $total_basic; //All Permanent Employee House Rent 
			 $total_dearallowance	=$d_a* $total_basic; // All Permanent Employee Dearness Allownce 
		
		
			//$pdf->Cell(20	,10,number_format((float)$total_houserent, 2, '.', ','),1,0,'C',true); 
			//$pdf->Cell(20	,10,number_format((float)$total_dearallowance, 2, '.', ','),1,0,'C',true); 


			// Count Total Employee Number for medical and conveyence calculation 
			$countemnumber="SELECT count(id) AS total_employe from `temp_salary_sheet` where grade_id='1' and month_name LIKE '".$servic_month."' "; 
			$countemnumberr=$db->select($countemnumber);											
			if ($countemnumberr==true){
					while($countEm=$countemnumberr->fetch_assoc()){
						
						$total_employee		= $countEm['total_employe'];
						$total_medical		= $total_employee* $medical;
						$total_conven		= $total_employee* $cn; 
						
						//$pdf->Cell(12	,10,number_format((float)$total_medical, 2, '.', ','),1,0,'C',true);
						//$pdf->Cell(12	,10,number_format((float)$total_conven, 2, '.', ','),1,0,'C',true); 
						
						
						// get sum personal pay and fixed pay 
						$sumpf="SELECT sum(personal_pay) as ppay, sum(fixed_pay) as fpay, sum(lwp_amount) as lwp_total from `temp_salary_sheet` where month_name LIKE '".$servic_month."' "; 
						$sumpfr=$db->select($sumpf);											
						if ($sumpfr==true){
								while($ppfp=$sumpfr->fetch_assoc()){
						
								$total_personal_pay	= $ppfp['ppay'];
								$total_fixed_pay	= $ppfp['fpay']; 
								$lwp_total			= $ppfp['lwp_total']; 
								
								
								$all_employee_gross_salary=$total_basic+$total_houserent+$total_dearallowance+$total_medical+$total_conven+$total_personal_pay+$total_fixed_pay; // All Employee Gross Salary 
								                                       
								//$pdf->Cell(12	,10,number_format((float)$total_personal_pay, 2, '.', ','),1,0,'C',true); 
								//$pdf->Cell(20	,10,number_format((float)$total_fixed_pay, 2, '.', ','),1,0,'C',true); 
								//$pdf->Cell(20	,10,number_format((float)$all_employee_gross_salary, 2, '.', ','),1,0,'C',true);
								
								$ten_percent=0.10; 
								$total_pf=$ten_percent*$total_basic; 
								$total_cc=$ten_percent*$total_basic; 
								
								//$pdf->Cell(15	,10,number_format((float)$total_pf, 2, '.', ','),1,0,'C',true); 
								//$pdf->Cell(15	,10,number_format((float)$total_cc, 2, '.', ','),1,0,'C',true);
								//$pdf->Cell(15	,10,number_format((float)$lwp_total, 2, '.', ','),1,0,'C',true);
								
								
								
								$all_employee_total_deduct=$total_pf+$lwp_total; 
								$all_employee_netpay=$all_employee_gross_salary-$all_employee_total_deduct;	
								
								$pdf->Cell(20	,10,number_format((float)$all_employee_netpay, 2, '.', ','),1,1,'C',true); 
		
			
			
								//Get Grand Total Amount 
								$pdf->SetFont('Arial','B',8);
								$pdf->SetFillColor(255,193,71);
								$pdf->SetTextColor(0, 0, 0);
								$pdf->Cell( 15, 5,'',0,0);//left margin
								//$pdf->Cell(118	,8,'Total P.F. Amount=',1,0,'R', True);
								
								$grand_total_pf=$total_pf+$total_pf; 
								//$pdf->Cell(20	,8,number_format((float)$grand_total_pf, 2, '.', ','),1,1,'R',True);// Grand Total PF Amount 
								//$pdf->Cell(118	,8,'Total Amount=',1,0,'R', True); 								
								$grand_total = $all_employee_netpay+$grand_total_pf; 
								//$pdf->Cell(20	,8,number_format((float)$grand_total, 2, '.', ','),1,1,'R',True); 
								 
								$class_obj = new GetInWord();
								$inword=$class_obj->GetBdTaka($all_employee_netpay);
								$pdf->Cell(168	,8,'In Word: '.$inword.'',1,1,'L',True); 
								
								} 
							}
						}			
					}
				}
				
			
			}else{
					$pdf->Cell(30	,8,'Problem',1,1,'R'); 
				}
	}
}

$pdf->Cell(153	,8,'',0,1,'L'); 

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(153	,8,'Yours Truely,',0,1,'L'); 



$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(100	,4,'---------------------------',0,0,'L'); 
$pdf->Cell(100	,4,'---------------------------',0,1,'C'); 
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(100	,4,'Md. Abdul Mannan',0,0,'L'); 
$pdf->Cell(100	,4,'Gopinath Das',0,1,'C'); 
$pdf->Cell( 15, 5,'',0,0);//left margin
$pdf->Cell(100	,4,'Acting Secretary',0,0,'L'); 
$pdf->Cell(100	,4,'Chief Accountant',0,1,'C'); 


$filename="Bank Letter Salary Sheet";
ob_end_flush();
$pdf->Output($filename,'I');  
?>			 			  
