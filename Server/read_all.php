<?php
   require ("config/database.php");

    $fp = fsockopen("unix:///tmp/socket.sock", -1, $errno, $errstr, 2);
    
    if ($fp != false) {
            $send = "1000";
            fwrite($fp, $send);
            sleep(0.2);

            $read = fgets($fp);

            echo $read;
        }
        fclose($fp);
    } else {
        echo "Can't connect to Linux Daemon.\r\n";
    }
?>