<?php
include ('BarAdminHome.php');

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Course</title>
    <link rel="stylesheet" href="CourseDelete.css">
</head>
<body>

<div>
    <br><br><br><br><br><br>
    <center><h1 class="Title">Delete Course</h1></center>
    



    <center>
        <form class="Form_Delete" >
        	<br>
            <div>
                <label class="label_design">ID Course</label>
                <input type="text" class="IDField" id="IDCourse" name="IDCourse" required>
            </div>

            <div>
                <button type="button" class="Deletebtn" onclick="deleteCourse()">Delete</button>
            </div>
        </form>
    </center>


</div>

<script>
    function deleteCourse() {
        const IDCourse = document.getElementById('IDCourse').value;
        
        if (IDCourse) {
            window.location.href = `delete3.php?IDCourse=${IDCourse}`;
        } else {
            alert("Please enter a valid Course ID.");
        }
    }
</script>

</body>
</html>
