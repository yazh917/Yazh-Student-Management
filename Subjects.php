<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}


$course_id = isset($_GET['IDCourse']) ? intval($_GET['IDCourse']) : 0;

if ($course_id == 0) {
    die("Invalid or missing course ID. Please go back and select a valid course.");
}


$sql_course = "SELECT * FROM course WHERE IDCourse = ?";
$stmt_course = mysqli_prepare($data, $sql_course);
mysqli_stmt_bind_param($stmt_course, "i", $course_id);
mysqli_stmt_execute($stmt_course);
$result_course = mysqli_stmt_get_result($stmt_course);
$course = mysqli_fetch_assoc($result_course);

if (!$course) {
    die("Course not found in the database.");
}


$sql_subjects = "SELECT * FROM subjects WHERE IDCourse = ?";
$stmt_subjects = mysqli_prepare($data, $sql_subjects);
mysqli_stmt_bind_param($stmt_subjects, "i", $course_id);
mysqli_stmt_execute($stmt_subjects);
$result_subjects = mysqli_stmt_get_result($stmt_subjects);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="index.php">
    <img src="home.png" class="Imghome">
	</a>
	<br><br>
    <title><?php echo ($course['CourseName']); ?></title>
    <link rel="stylesheet" type="text/css" href="Subjects.css">
</head>
<body background="BGsubject.gif" class="BG" >
    <h1><center><?php echo ($course['CourseName']); ?></center></h1><br><br>

    <div>
        <center><img src="<?php echo ($course['CourseImage']); ?>" alt="Image of <?php echo ($course['CourseName']); ?>" style="max-width: 300px;"></center>
    </div>

	<br><br><hr>

    <br>
    <center><h2><u>Subjects Offered</u></h2></center>
    <br><br>
    <div class="subjects-container">
        <?php while ($subject = mysqli_fetch_assoc($result_subjects)) { ?>
            <div class="subject-card">
                <h3><?php echo ($subject['SubjectName']); ?></h3><br><br>
                <img src="<?php echo ($subject['SubjectImage']); ?>" alt="<?php echo ($subject['SubjectName']); ?>" style="max-width: 200px;">
            </div>
        <?php } ?>
    </div>
    <br><br><br>
</body>
</html>
