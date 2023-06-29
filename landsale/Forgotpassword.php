<?php
include("config.php");

session_start();

if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];

    if (isset($_POST['submit'])) {
        $pwd1 = $_POST['password1'];
        $pwd2 = $_POST['password2'];

        if ($pwd1 == $pwd2) {
            $sql = "UPDATE register SET Password='$pwd1' WHERE ID='$x'";
            if ($conn->query($sql) === true) {
                header("location:userdetails.php");
                echo "Password updated";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    } else {
        echo "<script>alert('No matching Password'); window.location.href = 'Forgot.html';</script>";
    }
} else {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $pwd1 = $_POST['password1'];
        $pwd2 = $_POST['password2'];

        $query = "SELECT First_Name FROM register WHERE First_Name='$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            if ($pwd1 == $pwd2) {
                $sql = "UPDATE register SET Password='$pwd1' WHERE First_Name='$username'";
                if ($conn->query($sql) === true) {
                   
                    echo "Password updated";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "<script>alert('No matching Password'); window.location.href = 'Forgot.html';</script>";
            }
        } else {
            echo "User not found";
        }
    }
}
?>
