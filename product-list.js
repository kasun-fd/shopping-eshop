function getCategorydata(x){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            if(t == "success"){
                window.location.reload();
            }
        }
    }
    r.open("GET","filterCategoryToProductList.php?x="+x,true);
    r.send();
}

function clickStars(x){
    var one = document.getElementById("one");
    var two = document.getElementById("two");
    var three = document.getElementById("three");
    var four = document.getElementById("four");
    var five = document.getElementById("five");

    if(x == 1){
        one.style.backgroundColor = "#ede4ff";
        one.style.paddingTop = "10px";
        one.style.paddingBottom = "10px";
        one.style.borderRadius = "5px";
        one.style.transition = "all 0.3s";

        two.style.backgroundColor = "white";
        two.style.paddingTop = "0px";
        two.style.paddingBottom = "0px";
        two.style.borderRadius = "5px";
        two.style.transition = "all 0.3s";
        
        three.style.backgroundColor = "white";
        three.style.paddingTop = "0px";
        three.style.paddingBottom = "0px";
        three.style.borderRadius = "5px";
        three.style.transition = "all 0.3s";

        four.style.backgroundColor = "white";
        four.style.paddingTop = "0px";
        four.style.paddingBottom = "0px";
        four.style.borderRadius = "5px";
        four.style.transition = "all 0.3s";

        five.style.backgroundColor = "white";
        five.style.paddingTop = "0px";
        five.style.paddingBottom = "0px";
        five.style.borderRadius = "5px";
        five.style.transition = "all 0.3s";

    } else if(x == 2){ 
        two.style.backgroundColor = "#ede4ff";
        two.style.paddingBottom = "10px";
        two.style.paddingTop = "10px";
        two.style.borderRadius = "5px";
        two.style.transition = "all 0.3s";

        one.style.backgroundColor = "white";
        one.style.paddingTop = "0px";
        one.style.paddingBottom = "0px";
        one.style.borderRadius = "5px";
        one.style.transition = "all 0.3s";

        three.style.backgroundColor = "white";
        three.style.paddingTop = "0px";
        three.style.paddingBottom = "0px";
        three.style.borderRadius = "5px";
        three.style.transition = "all 0.3s";

        four.style.backgroundColor = "white";
        four.style.paddingTop = "0px";
        four.style.paddingBottom = "0px";
        four.style.borderRadius = "5px";
        four.style.transition = "all 0.3s";

        five.style.backgroundColor = "white";
        five.style.paddingTop = "0px";
        five.style.paddingBottom = "0px";
        five.style.borderRadius = "5px";
        five.style.transition = "all 0.3s";
    } else if(x == 3){
        three.style.backgroundColor = "#ede4ff";
        three.style.paddingTop = "10px";
        three.style.paddingBottom = "10px";
        three.style.borderRadius = "5px";
        three.style.transition = "all 0.3s";

        two.style.backgroundColor = "white";
        two.style.paddingBottom = "0px";
        two.style.paddingTop = "0px";
        two.style.borderRadius = "5px";
        two.style.transition = "all 0.3s";

        one.style.backgroundColor = "white";
        one.style.paddingTop = "0px";
        one.style.paddingBottom = "0px";
        one.style.borderRadius = "5px";
        one.style.transition = "all 0.3s";

        four.style.backgroundColor = "white";
        four.style.paddingTop = "0px";
        four.style.paddingBottom = "0px";
        four.style.borderRadius = "5px";
        four.style.transition = "all 0.3s";

        five.style.backgroundColor = "white";
        five.style.paddingTop = "0px";
        five.style.paddingBottom = "0px";
        five.style.borderRadius = "5px";
        five.style.transition = "all 0.3s";
    }else if(x == 4){
        four.style.backgroundColor = "#ede4ff";
        four.style.paddingTop = "10px";
        four.style.paddingBottom = "10px";
        four.style.borderRadius = "5px";
        four.style.transition = "all 0.3s";

        one.style.backgroundColor = "white";
        one.style.paddingTop = "0px";
        one.style.paddingBottom = "0px";
        one.style.borderRadius = "5px";
        one.style.transition = "all 0.3s";

        two.style.backgroundColor = "white";
        two.style.paddingTop = "0px";
        two.style.paddingBottom = "0px";
        two.style.borderRadius = "5px";
        two.style.transition = "all 0.3s";
        
        three.style.backgroundColor = "white";
        three.style.paddingTop = "0px";
        three.style.paddingBottom = "0px";
        three.style.borderRadius = "5px";
        three.style.transition = "all 0.3s";

        five.style.backgroundColor = "white";
        five.style.paddingTop = "0px";
        five.style.paddingBottom = "0px";
        five.style.borderRadius = "5px";
        five.style.transition = "all 0.3s";
    }else if(x == 5){
        five.style.backgroundColor = "#ede4ff";
        five.style.paddingTop = "10px";
        five.style.paddingBottom = "10px";
        five.style.borderRadius = "5px";
        five.style.transition = "all 0.3s";

        two.style.backgroundColor = "white";
        two.style.paddingTop = "0px";
        two.style.paddingBottom = "0px";
        two.style.borderRadius = "5px";
        two.style.transition = "all 0.3s";
        
        three.style.backgroundColor = "white";
        three.style.paddingTop = "0px";
        three.style.paddingBottom = "0px";
        three.style.borderRadius = "5px";
        three.style.transition = "all 0.3s";

        four.style.backgroundColor = "white";
        four.style.paddingTop = "0px";
        four.style.paddingBottom = "0px";
        four.style.borderRadius = "5px";
        four.style.transition = "all 0.3s";

        one.style.backgroundColor = "white";
        one.style.paddingTop = "0px";
        one.style.paddingBottom = "0px";
        one.style.borderRadius = "5px";
        one.style.transition = "all 0.3s";
    }
}

function clearAll(){
    window.location.reload();
}

function apply(){
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("min",min.value);
    f.append("max",max.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            document.getElementById("productAll").innerHTML = t;
        }
    }
    r.open("POST","sortPriceProcess.php",true);
    r.send(f);
}