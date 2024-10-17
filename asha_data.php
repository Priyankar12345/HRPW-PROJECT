<?php
// Database configuration
// Database connection
$servername = "localhost";
$username = "mission12345";
$password = "mission@1234567890";
$dbname = "nrhm";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitize_input($input) {
    // Remove leading and trailing whitespace
    $input = trim($input);
    // Remove backslashes
    $input = stripslashes($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}

// Check if 'id' parameter is passed in the URL
if(isset($_GET['id'])) {
    // Extract the value of 'id' parameter
    $ashaID = sanitize_input($_GET['id']); // Sanitize the input
    // Decode the received ID to get the original format
    $ashaID = urldecode($ashaID);
} else {
    $ashaID = ''; // Set a default value if 'id' parameter is not provided
}

// Query to fetch Unique IDs based on ASHA ID from the register_women table
$query = "SELECT unique_id FROM register_woman WHERE ashaID = '$ashaID' and status=''";
$result = mysqli_query($connection, $query);

if (!$result) {
    // Handle query error
    echo "Error: " . mysqli_error($connection);
    exit;
}

$unique_ids = array();
// Fetch all Unique IDs associated with the ASHA ID
while ($row = mysqli_fetch_assoc($result)) {
    $unique_ids[] = $row["unique_id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Health </title>
    <link rel="stylesheet" href="stylesxpx.css">
	
	<style>
	.title-bar {
    display: flex;
    justify-content: center; /* Horizontally center */
    align-items: center; /* Vertically center */
    padding: 20px; /* Adjust as needed */
}

.title-bar img {
    margin-right: 10px; /* Adjust as needed */
}
</style>
</head>
<body>
<!-- HTML form with dropdown -->
<div class="card-container">
    <div class="card">
        <div class="card-content">
            <div class="title-bar">
                <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
                <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
            </div>

            <form method="GET" action="su1.php">
                <label for="unique_id">Select Women Unique ID:</label><br>
                <select class='input' id="unique_id" name="id" style="height: 30px; width: 200px;">
                    <?php foreach ($unique_ids as $id) : ?>
                        <option value="<?php echo htmlspecialchars($id); ?>"><?php echo $id; ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                <input type="submit" value="Submit"> &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; 
                <input class="submit" type="button" value="Cancel" onclick="cancel()"><br><br>
                 
            </form>
            
             <script>
        function cancel() {
            window.location.href = "supervisor_home.php";
        }
    </script>
        </div>
    </div>
</div>
