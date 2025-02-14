<?php
include('../includes/connect.php'); // Include the file with your database connection
//session_start(); // Start the session if not already started

// Database configuration
// Assuming you've defined the database connection parameters in 'connect.php'

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Insert the user's message into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($con->query($sql) === TRUE) { // Using $con for database connection
        // Use JavaScript to redirect to the confirmation page
        echo '<script>window.location.href = "contact_confirmation.php";</script>';
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
    <title>Contact Us</title>
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
        <h2 class="text-center text_success">Contact Us</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Name field -->
                    <div class="form-outline mb-4">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="name">
                    </div>
                    <!-- Email field -->
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="email">
                    </div>
                    <!-- Message field -->
                    <div class="form-outline mb-4">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea id="message" class="form-control" rows="4" placeholder="Enter your message" required="required" name="message"></textarea>
                    </div>
                    <!-- Submit button -->
                    <div class="mt-4 pt-2">
                        <!-- Use type="submit" to submit the form -->
                        <input type="submit" value="Send Message" class="bg-info py-2 px-3 border-0" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
