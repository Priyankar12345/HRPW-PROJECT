<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
   	$blockPHC=$_SESSION['blockPHC'];
   	$medicalOffice=$_SESSION['medicalOffice'];
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
	
    // Include the database connection file
    include 'db_connection.php';

    // Check if Block PHC is provided
    if (isset($blockPHC)) {
        $blockPHC = $conn->real_escape_string($blockPHC);

        // Prepare and execute the SQL query
        $sql = "SELECT DISTINCT Gaon_Panchayat_Name FROM asha_list WHERE BPHC = '$blockPHC'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Data found, fetch and store panchayat names
            $panchayat_names = [];
            while ($row = $result->fetch_assoc()) {
                $panchayat_names[] = $row['Gaon_Panchayat_Name'];
            }
        } else {
            // No data found for the given Block PHC
            echo "<script>alert('No data found for this Block PHC.'); window.location='chsurveystart.php?id=$unique_id';</script>";
        }
    } else {
        // No Block PHC provided
        echo "<script>alert('Block PHC not provided.'); window.location=' creadygo.php';</script>";
        // Redirect or do something else as needed
        exit; // Stop further execution
    }
} else {
    // Session variables not set, redirect or handle as needed
}
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
	
	<title>Session Info</title>
    <style>
        /* Your CSS styles for the page */
        .hidden {
            display: none;
        }
    </style>
</head>

<body>

      <div class="container">
        <div class="title-bar">
    <img src="img.png" alt="Logo" width="80" height="80">
    <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
     <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
</div>
        
		
		
   <form action="chsurveyins.php" method="post" enctype="multipart/form-data">
    <div>
        <br><input class="input " type="hidden" name="date" id="date" readonly>
    </div>

    <div>
        <br><input class="input " type="hidden" name="time" id="time" readonly>
    </div>

    <div>
        <br>
        <input class="input " type="hidden" name="geoLocation" id="geoLocation" readonly>
    </div>

    <div id="pregnancyQuestion">
        <br>
        <input class="input" type="hidden" name="pregnant" id="pregnant" value="no">
    </div>

    Enter the MCTS / RCH ID : :<br>
    <input class="input" type="text" name="mts_id" id="mts_id" value="" required>
    <br><br>

    Select the state :<br>
    <select class="input" id="state" name="state" value="" required onchange="showExtraFields(this.value)">
        <option value="Assam">ASSAM</option>
    </select><br><br>

    Select the District :<br>
    <select class="input" id="District" name="District" value="" required onchange="showExtraFields(this.value)">
        <option value="Tinsukia">Tinsukia</option>
    </select><br><br>

    <label>Block</label>
    <select class="input" name="block" id="block" class="form-control" onchange="populateGPs()">
        <option value="">Select</option>
        <option value="Guijan">Guijan</option>
        <option value="Hapjan">Hapjan</option>
        <option value="Itakhuli">Itakhuli</option>
        <option value="Kakopathar">Kakopathar</option>
        <option value="Margherita">Margherita</option>
        <option value="Sadiya">Sadiya</option>
        <option value="Saikhowa">Saikhowa</option>
    </select><br><br>

    Enter the Block PHC :<br>
    <input class="input" type="text" name="BPHC" id="BPHC" value="<?php echo $blockPHC; ?>"readonly>
    <br><br> 

    <label>Select the Panchayat:</label><br>
    <select class="input" name="panchayat" id="panchayat">
        <option value="">Select</option>
        <?php
        // PHP code to populate panchayat dropdown options
        foreach ($panchayat_names as $panchayat) {
            echo "<option value='$panchayat'>$panchayat</option>";
        }
        ?>
    </select><br><br>

    <label>Select the Revenue Village:</label><br>
    
   <input class="input" type="text" name="revenue_village" id="revenue_village" value="" required>
    <br><br>

    Enter the Subcenter/ HWC Name:<br>
    <input class="input" type="text" name="subcenter" id="subcenter" value="" required>
    <br><br>

     Name of the ANM / CHO :<br><input class="input" type="text" name="caname" id="caname" value="<?php echo $user; ?>" readonly><br>
     Name of the Medical Officer:<br><input class="input" type="text" name="medicalOffice" id="caname" value="<?php echo $medicalOffice; ?>" readonly><br>
    Phone No. of the ANM / CHO :<br><input class="input" type="text" name="canum" id="canum" value="<?php echo $pass; ?>" readonly><br>
    DESIGNATION<br><input class="input" type="text" name="desi" id="desi" value="<?php echo $designation; ?>" readonly><br>
    Name of the  Woman :<br><input class="input" type="text" name="pagwoman" id="pagwoman" value="" required><br>
    Woman Age :<br><input class="input" type="number" name="pagwomanage" id="pagwomanage" value="" required><br>
    Husband / woman Mobile  no :<br><input class="input" type="tel" name="hmno" id="hmno" value="" pattern="\d{10}" maxlength="10" oninput="validateInput(this)"required><br>
    <input class="submit" type="submit" value="Submit" name="submit"> &nbsp &nbsp &nbsp
    <button class="submit" type="button" onclick="cancel()">Cancel</button>

    <script>
        function toggleImageInput() {
            var menstruationCard = document.getElementById("menstruationCard");
            var imageInput = document.getElementById("imageInput");

            if (menstruationCard.value === "yes") {
                imageInput.style.display = "block";
            } else {
                imageInput.style.display = "none";
            }
        }
    </script>

    <script>
        function showAdditionalInfo() {
            var selectBox = document.getElementById("pregnant");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            if (selectedValue === "yes") {
                document.getElementById("additionalInfo").style.display = "block";
            } else {
                document.getElementById("additionalInfo").style.display = "none";
            }
        }

        function cancel() {
            window.location.href = "cho_startextra.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"; // Redirect to readygo.php with Woman ID
        }
    </script>

    <script type="text/javascript">
        function showExtraFields(value) {
            var pregnancyQuestion = document.getElementById('pregnancyQuestion');
            var patientNoQuestion = document.getElementById('patientNoQuestion');

            // Reset fields
            pregnancyQuestion.style.display = 'none';
            patientNoQuestion.style.display = 'none';

            // Show extra fields based on designation
            if (value === 'ANM' || value === 'ASHA' || value === 'ASHA SUPERVISOR' || value === 'MPW') {
                pregnancyQuestion.style.display = 'block';
            } else if (value === 'CHO') {
                patientNoQuestion.style.display = 'block';
            }
        }

        function getDateAndTime() {
            var currentDate = new Date();
            var dateField = document.getElementById('date');
            var timeField = document.getElementById('time');

            var year = currentDate.getFullYear();
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var day = ("0" + currentDate.getDate()).slice(-2);

            var hours = currentDate.getHours();
            var minutes = ("0" + currentDate.getMinutes()).slice(-2);
            var seconds = ("0" + currentDate.getSeconds()).slice(-2);

            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            hours = ("0" + hours).slice(-2);

            var dateString = year + "-" + month + "-" + day;
            var timeString = hours + ":" + minutes + ":" + seconds + ' ' + ampm;

            dateField.value = dateString;
            timeField.value = timeString;

            // Get geo location
            getLocation();
        }

        function confSubmit(form) {
            if (confirm("Are you sure you want to submit the form?")) {
                form.submit();
            } else {
                alert("You decided not to submit the form!");
            }
        }

        // Get initial date and time when the page loads
        window.onload = function() {
            getDateAndTime();
        };

        // Get geo location
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var geoLocationField = document.getElementById("geoLocation");
            geoLocationField.value = "Latitude: " + latitude + ", Longitude: " + longitude;
        }
        
        function validateMobileNumber() {
                        var mobileInput = document.getElementById("password");
                        var mobileNumber = mobileInput.value;

                        if (!/^\d{10}$/.test(mobileNumber)) {
                            alert("Please enter a valid 10-digit mobile number.");
                            mobileInput.focus();
                            return false;
                        }

                        return true;
                    }
                    
                    
                     function validateInput(input) {
                        input.value = input.value.replace(/[^0-9]/g, '');
                    }

                    function validateMobileNumber() {
                        var mobileInputs = document.querySelectorAll('input[type="tel"]');
                        for (var i = 0; i < mobileInputs.length; i++) {
                            var mobileNumber = mobileInputs[i].value;

                            if (!/^\d{10}$/.test(mobileNumber)) {
                                alert("Please enter a valid 10-digit mobile number.");
                                mobileInputs[i].focus();
                                return false;
                            }
                        }

                        return true;
                    }

    </script>
</form>
</body>
</html>


