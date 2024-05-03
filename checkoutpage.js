function confirmbtn() {
    var m = document.getElementById("mobile");
    var l1 = document.getElementById("line1");
    var l2 = document.getElementById("line2");
    var pcode = document.getElementById("pcode");

    var f = new FormData();
    f.append("m", m.value);
    f.append("l1", l1.value);
    f.append("l2", l2.value);
    f.append("pcode", pcode.value);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            }
        }
    }
    r.open("POST", "updateAddressFromCheckout.php", true);
    r.send(f)
}

function goToSimglePage(x) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            if (t == "success") {
                window.location.href = "singleProduct.php";
            } else {
                alert(t);
            }
        }
    }
    r.open("GET", "redirectSingleProductPageFromCart.php?x=" + x, true);
    r.send();
}

function placeOrder() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var obj = JSON.parse(t);
            // alert(t);

            // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted(orderId) {
                console.log("Payment completed. OrderID:" + orderId);             
                // Note: validate the payment and show success or failure page to the customer
                window.location.href = "order_successfully.php";
                removeQtyProduct();
                adminIncome();
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                console.log("Payment dismissed");
                addOrder();
                window.location.href = "order_failed.php";
            };

            // Error occurred
            payhere.onError = function onError(error) {
                // Note: show an error page
                console.log("Error:" + error);
                window.location.href = "order_failed.php";

            };

            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": obj["merchant_id"],    // Replace your Merchant ID
                "return_url": "http://localhost/4/order_successfully.php",  // Important
                "cancel_url": "http://127.0.0.1/4/order_failed.php",  // Important
                "notify_url": "http://sample.com/notify",
                "order_id": obj["order_id"],
                "items": obj["items"],
                "amount": obj["amount"],
                "currency": obj["currency"],
                "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                "first_name": obj["first_name"],
                "last_name": obj["last_name"],
                "email": obj["email"],
                "phone": obj["phone"],
                "address": obj["address"],
                "city": obj["city"],
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };
            payhere.startPayment(payment);
            

        }
        
    }
    r.open("POST", "paymentProcess.php", true);
    r.send();
}

function addOrder(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            // alert(t);
        }
    }
    r.open("GET","addOrderProcess.php",true);
    r.send();
}

function removeQtyProduct(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            // alert(t);
        }
    }
    r.open("GET","removeQtyProductProcess.php",true);
    r.send();
}

function adminIncome(){
    var r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4 && r.status == 200){
            var t = r.responseText;
            // alert(t);
        }
    }
    r.open("POST","adminIncomeProcess.php",true);
    r.send();
}