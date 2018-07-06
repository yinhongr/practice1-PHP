<?php
	//get the year and month from URL
	$year=$_GET["year"];
	//echo $year."--";
	$month=$_GET["month"];
	//echo $month;

	if($month!="")

	{

		if($month=="00"){

		echo "";

		}

		elseif($month=="undefined")

		{

			echo "";

		}

		else{
				//	echo $year."-";
		//echo $month;
			//calculate how many days
			//$d=cal_days_in_month(CAL_GREGORIAN,$month+1,$year);
			$d=cal_days_in_month(CAL_GREGORIAN,$month,$year);
			//echo $d;
			echo "<select id='day' name='day'>";
		echo "<option value='00'>--</option>";
		for ($day=1; $day<=$d; $day++) {
			echo "<option value='$day'>$day</option>";
			}

		/*
		foreach($days as $value)
		{
			echo "<option value='$value'>$value</option>";
		}
		*/
		echo "</select>";
		

		}

	}
?>