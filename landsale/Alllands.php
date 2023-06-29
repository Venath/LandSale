<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Ceylonland co</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="project001.css">
    <style>
        table {
            width: 95%;
        }

        th,
        td {
            padding: 0 0 8px;
        }
    </style>
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
        <a href="Register.php">Register</a>
        <a href="Lands.html">Lands</a>
        <a class="active" href="Sell.php">Sell Your Lands</a>

        <div class="search">
            <a href="Search.html"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
        </div>
    </div>

    <hr>

    <table>
        <tr>
            <th>Land Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php  
        // Retrieve all data from the land table
        $sql = "SELECT * FROM land";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display land details in table rows
                    echo "<tr>";
                    echo "<td>" . $row['LName'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['City'] . "</td>";
                    echo "<td>" . $row['Price'] . " LKR</td>";
                    echo "<td>";
                    echo "<a href='Paymentsession.php'><button style='width:auto; height:auto; padding:3px; margin:-10px -50px'>Pay Now</button></a>";
                    echo "<a href='Conseller.php'><button style='width:auto; height:auto; padding:3px; margin:-10px 30px'>Contact Seller</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No lands found.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Query failed: " . mysqli_error($conn) . "</td></tr>";
        }
        ?>
    </table>

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
                <p>+94 117 336 761</p>
                <p>+94 117 511 722</p>
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
            <a>© Ceylon Lands & Co - All right reserved</a>
        </div>
    </div>

    <?php
    mysqli_close($conn);
    ?>
    
</body>
</html>