<?php
    switch($_REQUEST['id'])
    {
        case "2":
        $access = "2";
        break ;
        
        case "1":
        $access = "1";
        break ;
        
        default:
        $access == false ;
        break;
    }
	
	if($_REQUEST['id'] == "default") {
		echo "++";
		}
	else {
		echo $access; 
		}
?>
