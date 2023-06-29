<?php
include("config.php");
session_start();

if (isset($_SESSION['id']))
{
    
$x=$_SESSION["id"];

 $query = "SELECT ID FROM register WHERE ID=$x AND user_type='seller';";
  
    $result = $conn->query($query);

    if ($result->num_rows > 0) 
    {
      header("Location:sell.php");
        
    }
    else
{
   echo "<script>alert('You are not a seller'); window.location.href = 'home.php';</script>";

}

}

else
{
         

   echo "<script>alert('You are not a seller'); window.location.href = 'home.php';</script>";

}

?>
