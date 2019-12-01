function usr(){
    document.getElementById("usr_text").style.display = 'none';
    document.getElementById("usr_input").style.display = 'block';
    document.getElementById("usr_input").getElementsByTagName("input")[0].focus();
    console.log(document.getElementById("usr_input"));
}

function psw(){
    document.getElementById("psw_text").style.display = 'none';
    document.getElementById("psw_input").style.display = 'block';
    document.getElementById("psw_input").getElementsByTagName("input")[0].focus();
}

function email(){
    document.getElementById("email_text").style.display = 'none';
    document.getElementById("email_input").style.display = 'block';
    document.getElementById("email_input").getElementsByTagName("input")[0].focus();
}

function lan(){
    document.getElementById("lang_text").style.display = 'none';
    document.getElementById("lang_input").style.display = 'block';
    document.getElementById("lang_input").getElementsByTagName("input")[0].focus();
}

function add_usr(){
    document.getElementById("add_usr").style.display = 'block';
    document.getElementById("sp_1_h").style.display = 'block';
    document.getElementById("sp_1").style.display = 'none';
}

function add_usr_h(){
    document.getElementById("add_usr").style.display = 'none';
    document.getElementById("sp_1_h").style.display = 'none';
    document.getElementById("sp_1").style.display = 'block';
}

function rem_usr(){
    document.getElementById("rem_usr").style.display = 'block';
    document.getElementById("sp_2_h").style.display = 'block';
    document.getElementById("sp_2").style.display = 'none';
}

function rem_usr_h(){
    document.getElementById("rem_usr").style.display = 'none';
    document.getElementById("sp_2_h").style.display = 'none';
    document.getElementById("sp_2").style.display = 'block';
}

function key_m(){
    document.getElementById("key").style.display = 'block';
    document.getElementById("sp_3_h").style.display = 'block';
    document.getElementById("sp_3").style.display = 'none';
}

function key_h(){
    document.getElementById("key").style.display = 'none';
    document.getElementById("sp_3_h").style.display = 'none';
    document.getElementById("sp_3").style.display = 'block';
}