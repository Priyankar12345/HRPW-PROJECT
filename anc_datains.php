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
	$date = $conn->real_escape_string($_POST['date']);
	$time = $conn->real_escape_string($_POST['time']);
	$geoLocation = $conn->real_escape_string($_POST['geoLocation']);
    $aan12 = $conn->real_escape_string($_POST['aan12']);
    $andx = $conn->real_escape_string($_POST['andx']);
    $npdf = $conn->real_escape_string($_POST['npdf']);
    $nppdf = $conn->real_escape_string($_POST['nppdf']);
    $aanc1 = $conn->real_escape_string($_POST['aanc1']);
    $doan1 = $conn->real_escape_string($_POST['doan1']);
    $poan1 = $conn->real_escape_string($_POST['poan1']);
    $fh1 = $conn->real_escape_string($_POST['fh1']);
    $bp1 = $conn->real_escape_string($_POST['bp1']);
    $hb1 = $conn->real_escape_string($_POST['hb1']);
    $ua1 = $conn->real_escape_string($_POST['ua1']);
    $wk1 = $conn->real_escape_string($_POST['wk1']);
    $rbs1 = $conn->real_escape_string($_POST['rbs1']);
    $anc2 = $conn->real_escape_string($_POST['anc2']);
    $doan2 = $conn->real_escape_string($_POST['doan2']);
    $poan2 = $conn->real_escape_string($_POST['poan2']);
    $fh2 = $conn->real_escape_string($_POST['fh2']);
    $bp2 = $conn->real_escape_string($_POST['bp2']);
    $hb2 = $conn->real_escape_string($_POST['hb2']);
    $ua2 = $conn->real_escape_string($_POST['ua2']);
    $wk2 = $conn->real_escape_string($_POST['wk2']);
    $rbs2 = $conn->real_escape_string($_POST['rbs2']);
    $anc3 = $conn->real_escape_string($_POST['anc3']);
    $doan3 = $conn->real_escape_string($_POST['doan3']);
    $poan3 = $conn->real_escape_string($_POST['poan3']);
    $fh3 = $conn->real_escape_string($_POST['fh3']);
    $bp3 = $conn->real_escape_string($_POST['bp3']);
    $hb3 = $conn->real_escape_string($_POST['hb3']);
    $ua3 = $conn->real_escape_string($_POST['ua3']);
    $wk3 = $conn->real_escape_string($_POST['wk3']);
    $rbs3 = $conn->real_escape_string($_POST['rbs3']);
    $anc4 = $conn->real_escape_string($_POST['anc4']);
    $doan4 = $conn->real_escape_string($_POST['doan4']);
    $poan4 = $conn->real_escape_string($_POST['poan4']);
    $fh4 = $conn->real_escape_string($_POST['fh4']);
    $bp4 = $conn->real_escape_string($_POST['bp4']);
    $hb4 = $conn->real_escape_string($_POST['hb4']);
    $ua4 = $conn->real_escape_string($_POST['ua4']);
    $wk4 = $conn->real_escape_string($_POST['wk4']);
    $rbs4 = $conn->real_escape_string($_POST['rbs4']);

    $anc5 = $conn->real_escape_string($_POST['anc5']);
    $doan5 = $conn->real_escape_string($_POST['doan5']);
    $poan5 = $conn->real_escape_string($_POST['poan5']);
    $fh5 = $conn->real_escape_string($_POST['fh5']);
    $bp5 = $conn->real_escape_string($_POST['bp5']);
    $hb5 = $conn->real_escape_string($_POST['hb5']);
    $ua5 = $conn->real_escape_string($_POST['ua5']);
	$wk5 = $conn->real_escape_string($_POST['wk5']);
    $rbs5 = $conn->real_escape_string($_POST['rbs5']);
	
	
	$anc6 = $conn->real_escape_string($_POST['anc6']);
    $doan6 = $conn->real_escape_string($_POST['doan6']);
    $poan6 = $conn->real_escape_string($_POST['poan6']);
    $fh6 = $conn->real_escape_string($_POST['fh6']);
    $bp6 = $conn->real_escape_string($_POST['bp6']);
    $hb6 = $conn->real_escape_string($_POST['hb6']);
    $ua6 = $conn->real_escape_string($_POST['ua6']);
	$wk6 = $conn->real_escape_string($_POST['wk6']);
    $rbs6 = $conn->real_escape_string($_POST['rbs6']);
	
	
	$anc7 = $conn->real_escape_string($_POST['anc7']);
    $doan7 = $conn->real_escape_string($_POST['doan7']);
    $poan7 = $conn->real_escape_string($_POST['poan7']);
    $fh7 = $conn->real_escape_string($_POST['fh7']);
    $bp7 = $conn->real_escape_string($_POST['bp7']);
    $hb7 = $conn->real_escape_string($_POST['hb7']);
    $ua7 = $conn->real_escape_string($_POST['ua7']);
	$wk7 = $conn->real_escape_string($_POST['wk7']);
    $rbs7 = $conn->real_escape_string($_POST['rbs7']);
 

    // Function to handle file uploads
   $targetDir = "Migration Card/";
    $targetDirANC = "ANC VISIT/";

    // Function to handle file uploads
    function handleFileUpload($targetDir, $prefix, $newFileName)
    {
        global $conn, $wk5;

        $fileName = isset($_FILES[$prefix]['name']) ? basename($_FILES[$prefix]['name']) : "";
        $targetFilePath = $targetDir . $newFileName;

        // Generate a unique folder name
        $uniqueNumber = uniqid();
        $folderName = $prefix . "_" . $wk5 . "_" . $uniqueNumber;

        // Check if folder exists, if not, create it
        if (!file_exists($targetDir . $folderName)) {
            mkdir($targetDir . $folderName, 0777, true);
        }

        $targetFilePath = $targetDir . $folderName . '/' . $newFileName;

        // Check if file is uploaded successfully, if not set a default value
        if (!empty($fileName) && move_uploaded_file($_FILES[$prefix]['tmp_name'], $targetFilePath)) {
            return $targetFilePath; // Return the uploaded file path
        } else {
            return ""; // Return empty string if file upload fails
        }
    }

    // Call function to handle file uploads with renaming
    $image1_path = handleFileUpload("Migration Card/", "image1", "migration_card.jpg");
    $image5_path = handleFileUpload("ANC VISIT/", "image5", "1stanc_" . $wk5 . ".jpg");
    $image6_path = handleFileUpload("ANC VISIT/", "image6", "2ndanc_" . $wk5  . ".jpg");
    $image7_path = handleFileUpload("ANC VISIT/", "image7", "3rdanc_" . $wk5  . ".jpg");
    $image8_path = handleFileUpload("ANC VISIT/", "image8", "4thanc_" . $wk5  . ".jpg");
    $image9_path = handleFileUpload("ANC VISIT/", "image9", "5thanc_" . $wk5  . ".jpg");
	$image10_path = handleFileUpload("ANC VISIT/", "image10", "5thanc_" .$wk5  . ".jpg");
	$image11_path = handleFileUpload("ANC VISIT/", "image11", "5thanc_" . $wk5  . ".jpg");

    // Check if unique ID already exists in the database
    $check_sql = "SELECT * FROM anc_data WHERE unique_id = '$unique_id'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Unique ID exists, perform UPDATE operation
        $sql = "UPDATE anc_data SET 
                    date = '$date',
                    time = '$time',
                    geoLocation = '$geoLocation',
                    aan12 = '$aan12',
                    andx = '$andx',
                    npdf = '$npdf',
                    nppdf = '$nppdf',
                    aanc1 = '$aanc1',
                    image5_path = '$image5_path',
                    doan1 = '$doan1',
                    poan1 = '$poan1',
                    fh1 = '$fh1',
                    bp1 = '$bp1',
                    hb1 = '$hb1',
                    ua1 = '$ua1',
                    wk1 = '$wk1',
                    rbs1 = '$rbs1',
                    anc2 = '$anc2',
                    image6_path = '$image6_path',
                    doan2 = '$doan2',
                    poan2 = '$poan2',
                    fh2 = '$fh2',
                    bp2 = '$bp2',
                    hb2 = '$hb2',
                    ua2 = '$ua2',
                    wk2 = '$wk2',
                    rbs2 = '$rbs2',
                    anc3 = '$anc3',
                    image7_path = '$image7_path',
                    doan3 = '$doan3',
                    poan3 = '$poan3',
                    fh3 = '$fh3',
                    bp3 = '$bp3',
                    hb3 = '$hb3',
                    ua3 = '$ua3',
                    wk3 = '$wk3',
                    rbs3 = '$rbs3',
                    anc4 = '$anc4',
                    image8_path = '$image8_path',
                    doan4 = '$doan4',
                    poan4 = '$poan4',
                    fh4 = '$fh4',
                    bp4 = '$bp4',
                    hb4 = '$hb4',
                    ua4 = '$ua4',
                    wk4 = '$wk4',
                    rbs4 = '$rbs4',
                    anc5 = '$anc5',
                    image9_path = '$image9_path',
                    doan5 = '$doan5',
                    poan5 = '$poan5',
                    fh5 = '$fh5',
                    bp5 = '$bp5',
                    hb5 = '$hb5',
                    ua5 = '$ua5',
                    wk5 = '$wk5',
                    rbs5 = '$rbs5',
                    anc6 = '$anc6',
                    image10_path = '$image10_path',
                    doan6 = '$doan6',
                    poan6 = '$poan6',
                    fh6 = '$fh6',
                    bp6 = '$bp6',
                    hb6 = '$hb6',
                    ua6 = '$ua6',
                    wk6 = '$wk6',
                    rbs6 = '$rbs6',
                    anc7 = '$anc7',
                    image11_path = '$image11_path',
                    doan7 = '$doan7',
                    poan7 = '$poan7',
                    fh7 = '$fh7',
                    bp7 = '$bp7',
                    hb7 = '$hb7',
                    ua7 = '$ua7',
                    wk7 = '$wk7',
                    rbs7 = '$rbs7'
                WHERE unique_id = '$unique_id'";
    } else {
        // Unique ID does not exist, perform INSERT operation
        $sql = "INSERT INTO anc_data (unique_id, date, time, geoLocation, aan12, andx, npdf, nppdf, aanc1, image5_path, doan1, poan1, fh1, bp1, hb1, ua1, wk1, rbs1, anc2, image6_path, doan2, poan2, fh2, bp2, hb2, ua2, wk2, rbs2, anc3, image7_path, doan3, poan3, fh3, bp3, hb3, ua3, wk3, rbs3, anc4, image8_path, doan4, poan4, fh4, bp4, hb4, ua4, wk4, rbs4, anc5, image9_path, doan5, poan5, fh5, bp5, hb5, ua5, wk5, rbs5, anc6, image10_path, doan6, poan6, fh6, bp6, hb6, ua6, wk6, rbs6, anc7, image11_path, doan7, poan7, fh7, bp7, hb7, ua7, wk7, rbs7)
        VALUES ('$unique_id', '$date','$time','$geoLocation','$aan12', '$andx', '$npdf', '$nppdf','$aanc1', '$image5_path', '$doan1', '$poan1', '$fh1', '$bp1', '$hb1', '$ua1', '$wk1', '$rbs1', '$anc2', '$image6_path', '$doan2', '$poan2', '$fh2', '$bp2', '$hb2', '$ua2', '$wk2', '$rbs2', '$anc3', '$image7_path', '$doan3', '$poan3', '$fh3', '$bp3', '$hb3', '$ua3', '$wk3', '$rbs3', '$anc4', '$image8_path', '$doan4', '$poan4', '$fh4', '$bp4', '$hb4', '$ua4', '$wk4', '$rbs4', '$anc5', '$image9_path', '$doan5', '$poan5', '$fh5', '$bp5', '$hb5', '$ua5', '$wk5', '$rbs5','$anc6', '$image10_path', '$doan6', '$poan6', '$fh6', '$bp6', '$hb6', '$ua6', '$wk6', '$rbs6','$anc7', '$image11_path', '$doan7', '$poan7', '$fh7', '$bp7', '$hb7', '$ua7', '$wk7', '$rbs7')";
    }

    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;

        // Redirect to high_risk.php with the ID as a parameter
        header("Location: choready.php?id=$unique_id");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
