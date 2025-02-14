<?php
// Include database connection
include('./includes/connect.php');

// Fetch updated offer data from the database
$query = "SELECT p.product_id, p.product_title, p.product_price, o.offer_price, o.offer_start_date, o.offer_end_date
          FROM products p
          LEFT JOIN offer_prices o ON p.product_id = o.product_id";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Offers</title>
    <style>
       /* Global Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5; /* Soft background for contrast */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

/* Main Container */
.container {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    width: 90%;
    max-width: 1000px;
    margin: 20px auto;
    overflow-x: auto; /* Ensure the table is scrollable on small screens */
}

/* Header Styles */
h2 {
    text-align: center;
    font-size: 2.2rem;
    color: #333;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1rem;
    text-align: left;
}

thead th {
    background-color: #007bff; /* Vibrant header */
    color: #fff;
    padding: 15px 12px;
    text-transform: uppercase;
    font-weight: 600;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #0056b3;
}

tbody tr {
    background-color: #f9f9f9;
    transition: background-color 0.3s ease;
}

tbody tr:nth-child(even) {
    background-color: #f1f1f1; /* Subtle zebra striping */
}

tbody tr:hover {
    background-color: #e9ecef; /* Row hover effect */
}

td, th {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: center; /* Center-align data for better symmetry */
}

td:first-child, th:first-child {
    text-align: left; /* Left-align Product ID */
}

/* Responsive Breakpoints */
@media (max-width: 768px) {
    table {
        font-size: 0.9rem;
    }

    h2 {
        font-size: 1.8rem;
    }
}

/* Button Styles */
.container a {
    display: inline-block;
    text-decoration: none;
    padding: 12px 20px;
    background-color: #007bff;
    color: #fff;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 6px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
}

.container a:hover {
    background-color: #0056b3;
    transform: scale(1.05); /* Subtle hover effect */
}

/* Table Empty Data Styles */
tbody td:empty {
    color: #999;
    font-style: italic;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Product Offers</h2>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Offer Price</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the fetched data and display in table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_title'] . "</td>";
                    echo "<td>৳" . $row['product_price'] . "</td>";
                    echo "<td>৳" . ($row['offer_price'] ?? 'No Offer') . "</td>"; // Display offer price or 'No Offer'
                    echo "<td>" . ($row['offer_start_date'] ?? '-') . "</td>"; // Display start date or '-'
                    echo "<td>" . ($row['offer_end_date'] ?? '-') . "</td>"; // Display end date or '-'
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="index.php" style="text-decoration: none; padding: 12px 24px; background-color: #007bff; color: #fff; border-radius: 4px; font-size: 14px;">Go Back</a>
        </div>
    </div>

</body>
</html>

<?php
// Close database connection
mysqli_close($con);
?>
