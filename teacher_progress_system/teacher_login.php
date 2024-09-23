<?php
session_start();
$teachers = [
    'teacher1' => 'password1',
    'teacher2' => 'password2',
]; // Example credentials

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    if (isset($teachers[$username]) && $teachers[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php'); // Redirect to the progress report form
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Teacher Login</h2>

<form method="POST" action="">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    
    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <button type="submit">Login</button>
</form>

</body>
</html>
