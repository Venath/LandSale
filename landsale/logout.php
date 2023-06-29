<?php
session_start();
//echo $_SESSION["First_Name"];
if(isset($_SESSION["id"]))
{
	session_destroy();
	//echo"Logged out";
	echo "<script>alert('Logget out');window.location.href = 'home.php';</script>";
}
else{
	//echo"hhhh";
		echo "<script>alert('You are not logged in');window.location.href = 'login.html';</script>";

}

?>