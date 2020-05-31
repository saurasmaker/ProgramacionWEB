function check_login(){

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if(username == "admin" && password == "admin"){
        alert ("Login successfully");
        document.cookie = "section_type = listar";
        window.open("../index.html", "_self");
    }else{
        alert ("Login error");
    }
}
