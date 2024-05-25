<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['logout'])){
// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
}
// Display admin page content here
echo "Welcome, " . $_SESSION['username'] . "!";

// Logout link
echo '<br><a href="?logout">Logout</a>';
?>
