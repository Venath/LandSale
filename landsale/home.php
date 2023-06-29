<?php
include("config.php");
session_start();

if (isset($_SESSION["id"])) {

 $x = $_SESSION["id"];
 $sql = "SELECT First_Name FROM register WHERE ID=$x";
 $result = mysqli_query($conn,$sql);
 while ($row = mysqli_fetch_assoc($result)) 
 {
     $name=$row["First_Name"];
 }
?>

<!DOCTYPE html>
<html>
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Ceylonland co</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="project001.css">
</head>
<body>

    <header>
        <a href="home.php"><img src="logo/logo.png" width="200px" height="100px"></a>
        <a href="userdetails.php"><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a>
    <p> <?php echo "Welcome ".$name; ?></P>
        </header>

    <div class="navbar">
        <a class="active" href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
        <a href="Aboutus.html">About us</a>
        <a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
        <a href="Register.php">Register</a>
        <a href="Lands.html">Lands</a>
        <a href="Sellsession.php">Sell Your Lands</a>
                <a href="faq.php">FAQ</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
       
        <div class="search">
            <a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
        </div>
    </div>

    <!-- Body -->

</body>
</html>

<?php
} else {
?>

<!DOCTYPE html>
<html>
<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Ceylonland co</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="project001.css">
</head>
<body>

    <header>
        <a href="home.php"><img src="logo/logo.png" width="200px" height="100px"></a>
        <a href="userdetails.php"><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a>
    </header>

    <div class="navbar">
        <a class="active" href="Home.html"><ion-icon name="home-outline"></ion-icon>Home</a>
        <a href="Aboutus.html">About us</a>
        <a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
        <a href="Register.php">Register</a>
        <a href="Lands.html">Lands</a>
        <a href="Sellsession.php">Sell Your Lands</a>
        <a href="faq.php">FAQ</a>
        <a href="feedback.php">Feedback</a>
        <a href="logout.php">Logout</a>
     
        <div class="search">
            <a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
        </div>
    </div>

    <!--Body-->

</body>
</html>

<?php
}
?>
 <hr>

    <script src="Slideshow.js"></script>

    <img name="slide" style=" width:99.5%; height:500px; border-radius:10px; margin:10px 5px 20px 3px;" alt="Slideshow Image">

    <div class="gallery">
        <a href="Homagama.html" style="text-decoration:none">
            <img src="homagama/homagama1.jpeg">

            <div class="desc">Start from Rs.390,000/Perch</div>
            <div class="lname">GREEN EMBAZY</div>
            <div class="loc">Watareka, Homagama</div>
            <div class="size">Block size : 10.5 Perches upwords</div>
        </a>

    </div>

    <div class="gallery">
        <a href="Gampaha.html" style="text-decoration:none">
            <img src="elite destiny/destiny1.jpg">

            <div class="desc">Start from Rs.220,000/Perch</div>
            <div class="lname">ELITE DESTINY</div>
            <div class="loc">Weliweriya, Gampaha</div>
            <div class="size">Block size : 12 Perches upwords</div>
        </a>

    </div>

    <div class="gallery">
        <a href="Millaniya.html" style="text-decoration:none">
            <img src="millaniya/millaniya1.jpg">

            <div class="desc">Start from Rs.150,000/Perch</div>
            <div class="lname">LIGHT OF WISDOM</div>
            <div class="loc">Paragasthota, Millaniya</div>
            <div class="size">Block size : 13 Perches upwords</div>
        </a>

    </div>

    <div class="gallery">
        <a href="Kegalla.html" style="text-decoration:none">
            <img src="kegalla/kegalla2.jpg">

            <div class="desc">Start from Rs.230,000/Perch</div>
            <div class="lname">THE BREATHE</div>
            <div class="loc">Mawanalla, Kegalle</div>
            <div class="size">Block size : 14.4 Perches upwords</div>
        </a>

    </div>

    <div class="footer-container">
        <div class="flex">
            <div class="inline">
                <b>Corporate Head Office</b>
                <p>New kandy Rd, Malabe.</p>
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
            <a>© Ceylon Lands &Co - All right reserved</a>
        </div>
    </div>

</body>
</html>