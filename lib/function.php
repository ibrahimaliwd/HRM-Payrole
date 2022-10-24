<?php 



/*
function lwp($db,$FixedPay,$personalPay,$em_id, $month_deducation){
		$lwpq="select * from lwp_entry where employee_id='".$em_id."'and month LIKE '$month_deducation%'"; 
		$lwpr=$db->select($lwpq);
		$id=0; 
		if ($lwpr==true){
				while($lwpres=$lwpr->fetch_assoc()){
					$id++; 
					
					$deduct_day	=$lwpres['day'];			


					//extract month & Year 
					$month_number 	= date("m",strtotime($month_deducation));	
					$Year 			= date("Y",strtotime($month_deducation));	
					
					//calculation days by month 
					$cal			= CAL_GREGORIAN; 								
					$month			= $month_number; 
					$year			= $Year; 
					$totaldays		= cal_days_in_month($cal, $month, $year); 
					
					$day_amount 			= $basic_salary/$totaldays; 
					
					
					$basic_deduct_amount 	= $deducat_days*$day_amount;										
					 
					
					
					
					//Get salar grade id from salary Details table 
					$sldtailsq	="select * from salary_details_info where employee_id='".$em_id."'"; // grade id table 
					$sldilsqr	=$db->select($sldtailsq);
							
					if ($sldilsqr==true){
							while($grade_info_from_salary_table=$sldilsqr->fetch_assoc()){
							$grade_id		= $grade_info_from_salary_table['grade_id'];// Grade_id from salary_details_info table 
						
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
								  
								  $phrent=$hr*$personalPay; 
								  $pdear=$d_a*$personalPay;
								  $total_deductfrom_ppay=$phrent+$pdear; 
								  
								 //calculation
								 $houserent		=$hr* $deduct_amount; 
								 $dearallowance	=$d_a* $deduct_amount;  
								 
								 
								 $totalsalary	=$deduct_amount+(float)$total_deductfrom_ppay+(float)$FixedPay+$houserent+$dearallowance+(float)$medical+(float)$cn;
								 return $totalsalary; 
								 
								}
								
							}
						}
				
					}
				}	
			}
	}

*/
//Deduct Function 
function lwp2($db, $em_id, $month_deducation){
		$lwpq="select * from lwp_entry where employee_id='".$em_id."'and month LIKE '$month_deducation%'"; 
		$lwpr=$db->select($lwpq);
		if ($lwpr==true){
				while($lwpres=$lwpr->fetch_assoc()){		
					$deduct_amount 	=$lwpres['lwp_amount'];
					return $deduct_amount; 
				}	
			}
	}



//Get P.F & Company Contribute
function pf($db,$pf,$basic){
	if ($pf==1){
		$pfcontribute =$basic*0.10; 
		return $pfcontribute; 
	}else{
		return "P.F. Not Active"; 
	} 
}

function cc($db,$pf,$basic){
	if ($pf==1){
		$pfcontribute =$basic*0.10; 
		return $pfcontribute; 
	}else{
		return "P.F. Not Active"; 
	} 
}



// In Word Class 
class GetInWord { 
	
	function GetBdTaka(float $number)
		{
			$decimal = round($number - ($no = floor($number)), 2) * 100;
			$hundred = null;
			$digits_length = strlen($no);
			$i = 0;
			$str = array();
			$words = array(0 => '', 1 => 'one', 2 => 'two',
				3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
				7 => 'seven', 8 => 'eight', 9 => 'nine',
				10 => 'ten', 11 => 'eleven', 12 => 'twelve',
				13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
				16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
				19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
				40 => 'forty', 50 => 'fifty', 60 => 'sixty',
				70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
			$digits = array('', 'hundred','thousand','lakh', 'crore');
			while( $i < $digits_length ) {
				$divider = ($i == 2) ? 10 : 100;
				$number = floor($no % $divider);
				$no = floor($no / $divider);
				$i += $divider == 10 ? 1 : 2;
				if ($number) {
					$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
					$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
					$str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
				} else $str[] = null;
			}
			$taka = implode('', array_reverse($str));
			$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
			return ($taka ? $taka. 'taka ' : '') . $paise;
		}
}