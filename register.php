<?php
session_start();
include('inc/head.inc.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $username = $conn->real_escape_string($_POST['username'] ?? '');
    $password = $conn->real_escape_string($_POST['password'] ?? '');
    // Validate CSRF token
    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed !</strong> Invalid CSRF token , please reload the page.
</div>';
    } else {

    // Hash password using bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user data into the database
    $sql = "INSERT INTO admin (name, username, password) VALUES ('$name', '$username', '$hashed_password')";
    if ($conn->query($sql)) {
        echo '<div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Well done!</strong> registration successfully please <a href="#" class="alert-link">Login Here</a>.
</div>';
    } else {
        echo '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Failed !</strong> .
</div>';
    }
}
}

// Generate CSRF token
$token = bin2hex(random_bytes(32));
$_SESSION['token'] = $token;
?>
<!-- HTML form with Bootstrap template for registration -->
<form method="post" action="">
    <div class="mb-3">
    <label class="form-label">Full Name</label>
    <input class="form-control" type="text" name="name" placeholder="Full Name" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Username</label>
    <input class="form-control" type="text" name="username" placeholder="Username" required>
    </div>
    <div class="mb-3">
    <label class="form-label">Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password" required>
    </div>
   
    <input class="form-control" type="hidden" name="token" value="<?php echo $token; ?>">
    <button class="btn btn-info" type="submit">Register</button>
</form>


<?php
include("inc/foot.inc.php");
?>