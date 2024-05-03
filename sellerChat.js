function clickOne(x){

    var f = new FormData();
    f.append("x",x);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }else{
                alert(t);
            }
        }
    }
    r.open("POST","setSessionUsingIdSellerMessage.php",true);
    r.send(f);
}

function sessionDone(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4& r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("GET","sessionDone.php",true);
    r.send();
}

function garbage(x){
    alert(x);
}