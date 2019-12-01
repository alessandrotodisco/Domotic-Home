<?php
 	$numbin = decbin ( 21 );
 	echo $numbin;
 	echo "<br>";

 	$pin_1 = $numbin/100000;
 	$pin_1 = intval($pin_1);
 	echo $pin_1;
 	echo "<br>";

 	$pin_2 = $numbin/10000-(10*$pin_1);
 	$pin_2 = intval($pin_2);
 	echo $pin_2;
 	echo "<br>";

 	$pin_3 = $numbin/1000-(100*$pin_1)-(10*$pin_2);
 	$pin_3 = intval($pin_3);
 	echo $pin_3;
 	echo "<br>";

 	$pin_4 = $numbin/100-(1000*$pin_1)-(100*$pin_2)-(10*$pin_3);
 	$pin_4 = intval($pin_4);
 	echo $pin_4;
 	echo "<br>";

 	$pin_5 = $numbin/10-(10000*$pin_1)-(1000*$pin_2)-(100*$pin_3)-(10*$pin_4);
 	$pin_5 = intval($pin_5);
 	echo $pin_5;
 	echo "<br>";

 	$pin_6 = $numbin/1-(100000*$pin_1)-(10000*$pin_2)-(1000*$pin_3)-(100*$pin_4)-(10*$pin_5);
 	$pin_6 = intval($pin_6);
 	echo $pin_6;
 	echo "<br>";

?>