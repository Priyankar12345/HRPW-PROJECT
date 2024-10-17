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

// Check if ASHA ID is submitted
if (isset($_POST['ashaID'])) {
    $ashaID = $conn->real_escape_string($_POST['ashaID']);

    // Fetch ASHA details
    $asha_sql = "SELECT ASHA_Name_in_Bank AS asha_name, Contact_No AS asha_phone FROM asha_list WHERE asha_id = '$ashaID'";
    $asha_result = $conn->query($asha_sql);

    // Check if query was successful
    if ($asha_result === false) {
        echo "Error: " . $conn->error;
        exit();
    }

    if ($asha_result->num_rows > 0) {
        $asha_row = $asha_result->fetch_assoc();
    } else {
        echo "ASHA details not found.";
        exit();
    }
} else {
    echo "ASHA ID not provided.";
    exit();
}


?>
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
    <form action="assign_ins.php" method="post" enctype="multipart/form-data">
	
	  <div>
		             <div class="woman-id">
        <h4>Woman ID: <?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?></h4>
		
		         <h2>Assigned ASHA Details!</h2>
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

                

                <div id="pregnancyQuestion">
    <br>
    <!--<select class="input" id="pregnant" name="pregnant" onchange="showAdditionalInfo()">!-->
	<input class="input" type="hidden" name="pregnant" id="pregnant" value="yes">
	     
</div>

			
              
                </select><br>
				ASHA Name:<br><input class="input" type="text" name="asha_name" id="asha_name" value="<?php echo $asha_row['asha_name']; ?>" required >
                <br><br>
	          
				
                <!--Enter the last LMP date:<br><br>
                <input type="date" id="lastMenstruationDate" name="lastMenstruationDate"><br><br>
                
                <label for="edd">Estimated Due Date (EDD):</label><br>
                <input type="text" id="edd" name="edd" readonly><br><br>
        
                <label for="gestationWeek">Gestation Week:</label><br>
               <input type="text" id="gestationWeek" name="gestationWeek" readonly><br><br>!-->
			   
			   
			   
			   

	     
       
   
	    	<label for="gestationWeek">ASHA Phone Number:</label><br>
        <input class="input" type="text" id="asha_phone" name="asha_phone" value="<?php echo $asha_row['asha_phone']; ?>"><br><br>
        
        
<?php       
$servername = "localhost";
$username = "mission12345";
$password = "mission@1234567890";
$database = "nrhm";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided in URL
if (isset($_GET['id'])) {
    $unique_id = $conn->real_escape_string($_GET['id']);

    // Prepare and execute the SQL query
    $sql = "SELECT pagwoman, hmno FROM register_woman WHERE unique_id = '$unique_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Data found, fetch and display in input boxes
        $row = $result->fetch_assoc();
        $pagwoman = $row['pagwoman'];
        $hmno = $row['hmno'];
    } else {
        // No data found for the given ID
        echo "<script>alert('No data found for this ID.'); window.location='creadygo.php?id=$unique_id';</script>";
    }
} else {
    // No ID provided in URL
    echo "<script>alert('ID not provided.'); window.location='creadygo.php';</script>";
    exit; // Stop further execution
}
?>
                    <label for="gestationWeek">Woman Name:</label><br>
                    <input class="input" type="text" id="woman_name" name="woman_name" value="<?php echo $pagwoman; ?>"><br><br>    
                    
                    <label for="gestationWeek">Woman Phone Number:</label><br>
                    <input class="input" type="text" id="woman_number" name="woman_number" value="<?php echo $hmno; ?>"><br><br>    


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
	
	   function cancel() {
        window.location.href = "assign_asha.php?id=<?php echo isset($_GET['id']) ? $_GET['id'] : 'N/A'; ?>"; // Redirect to readygo.php with Woman ID
    }
</script>
        <!-- Add any other fields for high-risk conditions -->
    </div>
	
	
	
   
</body>
</html>
