function add(idx) {
    let quantities = document.getElementsByClassName("quantity");
    if (parseInt(quantities[idx].value) < 10) {
        quantities[idx].value = parseInt(quantities[idx].value) + 1;
        calculateTotal();    
    } 
}

function deprecate(idx) {
    let quantities = document.getElementsByClassName("quantity");
    if (quantities[idx].value >= 1) {
        quantities[idx].value = parseInt(quantities[idx].value) - 1;
        calculateTotal();
    }
}

function updateCookie() {
    let cookie = JSON.parse(decodeURIComponent(getCookie("cart")));
    let quantities = document.getElementsByClassName("quantity");
    for (var i = 0; i < cookie.length; i++) {
        cookie[i][4] = parseInt(quantities[i].value);
    }
    let encoded = JSON.stringify(cookie);
    setCookie("cart", encoded, 30);
}

function calculateTotal() {
    var prices = document.getElementsByClassName("item_price");
    var quantities = document.getElementsByClassName("quantity");
    var totalprice = 0;
    for (var i = 0; i < prices.length; i++) {
        let total = prices[i].innerHTML * quantities[i].value;
        totalprice += total;
    }
    var totalfield = document.getElementById("total_price");
    totalfield.innerHTML = "€"+totalprice;
    updateCookie();


}  
//////////////////////////////////////////////////
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name+'=; Max-Age=-99999999;';  
}
