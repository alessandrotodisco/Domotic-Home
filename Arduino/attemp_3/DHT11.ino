int getdht11(){
    int chk = DHT.read11(DHT11_PIN);
    int x = 0,y = 0,res= 0;
    switch (chk) {
      case DHTLIB_OK:
        x = (int) DHT.temperature;
        y = (int) DHT.humidity;
        x = x*1000;
        res = x+y;
        return res;
    }
}

