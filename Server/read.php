<?php
    require ("config/database.php");
    include('config/session.php');

    $fp = fsockopen("unix:///tmp/socket.sock", -1, $errno, $errstr, 2);
    
    if ($fp != false) {
        $send = "1000";
        fwrite($fp, $send);
        sleep(0.2);

        $read = fgets($fp);

        if (!strcmp($read, "")) {
            echo "null";
        } else{
            $mex = explode("|", $read);

            //Conversione posizionale LUCI
            $numbin = decbin ($mex[0]);

            $led_1 = $numbin/100000;
            $led_1 = intval($led_1);

            $led_2 = $numbin/10000-(10*$led_1);
            $led_2 = intval($led_2);

            $led_3 = $numbin/1000-(100*$led_1)-(10*$led_2);
            $led_3 = intval($led_3);

            $led_4 = $numbin/100-(1000*$led_1)-(100*$led_2)-(10*$led_3);
            $led_4 = intval($led_4);

            $led_5 = $numbin/10-(10000*$led_1)-(1000*$led_2)-(100*$led_3)-(10*$led_4);
            $led_5 = intval($led_5);

            $led_6 = $numbin/1-(100000*$led_1)-(10000*$led_2)-(1000*$led_3)-(100*$led_4)-(10*$led_5);
            $led_6 = intval($led_6);

            
            //Conversione posizionale ALLARME
            $alarm = decbin ($mex[2]);

            $alr_1 = $alarm/10000;
            $alr_1 = intval($alr_1);

            $alr_2 = $alarm/1000-(10*$alr_1);
            $alr_2 = intval($alr_2);

            $alr_3 = $alarm/100-(100*$alr_1)-(10*$alr_2);
            $alr_3 = intval($alr_3);

            $alr_4 = $alarm/10-(1000*$alr_1)-(100*$alr_2)-(10*$alr_3);
            $alr_4 = intval($alr_4);

            $alr_5 = $alarm/1-(10000*$alr_1)-(1000*$alr_2)-(100*$alr_3)-(10*$alr_4);
            $alr_5 = intval($alr_5);

            $mex[4] = $mex[4]/10.24;
            $mex[4] = intval($mex[4]);


            $arr = array(
                'led_1' => $led_4,         //LED 1
                'led_2' => $led_5,         //LED 2 
                'led_3' => $led_3,         //LED 3
                'led_4' => $led_6,         //LED 4
                'led_5' => $led_1,         //LED 5
                'led_6' => $led_2,         //LED 6
                'alr_0' => $mex[1],         //STATUS ALARM PARTIAL OR ALL
                'alr_s' => $alr_1,         //STATUS ALARM
                'alr_1' => $alr_5,         //PIR
                'alr_2' => $alr_3,         //MAGNETIC
                'alr_3' => $alr_4,        //MAGNETIC
                'alr_4' => $alr_2,        //MAGNETIC
                'irr_1' => $mex[3],        //STATUS PUMP
                'irr_2' => $mex[4],        //HYGROMETER
                'ctr_1' => $mex[5],        //STATUS FAN
                'ctr_2' => $mex[6],        //STATUS BOX
                'sen_1' => $mex[7],        //TEMPERATURE
                'sen_2' => $mex[8],        //HUMIDITY
                'sen_3' => $mex[9],        //ALCHOOL/GAS
                'rfid' => $mex[10]          //RFID TAG
            );
            echo json_encode($arr);

            $f_email = file_get_contents("alarm.txt");
            if(($f_email==1)&&($alr_1==0)){
                file_put_contents("alarm.txt","0");
                
            }
            if(($alr_1==1)&&($f_email==0)){
                file_put_contents("alarm.txt","1");
                $sql=mysqli_query($conn, "SELECT email FROM users WHERE username='$user_check'");
                $row = mysqli_fetch_assoc($sql);
                $to = $row['email'];
                if($alr_5==1)$event = "PIR, detected movement.";
                if($alr_3==1)$event = "Main Door open.";
                if($alr_4==1)$event = "Window Hall open.";
                if($alr_2==1)$event = "Window Room open.";
                
                $subject = "Domotic Home: INTRUSION";
                $message = "<html>
                <body>
                    <div style=\"margin: 0 20px; padding: 40px; background-color: rgb(239, 239, 239); border-top: 50px solid rgb(184, 52, 52); border-radius: 20px 20px 0 0;\">
                        <span style=\"margin: 5px 0px 3px 0px;font-weight: 600; font-size: 25px; text-transform: uppercase;  text-decoration: none;\">Domotic Home: </span>
                        <h2 style=\"margin: 5px 0px 3px 0px;font-weight: 600; color: rgb(245, 71, 71);  text-transform: uppercase;  text-decoration: none;\">ALARM!</h2>
                        <br><b>Your system is under intrusion: ".date("jS \of F Y h:i:s A")."</b><br><br>
                        <b>Event: ".$event."</b><br>
                        <a href=\"http://192.168.1.112/home.php#b2\"><button style= \"height: 30px; color: white; margin-top: 10px; background: #3A3838; border: 1px solid #545454;\" type=\"button\" >Turn Off!</button></a>
                    </div>
                <body>
                </html>";
                $from = "alert@domotic_home.com";
                $headers = "From:" . $from. "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                mail($to,$subject,$message,$headers);
            }
            

            if((isset($arr['rfid']))&&($arr['rfid']!="")&&(strlen($arr['rfid'])>5)){
                $sql = mysqli_query($conn,"SELECT * from RFID WHERE UID='$mex[10]';");
                $uid = mysqli_fetch_assoc($sql);
                $rows = mysqli_num_rows($sql);
                if ($rows == 0) {
                    $sql = mysqli_query($conn,"INSERT INTO RFID (UID,Access) values('$mex[10]','0');");
                } else{
                	$sql = mysqli_query($conn,"UPDATE RFID SET last_scan = CURRENT_TIMESTAMP WHERE UID='$mex[10]';");
                	if($uid['Access'] == 0){
						//CANCELLA CODICE ARDUINO
					} elseif ($uid['Access'] == 1) {

						$fp = fsockopen("unix:///tmp/socket.sock", -1, $errno, $errstr, 2);
						if(($arr['alr_0'] == 1)||($arr['alr_0'] == 2)){
							//DISABILITA ALLARME
							$send = "3000";
	    					fwrite($fp, $send);
						} else{
							//ABILITA ALLARME
							$send = "3102";
		    				fwrite($fp, $send);
						}
					}
                    
                }
            }else {
            	//echo "NOPE";
            }
        }
        fclose($fp);
    } else {
        echo "Can't connect to Linux Daemon.\r\n";
    }
?>