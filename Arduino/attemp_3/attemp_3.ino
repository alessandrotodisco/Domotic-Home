  // INCLUDE
  #include <dht.h>
  #include <SPI.h>
  #include <MFRC522.h>
  
  //GLOBAL VARIABLE
  #define IN1  11  //MOTOR PIN
  #define IN2  10
  #define IN3  9
  #define IN4  8
  
  unsigned long previousMillis = 0; 
  unsigned long previousMillis2 = 0; 
  unsigned long interval = 30000;
  unsigned long interval2 = 1000;
  
  #define RST_PIN 49
  #define SS_PIN 53
  MFRC522 mfrc522(SS_PIN, RST_PIN);  // Create MFRC522 instance
  char uidBuff [20];
  char uidBuff2 [3];
    
      
  // STORE VARIABLE
  int v_light[7];
  int v_alr[] = {0,0,0,0};  //3MAG + PIR
  int s_gas = 0, s_hground = 0;
  int s_alarm;
  bool s_box = 0;
  bool s_fan = 0, s_pump = 0;
  
  //LIGHT
  int p_light[] = {0, 43,42,41,40,39,38};
  int n_light = 6;

  //BUZZER
  int pinbuzz = 5;
  
  //ALARM
  int alr[] = {22,26,27,28};  // PIR - MAGN_1 - MAGN_2 - MAGN_3
  bool alarm = 0;
  int led_alr = 25;
  bool rfid_err = 0;
  bool flag_al = 0;
  
  //TEMPERATURE/HUMIDITY
  dht DHT;
  #define DHT11_PIN 7
  int dht11 = 0;
  char a[1];
  
  //MOTOR
  int Steps = 0;
  boolean Direction = true;// gre
  unsigned long last_time;
  unsigned long currentMillis ;
  int steps_left=5095;
  long time;
  
  //OTHERS
  int pump = 36;
  int fan = 37;
  
  void setup() {
    Serial.begin(9600);
    memset(&v_light, 0, sizeof(v_light));

    SPI.begin();      // Init SPI bus
    mfrc522.PCD_Init();   // Init MFRC522
    ShowReaderDetails();
    
    //LIGHT
    pinMode(p_light[1],OUTPUT);
    pinMode(p_light[2],OUTPUT);
    pinMode(p_light[3],OUTPUT);
    pinMode(p_light[4],OUTPUT);
    pinMode(p_light[5],OUTPUT);
    pinMode(p_light[6],OUTPUT);

     //MOTOR
    pinMode(IN1, OUTPUT);
    pinMode(IN2, OUTPUT);
    pinMode(IN3, OUTPUT);
    pinMode(IN4, OUTPUT);
    
    //ALARM
    pinMode(alr[0],INPUT); 
    pinMode(alr[1],INPUT); 
    pinMode(alr[2],INPUT); 
    pinMode(alr[3],INPUT); 

    //ALARM OUTPUT
    pinMode(led_alr,OUTPUT); 
    pinMode(pinbuzz,OUTPUT); 
    pinMode(23,INPUT); 

    pinMode(5,INPUT); 
    //ACTUATOR
    pinMode(pump,OUTPUT);  //  fan
    pinMode(fan,OUTPUT);  //  pump
    pinMode(A0,INPUT);    // gas sensor
    pinMode(A1,INPUT);    // igrometro
    
    sensor_check();
  }
  
  void loop() {
    r_data();

    exit_check();
    if(alarm == 0) alarm_check(); 
    
    if(((s_alarm == 1)&&(alarm == 1))||((s_alarm == 2)&&(alarm == 1))){
       unsigned long currentMillis2 = millis();
       if(currentMillis2 - previousMillis2 > interval2) {
        previousMillis2 = currentMillis2;
        beep(200); 
        
       }
    }
    
    unsigned long currentMillis = millis();
    if(currentMillis - previousMillis > interval) {
      previousMillis = currentMillis;
      sensor_check();
    }
           
    rfid_check();
    bell_check();
  }
