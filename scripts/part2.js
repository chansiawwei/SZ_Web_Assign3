/*
filename: [CHAN SIAW ZHENG]
author: [CHAN SIAW ZHENG]
created: [25/4/2020]
last modified: [6/5/2020]
description: [Javascript of HTML Assignment enquire.html, Design of the website]
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

function setLocalStorage() {
	// localStorage["key"] = value;\
// Put the object into storage
localStorage.setItem("firstname", document.getElementById("txtbox-firstname").value);
localStorage.setItem("lastname", document.getElementById("txtbox-lastname").value);
localStorage.setItem("email", document.getElementById("txtbox-email").value);
localStorage.setItem("productdetails", document.getElementById("formcontrol-product").value);
localStorage.setItem("quantity", document.getElementById("txtbox-quantity").value);
if(document.getElementById("txtbox-billing-address").value){
localStorage.setItem("billing_address", document.getElementById("txtbox-billing-address").value);
}

	//localStorage.setItem("address", document.getElementById("txtbox-address").value);
	//localStorage.setItem("contact", document.getElementById("phone").value);
	//localStorage.setItem("color", document.getElementById("favcolor").value);
	//localStorage.setItem("product-features", document.getElementsByClassName("product-features").value);
	//localStorage.setItem("suburb", document.getElementById("txtbox-suburb").value);
	//localStorage.setItem("state", document.getElementById("formcontrol-state").value);
	//localStorage.setItem("postcode", document.getElementById("txtbox-postcode").value);

	
  
}

function validate(){
	var debug=true;
	if (!debug) {

var state=document.getElementById("formcontrol-state").value;
var postcode=document.getElementById("txtbox-postcode").value;


if(state.toLowerCase()=="vic" ){
	if(postcode.charAt(0)=='3' || postcode.charAt(0)=='8' ){
	return true;
	}
	else{
		alert('Postcode must start with 3 or 8');
		return false;
		}
	}

if(state.toLowerCase()=="nsw" ){
	if(postcode.charAt(0)=='1' || postcode.charAt(0)=='2' ){
	return true;
	}
	else{
		alert('Postcode must start with 1 or 2');
		return false;
		}
	}

if(state.toLowerCase()=="qld" ){
	if(postcode.charAt(0)=='4' || postcode.charAt(0)=='9' ){
	return true;
	}
	else{
		alert('Postcode must start with 4 or 9');
		return false;
		}
	}

if(state.toLowerCase()=="nt" ){
	if(postcode.charAt(0)=='0'){
	return true;
	}
	else{
		alert('Postcode must start with 0');
		return false;
		}
	}

if(state.toLowerCase()=="wa" ){
	if(postcode.charAt(0)=='6' ){
	return true;
	}
	else{
		alert('Postcode must start with 6');
		return false;
		}
	}

if(state.toLowerCase()=="sa" ){
	if(postcode.charAt(0)=='5' ){
	return true;
	}
	else{
		alert('Postcode must start with 5');
		return false;
		}
	}

if(state.toLowerCase()=="tas" ){
	if(postcode.charAt(0)=='7' ){
	return true;
	}
	else{
		alert('Postcode must start with 7');
		return false;
		}
	}

if(state.toLowerCase()=="act" ){
	if(postcode.charAt(0)=='0' ){
	return true;
	}
	else{
		alert('Postcode must start with 0');
		return false;
		}
	}
}
}


function valthisform(){
 var chkd = document.c1.checked || document.c2.checked||document.c3.checked|| document.c4.checked|| document.c5.checked

 if (chkd == true){

 } else {
    alert ("Please check at least a checkbox")
 }
}

function checkPos1(){
    var x =  parseInt(document.getElementById('txtbox-quantity').value);
    if (x < 0)
    {
        alert("Quantity field must contain a positive number!");
        window.event.preventDefault();  // <--- stop default handling
    }
}

function validateEmptyFill() {
  var input = document.getElementById("txtbox-firstname").value;

  var ever = function() {
    if (input.trim() == '') {
      return "Please fill up this field!"
    } else if (!(isNaN(input))) {
      var result = 1;
      for (var i = 1; i <= input; i++) {
        result = result * i
      }
      return result;
    }

  }

  document.getElementById("txtbox-lastname").value = ever();
  document.getElementById("txtbox-email").value = ever();
  document.getElementById("txtbox-address").value = ever();
  document.getElementById("txtbox-surburb").value = ever();
  document.getElementById("formcontrol-state").value = ever();
  document.getElementById("txtbox-postcode").value = ever();
  document.getElementById("phone").value = ever();
  document.getElementById("formcontrol-product").value = ever();
  document.getElementById("txtbox-quantity").value = ever();
}
