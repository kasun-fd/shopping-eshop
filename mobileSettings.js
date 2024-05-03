function mobileLogout(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.href = "mobileAccount.php";
            }
        }
    }
    r.open("POST","mobileLogoutProcess.php",true);
    r.send();
}