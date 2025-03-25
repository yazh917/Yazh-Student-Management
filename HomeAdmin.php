<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: loginAdmin.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$dbname = "yzstudentmanagementsystem";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$IDAdmin = $_SESSION['id']; 

$result_admins = $conn->query("SELECT COUNT(*) AS total_admins FROM admin");
$total_admins = $result_admins ? $result_admins->fetch_assoc()['total_admins'] : 0;

$result_students = $conn->query("SELECT COUNT(*) AS total_students FROM student");
$total_students = $result_students ? $result_students->fetch_assoc()['total_students'] : 0;

$result_teachers = $conn->query("SELECT COUNT(*) AS total_teachers FROM teacher");
$total_teachers = $result_teachers ? $result_teachers->fetch_assoc()['total_teachers'] : 0;

$result_courses = $conn->query("SELECT COUNT(*) AS total_courses FROM course");
$total_courses = $result_courses ? $result_courses->fetch_assoc()['total_courses'] : 0;

$result_pending_admissions = $conn->query("SELECT COUNT(*) AS total_pending_admissions FROM admission WHERE Status = 'Pending'");
$total_pending_admissions = $result_pending_admissions ? $result_pending_admissions->fetch_assoc()['total_pending_admissions'] : 0;


$login_counts_query = "
    SELECT MONTH(login_date) AS login_month, COUNT(*) AS total_logins
    FROM admin_logins
    WHERE YEAR(login_date) = 2024 AND IDAdmin = $IDAdmin
    GROUP BY MONTH(login_date)
    ORDER BY login_month ASC
";

$login_counts_result = $conn->query($login_counts_query);


$logins_by_month = array_fill(1, 12, 0); 

if ($login_counts_result) {
    while ($row = $login_counts_result->fetch_assoc()) {
        $logins_by_month[(int)$row['login_month']] = (int)$row['total_logins'];
    }
} else {
    
    echo "Error with query: " . $conn->error;
}


$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="HomeAdmin.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body background="AdminDashboard.gif" class="BG"> 
    <header class="headerAD">
        <a href="HomeAdmin.php">Admin HOME</a>
    </header>

    <div class="logoutAD">
        <button style="width: 80px; height: 50px; position: relative; margin-left: 300%; margin-top: 18%;">
            <a href="logout2.php">Logout</a>
        </button>
    </div>

    <div class="ScrollBar">
        <aside>
            <ul class="backgroundUL">
                <li><a href="admission.php">Admission</a></li>
                <br>
                <li><a href="TeacherAdd.php">Add Teacher</a></li>
                <br>
                <li><a href="TeacherView.php">View Teacher</a></li>
                <br>
                <li><a href="TeacherUpdate.php">Update Teacher</a></li>
                <br>
                <li><a href="StudentAdd.php">Add Student</a></li>
                <br>
                <li><a href="StudentView.php">View Student</a></li>
                <br>
                <li><a href="StudentUpdate.php">Update Student</a></li>
                <br>
                <li><a href="CourseAdd.php">Add Course</a></li>
                <br>
                <li><a href="CourseView.php">View Course</a></li>
                <br>
                <li><a href="CourseUpdate.php">Update Course</a></li>
                <br>
                <li><a href="CourseDelete.php">Delete Course</a></li>
            </ul>
        </aside>
    </div>

    <div class="contentAD">
        <h1>Admin Dashboard</h1>
        <br><br>
        <div class="stats-widget">

            <div class="widget-box">
                <h2><?php echo $total_admins; ?></h2>
                <p>Total Admin</p>
            </div>


            <div class="widget-box">
                <h2><?php echo $total_students; ?></h2>
                <p>Total Students</p>
            </div>

            <div class="widget-box">
                <h2><?php echo $total_teachers; ?></h2>
                <p>Total Teachers</p>
            </div>

            <div class="widget-box">
                <h2><?php echo $total_courses; ?></h2>
                <p>Total Courses</p>
            </div>

            <div class="widget-box">
                <h2><?php echo $total_pending_admissions; ?></h2>
                <p>Pending Admissions</p>
            </div>
        </div>
        <br><br>

        <div id="login-chart-container" style="width: 80%; margin: 0 auto; height: 550px;"></div>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('login-chart-container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Your Logins by Month in 2024',
                    margin: 30
                },
                xAxis: {
                    categories: [
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total Logins',
                        margin: 30
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y} times</b>'
                },
                series: [{
                    name: 'Logins',
                    data: <?php echo json_encode(array_values($logins_by_month)); ?>
                }]
            });
        });
        </script>
    </div>
</body>
</html>
