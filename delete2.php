<?php
session_start();

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);

	if(isset($_GET['IDTeacher'])) {

	$ID=$_GET['IDTeacher'];
	
	$sql = "DELETE FROM teacher WHERE IDTeacher='$ID'"; 

	$result = mysqli_query($data, $sql);

	if (mysqli_affected_rows($data) > 0) {
        echo "<script>alert('Delete Successfully!'); window.location.href = 'TeacherView.php'; </script>";
    } else {
        echo "<script>alert('Delete Unsuccessful: IDTeacher does not Exist!'); window.location.href = 'TeacherView.php'; </script>";    
    }

	} 
?>