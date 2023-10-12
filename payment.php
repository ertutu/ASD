<?php
    session_start();
    // SQL Connection
    require_once 'database_config.php';
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    // When User hit Pay now button
    if (isset($_POST['pay_now'])) {
        // Check if payment_time session is set
        if (isset($_SESSION['payment_time'])) {
            $payment_time = $_SESSION['payment_time'];
            // Assuming you have a table named 'orders' with columns: id, starters, status
            $sql = "UPDATE orders SET status='paid' WHERE time='$payment_time'";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Thank you for your payment!'); window.location.href = 'landing.php';</script>";
            }
            // Remove payment_time session
            unset($_SESSION['payment_time']);
        }
    }
    $conn->close();
?>
<html>
    <head>
        <title>Make Payment</title>
    </head>
    <style>
        body{
            margin: 0;
            text-align: center;
        }
        .Paynow{
            width: 200px;
            height: 100px;
            margin: 0 auto;
        }
    </style>
    <body>
        <div class="Paynow">
            <h1>Pay Now!</h1>
            <form method="post">
                <div>
                    <button type="submit" name="pay_now">Pay Now!</button>
                </div>
            </form>
        </div>
    </body>
</html>
