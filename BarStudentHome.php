<?php

session_start();

	if(!isset($_SESSION['email']))
	{
		header("Location: loginStudent.php");
		exit();
	}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Home</title>

<link rel="stylesheet" type="text/css" href="HomeStudent.css"> 

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

	<header class= "headerAD"> 
		
		<a href="HomeStudent.php">Student HOME</a>

		<div class= "logoutAD">

		<a href="logout.php" class="btn btn-primary">Logout</a>

		</div>

	</header>

		<ul class= "backgroundUL">
			
			<li>
				<a href="StudentProfile.php">My Profile</a>
			</li>

			<li>
				<a href="StudentDetails.php">My Details</a>
			</li>

			
		</ul>



</body>
</html>