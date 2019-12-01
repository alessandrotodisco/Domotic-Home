<?php
/*
	Author: Alessandro Todisco;
	Name: Including Resources;
	Description: Include the resoueces for the page such as libraries and the data needed ;
*/
    $p = "";
    
	//Including libraries
	include 'inc/label.php';

	if (isset($lang)) {
		if ($lang == "EN") {
			include 'inc/lang/en.php';
		} 
		elseif ($lang == "IT") {
			include 'inc/lang/it.php';
		}
	} else {
		require ("config/set_cookie.php");
	}
	
?>