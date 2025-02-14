<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();

function calculate_dish_score($dish, $criteria) {
    $score = 0;
    foreach ($criteria as $criterion => $weight) {
        $score += $dish[$criterion] * $weight;
    }
    return $score;
}

function get_top_dishes($dishes, $criteria, $top_n = 3) {
    foreach ($dishes as &$dish) {
        $dish['score'] = calculate_dish_score($dish, $criteria);
    }
    unset($dish);

    // Sort dishes by score in descending order
    usort($dishes, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    // Return the top N dishes
    return array_slice($dishes, 0, $top_n);
}

// Fetch dishes from the database
$query = "SELECT * FROM dishes";
$result = mysqli_query($con, $query);
$dishes = [];

while ($row = mysqli_fetch_assoc($result)) {
    $dishes[] = [
        'name' => $row['name'],
        'taste' => $row['taste'],
        'price' => $row['price'],
        'availability' => $row['availability']
    ];
}

// Define criteria weights
$criteria = [
    'taste' => 0.7, // Taste contributes 70% to the score
    'price' => -0.5, // Lower price is even more significant
    'availability' => 0.2 // Availability remains at 20%
];

$top_dishes = get_top_dishes($dishes, $criteria);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Dishes - Hill Climbing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Top 3 Dishes</h1>

    <?php foreach ($top_dishes as $index => $dish): ?>
        <div class="card mt-4">
            <div class="card-header bg-success text-white">
                Rank <?php echo $index + 1; ?>: <?php echo $dish['name']; ?>
            </div>
            <div class="card-body">
                <p class="card-text">Taste Score: <?php echo $dish['taste']; ?></p>
                <p class="card-text">Price: <?php echo $dish['price']; ?> BDT</p>
                <p class="card-text">Availability: <?php echo $dish['availability']; ?></p>
                <p class="card-text">Total Score: <?php echo $dish['score']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>

    <h3 class="mt-5">All Dishes</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Taste</th>
            <th>Price</th>
            <th>Availability</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($dishes as $dish): ?>
            <tr>
                <td><?php echo $dish['name']; ?></td>
                <td><?php echo $dish['taste']; ?></td>
                <td><?php echo $dish['price']; ?> BDT</td>
                <td><?php echo $dish['availability']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
