<?php
include("lib/config.php");
include("lib/database.php");
include("lib/helper.php");
$db = new Database();
$fm = new Formate();
if(isset($_GET["emid"])){
?> 

				<option>Select </option>
			   <?php
					$query ="SELECT * FROM `employee` WHERE `department_id`='".$_GET["emid"]."'";	
					$results = $db->select($query);
					if ($results){?>
					<?php while ($district = $results->fetch_assoc()) {
						
				?> 		
				
				<option value="<?php echo $district['em_id'];?> "> <?php echo $district['name'];?> </option>
				
					
				<?php } ?> 
				<?php } 
}		
?> 
		