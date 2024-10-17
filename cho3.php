

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

    <form action="cho3ins.php" method="post" enctype="multipart/form-data">
	
	  <div>
		             <div class="woman-id">
        <h4>Woman ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></h4>
		
		         <h2>Managment of Severe Anemia in HRPW cases!</h2>
    </div>
                  
                <!--Name of the person :<br><input class="input" type="text" name="sperson" id="sperson" value="" required >
                <span class="error">* <?php echo $nameError;?></span>
                <br>!-->

                

                <div id="pregnancyQuestion">
    <br>
    
	
	    
</div>


                   <div id="pregnancyQuestion">
		
		             <input class="input " type="text" name="unique_id" id="unique_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"  readonly>
   <br><label for="isia">Iron Sucrose injection advised:</label><br>
    <select class="input" id="isia" name="isia" onchange="handleMigrationSelection()">
	   
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select><br><br>

   	    Details of Iron therapy:<br><br>
                <select class="input" id="doit" name="doit" value="" required onchange="showExtraFields(this.value)">
                    <option value="She is taking Iron Sucrose doses">She is taking Iron Sucrose doses</option>
					<option value="Iron Sucrose therapy completed">Iron Sucrose therapy completed</option>
					<option value="She is not taking Iron Sucrose doses">She is not taking Iron Sucrose doses</option>
					 </select><br>	
       				
		Why is Iron sucrose infusion not taken :<br><br>
                <select class="input" id="wisit" name="wisit" value="" required onchange="showExtraFields(this.value)">
                    <option value="Beneficiary is not willing">yes</option>
					<option value="No supply">No supply</option>
					<option value="Adverse reaction">Adverse reaction</option>
					<option value="Other reason">Other reason</option>
					 </select><br>	
					 
					 <label for="orfnt">Other reason for not taking Iron sucrose ?:</label><br>
                     <input class="input" type="text" id="orfnt" name="orfnt"><br><br>	 
		
        HB level after Completation of Iron Sucrose threapy:<br><br>
                <select class="input" id="hlcist" name="hlcist" value="" required onchange="showExtraFields(this.value)">
                    <option value="Increased by 1g/dl or more">Increased by 1g/dl or more</option>
					<option value="Did not increased by 1g/d">Did not increased by 1g/d</option>
					<option value="Test not done">Test not done</option>
                    </select><br>	
        Blood Transfusion advised:<br><br>
                <select class="input" id="bta" name="bta" value="" required onchange="showExtraFields(this.value)">
                    <option value="yse">yes</option>
					<option value="no">No</option>
                    </select><br>	
        Blood Transfusion done:<br><br>
                <select class="input" id="btd" name="btd" value="" required onchange="showExtraFields(this.value)">
                   <option value="yes">yes</option>
					<option value="No">No</option>
                      </select><br>	
        Why Blood Transfusion was not done:<br><br>
                <select class="input" id="btnd" name="btnd" value="" required onchange="showExtraFields(this.value)">
                    <option value="Reluctant beneficiary">Reluctant beneficiary</option>
					<option value="Reluctant husband/ family members">Reluctant husband/ family members</option>
					<option value="No donor">No donor</option>
					<option value="Not counselled properly">Not counselled properly</option>
					<option value="Difficult transportation">Difficult transportation</option>
					<option value="Rare blood group">Rare blood group</option>
					<option value="Other">Other</option>
                      </select><br>	
        HB level after Blood Transfusion ?:<br><br>
                <select class="input" id="hlabt" name="hlabt" value="" required onchange="showExtraFields(this.value)">
                      <option value="Increased by 1g/dl or more">Increased by 1g/dl or more</option>
					<option value="Did not increased by 1g/d">Did not increased by 1g/d</option>
					<option value="Test not done">Test not done</option>
                      </select><br>	
       
		
		<label for="ordpsx">Mention other cause ?:</label><br>
        <input class="input" type="text" id="mocaa" name="mocaa"><br><br>	
		
		Micro Birth plan prepared ?:<br><br>
                <select class="input" id="mbpp" name="mbpp" value="" required onchange="showExtraFields(this.value)">
                      <option value="yes">Yes</option>
					<option value="no">No</option>
					</select><br>
		
		<label for="migrationCard">Upload the Birth Micro Plan Card:</label><br><br>
        <input  type="file" id="image2" name="image2"><br><br>

       <!-- JavaScript to show/hide high risk fields -->

		<label for="ancSelect">Select ANC:</label><br>
    <select class="input" id="ancSelect" name="ancSelect" value="" required onchange="showANCSection(this.value)">
        
        <option value="1">1st Special ANC</option>
        <option value="2">2nd Special ANC</option>
        <option value="3">3rd Special ANC</option>
        <option value="4">4th Special ANC</option>
        <option value="5">5th Special ANC</option>
    </select><br><br>

        <div id="anc-1" class="anc-section">
		<input class="input" type="hidden" id="canc1" name="canc1" value="1st Special ANC"><br>
	    <label for="cdanc1">Date of 1st Special ANC:</label><br>
		<input class="input" type="date" id="cdanc1" name="cdanc1"><br>
        <label for="chb1">HB%:</label><br>
        <input class="input" type="text" id="chb1" name="chb1"><br>	
		<label for="cbp1">BP:</label><br>
        <input class="input" type="text" id="cbp1" name="cbp1"><br>	
       	<label for="cufa1">Urine Albumin:</label><br>
        <input class="input" type="text" id="cufa1" name="cufa1"><br>
        <label for="cwt1">Weight in Kg:</label><br>
        <input class="input" type="text" id="cwt1" name="cwt1"><br>	
        <label for="cfhr1">FHR:</label><br>
        <input class="input" type="text" id="cfhr1" name="cfhr1"><br>		
        <label for="cfh1">Fundal Height:</label><br>
        <input class="input" type="text" id="cfh1" name="cfh1"><br>	
        <label for="cpe1">Pedal edema:</label><br>
        <input class="input" type="text" id="cpe1" name="cpe1"><br>		
        </div>

        <div id="anc-2" class="anc-section">
		<input class="input" type="hidden" id="canc2" name="canc2" value="2nd Special ANC"><br>
	    <label for="cdanc2">Date of 2nd Special ANC:</label><br>
		<input class="input" type="date" id="cdanc2" name="cdanc2"><br>
        <label for="chb2">HB%:</label><br>
        <input class="input" type="text" id="chb2" name="chb2"><br>	
		<label for="cbp2">BP:</label><br>
        <input class="input" type="text" id="cbp2" name="cbp2"><br>	
       	<label for="cufa2">Urine Albumin:</label><br>
        <input class="input" type="text" id="cufa2" name="cufa2"><br>
        <label for="cwt2">Weight in Kg:</label><br>
        <input class="input" type="text" id="cwt2" name="cwt2"><br>	
        <label for="cfhr2">FHR:</label><br>
        <input class="input" type="text" id="cfhr2" name="cfhr2"><br>		
        <label for="cfh2">Fundal Height:</label><br>
        <input class="input" type="text" id="cfh2" name="cfh2"><br>	
        <label for="cpe2">Pedal edema:</label><br>
        <input class="input" type="text" id="cpe2" name="cpe2"><br>	
    </div>

    <div id="anc-3" class="anc-section">
	   <input class="input" type="hidden" id="canc3" name="canc3" value="3rd Special ANC"><br>
	   <label for="cdanc3">Date of 3rd Special ANC:</label><br>
		<input class="input" type="date" id="cdanc3" name="cdanc3"><br>
        <label for="chb3">HB%:</label><br>
        <input class="input" type="text" id="chb3" name="chb3"><br>	
		<label for="cbp3">BP:</label><br>
        <input class="input" type="text" id="cbp3" name="cbp3"><br>	
       	<label for="cufa3">Urine Albumin:</label><br>
        <input class="input" type="text" id="cufa3" name="cufa3"><br>
        <label for="cwt3">Weight in Kg:</label><br>
        <input class="input" type="text" id="cwt3" name="cwt3"><br>	
        <label for="cfhr3">FHR:</label><br>
        <input class="input" type="text" id="cfhr3" name="cfhr3"><br>		
        <label for="cfh3">Fundal Height:</label><br>
        <input class="input" type="text" id="cfh3" name="cfh3"><br>	
        <label for="cpe3">Pedal edema:</label><br>
        <input class="input" type="text" id="cpe3" name="cpe3"><br>		
    </div>

    <div id="anc-4" class="anc-section">
	   <label for="cdanc4">Date of 4th Special ANC:</label><br>
	    <input class="input" type="hidden" id="canc4" name="canc4" value="4th Special ANC"><br>
		<input class="input" type="date" id="cdanc4" name="cdanc4"><br>
        <label for="chb4">HB%:</label><br>
        <input class="input" type="text" id="chb4" name="chb4"><br>	
		<label for="cbp4">BP:</label><br>
        <input class="input" type="text" id="cbp4" name="cbp4"><br>	
       	<label for="cufa4">Urine Albumin:</label><br>
        <input class="input" type="text" id="cufa4" name="cufa4"><br>
        <label for="cwt4">Weight in Kg:</label><br>
        <input class="input" type="text" id="cwt4" name="cwt4"><br>	
        <label for="cfhr4">FHR:</label><br>
        <input class="input" type="text" id="cfhr4" name="cfhr4"><br>		
        <label for="cfh4">Fundal Height:</label><br>
        <input class="input" type="text" id="cfh4" name="cfh4"><br>	
        <label for="cpe4">Pedal edema:</label><br>
        <input class="input" type="text" id="cpe4" name="cpe4"><br>	
    </div>

    <div id="anc-5" class="anc-section">
	   <label for="cdanc5">Date of 5th Special ANC:</label><br>
	    <input class="input" type="hidden" id="canc5" name="canc5" value="5th Special ANC"><br>
		<input class="input" type="date" id="cdanc5" name="cdanc5"><br>
        <label for="chb5">HB%:</label><br>
        <input class="input" type="text" id="chb5" name="chb5"><br>	
		<label for="cbp5">BP:</label><br>
        <input class="input" type="text" id="cbp5" name="cbp5"><br>	
       	<label for="cufa5">Urine Albumin:</label><br>
        <input class="input" type="text" id="cufa5" name="cufa5"><br>
        <label for="cwt5">Weight in Kg:</label><br>
        <input class="input" type="text" id="cwt5" name="cwt5"><br>	
        <label for="cfhr5">FHR:</label><br>
        <input class="input" type="text" id="cfhr5" name="cfhr5"><br>		
        <label for="cfh5">Fundal Height:</label><br>
        <input class="input" type="text" id="cfh5" name="cfh5"><br>	
        <label for="cpe5">Pedal edema:</label><br>
        <input class="input" type="text" id="cpe5" name="cpe5"><br>	
    </div>
	
	Whether HRPW has been examined by a medical office/Gyno Specialist ?:<br><br>
                <select class="input" id="idn" name="idn" value="" required onchange="showExtraFields(this.value)">
                      <option value="yes">Yes</option>
					<option value="no">No</option>
					</select><br>
	
	
	
	 <script>
        // Function to show the selected ANC section
        function showANCSection(value) {
            // Hide all sections first
            var sections = document.querySelectorAll(".anc-section");
            sections.forEach(function(section) {
                section.style.display = "none";
            });

            // Show the selected section
            var selectedSection = document.getElementById("anc-" + value);
            if (selectedSection) {
                selectedSection.style.display = "block";
            }
        }

        // Hide all sections except the first one when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            var sections = document.querySelectorAll(".anc-section");
            for (var i = 1; i < sections.length; i++) {
                sections[i].style.display = "none";
            }
        });
    </script>	
		
		
		          <!--  outcome Pregnancy:<br><br>
                    <select class="input" id="op" name="op" value="" required ">
                    <!--<option value="Born baby and Mother are alive">Born baby and Mother are alive</option>!-->
					<!--<option value="Born baby and Mother are alive">Born baby and Mother are alive</option>
					<option value="Mother died and Baby alive">Mother died and Baby alive</option>
					<option value="Born baby and Mother are died">Born baby and Mother are died</option>
					<option value="Mother alive and Baby died">Mother alive and Baby died</option>
                    </select><br>	
					
					Mode of Delivery:<br><br>
                   	<select class="input" id="md" name="md" value="" required ">
                    <!--<option value="Born baby and Mother are alive">Born baby and Mother are alive</option>!-->
					<!--<option value="Normal">Normal</option>
					<option value="LSCS">LSCS</option>
					<option value=""></option>
					</select><br>	
		 
		
		            Place of Delivery : 
		            <select class="input" id="pd" name="pd" value="" required ">
                    <!--<option value="Born baby and Mother are alive">Born baby and Mother are alive</option>!-->
					<!--<option value="Home">Home</option>
					<option value="Govt. Hospital">Govt. Hospital</option>
					<option value="Private Hospital">Private Hospital</option>
					</select><br>!-->
		
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
        window.location.href = 'highrisk.php?woman_id=' + woman_id;
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








