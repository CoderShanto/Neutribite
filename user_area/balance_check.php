<?php
include('../includes/connect.php'); // Include the file with your database connection

// Query to fetch payment data from the database, including the current balance
$get_payments = "
    SELECT 
        subquery_alias.payment_mode,
        subquery_alias.total_amount,
        current_balances.current_balance,
        (current_balances.current_balance - subquery_alias.total_amount) AS remaining_balance
    FROM (
        SELECT 
            payment_mode, 
            SUM(amount) AS total_amount 
        FROM 
            user_payments 
        GROUP BY 
            payment_mode
    ) AS subquery_alias
    LEFT JOIN (
        SELECT 
            payment_mode, 
            IFNULL(SUM(amount), 0) AS current_balance 
        FROM 
            user_payments 
        GROUP BY 
            payment_mode
    ) AS current_balances ON subquery_alias.payment_mode = current_balances.payment_mode
";
$result = mysqli_query($con, $get_payments);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Balance Check</title>
<style>
 

.container:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(248, 244, 244, 0.98);
}

h1 {
    font-size: 2.5rem;
    color: #007bff;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    margin-bottom: 30px;
    letter-spacing: 1.5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(244, 233, 233, 1);
}

thead th {
    background-color: #007bff;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 1px;
    padding: 15px;
}

tbody td {
    background-color: #f8f9fa;
    color: #343a40;
    text-align: center;
    padding: 15px;
    font-size: 1rem;
    border-bottom: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background-color: #e9ecef;
}

tbody tr:hover {
    background-color: #d6e0f0;
    color: #007bff;
    cursor: pointer;
    transform: scale(1.01);
    transition: all 0.2s ease-in-out;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 2rem;
    }

    table th, table td {
        font-size: 0.9rem;
        padding: 10px;
    }
}

</style>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">User Balance Check</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Payment Method</th>
                            <th>Total Amount Paid</th>
                            <th>Current Balance</th>
                            <th>Remaining Balance After Purchase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are any payment records
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["payment_mode"] . "</td>";
                                echo "<td>" . $row["total_amount"] . "</td>";
                                echo "<td>" . $row["current_balance"] . "</td>";
                                echo "<td>" . $row["remaining_balance"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4' class='text-center text-danger'><h3>No payment records found</h3></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
