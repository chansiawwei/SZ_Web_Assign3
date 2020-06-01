<script>
    function myFunction(){
var change=document.getElementById("change");
console.log('asd');
    }
    function delete(event){
        console.log(event)
    }

</script>
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

<form action="manager.php" method="POST">

<p><label>Display Option:</label></p>
<p><label class="contact">					
	<input type="radio" class="contact" name="option" value="all"  checked/> Show all Orders:
		</label>
		<label class="contact">
            <input type="radio" class="contact" name="option" value="cust"/> customer Name:
            <input type="text"  name="customer" placeholder="Enter Customer First Name">

			</label>
			<label class="contact">	
            <input type="radio" class="contact" name="option" value="prod" /> Product Name:
            <input type="text"  name="product" placeholder="Enter Product Name">

            </label>
            <label class="contact">	
			<input type="radio" class="contact" name="option" value="status" /> View All Pending Orders:
            </label>
            <label class="contact">	
			<input type="radio" class="contact" name="option" value="cost" /> Sort By Total Cost:
			</label>
           </p>		
           <input type="submit" name="submit" value="Search" class="btn">

</form>




</body>

<?php
session_start(); 
require 'settings.php';
$sql="SELECT * FROM orders";

if (isset($_POST['submit'])) { 
    if (isset($_POST['option'])){
        $option=$_POST['option'];

        if($option=="cust"){
            if (isset($_POST['customer'])){
                $customer=$_POST['customer'];
                $sql = "SELECT * FROM orders WHERE firstname = '".$customer."'";

              }
        }
        elseif ($option=="all") {
            $sql="SELECT * FROM orders";
        }
        elseif ($option=="prod") {
            if (isset($_POST['product'])){
                $product=trim($_POST['product']);
                $sql = "SELECT * FROM orders WHERE product = '".$product."'";

              }
        }
        elseif($option=="status"){
            $sql = "SELECT * FROM orders WHERE order_status = 'PENDING'";

        
        }
        elseif ($option=="cost") {
            $sql = "SELECT * FROM orders ORDER BY order_cost";

        }



    }
}

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    // Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($conn,$sql);

echo "<table border='1'>";

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
          if($key=='card_type'||$key=='card_number'||$key=='card_expdate'||
          $key=='card_cvc'){
        continue;
          }
          else{echo "<th>" . $key . "</th>";  }
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $key => $value) {
        if($key=='card_type'||$key=='card_number'||$key=='card_expdate'||
        $key=='card_cvc'){
      continue;
        }
        else{   echo "<td>" . $value . "</td>";}
   
    }
    echo '<td> <button id="change">Change Status</button></td>';
    // $option = new WC_Order($option);

    // if (!empty($option)) {
    //     $option->update_status( 'fulfilled' );
    // }

    // $option = new WC_Order($option);

    // if (empty($option)) {
    //     $option->update_status( 'pending' );
    // }

    // $option = new WC_Order($option);

    // if (empty($option)) {
    //     $option->update_status( 'pending' );
    // }
    echo "<td> <button onclick='delete(event)'>Cancel</button></td>";

    echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>

<?php include 'footer.inc';?>


