<?php
session_start(); // Start the session at the very top
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Progress Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Faculty Progress Report Form</h2>

<form method="POST" action="">
    <label>Name of Faculty:</label>
    <input type="text" name="faculty_name" required><br><br>

    <label>Designation:</label>
    <input type="text" name="designation" required><br><br>

    <label>No of Lectures (Theory):</label>
    <input type="number" name="theory_lectures" required><br><br>

    <label>No of Lectures (Practical):</label>
    <input type="number" name="practical_lectures" required><br><br>

    <label>Avg Attendance (Prev Month):</label>
    <input type="number" name="attendance_prev" required><br><br>

    <label>Avg Attendance (Curr Month):</label>
    <input type="number" name="attendance_curr" required><br><br>

    <label>Publications (Prev Month):</label>
    <input type="number" name="publications_prev" required><br><br>

    <label>Publications (Curr Month):</label>
    <input type="number" name="publications_curr" required><br><br>

    <label>Talks Delivered (Prev Month):</label>
    <input type="number" name="talks_prev" required><br><br>

    <label>Talks Delivered (Curr Month):</label>
    <input type="number" name="talks_curr" required><br><br>

    <label>FDP Attended (Prev Month):</label>
    <input type="number" name="fdp_attended_prev" required><br><br>

    <label>FDP Attended (Curr Month):</label>
    <input type="number" name="fdp_attended_curr" required><br><br>

    <label>FDP Organized (Prev Month):</label>
    <input type="number" name="fdp_organized_prev" required><br><br>

    <label>FDP Organized (Curr Month):</label>
    <input type="number" name="fdp_organized_curr" required><br><br>

    <label>Industry Visit (Prev Month):</label>
    <input type="number" name="industry_visit_prev" required><br><br>

    <label>Industry Visit (Curr Month):</label>
    <input type="number" name="industry_visit_curr" required><br><br>

    <label>Research Grants (Prev Month):</label>
    <input type="number" name="research_grants_prev" required><br><br>

    <label>Research Grants (Curr Month):</label>
    <input type="number" name="research_grants_curr" required><br><br>

    <label>MoU (Prev Month):</label>
    <input type="number" name="mou_prev" required><br><br>

    <label>MoU (Curr Month):</label>
    <input type="number" name="mou_curr" required><br><br>

    <label>Award (Prev Month):</label>
    <input type="number" name="award_prev" required><br><br>

    <label>Award (Curr Month):</label>
    <input type="number" name="award_curr" required><br><br>

    <label>Blogs (Prev Month):</label>
    <input type="number" name="blogs_prev" required><br><br>

    <label>Blogs (Curr Month):</label>
    <input type="number" name="blogs_curr" required><br><br>

    <label>Membership of Professional Bodies (Prev Month):</label>
    <input type="number" name="membership_prev" required><br><br>

    <label>Membership of Professional Bodies (Curr Month):</label>
    <input type="number" name="membership_curr" required><br><br>

    <label>Content Development (Prev Month):</label>
    <input type="number" name="content_dev_prev" required><br><br>

    <label>Content Development (Curr Month):</label>
    <input type="number" name="content_dev_curr" required><br><br>

    <label>Consultancy (Prev Month):</label>
    <input type="number" name="consultancy_prev" required><br><br>

    <label>Consultancy (Curr Month):</label>
    <input type="number" name="consultancy_curr" required><br><br>

    <label>VAP Session (Prev Month):</label>
    <input type="number" name="vap_session_prev" required><br><br>

    <label>VAP Session (Curr Month):</label>
    <input type="number" name="vap_session_curr" required><br><br>

    <label>Total Points Scored (Prev Month):</label>
    <input type="number" name="points_prev" required><br><br>

    <label>Total Points Scored (Curr Month):</label>
    <input type="number" name="points_curr" required><br><br>

    <label>Total No of Students to be Placed:</label>
    <input type="number" name="students_to_place" required><br><br>

    <label>Total No of Students Placed:</label>
    <input type="number" name="students_placed" required><br><br>

    <label>Remarks:</label>
    <textarea name="remarks"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting form data
    $_SESSION['report_data'] = [
        "Faculty Name" => $_POST['faculty_name'],
        "Designation" => $_POST['designation'],
        "Theory Lectures" => $_POST['theory_lectures'],
        "Practical Lectures" => $_POST['practical_lectures'],
        "Avg Attendance (Prev Month)" => $_POST['attendance_prev'] . "%",
        "Avg Attendance (Curr Month)" => $_POST['attendance_curr'] . "%",
        "Publications (Prev Month)" => $_POST['publications_prev'],
        "Publications (Curr Month)" => $_POST['publications_curr'],
        "Talks Delivered (Prev Month)" => $_POST['talks_prev'],
        "Talks Delivered (Curr Month)" => $_POST['talks_curr'],
        "FDP Attended (Prev Month)" => $_POST['fdp_attended_prev'],
        "FDP Attended (Curr Month)" => $_POST['fdp_attended_curr'],
        "FDP Organized (Prev Month)" => $_POST['fdp_organized_prev'],
        "FDP Organized (Curr Month)" => $_POST['fdp_organized_curr'],
        "Industry Visit (Prev Month)" => $_POST['industry_visit_prev'],
        "Industry Visit (Curr Month)" => $_POST['industry_visit_curr'],
        "Research Grants (Prev Month)" => $_POST['research_grants_prev'],
        "Research Grants (Curr Month)" => $_POST['research_grants_curr'],
        "MoU (Prev Month)" => $_POST['mou_prev'],
        "MoU (Curr Month)" => $_POST['mou_curr'],
        "Award (Prev Month)" => $_POST['award_prev'],
        "Award (Curr Month)" => $_POST['award_curr'],
        "Blogs (Prev Month)" => $_POST['blogs_prev'],
        "Blogs (Curr Month)" => $_POST['blogs_curr'],
        "Membership of Professional Bodies (Prev Month)" => $_POST['membership_prev'],
        "Membership of Professional Bodies (Curr Month)" => $_POST['membership_curr'],
        "Content Development (Prev Month)" => $_POST['content_dev_prev'],
        "Content Development (Curr Month)" => $_POST['content_dev_curr'],
        "Consultancy (Prev Month)" => $_POST['consultancy_prev'],
        "Consultancy (Curr Month)" => $_POST['consultancy_curr'],
        "VAP Session (Prev Month)" => $_POST['vap_session_prev'],
        "VAP Session (Curr Month)" => $_POST['vap_session_curr'],
        "Total Points Scored (Prev Month)" => $_POST['points_prev'],
        "Total Points Scored (Curr Month)" => $_POST['points_curr'],
        "Total No of Students to be Placed" => $_POST['students_to_place'],
        "Total No of Students Placed" => $_POST['students_placed'],
        "Remarks" => $_POST['remarks'],
    ];

    // Displaying the print button
    echo '<button class="print-btn" onclick="window.open(\'print_report.php\', \'_blank\')">Print Report</button>';
}
?>

</body>
</html>
