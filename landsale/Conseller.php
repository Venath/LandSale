<?
    include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Ceylonland co</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="project001.css">
    <link rel="stylesheet" href="land.css">
</head>
<body>

    <header>
        <a href="Home.html"><img src="logo/logo.png" width="200px" height="100px"></a>
        <a><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a>
    </header>

    <div class="navbar">
        <a href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
        <a href="Aboutus.html">About us</a>
        <a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
        <a href="Register.html">Register</a>
        <a class="active" href="Lands.html">Lands</a>
        <a href="Sell.php">Sell Your Lands</a>

        <div class="search">
            <a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
        </div>
    </div>

    <hr>

    <form method="POST" action="">
        <input type="text" name="search">
        <input type="submit" name="submit" value="Submit">
        <?php
        
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];

        if ($search === '') {
            // Redirect to Lands.html
            header("Location: Lands.html");
            exit;
        }

        $sql = "SELECT * FROM land WHERE LName = '$search'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display land details
                echo "<br>"."Seller name: " . $row['Fullname'] . "<br>";
                echo "Seller email: " . $row['Email'] . "<br>";
                echo "Mobile number: " . $row['Mobile']  . "<br>";
                echo "Telephone number: " . $row['Telephone']  . "<br>";
                // Add more fields as needed

                echo "<hr>";
            }
        } else {
            echo "No lands found.";
        }
    }
    ?>
    </form>

    <div class="footer-container">
        <div class="flex">
            <div class="inline">
                <b>Corporate Head Office</b>
                <p>New Kandy Rd, Malabe.</p>
                <p>+94 117 336 761</p>
                <p>+94 117 823 613</p>
            </div>
            <div class="inline">
                <b>Kurunagala Office</b>
                <p>Lake Round, Kurunagala.</p>
                <p>+94 117 336 761</p>
                <p>+94 117 511 722</p>
            </div>
            <div class="inline">
                <b>Galle Office</b>
                <p>Lake Round, Kurunagala.</p>
                <p>+94 912 224 398</p>
                <p>+94 912 483 911</p>
            </div>
            <div class="inline">
                <b>Hot Lines</b>
                <p>+94 777 335 171</p>
                <p>+94 777 415 256</p>
                <p>+94 777 221 580</p>
            </div>
        </div>
    </div>
    <div class="bottomfooter">
        <div class="footertcenter">
            <a>© Ceylon Lands &Co - All rights reserved</a>
        </div>
    </div>

</body>
</html>
