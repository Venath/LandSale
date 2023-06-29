<?php
session_start();
//echo $_SESSION["First_Name"];
if(isset($_SESSION["id"]))
{	//echo "fghgfhbgt";

	echo header("Location: Payment.php");
}

else
{
//echo "fdfff";
  echo "<script>alert('Please Login'); window.location.href = 'Login.html';</script>";

// header("Location:login.html");
}

?>