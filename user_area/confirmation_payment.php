<?php
session_start();

// Fetch session variables
$invoice_number = $_SESSION['invoice_number'];
$amount_due = $_SESSION['amount_due'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6c757d;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .confirmation {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="confirmation">
        <h1>Order Confirmation</h1>
        <p>Your order with invoice number <?php echo $invoice_number; ?> and amount 
        <?php echo $amount_due; ?> has been confirmed!</p>
        <p>Thank you for shopping with us.</p>
        <a href="../index.php" class="btn">Continue Shopping</a>
    </div>
</body>
</html>
