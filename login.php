<?php
session_start();
include('inc/head.inc.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username'] ?? '');
    $password = $conn->real_escape_string($_POST['password'] ?? '');

    // Validate CSRF token
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die("Invalid CSRF token.");
    }

    // Retrieve hashed password from the database
    $sql = "SELECT id, username, password FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Verify password
    if ($row && password_verify($password, $row['password'])) {
        // Start session and store user information
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        header("Location: admin_page.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}

// Generate CSRF token
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>
<!-- HTML form with Bootstrap template for login -->
<form method="post" action="">
    <div class="mb-3">
    <label class="form-label">Username</label>
    <input class="form-control" type="text" name="username" placeholder="Username" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password" required>
    </div>
   
    <input class="form-control" type="hidden" name="token" value="<?php echo $token; ?>">
    <button class="btn btn-info" type="submit">Login</button>
</form>

<?php
include("inc/foot.inc.php");
?>