<?php
	if($_REQUEST['year']=="0000")
	{
		echo "";
	}
	else
	{   
		$months = array('01', '02', "03", "04","05","06", "07", "08", "09","10", "11", "12");
		$arrlength=count($months);
		
		$str = "<select id='month' name='month'>";
		$str = $str."<option value='00'>--</option>";
		foreach ($months as $value) {
			$str = $str. "<option value='$value'>$value</option>";
			
			}
			/*
		for ($x=0; $x<$arrlength; $x++) {
			echo "<option value='$x'>$months[$x]</option>";
			}
		*/
		
		$str = $str. "</select>";
		
		}
	
	echo $str;
		
	
?>
