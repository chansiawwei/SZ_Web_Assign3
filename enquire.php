
<?php
session_start(); 

//Data validaton here
  if (!empty($_POST)){
  if (isset($_POST['submit'])) { 
    if (isset($_POST['firstname'])){
        $firstname=$_POST['firstname'];
        $_SESSION['firstname'] = $firstname;

	}

	
    if (isset($_POST['state'])){
      $state=$_POST['state'];
      $_SESSION['state'] = $state;

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
		<title>Enquiry</title>
		<link rel="icon" href="images/logo.jfif" type="image/x-icon" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="styles/header-mobile.css" />
		<link rel="stylesheet" href="styles/enquiry.css" />
		<script src="scripts/part2.js"></script>
		
		
	</head>
	
	<body  >
	<?php include 'header.inc';?>
<!--Header End-->
	
	<div class="directory">
		<div class="container">
			<a href="index.html">Home </a>/
			<a href="enquire.html">Enquiry </a>
		</div>
	</div>
	
	<!--contact us section -->
	<section class="profile">
		<div class="container">

			<p><a class="logo" href ="index.html">
				<img src="images/logo.jfif" alt="Logo" />
			</a>
			</p>
			
		<h2>Get in Touch!</h2>
		<hr />
			<form class="form" method="post" action="payment.php" onsubmit="return  validate()" novalidate>
				<fieldset>
					<legend>Customer Details</legend>
					<p><label for="txtbox-firstname">First Name</label> 
					<input type="text" id="txtbox-firstname" name= "firstname" pattern="^[a-zA-Z]+$" maxlength="25" required="required" />
					</p>
					<p><label for="txtbox-lastname">Last Name</label>
					<input type="text" id="txtbox-lastname" name= "lastname" pattern="^[a-zA-Z]+$" maxlength="25" required="required" />
					</p>
					<p><label class="txtbox-email">Email</label>
					<input type="email" name="email" id="txtbox-email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
					placeholder="eg:101217869@swin.edu.au" size="50" required="required"/>
					</p>	
				</fieldset>

				<p>		
				<fieldset>
					<legend class="address">Address</legend> 
					<p><label for="txtbox-address">Street Address</label>
					<input type="text" id="txtbox-address" maxlength="40" required="required"/>
					</p>
					<p><label for="txtbox-suburb">Suburb/Town</label>
					<input type="text" id="txtbox-suburb" maxlength="20" required="required"/>
					</p>
					<p><label for="formcontrol-state">State</label>
					<select name="state" id="formcontrol-state" required="required">
					<option value="" selected="selected">Please Select</option>
					<option value="VIC">VIC</option>
					<option value="NSW">NSW</option>
					<option value="QLD">QLD</option>
					<option value="NT">NT</option>
					<option value="WA">WA</option>
					<option value="SA">SA</option>
					<option value="TAS">TAS</option>
					<option value="ACT">ACT</option>
					<option value="other">Other</option>
					</select>
					</p>
					<p><label for="txtbox-postcode">Postcode</label> 
					<input type="text" name="postcode"id="txtbox-postcode" pattern="^[0-9]{4}$" maxlength="4"  required="required"/>	
					</p>

					<label><input type="checkbox" name="billing_address" id="billing_address" value="Mode"  onclick="showBillingAddress()"/>Billing address different from Delivery Address </label><br>
					<!-- <p id="text" style="display:none">Checkbox is CHECKED!</p> -->
					<div  id="billing_address_div" style="display:none"><label >Billing Address</label>
						<input type="text" id="txtbox-billing-address"  maxlength="40"/>
					</div>
				</fieldset>
				
				
				<p>
				<fieldset>
					<legend>Contact Details</legend>
					<p><label for="phone">Phone Number</label>
					<input type="text" id="phone" name="phoneno" placeholder="(+61)0401 037 123" 
					pattern="\d*" maxlength="10"  required="required"/>
					</p>
					<p><label>Perferred Contact</label></p>
					<p><label class="contact">					
						<input type="radio" class="contact" name="preferredcontact" value="email" required="required"/> Email
						</label><br>
						<label class="contact">
						<input type="radio" class="contact" name="preferredcontact" value="post"/> Post
						</label><br>
						<label class="contact">	
						<input type="radio" class="contact" name="preferredcontact" value="phone" /> Phone
						</label>
						</p>
					</fieldset>
					<fieldset>
					<legend>Product Details</legend>
					
					<label for="formcontrol-product">Product</label>
						<select id="formcontrol-product" name="product" required="required">
						<!-- <option value="" selected="selected">Please select</option> -->
						<optgroup label="Headphone Styles">
						<option value="Wireless On-Ear Headphones $130.00" >Wireless On-Ear Headphones $130.00</option>
						<option value="Beats EP On-Ear Headphones $90.00" >Beats EP On-Ear Headphones $90.00 </option>
						<option value="HX-HPEM02 Jamoji On-Ear Wired Headphones	$190.00" >HX-HPEM02 Jamoji On-Ear Wired Headphones $190.00</option>
						</optgroup>
						
						<optgroup label="Airpod Styles">
						<option value="Wireless Charging Case for AirPods $110.00" >Wireless Charging Case for AirPods $110.00</option>
						<option value="BlackPods New Generation 5.0 $200.00" >BlackPods New Generation 5.0 $200.00</option>
						<option value="The New Wireless Bluetooth AirPlus $299.00" >The New Wireless Bluetooth AirPlus $299.00 </option>
						</optgroup>
						</select>

						<p><label for="favcolor">Color Selection:</label>
							<input type="color" id="favcolor" name="favcolor" value="#ff0000" required="required">
						  </p>
						
						<p><label for="txtbox-quantity">Quantity: </label>  
							<input type="number" name="quantity" id="txtbox-quantity"  min="1" required="required">
						</p>  
					
					<p><label class="product-features">Product Features</label>
						<p>
							<label><input type="checkbox" name="issue[]" value="c1"  checked="checked" />Mode</label><br>
							<label><input type="checkbox" name="issue[]" value="c2" />Amps & DACs</label><br>
							<label><input type="checkbox" name="issue[]" value="c3" />Headset</label><br>
							<label><input type="checkbox" name="issue[]" value="c4" />Bag/ Cases</label><br>
							<label><input type="checkbox" name="issue[]" value="c5" />Spare Parts/ Others</label><br>
							
							<p><label>Product Feature Details/ Specification</label>
								<p><label class="comment">
									<textarea class="txtbox-comment" name="comments" rows="10" cols="60" placeholder="Enter the specific Add-On Features."></textarea>
								</label></p>
							

					</fieldset>
					
					<fieldset>
					<legend>Comment Section</legend>
					<p><label>Comment Field</label>
						<p><label class="comment">
							<textarea class="txtbox-comment" name="comments" rows="10" cols="60" placeholder="Enter comments here."></textarea>
						</label></p>	
					</fieldset>
				
				<p>
				<input type="submit" name="submit" value="Submit" class="submit" onClick="setLocalStorage(); valthisform(); checkPos1(); validateEmptyFill();" />
				<!-- <button type="button" onClick="testJS()"><a href="/payment.html">Pay Now</a></button> -->
				</p>
				
			</form>
		</div>
	</section><!-- End contact us section -->
	
	
	
	<div class="parallax2"></div>
	<!--Footer-->	
	<?php include 'footer.inc';?>
 <!-- End footer section -->	
	</body> 
	</html>
