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
    $mts_id = $conn->real_escape_string($_POST['mts_id']); // Changed variable name to mts_id
    $state = $conn->real_escape_string($_POST['state']);
    $district = $conn->real_escape_string($_POST['District']);
    $block = $conn->real_escape_string($_POST['block']);
    $panchayat = $conn->real_escape_string($_POST['panchayat']);
    $BPHC = $conn->real_escape_string($_POST['BPHC']);
    $revenue_village = $conn->real_escape_string($_POST['revenue_village']);
    $subcenter = $conn->real_escape_string($_POST['subcenter']);
    $caname = $conn->real_escape_string($_POST['caname']);
    $medicalOffice = $conn->real_escape_string($_POST['medicalOffice']);
    $canum = $conn->real_escape_string($_POST['canum']);
    $desi = $conn->real_escape_string($_POST['desi']);
    $pagwoman = $conn->real_escape_string($_POST['pagwoman']);
    $pagwomanage = $conn->real_escape_string($_POST['pagwomanage']);
    $hmno = $conn->real_escape_string($_POST['hmno']);

    // Generate Unique ID with slashes using mts_id
    $unique_id = $mts_id;

    // Insert data into database
     $sql = "INSERT INTO register_woman(date, time, geoLocation, mts_id, state, district, block, panchayat, BPHC, revenue_village, subcenter, caname, medicalOffice,canum, desi, pagwoman, pagwomanage, hmno, unique_id)
            VALUES ('$date','$time','$geoLocation','$mts_id','$state', '$district', '$block', '$panchayat', '$BPHC','$revenue_village',  '$subcenter', '$caname', '$medicalOffice','$canum', '$desi', '$pagwoman', '$pagwomanage', '$hmno', '$unique_id')";

    if ($conn->query($sql) === TRUE) {
        // Create a JavaScript popup with a delay for 2 minutes
        echo "<script>
                alert('Hello, $pagwoman. Your unique ID is: $unique_id');
                setTimeout(function() {
                    window.location.href = 'choready.php?id=" . urlencode($unique_id) . "';
                }, 1200); // 2 minutes in milliseconds
              </script>";
        exit(); // Make sure to exit after redirection
    } else {
        // Display error message with the exact error from MySQL
        echo "<script>
                alert('Error: " . $conn->error . "');
                setTimeout(function() {
                    window.location.href = 'login.php';
                }, 120000); // 2 minutes in milliseconds
              </script>";
    }
}

$conn->close();
?>
