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

if (!isset($_SESSION['email'])) {
    echo "<script>alert('You are not logged in. Please log in to view your details.'); window.location.href='loginStudent.php';</script>";
    exit;
}

$email = $_SESSION['email']; 
echo "<script>console.log('Logged in email: " . $email . "');</script>";

$query = "
    SELECT 
        student.StudentID, 
        student.StudentName, 
        student.Age,
        student.Gender,
        student.CourseName
    FROM student
    LEFT JOIN student_courses ON student.StudentID = student_courses.StudentID
    WHERE student.EmailST = '$email'
";

$result = $conn->query($query);
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="StudentDetails.css">
    <meta charset="utf-8">
    <br>
    <title>Student Details</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            border: 2px solid;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body background="BGSD.gif" class="BGSD">
    <h1 style="text-align: center;">Your Details</h1>

    <br>
    <table>
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['StudentID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['StudentName']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Age']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['CourseName'] ?? 'N/A') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' style='text-align: center;'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
