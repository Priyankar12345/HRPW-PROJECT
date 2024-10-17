

<?php
// Initialize variables to null.
$nameError ="";
$emailError ="";
$genderError ="";
$websiteError ="";

//On submitting form below function will execute

 if(isset($_POST['submit'])){
   if (empty($_POST["name"])) {
     $nameError = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameError = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailError = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid or not
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailError = "Invalid email format";
     }
   }
     
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // check address syntax is valid or not(this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteError = "Invalid URL"; 
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderError = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//php code ends here 
//session_name('info');
//session_start();

// Check if woman_id is passed in the URL
if (isset($_GET['woman_id'])) {
    // Sanitize the input
    $woman_id = htmlspecialchars($_GET['woman_id']);
} else {
    // If woman_id is not passed, you can handle as needed
    $woman_id = "Woman ID Not Provided";
}

?>
<style>
        .hidden {
            display: none;
        }
    </style>
<!--html starts here-->
<!DOCTYPE HTML> 
<html>
<?php session_name('info');
      session_start();?>
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
    <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
    <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
</div>
    <form action="cho2ins.php" method="post" enctype="multipart/form-data">
	
	  <div>
		             <div class="woman-id">
        <h4>Woman ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></h4>
		
		         <h2>Woman USG Details!</h2>
    </div>
    <input class="input " type="hidden" name="unique_id" id="unique_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"  readonly>	  
   <br>USG done during pregnancy:<br>
    <select class="input" id="uddp" name="uddp" onchange="handleMigrationSelection()">
	   
        <option value="yes">Yes</option>
		<option value="advisecd but not done">Advisecd but not done</option>
        <option value="no">No</option>
    </select><br>

   	    Finding of last USG :<br>
                <select class="input" id="flu" name="flu" value="" required onchange="showExtraFields(this.value)">
                    <option value="within normal limits">Within Normal Limits</option>
					<option value="twin pregnancy/multiple pregnancy">Twin pregnancy/Multiple pregnancy</option>
					<option value="placenta praevia">Placenta Praevia</option>
					 <option value="IUGR">Placenta Praevia</option>
					 <option value="oligohydramnios">Placenta Praevia</option>
					 <option value="cord around the neck">Placenta Praevia</option>
					 <option value="other siginficant findings">Placenta Praevia</option>
					 </select><br>	
       				
		         Mention other significant USG findings:<br><br>
		         <input class="input" type="text" name="mouf" id="mouf" value="">
                 <br>	
					 
					 At what gestational week was the last USG done?:<br>
                     <input class="input" type="text" id="wgwlu" name="wgwlu"><br><br>	 
		
       

       <!-- JavaScript to show/hide high risk fields -->

			
		
		
   			 <script>
    function showPart(part) {
        var parts = ['part1', 'part2', 'part3']; // List of all parts
        for (var i = 0; i < parts.length; i++) {
            var currentPart = document.getElementById(parts[i]);
            if (parts[i] === part) {
                currentPart.style.display = 'block';
            } else {
                currentPart.style.display = 'none';
            }
        }
    }

    function goBack() {
        var woman_id = <?php echo json_encode($woman_id); ?>; // Assuming $woman_id is available
        window.location.href = 'migra200.php?woman_id=' + woman_id;
    }
</script>
        
                  <input class="submit" type="submit" value="Submit" name="submit"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  <button class="submit" type="button" onclick="cancel()">Cancel</button>
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
        window.location.href = "creadygo.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"; // Redirect to readygo.php with Woman ID
    }
</script>

                <!--<div id="patientNoQuestion" style="display: none;">
                    Enter Patient Number: <br><input class="input" type="text" name="patientNumber" id="patientNumber">
                </div>
                 
                <input class="submit" type="button" onClick="getDateAndTime(); confSubmit(this.form);" value="Submit" >!-->

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
                </script>
    </form>
	<script>
    function showPart(partId) {
        var part1 = document.getElementById('part1');
        var part2 = document.getElementById('part2');

        if (partId === 'part2') {
            part1.style.display = 'none';
            part2.style.display = 'block';
        } else {
            part1.style.display = 'block';
            part2.style.display = 'none';
        }
    }
</script>
	
	

</body>
</html>


<!--html ends here-->








