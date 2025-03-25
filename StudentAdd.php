<?php
include ('BarAdminHome.php');

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (!$data) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['StudentAdd'])) {

    $id = $_POST['StudentID'];
    $name = $_POST['StudentName'];
    $password = $_POST['PasswordST'];
    $email = $_POST['EmailST'];
    $age = $_POST['Age'];
    $gender = $_POST['Gender'];
    $phone = $_POST['Phone'];
    $course = $_POST['CourseName'];

    if (empty($id) || empty($name) || empty($age) || empty($gender) || empty($course) || empty($password) || empty($email) || empty($phone)) {
        echo "<script>alert('Add Failed! Please fill up all fields.'); window.location= 'StudentAdd.php'; </script>";
    } else {

        $check_id = "SELECT * FROM student WHERE StudentID = '$id'";
        $check_result_id = mysqli_query($data, $check_id);

        $check_email = "SELECT * FROM student WHERE EmailST = '$email'";
        $check_result_email = mysqli_query($data, $check_email);

        if (mysqli_num_rows($check_result_id) > 0) {
            echo "<script>alert('Student ID Already Exists! Try Again.'); window.location= 'StudentAdd.php';</script>";
        } elseif (mysqli_num_rows($check_result_email) > 0) {
            echo "<script>alert('Email Already Exists! Try Again with a different email.'); window.location= 'StudentAdd.php';</script>";
        } else {
            // Insert the new student
            $sql = "INSERT INTO student (StudentID, StudentName, Age, Gender, CourseName, PasswordST, EmailST, Phone) 
                    VALUES ('$id', '$name', '$age', '$gender', '$course', '$password', '$email', '$phone')";

            $result = mysqli_query($data, $sql);

            if ($result) {
                echo "<script>alert('Student has been added successfully.'); window.location= 'StudentAdd.php';</script>";
            } else {
                echo "<script>alert('Add Failed. Please try again.'); window.location= 'StudentAdd.php';</script>";
            }
        }
    }
}
?>

?>

<html>
<head>

	<link rel="stylesheet"  href="StudentAdd.css">

</head>

<body>
		
	<form class="AddStudentForm" action="" method="POST" enctype="multipart/form-data"><center>
	<div class="StudentAdd">

		<h1 style="background-color: aqua; width: 560px; height: 50px; color: royalblue; ">Add Student</h1>

				<br>

				<div>
				<label class="label_design">Student ID</label>
				<input type="text" class="STidfield" name="StudentID">
				</div>

				<br>
				<div>
				<label class="label_design">Student Name</label>
				<input type="text" class="STnamefield" name="StudentName">
				</div>

				<br>
				<div>
					<label class="label_design">Age</label>
					<input type="number" class="STagefield"  name="Age">
				</div>

				<br>
				<div>
					<label class="label_design">Gender</label>	
					<select class="STgenderfield" name="Gender">
					<option value=""></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
				</div>


				<br>
				<div>
					<label class="label_design">Course</label>
					<input type="text" class="STcoursefield"  name="CourseName">
				</div>

				<br>
				<div>
					<label class="label_design">Password</label>
					<input type="text" class="STpassfield"  name="PasswordST">
				</div>

				<br>
				<div>
					<label class="label_design">Email</label>
					<input type="text" class="STemailfield"  name="EmailST">
				</div>

				<br>
				<div>
					<label class="label_design">Phone</label>
					<input type="text" class="STphonefield"  name="Phone">
				</div>

				<br>
				<div>
					<input type="submit" class="btnAddST" name="StudentAdd" value= "Add">
				</div>
				<br>

			</div>
			</center>
</form>

</body>
</html>