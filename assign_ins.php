<?php
// Database connection
$servername = "localhost";
$username = "mission12345";
$password = "mission@1234567890";
$database = "nrhm";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    $unique_id = $conn->real_escape_string($_POST['unique_id']);
    $asha_name = $conn->real_escape_string($_POST['asha_name']);
    $asha_phone = $conn->real_escape_string($_POST['asha_phone']);
    $woman_name = $conn->real_escape_string($_POST['woman_name']);
    $woman_number = $conn->real_escape_string($_POST['woman_number']);

    // Check if unique ID exists in the table
    $check_sql = "SELECT * FROM assign_asha WHERE unique_id = '$unique_id'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Unique ID exists, perform UPDATE operation
        $update_sql = "UPDATE assign_asha SET 
                        asha_name = '$asha_name', 
                        asha_phone = '$asha_phone', 
                        woman_name = '$woman_name', 
                        woman_number = '$woman_number'
                      WHERE unique_id = '$unique_id'";

        if ($conn->query($update_sql) === TRUE) {
            // Redirect to readygo.php with the unique ID
            header("Location: choready.php?id=$unique_id");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Unique ID does not exist, perform INSERT operation
        $insert_sql = "INSERT INTO assign_asha (unique_id, asha_name, asha_phone, woman_name, woman_number)
                        VALUES ('$unique_id', '$asha_name', '$asha_phone', '$woman_name', '$woman_number')";

        if ($conn->query($insert_sql) === TRUE) {
            // Redirect to readygo.php with the unique ID
            header("Location: choready.php?id=$unique_id");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }
}

$conn->close();
?>
