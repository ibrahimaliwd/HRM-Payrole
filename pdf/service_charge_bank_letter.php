<?php
ob_start();
require('fpdf/fpdf.php');
include("../lib/config.php");
include("../lib/database.php");
include("../lib/helper.php");
$db = new Database();
$fm = new Formate();


	if (isset($_POST['bank_letter'])){
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

$pdf->Cell(180	,10,'',0,1,'C'); */

//Get Month & Year 
$fuldate=date("d-F-Y"); 
$month 	= date("F",strtotime($servic_month));
$Year 	= date("Y",strtotime($servic_month));

//Date 
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,1);
$pdf->Cell( 15, 5,'',0,1);
$pdf->Cell( 15, 5,'',0,1);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5,'Date:- '.$fuldate,0,1);
$pdf->Cell( 200, 5,'',0,1);

//To Address  
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5, 'The Manager', 0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5, 'United Commercial Bank Limited', 0,1);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5, 'Chashara Branch', 0,1);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5, 'Narayanganj.', 0,1);

$pdf->SetFont('Arial','B',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 200, 5, '', 0,1);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell( 200, 5, 'Subject:- Employee Service Charge'.'-'.$month.'-'.$Year,0,1);

$query7="SELECT SUM(service_charge) AS TotalAmount from `service_charge` where sevice_charge_month='".$servic_month."'"; 
$results7=$db->select($query7);											
if ($results7==true){
		while($res7=$results7->fetch_assoc()){	
			 

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 200, 5, '', 0,1);
$pdf->Cell( 15, 5,'',0,0);
$pdf->MultiCell( 170, 5, 'Kindly debit Tk. '.number_format((float)$res7['TotalAmount'], 2, '.', ',').' to our Account No. 12611010005677 maintained with your bank and credit the same to the savings bank account of the following employees as mentioned against their names. Kindly also provide us with a debit advice incorporating the above transaction for our record.',0,'J',0);
$pdf->Cell( 200, 5, '', 0,1);

		}
}else{
		$pdf->Cell(30	,8,'Problem',1,1,'R'); 
	}


//show title 
$pdf->SetFont('Arial','B',14);
$pdf->SetTextColor(0,0,0);
//$pdf->Cell(180	,10,'Service Charge'.'-'.$month.'-'.$Year,0,1,'C');



$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(13	,10,'S.L',1,0,'C',true); 
$pdf->Cell(50	,10,'Name',1,0,'C',true); 
$pdf->Cell(45	,10,'Department',1,0,'C',true); 
$pdf->Cell(40	,10,'Bank A/C No.',1,0,'C',true); 
$pdf->Cell(20	,10,'Amount',1,1,'C',true); 


$query2 ="SELECT * FROM `service_charge` WHERE `sevice_charge_month` LIKE '$servic_month%' order by department_id ASC";
$results2=$db->select($query2);
$id=0;
 
if ($results2==true){	
	while($res2=$results2->fetch_assoc()){
	$id++; 
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell( 15, 5,'',0,0);
		$pdf->Cell(13	,7,$id,1,0,'C');
		
		//Get Employe Name from Employee Table
		$em_id=$res2['employee_id']; 
		$query3="select * from employee where em_id='".$em_id."'"; 
		$results3=$db->select($query3);											
		if ($results3==true){
				while($res3=$results3->fetch_assoc()){					
					$pdf->Cell(50	,7,$res3['name'],1,0,'L');
				}
		}else{
				$pdf->Cell(65	,7,'Not Match',1,0,'L');
			}
				
		
		//Get Deapertment Name from Department Table 
			$dpid= $res2['department_id'];  	
			$query4="select * from department where id='".$dpid."'"; 
			$dp=$db->select($query4);												
			if ($dp==true){
				while($dpname=$dp->fetch_assoc()){	
				$pdf->Cell(45	,7,$dpname['name'],1,0,'L');
			}
		}else{
				$pdf->Cell(45	,7,'Not Match',1,0,'L');
			}
			
			
		
		$em_id2=$res2['employee_id']; 
		$query5="select * from employee_bank_info where employee_id='".$em_id2."'"; 
		$results5=$db->select($query5);											
		if ($results5==true){
				while($res5=$results5->fetch_assoc()){	
					$pdf->Cell(40	,7,$res5['account_no'],1,0,'L');
				}
		}else{
				$pdf->Cell(40	,7,'Not Match',1,0,'L');
			}
		
		
		
		
		
		
		$pdf->Cell(20	,7,number_format((float)$res2['service_charge'], 2, '.', ','),1,1,'R'); 
	  }
	}


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(138	,8,'Total Amount=',1,0,'R', True); 
//Get Total Amount 

$query6="SELECT SUM(service_charge) AS TotalAmount from `service_charge` where sevice_charge_month='".$servic_month."'"; 
$results6=$db->select($query6);											
if ($results6==true){
		while($res6=$results6->fetch_assoc()){	
			$pdf->Cell(30	,8,number_format((float)$res6['TotalAmount'], 2, '.', ','),1,1,'R',True); 
		}
}else{
		$pdf->Cell(30	,8,'Problem',1,1,'R'); 
	}

$pdf->Cell(153	,8,'',0,1,'L'); 

$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(153	,8,'Yours Truely,',0,1,'L'); 



$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(100	,4,'---------------------------',0,0,'L'); 
$pdf->Cell(100	,4,'---------------------------',0,1,'C'); 
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(100	,4,'Md. Abdul Mannan',0,0,'L'); 
$pdf->Cell(100	,4,'Gopinath Das',0,1,'C'); 
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(100	,4,'Acting Secretary',0,0,'L'); 
$pdf->Cell(100	,4,'Chief Accountant',0,1,'C'); 


$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->Cell(153	,8,'',0,1,'L'); 
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(100	,4,'Note:',0,1,'L');
$pdf->Cell( 15, 5,'',0,0); 
$pdf->Cell(100	,4,'----------',0,1,'L'); 


$pdf->SetFont('Arial','B',14);
$pdf->Cell(200	,4,'Add New Staff List',0,1,'C'); 
$pdf->Cell(200	,4,'-------------------------',0,1,'C'); 
$pdf->Cell(200	,4,'',0,1,'C'); 



$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(13	,10,'S.L',1,0,'C',true); 
$pdf->Cell(50	,10,'Name',1,0,'C',true); 
$pdf->Cell(45	,10,'Department',1,0,'C',true); 
$pdf->Cell(40	,10,'Bank A/C No.',1,0,'C',true); 
$pdf->Cell(20	,10,'Amount',1,1,'C',true); 

$query2 ="SELECT * FROM `service_charge_info` WHERE `created_at` LIKE '$servic_month%'";
$results2=$db->select($query2);
$id=0;
 
if ($results2==true){	
	while($res2=$results2->fetch_assoc()){
	$id++; 
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell( 15, 5,'',0,0);
		$pdf->Cell(13	,7,$id,1,0,'C');
		$emid=$res2['em_id']; 
		if(!empty($emid)){
		//Get Employe Name from Employee Table
		$em_id=$res2['em_id']; 
		$query3="select * from employee where em_id='".$em_id."'"; 
		$results3=$db->select($query3);											
		if ($results3==true){
				while($res3=$results3->fetch_assoc()){					
					$pdf->Cell(50	,7,$res3['name'],1,0,'L');
				}
		}else{
				$pdf->Cell(65	,7,'Not Match',1,0,'L');
			}
				
		
		//Get Deapertment Name from Department Table 
			$dpid= $res2['department_id'];  	
			$query4="select * from department where id='".$dpid."'"; 
			$dp=$db->select($query4);												
			if ($dp==true){
				while($dpname=$dp->fetch_assoc()){	
				$pdf->Cell(45	,7,$dpname['name'],1,0,'L');
			}
		}else{
				$pdf->Cell(45	,7,'Not Match',1,0,'L');
			}
			
			
		
		$em_id2=$res2['em_id']; 
		$query5="select * from employee_bank_info where employee_id='".$em_id2."'"; 
		$results5=$db->select($query5);											
		if ($results5==true){
				while($res5=$results5->fetch_assoc()){	
					$pdf->Cell(40	,7,$res5['account_no'],1,0,'L');
				}
		}else{
				$pdf->Cell(40	,7,'Not Match',1,0,'L');
			}
		
		
		
		
		
		
		$pdf->Cell(20	,7,number_format((float)$res2['service_charge'], 2, '.', ','),1,1,'R'); 
			}else{
				$pdf->Cell(20	,7,'Not Entry New Staff In this Month',1,1,'R'); 
			}
		}
	}


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(138	,8,'Total Amount=',1,0,'R', True); 
//Get Total Amount 

$query6="SELECT SUM(service_charge) AS TotalAmount from `service_charge_info` where created_at like '$servic_month%'"; 
$results6=$db->select($query6);											
if ($results6==true){
		while($res6=$results6->fetch_assoc()){	
			$pdf->Cell(30	,8,number_format((float)$res6['TotalAmount'], 2, '.', ','),1,1,'R',True); 
		}
}else{
		$pdf->Cell(30	,8,'Problem',1,1,'R'); 
	}
	
	



$pdf->SetFont('Arial','B',14);
$pdf->Cell(200	,4,'',0,1,'C');
$pdf->Cell(200	,4,'',0,1,'C');
$pdf->Cell(200	,4,'Dismis Staff List',0,1,'C'); 
$pdf->Cell(200	,4,'-------------------------',0,1,'C'); 
$pdf->Cell(200	,4,'',0,1,'C'); 



$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0,0,0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(13	,10,'S.L',1,0,'C',true); 
$pdf->Cell(50	,10,'Name',1,0,'C',true); 
$pdf->Cell(45	,10,'Department',1,0,'C',true); 
$pdf->Cell(40	,10,'Bank A/C No.',1,0,'C',true); 
$pdf->Cell(20	,10,'Amount',1,1,'C',true); 

$query2 ="SELECT * FROM `service_charge_info` WHERE `inactive_date` LIKE '$servic_month%'";
$results2=$db->select($query2);
$id=0;
 
if ($results2==true){	
	while($res2=$results2->fetch_assoc()){
	$id++; 
		$pdf->SetFont('Arial','B',10);
		$pdf->SetTextColor(0,0,0);
		$pdf->Cell( 15, 5,'',0,0);
		$pdf->Cell(13	,7,$id,1,0,'C');
		
		//Get Employe Name from Employee Table
		$em_id=$res2['em_id']; 
		$query3="select * from employee where em_id='".$em_id."'"; 
		$results3=$db->select($query3);											
		if ($results3==true){
				while($res3=$results3->fetch_assoc()){					
					$pdf->Cell(50	,7,$res3['name'],1,0,'L');
				}
		}else{
				$pdf->Cell(65	,7,'Not Match',1,0,'L');
			}
				
		
		//Get Deapertment Name from Department Table 
			$dpid= $res2['department_id'];  	
			$query4="select * from department where id='".$dpid."'"; 
			$dp=$db->select($query4);												
			if ($dp==true){
				while($dpname=$dp->fetch_assoc()){	
				$pdf->Cell(45	,7,$dpname['name'],1,0,'L');
			}
		}else{
				$pdf->Cell(45	,7,'Not Match',1,0,'L');
			}
			
			
		
		$em_id2=$res2['em_id']; 
		$query5="select * from employee_bank_info where employee_id='".$em_id2."'"; 
		$results5=$db->select($query5);											
		if ($results5==true){
				while($res5=$results5->fetch_assoc()){	
					$pdf->Cell(40	,7,$res5['account_no'],1,0,'L');
				}
		}else{
				$pdf->Cell(40	,7,'Not Match',1,0,'L');
			}
		
		
		
		
		
		
		$pdf->Cell(20	,7,number_format((float)$res2['service_charge'], 2, '.', ','),1,1,'R'); 
	  }
	}


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255,193,71);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell( 15, 5,'',0,0);
$pdf->Cell(138	,8,'Total Amount=',1,0,'R', True); 
//Get Total Amount 

$query6="SELECT SUM(service_charge) AS TotalAmount from `service_charge_info` where inactive_date like '$servic_month%'"; 
$results6=$db->select($query6);											
if ($results6==true){
		while($res6=$results6->fetch_assoc()){	
			$pdf->Cell(30	,8,number_format((float)$res6['TotalAmount'], 2, '.', ','),1,1,'R',True); 
		}
}else{
		$pdf->Cell(30	,8,'Problem',1,1,'R'); 
	}
	
	

$filename="service_charge";
ob_end_flush();
$pdf->Output($filename,'I');  
?>			 			  
			