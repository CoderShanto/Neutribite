<?php
include('../includes/connect.php'); // Include the file with your database connection

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_name = isset($_POST["product_title"]) ? $_POST["product_title"] : ""; // Ensure product_name is set
    $rating = $_POST["rating"];
    $review = $_POST["review"];

    // Insert the user's review & rating into the database
    $sql = "INSERT INTO product_reviews (product_name, rating, review) VALUES ('$product_name', '$rating', '$review')";

    if ($con->query($sql) === TRUE) { // Using $con for database connection
        // Use JavaScript to redirect to the confirmation page
        echo '<script>window.location.href = "review_confirmation.php";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error; // Output error if insertion fails
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Give your review & ratings</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid my-3 text-success">
        <h2 class="text-center text_success">Give your review & ratings</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Product Name field -->
                    <div class="form-outline mb-4">
                        <label for="product_title" class="form-label">Product Name</label>
                        <input type="text" id="product_title" class="form-control" placeholder="Enter product name" autocomplete="off" required="required" name="product_title">
                    </div>

                    <!-- Rating field -->
                    <div class="form-group">
                        <label for="rating">Your Rating:</label>
                        <select class="form-control" id="rating" name="rating" required>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="1">⭐</option>
                        </select>
                    </div>
                   
                    <!-- Review field -->
                    <div class="form-outline mb-4">
                        <label for="review" class="form-label">Your Review</label>
                        <textarea id="review" class="form-control" rows="4" placeholder="Enter your review" required="required" name="review"></textarea>
                    </div>
                    <!-- Submit button -->
                    <div class="mt-4 pt-2">
                        <!-- Use type="submit" to submit the form -->
                        <input type="submit" value="Send Feedback" class="bg-info py-2 px-3 border-0" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
