<?php
    if((isset($_GET['ser']))&&(isset($_GET['mod']))) {
    	$fp = fsockopen("unix:///tmp/socket.sock", -1, $errno, $errstr, 2);
    	if ($fp != false) {
	    	$send = $_GET['ser'].$_GET['mod'];
	    	fwrite($fp, $send);
	    	fclose($fp);
            if($_GET['ser']=="30") file_put_contents("alarm.txt","0");
    	} else {
			echo "Can't connect to Linux Daemon.\r\n";
		}
    } else {
    	echo "Error!";
    }

?>