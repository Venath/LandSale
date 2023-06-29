<?php
include("config.php");

session_start();

if (isset($_SESSION["id"])) {
    $x = $_SESSION["id"];
      $sql = "SELECT * FROM register WHERE ID=$x && (user_type='seller' or user_type='buyer')";
    $result = mysqli_query($conn, $sql);
    $table = '<table border="1">';
    $table .= '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>E-Mail</th><th>Password</th><th>Type</th></tr>';

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $table .= '<tr>';
            $table .= '<td>' . $row['ID'] . '</td>';
            $table .= '<td>' . $row['First_Name'] . '</td>';
            $table .= '<td>' . $row['Last_Name'] . '</td>';
            $table .= '<td>' . $row['Email'] . '</td>';
            $table .= '<td>' . str_repeat('*', strlen($row['Password'])) . '</td>';
            $table .= '<td>' . $row['user_type'] . '</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';
    }
}

 else
{
   echo "<script>alert('You do not have an account'); window.location.href = 'home.php';</script>";

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <link rel="icon" href="logo.png">
    
      <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .userdata {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .userdata h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .userdata table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .userdata table th,
        .userdata table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .userdata table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .userdata table td:last-child {
            text-align: center;
        }

        .userdata button {
            color: #fff;
            background-color: #009579;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .userdata button a {
            color: #fff;
            text-decoration: none;
        }

        .userdata button:last-child {
            margin-left: 10px;
        }
    </style>

</head>
<body>


    <div class="userdata">
        <h1>User Information</h1>

        <?php echo $table; ?>
        
        <button style="color:#fff; background: #009579;"><a href="edituser.php">Edit Details</a></button>
        <!--<button> <a href="delete.php">Delete Account</a></button>-->

         <!-- Confirmation box for deleting the account -->
        <button onclick="confirmDelete()" style="color:#fff; background: #009579;">Delete Account</button>
        
        <script>
            function confirmDelete() {
                if (confirm('Are you sure you want to delete your account?')) {
                    // Redirect to the delete.php page or perform the deletion logic here
                    window.location.href = 'delete.php';
                }
            }
        </script>
        <button style="color:#fff; background: #009579;"><a href="home.php">Home</a></button>

        <table style="width:95%;margin-top:60px;">
        <tr>
            <th>Land Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php
        // Retrieve all data from the land table
        $sql = "SELECT land.* FROM land
        INNER JOIN register ON land.Fullname = CONCAT(register.First_Name, ' ', register.Last_Name)
        WHERE register.ID = $x";
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
                    echo "<a href ='editlands.php'><button style='width:auto; height:auto; padding:3px; margin:-10px '>Update</button></a>";
                    echo "<a href ='deleteland.php'><button style='width:auto; height:auto; padding:3px; margin:-10px 20px'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>.<br>";
                }
            } else {
                echo "<tr><td colspan='5'>No lands found.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Query failed: " . mysqli_error($conn) . "</td></tr>";
        }
        ?>
   <table style="width:95%;margin-top:60px;">
         <tr>
            <th>inquiry</th>
            <th>Action</th>
        </tr>

        <?php
        // Retrieve all data from the land table
        $sql = "SELECT inquiries.* FROM inquiries
        INNER JOIN register ON inquiries.Fullname = CONCAT(register.First_Name, ' ', register.Last_Name)
        WHERE register.ID = $x";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display land details in table rows
                    echo "<tr>";
                   
                    echo "<td>" . $row['Inquiry'] . "</td>";
                    echo "<td>";
                    echo "<a href ='deleteinquiry.php'><button style='width:auto; height:auto; padding:3px; margin:-10px 20px'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>.<br>";
                }
            } else {
                echo "<tr><td colspan='5'>No inquiries found.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Query failed: " . mysqli_error($conn) . "</td></tr>";
        }
        ?>
    </table>
 
    </div>

</body>

</html>

