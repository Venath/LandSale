<?php
include('config.php');
session_start();

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $question = $_POST['question'] ?? '';

    // Insert data into the database
    $sql = "INSERT INTO faq (fullname, email, question) VALUES ('$fullname', '$email', '$question')";
    if ($conn->query($sql) === true) {
        header("location: faq.php");
        echo "Data inserted successfully";
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

        // Retrieve question from the faq table
        $faqQuery = "SELECT fullname, question FROM faq where fullname='$fullname'";
        $faqResult = mysqli_query($conn, $faqQuery);
        if ($faqResult && mysqli_num_rows($faqResult) > 0) {
            $faqRow = mysqli_fetch_assoc($faqResult);
            $question = $faqRow['question'];
        } else {
            // Handle the case where no matching record is found
            echo "<script>alert('No Questions found for Full Name: $fullname')</script>";
        }
    }
}
else {
    // Handle the case where no matching record is found in the register table
    echo "";
}
?>

<!DOCTYPE html>
<html>
    <head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <title> FAQs</title>
        <link rel="stylesheet" type="text/css" href= "faq.css">
        <link rel="icon" href="logo.png">
     <link rel="stylesheet" href="project001.css">
        <style>
        table {
            width: 80%;
        }

        td {
            padding: 0 0 8px;
        }
    </style>

    </head>
    <body>
    <header>
        <a href="home.php"><img src="logo/logo.png" width="200px" height="100px"></a>
        <a><img src="user.png" width="60px" height="60px" style="float:right; margin:20px 20px"></a>
    </header>

    <div class="navbar">
        <a href="home.php"><ion-icon name="home-outline"></ion-icon>Home</a>
        <a href="Aboutus.html">About us</a>
        <a href="Login.html"><ion-icon name="log-in-outline"></ion-icon>Login</a>
        <a href="Register.php">Register</a>
        <a href="Lands.html">Lands</a>
        <a class="active" href="Sell.html">Sell Your Lands</a>

        <div class="search">
            <a href="Search.php"><ion-icon name="search-outline"></ion-icon>Search for your land</a>
        </div>
    </div>

    <hr>
        <h2 class = "title">FAQs</h2>
        <div class = "para">
        <p>Welcome to the FAQ section about all our real estate solutions. 
            You can find answers to some of the most frequently asked questions 
            regarding documentation, land investment, and the land buying process 
            in Sri Lanka right here.
        </p>
        </div>
    <hr/>

    <center>
        <div class= "accordion">
            <div class= "contentBx">
                <div class= "label">How to buy land in Sri Lanka?</div>
                <div class= "content">
                    <p> Pay the stamp duty charges and register the deed in the relevant 
                        land registry in Sri Lanka. After your deed has been registered,
                        make sure to get a copy of the original certificate. If you have 
                        purchased the said land using a bank loan, you will have to hand over 
                        the deed to the bank as a security for your loan.</p>
                </div>
            </div>
        </div>



        <div class="accordion">
            <div class="contentBx">
                <div class="label">How many perches are in an acer in Sri Lanka?</div>
                <div class="content">
                    <p> 1 Acre = 160 Perches = 4 Roods = 4000 Sqm. 1 Perch = 25 Sqm
                    </p>
                </div>
            </div>
        </div>



        <div class="accordion">
            <div class="contentBx">
                <div class="label">What are the documents required to buy a land?</div>
                <div class="content">
                    <p>Title Deed of the Land, Approved Lot Plan of the Land, Certificate of Ownership, 
                        Non-Vesting Certificate, Street Line Certification, Extracts of the Land, Valuation.</p>
                </div>
            </div>
        </div>



        <div class="accordion">
            <div class="contentBx">
                <div class="label">How do I get start with your service?</div>
                <div class="content">
                    <p> You can get started by contacting us through our website or by phone. When you contact us 
                        through website, you need to register as a user.There you need to provide your name, 
                        contact details and address. Then we will schedule a consultation to discuss your real 
                        estate needs and develop a customized solution that meets your objectives.</p>
                </div>
            </div>
        </div>




        <div class="accordion">
            <div class="contentBx">
                <div class="label">What should I know before investing in land?</div>
                <div class="content">
                    <p> Know what to look out for in raw land, Prepare for a trickier loan process, 
                        Plan for a long turnaround time on your investment, Prepare for additional expenses, 
                        Remember to factor in taxes, Look out for easements on your property
                    </p>
                </div>
            </div>
        </div>




        <div class="accordion">
            <div class="contentBx">
                <div class="label">Is investing in land profitable?</div>
                <div class="content">
                    <p> The past few years, demand for land as an investment has experienced an uptick. 
                        From 2020 to 2021, there has been an increase of 155% in rural land sales. This 
                        growth is due to the stability that comes with purchasing a piece of land
                    </p>
                </div>
            </div>
        </div>


    <script>
        const accordion = document.getElementsByClassName ('contentBx');
        for(i=0; i<accordion.length; i++){
            accordion[i].addEventListener('click',function(){
                this.classList.toggle('active')
            })
        }
    </script>
    <form action="faq.php" method="post">
    <div class="conta">Full name</div>
    <input type="text" name="fullname" placeholder="Full name" style="width:760px; height:40px;">
    <div class="conta">Email</div>
    <input type="email" name="email" placeholder="email@gmail.com" style="width:760px; height:40px;"><br>
    <div class="conta">Question</div>
    <input type="text" name="question" placeholder="Question" style="width:760px; height:40px;"><br>
    <input type="submit" name="submit" value="Submit" style="width:610px; height:30px;margin-top:20px; font-size:20px;">
</form>
<table>
        <tr>
            <th>Fulll Name</th>
            <th>Other Questions</th>
            <th>Actions</th>
        </tr>
<?php  
        // Retrieve all data from the land table
        $sql = "SELECT fullname, question FROM faq WHERE fullname='$fullname'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Display land details in table rows
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['question'] . "</td>";
                    echo "<td>";
                    echo "<a href='faqupdate.php'><button style='width:auto; height:auto; padding:3px; margin:-10px 20px'>Update</button></a>";
                    echo "<a href='faqdelete.php'><button style='width:auto; height:auto; padding:3px; margin:-10px 90px'>Delete</button></a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No questions found.</td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Query failed: " . mysqli_error($conn) . "</td></tr>";
        }
        ?>

    </center>
    </body>
</html>