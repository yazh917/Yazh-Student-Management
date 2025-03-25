<?php

include('BarStudentHome.php'); 

$host = "localhost";
$user = "root";
$password = "";
$dbname = "yzstudentmanagementsystem";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$StudentID = $_SESSION['StudentID']; 


$result_courses = $conn->query("SELECT COUNT(*) AS total_courses FROM course");
$total_courses = $result_courses ? $result_courses->fetch_assoc()['total_courses'] : 0;

$result_students = $conn->query("SELECT COUNT(*) AS total_students FROM student");
$total_students = $result_students ? $result_students->fetch_assoc()['total_students'] : 0;

$result_subjects = $conn->query("SELECT COUNT(*) AS total_subjects FROM subjects");
$total_subjects = $result_subjects ? $result_subjects->fetch_assoc()['total_subjects'] : 0;


$login_counts_query = "
    SELECT MONTH(login_date) AS login_month, COUNT(*) AS total_logins
    FROM student_logins
    WHERE YEAR(login_date) = 2024 AND StudentID = $StudentID
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <title>Student Dashboard</title>
</head>
<body background="BGHS.gif" class="BG" >
    <div class="content">
    	<br>
        <center><h1>Student Dashboard</h1></center>
        <br><br>
        <div class="stats-widget">

            <div class="widget-box">
                <h2><?php echo $total_courses; ?></h2>
                <p>Total Available Courses</p>
            </div>

            <div class="widget-box">
                <h2><?php echo $total_subjects; ?></h2>
                <p>Total Subjects</p>
            </div>

            <div class="widget-box">
                <h2><?php echo $total_students; ?></h2>
                <p>Total Students</p>
            </div>


        </div>
        <br><br>

        <div id="login-chart-container" style="width: 80%; margin: 0 auto; height: 550px; margin-left: 11%;"></div>

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


