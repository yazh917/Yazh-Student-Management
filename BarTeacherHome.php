<?php

session_start();

	if(!isset($_SESSION['id'])) {
		
		header("Location: loginTeacher.php");
		exit();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>Teacher Home</title>

	<link rel="stylesheet" type="text/css" href="HomeTeacher.css"> 



</head>
<body>

	<nav>
	<header class= "headerTC"> 
		
		<a href="HomeTeacher.php">Teacher HOME</a>

		<div class= "logoutTC">

		<button class="btnlogout"><a href="logout3.php">Logout</button></a>

		</div>

	</nav>

	</header>

	<div>

		<ul class= "backgroundUL">

			<br>
			<li>
				<a href="admission(T).php">Admission</a>
			</li>

			<br><br>
			<li>
				<a href="StudentView(T).php">View Student </a>
			</li>

			<br><br>
			<li>
				<a href="StudentUpdate(T).php">Update Student</a>
			</li>
			
			<br><br>
			<li>
				<a href="CourseView(T).php">View Course</a>
			</li>

			<br><br>
			<li>
				<a href="CourseUpdate(T).php">Update Course</a>
			</li>
			<br>


		</ul>
	
	</div>