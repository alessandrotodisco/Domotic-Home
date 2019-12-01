void r_data(){
  int data_s = 0, ser = 0, mod = 0;
  if(Serial.available()>0){
    data_s = Serial.parseInt(); //PIN
    ser = data_s/100;
    mod = data_s -(ser*100);
    
    switch(ser){
      case 10:  // control #C
        send_data();
      break;

      case 20:  // light #L
        light_off(mod);
      break;

      case 21:  // light #L
        light_on(mod);
      break;

      case 30:  // Alarm
        s_alarm = 0;
        alarm = 0;
        digitalWrite(led_alr,LOW);
        analogWrite(pinbuzz, 0);
      break;
      
      case 31:
        if(mod == 1){
          s_alarm = 1;
          alarm = 0;
        digitalWrite(led_alr,HIGH);
        } else if (mod == 2){
          s_alarm = 2;
          alarm = 0;
          digitalWrite(led_alr,HIGH);
        }
      break;

      case 40:
        if(mod == 1){     //PUMP
          digitalWrite(pump,LOW);
          s_pump = 0;
        }
        if(mod==2){     //FAN
          digitalWrite(fan,LOW);
          s_fan = 0;
        }
      break;
      
      case 41:
        if(mod==1){     //PUMP
          digitalWrite(pump,HIGH);
          s_pump = 1;
        }
        if(mod==2){     //FAN
          digitalWrite(fan,HIGH);
          s_fan = 1;
        }
        if(mod==3){     //BOX - STEPPER MOTOR
          move_m(1);
          s_box=!s_box;
        }
        if(mod==4){     //DHT11
          sensor_check();
        }
      break;
    }
  }
}

void send_data(){ 
  char str[100];
  char buf[10];
  memset(&str, 0, sizeof(str));

  int res = (v_light[1]*32) + (v_light[2]*16) + (v_light[3]*8) + (v_light[4]*4) + (v_light[5]*2) + (v_light[6]*1);
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",res);
  strcat(str,buf);
  strcat(str,"|");
  res = 0;
  
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_alarm);
  strcat(str,buf);
  strcat(str,"|");

  int alr_ex =  (alarm*16) + (v_alr[3]*8) + (v_alr[2]*4) + (v_alr[1]*2) + (v_alr[0]*1);
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",alr_ex);
  strcat(str,buf);
  strcat(str,"|");
  alr_ex = 0;
  
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_pump);
  strcat(str,buf);
  strcat(str,"|");
  
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_hground);
  strcat(str,buf);
  strcat(str,"|");
  
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_fan);
  strcat(str,buf);
  strcat(str,"|");

  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_box);
  strcat(str,buf);
  strcat(str,"|");

  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",dht11/1000);
  strcat(str,buf);
  strcat(str,"|");
  
  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",dht11-(1000*(dht11/1000)));
  strcat(str,buf);
  strcat(str,"|");

  memset(&buf, 0, sizeof(buf));
  sprintf(buf,"%d",s_gas);
  strcat(str,buf);
  strcat(str,"|");

  memset(&buf, 0, sizeof(buf));
  strcat(str,uidBuff);
  //strcat(str,"|");
  memset(uidBuff, 0, sizeof(uidBuff));
  
  Serial.print(str);
}
