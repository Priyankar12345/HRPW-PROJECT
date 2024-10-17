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
    $uddp = $conn->real_escape_string($_POST['uddp']);
    $flu = $conn->real_escape_string($_POST['flu']);
    $mouf = $conn->real_escape_string($_POST['mouf']);
    $wgwlu = $conn->real_escape_string($_POST['wgwlu']);
    
    // Check if the unique ID already exists in the table
    $check_query = "SELECT * FROM chox_data WHERE unique_id = '$unique_id'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // If the unique ID exists, update the data
        $update_sql = "UPDATE chox_data SET uddp='$uddp', flu='$flu', mouf='$mouf', wgwlu='$wgwlu' WHERE unique_id='$unique_id'";
        
        if ($conn->query($update_sql) === TRUE) {
            // Redirect to thank you page with inserted ID
            header("Location: creadygo.php?id=$unique_id");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // If the unique ID doesn't exist, insert new data
        $insert_sql = "INSERT INTO chox_data(unique_id, uddp, flu, mouf, wgwlu) VALUES ('$unique_id', '$uddp', '$flu', '$mouf', '$wgwlu')";
        
        if ($conn->query($insert_sql) === TRUE) {
            $last_id = $conn->insert_id;
            // Redirect to thank you page with inserted ID
            header("Location: creadygo.php?id=$unique_id");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
