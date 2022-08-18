<?php 
function formread($liste) {
	
	
	if (isset($_POST[$liste])) {
		
		
		return htmlspecialchars (($_POST[$liste]));
			
	}
	
	
	elseif (isset($_GET[$liste]))  {


		return htmlspecialchars (($_GET[$liste]));
	}
	else {
		return "";
	}
}


		
		
?>