<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
	$ashaID = $_SESSION['ashaID'];
	  $user = $_SESSION['user'];
      $pass = $_SESSION['pass'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Data</title>
    <link rel="stylesheet" href="xp3.css">
    <style>
        .black-text {
            color: black; /* Black color for the messages */
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .title-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .title-bar img {
            margin-right: 10px;
        }
        .title-text {
            margin-left: 10px; /* Add some space between logo and text */
        }
    </style>
</head>
<body>
<button class="logout-btn" onclick="logout()">Logout</button><br><br>
<!-- Woman ID Display -->
<div class="title-bar">
    <img src="img.png" alt="Logo" width="80" height="80" class="logo">
     <h5 class="title-text">HRPW Care: Supporting High-Risk Pregnant Women</h5>
    <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
   
</div>
<div class="woman-id">
    <h4>Woman ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></h4>
</div>

<div class="container">
    <!-- Pregnancy Data Box -->
    <div class="box box1" onclick="openPage('welx.php')">
        <h4>Pregnancy Data</h4>
        <!-- Add Pregnancy Data here if available -->
        <?php
        // Include the database connection file
        include 'db_connection.php';

        if (isset($_GET['id'])) {
            $woman_id = $conn->real_escape_string($_GET['id']);

            // Query to check if the woman ID is already present in the pregnancy_data table
            $check_query = "SELECT * FROM pregnant_data WHERE unique_id = '$woman_id'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in Pregnancy Data.</p>";
            }
        }
        ?>
    </div>

    <!-- Migration Data Box -->
    <div class="box box2" onclick="openPage('migra_data.php')">
        <h4>Migration Data</h4>
        <!-- Add Migration Data here if available -->
        <?php
        if (isset($_GET['id'])) {
            $woman_id = $conn->real_escape_string($_GET['id']);

            // Query to check if the woman ID is already present in the migrant_data table
            $check_query = "SELECT * FROM migration_data WHERE unique_id = '$woman_id'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in Migration Data.</p>";
            }
        }
        ?>
    </div>

    <!-- ANC Data Box -->
    <div class="box box3" onclick="openPage('anc_data.php')">
        <h4>ANC Data</h4>
        <!-- Add ANC Data here if available -->
        <?php
        if (isset($_GET['id'])) {
            $woman_id = $conn->real_escape_string($_GET['id']);

            // Query to check if the woman ID is already present in the anc_data table
            $check_query = "SELECT * FROM anc_data WHERE unique_id = '$woman_id'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in ANC Data.</p>";
            }
        }
        ?>
    </div>

    <!-- High Risk Data Box -->
    <div class="box box4" onclick="openPage('highrisk_data.php')">
        <h4>High Risk Data</h4>
        <!-- Add High Risk Data here if available -->
        <?php
        if (isset($_GET['id'])) {
            $woman_id = $conn->real_escape_string($_GET['id']);

            // Query to check if the woman ID is already present in the highrisk_data table
            $check_query = "SELECT * FROM highrisk_data WHERE unique_id = '$woman_id'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in High Risk Data.</p>";
            }
        }
        ?>
    </div>
     <div class="box box5" onclick="openPage('outcome.php')">
        <h4>Outcome of Pregnancy</h4>
        <!-- Add High Risk Data here if available -->
        <?php
        if (isset($_GET['id'])) {
            $woman_id = $conn->real_escape_string($_GET['id']);

            // Query to check if the woman ID is already present in the highrisk_data table
            $check_query = "SELECT * FROM outcome WHERE unique_id = '$woman_id'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in Outcome Data.</p>";
            }
        }
        ?>
    </div>
     <div class="box box4" onclick="openPage('miginfo.php')">
        <h4>Migration information</h4>
        <!-- Add High Risk Data here if available -->
        
    </div>

<div class="box box4" onclick="openPage('view.php')">
        <h4>Review Data</h4>
        <!-- Add High Risk Data here if available -->
        
    </div>
    
     <!--<div class="box box4" onclick="openPage('assign_asha.php')">
        <h4>Assigned Asha Details</h4>
        <!-- Add High Risk Data here if available -->
        
   

<div  class="box box4" onclick="checkDataAndRedirect()">
    <h4>New Entry</h4>
</div>

<script>
    function checkDataAndRedirect() {
        var womanID = '<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>';

        if (womanID !== '') {
            window.location.href = 'back.php?id=' + womanID;
        } else {
            alert('Woman ID is not available.');
        }
    }
</script>



<script>
    // Function to open pages with woman's unique ID
    function openPage(page) {
        var womanID = '<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>';
        if (womanID !== '') {
            window.location.href = page + '?id=' + womanID;
        } else {
            alert('Woman ID is not available.');
        }
    }

    function logout() {
        // Perform logout operation, for example:
        // Redirect to logout.php or clear session variables
        window.location.href = 'logout.php';
    }
    
    
     function checkSession() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_session.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'expired') {
                    alert('Your session has expired. You will be logged out.');
                    logout();
                }
            }
        };
        xhr.send();
    }

    setInterval(checkSession, 300000); // Check session status every 5 minutes (300,000 ms)
</script>

<!-- Input box example -->
   
</body>
</html>
