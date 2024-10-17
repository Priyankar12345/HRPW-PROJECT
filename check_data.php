<?php
// Database connection
$servername = "localhost";
$username = "mission12345";
$password = "mission@1234567890";
$database = "nrhm";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if woman ID exists in a specific table
function checkDataExists($conn, $table, $womanID) {
    $sql = "SELECT * FROM $table WHERE unique_id = '$womanID'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// Woman ID from GET request
$womanID = $conn->real_escape_string($_GET['id']);

// Check if woman ID exists in all required tables
$pregnantDataExists = checkDataExists($conn, 'pregnant_data', $womanID);
$migrationDataExists = checkDataExists($conn, 'migration_data', $womanID);
$ancDataExists = checkDataExists($conn, 'anc_data', $womanID);
$highRiskDataExists = checkDataExists($conn, 'highrisk_data', $womanID);
$outcomeDataExists = checkDataExists($conn, 'outcome', $womanID);

// Close database connection
$conn->close();

// Prepare response JSON
$response = [
    'allDataCompleted' => $pregnantDataExists && $migrationDataExists && $ancDataExists && $highRiskDataExists && $outcomeDataExists
];

// Send response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
