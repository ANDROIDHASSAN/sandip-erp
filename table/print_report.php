<?php
session_start();
$data = $_SESSION['report_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Faculty Progress Report</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Smaller table styles for printing */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px; /* Smaller font size for print */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 5px; /* Reduced padding for fit */
        }
        @media print {
            button {
                display: none; /* Hide buttons during print */
            }
        }
    </style>
</head>
<body>

<h2>Faculty Progress Report</h2>

<table>
    <tr>
        <th>Field</th>
        <th>Value</th>
    </tr>
    <?php foreach ($data as $field => $value): ?>
    <tr>
        <td><?php echo htmlspecialchars($field); ?></td>
        <td><?php echo htmlspecialchars($value); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<button onclick="window.print()">Print This Report</button>

</body>
</html>
