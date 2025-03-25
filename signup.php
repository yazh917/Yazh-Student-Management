<?php

session_start();


$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['StudentName']) && isset($_POST['PasswordST']) && isset($_POST['EmailST']) && isset($_POST['Phone'])) {
        $name= $_POST['StudentName'];
        $password= $_POST['PasswordST'];
        $email= $_POST['EmailST'];
        $phone= $_POST['Phone'];

        
        $sql = "INSERT INTO student(StudentName, PasswordST, EmailST, Phone) 
                VALUES ('$name', '$password', '$email', '$phone')";
        $result = mysqli_query($data, $sql);


        if ($result) {

            echo "<script>alert('Signup Successful'); window.location='loginStudent.php';</script>";
             exit();

        } else {
            echo "<script>alert('Signup Unsuccesful'); window.location='loginStudent.php';</script>";
        }
    } else {
        echo "<script>alert('Required fields are missing!'); window.location='signup.php';</script>";
    }
} 

mysqli_close($data);
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Signup Form</title>

	<link rel="stylesheet" href="signup.css">


</head>
<body background="BGSIGN.gif" class= "login_backg">

	<center>
		<div class= "Form_design">

			<center class= "Title_login"><b>Student Signup</b></center>
			
			<form action="signup.php" method="POST" class= "Form_login">
				
				<div>
					<label class= "label_design">Username</label>
					<input type="text" class="NameField" name="StudentName" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Password</label>
					<input type="password" class="PassField" name="PasswordST" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Email</label>
					<input type="text" class="EmailField" name="EmailST" required>
				</div>

				<br>
				<div>
					<label class= "label_design">Phone</label>
					<input type="text" class="PhoneField" name="Phone" required>
				</div>

				<br>
				<br>
				<div>
					<input class= "signupbtn" type="submit" name="Signup" value= "Signup">

				</div>

				<br>
				<div>
					<button class= "btnback" onclick="window.location.href=('loginStudent.php');">Back</button>

				</div>

			</form>

		</div>
	</center>

</body>
</html>