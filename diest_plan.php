<?php
// Database credentials
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mystore"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest data from the diet_plan_inputs table
$query = "SELECT * FROM diet_plan_inputs ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Get the latest record
    $data = $result->fetch_assoc();
    
    // Example calculations based on data
    $bmr = 10 * $data['weight'] + 6.25 * $data['height'] - 5 * $data['age'] + 5; // Mifflin-St Jeor formula (for men)
    
    // Calculate the total daily energy expenditure (TDEE) based on activity level
    switch ($data['activity_level']) {
        case 1:
            $tdee = $bmr * 1.2; // Sedentary
            break;
        case 2:
            $tdee = $bmr * 1.375; // Lightly active
            break;
        case 3:
            $tdee = $bmr * 1.55; // Moderately active
            break;
        case 4:
            $tdee = $bmr * 1.725; // Very active
            break;
        case 5:
            $tdee = $bmr * 1.9; // Super active
            break;
        default:
            $tdee = $bmr * 1.2; // Default to Sedentary
            break;
    }

    // Generate diet plan based on goal
    $dietPlan = "";
    if (strtolower($data['goal']) == "weight loss") {
        $dietPlan = "To lose weight, you should aim for a calorie intake of around " . round($tdee - 500) . " kcal/day.";
    } elseif (strtolower($data['goal']) == "maintenance") {
        $dietPlan = "To maintain your current weight, aim for a calorie intake of " . round($tdee) . " kcal/day.";
    } elseif (strtolower($data['goal']) == "gain") {
        $dietPlan = "To gain weight, you should aim for a calorie intake of around " . round($tdee + 500) . " kcal/day.";
    } else {
        $dietPlan = "Please specify a valid goal.";
    }
} else {
    $dietPlan = "No data found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Plan Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f9f9f9;
        }
        form {
            margin: 20px auto;
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            text-align: left;
        }
        input, button {
            width: 100%;
            margin-top: 5px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
        }
        #chartContainer {
            margin-top: 20px;
            text-align: left;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <h1>Diet Plan Generator</h1>
    <div id="chartContainer">
        <h2>Your Customized Diet Plan</h2>
        <pre>
<?php
echo $dietPlan;
?>
        </pre>
    </div>
</body>
</html>
