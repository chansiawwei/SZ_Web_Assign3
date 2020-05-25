<div class="container">
<form class="form" method="POST" action="process_order.php"  onsubmit="return  validate()">
<fieldset>
        <legend>Payment Details</legend>
        <p><label for="txtbox-firstname ">First Name: </label>
        <input type="text" id="firstname" name="firstname" >
        </p>

        <p><label for="txtbox-lastname">Last Name: </label>
        <input type="text" id="lastname" name="lastname" >

        </p>

        <p><label class="txtbox-emai">Email: </label>
        <input type="text" id="email" name="email" >

        </p>

        <p><label class="formcontrol-product">Product Details: </label>
        <input type="text" id="product" name="product" >

          <span id="product"></span>
        </p>

        <p><label class="txtbox-quantity">Quantity: </label>
        <input type="text" id="quantity" name="quantity" >

          <span id="quantity"></span>
        </p>

        <p><label class="txtbox-totalprice">Total Price: </label>
        <input type="text" id="totalprice" name="totalprice" >

          <span id="price"></span>
        </p>

        <p><label id="billing_add_label" style="display:none" class="txtbox-billing-address">Billing Address: </label>
        <input type="text" id="billing_ad" name="billing_ad" >

        <span id="billing_add"></span>
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
						      <select id="formcontrol-visa" required="required">
                        <!-- <option value="" selected="selected">Please select</option> -->
                        <option value="" selected="selected">Please Select</option>

						<option value="visa" >Visa</option>
						<option value="mastercard" >Mastercard</option>
						<option value="americanexpress" >American Express</option>
            </select>
          </p>
            <p><label for="cname" required="required">Name on Credit Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Your Bank Name">
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
        <a href="/index.html" onClick="cancelOrder()" class="btn" style="background-color: red;">Cancel Order</a>
      </fieldset>
      
    </form>
</div>