<?php
session_start();
if (!isset($_SESSION['teacher'])) {
    header("Location: teacher_login.php");
    exit();
}

// Other logic...
?>


   


<?php
// Start the session if not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Registration
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Check if the email is already registered
    $check_query = "SELECT * FROM teachers WHERE email='$email'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows == 0) {
        // Insert new teacher into database
        $insert_query = "INSERT INTO teachers (name, email, password) VALUES ('$name', '$email', '$password')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful! You can now <a href='login.php'>login</a>.";
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    } else {
        echo "Email already registered. Please <a href='login.php'>login</a>.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <header>
        <h1>Teacher Progress System - Registration</h1>
    </header>

    <!-- Registration Form -->
    <h2>Register</h2>
    <form action="register.php" method="POST">
        Name: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="register">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p> <!-- Link to the login page -->

</div>



</body>
</html>
