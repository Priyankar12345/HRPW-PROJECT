<?php
session_start();

// Check if the session variables are set
if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $designation = $_SESSION['designation'];
   	$blockPHC=$_SESSION['blockPHC'];
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Woman Health - Registration</title>
    <link rel="stylesheet" href="stylesxp.css">
    <style>
        /* Additional styles for the form */
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            font-size: 16px;
        }
        button {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
		
		
	.title-bar {
    text-align: center;
}

.logos {
    display: inline-block;
    margin-bottom: 10px;
}

.logo {
    margin: 0 30px; /* Adjust this value to increase or decrease space between logos */
    vertical-align: middle;
}

    </style>
</head>
 <body>

<div class="card-container">
    <div class="card">
	<div class="title-bar">
    <div class="logos">
      
        <img src="img.png" alt="Logo" width="80" height="80" class="logo">
          <img src="FISS_Logo.png" alt="Logo" width="60" height="60" class="logo">
    </div>
    <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
</div>
        <div class="card-content">
                   <form id="registerForm" action="insert_user.php" method="post">
    <div class="form-group">
       
                  <br><br>
        <label for="designation">Is the pregnant woman a high risk case?</label><br>
        <select id="designation" name="designation" required>
            <option value="" disabled selected>Select Option</option>
            <option value="yes">YES</option>
            <option value="no">NO</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit">Submit</button><br><br>
        <button class="submit" type="button" onclick="cancel()">Cancel</button>
    </div>
</form>

 <script>
    function cancel() {
        window.location.href = "startx.php"; // Redirect to login.php
    }

    // Add event listener to form submission
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        var dropdown = document.getElementById("designation");
        var selectedValue = dropdown.options[dropdown.selectedIndex].value;

        if (selectedValue === "yes") {
            window.location.href = "cho_startextra.php"; // Redirect to cho_startextra.php
        } else if (selectedValue === "no") {
            window.location.href = "chos.php"; // Redirect to chos.php
        }

        // Prevent the form from actually submitting
        event.preventDefault();
    });
</script>
            </form>
        </div>
    </div>
</div>

</body>
</html>
