function validatesellbook() {
    var bookname = document.getElementById("bookname");
    var purchasedate = document.getElementById("pdate");
    var Price = document.getElementById("price");
    var price = document.sellbook.price;
    var bc1 = document.sellbook.bcondn1;
    var bc2 = document.sellbook.bcondn2;
    var bc3 = document.sellbook.bcondn3;
    var bc4 = document.sellbook.bcondn4;
    var contactno = document.getElementById("contactno");
    var description = document.getElementById("description");
    // var bookimage = document.sellbook.bookimage;


    if (bookname.value.trim() == "" || description.value.trim() == "" || purchasedate.value == "" || Price.value == "") {
        alert("Fill in all the details");
        return false;
    }
    if (validateBcondn(bc1, bc2, bc3, bc4)) {
        if (validateprice(price)) {
            if (validatecontactno(contactno)) {}
        }
    }
    return true;
}

function validateBcondn(bc1, bc2, bc3, bc4) {
    x = 0;
    if (bc1.checked == true) {
        x++;
    }
    if (bc2.checked == true) {
        x++;
    }
    if (bc3.checked == true) {
        x++;
    }
    if (bc4.checked == true) {
        x++;
    }
    if (x == 0) {
        alert("Select one Book Condition.");
        return false;
    }
    return true;
}

function validateprice(price) {
    var priceformat = '/^[0-9]+$/';
    if (price.value.match(priceformat)) {
        return true;
    } else {
        alert("You have entered Invalid Price!,Enter Numeric Value Only");
    }
}

function validatecontactno(contactno) {
    var phoneNum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (contactno.value.match(phoneNum)) {
        return true;
    } else {
        alert("Invalide Contact Number");
    }
}
