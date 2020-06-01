<?php
session_start(); 
$_SESSION['fromMain'] = "true";

if($_GET){
	print_r($_GET);       
}

$firstname=$_SESSION["firstname"];
$lastname=$_SESSION["lastname"];
$email=$_SESSION["email"];
$product=$_SESSION["product"];
$quantity=$_SESSION["quantity"];
$quantity=$_SESSION["quantity"];
$totalprice=$_SESSION["totalprice"];
// $address=$_SESSION["address"];

?>
<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Assignment 1" />
  <meta name="author" content="ChanSiawZheng" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Payment</title>
  <link rel="icon" href="images/logo.jfif" type="image/x-icon" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="styles/header-mobile.css" />
  <link rel="stylesheet" href="styles/payment.css" />
  <script src="scripts/payment.js"></script>
  
  
</head>

<body onload="myFunction()">
<?php include 'header.inc';?>
<div class="container">
<H1>FIX ORDER PAGE</H1>
<form class="form" method="POST" action="process_order.php"  onsubmit="return  validate()">
<fieldset>
        <legend>Payment Details</legend>
        <p><label for="txtbox-firstname ">First Name: </label>
        <input type="text" id="firstname" name="firstname" 
        value="<?php echo htmlspecialchars($firstname); ?>">
        </p>

        <p><label for="txtbox-lastname">Last Name: </label>
        <input type="text" id="lastname" name="lastname" 
        value="<?php echo htmlspecialchars($lastname); ?>">


        </p>

        <p><label class="txtbox-emai">Email: </label>
        <input type="text" id="email" name="email"
        value="<?php echo htmlspecialchars($email); ?>">
 

        </p>

        <p><label class="formcontrol-product">Product Details: </label>
        <input type="text" id="product" name="product"
        value="<?php echo htmlspecialchars($product); ?>">
 

          <span id="product"></span>
        </p>

        <p><label class="txtbox-quantity">Quantity: </label>
        <input type="text" id="quantity" name="quantity" 
        value="<?php echo htmlspecialchars($quantity); ?>">


          <span id="quantity"></span>
        </p>

        <p><label class="txtbox-totalprice">Total Price: </label>
        <input type="text" id="totalprice" name="totalprice" 
        value="<?php echo htmlspecialchars($totalprice); ?>">


          <span id="price"></span>
        </p>


      </fieldset>    
            <!-- <button><a href="/payment.html">Pay Now</a></button> -->
          
      
                <div class="row">

                  <div class="col-50">
                    <fieldset>
                    <legend>Card Details </legend>
                    <p><label for="fname" required="required">Accepted Cards</label>
                    <div class="icon-container">
                      <i class="fa fa-cc-visa" style="color:navy;"></i>
                      <i class="fa fa-cc-amex" style="color:blue;"></i>
                      <i class="fa fa-cc-mastercard" style="color:red;"></i>
                      <i class="fa fa-cc-discover" style="color:orange;"></i>
                    </div></p>
                    <p><label for="formcontrol-product">Credit Card Type</label>
						      <select id="formcontrol-visa" required="required" name="cardtype">
                        <!-- <option value="" selected="selected">Please select</option> -->
                        <option value="" selected="selected">Please Select</option>

						<option value="visa" >Visa</option>
						<option value="mastercard" >Mastercard</option>
						<option value="americanexpress" >American Express</option>
            </select>
          </p>
            <p><label for="cname" required="required">Name on Credit Card</label>
            <input type="text" id="cname2" name="cardname" placeholder="Your Bank Name">
            </p>
            <p><label for="ccnum" required="required">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            </p>
            <div class="row">
              <div class="col-50">
               <p><label for="expdate" required="required">Exp Date</label>
                <input type="text" id="expdate" name="expdate" placeholder="mm/yy" pattern="(?:0[1-9]|1[0-2])/[0-9]{2}">
              </p> 
              </div>
              <div class="col-50">
                <p><label for="cvv" required="required">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="123">
              </p>
              </div>
            </div>
            <p><label>
              <input type="checkbox" checked="checked" name="sameadr" required="required"> Shipping address same as billing
            </label></p>
          </div>
        </div>

        <input type="submit" name="submit" value="Continue to Check Out" class="btn">
        <a href="/index.php" onClick="cancelOrder()" class="btn" style="background-color: red;">Cancel Order</a>
      </fieldset>
      
    </form>
</div>