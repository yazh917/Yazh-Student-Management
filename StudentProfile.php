<?php 

	include ('BarStudentHome.php') ;

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

$name=$_SESSION['name'];

$sql="SELECT * FROM student WHERE StudentName='$name' ";

$result=mysqli_query($data,$sql);

$STinfo=mysqli_fetch_assoc($result); 



	if(isset($_POST['StudentProfile'])) {

		$password=$_POST['PasswordST'];
		$email=$_POST['EmailST'];
		$phone=$_POST['Phone'];

		$sql2= "UPDATE student SET PasswordST= '$password', EmailST= '$email', Phone= '$phone' WHERE StudentName='$name' ";

		$result2=mysqli_query($data, $sql2);

		if($result2) {

			echo "<script>alert ('Upadate Success'); window.location.href='StudentProfile.php'; </script>";
		}

	}


?>

<html>
<head>

	<link rel=stylesheet href= "StudentProfile.css">
	<br><br><br>
	<div class="h1"> 
	<h1>Profile</h1>
	</div>

</head>
<body background="BGBS.jpg" class="BGSP">

	<div class="design">

		<form action="" method="POST" class="BGform">

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

				<br><br>
				<div>
					<input type="submit" class="btnProfile" name="StudentProfile" value= "Submit">
				</div>
				<br>		
			</form>

	</div>

</body>
</html>