/*
filename: [CHAN SIAW ZHENG]
author: [CHAN SIAW ZHENG]
created: [27/4/2020]
last modified: [5/5/2020]
description: [JavaScript of HTML Assignment payment.html, Design of the website]
*/

"use strict";

  function myFunction() {
    // Retrieve the object from storage
    //   var retrievedObject = localStorage.getItem('testObject');


    console.log('retrievedObject: ', localStorage);
    // console.log('', localStorage.productdetails);
    var product = localStorage.productdetails;

    //data extraction
    var product = localStorage.productdetails;
    var price = product.split("$");


    if (localStorage.quantity) {
      var totalPrice = price[1] * localStorage.quantity;
    }

    if(localStorage.lastname && localStorage.firstname){
      var card_name=localStorage.firstname + " " + localStorage.lastname;
      console.log(card_name)
      document.getElementById("cname").value=card_name;
    }

      document.getElementById("firstname").innerHTML = localStorage.firstname;
      document.getElementById("lastname").innerHTML = localStorage.lastname;
      document.getElementById("email").innerHTML = localStorage.email;
      document.getElementById("product").innerHTML = localStorage.productdetails;
      document.getElementById("quantity").innerHTML = localStorage.quantity;
    if(localStorage.quantity){
      document.getElementById("price").innerHTML =totalPrice ;
    }

    if(localStorage.billing_address){
      alert(localStorage.billing_address)
      var input = document.getElementById("billing_add");

        var text = document.getElementById("billing_add_label");

        // If the checkbox is checked, display the output text
          text.style.display = "block";
          input.innerHTML=localStorage.billing_address;
      }
    }

  function cancelOrder() {
    localStorage.clear();


  }

  function validate() {
    var debug=true;
    if (!debug) {
    var regex = /^[a-zA-Z ]*$/;
    var cardtype = document.getElementById("formcontrol-visa").value;
    var name = document.getElementById("cname").value;
    var card_number = document.getElementById("ccnum").value;
    console.log(card_number.length)
    if (cardtype == "") {
      alert("PLEASE SELECT A CARD TYPE!");
      return false;
    }

    if (name.length > 40 || !name.match(regex)) {
      alert("Name on credit card: maximum of 40 characters, alphabetical and space only");
      return false;
    }
    if (card_number.length < 15 || card_number.length > 16) {
      alert("Credit card number has to be 15-16 digit");

      return false;

    }
    if (cardtype == "visa") {
      if (card_number.length != 16) {
        alert("Visa card number has to be 16 digit");
        return false;
      }
      if (card_number.charAt(0) != '4') {
        alert("Visa Card has to start with digit 4");
        return false;
      }
    }

    if (cardtype == "mastercard") {
      console.log(typeof (card_number.substring(0, 2)))
      if (card_number.length != 16) {
        alert("Master Card number has to be 16 digit");
        return false;
      }
      if (parseInt(card_number.substring(0, 2)) < 51 || parseInt(card_number.substring(0, 2)) > 55) {
        alert("Master Card has to start with digit 51 through to 55");
        return false;
      }
    }
    if (cardtype == "americanexpress") {
      if (card_number.length != 15) {
        alert("American Express number has to be 15 digit");
        return false;
      }

    if (card_number.substring(0, 2) == '34' || card_number.substring(0, 2) == '37') {
         return true;
       }
       else {
         alert("American Express has to start with digit 34 or 37");

         return false;
       }
    }
  }
}
