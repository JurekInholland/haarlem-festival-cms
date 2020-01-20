  
function getQuantity() {
    var i;
    var items = document.getElementById("itemCounter").value;
    //looping through all items in the cart
    for (i = 1; i <= items; i++) {
        var quantity = document.getElementById("quantity" + i).value;
        var nrOfItems = document.getElementById("itemQuantity").value;
        nrOfItems += " " + quantity;
        document.getElementById("itemQuantity").value = nrOfItems;
        document.getElementById("totalPrice").innerHTML
    } 
    
    var price= document.getElementById("price").value;

}
function add(p1) {//this method adds one more item to the list and the total price
   console.log("ADD");
   var strTotalPrice=document.getElementById("total_price").innerHTML;
//    var subTotalPrice=strTotalPrice.substring(1, strTotalPrice.length);
   console.log("Strtotal" + strTotalPrice);
//    console.log("subtotal" + subTotalPrice);
   var totalPriceInt =parseInt(strTotalPrice);

   let result = totalPriceInt + p1;
    console.log("result", result)
    document.getElementById("total_price").innerHTML = result;
}
function deprecate(p2){ //this method deprecates one  item from the list and takes out the total price
    console.log("DEPR");
    var strTotalPrice=document.getElementById("total_price").innerHTML;
    var subTotalPrice=strTotalPrice.substring(1, 3);
    var totalPriceInt =parseInt(subTotalPrice);
     document.getElementById("total_price").innerHTML = totalPriceInt-p2 ;
}
function getQuantity() {
    var total = 0;
    var items = document.getElementById("itemCounter").value;

    for (var i = 1; i <= items; i++) {
        var quantity = document.getElementById("quantity" + i).value; // get quantity value from quantity input field
        var itemPrice = document.getElementById("itemPrice").innerHTML; // get price of item
        itemPrice = itemPrice.substring(1, itemPrice.length); // remove € symbol

        var nrOfItems = document.getElementById("itemQuantity").value; // assign item quantity to hidden field
        nrOfItems += " " + quantity; // store quantity values of items in cart

        document.getElementById("itemQuantity").value = nrOfItems; // set item quantity hidden field
        total += itemPrice * quantity; // calculate total price
    } 
    document.getElementById("totalPrice").value  = total;
}