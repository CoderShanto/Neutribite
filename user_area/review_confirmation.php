<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Confirmation</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #6c757d;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .alert {
            padding: 20px;
            border-radius: 10px;
            font-size: 18px;
            text-align: center;
        }
        .btn-return {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="text-warning mb-4">Review Submitted Successfully!</h2>
        
        <!-- Confirmation Message -->
        <div class="alert alert-success" role="alert">
            Thank you for submitting your review.
        </div>

        <!-- Return Form -->
        <form action="profile.php" method="post">
            <button type="submit" class="btn btn-primary btn-return">Return to Profile</button>
        </form>
    </div>
</body>
</html>
