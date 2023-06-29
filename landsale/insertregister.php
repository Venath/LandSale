<?php
include 'config.php';



$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$user      = $_POST['bs'];

// Sanitize and validate the data (optional)
if($user=="seller")
{
    // Insert data into the database
    $sql = "INSERT INTO register (First_Name,Last_Name,Email,Password,user_type) VALUES ('$firstname', '$lastname','$email','$password','$user')";
    if ($conn->query($sql) === true)
    {header("location:login.html"); 
     echo "Data inserted successfully";
    } else 
    {
    echo "Error: " . $conn->error;
    }

}

elseif($user=="buyer")
{
    // Insert data into the database
    $sql = "INSERT INTO register (First_Name,Last_Name,Email,Password,user_type) VALUES ('$firstname', '$lastname','$email','$password','$user')";
    if ($conn->query($sql) === true)
    {header("location:login.html"); 
     echo "Data inserted successfully";
    } else 
    {
    echo "Error: " . $conn->error;
    }

}

else
{
   echo "<script>alert('Please check Buyer or Seller'); window.location.href = 'Register.php';</script>";

}


// Connection successful
echo "Connected successfully";


// Perform database operations here

// Close the connection

$conn->close();
?>


