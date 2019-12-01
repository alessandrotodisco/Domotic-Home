// Alessandro Todisco
// Javascript - Ajax Request

window.addEventListener("load",function(){
    set_off();
    retrieve_info(); 

},false);
var delay = false;
function retrieve_info(){
    if(!delay){
        data = {

        };

        ajax.get(function(x){
            if(x=="") return;
            obj = JSON.parse(x);
            var n = 'null';
            var res = n.localeCompare(obj);
            
            //console.log(obj);

            if(res == 0){
                set_off();
            } else{
                refresh(obj);
            }
        },"read.php",data,true);
    }
    setTimeout(function(){retrieve_info();},250);
}

var def = 0;

function send_info(x,y,d){
    if(d){
        delay=true;
        setTimeout(function(){delay=false;},d);
    }
    b_send_info(x,y);
}

function b_send_info(x,y){
    data = {
        "ser" : x,
        "mod" : y
    };

    ajax.get(function(def){
        
    },"print.php",data,true);
}