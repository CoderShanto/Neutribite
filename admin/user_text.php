<?php
include('../includes/connect.php'); // Include the file with your database connection

// Query to fetch messages from the database
$sql = "SELECT name, email, message FROM messages";
$result = $con->query($sql);

// Check if there are any messages in the database
if ($result->num_rows > 0) {
    // Start table markup with styling
    echo '<table class="table table-striped" style="background-color: #f2f2f2; border-spacing: 10px;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Email</th>';
    echo '<th>Message</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo '<tr>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["message"] . '</td>';
        echo '</tr>';
    
    }

    // End table markup
    echo '</tbody>';
    echo '</table>';
} else {
    // Display "No messages found" centered and bold
    echo '<div style="font-size: 24px; color: yellow; text-align: center; font-weight: bold;">No messages found.</div>';
}

// Close database connection
$con->close();
?>
