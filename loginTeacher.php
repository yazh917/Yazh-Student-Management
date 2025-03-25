<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Form</title>

	<link rel="stylesheet" href="loginTC.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body background="BGLGTC.gif" class= "login_backg">

	<nav>
		<label class="title"><a href="index.php">Yazh Student Management</a></label>
	</nav>
	<center>
		<div class= "Form_design">

			<center class= "Title_login"><b>Teacher Login</b></center>
			
			<form action="ErrorinfoTC.php" method="POST" class= "Form_login">
				
				<div>
					<label class= "label_design">IDTeacher</label>
					<input type="text" class="IDField" name="IDTeacher" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Name</label>
					<input type="text" class="NameField" name="TeacherName" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Password</label>
					<input type="password" class="PassField" name="Password" required>
				</div>

				<br>
				<br>
				<div>
					<input class= "btn btn-primary"type="submit" name="submit" value= "login">
				</div>

				<br>
				<div>
					<label class= "label_design2"><a href = "loginAdmin.php" >Admin Login? Click here.</a></label>

				</div>

				<br>
				<div>
					<label class= "label_design3"><a href = "loginStudent.php" >Student Login? Click here.</a></label>

				</div>


			</form>

		</div>
	</center>

</body>
</html>