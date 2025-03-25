<?php
    include ('BarAdminHome.php');


    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "yzstudentmanagementsystem";

    $data = mysqli_connect($host, $user, $pass, $db);

    $id = $_GET['IDTeacher'];

    if ($id) {
        $sql = "SELECT * FROM teacher WHERE IDTeacher = '$id'";
        $result = mysqli_query($data, $sql);
        $TCinfo = $result->fetch_assoc();
    } else {
        echo "<script>alert('No Teacher ID specified'); window.location.href='TeacherView.php';</script>";
        exit;
    }


    if (isset($_POST['TeacherUpdate'])) {
        $newID = $_POST['IDTeacher'];
        $name = $_POST['TeacherName'];
        $password = $_POST['Password'];
        $email = $_POST['Email'];
        $Describe = $_POST['Description'];
        $Photo = $_FILES['PersonalPhoto']['name'];


        if ($Photo) {
            $PhotoPath = "./image/" . $Photo;
            
            if (move_uploaded_file($_FILES['PersonalPhoto']['tmp_name'], $PhotoPath)) {
                $PhotoPathdb = "image/" . $Photo;
            } else {
                echo "<script>alert('Failed to upload photo');</script>";
                $PhotoPathdb = $TCinfo['PersonalPhoto'];
            }
        } else {
         
            $PhotoPathdb = $TCinfo['PersonalPhoto'];
        }

     
        $query = "UPDATE teacher 
                  SET IDTeacher = '$newID', 
                      TeacherName = '$name', 
                      Password = '$password', 
                      Email = '$email', 
                      Description = '$Describe', 
                      PersonalPhoto = '$PhotoPathdb'
                  WHERE IDTeacher = '$id'";
                  
        $result2 = mysqli_query($data, $query);

        if ($result2) {
            echo "<script>alert('Update Successful'); window.location.href='TeacherView.php?IDTeacher=$newID';</script>";
        } else {
            echo "<script>alert('Update Failed'); window.location.href='TeacherUpdate2.php?IDTeacher=$id';</script>";
        }
    }

    mysqli_close($data);
?>

<html>
<head>
	<link rel="stylesheet" href="TeacherUpdate2.css">
</head>

<body>
	<div class="TCUP">
		<h1 style="background-color: darkkhaki; text-align: left; padding-left:150px; padding-bottom: 10px;">Update Teacher</h1>

		<br><br>
		<div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div>
					<label class="label_design">Teacher ID</label>
					<input type="text" class="TCidfield" name="IDTeacher" value="<?php echo $TCinfo['IDTeacher']; ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Teacher Name</label>
					<input type="text" class="TCnamefield" name="TeacherName" value="<?php echo $TCinfo['TeacherName']; ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Password</label>
					<input type="text" class="TCpassfield" name="Password" value="<?php echo $TCinfo['Password']; ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Email</label>
					<input type="text" class="TCemailfield" name="Email" value="<?php echo $TCinfo['Email']; ?>">
				</div>

				<br>
				<div>
					<label class="label_design">Experience</label>
					<textarea class="TCdesfield" name="Description" rows="10"><?php echo $TCinfo['Description']; ?></textarea>
				</div>

				<br>
				<div>
					<label class="label_design">Personal Photo</label>
					<img width="350px" height="200px" src="<?php echo $TCinfo['PersonalPhoto']; ?>">
				</div>

				<br>
				<div>
					<label class="label_design">New Personal Photo</label>
					<input type="file" class="TCphoto" name="PersonalPhoto">	
				</div>

				<br>
				<div>
					<input type="submit" class="btnupdateTC" name="TeacherUpdate" value="Update">
				</div>
				<br>
			</form>
		</div>
	</div>
</body>
</html>
