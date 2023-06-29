<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="Searchscript.js"></script>
  <title>Land Sale</title>
  <link rel="icon" href="logo.png">
  <link rel="stylesheet" href="project001.css">
  <link rel="stylesheet" type="text/css" href="Searchstyle.css">
</head>
<body>
  <div class="header">
    <a href="home.php"><img src="logo/logo.png" width="200px" height="100px"></a>
    <a><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a> 
  </div>
  <div class="navbar">
    <a href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
    <a href="Aboutus.html">About us</a>
    <a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
    <a href="Register.php">Register</a>
    <a href="Lands.html">Lands</a>
    <a href="Sell.php">Sell Your Lands</a>
     <a href="faq.php">Faq</a>

    <div class="search">
      <a class="active" href="Search.html"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
    </div>
  </div>
  <hr>
  <form method="post">
    <header>
      <h1>Land Selling Site - Filter Page</h1>
    </header>
    <main>
      <div class="filter-container">
        <h2>Filter By:</h2>
        <label for="location">Location:</label>
        <select id="location" name="location">
          <option value="all">All</option>
          <option value="Gampaha">Gampaha</option>
          <option value="Homagama">Homagama</option>
          <option value="Kegalla">Kegalla</option>
		  <option value="Mathale">Mathale</option>
		  <option value="Godagama">Godagama</option>
        </select>
        <label for="price">Price ranges:</label>
        <select id="price" name="price">
          <option value="all">All</option>
          <option value="more-than-500000">More than 500000</option>
          <option value="less-than-500000">Less than 500000</option>
          <option value="less-than-300000">Less than 300000</option>
          <option value="less-than-200000">Less than 200000</option>
        </select>
        <input type='submit' name='submit' value='Filter'>
      </div>
      <div class="land-container">
        <h2>Land Listings:</h2>
		<hr>

        <?php
        if (isset($_POST['submit'])) {
          $location = $_POST['location'];
          $price = $_POST['price'];

          if ($location === 'all' && $price === 'all') {
            // Redirect to Lands.html
            header("Location: Lands.html");
          }

          $priceCondition = '';

          switch ($price) {
            case 'more-than-500000':
              $priceCondition = "Price > 500000";
              break;
            case 'less-than-500000':
              $priceCondition = "Price < 500000";
              break;
            case 'less-than-300000':
              $priceCondition = "Price < 300000";
              break;
            case 'less-than-200000':
              $priceCondition = "Price < 200000";
              break;
            case 'all':
            default:
              // No price condition specified
              break;
          }

          $sql = "SELECT * FROM landsale.land WHERE City = '$location'";
  
          if (!empty($priceCondition)) {
            $sql .= " AND $priceCondition";
          }

          $result = mysqli_query($conn, $sql);

          if ($result) {
            $num = mysqli_num_rows($result);

            if ($num > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                // Display land details
                //echo "<a href='land_details.html?City=" . $row['City'] . "'>";
                echo "Land name: " . $row['LName'] . "<br>";
                echo "Land address: " . $row['Address'] . "<br>";
                echo "Price: " . $row['Price'] ." LKR" . "<br>";
                // Add more fields as needed

                echo "<hr>";
              }
            } else {
              echo "No lands found.";
            }
          } else {
            echo "Query failed.";
          }
        }
        ?>
      </div>
    </main>
  </form>
</body>
</html>