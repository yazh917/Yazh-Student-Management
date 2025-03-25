<?php
    include ('BarAdminHome.php');

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "yzstudentmanagementsystem";

    $data = mysqli_connect($host, $user, $pass, $db);

    $id = $_GET['IDCourse'];

    if ($id) {
        $sql = "SELECT * FROM course WHERE IDCourse = '$id'";
        $result = mysqli_query($data, $sql);
        $Courseinfo = $result->fetch_assoc();
    } else {
        echo "<script>alert('No Course ID specified'); window.location.href='CourseView.php';</script>";
        exit;
    }


    if (isset($_POST['CourseUpdate'])) {
        $name = $_POST['CourseName'];
        $Photo = $_FILES['CourseImage']['name'];


        if ($Photo) {
            $PhotoPath = "./image/" . $Photo;
            if (move_uploaded_file($_FILES['CourseImage']['tmp_name'], $PhotoPath)) {
                $PhotoPathdb = "image/" . $Photo;
            } else {
                echo "<script>alert('Failed to upload image');</script>";
                $PhotoPathdb = $Courseinfo['CourseImage'];
            }
        } else {
         
            $PhotoPathdb = $Courseinfo['CourseImage'];
        }

    
        $query = "UPDATE course 
                  SET CourseName = '$name', 
                      CourseImage = '$PhotoPathdb'
                  WHERE IDCourse = '$id'";
                  
        $result2 = mysqli_query($data, $query);

        if ($result2) {
            echo "<script>alert('Update Successful'); window.location.href='CourseView.php?IDCourse=$id';</script>";
        } else {
            echo "<script>alert('Update Failed'); window.location.href='CourseUpdate2.php?IDCourse=$id';</script>";
        }
    }

    mysqli_close($data);
?>

<html>
<head>
    <link rel="stylesheet" href="CourseUpdate2.css">
</head>

<body>
    <div class="CRUP">
        <h1 style="background-color: darkkhaki; text-align: left; padding-left:150px; padding-bottom: 10px;">Update Course</h1>

        <br><br>
        <div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label class="label_design">Course Name</label>
                    <input type="text" class="Crnamefield" name="CourseName" value="<?php echo $Courseinfo['CourseName']; ?>" required>
                </div>


                <br>
                <div>
                    <label class="label_design">Current Course Image</label>
                    <img width="350px" height="300px" src="<?php echo $Courseinfo['CourseImage']; ?>" alt="No Image Available">
                </div>

                <br>
                <div>
                    <label class="label_design">New Course Image</label>
                    <input type="file" class="CRphoto" name="CourseImage">
                </div>

                <br><br>
                <div>
                    <center><input type="submit" class="btnupdateCr" name="CourseUpdate" value="Update"></center>
                </div>
                <br>
            </form>
        </div>
    </div>
</body>
</html>
