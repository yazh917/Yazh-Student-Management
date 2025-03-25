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

    if (!empty($_POST['IDAdmin']) && !empty($_POST['AdminName']) && !empty($_POST['PasswordAD'])) {
        $id = mysqli_real_escape_string($data, $_POST['IDAdmin']);
        $name = mysqli_real_escape_string($data, $_POST['AdminName']);
        $password = mysqli_real_escape_string($data, $_POST['PasswordAD']);


        $sql = "SELECT * FROM admin WHERE IDAdmin = ? AND AdminName = ? AND PasswordAD = ?";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $id, $name, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);


        if ($result && mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);


            $_SESSION['id'] = $admin['IDAdmin'];
            $_SESSION['name'] = $admin['AdminName'];


            $login_query = "INSERT INTO admin_logins (IDAdmin, login_date) VALUES (?, NOW())";
            $login_stmt = mysqli_prepare($data, $login_query);
            mysqli_stmt_bind_param($login_stmt, "s", $id);

            if (!mysqli_stmt_execute($login_stmt)) {
                error_log("Failed to insert login record: " . mysqli_stmt_error($login_stmt));
            }

    
            header("Location: HomeAdmin.php");
            exit();
        } else {
            echo "<script>alert('Invalid ID, Name, or Password'); window.location='loginAdmin.php';</script>";
        }
    } else {
        echo "<script>alert('All fields are required!'); window.location='loginAdmin.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request method'); window.location='loginAdmin.php';</script>";
}


mysqli_close($data);
?>
