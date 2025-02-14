<?php
include('../includes/connect.php'); // Include the file with your database connection

// Fetch all product reviews from the database
$sql = "SELECT * FROM product_reviews";
$result = $con->query($sql);

// Check if there are any reviews
if ($result->num_rows > 0) {
    // Display reviews in a table format
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Product Reviews</title>
        <!-- Bootstrap CSS link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
               
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center mb-4">Product Reviews</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>';

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row["product_name"] . '</td>
                <td>' . $row["rating"] . '</td>
                <td>' . $row["review"] . '</td>
              </tr>';
    }

    echo '</tbody>
          </table>
        </div>
    </body>
    </html>';
} else {
    echo "No reviews found.";
}

$con->close(); // Close the database connection
?>
