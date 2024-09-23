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

// Handle adding new teacher
if (isset($_POST['add_teacher'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $insert_query = "INSERT INTO teachers (name, email, password) VALUES ('$name', '$email', '$password')";
    $conn->query($insert_query);
}

// Fetch teachers
$teachers_query = "SELECT * FROM teachers";
$teachers_result = $conn->query($teachers_query);

// Fetch progress reports for all teachers
$reports_query = "SELECT * FROM progress_reports";
$reports_result = $conn->query($reports_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        h2 {
            color: #35424a;
        }
        form {
            margin-bottom: 20px;
        }
        input {
            width: calc(100% - 20px);
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #35424a;
            color: #ffffff;
        }
        .actions a {
            margin: 0 5px;
            text-decoration: none;
            color: #35424a;
        }
        .actions a:hover {
            color: #46a49f;
        }
    </style>
</head>
<body>

<div class="container">
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <h2>Add New Teacher</h2>
    <form action="admin_dashboard.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="add_teacher">Add Teacher</button>
    </form>

    <h2>Teachers List</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($teacher = $teachers_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($teacher['name']); ?></td>
                    <td><?php echo htmlspecialchars($teacher['email']); ?></td>
                    <td class="actions">
                        <a href="edit_teacher.php?id=<?php echo $teacher['id']; ?>">Edit</a> | 
                        <a href="delete_teacher.php?id=<?php echo $teacher['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2>Progress Reports</h2>
    <table>
        <thead>
            <tr>
                <th>Teacher Email</th>
                <th>Report</th>
                <th>Date Submitted</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($report = $reports_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($report['teacher_email']); ?></td>
                    <td><?php echo htmlspecialchars($report['report']); ?></td>
                    <td><?php echo htmlspecialchars($report['submitted_at']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
