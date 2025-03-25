<?php
session_start();

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);

	if(isset($_GET['IDCourse'])) {

	$ID=$_GET['IDCourse'];
	
	$sql = "DELETE FROM course WHERE IDCourse='$ID'"; 

	$result = mysqli_query($data, $sql);

	if (mysqli_affected_rows($data) > 0) {
        echo "<script>alert('Delete Successfully!'); window.location.href = 'CourseView.php'; </script>";
    } else {
        echo "<script>alert('Delete Unsuccessful: IDCourse does not Exist!'); window.location.href = 'CourseView.php'; </script>";    
    }

	} 
?>