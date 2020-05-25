
<?php
session_start(); 

//- unable to access directly through URL  [2]

$_SESSION['fromMain'] = "true";
header("Location: process_order.php");


//Data validaton here
  if (!empty($_POST)){
  if (isset($_POST['submit'])) { 
    if (isset($_POST['firstname'])){
        $firstname=$_POST['firstname'];
        $_SESSION['firstname'] = $firstname;

    }
    if (isset($_POST['lastname'])){
      $lastname=$_POST['lastname'];
      $_SESSION['lastname'] = $lastname;

}
if (isset($_POST['email'])){
  $email=$_POST['email'];
  $_SESSION['email'] = $email;

}
if (isset($_POST['product'])){
  $product=$_POST['product'];
  $_SESSION['product'] = $product;


}
if (isset($_POST['quantity'])){
  $quantity=$_POST['quantity'];
  $_SESSION['quantity'] = $quantity;

}
    if (isset($_POST['state'])){
      $state=$_POST['state'];
      $_SESSION['state'] = $state;

  }
  if (isset($_POST['postcode'])){
    $postcode=$_POST['postcode'];
    $_SESSION['postcode'] = $postcode;

}
  if (isset($_POST['postcode'])){
    $postcode=$_POST['postcode'];
    $_SESSION['postcode'] = $postcode;

}
} 
validateState($state,$postcode);
  }

  function validateState($state,$postcode){
    if(strtolower($state)=="vic" ){
      if($postcode[0]=='3' || $postcode[0]=='8' ){
        echo 'true';
      }
      else{
        echo 'false';
      }
      }
      if(strtolower($state)=="sa" ){
        if($postcode[0]=='5' ){
          return true;
        }
        else{
          
          echo "Postcode must start with 5";
          return false;
          }
        }
      

        /*
        TODO: ADD ALL VALIDATION CODE FROM PART2.JS TO HERE
        */
  }

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

  <!--Header End-->

  <div class="directory">
    <div class="container">
      <a href="index.html">Home </a>/
      <a href="enquire.html">Enquiry </a>/
      <a href="payment.html">Payment </a>
    </div>
  </div>

  <!--Payment Details section -->
  <section class="profile">
    <div class="container">

      <p><a class="logo" href ="index.html">
				<img src="images/logo.jfif" alt="Logo" />
			</a>
			</p>
			
		<h2>Get in Touch!</h2>
    <hr />
    <form class="form" method="POST" action="process_order.php"  onsubmit="return  validate()" novalidate>

        <fieldset>
        <legend>Payment Details</legend>
        <p><label for="txtbox-firstname ">First Name: </label>
          <span id="firstname"></span>
        </p>

        <p><label for="txtbox-lastname">Last Name: </label>
          <span id="lastname"></span>
        </p>

        <p><label class="txtbox-emai">Email: </label>
          <span id="email"></span>
        </p>

        <p><label class="formcontrol-product">Product Details: </label>
          <span id="product"></span>
        </p>

        <p><label class="txtbox-quantity">Quantity: </label>
          <span id="quantity"></span>
        </p>

        <p><label class="txtbox-totalprice">Total Price: </label>
          <span id="price"></span>
        </p>

        <p><label id="billing_add_label" style="display:none" class="txtbox-billing-address">Billing Address:  
         <span id="billing_add"></span>
 </label>
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
            <input type="text" id="cname" name="cardname" placeholder="Credit Card Name">
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
                <input type="text" id="cvv" name="cvv" placeholder="123" pattern="^\d{3}$" maxlength="3">
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
  </section><!-- End contact us section -->



  <div class="parallax2"></div>
  <!--Footer-->
  <?php include 'footer.inc';?>
<!-- End footer section -->
</body>

</html>
