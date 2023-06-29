<?php
include('config.php');

if(isset($_POST['submit'])){
	$type=$_POST['inqtype'];
	$fname=$_POST['fullname'];
	$email=$_POST['email'];
	$inquiry=$_POST['inquiry'];

	$sql = "INSERT INTO inquiries (Inquiry_type, Fullname, Email, Inquiry) VALUES ('$type', '$fname', '$email', '$inquiry')";

	if($conn->query($sql) === true){
		echo "<script>alert('Inquiry successfully submitted.');</script>";
	} else{
		echo "Error: " . $sql . "<br>" . $conn->error;
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
		<a href="home.php"><img src="logo/logo.png" width="200px" height="100px"></a>
		<a><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a> 
	</header>

	<div class="navbar">
		<a href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
		<a href="Aboutus.html">About us</a>
		<a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
		<a href="Register.php">Register</a>
		<a href="Lands.html">Lands</a>
		<a href="Sellsession.php">Sell Your Lands</a>
		<a class="active" href="Feedback.php">Feedbacks</a>

		<div class="search">
			<a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
		</div>
	</div>

	<hr>

	<form method="post">
		<div class="continfo">
			<div class="continline">
				<h2>FEEDBACK</h2>

				<label for="inqtype">Inquiry type</label>
				<select id="inqtype" name="inqtype" style="width:610px; height:30px;">
					<option value="">Select Option</option>
					<option value="About Land">About Land</option>
					<option value="About Prices">About Prices</option>
					<option value="About Website">About Website</option>
				</select><br><br>

				<div class="conta">Full name</div>
				<input type="text" name="fullname" placeholder="Full name" style="width:610px; height:30px;">

				<div class="conta">Email</div>
				<input type="Email" name="email" placeholder="ceylonlands@gmail.com" style="width:610px; height:30px;">

				<div class="conta">Inquiry</div>
				<textarea name="inquiry" placeholder="Your Feedback" rows="8" cols="67" style="border: none;
					border-bottom: 1px solid #fff;
					background: transparent;
					outline: none;
					margin-right: 40px;
					margin-bottom: 20px;
					color: #000;
					font-size: 16px;
					border-radius: 5px;
					box-shadow: 0 3px 10px rgba(0,0,0,0.3);"></textarea>

				<input type="submit" name="submit" value="Submit" style="width:610px; height:30px;margin-bottom:10px; font-size:20px;">
			</div>
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
			<a>© Ceylon Lands &Co - All right reserved</a>
		</div>
	</div>

</body>
</html>
