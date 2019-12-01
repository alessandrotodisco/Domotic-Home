void exit_check(){
  v_alr[0] = digitalRead(alr[0]);
  v_alr[1] = digitalRead(alr[1]);
  v_alr[2] = digitalRead(alr[2]);
  v_alr[3] = digitalRead(alr[3]);
}

void alarm_check(){
    if(((v_alr[0] == 0)||(v_alr[1] == 0)||(v_alr[2] == 0)||(v_alr[3] == 0))&&(s_alarm==1)){
      alarm=1;
    }
    if(((v_alr[1] == 0)||(v_alr[2] == 0)||(v_alr[3] == 0))&&(s_alarm==2)){
      alarm=1;
    }
}


void bell_check(){
  if(digitalRead(23)==1){
     beep(400); 
  }  
}

void beep(unsigned char delayms){
  analogWrite(pinbuzz, 0);      // Almost any value can be used except 0 and 255
  digitalWrite(led_alr,LOW);
  delay(100);          // wait for a delayms ms
  analogWrite(pinbuzz, 20);       // 0 turns it off
  digitalWrite(led_alr,HIGH);
  //delay(100);          // wait for a delayms ms
}

void rfid_check(){
   // Look for new cards
    if ( ! mfrc522.PICC_IsNewCardPresent()) {
      return;
    }
    // Select one of the cards
    if ( ! mfrc522.PICC_ReadCardSerial()) {
      return;
    }
    
    memset(uidBuff, 0, sizeof(uidBuff));
    strcpy(uidBuff, "");
    for (byte i = 0; i < mfrc522.uid.size; i++) {
      memset(uidBuff2, 0, sizeof(uidBuff2));
      uidBuff2[2] = '\0';
      strcat(uidBuff,mfrc522.uid.uidByte[i] < 0x10 ? "0" : "");
      sprintf(&uidBuff2[0],"%02x",mfrc522.uid.uidByte[i]);
      strcat(uidBuff,uidBuff2);
    }
    //Serial.println(uidBuff);
}

void ShowReaderDetails() {
  // Get the MFRC522 software version
  byte v = mfrc522.PCD_ReadRegister(mfrc522.VersionReg);

  // When 0x00 or 0xFF is returned, communication probably failed
  if ((v == 0x00) || (v == 0xFF)) {
    //Serial.println(F("WARNING: Communication failure, is the MFRC522 properly connected?"));
    rfid_err = 1;
  }
}

void move_m(int dir){
  while(steps_left>0){
    currentMillis = micros();
      if(currentMillis-last_time>=1000){
      stepper(1); 
      time=time+micros()-last_time;
      last_time=micros();
      steps_left--;
      }
  } 
    Direction=!Direction;
  steps_left=4100;  
 }

void stepper(int xw){
  for (int x=0;x<xw;x++){
    switch(Steps){
       case 0:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, HIGH);
       break; 
       case 1:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, HIGH);
         digitalWrite(IN4, HIGH);
       break; 
       case 2:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, HIGH);
         digitalWrite(IN4, LOW);
       break; 
       case 3:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, HIGH);
         digitalWrite(IN3, HIGH);
         digitalWrite(IN4, LOW);
       break; 
       case 4:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, HIGH);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, LOW);
       break; 
       case 5:
         digitalWrite(IN1, HIGH); 
         digitalWrite(IN2, HIGH);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, LOW);
       break; 
         case 6:
         digitalWrite(IN1, HIGH); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, LOW);
       break; 
       case 7:
         digitalWrite(IN1, HIGH); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, HIGH);
       break; 
       default:
         digitalWrite(IN1, LOW); 
         digitalWrite(IN2, LOW);
         digitalWrite(IN3, LOW);
         digitalWrite(IN4, LOW);
       break; 
    }
    SetDirection();
  }
} 

void SetDirection(){
  if(Direction==1){ Steps++;}
  if(Direction==0){ Steps--; }
  if(Steps>7){Steps=0;}
  if(Steps<0){Steps=7; }
}

