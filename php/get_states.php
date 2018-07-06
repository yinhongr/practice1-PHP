<?php
    switch($_REQUEST['country'])
    {
        case "Australia":
        $states = array('Western Australia', 'Queensland', 'Tasmania');
        break ;
        
        case "USA":
        $states = array('Florida', 'North Carolina', 'California');
        break ;
        
        default:
        $states == false ;
        break;
    }
	if($_REQUEST['country']=="default")
	{
		echo "";
	}
	else
	{   
		echo "<th>states</th><td><select id='state' name='state'>";
		echo "<option value='default'>Please select state</option>";
		foreach($states as $value)
		{
			echo "<option value='$value'>$value</option>";
		}
		echo "</select></td>";

		
	}
?>
