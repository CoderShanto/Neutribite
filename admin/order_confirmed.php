<?php
include('../includes/connect.php'); // Include the file with your database connection

// Fetch all orders from the database
$sql = "SELECT * FROM order_track";
$result = $con->query($sql);

// Check if there are any orders
if ($result->num_rows > 0) {
    $orders = $result->fetch_all(MYSQLI_ASSOC); // Fetch all orders as an associative array
} else {
    $orders = []; // Initialize empty array if no orders found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Tracking</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
           
        }
        .order-container {
            margin-top: 50px;
        }
        .order {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .order-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .order-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        <h2 class="text-center mb-4">Order Tracking - Admin View</h2>
        <div class="order-container">
            <?php foreach ($orders as $order) : ?>
                <div class="order">
                    <div class="order-details">
                        <div><strong>Invoice Number:</strong> <?php echo $order['invoice_number']; ?></div>
                        <div><strong>Status:</strong> <?php echo $order['delivered'] == 'Done' ? 'Delivered' : 'Done'; ?></div>
                    </div>
                    <div class="order-status">
                        <div>Processing</div>
                        <div>Packaging</div>
                        <div>Out for Delivery</div>
                        <div class="order-step <?php echo $order['delivered'] == 'Done' ? 'animate-step' : ''; ?>">
                            <?php echo $order['delivered'] == 'Done' ? 'Delivered' : ''; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.animate-step');

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
