<?php
include('../includes/connect.php'); // Include the file with your database connection

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $invoice_number = isset($_POST["invoice_number"]) ? $_POST["invoice_number"] : "";

    // Check if the form was submitted to mark the order as delivered
    if (isset($_POST["submit_delivered"])) {
        $sql = "UPDATE order_track SET delivered = 'Done' WHERE invoice_number = '$invoice_number'";

        if ($con->query($sql) === TRUE) {
            echo '<script>alert("Order Delivered Successfully!");</script>';
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else {
        // Insert the order tracking data into the database
        $sql = "INSERT INTO order_track (invoice_number) VALUES ('$invoice_number')";

        if ($con->query($sql) === TRUE) { // Using $con for database connection
            // Use JavaScript to redirect to the confirmation page
            echo '<script>window.location.href = "profile.php?Order_track";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $con->error; // Output error if insertion fails
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track your order</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
          
        }
        .order-animation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            font-size: 18px;
            color: #333;
        }
        .order-step {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            font-size: 24px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }
        .animate-step {
            animation-duration: 2s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: 1;
        }
        @keyframes moveStep {
            0% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
            100% { transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Track Your Order</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="invoice_number">Enter Invoice Number:</label>
                <input type="text" class="form-control" id="invoice_number" name="invoice_number" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Track Order</button>
            <button type="submit" class="btn btn-success" name="submit_delivered">Mark as Delivered</button>
        </form>

        <!-- Order animation -->
        <div class="order-animation">
            <div class="order-step">Processing</div>
            <div class="order-step">Packaging</div>
            <div class="order-step">Out for Delivery</div>
            <div class="order-step">Delivered</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.order-step');

            // Animate each step of the order process
            steps.forEach((step, index) => {
                setTimeout(() => {
                    step.classList.add('animate-step');
                    step.style.animationName = 'moveStep';
                }, index * 2000); // Delay animation by 2 seconds for each step
            });
        });
    </script>
</body>
</html>
