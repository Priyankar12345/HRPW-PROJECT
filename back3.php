<?php
// back.php

// Include the database connection file
include 'db_connection.php';

$womanID = $_GET['id'];

// Check if the woman ID is present in the chox_data table
$check_query = "SELECT COUNT(*) as count FROM chox_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in chox_data table
        $pregnantDataFound = true;
    } else {
        $pregnantDataFound = false;
    }
} else {
    $pregnantDataFound = false;
}

// Check if the woman ID is present in the cho_data table
$check_query = "SELECT COUNT(*) as count FROM cho_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in cho_data table
        $outcomeDataFound = true;
    } else {
        $outcomeDataFound = false;
    }
} else {
    $outcomeDataFound = false;
}

// Check if the woman ID is found in both tables
if ($pregnantDataFound && $outcomeDataFound) {
    // Woman ID found in both tables, redirect to extra.php
    header("Location: cho_check.php?id=$womanID");
    exit();
} else {
    // Woman ID not found in both tables, redirect back to creadygo.php
    header("Location: creadygo.php?id=$womanID");
    exit();
}

// Close the database connection
$conn->close();
?>
