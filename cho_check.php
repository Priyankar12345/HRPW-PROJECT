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
    $unique_id = $_SESSION['unique_id']; // Get unique_id from session
}

// Function to fetch and display records
function fetchRecords($search) {
    global $username;

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

    // Use parameterized queries to prevent SQL injection
    $stmt = $conn->prepare("SELECT unique_id, pagwoman FROM register_woman WHERE (pagwoman LIKE ? OR unique_id LIKE ?) AND medicalOffice = ? ORDER BY unique_id DESC");
    $searchPattern = '%' . $search . '%';
    $stmt->bind_param("sss", $searchPattern, $searchPattern, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='table-container'><table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>incomplete</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            $unique_id = $row["unique_id"];
            $status = "";

            // Check if unique_id exists in all specified tables
            $tables = [
                "pregnant_data",
                "migration_data",
                "anc_data",
                "highrisk_data",
                "outcome"
            ];

            $allPresent = true;
            foreach ($tables as $table) {
                $sql_check = "SELECT unique_id FROM $table WHERE unique_id='$unique_id'";
                $result_check = $conn->query($sql_check);
                if ($result_check->num_rows == 0) {
                    $allPresent = false;
                    break;
                }
            }

            // Check if unique_id is present in cho_data and chox_data tables
            $sql_check_cho = "SELECT unique_id FROM cho_data WHERE unique_id='$unique_id'";
            $result_check_cho = $conn->query($sql_check_cho);
            $sql_check_chox = "SELECT unique_id FROM chox_data WHERE unique_id='$unique_id'";
            $result_check_chox = $conn->query($sql_check_chox);

            if ($allPresent) {
                if ($result_check_cho->num_rows == 0) {
                    $status .= "<span class='status-circle'>6</span> ";
                }
                if ($result_check_chox->num_rows == 0) {
                    $status .= "<span class='status-circle'>7</span> ";
                }

                // If unique_id is present in both cho_data and chox_data, show "View" button
                if ($result_check_cho->num_rows > 0 && $result_check_chox->num_rows > 0) {
                    echo "<tr>
                            <td>" . $row["unique_id"] . "</td>
                            <td>" . $row["pagwoman"] . "</td>
                            <td></td> <!-- Uncomplete field is blank -->
                            <td><button onclick='window.location.href=\"viewx.php?id=" . $row["unique_id"] . "\"'>View</button></td>
                          </tr>";
                } else {
                    // If not present in both cho_data and chox_data, show the status and "Go" button
                    echo "<tr>
                            <td>" . $row["unique_id"] . "</td>
                            <td>" . $row["pagwoman"] . "</td>
                            <td>" . $status . "</td>
                            <td><button onclick='updateRecord(\"" . $row["unique_id"] . "\")'>Go</button></td>
                          </tr>";
                }
            }
        }
        echo "</table></div>";
    } else {
        echo "0 results found";
    }

    // Close connection
    $stmt->close();
    $conn->close();
}

// Fetch all records when the page loads
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['query'])) {
    fetchRecords($_POST['query']);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Existing styles */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            margin-top: 20px;
        }

        .status-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            background-color: red;
            color: white;
            text-align: center;
            border-radius: 50%;
            font-size: 14px;
            margin-right: 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .logout-icon {
            color: red;
            cursor: pointer;
            margin-left: 10px;
            font-size: 18px;
        }

        .logout-icon:hover {
            color: darkred;
        }

        .session-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .session-fields {
            display: flex;
            align-items: center;
        }

        .cho-monitor-strip {
            background-color: #f2f2f2;
            border: 2px solid #007bff;
            padding: 10px;
            margin: 20px 0;
            text-align: center;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .cho-monitor-strip:hover {
            background-color: #007bff;
            color: white;
        }

        .cho-monitor-strip a {
            text-decoration: none;
            color: inherit;
            font-size: 20px;
            font-weight: bold;
        }
        
        
        .logo {
    display: inline-block; /* Keeps images on the same line */
    margin-right: 90px;    /* Adds space between the logos */
    vertical-align: middle; /* Aligns logos vertically */
}

.logo:last-of-type {
    margin-right: 0; /* Removes margin from the last image */
}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            fetchRecords('');
            $("#search").keyup(function(){
                var query = $(this).val();
                fetchRecords(query);
            });

            updateDateTime();
            setInterval(updateDateTime, 1000);
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
            console.log("Updating record with ID:", id);
            window.location.href = "creadygo.php?id=" + id;
        }

        function copyToInput(uniqueId) {
            document.getElementById("unique_id").value = uniqueId;
        }

        function cancel() {
            window.location.href = "cho_check.php";
        }

        function openModal() {
            var modal = document.getElementById('changePasswordModal');
            modal.style.display = 'block';
        }

        function closeModal() {
            var modal = document.getElementById('changePasswordModal');
            modal.style.display = 'none';
        }

        function changePassword() {
            openModal();
        }

        function submitNewPassword() {
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                alert('Passwords do not match. Please try again.');
                return;
            }

            $.ajax({
                url: 'update_password.php',
                method: 'POST',
                data: {
                    unique_id: '<?php echo $unique_id; ?>',
                    newPassword: newPassword
                },
                success: function(response) {
                    alert('Password updated successfully.');
                    closeModal();
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while updating password: ' + error);
                }
            });
        }

        function updateDateTime() {
            var now = new Date();
            var date = now.toLocaleDateString();
            var time = now.toLocaleTimeString();
            document.getElementById('currentDate').innerText = date;
            document.getElementById('currentTime').innerText = time;
        }

        function logout() {
            window.location.href = 'logout.php';
        }
    </script>
</head>
<body>
<div class="card-container">
    <div class="card">
        <div class="card-content">
            <div class="title-bar">
                <img src="img.png" alt="Logo" width="80" height="90" class="logo">
                 <img src="FISS_Logo.png" alt="Logo" width="60" height="60" class="logo">
                <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
                
            </div>
            
            <div class="session-info">
                <div class="session-fields">
                    <h4>Hello <?php echo $username; ?>!
                        <br><br>Date: <span id="currentDate"></span> &nbsp;&nbsp; Time: <span id="currentTime"></span>
                    </h4>
                    <input type="hidden" id="username" value="<?php echo $username; ?>" readonly>
                </div>
                <i class="fas fa-sign-out-alt logout-icon" onclick="logout()"></i>
            </div>
            
            <div class="cho-monitor-strip">
                <a href="uxii.php">CHO Monitor</a>
            </div>
            
            <input type="text" id="search" placeholder="Enter letter or number">
            <div class="table-container" id="result">
                <?php fetchRecords(''); ?>
            </div>
            <button onclick="cancel()" class="cancel-button">Cancel</button><br><br>
            <button onclick="changePassword()" class="cancel-button">Change Password</button>
        </div>
    </div>
</div>

<div id="changePasswordModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Change Password</h2>
        <label for="newPassword">New Password:</label><br>
        <input type="password" id="newPassword"><br><br>
        <label for="confirmPassword">Confirm Password:</label><br>
        <input type="password" id="confirmPassword"><br><br>
        <button onclick="submitNewPassword()">Submit</button>
    </div>
</div>

</body>
</html>
