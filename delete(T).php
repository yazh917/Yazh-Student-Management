<?php
session_start();

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);

	if(isset($_GET['StudentID'])) {

	$ID=$_GET['StudentID'];
	
	$sql = "DELETE FROM student WHERE StudentID='$ID'"; 

	$result = mysqli_query($data, $sql);

	if (mysqli_affected_rows($data) > 0) {
        echo "<script>alert('Delete Successfully!'); window.location.href = 'StudentView(T).php'; </script>";
    } else {
        echo "<script>alert('Delete Unsuccessful: IDSudent does not Exist!'); window.location.href = 'StudentView(T).php'; </script>";    
    }

	} 
?>