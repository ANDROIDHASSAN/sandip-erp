
<?php
session_start();

// Check if the teacher is logged in
if (!isset($_SESSION['teacher'])) {
    header("Location: login.php");
    exit();
}

// Handle Form Submission
$progressReports = []; // To store submitted progress reports

if (isset($_POST['submit_report'])) {
    // Store form data in the array
    $month = $_POST['month'];
    $year = $_POST['year'];
    $progress_details = $_POST['progress_details'];

    $progressReports[] = [
        'month' => $month,
        'year' => $year,
        'details' => $progress_details
    ];

    // Save to session or handle database storage if needed
    $_SESSION['progress_reports'] = $progressReports;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #35424a;
        }
        form {
            margin-bottom: 20px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background: #35424a;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #46a49f;
        }
        .report-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }
        .report-table th, .report-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .report-table th {
            background: #35424a;
            color: #ffffff;
        }
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

<header>
    <h1>Teacher Dashboard</h1>
</header>

<div class="container">
    <h2>Submit Progress Report</h2>
    <form action="teacher_dashboard.php" method="POST">
        <label for="month">Month:</label>
        <select name="month" required>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>

        <label for="year">Year:</label>
        <input type="number" name="year" required>

        <label for="progress_details">Progress Details:</label>
        <textarea name="progress_details" rows="4" required></textarea>

        <button type="submit" name="submit_report">Submit Report</button>
    </form>

    <?php if (!empty($_SESSION['progress_reports'])): ?>
        <h2>Your Progress Reports</h2>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Year</th>
                    <th>Progress Details</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['progress_reports'] as $report): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($report['month']); ?></td>
                        <td><?php echo htmlspecialchars($report['year']); ?></td>
                        <td><?php echo htmlspecialchars($report['details']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.print()">Print Reports</button>
    <?php endif; ?>
</div>

<footer>
    <p>© 2024 Teacher Progress System</p>
</footer>

</body>
</html>

