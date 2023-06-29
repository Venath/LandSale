<?php
include("config.php");
session_start();

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $landname = $_POST['landname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $price = $_POST['Price'];

    $sql = "UPDATE land SET LName='$landname', Address='$address', City='$city', Price='$price' WHERE Fullname='$fullname'";
    if ($conn->query($sql) === true) {
        header("location:userdetails.php");
        echo "Data updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}
if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];

    // Retrieve first and last name from the register table
    $registerQuery = "SELECT first_name, last_name FROM register WHERE id = $x";
    $registerResult = mysqli_query($conn, $registerQuery);
    if ($registerResult && mysqli_num_rows($registerResult) > 0) {
        $registerRow = mysqli_fetch_assoc($registerResult);
        $firstName = $registerRow['first_name'];
        $lastName = $registerRow['last_name'];

        // Concatenate first and last name to form fullname
        $fullname = $firstName . ' ' . $lastName;

        // Retrieve land name from the land table
        $landNameQuery = "SELECT LName, City, Address, Price FROM land WHERE Fullname = '$fullname'";
        $landNameResult = mysqli_query($conn, $landNameQuery);
        if ($landNameResult && mysqli_num_rows($landNameResult) > 0) {
            $landRow = mysqli_fetch_assoc($landNameResult);
            $landname = $landRow['LName'];
            $address = $landRow['Address'];
            $city = $landRow['City'];
            $price = $landRow['Price'];
        } else {
            // Handle the case where no matching record is found
            echo "No record found for Full Name: $fullname";
        }
    } else {
        // Handle the case where no matching record is found in the register table
        echo "No record found for ID: $x in the register table";
    }
}

?>

<html>
<head>
    <title>Update User</title>
    <link rel="icon" href="logo.png">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="editl.css">
</head>
<body>
    <form action="editlands.php" method="POST">
        <div class="loginbox">
            <h1>Update User Land Information</h1>
            <table>
                <tr>
                    <td><p>Full Name</p></td>
                    <td><input type="text" name="fullname" value="<?php echo $fullname ?>" size="30" readonly></td>
                </tr> 
                <tr>
                    <td><p>Land Name</p></td>
                    <td><input type="text" name="landname" value="<?php echo $landname ?>" size="30"><ion-icon name="create-outline"></ion-icon></td>
                </tr>
                <tr>
                    <td><p>Address</p></td>
                    <td><input type="text" name="address" value="<?php echo $address ?>" size="30"><ion-icon name="create-outline"></ion-icon></td>
                </tr>
                <tr>
                    <td><p>City</p></td>
                    <td><input type="text" name="city" value="<?php echo $city ?>" size="30"><ion-icon name="create-outline"></ion-icon></td>
                </tr>
                <tr>
                    <td><p>Price</p></td>
                    <td><input type="int" name="Price" value="<?php echo $price ?>" size="30"><ion-icon name="create-outline"></ion-icon></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
