<?php

	
	//get the q parameter from URL

	$state=$_GET["state"];
	//echo $state;
	switch($state)
    {
        case "Western Australia":
        $cities = array('Perth');
        break ;
        
        case "Queensland":
        $cities = array('Gold Coast', 'Brisbane');
        break ;
        
		case "Tasmania":
        $cities = array('Horbart', 'Launceston');
        break ;
		
		case "Florida":
        $cities = array('Florida');
        break ;
		
		case "North Carolina":
        $cities = array('Oxford');
        break ;
		
		case "California":
        $cities = array(' Los Angeles', 'San Diego', 'San Francisco');
        break ;
		
        default:
        $cities == false ;
        break;
    }

	if($state!="")

	{

		if($state=="default"){

		echo "";

		}

		elseif($state=="undefined")

		{

			echo "";

		}

		else{

			//echo "<th>Cities</th><td>".$state."</td>";
			echo "<th>Cities:</th><td><select id='city' name='city'>";
		echo "<option value='default'>Please select city</option>";
		foreach($cities as $value)
		{
			echo "<option value='$value'>$value</option>";
		}
		echo "</select></td>";
		

		}

	}

	
?> 

