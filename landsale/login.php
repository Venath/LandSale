<?php
session_start();

if (isset($_SESSION["id"])) {
    //echo "jj";
    echo "<script>alert('You are already logged in'); window.location.href = 'home.php';</script>";
} else {
    include("config.php");

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];   
        $password = $_POST['password'];
        $query = "SELECT ID, First_Name, Password FROM register WHERE First_Name='$username' AND Password='$password'";

        $result = $conn->query($query); //Connection obj

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["id"] = $row["ID"];
                echo $_SESSION["id"];
                header("Location: home.php");
                exit;
            }
        } else {
            echo "<script>alert('Wrong Username or Password'); window.location.href = 'Login.html';</script>";
            exit;
        }
    }
}
?>
