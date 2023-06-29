<?php 
include("config.php");

session_start();

if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];
    $sql = "DELETE  FROM register WHERE ID=$x";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        session_destroy();
      echo "<script>alert('Deleted'); window.location.href = 'home.php';</script>";

        }
    }
    else {
	echo "Error: " . $conn->error;
}



?>
