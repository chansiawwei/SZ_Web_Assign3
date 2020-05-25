<!DOCTYPE html>
<!-- get header ('Page Name'. 'Title')-->
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Assignment 1" />
		<meta name="author" content="ChanSiawZheng" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Headphone Product Selection</title>
		<link rel="icon" href="images/logo.jfif" type="image/x-icon" />

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="styles/header-mobile.css" />
		<link rel="stylesheet" href="styles/product.css" />
	</head>
	
	<body>
	<?php include 'header.inc';?>
<!--Header End-->
	
	<div class="directory">
		<div class="container">
			<a href="index.html">Home </a>/
			<a href="product.html">Product </a>

		</div>
	</div>
	
	<div class="parallax1"></div>
	
	<div class="related-items">
		<div class="container" >
			<h2>---Headphone Selection---</h2>
			<div class="items">
				<div class="productcolumn">
					<a href="product-1-HeadphoneStyle.html">
					<div class="w3-content w3-display-container" style="max-width:800px">
						<img class="center" src="images/headphone1.jpg" alt="HeadPhone Style 1" />
						<img class="top" src="images/headphone2.jpg" alt="HeadPhone Style 2" />
						<img class="top" src="images/headphone3.jpg" alt="HeadPhone Style 3" />
					</div>
					<h4>--Headphone Styles--</h4>
					</a>
					<ol>
						<li><a href="product-1-HeadphoneStyle.html" class="ol">Wireless On-Ear Headphones</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
						<li><a href="product-1.2-HeadphoneStyle2.html" class="ol">Beats EP On-Ear Headphones</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
						<li><a href="product-1.3-HeadphoneStyle3.html" class="ol">HX-HPEM02 Jamoji On-Ear Wired Headphones</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
					</ol>
					<p class="price">
					<a href="enquire.html">Enquiry For Price</a>
					<br />	
					</p>
					<button type="button" onclick="window.location.href='product-1-HeadphoneStyle.html'" >More Info</button>
				</div>
				<div class="productcolumn">
					<a href="product-2-AirpodStyle.html">
					<div class="w3-content w3-display-container" style="max-width:800px">
						<img class="center" src="images/airpod1.jpg" alt="Airpod Style 1" />
						<img class="top" src="images/airpod2.png" alt="Airpod Style 2" />
						<img class="top" src="images/airpod3.jpeg" alt="Airpod Style 3" />
					</div>
					<h4>--Airpod Styles--</h4>
					</a>
					<ol>
						<li><a href="product-2-AirpodStyle.html" class="ol">Wireless Charging Case for AirPods</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
						<li><a href="product-2.2-AirpodStyle2.html" class="ol">BlackPods New Generation 5.0</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
						<li><a href="product-2.3-AirpodStyle3.html" class="ol" >The New Wireless Bluetooth AirPlus</a></li>
						<ul>
							<li>WORK WITH MOST OF THE SMART DEVICES</li>
							<li>CHARGE BY LIGHTING</li>
							<li>SIMPLE CONNECTION METHOD</li>
						</ul>
					</ol>
					<p class="price">
					<a href="enquire.html">Enquiry For Price</a>
					<br />	
					</p>
					<button type="button" onclick="window.location.href='product-2-AirpodStyle.html'">More Info</button>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="parallax2"></div>
	<!--Footer-->	
	<?php include 'footer.inc';?>
 <!-- End footer section -->	
	</body> 
	</html>