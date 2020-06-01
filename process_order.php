<?php
session_start(); 
require 'settings.php';
$cardtype="";
$cardname="";
$cardnumber="";
$expdate="";
$cvv="";

//- unable to access directly through URL  [2]

if($_SESSION['fromMain'] == "false"){
  //send them back
  header("Location: index.php");
}
else{
  //reset the variable
  $_SESSION['fromMain'] = "false";
}

if($_SESSION['submit'] == "false"){
  //send them back
  header("Location: fix_order.php");
}
else{
  //reset the variable
  $_SESSION['submit'] = "false";
}

function sanitizeData($param){
  $data = stripslashes(trim($param));
  $data = htmlspecialchars($param);
  return $data;
}

//Data validaton here
  if (!empty($_POST)){
  if (isset($_POST['submit'])) { 

    if (isset($_POST['cardtype']) && $_POST['cardtype'] !=""){
      $cardtype=$_POST['cardtype'];
      $_SESSION['cardtype'] = $cardtype;
  
  }
    else {
      echo "<p>Error: Enter data in the <a href=\"fix_order.php\"> Form </a></p>";
    }

    if (isset($_POST['cardname']) && $_POST['cardname'] !=""){
      $cardname=$_POST['cardname'];
      $_SESSION['cardname'] = $cardname;
  
  }
    else {
      echo "<p>Error: Enter data in the <a href=\"fix_order.php\"> Form </a></p>";
    }

    if (isset($_POST['cardnumber']) && $_POST['cardnumber'] !=""){
      $cardnumber=$_POST['cardnumber'];
      $_SESSION['cardnumber'] = $cardnumber;
  
  }
    else {
      echo "<p>Error: Enter data in the <a href=\"fix_order.php\"> Form </a></p>";
    }

    if (isset($_POST['expdate']) && $_POST['expdate'] !=""){
      $expdate=$_POST['expdate'];
      $_SESSION['expdate'] = $expdate;

  }
    if (isset($_POST['cvv']) && $_POST['cvv'] !=""){
      $cvv=$_POST['cvv'];
      $_SESSION['cvv'] = $cvv;

  }
    else {
      echo "<p>Error: Enter data in the <a href=\"fix_order.php\"> Form </a></p>";
    }


  validateEmptyFill($cardname,$cardnumber,$cardtype,$expdate,$cvv); 
  validateFormat($cardtype,$cardnumber);
  }  
}
  function validateEmptyFill($cardname,$cardnumber,$cardtype,$expdate,$cvv){
    $errMsg = "";

    if ($cardnumber=="") {
        $errMsg .= "<p>Please enter card number.</p>";
    }
    else if ((strlen($cardnumber)<15) || (strlen($cardnumber)>16)) {
      $errMsg .= "<p>Card number must be between 15 or 16.</p>";
    }
    if ($cardname=="") {
      $errMsg .= "<p>Please enter card name.</p>";
    }
    else if (!preg_match("/^[a-zA-Z]*$/", $cardname)) {
      $errMsg .= "<p>Only alpha letters allowed in card name.</p>";
    }
    if ($cardtype=="") {
      $errMsg .= "<p>Please enter card type.</p>";
    }
    if ($expdate=="") {
      $errMsg .= "<p>Please enter expired date.</p>";
    }
    if ($cvv=="") {
      $errMsg .= "<p>Please enter cvv.</p>";
    }
    if ($errMsg != "") {
      echo "<p . $errMsg .>";
    }
  }

  function validateFormat($cardtype,$cardnumber){
          // echo strlen($cardnumber);

  if(($cardtype)=="visa" ){
    $num_length = strlen((string)$cardnumber);
      if($num_length == 16) {
      // Pass
        echo "true";
      } else {
      // Fail
        echo "Visa Card Number must be 16 digits";
          }
      }
    // if(($cardtype)=="visa" ){
    //   echo strlen($cardnumber);
    //   if(strlen($cardnumber) = 16){
    //     echo 'true';
    //   }
    //   else{
    //     echo 'Visa card number has to be 16 digit';
    //   }
    // }

    if(($cardtype)=="visa" ){
      if($cardnumber[0]=='4' ){
        echo 'true';
      }
      else{
        echo 'Visa Card has to start with digit 4';
      }
    }

    if(($cardtype)=="mastercard" ){
      $num_length = strlen((string)$cardnumber);
        if($num_length == 16) {
        // Pass
          echo "true";
        } else {
        // Fail
          echo "Master Card Number must be 16 digits";
            }
        }

      if(($cardtype)=="mastercard" ){
          if(substr($cardnumber,0,2) < 51 || substr($cardnumber,0,2) > 55){
            echo 'Master Card Number has to start with digit 51 through to 55';
          }
          else{
            echo 'true';
          }
        }

        if(($cardtype)=="americanexpress" ){
          $num_length = strlen((string)$cardnumber);
            if($num_length == 1) {
            // Pass
              echo "true";
            } else {
            // Fail
              echo "American Express Card Number must be 15 digits";
                }
            }
  
            if(($cardtype)=="americanexpress" ){
              if(substr($cardnumber,0,2) == 34 || substr($cardnumber,0,2) == 37){
                echo 'true';
              }
              else{
                echo 'American Express Card Number has to start with digit 34 or 37';
              }
            }
    

  }

  function validate() {

    $firstname = sanitizeData($_SESSION['firstname']);
    $lastname = sanitizeData($_SESSION['lastname']);
    $email =sanitizeData( $_SESSION['email']);
    $product = sanitizeData($_SESSION['product']);
    $quantity = sanitizeData($_SESSION['quantity']);

    // echo "<p>" . $firstname . "</p><br>";
    // echo "<p>" . $product . "</p><br>";
    // echo "<p>" . $totalPrice . "</p><br>";

    //Get Product Price here
    $prod = explode("$", $product);
    $exploded_product=$prod[0];
    $price=$prod[1]; 

    //Calculate Total Price
    $totalPrice=intval($price) * intval($quantity);

    /*
     Before an order is written to the orders table the data format rules need to be checked.
These rules are specified in Part 1 (for customer details) and Part 2 (for product quantity and
credit card details), and a product with options should also be able to be selected and checked.
You need to replicate this checking in your PHP code
    */

    //CONNECT TO DATABASE HERE
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  if ( mysqli_query( $conn,"DESCRIBE `orders`" ) ) {
    // my_table exists
}
else{

  //IF TABLE NOT EXISTS, CREATE TABLE
$sql = "CREATE TABLE orders (
  order_id INT(6)  AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255),
  product VARCHAR(255),
  quantity INT(10),
  order_cost INT(10),
  order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  order_status VARCHAR(255),
  card_number VARCHAR(255),
  card_expdate VARCHAR(255),
  card_cvc VARCHAR(255),
  address VARCHAR(255),
  )";
      $result = mysqli_query($conn, $sql);

}
  $sql = "INSERT INTO orders (firstname,lastname,email,product,quantity,order_cost,order_status,card_type,card_number,card_expdate,card_cvc) 
  VALUES ('$firstname','$lastname','$email','$exploded_product','$quantity','$totalPrice','PENDING','$cardtype','$cardnumber','$expdate','$cvv')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    //THIS WILL RETURN ORDER_ID THAT ON THE RECORD THAT YOU JUST INSERT
    // printf ("New Record has id %d.\n", $conn->insert_id);
    $order_id=$conn->insert_id;
      header("Location: receipt.php?firstname=".$firstname.
    "&lastname=".$lastname."&email=".$email.
    "&product=".$product.
    "&quantity=".$quantity.
    "&order_cost=".$totalPrice.
    "&card_type=".$cardtype.
    "&card_number=".$cardnumber.
    "&card_expdate=".$expdate.
    "&card_cvc=".$cvv.
    "&order_id=".$order_id."");

  // exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // $sql = "select * from orders ";
  // $result = mysqli_query($conn, $sql);
// echo($result);
  $conn->close();
} 


  
  
?>