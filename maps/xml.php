<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include('db.php'); // Adjust the path to your connect.php file

// Check if the database connection is successful
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Select data from the markers table
$query = "SELECT * FROM markers";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die('Invalid query: ' . mysqli_error($conn));
}

// Set the content type to XML
header("Content-type: text/xml");

// Start output buffering
ob_start();

// Start XML file and echo parent node
echo '<?xml version="1.0" ?>';
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)) {
    // Add to XML document node
    echo '<marker ';
    echo 'id="' . $row['id'] . '" ';
    echo 'name="' . parseToXML($row['name']) . '" ';
    echo 'address="' . parseToXML($row['address']) . '" ';
    echo 'lat="' . $row['lat'] . '" ';
    echo 'lng="' . $row['lng'] . '" ';
    echo 'type="' . $row['type'] . '" ';
    echo '/>';
}

// End XML file
echo '</markers>';

// End output buffering and capture the output
$xml_output = ob_get_clean();

// Ensure that the output starts with the XML declaration
if (strpos($xml_output, '<?xml') === false) {
    $xml_output = '<?xml version="1.0" ?>' . $xml_output;
}

// Output the XML
echo $xml_output;

// Close the database connection
mysqli_close($conn);

// Function to parse string to XML
function parseToXML($htmlStr) {
    $xmlStr = htmlspecialchars($htmlStr);
    return $xmlStr;
}
?>
