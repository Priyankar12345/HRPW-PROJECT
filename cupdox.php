<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];

    // Database connection
    $servername = "localhost";
    $db_username = "mission12345"; // Your MySQL username
    $db_password = "mission@1234567890"; // Your MySQL password
    $database = "nrhm"; // Your MySQL database name

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get unique_id from GET parameter
    $unique_id = isset($_GET['id']) ? $_GET['id'] : 'N/A';

    // Query to check ANC data
    $anc_data = [];
    $query = "SELECT * FROM anc_data WHERE unique_id = '$unique_id'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $anc_data = $result->fetch_assoc();
    }

    $conn->close();
?>

<style>
    .hidden {
        display: none;
    }
</style>
<!--html starts here-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Form</title>
    <!--<link rel="stylesheet" href="stylex.css" />!-->
    <link rel="stylesheet" type="text/css" href="previewForm/previewForm.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; /* Background color for the whole page */
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Background color for the form */
        }
        h2 {
            text-align: center;
        }
        .session-info {
            margin-bottom: 20px;
        }
        .input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        .submit {
            width: 30%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        .submit:hover {
            background-color: #45a049;
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
    <div class="container">
        <div class="title-bar">
            <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
            <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
        </div>

        <form id="pregnancyForm" method="post" enctype="multipart/form-data" onsubmit="return confSubmit(this);">
            <div>
                <div class="woman-id">
                    <h4>Woman ID: <?php echo $unique_id; ?></h4>
                    <h2></h2>
                </div>
                
                <div id="pregnancyQuestion">
                    <br>
                    <input class="input" type="hidden" name="unique_id" id="unique_id" value="<?php echo $unique_id; ?>" readonly>       
                    <div>
                        What you want to Update?<br><br>
                        <select class="input" id="pregnant" name="pregnant" required>
                            
                            <option value="">Select Option</option>
                            
                             <option value="no" data-href="uhighrisk_data.php">High Risk Details Update</option>
                            
                             <option value="no" data-href="umigra_data.php">Migration Details Update</option>
                            <?php if(empty($anc_data['bp1'])): ?>
                                <option value="no" data-href="tuanc.php">ANC 1 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp2'])): ?>
                                <option value="no" data-href="tuanc1.php">ANC 2 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp3'])): ?>
                                <option value="no" data-href="tuanc2.php">ANC 3 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp4'])): ?>
                                <option value="no" data-href="tuanc3.php">ANC 4 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp5'])): ?>
                                <option value="no" data-href="tuanc4.php">ANC 5 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp6'])): ?>
                                <option value="no" data-href="tuanc5.php">ANC 6 Details Update</option>
                            <?php endif; ?>
                            <?php if(empty($anc_data['bp7'])): ?>
                                <option value="no" data-href="tuanc6.php">ANC 7 Details Update</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <!--<input class="submit" type="submit" value="Submit" name="submit"> &nbsp &nbsp &nbsp!-->
                    <button class="submit" type="button" onclick="cancel()">Cancel</button>
                </div>
            </div>
        </form>

        <script> 
            $(document).ready(function() {
                $('#pregnant').change(function() {
                    var url = $(this).find(':selected').data('href');
                    var uniqueId = $('#unique_id').val();
                    if (url !== "") {
                        // Append unique_id as a query parameter to the URL
                        window.location.href = url + '?id=' + uniqueId;
                    }
                });
            });

             function togglePregnancyQuestions() {
                var pregnantSelect = document.getElementById("pregnant");
                var form = document.getElementById("pregnancyForm");

                if (pregnantSelect.value === "yes") {
                    form.action = "welx.php?id=<?php echo $unique_id; ?>"; // Redirect to welx.php if pregnant
                } else if (pregnantSelect.value === "no") {
                    form.action = "wel.php?id=<?php echo $unique_id; ?>"; // Redirect to wel.php if not pregnant
                }
            }

            function cancel() {
                window.location.href = "uxfind.php?id=<?php echo $unique_id; ?>"; // Redirect to uxfyind.php with Woman ID
            }
        </script>
    </div>
</body>
</html>

<?php
} else {
    echo "Session variables are not set.";
}
?>
