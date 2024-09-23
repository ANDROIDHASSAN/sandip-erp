
<?php
session_start();

// Check if the teacher is logged in
if (!isset($_SESSION['teacher'])) {
    header("Location: login.php");
    exit();
}

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
    $teacher_row = $teacher_result->fetch_assoc(); // Correct method to fetch a single row as an associative array
    $teacher_id = $teacher_row['id'];

    // Fetch progress reports
    $report_query = "SELECT * FROM progress_reports WHERE teacher_id='$teacher_id'";
    $report_result = $conn->query($report_query);

    if ($report_result->num_rows > 0) {
        while ($report_row = $report_result->fetch_assoc()) { // Correct method to fetch rows
            echo "Month: " . $report_row['month'] . "<br>";
            echo "Year: " . $report_row['year'] . "<br>";
            echo "Progress Details: " . $report_row['progress_details'] . "<br><br>";
        }
    } else {
        echo "No progress reports found!";
    }
} else {
    echo "Teacher not found!";
}

$conn->close();
?>

<button onclick="window.print()">Print Report</button>
<link rel="stylesheet" type="text/css" href="style.css">
