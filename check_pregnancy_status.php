<?php
// Database connection credentials
$host = 'localhost'; // Hostname
$username = "mission12345"; // Database username
$password = "mission@1234567890"; // Database password
$database = "nrhm"; // Database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get woman ID from GET parameter
$womanId = $_GET['id'];

// Prepare SQL statement to check pregnancy status
$sql = "SELECT pregnant FROM pregnant_data WHERE unique_id = '$womanId'";
$result = $conn->query($sql);

// Check if a row is returned
if ($result->num_rows > 0) {
    // Fetch the first row
    $row = $result->fetch_assoc();
    $pregnancyStatus = $row['pregnant'];

    // Check pregnancy status and return 'yes' or 'no'
    if ($pregnancyStatus == 'yes') {
        echo 'yes';
    } else {
        echo 'no';
    }
} else {
    // If no rows are returned, assume 'no' for demonstration purposes
    echo 'no';
}

// Close connection
$conn->close();
?>
