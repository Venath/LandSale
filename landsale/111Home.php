<?php 
include("config.php");
 
session_start();
if(isset($_session['First_Name']))
{	echo "fghgfhbgt";

	echo "<script>alert('You have to login);window.location.href = 'Payment.html';</script>";
}

else
{
echo "fdfff";
 echo "<script>alert('You have to login); window.location.href = 'Login.html';</script>";

}	

?>