/*
   Filename: order.js
*/

//Called on the load event of the form

function initForm() {
//Code that displays the current date:
var today = new Date();
var day = today.getDate();
var month = today.getMonth() + 1;
var year = today.getFullYear();
var date = month + "/" + day + "/" + year;
document.getElementById("date").value = date;

//Code that hides the phone field:
document.getElementById("phone").style.display = "none";



//Code that disables the submit button if there is no order
    const order1 = document.getElementById('qty1').value;
    const order2 = document.getElementById('qty2').value;
    const order3 = document.getElementById('qty3').value;

    if (order1 === '0' && order2 === '0' && order3 === '0') {
        document.getElementById('Submit').disabled = true;
        return false;
    } else {
        document.getElementById('Submit').disabled = false;
        return true;
    }



}
//Called when the calculate button is clicked
function calculateTotal() {
	//Calculate the total of the order and display it in the total field
    //will need to get value for the price of each item and the quantity. Write it to the 3 cost fields
	//Need to calculate the taxes too and add it to subtotal. Enable the submit button when the total is calculated properly.

    var price1 = document.getElementById("price1").value;
    var price2 = document.getElementById("price2").value;
    var price3 = document.getElementById("price3").value;

    var quantity1 = document.getElementById("qty1").value;
    var quantity2 = document.getElementById("qty2").value;
    var quantity3 = document.getElementById("qty3").value;

    if (quantity1 === '0' && quantity2 === '0' && quantity3 === '0') {
        alert("Please enter a valid quantity for at least one item");
    }else {

        var cost1 = price1 * quantity1;
        var cost2 = price2 * quantity2;
        var cost3 = price3 * quantity3;

        var zip = document.getElementById("zipcode").value;
        var shipping = 0;
        if (zip === "46901") {
            shipping = 4.95;
        } else if (zip === "46902") {
            shipping = 5.95;
        } else if (zip === "46903") {
            shipping = 6.95;
        } else if (zip === "46904") {
            shipping = 7.95;
        } else {
            alert("Invalid zip code");
            return false;
        }


        var subtotal = cost1 + cost2 + cost3 + shipping;
        var tax = subtotal * 0.07;
        var total = subtotal + tax;

        tax = tax.toFixed(2);
        total = total.toFixed(2);

        document.getElementById("cost1").value = cost1;
        document.getElementById("cost2").value = cost2;
        document.getElementById("cost3").value = cost3;

        document.getElementById("tax").value = tax;

        document.getElementById("total").value = total;

        initForm();
    }

}
//Called on the onclick event of the subscribe checkbox
function handleSubscription() {
//Show and hide the fSetSelection fieldset based on the status of the checkbox
//If the checkbox is checked then show the fieldset, otherwise keep it hidden.
//This can be accomplished using the style property of the element

    if (document.getElementById("subscribe").checked) {
        document.getElementById("phone").style.display = "block";
    }
    else {
        document.getElementById("phone").style.display = "none";
    }



}

//Called on the submit event of the submit button.
function handleSubmit() {
//DON'T VALIDATE PHONE IF THE CHECKBOX IS NOT CHECKED
//Else validate the phone number using a regular expression
//Valid numbers are in common formats such as 1234567890 or (123) 456-7890 or 123-456-7890

    if (document.getElementById("subscribe").checked) {
        var phone = document.getElementById("phone").value;
        var phoneRegex = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        if (phoneRegex.test(phone)) {
            return true;
        } else {
            alert("Please enter a valid phone number");
            return false;
        }
    }
    else {
        return true;
    }



}