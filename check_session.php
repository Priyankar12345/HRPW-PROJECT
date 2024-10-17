<?php
session_start();

$response = ['status' => 'active'];

// Set the timeout duration (e.g., 30 minutes)
$timeout_duration = 1800;

if (!isset($_SESSION['username']) || (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration)) {
    $response['status'] = 'expired';
    session_unset();
    session_destroy();
}

echo json_encode($response);
?>
