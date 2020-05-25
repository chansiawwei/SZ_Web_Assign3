/*
filename: [CHAN SIAW ZHENG]
author: [CHAN SIAW ZHENG]
created: [27/4/2020]
last modified: [5/5/2020]
description: [JavaScript of HTML Assignment enhancement2.html, Design of the website]
*/

"use strict";

function showBillingAddress(){
    // Get the checkbox
    var checkBox = document.getElementById("billing_address");
    // Get the output text
    var text = document.getElementById("billing_address_div");
  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  
  }
  

function myFunction() {
if(localStorage.billing_address){
    alert(localStorage.billing_address)
    var input = document.getElementById("billing_add");

      var text = document.getElementById("billing_add_label");

      // If the checkbox is checked, display the output text
        text.style.display = "block";
        input.innerHTML=localStorage.billing_address;
    }

    if(localStorage.lastname && localStorage.firstname){
        var card_name=localStorage.firstname + " " + localStorage.lastname;
        console.log(card_name)
        document.getElementById("cname").value=card_name;
      }
  }