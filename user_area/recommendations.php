<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "nutrition_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch recommendations from the Python Flask API
function getRecommendations($userId) {
    $url = "http://127.0.0.1:5000/recommend"; // Flask API
    $data = array("user_id" => $userId);

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return json_decode($result, true);
}

// Get user ID (you can replace this with a dynamic session-based user ID)
$userId = 1;

// Fetch recommendations
$recommendations = getRecommendations($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommended Foods</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        .food-item {
            display: inline-block;
            width: 200px;
            margin: 10px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .food-item img {
            max-width: 100%;
            height: auto;
        }
        .food-item h3 {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Recommended Food Items</h1>
        <div id="food-list">
            <?php
            // Display recommended food items
            foreach ($recommendations as $foodId) {
                $query = "SELECT * FROM food_items WHERE id = $foodId";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='food-item'>
                                <img src='{$row['image']}' alt='{$row['name']}'>
                                <h3>{$row['name']}</h3>
                                <p>{$row['description']}</p>
                              </div>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
