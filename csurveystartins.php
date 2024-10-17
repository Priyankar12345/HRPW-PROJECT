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
     $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $geoLocation = $conn->real_escape_string($_POST['geoLocation']);
    $state = $conn->real_escape_string($_POST['state']);
    $district = $conn->real_escape_string($_POST['District']);
    $block = $conn->real_escape_string($_POST['block']);
    $panchayat = $conn->real_escape_string($_POST['panchayat']);
    $revenue_village = $conn->real_escape_string($_POST['revenue_village']);
    $address = $conn->real_escape_string($_POST['address']);
    $subcenter = $conn->real_escape_string($_POST['subcenter']);
    $sperson = $conn->real_escape_string($_POST['sperson']);
    $personno = $conn->real_escape_string($_POST['personno']);
	$desi = $conn->real_escape_string($_POST['desi']);
    $pagwoman = $conn->real_escape_string($_POST['pagwoman']);
    $pagwomanage = $conn->real_escape_string($_POST['pagwomanage']);
    $hmno = $conn->real_escape_string($_POST['hmno']);
   

    // Generate Unique ID with slashes
    $unique_id = substr($block, 0, 3) . '/' . substr($panchayat, 0, 3) . '/' . substr($revenue_village, 0, 3) . '/' . rand(100, 999);

    // Insert data into database
    $sql = "INSERT INTO register_woman(date, time, geoLocation, state, district, block, panchayat, revenue_village, address, subcenter, sperson, personno, desi,pagwoman, pagwomanage, hmno, unique_id)
            VALUES ('$date','$time','$geoLocation','$state', '$district', '$block', '$panchayat', '$revenue_village', '$address', '$subcenter', '$sperson', '$personno', '$desi','$pagwoman', '$pagwomanage', '$hmno', '$unique_id')";

    if ($conn->query($sql) === TRUE) {
        // Create a JavaScript popup
        echo "<script>alert('Hello, $pagwoman. Your unique ID is: $unique_id');";
        echo "setTimeout(function() { window.location.href = 'choready.php?id=" . urlencode($unique_id) . "'; }, 100);</script>";
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
