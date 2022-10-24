<?php
ob_start();
require('fpdf/fpdf.php');
include("../lib/config.php");
include("../lib/database.php");
include("../lib/helper.php");
include("../lib/function.php");
$db = new Database();
$fm = new Formate();


	
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

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0,0,0);
$query="select * from ncl_members"; 
$results=$db->select($query);




if ($results==true){
		while($res=$results->fetch_assoc()){	
		
		$rowq=Row($res);
		$pdf->Multicell( 60, 5,$res['name.'\n\n'.$res['address'],0,1);
	
		
		}
	} 
	
	 $pdf->cell( 60, 5,'000',0,0);

$filename="Striker all members";
ob_end_flush();
$pdf->Output($filename,'I');  
?>			 			  
