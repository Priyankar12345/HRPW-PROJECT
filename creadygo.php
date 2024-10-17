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
    <link rel="stylesheet" href="nexa.css">
    <style>
        .box.disabled {
            pointer-events: none; /* Disable click events */
            opacity: 0.6; /* Dim the box to indicate it's disabled */
        }
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
    <button class="logout-btn" onclick="logout()">Logout</button><br><br>
	  
	<div class="title-bar">
        <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
        <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
    </div>

    <div class="container">
        <!-- Pregnancy Data Box -->
        <div class="box box1" onclick="openPage('fpregc.php')">
            <h4>Pregnancy Data</h4>
            <!-- Add Pregnancy Data here if available -->
        </div>

        <!-- Migration Data Box -->
        <div class="box box2" onclick="openPage('fmigra_data.php')">
            <h4>Migration Data</h4>
            <!-- Add Migration Data here if available -->
        </div>

        <!-- ANC Data Box -->
        <div class="box box3" onclick="openPage('fanc_data.php')">
            <h4>ANC Data</h4>
            <!-- Add ANC Data here if available -->
        </div>

        <!-- High Risk Data Box -->
        <div class="box box4" onclick="openPage('fhighrisk_data.php')">
            <h4>High Risk Data</h4>
            <!-- Add High Risk Data here if available -->
        </div>

        <div class="box box5" onclick="openPage('cho2.php')">
            <h4>USG DETAILS</h4>
            <?php
            // Include the database connection file
            include 'db_connection.php';

            if (isset($_GET['id'])) {
                $woman_id = $conn->real_escape_string($_GET['id']);

                // Query to check if the woman ID is already present in the pregnancy_data table
                $check_query = "SELECT * FROM chox_data WHERE unique_id = '$woman_id'";
                $result = $conn->query($check_query);

                if ($result->num_rows > 0) {
                    echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in USG Details.</p>";
                }
            }
            ?>
        </div>

        <div class="box box6" onclick="openPage('cho3.php')">
            <h4>Management of Severe Anemia in HRPW cases</h4>
            <?php
            // Include the database connection file
            include 'db_connection.php';

            if (isset($_GET['id'])) {
                $woman_id = $conn->real_escape_string($_GET['id']);

                // Query to check if the woman ID is already present in the pregnancy_data table
                $check_query = "SELECT * FROM cho_data WHERE unique_id = '$woman_id'";
                $result = $conn->query($check_query);

                if ($result->num_rows > 0) {
                    echo "<p class='black-text'>Data for Woman ID $woman_id is already inserted in Management of Severe Anemia in HRPW cases.</p>";
                }
            }
            ?>
        </div>

        <div class="box box7" onclick="openPage('rview.php')">
            <h4>View Report</h4>
            <!-- Add Report View Data here if available -->
        </div>

        <div class="box box8" onclick="openPage('back3.php')">
            <h4>New Entry</h4>
            <!-- Add New Entry Data here if available -->
        </div>
    </div>

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
</body>
</html>
