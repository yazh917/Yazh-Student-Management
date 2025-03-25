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

if (isset($_POST['CourseAdd'])) {


    $name = $_POST['CourseName'];
    $image = $_FILES['CourseImage']['name'];


    if (empty($name) || empty($image)) {
        echo "<script>alert('Add Failed! Please fill up all fields.'); window.location= 'CourseAdd.php'; </script>";
    } else {

        $checkname = "SELECT * FROM course WHERE CourseName='$name'";
        $checkResult = mysqli_query($data, $checkname);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Course Name already exists! Please check again.'); window.location= 'CourseAdd.php'; </script>";
        } else {

            $imagePath = "./image/" . $image;
            $imagePathDb = "image/" . $image;


            if (move_uploaded_file($_FILES['CourseImage']['tmp_name'], $imagePath)) {

                $sql = "INSERT INTO course (CourseName, CourseImage) 
                        VALUES ('$name', '$imagePathDb')";

                $result = mysqli_query($data, $sql);

                if ($result) {
                    echo "<script>alert('Data of Course Has Been Added Successfully'); window.location= 'CourseAdd.php'; </script>";
                } else {
                    echo "<script>alert('Add Failed'); window.location= 'CourseAdd.php'; </script>";
                }
            } else {
                echo "<script>alert('Image upload failed.'); window.location= 'CourseAdd.php'; </script>";
            }
        }
    }
}
?>


<html>
	<head>

		<link rel="stylesheet" type="text/css" href="CourseAdd.CSS">		
	</head>
	<body>
		
		<form class="CourseAddForm" action="" method="POST" enctype="multipart/form-data" >
			<div class="CourseAdd">
				
				<h1 style="background-color:black; width: 580px ;"><center> Add Course  </center></h1>

			<br><br>
			<div>
				
				<label class="CName" >Course Name</label>
				<input type="text" class="NameField"  name="CourseName">
			</div>

			<br><br>


			<div>
					<label class="CImage">Course Image</label>
					<input type="file" class="Cfield"  name="CourseImage">
			</div>


			<br><br>
			<div>
				<input type="submit" class="Coursebtn" name="CourseAdd" value="Add" >
			</div>
			<br><br>

			</div>

		</form>

	
	</body>


</html>

