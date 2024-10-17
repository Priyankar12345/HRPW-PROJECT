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
<title>Card Layout</title>
<link rel="stylesheet" href="styles.css">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f0f0f0;
    }

    .card-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
		
    }

    .session-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 400px;
    }

    .session-fields {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .session-fields label {
        flex: 1;
        text-align: right;
        margin-right: 10px;
    }

    .session-fields input {
        flex: 2;
        padding: 8px;
        border-radius: 3px;
        border: 1px solid #ccc;
        width: 50%;
        max-width: 160px;
    }

    .card-container .cards {
        display: flex;
        gap: 20px;
		
    }

   .card {
    width: 160px;
    height: 150px;
    margin: 10px;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    align-items: center;
}

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        margin: 0;
        margin-bottom: 10px;
    }

    .card p {
        margin: 0;
    }

    .data-collect {
        background-color: #4CAF50;
        color: white;
    }

    .monitor {
        background-color: #2196F3;
        color: white;
    }
	.logout-button {
    position: absolute;
    top: 10px;
    left: 10px;
}

.logout-btn {
    background: none;
    border: none;
    color: #333;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
}

.logout-btn img {
    width: 20px;
    height: 20px;
    margin-right: 5px;
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

<style>
        .box.disabled {
            pointer-events: none; /* Disable click events */
            opacity: 0.6; /* Dim the box to indicate it's disabled */
        }
        .black-text {
            color: black; /* Black color for the messages */
        }
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="card-container">

 <div class="title-bar">
    <img src="img.png" alt="Logo" width="80" height="80">
    <h5>HRPW Care: Supporting High-Risk Pregnant Women</h5>
      <img src="FISS_Logo.png" alt="Logo" width="60" height="60">
</div>
            
    <div class="session-info">
	
	 <div class="logout-button">
        
    
	</div>
        <div class="session-fields">
		       
	           <button class="logout-btn" onclick="logout()">Logout</button><br><br>
		     <h4> Hello <?php echo $username; ?> !
		       
                  <br><br>
             <br> <br>Date: <span id="currentDate"></span> &nbsp &nbsp       Time: <span id="currentTime"></span></h4>
            <label for="username"></label>
            <input type="hidden" id="username" value="<?php echo $username; ?>" readonly>
        </div>
        <div class="session-fields">
            <label for="password"></label>
            <input type="hidden" id="password" value="<?php echo $password; ?>" readonly>
        </div>
        <div class="session-fields">
            <label for="designation"></label>
            <input type="hidden" id="designation" value="<?php echo $designation; ?>" readonly>
        </div>
    </div>

    <div class="cards">
        <div class="card data-collect" onclick="openSurveyStart()">
            <div class="card-content">
                <h4>Register Woman</h4>
                <p>Click to register</p>
            </div>
        </div>
        <div class="card monitor" onclick="openDform30()">
            <div class="card-content">
                <h4>Already Register</h4>
                <p></p>
            </div>
        </div>
    </div>
</div>

<script>

function logout() {
            // Perform logout operation, for example:
            // Redirect to logout.php or clear session variables
            window.location.href = 'logout.php';
        }
		
    function openSurveyStart() {
        window.location.href = "chsurveystart.php";
    }

    function openDform30() {
        window.location.href = "cfind.php";
    }

    // Function to update date and time
    function updateDateTime() {
        var now = new Date();
        var day = now.getDate();
        var month = now.getMonth() + 1; // Months are 0-indexed, so add 1
        var year = now.getFullYear();

        // Padding single digit day or month with a leading zero
        day = day < 10 ? '0' + day : day;
        month = month < 10 ? '0' + month : month;

        var currentDate = day + '/' + month + '/' + year;
        var currentTime = now.toLocaleTimeString();
        document.getElementById("currentDate").textContent = currentDate;
        document.getElementById("currentTime").textContent = currentTime;
    }

    // Call the function initially
    updateDateTime();

    // Call the function every second to keep the time updated
    setInterval(updateDateTime, 1000);
    
    
      // Function to check session status
    function checkSession() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'check_session.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'expired') {
                    alert('Your session has expired. You will be logged out.');
                    logout();
                }
            }
        };
        xhr.send();
    }

    setInterval(checkSession, 300000); // Check session status every 5 minutes (300,000 ms)
</script>

</body>
</html>
