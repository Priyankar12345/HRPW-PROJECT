<?php
session_start();

// Check if the session variables are set
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
    $ashaID = $_SESSION['ashaID'];
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
}

// Function to fetch and display records
function fetchRecords($search, $username) {
    // Database credentials
    $servername = "localhost"; // your server name
    $dbusername = "mission12345"; // your database username
    $dbpassword = "mission@1234567890"; // your database password
    $dbname = "nrhm"; // your database name

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to search the register_woman table using the session username
    $sperson = $username; // Using session username here
    if ($search == "") {
        $sql = "SELECT unique_id, pagwoman FROM register_woman WHERE caname='$sperson' ORDER BY unique_id DESC";
    } else {
        $sql = "SELECT unique_id, pagwoman FROM register_woman WHERE caname='$sperson' AND (pagwoman LIKE '%$search%' OR unique_id LIKE '%$search%') ORDER BY unique_id DESC";
    }
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Uncomplete</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            $unique_id = $row["unique_id"];
            $status = "";

            // Check if unique_id exists in each table
            $tables = [
                "pregnant_data" => "1",
                "migration_data" => "2",
                "anc_data" => "3",
                "highrisk_data" => "4",
                "outcome" => "5"
            ];

            foreach ($tables as $table => $number) {
                $sql_check = "SELECT unique_id FROM $table WHERE unique_id='$unique_id'";
                $result_check = $conn->query($sql_check);
                if ($result_check->num_rows == 0) {
                    $status .= "<span class='status-circle'>$number</span> "; // Add number if not present in table
                }
            }

            // If status is empty, the unique_id is present in all tables
            if (empty($status)) {
                continue; // Skip this row if unique_id is present in all tables
            }

            echo "<tr>
                    <td>" . $row["unique_id"] . "</td>
                    <td>" . $row["pagwoman"] . "</td>
                    <td>" . $status . "</td>
                    <td><button onclick='updateRecord(\"" . $row["unique_id"] . "\")'>Go</button></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results found";
    }

    // Close connection
    $conn->close();
}

// Fetch all records when the page loads
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    fetchRecords($_POST['query'], $username);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Health</title>
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

        .table-container {
            width: 100%; /* Adjust width as needed */
            margin: 20px auto;
            border: 1px solid #ddd;
            max-height: 400px; /* Adjust height as needed */
            overflow-y: auto;
        }

        .status-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: red;
            color: white;
            text-align: center;
            line-height: 20px;
        }

        .cancel-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .cancel-button:hover {
            background-color: darkred;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Fetch all records when the page loads
            fetchRecords('');

            // Fetch records based on search query
            $("#search").keyup(function(){
                var query = $(this).val();
                fetchRecords(query);
            });
        });

        function fetchRecords(query) {
            $.ajax({
                url: '',
                method: 'POST',
                data: {query: query},
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }

        function updateRecord(id) {
            console.log("Updating record with ID:", id); // Debugging statement
            window.location.href = "choready.php?id=" + id;
        }

        function copyToInput(uniqueId) {
            document.getElementById("unique_id").value = uniqueId;
        }

        function cancel() {
            window.location.href = "cho_startextra.php";
        }
        
        // Function to check session status
        function checkSession() {
            console.log('Checking session status...'); // Debugging
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'check_session.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Response received: ', xhr.responseText); // Debugging
                    var response = JSON.parse(xhr.responseText);
                    if (response.status === 'expired') {
                        alert('Your session has expired. You will be logged out.');
                        logout();
                    }
                } else {
                    console.error('Failed to check session status.'); // Debugging
                }
            };
            xhr.onerror = function() {
                console.error('An error occurred during the request.'); // Debugging
            };
            xhr.send();
        }

        function logout() {
            window.location.href = 'logout.php';
        }

        setInterval(checkSession, 300000); // Check session status every 5 minutes (300,000 ms)
    </script>
</head>
<body>

<div class="card-container">
    <div class="card">
        <div class="card-content">
            <div class="title-bar">
                <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
                <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
            </div>
            <input type="text" id="search" placeholder="Enter letter or number">
            <div class="table-container" id="result">
                <?php fetchRecords('', $username); ?>
            </div>
            <button onclick="cancel()" class="cancel-button">Cancel</button>
        </div>
    </div>
</div>

</body>
</html>
