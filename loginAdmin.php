<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login Form</title>

	<link rel="stylesheet" href="loginAD.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body background="BGLGAD.jpg" class= "login_backg">

	<nav>
		<label class="title"><a href="index.php">Yazh Student Management</a></label>
	</nav>

	<center>
		<div class= "Form_design">

			<center class= "Title_login"><b>Admin Login</b></center>
			
			<form action="ErrorinfoAD.php" method="POST" class= "Form_login">
				
				<div>
					<label class= "label_design">ID</label>
					<input type="text" class="IDField" name="IDAdmin" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Name</label>
					<input type="text" class="NameField" name="AdminName" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Password</label>
					<input type="password" class="PassField" name="PasswordAD" required>
				</div>

				<br>
				<br>
				<div>
					<input class= "btn btn-primary"type="submit" name="submit" value= "login">
				</div>

				<br>
				<div>
					<label class= "label_design2"><a href = "loginStudent.php" >Student Login? Click here.</a></label>

				</div>

				<p></p>
				<div>
					<label class= "label_design3"><a href = "loginTeacher.php" >Teacher Login? Click here.</a></label>

				</div>


			</form>

		</div>
	</center>

</body>
</html>