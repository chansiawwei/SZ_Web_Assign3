
<?php
session_start(); 

//- unable to access directly through URL  [2]

$_SESSION['fromMain'] = "true";
$firstname="";
$lastname="";
$email="";
$product="";
$quantity="";
$str_addr="";
$state="";
$postcode="";
$phone="";
$contact="";

//Data validaton here
  if (!empty($_POST)){
  if (isset($_POST['submit'])) { 
    if (isset($_POST['firstname']) && $_POST['firstname'] !="" ){
        $firstname=$_POST['firstname'];
        $_SESSION['firstname'] = $firstname;

    }

    if (isset($_POST['lastname']) && $_POST['lastname'] !="" ){
      $lastname=$_POST['lastname'];
      $_SESSION['lastname'] = $lastname;

}
if (isset($_POST['email'])  && $_POST['email'] !="" ){
  $email=$_POST['email'];
  $_SESSION['email'] = $email;

}
if (isset($_POST['product'])  && $_POST['product'] !="" ){
  $product=$_POST['product'];
  $_SESSION['product'] = $product;


}
if (isset($_POST['quantity'])  && $_POST['quantity'] !="" ){
  $quantity=$_POST['quantity'];
  $_SESSION['quantity'] = $quantity;

}
if (isset($_POST['address'])  && $_POST['address'] !="" ){
  $str_addr=$_POST['address'];
  $_SESSION['addresss'] = $str_addr;

}
    if (isset($_POST['state'])  && $_POST['state'] !="" ){
      $state=$_POST['state'];
      $_SESSION['state'] = $state;

  }
  if (isset($_POST['postcode'])  && $_POST['postcode'] !="" ){
    $postcode=$_POST['postcode'];
    $_SESSION['postcode'] = $postcode;

}
  if (isset($_POST['phoneno'])  && $_POST['phoneno'] !="" ){
    $phone=$_POST['phoneno'];
    $_SESSION['phoneno'] = $phone;

}
if (isset($_POST['preferredcontact'])  && $_POST['preferredcontact'] !="" ){
  $contact=$_POST['preferredcontact'];
  $_SESSION['preferredcontact'] = $contact;

}
}
validateEmptyFill($firstname,$lastname,$email,$str_addr,$state,$postcode,$phone,$contact,$quantity,$product); 
validateFormat($state,$postcode);
  }

  function validateEmptyFill($firstname,$lastname,$email,$str_addr,$state,$postcode,$phone,$contact,$quantity,$product){
    $errMsg = "";

    if ($firstname=="") {
        $errMsg .= "<p>Please enter first name.</p>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
      $errMsg .= "<p>Only alpha letters allowed in first name.</p>";
    }
    if ($lastname=="") {
      $errMsg .= "<p>Please enter last name.</p>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
      $errMsg .= "<p>Only alpha letters allowed in last name.</p>";
    }
    if ($email=="") {
      $errMsg .= "<p>Please enter email.</p>";
    }
    if ($str_addr=="") {
      $errMsg .= "<p>Please enter address.</p>";
    }
    if ($state=="") {
      $errMsg .= "<p>Please enter state.</p>";
    }
    if ($postcode=="") {
      $errMsg .= "<p>Please enter postcode.</p>";
    }
    else if (!preg_match("/^[0-9]*$/", $postcode)) {
      $errMsg .= "<p>Only digits allowed in postcode.</p>";
    }
    if ($phone=="") {
      $errMsg .= "<p>Please enter phone.</p>";
    }
    else if (!preg_match("/^[0-9]*$/", $phone)) {
      $errMsg .= "<p>Only digits allowed in phone no.</p>";
    }
    if ($quantity=="") {
      $errMsg .= "<p>Please enter quantity.</p>";
    }
    if ($product=="") {
      $errMsg .= "<p>Please select at least one product.</p>";
    }
    if ($errMsg != "") {
      echo   "<h6>" . $errMsg . "</h6>";
      header("Location:enquire.php?error=".$errMsg);

    }
  }

  function validateFormat($state,$postcode){
    if(strtolower($state)=="vic" ){
      if($postcode[0]=='3' || $postcode[0]=='8' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 3 or 8';
      }
    }
    if(strtolower($state)=="nsw" ){
      if($postcode[0]=='1' || $postcode[0]=='2' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 1 or 2';
      }
    }
    if(strtolower($state)=="qld" ){
      if($postcode[0]=='4' || $postcode[0]=='9' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 4 or 9';
      }
    }
    if(strtolower($state)=="nt" ){
      if($postcode[0]=='0' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 0';
      }
    }
    if(strtolower($state)=="wa" ){
      if($postcode[0]=='6' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 6';
      }
    }
    if(strtolower($state)=="sa" ){
      if($postcode[0]=='5' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 5';
      }
    }
    if(strtolower($state)=="tas" ){
      if($postcode[0]=='7' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 7';
      }
    }
    if(strtolower($state)=="act" ){
      if($postcode[0]=='0' ){
        echo 'true';
      }
      else{
        echo 'Postcode must start with 0';
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
