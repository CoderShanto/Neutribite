<?php
include('../includes/connect.php');

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Handle form submission for updating offers
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_id"]) && isset($_POST["offer_price"]) && isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $productId = $_POST["product_id"];
        $offerPrice = $_POST["offer_price"];
        $startDate = $_POST["start_date"];
        $endDate = $_POST["end_date"];

        // Update or insert offer into the 'offer_prices' table
        $query = "INSERT INTO offer_prices (product_id, offer_price, offer_start_date, offer_end_date)
                  VALUES ($productId, $offerPrice, '$startDate', '$endDate')
                  ON DUPLICATE KEY UPDATE
                  offer_price = VALUES(offer_price),
                  offer_start_date = VALUES(offer_start_date),
                  offer_end_date = VALUES(offer_end_date)";

        if (mysqli_query($con, $query)) {
            // Display confirmation message using JavaScript
            echo "<script>
                    window.onload = function() {
                        alert('Offer updated successfully!');
                    };
                  </script>";
        } else {
            echo "Error updating offer: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit Product Offers</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            background-color: #f5f5f5;
        }

        form {
            display: flex;
            align-items: center;
        }

        input[type="text"], input[type="date"], button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-right: 10px;
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 14px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .redirect-btn {
            text-align: center;
            margin-top: 20px;
        }

        .redirect-btn a {
            text-decoration: none;
            padding: 12px 24px;
            background-color: #28a745;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
        }

        .redirect-btn a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Product Offers</h2>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Offer Price</th>
                    <th>Edit</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch products data from the 'products' table and offer prices from 'offer_prices' table
                $query = "SELECT p.product_id, p.product_title, p.product_price, o.offer_price
                          FROM products p
                          LEFT JOIN offer_prices o ON p.product_id = o.product_id";
                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_title'] . "</td>";
                    echo "<td>৳" . $row['product_price'] . "</td>";
                    echo "<td>৳" . ($row['offer_price'] ?? 'No Offer') . "</td>"; // Display offer price or 'No Offer'
                    echo "<td>
                            <form method='post' action='".$_SERVER['PHP_SELF']."'>
                                <input type='hidden' name='product_id' value='" . $row['product_id'] . "'>
                                <input type='text' name='offer_price' value='" . ($row['offer_price'] ?? $row['product_price']) . "'>
                            </td>";
                    echo "<td><input type='date' name='start_date' required></td>";
                    echo "<td><input type='date' name='end_date' required></td>";
                    echo "<td><button type='submit'>Update</button></form></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="redirect-btn">
            <a href="index.php">Go to Index</a>
        </div>
    </div>

</body>
</html>

<?php
// Close database connection
mysqli_close($con);
?>
