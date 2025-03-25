<?php

	include ('BarAdminHome.php');

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);

	$id = $_GET['StudentID'];

	if ($id) {
    $sql = "SELECT * FROM student WHERE StudentID = '$id'"; 
    $result = mysqli_query($data, $sql);

    $STinfo = $result->fetch_assoc(); 

	} else {
    echo "<script>alert('No Student ID specified'); window.location.href='StudentView.php'; </script>";
    exit;
}


	if(isset($_POST['StudentUpdate'])) {

		$newID=$_POST['StudentID'];
		$deletequery= "DELETE FROM student WHERE StudentID = '$id'";
		mysqli_query($data, $deletequery);


		$name=$_POST['StudentName'];
		$password=$_POST['PasswordST'];
		$email=$_POST['EmailST'];
		$age=$_POST['Age'];
		$gender=$_POST['Gender'];
		$phone=$_POST['Phone'];
		$course=$_POST['CourseName'];

		$query= "INSERT INTO student (StudentID, StudentName, Age, Gender, CourseName, PasswordST, EmailST, Phone) 
		VALUES ('$newID', '$name', '$age', '$gender', '$course', '$password', '$email', '$phone' )";

		$result2=mysqli_query($data, $query);

		if($result2) {

			echo "<script>alert ('Upadate Success'); window.location.href='StudentView.php'; </script>";
		} else {

			echo "<script>alert ('Update Failed'); window.location.href='StudentUpdate.php'; </script> ";
		}
	}

?>

<html>
<head>
	
	<link rel="stylesheet" href="StudentUpdate2.css">

</head>

<body>

	<div class= STUP>

		<h1 style="background-color: darkkhaki; text-align: left; padding-left:150px; padding-bottom: 10px; " >Update Student</h1>

		<br><br>
		<div>
			
			<form action="" method="POST" >
				<div>
					<label class="label_design">Student ID</label>
					<input type="text" class="STidfield" name="StudentID" 
					value="<?php echo $STinfo['StudentID'];  ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Student Name</label>
					<input type="text" class="STnamefield" name="StudentName"
					value="<?php echo $STinfo['StudentName'];  ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Age</label>
					<input type="number" class="STagefield"  name="Age"
					value="<?php echo $STinfo['Age'];  ?>">
				</div>

				<br>
				<div>
				    <label class="label_design" for="gender">Gender</label>
				    <select class="STgenderfield" name="Gender" id="gender">
				        <option value="Male" <?php echo ($STinfo['Gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
				        <option value="Female" <?php echo ($STinfo['Gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
				    </select>
				</div>



				<br>
				<div>
					<label class="label_design">Course</label>
					<input type="text" class="STcoursefield"  name="CourseName"
					value="<?php echo $STinfo['CourseName'];  ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Password</label>
					<input type="text" class="STpassfield"  name="PasswordST"
					value="<?php echo $STinfo['PasswordST'];  ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Email</label>
					<input type="text" class="STemailfield"  name="EmailST"
					value="<?php echo $STinfo['EmailST'];  ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Phone</label>
					<input type="text" class="STphonefield"  name="Phone"
					value="<?php echo $STinfo['Phone'];  ?>">
				</div>

				<br>
				<div>
					<input type="submit" class="btnupdateST" name="StudentUpdate" value= "Update">
				</div>
				<br>

			</form>
		</div>

	</div>