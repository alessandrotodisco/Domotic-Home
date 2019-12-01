void light_off(int mod){
  if(mod == 0){
    for(int i = 1; i <= n_light; i++){
      digitalWrite(p_light[i],LOW);
      v_light[i]= 0;
    }
  } else if ((mod > 0)&&(mod <= 6)){
    digitalWrite(p_light[mod],LOW);
    v_light[mod] = 0;
  }
}

void light_on(int mod){
  if(mod == 0){
    for(int i = 1; i <= n_light; i++){
      digitalWrite(p_light[i],HIGH);
      v_light[i]= 1;
    }
  } else if ((mod > 0)&&(mod <= 6)){
    digitalWrite(p_light[mod],HIGH);
    v_light[mod] = 1;
  }
}

void sensor_check(){
  dht11 = getdht11();
  s_gas = analogRead(A0);
  s_hground = analogRead(A1);
}

