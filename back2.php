<?php
// back.php

// Include the database connection file
include 'db_connection.php';

$womanID = $_GET['id'];

// Check if the woman ID is present in the couple_data table
$check_query = "SELECT COUNT(*) as count FROM couple_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in couple_data table
        $coupleDataFound = true;
    } else {
        $coupleDataFound = false;
    }
} else {
    $coupleDataFound = false;
}

// Check if the woman ID is present in the menstruation_card table
$check_query = "SELECT COUNT(*) as count FROM menstruation_card WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in menstruation_card table
        $menstruationCardFound = true;
    } else {
        $menstruationCardFound = false;
    }
} else {
    $menstruationCardFound = false;
}

// Check if the woman ID is found in both tables
if ($coupleDataFound && $menstruationCardFound) {
    // Woman ID found in both tables, redirect to startextra.php
    header("Location: startextra.php?id=$womanID");
    exit();
} else {
    // Woman ID not found in both tables, redirect back to readygo.php
    header("Location: readygo.php?id=$womanID");
    exit();
}

$conn->close();
?>
