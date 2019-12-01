<?php
	$to = "alex96tod@gmail.com";
	$subject = "PHP Test mail";
	$message = "PROVA";
	$from = "alert@domotic_home.com";
	$headers = "From:" . $from;

	mail($to,$subject,$message,$headers);
?>
