<?php 
include("config.php");

session_start();

if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];
    $sql = "SELECT * FROM register WHERE ID=$x";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['ID'];
            $firstname = $row['First_Name'];
            $lastname = $row['Last_Name'];
            $email = $row['Email'];
            $password = $row['Password'];
        }
    }
}

if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE register SET ID='$id', First_Name='$firstname', Last_Name='$lastname', Email='$email', Password='$password' WHERE ID='$id'";
    if ($conn->query($sql) === true) {
        header("location:userdetails.php");
        echo "Data updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<html>
<head>
    <title>Update User</title>
    <link rel="icon" href="logo.png">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1
        {
            text-align: center;
        }
        
        .loginbox {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .loginbox h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        td {
            padding: 10px;
        }
        
        input[type="submit"] {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            border: none;
            background-color: #009579;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        input[type="text"],input[type="password"] {
            display: block;
            text-align: center;
            padding: 10px 20px;
            border: none;
            color: black;
            text-decoration: none;
            font-weight: bold;
        }
        
        button a {
            color: #fff;
            text-decoration: none;
        }
        
        .input-with-icon {
            display: flex;
            align-items: center;
        }
        
    
    </style>
</head>
<body bgcolor="#B6B6B4">
    <form action="edituser.php" method="POST">
        <div class="loginbox">
            <h1>Update User Information</h1>
            <table>
                <tr>
                    <td><p>ID</p></td>
                    <td><input type="text" name="id" value="<?php echo $id ?>" readonly size="30"></td>
                </tr>
                <tr>
                    <td><p>First Name</p></td>
                    <td class="input-with-icon">
                        <input type="text" name="firstname" value="<?php echo $firstname ?>" size="30">
                        <ion-icon name="create-outline"></ion-icon>
                    </td>
                </tr>
                <tr>
                    <td><p>Last Name</p></td>
                    <td class="input-with-icon">
                        <input type="text" name="lastname" value="<?php echo $lastname ?>" size="30">
                        <ion-icon name="create-outline"></ion-icon>
                    </td>
                </tr>
                <tr>
                    <td><p>Email</p></td>
                    <td class="input-with-icon">
                        <input type="text" name="email" value="<?php echo $email ?>" size="30">
                        <ion-icon name="create-outline"></ion-icon>
                    </td>
                </tr>
                <tr>
                    <td><p>Password</p></td>
                    <td>
                        <input type="password" name="password" value="<?php echo $password ?>" readonly size="30">
                        <a href="Forgot.html">Change the password</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Update"></td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
