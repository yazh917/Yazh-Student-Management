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

    if (!empty($_POST['StudentName']) && !empty($_POST['EmailST']) && !empty($_POST['PasswordST'])) {
        $name = mysqli_real_escape_string($data, $_POST['StudentName']);
        $email = mysqli_real_escape_string($data, $_POST['EmailST']);
        $password = mysqli_real_escape_string($data, $_POST['PasswordST']);


        $sql = "SELECT * FROM student WHERE StudentName = ? AND EmailST = ? AND PasswordST = ?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $student = mysqli_fetch_assoc($result);

            $_SESSION['StudentID'] = $student['StudentID'];
            $_SESSION['name'] = $student['StudentName'];
            $_SESSION['email'] = $student['EmailST'];

 
            $login_query = "INSERT INTO student_logins (StudentID, login_date) VALUES (?, NOW())";
            $login_stmt = mysqli_prepare($data, $login_query);
            mysqli_stmt_bind_param($login_stmt, "i", $student['StudentID']);

            if (mysqli_stmt_execute($login_stmt)) {
                header("Location: HomeStudent.php");
                exit();
            } else {
                error_log("Failed to insert login record: " . mysqli_stmt_error($login_stmt));
                echo "<script>alert('Error logging login attempt'); window.location='loginStudent.php';</script>";
            }
        } else {
            echo "<script>alert('Name, Email, or Password incorrect'); window.location='loginStudent.php';</script>";
        }
    } else {
        echo "<script>alert('Required fields are missing!'); window.location='loginStudent.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request method'); window.location='loginStudent.php';</script>";
}

mysqli_close($data);
?>
