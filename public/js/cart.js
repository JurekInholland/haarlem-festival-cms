function add(idx) {
    let quantities = document.getElementsByClassName("quantity");
    quantities[idx].value = parseInt(quantities[idx].value) + 1;
    calculateTotal();
}

function deprecate(idx) {
    let quantities = document.getElementsByClassName("quantity");
    quantities[idx].value = parseInt(quantities[idx].value) - 1;
    calculateTotal();
}

function updateCookie() {
    console.log("COOKIE:");
    console.log(getCookie("cart"));
    let cookie = JSON.parse(decodeURIComponent(getCookie("cart")));
    console.log(cookie);
    let quantities = document.getElementsByClassName("quantity");
    for (var i = 0; i < cookie.length; i++) {
        cookie[i][4] = parseInt(quantities[i].value);
    }
    let encoded = JSON.stringify(cookie);
    console.log(encoded);
    setCookie("cart", encoded, 30);
}

function calculateTotal() {
    console.log("CLICK");
    var prices = document.getElementsByClassName("item_price");
    var quantities = document.getElementsByClassName("quantity");
    var totalprice = 0;
    for (var i = 0; i < prices.length; i++) {
        console.log("PRICE", i);
        console.log(prices[i].innerHTML, quantities[i].value);
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


///////////////////////////////////////////////

// function getQuantity() {
//     var i;
//     var items = document.getElementById("itemCounter").value;
//     //looping through all items in the cart
//     for (i = 1; i <= items; i++) {
//         var quantity = document.getElementById("quantity" + i).value;
//         var nrOfItems = document.getElementById("itemQuantity").value;
//         nrOfItems += " " + quantity;
//         document.getElementById("itemQuantity").value = nrOfItems;
//         document.getElementById("totalPrice").innerHTML
//     } 
    
//     var price= document.getElementById("price").value;

// }
// function add(p1) {//this method adds one more item to the list and the total price
//    console.log("ADD");
//    var strTotalPrice=document.getElementById("total_price").innerHTML;
// //    var subTotalPrice=strTotalPrice.substring(1, strTotalPrice.length);
//    console.log("Strtotal" + strTotalPrice);
// //    console.log("subtotal" + subTotalPrice);
//    var totalPriceInt =parseInt(strTotalPrice);

//    let result = totalPriceInt + p1;
//     console.log("result", result)
//     document.getElementById("total_price").innerHTML = result;
// }
// function deprecate(p2){ //this method deprecates one  item from the list and takes out the total price
//     console.log("DEPR");
//     var strTotalPrice=document.getElementById("total_price").innerHTML;
//     var subTotalPrice=strTotalPrice.substring(1, 3);
//     var totalPriceInt =parseInt(subTotalPrice);
//      document.getElementById("total_price").innerHTML = totalPriceInt-p2 ;
// }
// function getQuantity() {
//     var total = 0;
//     var items = document.getElementById("itemCounter").value;

//     for (var i = 1; i <= items; i++) {
//         var quantity = document.getElementById("quantity" + i).value; // get quantity value from quantity input field
//         var itemPrice = document.getElementById("itemPrice").innerHTML; // get price of item
//         itemPrice = itemPrice.substring(1, itemPrice.length); // remove € symbol

//         var nrOfItems = document.getElementById("itemQuantity").value; // assign item quantity to hidden field
//         nrOfItems += " " + quantity; // store quantity values of items in cart

//         document.getElementById("itemQuantity").value = nrOfItems; // set item quantity hidden field
//         total += itemPrice * quantity; // calculate total price
//     } 
//     document.getElementById("totalPrice").value  = total;
// }