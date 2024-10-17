<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    include_once "your_database_connection.php";

    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password exist in the database
    $sql = "SELECT * FROM register_user WHERE username = ? AND password = ?";
    
    // Using prepared statements to prevent SQL injection
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // If user is found, fetch the designation
        $row = $result->fetch_assoc();
        $designation = $row['designation'];

        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['designation'] = $designation;
        
        // Redirect based on designation
        if ($designation == "ASHA") {
            // Redirect to readyg.php for ASHA
            header("Location: start.php");
            exit();
        } elseif ($designation == "CHO" || $designation == "ANM") {
            // Redirect to choready.php for CHO or ANM
            header("Location: startx.php");
            exit();
        } elseif ($designation == "MEDICAL OFFICER" || $designation == "SPECIALIST GYNECOLOGIST") {
            // Redirect to creadygo.php for Specialist Officer or Gynecologist
            header("Location: cho_check.php");
            exit();
			} elseif ($designation == "ADMIN" || $designation == "ADMIN") {
            // Redirect to creadygo.php for Specialist Officer or Gynecologist
            header("Location: dashboard.php");
            exit();
        } else {
            // Redirect to a default page if designation doesn't match any of the above
            header("Location: start.php");
            exit();
        }
    } else {
        // If login fails, display error message
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: login.php"); // Redirect back to login page
        exit();
    }

    $stmt->close();
    $db->close();
} else {
    // If the form was not submitted, redirect to login page
    header("Location: login.php");
    exit();
}
?>
