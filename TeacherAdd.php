<?php

include ('BarAdminHome.php');



$host="localhost";
$user="root";
$pass="";
$db="yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (!$data) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['TeacherAdd'])) {

    $id = $_POST['IDTeacher'];
    $Name = $_POST['TeacherName'];
    $describe = $_POST['Description'];
    $Photo = $_FILES['PersonalPhoto']['name'];


    if (empty($id) || empty($Name) || empty($Photo))   
    {
        echo "<script>alert('Add Failed! Please fill up all field.'); window.location= 'TeacherAdd.php'; </script>";

    } else {

    $checkid = "SELECT * FROM teacher WHERE IDTeacher='$id'";
    $checkResult = mysqli_query($data, $checkid);
    }

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Teacher ID already exists! Please check again.'); window.location= 'TeacherAdd.php'; </script>";

    } else {

    $PhotoPath="./image/".$Photo;

    $PhotoPathdb="image/".$Photo;

    move_uploaded_file($_FILES['PersonalPhoto']['tmp_name'], $PhotoPath);


        $sql = "INSERT INTO teacher (IDTeacher, TeacherName, Description, PersonalPhoto) 
                VALUES ('$id', '$Name', '$describe', '$PhotoPathdb')";

        $result= mysqli_query($data, $sql);

            if ($result) {
                echo "<script>alert('Data of Teacher Has Been Added Successfully'); window.location= 'TeacherAdd.php'; </script>";
        
            } else {
                echo "<script>alert('Add Failed'); window.location= 'TeacherAdd.php'; </script>";
            }

        
    }
}

?>

<html>
<head>

	<link rel="stylesheet"  href="TeacherAdd.css">

</head>

<body>
		
	<form class="AddTeacherForm" action="#" method="POST" enctype="multipart/form-data" ><center>
	<div class="TeacherAdd">

		<h1 style="background-color: chocolate; width: 560px; height: 50px; color:white; ">Add Teacher</h1>

				<br><br>

				<div>
				<label class="label_design">ID Teacher</label>
				<input type="text" class="TCidfield" name="IDTeacher">
				</div>

				<br>
				<div>
				<label class="label_design">Name</label>
				<input type="text" class="TCnamefield" name="TeacherName">
				</div>

				<br>
				<div>
					<label class="label_design">Description</label>
					<textarea class="TCdescription" rows="10" name="Description"></textarea>
				</div>

				<br>
				<div>
					<label class="label_design">Personal Photo</label>
					<input type="file" class="TCphoto"  name="PersonalPhoto">
				</div>

				<br>
				<div>
					<input type="submit" class="btnAddTC" name="TeacherAdd" value= "Add">
				</div>
				<br>

			</div>
			</center>
</form>

</body>
</html>