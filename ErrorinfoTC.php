<?php

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['IDTeacher']) && !empty($_POST['TeacherName']) && !empty($_POST['Password'])) {
        $id = mysqli_real_escape_string($data, $_POST['IDTeacher']);
        $name = mysqli_real_escape_string($data, $_POST['TeacherName']);
        $password = mysqli_real_escape_string($data, $_POST['Password']);

        $sql = "SELECT * FROM teacher WHERE IDTeacher = ? AND TeacherName = ? AND Password = ?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $id, $name, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
    
            $teacher = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $teacher['IDTeacher'];
            $_SESSION['name'] = $teacher['TeacherName'];

            $login_query = "INSERT INTO teacher_logins (IDTeacher, login_date) VALUES (?, NOW())";
            $login_stmt = mysqli_prepare($data, $login_query);
            mysqli_stmt_bind_param($login_stmt, "s", $id);

            if (mysqli_stmt_execute($login_stmt)) {
                header("Location: HomeTeacher.php");
                exit();
            } else {
                error_log("Failed to insert login record: " . mysqli_stmt_error($login_stmt));
                echo "<script>alert('Error logging login attempt'); window.location='loginTeacher.php';</script>";
            }
        } else {
            echo "<script>alert('ID, Name, or Password incorrect'); window.location='loginTeacher.php';</script>";
        }
    } else {
        echo "<script>alert('Required fields are missing!'); window.location='loginTeacher.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request method'); window.location='loginTeacher.php';</script>";
}

mysqli_close($data);
?>
