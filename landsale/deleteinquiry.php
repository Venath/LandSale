<?php
include("config.php");
session_start();

if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];

    // Retrieve first and last name from the register table
    $registerQuery = "SELECT first_name, last_name FROM register WHERE ID = $x";
    $registerResult = mysqli_query($conn, $registerQuery);
    if ($registerResult && mysqli_num_rows($registerResult) > 0) {
        $registerRow = mysqli_fetch_assoc($registerResult);
        $firstName = $registerRow['first_name'];
        $lastName = $registerRow['last_name'];

        // Concatenate first and last name to form fullname
        $fullname = $firstName . ' ' . $lastName;

        // Delete the record from the inquiry table using fullname
        $deletei = "DELETE FROM inquiries WHERE Fullname = '$fullname'";
        $deleteiResult = mysqli_query($conn, $deletei);
        if ($deleteiResult) {
            // Additional actions after successful deletion
            echo "<script>alert('Inquiry deleted successfully from the website.'); window.location.href = 'userdetails.php';</script>";
        } else {
            echo "Error deleting Inquiry from the website: " . $conn->error;
        }
    } else {
        echo "No record found for ID: $x in the website";
    }
}
?>
