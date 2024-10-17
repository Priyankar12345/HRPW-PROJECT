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

$unique_id = '';
$found_unique_id = ''; // Variable to store found Woman ID
if (isset($_POST['submit'])) {
    // If the form is submitted with woman ID
    if (!empty($_POST['unique_id'])) {
        $unique_id = $conn->real_escape_string($_POST['unique_id']);
        // Check if the woman ID exists in the database
        $check_sql = "SELECT unique_id FROM register_woman WHERE unique_id = '$unique_id'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Woman ID found, redirect to readygo.php with ID
            header("Location: choready.php?id=$unique_id");
            exit(); // Make sure to exit after redirection
        } else {
            echo "Woman ID not found. Please try again.";
        }
    } elseif (!empty($_POST['mobile_number'])) { // If the form is submitted with mobile number
        $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
        // Check if the mobile number exists in the database
        $check_mobile_sql = "SELECT unique_id FROM register_woman WHERE hmno = '$mobile_number'";
        $result_mobile = $conn->query($check_mobile_sql);

        if ($result_mobile->num_rows > 0) {
            // Woman ID found, store it for display
            $row = $result_mobile->fetch_assoc();
            $found_unique_id = $row['unique_id'];
        } else {
            echo "Mobile number not associated with any Woman ID.";
        }
    }
}
?>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Health </title>
    <link rel="stylesheet" href="stylesxpx.css">
</head>
<body>

<div class="card-container">
    <div class="card">
        <div class="card-content">
		
		<div class="title-bar">
    <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
    <h5>ACTION FOR
    REDUCTION OF<br>
    MATERNAL AND NEONATAL<br> DEATHS
    IN TINSUKIA DISTRICT</h5>
</div>
    <form method="POST" action="">
        <label for="unique_id">Enter Woman ID:</label><br>
        <input type="text" id="unique_id" name="unique_id" value="<?php echo $unique_id; ?>"><br><br>
        
         <input type="submit" name="submit" value="Submit"> &nbsp &nbsp &nbsp
          <input class="submit" type="button" value="Cancel" onclick="cancel()"><br><br>
        <label for="mobile_number">Or enter Mobile Number:</label><br>
        <input type="text" id="mobile_number" name="mobile_number" placeholder="Enter Mobile Number"><br><br>
        
        <input type="submit" name="submit" value="Search by Mobile Number"><br>
		
    </form>
    <script>
        function cancel() {
            window.location.href = "startx.php";
        }
    </script>
    <!-- Display found Woman ID -->
    <?php if (!empty($found_unique_id)) : ?>
        <br>
        <div>Woman ID found: <?php echo $found_unique_id; ?></div>
    <?php endif; ?>
</div>
</div>
</div>

</body>
</html>
