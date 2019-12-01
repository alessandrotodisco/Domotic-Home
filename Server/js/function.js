//PRESS BUTTON

function led_1(el){

    if(el==document.getElementById("l2_1")){
        document.getElementById("l2_1").style.opacity = "0.7";
        send_info("20","04");
    }
    else if (el==document.getElementById("l1_1")) {
        document.getElementById("l1_1").style.opacity = "0.7";
        send_info("21","04");
    };
}

function led_2(el){

    if(el==document.getElementById("l2_2")){
        document.getElementById("l2_2").style.opacity = "0.7";
        send_info("20","05");
    }
    else if (el==document.getElementById("l1_2")) {
        document.getElementById("l1_2").style.opacity = "0.7";
        send_info("21","05");
    };
}

function led_3(el){

    if(el==document.getElementById("l2_3")){
        document.getElementById("l2_3").style.opacity = "0.7";
        send_info("20","03");
    }
    else if (el==document.getElementById("l1_3")) {
        document.getElementById("l1_3").style.opacity = "0.7";
        send_info("21","03");
    };
}

function led_4(el){

    if(el==document.getElementById("l2_4")){
        document.getElementById("l2_4").style.opacity = "0.7";
        send_info("20","06");
    }
    else if (el==document.getElementById("l1_4")) {
        document.getElementById("l1_4").style.opacity = "0.7";
        send_info("21","06");
    };
}

function led_5(el){

    if(el==document.getElementById("l2_5")){
        document.getElementById("l2_5").style.opacity = "0.7";
        send_info("20","01");
    }
    else if (el==document.getElementById("l1_5")) {
        document.getElementById("l1_5").style.opacity = "0.7";
        send_info("21","01");
    };
}

function led_6(el){

    if(el==document.getElementById("l2_6")){
        document.getElementById("l2_6").style.opacity = "0.7";
        send_info("20","02");
    }
    else if (el==document.getElementById("l1_6")) {
        document.getElementById("l1_6").style.opacity = "0.7";
        send_info("21","02");
    };
}

function led_a(el){
    if(el==document.getElementById("l2_00")){
        document.getElementById("l2_00").style.opacity = "0.7";
        send_info("20","00");
    }
    else if (el==document.getElementById("l1_00")) {
        document.getElementById("l1_00").style.opacity = "0.7";
        send_info("21","00");
    };
}

function alarm_1(el){
    if(el==document.getElementById("a2_1")){
        document.getElementById("a2_1").style.opacity = "0.7";
        send_info("30","00");
    }
    else if (el==document.getElementById("a1_1")) {
        document.getElementById("a1_1").style.opacity = "0.7";
        send_info("31","01");
    };
}

function alarm_2(el){
    if(el==document.getElementById("a2_2")){
        document.getElementById("a2_2").style.opacity = "0.7";
        send_info("30","00");
    }
    else if (el==document.getElementById("a1_2")) {
        document.getElementById("a1_2").style.opacity = "0.7";
        send_info("31","02");
    };
}

function irrigation(el){
    if(el==document.getElementById("i2_1")){
        document.getElementById("i2_1").style.opacity = "0.7";
        send_info("40","01");
    }
    else if (el==document.getElementById("i1_1")) {
        document.getElementById("i1_1").style.opacity = "0.7";
        send_info("41","01");
    };
}

function fan(el){
    if(el==document.getElementById("c2_1")){
        document.getElementById("c2_1").style.opacity = "0.7";
        send_info("40","02");
    }
    else if (el==document.getElementById("c1_1")) {
        document.getElementById("c1_1").style.opacity = "0.7";
        send_info("41","02");
    };
}

function gate(el){
    if(el==document.getElementById("c2_2")){
        document.getElementById("c2_2").style.opacity = "0.7";
        send_info("41","03",6500);
    }
    else if (el==document.getElementById("c1_2")) {
        document.getElementById("c1_2").style.opacity = "0.7";
        send_info("41","03",6500);
    };
}


function irrigation(el){
    if(el==document.getElementById("i2_1")){
        document.getElementById("i2_1").style.opacity = "0.7";
        send_info("40","01");
    }
    else if (el==document.getElementById("i1_1")) {
        document.getElementById("i1_1").style.opacity = "0.7";
        send_info("41","01");
    };
}


//CHANGE STATUS

//SET ALL BUTTON invisible WAITING FOR THE FIRST RESPONSE
function set_off(){

    var led_1 = 0;
    var led_2 = 0;
    var led_3 = 0;
    var led_4 = 0;
    var led_5 = 0;
    var led_6 = 0;

    document.getElementById("light").style.opacity = "0.7";
    document.getElementById("alarm").style.opacity = "0.7";
    document.getElementById("irr").style.opacity = "0.7";
    document.getElementById("gear").style.opacity = "0.7";

    document.getElementById("sc1").style.opacity = "0.7";
    document.getElementById("sc2").style.opacity = "0.7";
    document.getElementById("sc3").style.opacity = "0.7";
    document.getElementById("sc4").style.opacity = "0.7";

    document.getElementById("l1_1").src = "img/box/middle.png";
    document.getElementById("l1_1").style.display = 'block';
    document.getElementById("l2_1").style.display = 'none';

    document.getElementById("l1_2").src = "img/box/middle.png";
    document.getElementById("l1_2").style.display = 'block';
    document.getElementById("l2_2").style.display = 'none';
    
    document.getElementById("l1_3").src = "img/box/middle.png";
    document.getElementById("l1_3").style.display = 'block';
    document.getElementById("l2_3").style.display = 'none';
    
    
    document.getElementById("l1_4").src = "img/box/middle.png";
    document.getElementById("l1_4").style.display = 'block';
    document.getElementById("l2_4").style.display = 'none';
    
    document.getElementById("l1_5").src = "img/box/middle.png";
    document.getElementById("l1_5").style.display = 'block';
    document.getElementById("l2_5").style.display = 'none';

    document.getElementById("l1_6").src = "img/box/middle.png";
    document.getElementById("l1_6").style.display = 'block';
    document.getElementById("l2_6").style.display = 'none';

    document.getElementById("l1_00").src = "img/box/middle.png";
    document.getElementById("l1_00").style.display = 'block';
    document.getElementById("l2_00").style.display = 'none';

    document.getElementById("l1_01").src = "img/box/middle.png";
    document.getElementById("l1_01").style.display = 'block';
    document.getElementById("l2_01").style.display = 'none';

    document.getElementById("a1_1").src = "img/box/middle.png";
    document.getElementById("a1_1").style.display = 'block';
    document.getElementById("a2_1").style.display = 'none';

    document.getElementById("a1_2").src = "img/box/middle.png";
    document.getElementById("a1_2").style.display = 'block';
    document.getElementById("a2_2").style.display = 'none';

    document.getElementById("i1_1").src = "img/box/middle.png";
    document.getElementById("i1_1").style.display = 'block';
    document.getElementById("i2_1").style.display = 'none';

    document.getElementById("i1_2").src = "img/box/middle.png";
    document.getElementById("i1_2").style.display = 'block';
    document.getElementById("i2_2").style.display = 'none';

    document.getElementById("c1_1").src = "img/box/middle.png";
    document.getElementById("c1_1").style.display = 'block';
    document.getElementById("c2_1").style.display = 'none';

    document.getElementById("c1_2").src = "img/box/middle.png";
    document.getElementById("c1_2").style.display = 'block';
    document.getElementById("c2_2").style.display = 'none';
}

function refresh(obj){
    var led_1 = obj['led_1'];
    var led_2 = obj['led_2'];
    var led_3 = obj['led_3'];
    var led_4 = obj['led_4'];
    var led_5 = obj['led_5'];
    var led_6 = obj['led_6'];
    var alr_s = obj['alr_s'];
    var alr_0 = obj['alr_0'];
    var alr_1 = obj['alr_1'];
    var alr_2 = obj['alr_2'];
    var alr_3 = obj['alr_3'];
    var alr_4 = obj['alr_4'];
    var irr_1 = obj['irr_1'];
    var irr_2 = obj['irr_2'];
    var ctr_1 = obj['ctr_1'];
    var ctr_2 = obj['ctr_2'];
    var sen_1 = obj['sen_1'];
    var sen_2 = obj['sen_2'];
    var sen_3 = obj['sen_3'];


    //ALL LIGHT
    //AUTO LIGHT


    //START GENERAL BOX OVERWIEW
        document.getElementById("light").style.opacity = "1";
        document.getElementById("alarm").style.opacity = "1";
        document.getElementById("irr").style.opacity = "1";
        document.getElementById("gear").style.opacity = "1";

        document.getElementById("sc1").style.opacity = "1";
        document.getElementById("sc2").style.opacity = "1";
        document.getElementById("sc3").style.opacity = "1";
        document.getElementById("sc4").style.opacity = "1";


        //ALARM ICON
        if (alr_0 == 0){
            document.getElementById("nav_alert").src = "";
            document.getElementById("nav_alert").style.display = 'none';
            document.getElementById("icon_menu").style.background = '#fff';
        }

        if (((alr_0 == 1)||(alr_0 == 2))&&(alr_s == 1)){
            document.getElementById("nav_alert").src = "img/bar/alert.png";
            document.getElementById("nav_alert").style.display = 'inline-block';
            document.getElementById("icon_menu").style.background = '#B54F3D';
        }
        

        //Lights BOX
        if ((led_1==0)&&(led_2==0)&&(led_3==0)&&(led_4==0)&&(led_5==0)&&(led_6==0)){
            document.getElementById("sc1").src = "img/box/led_off.png";
            document.getElementById("light").src = "img/bar/light_off.png";

            document.getElementById("l1_00").src = "img/box/off.png";
            document.getElementById("l1_00").style.display = 'block';
            document.getElementById("l2_00").style.display = 'none';
            document.getElementById("l1_00").style.opacity = "1";
        }
        else if ((led_1==1)||(led_2==1)||(led_3==1)||(led_4==1)||(led_5==1)||(led_6==1)) {
            document.getElementById("sc1").src = "img/box/led_on.png";
            document.getElementById("l2_00").src = "img/box/on.png";
            document.getElementById("l2_00").style.display = 'block';
            document.getElementById("l1_00").style.display = 'none';
            document.getElementById("l2_00").style.opacity = "1";
        }
        else{
            document.getElementById("sc1").src = "img/box/led_on.png";
            document.getElementById("light").src = "img/bar/light_on.png";
        }
        
        //Alarm BOX
        
        if(alr_0 == 0){
            document.getElementById("sc2").src = "img/box/unlock.png";
            document.getElementById("alarm").src = "img/bar/unlock.png";
        }
        else{
            document.getElementById("sc2").src = "img/box/lock.png";
            document.getElementById("alarm").src = "img/bar/lock.png";
        }


        //Pump BOX
        if(irr_1 == 0){
            //document.getElementById("sc3").src = "";
            document.getElementById("irr").src = "img/bar/irr_off.png";
        }
        else{
            //document.getElementById("sc3").src = "";
            document.getElementById("irr").src = "img/bar/irr_on.png";
        }


        if(alr_1==1){
            document.getElementById("b3_p").src = "img/box/move_off.png";
            document.getElementById("pir1").src = "img/map/pir_off.png";
            document.getElementById("pir2").src = "img/map/pir_off.png";
        } else{
            document.getElementById("b3_p").src = "img/box/move_on.png";
            document.getElementById("pir1").src = "img/map/pir_on.png";
            document.getElementById("pir2").src = "img/map/pir_on.png";
        }
        
        if(alr_2==1) document.getElementById("b3_m1").src = "img/box/door_close.png";
        else document.getElementById("b3_m1").src = "img/box/door_open.png";

        if(alr_4==1) document.getElementById("b3_m2").src = "img/box/door_close.png";
        else document.getElementById("b3_m2").src = "img/box/door_open.png";

        if(alr_3==1) document.getElementById("b3_m3").src = "img/box/door_close.png";
        else document.getElementById("b3_m3").src = "img/box/door_open.png";

        //Sensor
        if((sen_1 != 0)||(sen_2 != 0)||(sen_3 !=0)){
            document.getElementById("b0_t").innerHTML = sen_1 + "°C";
            document.getElementById("b0_h").innerHTML = sen_2 + "%";
            document.getElementById("b0_g").innerHTML = sen_3;
            if (sen_3<400) document.getElementById("b0_gi").src = "img/box/ok.png";
            else if (sen_3>=400) document.getElementById("b0_gi").src = "img/box/no.png";

        }
        if(irr_2 != 0){
            document.getElementById("b3_h").innerHTML = irr_2 + "%";
        }
    //END GENERAL BOX OVERWIEW

    //START BUTTON CHECK
        // LED 1
        if (led_1==1){
            document.getElementById("led_m1").src = "img/map/led_on.png";
            document.getElementById("l2_1").src = "img/box/on.png";
            document.getElementById("l2_1").style.display = 'block';
            document.getElementById("l1_1").style.display = 'none';
            document.getElementById("l2_1").style.opacity = "1";
        } else {
            document.getElementById("led_m1").src = "img/map/led_off.png";
            document.getElementById("l1_1").src = "img/box/off.png";
            document.getElementById("l1_1").style.display = 'block';
            document.getElementById("l2_1").style.display = 'none';
            document.getElementById("l1_1").style.opacity = "1";
        }

        // LED 2
        if (led_2==1){
            document.getElementById("led_m2").src = "img/map/led_on.png";
            document.getElementById("l2_2").src = "img/box/on.png";
            document.getElementById("l2_2").style.display = 'block';
            document.getElementById("l1_2").style.display = 'none';
            document.getElementById("l2_2").style.opacity = "1";
        } else {
            document.getElementById("led_m2").src = "img/map/led_off.png";
            document.getElementById("l1_2").src = "img/box/off.png";
            document.getElementById("l1_2").style.display = 'block';
            document.getElementById("l2_2").style.display = 'none';
            document.getElementById("l1_2").style.opacity = "1";
        }

        // LED 3
        if (led_3==1){
            document.getElementById("led_m3").src = "img/map/led_on.png";
            document.getElementById("l2_3").src = "img/box/on.png";
            document.getElementById("l2_3").style.display = 'block';
            document.getElementById("l1_3").style.display = 'none';
            document.getElementById("l2_3").style.opacity = "1";
        } else {
            document.getElementById("led_m3").src = "img/map/led_off.png";
            document.getElementById("l1_3").src = "img/box/off.png";
            document.getElementById("l1_3").style.display = 'block';
            document.getElementById("l2_3").style.display = 'none';
            document.getElementById("l1_3").style.opacity = "1";
        }

        // LED 4
        if (led_4==1){
            document.getElementById("led_m4").src = "img/map/led_on.png";
            document.getElementById("l2_4").src = "img/box/on.png";
            document.getElementById("l2_4").style.display = 'block';
            document.getElementById("l1_4").style.display = 'none';
            document.getElementById("l2_4").style.opacity = "1";
        } else {
            document.getElementById("led_m4").src = "img/map/led_off.png";
            document.getElementById("l1_4").src = "img/box/off.png";
            document.getElementById("l1_4").style.display = 'block';
            document.getElementById("l2_4").style.display = 'none';
            document.getElementById("l1_4").style.opacity = "1";
        }

        // LED 5
        if (led_5==1){
            document.getElementById("led_m5").src = "img/map/led_on.png";
            document.getElementById("l2_5").src = "img/box/on.png";
            document.getElementById("l2_5").style.display = 'block';
            document.getElementById("l1_5").style.display = 'none';
            document.getElementById("l2_5").style.opacity = "1";
        } else {
            document.getElementById("led_m5").src = "img/map/led_off.png";
            document.getElementById("l1_5").src = "img/box/off.png";
            document.getElementById("l1_5").style.display = 'block';
            document.getElementById("l2_5").style.display = 'none';
            document.getElementById("l1_5").style.opacity = "1";
        }

        // LED 6 OUTSIDE
        if (led_6==1){
            document.getElementById("e1_led_6").src = "img/map/outside_on.png";
            document.getElementById("e2_led_6").src = "img/map/outside_on.png";
            document.getElementById("e3_led_6").src = "img/map/outside_on.png";
            document.getElementById("e4_led_6").src = "img/map/outside_on.png";
            document.getElementById("l2_6").src = "img/box/on.png";
            document.getElementById("l2_6").style.display = 'block';
            document.getElementById("l1_6").style.display = 'none';
            document.getElementById("l2_6").style.opacity = "1";
        } else {
            document.getElementById("e1_led_6").src = "img/map/outside_off.png";
            document.getElementById("e2_led_6").src = "img/map/outside_off.png";
            document.getElementById("e3_led_6").src = "img/map/outside_off.png";
            document.getElementById("e4_led_6").src = "img/map/outside_off.png";
            document.getElementById("l1_6").src = "img/box/off.png";
            document.getElementById("l1_6").style.display = 'block';
            document.getElementById("l2_6").style.display = 'none';
            document.getElementById("l1_6").style.opacity = "1";
        }

        
        // Alarm A1
        if (alr_0 == 1){
            document.getElementById("a2_1").src = "img/box/on.png";
            document.getElementById("a2_1").style.display = 'block';
            document.getElementById("a1_1").style.display = 'none';
            document.getElementById("a2_1").style.opacity = "1";
        } else {
            document.getElementById("a1_1").src = "img/box/off.png";
            document.getElementById("a1_1").style.display = 'block';
            document.getElementById("a2_1").style.display = 'none';
            document.getElementById("a1_1").style.opacity = "1";
        }
        
        // Alarm A2
        if (alr_0 == 2){
            document.getElementById("a2_2").src = "img/box/on.png";
            document.getElementById("a2_2").style.display = 'block';
            document.getElementById("a1_2").style.display = 'none';
            document.getElementById("a2_2").style.opacity = "1";
        } else {
            document.getElementById("a1_2").src = "img/box/off.png";
            document.getElementById("a1_2").style.display = 'block';
            document.getElementById("a2_2").style.display = 'none';
            document.getElementById("a1_2").style.opacity = "1";
        }



        // Irrigation
        if (irr_1 == 1){
            document.getElementById("i2_1").src = "img/box/on.png";
            document.getElementById("i2_1").style.display = 'block';
            document.getElementById("i1_1").style.display = 'none';
            document.getElementById("i2_1").style.opacity = "1";
        } else {
            document.getElementById("i1_1").src = "img/box/off.png";
            document.getElementById("i1_1").style.display = 'block';
            document.getElementById("i2_1").style.display = 'none';
            document.getElementById("i1_1").style.opacity = "1";
        }

        // Fan
        if (ctr_1 == 1){
            document.getElementById("fan_m").src = "img/map/fan.png";
            document.getElementById("fan_m").style.opacity = "1";
            document.getElementById("c2_1").src = "img/box/on.png";
            document.getElementById("c2_1").style.display = 'block';
            document.getElementById("c1_1").style.display = 'none';
            document.getElementById("c2_1").style.opacity = "1";
        } else {
            document.getElementById("fan_m").src = "img/map/fan.png";
            document.getElementById("fan_m").style.opacity = "0.5";
            document.getElementById("c1_1").src = "img/box/off.png";
            document.getElementById("c1_1").style.display = 'block';
            document.getElementById("c2_1").style.display = 'none';
            document.getElementById("c1_1").style.opacity = "1";
        }

        // Box
        if (ctr_2 == 1){
            document.getElementById("c2_2").src = "img/box/on.png";
            document.getElementById("c2_2").style.display = 'block';
            document.getElementById("c1_2").style.display = 'none';
            document.getElementById("c2_2").style.opacity = "1";
        } else {
            document.getElementById("c1_2").src = "img/box/off.png";
            document.getElementById("c1_2").style.display = 'block';
            document.getElementById("c2_2").style.display = 'none';
            document.getElementById("c1_2").style.opacity = "1";
        }

    //END BUTTON CHECK
   
}