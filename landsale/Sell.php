<?php
	include("config.php");

	if(isset($_POST['submit'])){
		$Fullname = $_POST['Fname'];
		$Telephone = $_POST['Tnumber'];
		$Email = $_POST['Email'];
		$Mobile = $_POST['Mnumber'];
		$Lname = $_POST['Lname'];
		$Address = $_POST['Address'];
		$Description = $_POST['Description'];
		$City = $_POST['City'];
		$Price = $_POST['Price'];

		// Check if an image was uploaded
		if(isset($_FILES['Images']) && $_FILES['Images']['size'] > 0){
			$imageTmpPath = $_FILES['Images']['tmp_name'];

			// Read the image file
			$imageData = file_get_contents($imageTmpPath);

			if($imageData !== false){
				// Escape special characters in the image data
				$escapedImageData = $conn->real_escape_string($imageData);

				$sql = "INSERT INTO land (Fullname, Telephone, Email, Mobile, LName, Address, Description, City, Price, Images) VALUES ('$Fullname', '$Telephone', '$Email', '$Mobile', '$Lname', '$Address', '$Description', '$City', '$Price', '$escapedImageData')";
				if($conn->query($sql) === true){
					echo "<script>alert('Details are successfully inserted');</script>";

				}
				else{
					echo "<script>alert('Error:'.$conn->error);</script>";
				}
			}
			else{
				echo "<script>alert('Failed to read the image file.');</script>";
			}
		}
		else{
			echo "<script>alert('No image uploaded.');</script>";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<title>Ceylonland co</title>
	<link rel="icon" href="logo.png">
	<link rel="stylesheet" href="project001.css">
</head>
<body>
	<header>
		<a href="Home.html"><img src="logo/logo.png" width="200px" height="100px"></a>
		<a><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a>
	</header>

	<div class="navbar">
		<a href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
		<a href="Aboutus.html">About us</a>
		<a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
		<a href="Register.php">Register</a>
		<a href="Lands.html">Lands</a>
		<a class="active" href="Sell.php">Sell Your Lands</a>

		<div class="search">
			<a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
		</div>
	</div>

	<hr>

	<form method="post" enctype="multipart/form-data">
		<div class="continfo">
			<div class="continline">
				<h2>CONTACT INFORMATION</h2>
				<div class="conta">Full name</div>
				<input type="text" name="Fname" placeholder="Full name">
				<div class="conta">Telephone number</div>
				<input type="text" name="Tnumber" placeholder="Telephone number">
			</div>
			<div class="continline">
				<div class="conta">Email</div>
				<input type="email" name="Email" placeholder="ceylonlands@gmail.com">
				<div class="conta">Mobile number</div>
				<input type="text" name="Mnumber" placeholder="Mobile number">
			</div>
		</div>

		<div class="landinfo">
			<h2>LAND INFORMATION</h2>
			<div class="conta">Land Name</div>
			<input type="text" name="Lname" placeholder="Land Name">
			<div class="conta">Land Address</div>
			<textarea name="Address" placeholder="Address" rows="4" cols="68" style="border: none;
				border-bottom: 1px solid #fff;
				background: transparent;
				outline: none;
				margin-right: 40px;
				margin-bottom:20px;
				color: #000;
				font-size: 16px;
				border-radius:5px;
				box-shadow: 0 3px 10px rgba(0,0,0,0.3);"></textarea>
			<div class="conta">Description</div>
			<textarea name="Description" placeholder="Description" rows="8" cols="68" style="border: none;
				border-bottom: 1px solid #fff;
				background: transparent;
				outline: none;
				margin-right: 40px;
				margin-bottom:20px;
				color: #000;
				font-size: 16px;
				border-radius:5px;
				box-shadow: 0 3px 10px rgba(0,0,0,0.3);"></textarea>
			<div class="conta">City</div>
			<input type="text" name="City" placeholder="City">
			<div class="conta">Price (per perch)</div>
			<input type="text" name="Price" placeholder="Price (per perch)">
			<div class="conta">Attach the land image(requird*)</div>
			<input type="file" name="Images">

			<input type='submit' name='submit' value='Submit' style="width:610px; height:30px;margin-bottom:10px; font-size:20px;">

		</div>
	</form>

	<div class="footer-container">
		<div class="flex">
			<div class="inline">
				<b>Corporate Head Office</b>
				<p>New kandy Rd, Malabe.</p>
				<p>+94 117 336 761</p>
				<p>+94 117 823 613</p>
			</div>
			<div class="inline">
				<b>Kurunagala Office</b>
				<p>Lake Round, Kurunagala.</p>
				<p>+94 117 336 761</p>
				<p>+94 117 511 722</p>
			</div>
			<div class="inline">
				<b>Galle Office</b>
				<p>Lake Round, Kurunagala.</p>
				<p>+94 117 336 761</p>
				<p>+94 117 511 722</p>
			</div>
			<div class="inline">
				<b>Hot Lines</b>
				<p>+94 777 335 171</p>
				<p>+94 777 415 256</p>
				<p>+94 777 221 580</p>
			</div>
		</div>
	</div>
	<div class="bottomfooter">
		<div class="footertcenter">
			<a>© Ceylon Lands & Co - All right reserved</a>
		</div>
	</div>
</body>
</html>