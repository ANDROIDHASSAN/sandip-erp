<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching all teacher reports
$query = "SELECT * FROM progress_reports";
$result = $conn->query($query);
?>

<?php include 'header.php'; ?>
<div class="container">
    <div class="content">
        <h2>Teacher Progress Reports</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>Teacher Email</th>
                        <th>Progress Report</th>
                        <th>Date Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['teacher_email']; ?></td>
                            <td><?php echo $row['report']; ?></td>
                            <td><?php echo $row['submitted_at']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No reports submitted yet.</p>
        <?php endif; ?>

    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
