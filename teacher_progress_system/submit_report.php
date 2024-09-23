
<?php
session_start();

// Check if the teacher is logged in
if (!isset($_SESSION['teacher'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $progress_details = $_POST['progress_details'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'teacher_system');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the teacher ID
    $teacher_email = $_SESSION['teacher'];
    $teacher_query = "SELECT id FROM teachers WHERE email='$teacher_email'";
    $teacher_result = $conn->query($teacher_query);
    
    if ($teacher_result->num_rows > 0) {
        $teacher_row = $teacher_result->fetch_assoc();
        $teacher_id = $teacher_row['id'];

        // Insert the progress report
        $sql = "INSERT INTO progress_reports (teacher_id, month, year, progress_details) 
                VALUES ('$teacher_id', '$month', '$year', '$progress_details')";

        if ($conn->query($sql) === TRUE) {
            echo "Progress report submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Teacher not found!";
    }

    $conn->close();
}
?>
