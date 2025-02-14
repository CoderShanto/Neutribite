
<?php
// Include the connect.php file
include('includes/connect.php');  // Adjust the path if needed

// Start session
session_start();

// Check the connection and perform actions
if ($conn) {
    // Your database operations go here
} else {
    echo "Database connection error.";
}
?>


<?php
include('includes/connect.php'); // Make sure this is correct and included
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $calories = $_POST['calories'];
    $protein = $_POST['protein'];
    $fiber = $_POST['fiber'];
    $vitamins = $_POST['vitamins'];
    $minerals = $_POST['minerals'];

    // Call the function to get a suggested dish based on the decision tree
    $suggested_dish = run_decision_tree($calories, $protein, $fiber, $vitamins, $minerals);

    // Check if connection exists before inserting into database
    if ($conn) {
        // Save the data in the database
        $stmt = $conn->prepare("INSERT INTO food_suggestions (calories, protein, fiber, vitamins, minerals, suggested_dish) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiiis", $calories, $protein, $fiber, $vitamins, $minerals, $suggested_dish);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Database connection error.";
    }
}

// Function for decision tree logic
function run_decision_tree($calories, $protein, $fiber, $vitamins, $minerals) {
    // Simple decision tree based on user input (example logic)
    if ($calories < 200 && $protein > 5) {
        return "Grilled Chicken Salad";
    } elseif ($calories < 300 && $fiber > 10) {
        return "Vegetable Stir-fry";
    } elseif ($calories < 250 && $minerals > 20) {
        return "Rice and Beans";
    } elseif ($vitamins > 15 && $fiber > 5) {
        return "Fruit Smoothie";
    } else {
        return "Vegetable Soup";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Food Suggestion</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Your HTML and form here -->
    <div class="container mt-5">
        <h1 class="text-center">AI Food Suggestion</h1>
        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Enter Your Food Information
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="calories">Calories (kcal):</label>
                        <input type="number" class="form-control" id="calories" name="calories" required>
                    </div>
                    <div class="form-group">
                        <label for="protein">Protein (g):</label>
                        <input type="number" class="form-control" id="protein" name="protein" required>
                    </div>
                    <div class="form-group">
                        <label for="fiber">Fiber (g):</label>
                        <input type="number" class="form-control" id="fiber" name="fiber" required>
                    </div>
                    <div class="form-group">
                        <label for="vitamins">Vitamins (%):</label>
                        <input type="number" class="form-control" id="vitamins" name="vitamins" required>
                    </div>
                    <div class="form-group">
                        <label for="minerals">Minerals (%):</label>
                        <input type="number" class="form-control" id="minerals" name="minerals" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Get Suggested Dish</button>
                </form>
            </div>
        </div>

        <?php if (isset($suggested_dish)): ?>
        <div class="mt-5">
            <h3>Suggested Dish: <?php echo $suggested_dish; ?></h3>
        </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
