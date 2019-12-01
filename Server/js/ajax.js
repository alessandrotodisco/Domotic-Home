var ajax = {};

ajax.send = function(url,method,callback,data,sync){
  var x = new XMLHttpRequest(); 

  x.open(method,url,sync);
  x.onreadystatechange = function(){
    if(x.readyState = 4){
      if(x.status == 200){
        callback(x.responseText);
      }
    }
  };

  if(method == 'POST'){
    x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  }

  x.send(data);
};

ajax.get = function(callback,url,data,sync){
  var info = ajax.info(data);
  ajax.send(url + "?" + info,'GET',callback,null,sync);
};

ajax.post = function(callback,url,data,sync){
  var info = ajax.info(data);
  ajax.send(url,'POST',callback,info,sync);
};

ajax.info = function(data){
  var info = [];
  for(var key in data){
    info.push(encodeURIComponent(key) + "=" + encodeURIComponent(data[key]));
  }
  return info.join('&');  
}
