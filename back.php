<?php
// back.php

// Include the database connection file
include 'db_connection.php';

$womanID = $_GET['id'];

// Check if the woman ID is present in the pregnant_data table
$check_query = "SELECT COUNT(*) as count FROM pregnant_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in pregnant_data table
        $pregnantDataFound = true;
    } else {
        $pregnantDataFound = false;
    }
} else {
    $pregnantDataFound = false;
}

// Check if the woman ID is present in the migration_data table
$check_query = "SELECT COUNT(*) as count FROM migration_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in migration_data table
        $migrationDataFound = true;
    } else {
        $migrationDataFound = false;
    }
} else {
    $migrationDataFound = false;
}

// Check if the woman ID is present in the anc_data table
$check_query = "SELECT COUNT(*) as count FROM anc_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in anc_data table
        $ancDataFound = true;
    } else {
        $ancDataFound = false;
    }
} else {
    $ancDataFound = false;
}

// Check if the woman ID is present in the highrisk_data table
$check_query = "SELECT COUNT(*) as count FROM highrisk_data WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in highrisk_data table
        $highRiskDataFound = true;
    } else {
        $highRiskDataFound = false;
    }
} else {
    $highRiskDataFound = false;
}

// Check if the woman ID is present in the outcome table
$check_query = "SELECT COUNT(*) as count FROM outcome WHERE unique_id = '$womanID'";
$result = $conn->query($check_query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['count'] > 0) {
        // Woman ID found in outcome table
        $outcomeDataFound = true;
    } else {
        $outcomeDataFound = false;
    }
} else {
    $outcomeDataFound = false;
}

// Check if the woman ID is found in all tables
if ($pregnantDataFound && $migrationDataFound && $ancDataFound && $highRiskDataFound && $outcomeDataFound) {
    // Woman ID found in all tables, redirect to cho_startextra.php
    header("Location: cho_startextra.php?id=$womanID");
    exit();
} else {
    // Woman ID not found in all tables, redirect back to choready.php
    header("Location: choready.php?id=$womanID");
    exit();
}

$conn->close();
?>
