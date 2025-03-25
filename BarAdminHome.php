<?php

session_start();

	if(!isset($_SESSION['id'])) {
		
		header("Location: loginAdmin.php");
		exit();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Admin Home</title>

	<link rel="stylesheet" type="text/css" href="HomeAdmin.css"> 



</head>
<body background="AdmissionBackground.jpg" class="AdminHomeBackground">

	<header class= "headerAD"> 
		
		<a href="HomeAdmin.php">Admin HOME</a> 

	</header>

		<div class= "logoutAD">

		<button style="width: 80px; height: 50px; position: relative; margin-left: 300%; margin-top: 18%;"><a href="logout2.php">Logout</a></button>

		</div>

	</header>

	<div class="ScrollBar">
	<aside>
		<ul class= "backgroundUL">
			<li>
				<a href="admission.php">Admission</a>
			</li>

			<br>
			<li>
				<a href="TeacherAdd.php">Add Teacher</a>
			</li>

			<br>
			<li>
				<a href="TeacherView.php">View Teacher</a>
			</li>

			<br>
			<li>
				<a href="TeacherUpdate.php">Update Teacher</a>
			</li>

			<br>
			<li>
				<a href="StudentAdd.php">Add Student</a>
			</li>

			<br>
			<li>
				<a href="StudentView.php">View Student </a>
			</li>

			<br>
			<li>
				<a href="StudentUpdate.php">Update Student</a>
			</li>

			<br>
			<li>
				<a href="CourseAdd.php">Add Course</a>
			</li>
			
			<br>
			<li>
				<a href="CourseView.php">View Course</a>
			</li>

			<br>
			<li>
				<a href="CourseUpdate.php">Update Course</a>
			</li>

			<br>
			<li>
				<a href="CourseDelete.php">Delete Course</a>
			</li>

			<br>


		</ul>
	</aside>
	</div>