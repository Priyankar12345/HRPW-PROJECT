<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
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
    <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
    <h5>ACTION FOR
    REDUCTION OF<br>
    MATERNAL AND NEONATAL<br> DEATHS
    IN TINSUKIA DISTRICT</h5>
</div>
        
		
		
    <form action="chsurveyins.php" method="post" enctype="multipart/form-data">
        <div>
                   
    </form>
</body>
</html>



<!--html ends here-->










<?php
} else {
    echo "Session variables are not set.";
}
?>
