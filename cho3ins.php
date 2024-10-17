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

if  (isset($_POST["submit"])) {
	$unique_id = $conn->real_escape_string($_POST['unique_id']);
	$isia = $conn->real_escape_string($_POST['isia']);
	$doit = $conn->real_escape_string($_POST['doit']);
	$wisit = $conn->real_escape_string($_POST['wisit']);
    $orfnt = $conn->real_escape_string($_POST['orfnt']);
    $hlcist = $conn->real_escape_string($_POST['hlcist']);
    $bta = $conn->real_escape_string($_POST['bta']);
    $btd = $conn->real_escape_string($_POST['btd']);
    $btnd = $conn->real_escape_string($_POST['btnd']);
    $hlabt = $conn->real_escape_string($_POST['hlabt']);
    $mocaa = $conn->real_escape_string($_POST['mocaa']);
	$mbpp = $conn->real_escape_string($_POST['mbpp']);
	$canc1 = $conn->real_escape_string($_POST['canc1']);
	$cdanc1 = $conn->real_escape_string($_POST['cdanc1']);
	$chb1 = $conn->real_escape_string($_POST['chb1']);
	$cbp1 = $conn->real_escape_string($_POST['cbp1']);
	$cufa1 = $conn->real_escape_string($_POST['cufa1']);
	$cwt1 = $conn->real_escape_string($_POST['cwt1']);
	$cfhr1 = $conn->real_escape_string($_POST['cfhr1']);
	$cfh1 = $conn->real_escape_string($_POST['cfh1']);
	$cpe1 = $conn->real_escape_string($_POST['cpe1']);
	
    $canc2 = $conn->real_escape_string($_POST['canc2']);
	$cdanc2 = $conn->real_escape_string($_POST['cdanc2']);
	$chb2 = $conn->real_escape_string($_POST['chb2']);
	$cbp2 = $conn->real_escape_string($_POST['cbp2']);
	$cufa2 = $conn->real_escape_string($_POST['cufa2']);
	$cwt2 = $conn->real_escape_string($_POST['cwt2']);
	$cfhr2 = $conn->real_escape_string($_POST['cfhr2']);
	$cfh2 = $conn->real_escape_string($_POST['cfh2']);
	$cpe2 = $conn->real_escape_string($_POST['cpe2']);
	
	$canc3 = $conn->real_escape_string($_POST['canc3']);
	$cdanc3 = $conn->real_escape_string($_POST['cdanc3']);
	$chb3 = $conn->real_escape_string($_POST['chb3']);
	$cbp3 = $conn->real_escape_string($_POST['cbp3']);
	$cufa3 = $conn->real_escape_string($_POST['cufa3']);
	$cwt3 = $conn->real_escape_string($_POST['cwt3']);
	$cfhr3 = $conn->real_escape_string($_POST['cfhr3']);
	$cfh3 = $conn->real_escape_string($_POST['cfh3']);
	$cpe3 = $conn->real_escape_string($_POST['cpe3']);
	
	$canc4 = $conn->real_escape_string($_POST['canc4']);
	$cdanc4 = $conn->real_escape_string($_POST['cdanc4']);
	$chb4 = $conn->real_escape_string($_POST['chb4']);
	$cbp4 = $conn->real_escape_string($_POST['cbp4']);
	$cufa4 = $conn->real_escape_string($_POST['cufa4']);
	$cwt4 = $conn->real_escape_string($_POST['cwt4']);
	$cfhr4 = $conn->real_escape_string($_POST['cfhr4']);
	$cfh4 = $conn->real_escape_string($_POST['cfh4']);
	$cpe4 = $conn->real_escape_string($_POST['cpe4']);
	
	$canc5 = $conn->real_escape_string($_POST['canc5']);
	$cdanc5 = $conn->real_escape_string($_POST['cdanc5']);
	$chb5 = $conn->real_escape_string($_POST['chb5']);
	$cbp5 = $conn->real_escape_string($_POST['cbp5']);
	$cufa5 = $conn->real_escape_string($_POST['cufa5']);
	$cwt5 = $conn->real_escape_string($_POST['cwt5']);
	$cfhr5 = $conn->real_escape_string($_POST['cfhr5']);
	$cfh5 = $conn->real_escape_string($_POST['cfh5']);
	$cpe5 = $conn->real_escape_string($_POST['cpe5']);
	$idn = $conn->real_escape_string($_POST['idn']);
	
	
$targetDir = "Birth Plan Card/";
$fileName = isset($_FILES["image2"]["name"]) ? basename($_FILES["image2"]["name"]) : "";
$targetFilePath = $targetDir . $fileName;

// Generate a unique folder name (You can modify this as needed)
$uniqueNumber = uniqid();
$folderName = $id_no . "_"  . $uniqueNumber;

// Check if folder exists, if not, create it
if (!file_exists($targetDir . $folderName)) {
    mkdir($targetDir . $folderName, 0777, true);
}

$targetFilePath = $targetDir . $folderName . '/' . $fileName;

// Check if file is uploaded successfully, if not set a default value
if (!empty($fileName) && move_uploaded_file($_FILES["image2"]["tmp_name"], $targetFilePath)) {
    // File uploaded successfully, use the uploaded file path
} else {
    $targetFilePath = "default/path/to/image.jpg";
}
}
// Insert or update data into database
$sql = "INSERT INTO cho_data (
            unique_id,isia,doit,wisit,orfnt,hlcist,bta,btd,btnd,hlabt,mocaa,mbpp,image2_path,canc1,cdanc1,chb1,cbp1,cufa1,cwt1,cfhr1,cfh1,cpe1,canc2,cdanc2,chb2,cbp2,cufa2,cwt2,cfhr2,
            cfh2,cpe2,canc3,cdanc3,chb3,cbp3,cufa3,cwt3,cfhr3,cfh3,cpe3,canc4,cdanc4,chb4,cbp4,cufa4,cwt4,cfhr4,cfh4,cpe4,canc5,cdanc5,chb5,cbp5,cufa5,cwt5, cfhr5,cfh5,cpe5,idn
        ) 
        VALUES (
            '$unique_id','$isia','$doit','$wisit','$orfnt','$hlcist','$bta','$btd','$btnd','$hlabt','$mocaa','$mbpp','$targetFilePath','$canc1','$cdanc1','$chb1','$cbp1','$cufa1',
            '$cwt1','$cfhr1','$cfh1','$cpe1','$canc2','$cdanc2','$chb2','$cbp2','$cufa2','$cwt2','$cfhr2','$cfh2','$cpe2','$canc3',           '$cdanc3',
            '$chb3',
            '$cbp3',
            '$cufa3',
            '$cwt3',
            '$cfhr3',
            '$cfh3',
            '$cpe3','$canc4','$cdanc4','$chb4','$cbp4','$cufa4','$cwt4','$cfhr4','$cfh4','$cpe4','$canc5','$cdanc5','$chb5','$cbp5','$cufa5','$cwt5','$cfhr5','$cfh5','$cpe5','$idn'
        ) 
        ON DUPLICATE KEY UPDATE 
            isia = VALUES(isia),
            doit = VALUES(doit),
            wisit = VALUES(wisit),
            orfnt = VALUES(orfnt),
            hlcist = VALUES(hlcist),
            bta = VALUES(bta),
            btd = VALUES(btd),
            btnd = VALUES(btnd),
            hlabt = VALUES(hlabt),
            mocaa = VALUES(mocaa),
            mbpp = VALUES(mbpp),
            image2_path = VALUES(image2_path),
            canc1 = VALUES(canc1),
            cdanc1 = VALUES(cdanc1),
            chb1 = VALUES(chb1),
            cbp1 = VALUES(cbp1),
            cufa1 = VALUES(cufa1),
            cwt1 = VALUES(cwt1),
            cfhr1 = VALUES(cfhr1),
            cfh1 = VALUES(cfh1),
            cpe1 = VALUES(cpe1),
            canc2 = VALUES(canc2),
            cdanc2 = VALUES(cdanc2),
            chb2 = VALUES(chb2),
            cbp2 = VALUES(cbp2),
            cufa2 = VALUES(cufa2),
            cwt2 = VALUES(cwt2),
            cfhr2 = VALUES(cfhr2),
            cfh2 = VALUES(cfh2),
            cpe2 = VALUES(cpe2),
            canc3 = VALUES(canc3),
            cdanc3 = VALUES(cdanc3),
            chb3 = VALUES(chb3),
            cbp3 = VALUES(cbp3),
            cufa3 = VALUES(cufa3),
            cwt3 = VALUES(cwt3),
            cfhr3 = VALUES(cfhr3),
            cfh3 = VALUES(cfh3),
            cpe3 = VALUES(cpe3),
            canc4 = VALUES(canc4),
            cdanc4 = VALUES(cdanc4),
            chb4 = VALUES(chb4),
            cbp4 = VALUES(cbp4),
            cufa4 = VALUES(cufa4),
            cwt4 = VALUES(cwt4),
            cfhr4 = VALUES(cfhr4),
            cfh4 = VALUES(cfh4),
            cpe4 = VALUES(cpe4),
            canc5 = VALUES(canc5),
            cdanc5 = VALUES(cdanc5),
            chb5 = VALUES(chb5),
            cbp5 = VALUES(cbp5),
            cufa5 = VALUES(cufa5),
            cwt5 = VALUES(cwt5),
            cfhr5 = VALUES(cfhr5),
            cfh5 = VALUES(cfh5),
             cpe5 = VALUES(cpe5)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    // Redirect to thank you page with inserted ID
    header("Location: creadygo.php?id=$unique_id");
    exit(); // Make sure to exit after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

