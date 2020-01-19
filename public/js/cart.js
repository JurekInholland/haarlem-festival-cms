function getQuantity() {
    var i;
    var items = document.getElementById("itemCounter").value;
    
    for (i = 1; i <= items; i++) {
        var x = document.getElementById("quantity" + i).value;
        var nrOfItems = document.getElementById("itemQuantity").value;
        nrOfItems += " " + x;

        document.getElementById("itemQuantity").value = nrOfItems;
    } 

    var totalPrice = document.getElementById("total_price").innerHTML;
    document.getElementById("totalPrice").value  = totalPrice;
}