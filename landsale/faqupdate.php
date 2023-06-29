<?php
include("config.php");
session_start();

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
            echo "<script>alert('No record found for Full Name: $fullname'); window.location.href = 'faq.php';</script>";
        }
    } else {
        // Handle the case where no matching record is found in the register table
        echo "<script>alert('No record found for ID: $x in the register table'); window.location.href = 'faq.php';</script>";
    }
}

if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $fullname = $_SESSION["fullname"];

    $sql = "UPDATE faq SET question='$question'";
    if (mysqli_query($conn, $sql)) {
        header("location: faq.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
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
    <form action="faqupdate.php" method="POST">
        <div class="loginbox">
            <h1>Update FAQ</h1>
            <table>
                <tr>
                    <td><p>Question</p></td>
                    <td><input type="text" name="question" value="<?php echo $question ?>" size="30"></td>
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
