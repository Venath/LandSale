<?php
session_start();
if (isset($_SESSION["id"])) {
   echo "<script>alert('You are already logged in'); window.location.href = 'home.php';</script>";
   
    exit; // Stop further execution
}
?>

<html>
<head>
    <title>Login Form Design</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
</head>
<body>
    <div class="loginbox">
        <img src="logo.png" class="avatar">
        <h1>Create an account</h1>
        <!--Form-->
        <form action="insertregister.php" method="POST">
            <div class="flex">
                <p><input type="radio" name="bs" value="seller"></p>
                <p style="margin-left:25px;">Seller</p>

                <p><input type="radio" name="bs" value="buyer"></p>
                <p style="margin-left:25px">Buyer</p>
            </div>

            <p><input type="text" name="firstname" placeholder="First name*(username)"></p>
            <p><input type="text" name="lastname" placeholder="Last name*"></p>
            <p><input type="email" name="email" placeholder="Email*"></p>
            <p><input type="password" name="password" placeholder="Create Password*"></p>

            <div class="pwdformat">
                <p>Password must contain at least 8 characters</p>
                <p>Password must contain at least 1 uppercase letter</p>
                <p>Password must contain at least 1 lowercase letter</p>
                <p>Password must contain at least 1 number</p>
            </div>

            <input type="submit" value="Signup">
        </form>
    </div>
</body>
</html>
