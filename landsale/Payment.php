<?php
include ("config.php");
if (isset($_POST['submit'])) 
{
$fullname = $_POST['fullname'];
$email     = $_POST['email'];
$address  = $_POST['address'];
$city  = $_POST['city'];
$state  = $_POST['state'];
$zipcode  = $_POST['zipcode'];
$cardholdername  = $_POST['cardholdername'];
$creditcardnumber  = $_POST['creditcardnumber'];
$expmonth  = $_POST['expmonth'];
$expyear      = $_POST['expyear'];
$cvv  = $_POST['cvv'];

$sql = "INSERT INTO payment_details (Full_Name, Email, Address, City, Cardholder_Name, Credit_Card_Number, Exp_Month, State, zip_Code, Exp_Year, CVV) VALUES ('$fullname', '$email', '$address', '$city', '$cardholdername', '$creditcardnumber', '$expmonth', '$state', '$zipcode', '$expyear', '$cvv')";
if ($conn->query($sql) === true)
{
       echo "<script>alert('Payment Successful'); window.location.href = 'home.php';</script>";

}
else 
    {
    echo "Error: " . $conn->error;
    }
}


?>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="Payment.css">
</head>
<body>
    <div class="container">

        <form method="POST">
            <div class="box">
                <div class="row1">
                    <h><b>BILLING ADDRESS</b></h>
                    <div class="inputbox">
                        <span>Full Name</span>
                        <input type="text" placeholder="peter" name="fullname" />
                    </div>

                    <div class="inputbox">
                        <span>Email</span>
                        <input type="text" placeholder="abc@bhb@.kl" name="email" />
                    </div>

                    <div class="inputbox">
                        <span>Address</span>
                        <input type="text" placeholder="Street" name="address"/>
                    </div>

                    <div class="inputbox">
                        <span>City</span>
                        <input type="text" placeholder="Colombo" name="city"/>
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>State</span>
                            <input type="text" placeholder="Sri Lanka" name="state"/>
                        </div>


                        <div class="inputbox">
                            <span>Zip Code</span>
                            <input type="text" placeholder="123 456" name="zipcode" />
                        </div>
                    </div>
                </div>

                <div class="row2">
                    <h><b>PAYMENT</b></h>
                    <div class="inputbox">
                        <span>Accepted Cards</span>
                        <img src="card.png" style="height: 70px; margin-bottom: -33px;" />
                    </div>

                    <div class="inputbox">
                        <span>Cardholder Name</span>
                        <input type="text" placeholder="Mr Abesekara" name="cardholdername" />
                    </div>

                    <div class="inputbox">
                        <span>Credit Card Number</span>
                        <input type="text" placeholder="1111-2222-3333-4444" name="creditcardnumber"/>
                    </div>

                    <div class="inputbox">
                        <span>Exp Month</span>
                        <input type="text" placeholder="January" name="expmonth"/>
                    </div>
                    <div class="flex">
                        <div class="inputbox">
                            <span>Exp Year</span>
                            <input type="text" placeholder="2025" name="expyear"/>
                        </div>

                        <div class="inputbox">
                            <span>CVV</span>
                            <input type="text" placeholder="123" name="cvv"/>

                        </div>



                    </div>
                    <br>
                      <span style="margin-left:-50%;">Amount</span>
                    <input type="text" placeholder="100 000 RS" name="cvv"/>

                </div>

                <div class="submit-btn">

                    <input type="submit" value="Proceed To Checkout" name="submit">

                </div>

            </div>

    </div>
     
    </form>

</body>
</html>

