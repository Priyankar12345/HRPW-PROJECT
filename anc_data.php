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
    <form action="anc_datains.php" method="post" enctype="multipart/form-data">
	
	  <div>
		             <div class="woman-id">
        <h4>Woman ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></h4>
		
		        <h2>Woman ANC Details!</h2>  
    </div>
                  
                <!--Name of the person :<br><input class="input" type="text" name="sperson" id="sperson" value="" required >
                <span class="error">* <?php echo $nameError;?></span>
                <br>!-->

                

                <div id="pregnancyQuestion">
    <br>
    
	
	    
</div>


                   <div id="pregnancyQuestion">
		
		             <input class="input " type="hidden" name="unique_id" id="unique_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"  readonly>	   
                    <br><input class="input " type="hidden" name="date" id="date" readonly>
                </div>

                <div>
                    <br><input class="input " type="hidden" name="time" id="time" readonly>
                </div>

                <div>
                     <br>
                    <input class="input " type="hidden" name="geoLocation" id="geoLocation" readonly>
                </div>

                <!--Name of the person :<br><input class="input" type="text" name="sperson" id="sperson" value="" required >
                <span class="error">* <?php echo $nameError;?></span>
                <br>!-->
	      
   
		
		
		
        When the first ANC & Registration done :<br><br>
                <select class="input" id="aan12" name="aan12" value="" required onchange="showExtraFields(this.value)">
                    <option value="1st trimester(within 12 weeks)">1st trimester(within 12 weeks)</option>
					<option value="1st trimester(within 12 weeks)"> 2nd  trimester(between 14 and 26 weeks)</option>
					<option value="1st Trimister(within 12 weeks)">3rd Trimister(between 28 and 34 weeks)</option>
					</select><br>	
        

        Where was ANC done:<br><br>
                <select class="input" id="andx" name="andx" value="" required onchange="showExtraFields(this.value)">
                    <option value="Public facility">Public facility</option>
					<option value="Private facility">Private facility</option>
					<option value="Both">Both</option>
                      </select><br>	
        Number of ANC done in Public facility:<br><br>
                <select class="input" id="ndpf" name="npdf" value="" required onchange="showExtraFields(this.value)">
                   
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option> 
                    <option value="8">8</option>  
                    <option value="8">>8</option>  					
                   </select><br>	
        Number of ANC done in Private facility:<br><br>
                <select class="input" id="nppdf" name="nppdf" value="" required onchange="showExtraFields(this.value)">
                    <option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option> 
                    <option value="8">8</option>  
                    <option value="8">>8</option>  					
                   </select><br>	   
					

		
		        <!--1st ANC:<br><br>
                <select class="input" id="aanc1" name="aanc1" value="" required onchange="showExtraFields(this.value)">
                    <option value="1st ANC">1st ANC</option>
                    </select><br>
					<label for="doan1">Date of 1st ANC:</label><br>
        <input class="input" type="date" id="doan1" name="doan1"><br>
        <label for="poan1">Place of 1st ANC:</label><br>
        <input class="input" type="text" id="poan1" name="poan1"><br>			
		        <label for="fh1">Fundal Height:</label><br>
        <input class="input" type="text" id="fh1" name="fh1"><br>	
		<label for="bp1">BP:</label><br>
        <input class="input" type="text" id="bp1" name="bp1"><br>	
		<label for="hb1">HB%:</label><br>
        <input class="input" type="text" id="hb1" name="hb1"><br>	
		<label for="ua1">Urine Albumin:</label><br>
        <input class="input" type="text" id="ua1" name="ua1"><br>	
		<label for="wk1">Weight in Kg:</label><br>
        <input class="input" type="text" id="wk1" name="wk1"><br>	
		<label for="rbs1">RBS:</label><br>
        <input class="input" type="text" id="rbs1" name="rbs1"><br>
		
		
		2nd ANC:<br><br>
                <select class="input" id="anc2" name="anc2" value="" required onchange="showExtraFields(this.value)">
                    <option value="2nd ANC">2nd ANC</option>
                    </select><br>
		<label for="doan2">Date of 2nd ANC:</label><br>
        <input class="input" type="date" id="doan2" name="doan2"><br>
        <label for="poan2">Place of 2nd ANC:</label><br>
		<input class="input" type="text" id="poan2" name="poan2"><br>	
		        <label for="fh2">Fundal Height:</label><br>
        <input class="input" type="text" id="fh2" name="fh2"><br>	
		<label for="bp2">BP:</label><br>
        <input class="input" type="text" id="bp2" name="bp2"><br>	
		<label for="hb2">HB%:</label><br>
        <input class="input" type="text" id="hb2" name="hb2"><br>	
		<label for="ua2">Urine Albumin:</label><br>
        <input class="input" type="text" id="ua2" name="ua2"><br>	
		<label for="wk2">Weight in Kg:</label><br>
        <input class="input" type="text" id="wk2" name="wk2"><br>	
		<label for="rbs2">RBS:</label><br>
        <input class="input" type="text" id="rbs2" name="rbs2"><br>	
		
		3rd ANC:<br><br>
                <select class="input" id="anc3" name="anc3" value="" required onchange="showExtraFields(this.value)">
                    <option value="3rd ANC">3rd ANC</option>
                    </select><br>
		<label for="doan3">Date of 3rd ANC:</label><br>
        <input class="input" type="date" id="doan3" name="doan3"><br>
        <label for="poan3">Place of 3rd ANC:</label><br>
		<input class="input" type="text" id="poan3" name="poan3"><br>
		<label for="fh3">Fundal Height:</label><br>
        <input class="input" type="text" id="fh3" name="fh3"><br>	
		<label for="bp3">BP:</label><br>
        <input class="input" type="text" id="bp3" name="bp3"><br>	
		<label for="hb3">HB%:</label><br>
        <input class="input" type="text" id="hb3" name="hb3"><br>	
		<label for="ua3">Urine Albumin:</label><br>
        <input class="input" type="text" id="ua3" name="ua3"><br>	
		<label for="wk3">Weight in Kg:</label><br>
        <input class="input" type="text" id="wk3" name="wk3"><br>	
		<label for="rbs3">RBS:</label><br>
        <input class="input" type="text" id="rbs3" name="rbs3"><br>	
		
		4th ANC:<br><br>
                <select class="input" id="anc4" name="anc4" value="" required onchange="showExtraFields(this.value)">
                    <option value="4th ANC">4th ANC</option>
                    </select><br>
		<label for="doan4">Date of 4th ANC:</label><br>
        <input class="input" type="date" id="doan4" name="doan4"><br>
        <label for="poan4">Place of 1st ANC:</label><br>
		<input class="input" type="text" id="poan4" name="poan4"><br>
		        <label for="fh4">Fundal Height:</label><br>
        <input class="input" type="text" id="fh4" name="fh4"><br>	
		<label for="bp4">BP:</label><br>
        <input class="input" type="text" id="bp4" name="bp4"><br>	
		<label for="hb4">HB%:</label><br>
        <input class="input" type="text" id="hb4" name="hb4"><br>	
		<label for="ua4">Urine Albumin:</label><br>
        <input class="input" type="text" id="ua4" name="ua4"><br>	
		<label for="wk4">Weight in Kg:</label><br>
        <input class="input" type="text" id="wk4" name="wk4"><br>	
		<label for="rbs4">RBS:</label><br>
        <input class="input" type="text" id="rbs4" name="rbs4"><br>
		
		
	    	5th ANC:<br><br>
                <select class="input" id="anc5" name="anc5" value="" required onchange="showExtraFields(this.value)">
                    <option value="4th ANC">4th ANC</option>
                    </select><br>
		<label for="doan5">Date of 4th ANC:</label><br>
        <input class="input" type="date" id="doan5" name="doan5"><br>
        <label for="poan4">Place of 1st ANC:</label><br>
		<input class="input" type="text" id="poan5" name="poan5"><br>
		        <label for="fh4">Fundal Height:</label><br>
        <input class="input" type="text" id="fh5" name="fh5"><br>	
		<label for="bp4">BP:</label><br>
        <input class="input" type="text" id="bp5" name="bp5"><br>	
		<label for="hb4">HB%:</label><br>
        <input class="input" type="text" id="hb5" name="hb5"><br>	
		<label for="ua4">Urine Albumin:</label><br>
        <input class="input" type="text" id="ua5" name="ua5"><br>	
		<label for="wk4">Weight in Kg:</label><br>
        <input class="input" type="text" id="wk5" name="wk5"><br>	
		<label for="rbs4">RBS:</label><br>
        <input class="input" type="text" id="rbs5" name="rbs5"><br>!-->
		
		

       <!-- JavaScript to show/hide high risk fields -->

		


           <!--<script>
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

        // Function to hide all sections except the first one when the page loads
        function hideAllSectionsExceptFirst() {
            var sections = document.querySelectorAll(".anc-section");
            for (var i = 1; i < sections.length; i++) {
                sections[i].style.display = "none";
            }
        }

        // Call the function when the page loads
        window.onload = hideAllSectionsExceptFirst;
    </script>!-->
	
	
     <label for="ancSelect">Select ANC:</label><br>
    <select class="input" id="ancSelect" name="ancSelect" value="" required onchange="showANCSection(this.value)">
        
        <option value="1">1st ANC</option>
        <!--<option value="2">2nd ANC</option>
        <option value="3">3rd ANC</option>
        <option value="4">4th ANC</option>
        <option value="5">5th ANC</option>
		<option value="6">6th ANC</option>
		<option value="7">7th ANC</option>!-->
    </select><br><br>

    <div id="anc-1" class="anc-section">
	    <input class="input" type="hidden" id="aanc1" name="aanc1" value="1st anc"><br>
		 <input class="input" type="hidden" id="aanc1" name="aanc1" value="1st anc"><br>
    <label for="image5">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image5" name="image5"><br>
    <label for="doan1">Date of 1st ANC:</label><br>
    <input class="input" type="date" id="doan1" name="doan1"><br>
    <label for="poan1">Place of 1st ANC:</label><br>
    <select class="input" id="poan1" name="poan1" >
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh1">Fundal Height:</label><br>
    <select class="input" id="fh1" name="fh1" >
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp1">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp1" name="bp1"><br>
    <label for="hb1">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb1" name="hb1"><br>
    <label for="ua1">Urine Albumin:</label><br>
    <select class="input" id="ua1" name="ua1" >
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk1">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk1" name="wk1"><br>
    <label for="rbs1">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs1" name="rbs1"><br>
</div>



     <!-- <div id="anc-2" class="anc-section">
             <input class="input" type="hidden" id="anc2" name="anc2" value="2nd anc"><br>
		 <input class="input" type="hidden" id="anc2" name="anc2" value="2nd anc"><br>
 	 <label for="image6">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image6" name="image6"><br>
    <label for="doan2">Date of 2nd ANC:</label><br>
    <input class="input" type="date" id="doan2" name="doan2"><br>
    <label for="poan2">Place of 2nd ANC:</label><br>
    <select class="input" id="poan2" name="poan2" >
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh2">Fundal Height:</label><br>
    <select class="input" id="fh2" name="fh2" >
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="2">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp2" name="bp2"><br>
    <label for="hb2">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb2" name="hb2"><br>
    <label for="ua2">Urine Albumin:</label><br>
    <select class="input" id="ua2" name="ua2" >
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk2">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk2" name="wk2"><br>
    <label for="rbs2">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs2" name="rbs2"><br>
    </div>

    <div id="anc-3" class="anc-section">
	   <input class="input" type="hidden" id="anc3" name="anc3" value="3rd anc"><br>
	     <input class="input" type="hidden" id="anc3" name="anc3" value="3rd anc"><br>
    <label for="image7">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image7" name="image7"><br>
    <label for="doan3">Date of 3rd ANC:</label><br>
    <input class="input" type="date" id="doan3" name="doan3"><br>
    <label for="poan3">Place of 3rd ANC:</label><br>
    <select class="input" id="poan3" name="poan3" >
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh3">Fundal Height:</label><br>
    <select class="input" id="fh3" name="fh3" >
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp3">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp3" name="bp3"><br>
    <label for="hb3">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb3" name="hb3"><br>
    <label for="ua3">Urine Albumin:</label><br>
    <select class="input" id="ua3" name="ua3" >
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk3">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk3" name="wk3"><br>
    <label for="rbs3">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs3" name="rbs3"><br>
    </div>

    <div id="anc-4" class="anc-section">
	      <input class="input" type="hidden" id="anc4" name="anc4" value="4th anc"><br>
    <label for="image8">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image8" name="image8"><br>
    <label for="doan4">Date of 4th ANC:</label><br>
    <input class="input" type="date" id="doan4" name="doan4"><br>
    <label for="poan4">Place of 4th ANC:</label><br>
    <select class="input" id="poan4" name="poan4" >
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh4">Fundal Height:</label><br>
    <select class="input" id="fh4" name="fh4">
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp4">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp4" name="bp4"><br>
    <label for="hb4">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb4" name="hb4"><br>
    <label for="ua1">Urine Albumin:</label><br>
    <select class="input" id="ua4" name="ua4">
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk4">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk4" name="wk4"><br>
    <label for="rbs1">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs4" name="rbs4"><br>
        </div>

        <div id="anc-5" class="anc-section">
	    <input class="input" type="hidden" id="anc5" name="anc5" value="5th anc"><br>
		 <label for="image9">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image9" name="image9"><br>
    <label for="doan5">Date of 5th ANC:</label><br>
    <input class="input" type="date" id="doan5" name="doan5"><br>
    <label for="poan5">Place of 5th ANC:</label><br>
    <select class="input" id="poan5" name="poan5" >
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh5">Fundal Height:</label><br>
    <select class="input" id="fh5" name="fh5" >
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp5">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp5" name="bp5"><br>
    <label for="hb5">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb5" name="hb5"><br>
    <label for="ua5">Urine Albumin:</label><br>
    <select class="input" id="ua5" name="ua5">
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk5">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk5" name="wk5"><br>
    <label for="rbs5">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs5" name="rbs5"><br>
    </div>
	<div id="anc-6" class="anc-section">
	    <input class="input" type="hidden" id="anc6" name="anc6" value="6th anc"><br>
		 <label for="image10">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image10" name="image10"><br>
    <label for="doan6">Date of 6th ANC:</label><br>
    <input class="input" type="date" id="doan6" name="doan6"><br>
    <label for="poan6">Place of 6th ANC:</label><br>
    <select class="input" id="poan6" name="poan6">
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh6">Fundal Height:</label><br>
    <select class="input" id="fh6" name="fh6">
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp6">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp6" name="bp6"><br>
    <label for="hb6">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb6" name="hb6"><br>
    <label for="ua6">Urine Albumin:</label><br>
    <select class="input" id="ua6" name="ua6">
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk6">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk6" name="wk6"><br>
    <label for="rbs6">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs6" name="rbs6"><br>
    </div>
	<div id="anc-7" class="anc-section">
	    <input class="input" type="hidden" id="anc7" name="anc7" value="7th anc"><br>
		 <label for="image11">Upload photo of ANC Card:</label><br>
    <input class="input" type="file" id="image11" name="image11"><br>
    <label for="doan7">Date of 7th ANC:</label><br>
    <input class="input" type="date" id="doan7" name="doan7"><br>
    <label for="poan7">Place of 7th ANC:</label><br>
    <select class="input" id="poan7" name="poan7">
        <option value="">SELECT</option>
        <option value="PHC">PHC</option>
        <option value="VHSND">VHSND</option>
        <option value="SC/HWC/AAM">SC/HWC/AAM</option>
        <option value="TG Hospital">TG Hospital</option>
        <option value="PMSA site">PMSA site</option>
        <option value="Private">Private</option>
        <option value="Others">Others</option>
    </select><br>
    <label for="fh7">Fundal Height:</label><br>
    <select class="input" id="fh7" name="fh7" required>
        <option value="">SELECT</option>
        <option value="12 Weeks">12 Weeks</option>
        <option value="16 Weeks">16 Weeks</option>
        <option value="20 Weeks">20 Weeks</option>
        <option value="24 Weeks">24 Weeks</option>
        <option value="28 Weeks">28 Weeks</option>
        <option value="32 Weeks">32 Weeks</option>
        <option value="36 Weeks">36 Weeks</option>
    </select><br>
    <label for="bp7">BP (mm hg):</label><br>
    <input class="input" type="text" id="bp7" name="bp7" required><br>
    <label for="hb1">HB% (gm/dl):</label><br>
    <input class="input" type="text" id="hb7" name="hb7" required><br>
    <label for="ua7">Urine Albumin:</label><br>
    <select class="input" id="ua7" name="ua7" required>
        <option value="">SELECT</option>
        <option value="Negative">Negative</option>
        <option value="Trace">Trace</option>
        <option value="1+">1+</option>
        <option value="2+">2+</option>
        <option value="3+">3+</option>
        <option value="4+">4+</option>
    </select><br>
    <label for="wk7">Weight in Kg:</label><br>
    <input class="input" type="text" id="wk7" name="wk7" required><br>
    <label for="rbs1">RBS (mg/dl):</label><br>
    <input class="input" type="text" id="rbs7" name="rbs7" required><br>
    </div>!-->
	
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
	
    
		
		
		
   			<!--tton" onclick="goBack()" class="backButton" value="Back">!-->

<!-- JavaScript to redirect to formu200.php when Back button is clicked -->
<script>
    // Function to redirect
    function goBack() {
        // Get the id_no value
        var woman_id = document.getElementById("id_no").value;
        // Redirect to formu200.php with woman_id
        window.location.href = "formu200.php?woman_id=" + woman_id;
    }
</script>
            <input class="submit" type="submit" value="Submit" name="submit"> &nbsp &nbsp &nbsp 
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
</script>

                <!--<div id="patientNoQuestion" style="display: none;">
                    Enter Patient Number: <br><input class="input" type="text" name="patientNumber" id="patientNumber">
                </div>
                 
                <input class="submit" type="button" onClick="getDateAndTime(); confSubmit(this.form);" value="Submit" >!-->

                <script type="text/javascript">
				
				
				 function cancel() {
        window.location.href = "choready.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"; // Redirect to readygo.php with Woman ID
    }

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








