<?php
include ('BarAdminHome.php');

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$TCinfo = null;
if (isset($_GET['IDTeacher'])) {
    $id = $_GET['IDTeacher'];
    $sql = "SELECT * FROM teacher WHERE IDTeacher = '$id'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $TCinfo = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No teacher found with the given ID.'); window.location.href='TeacherDelete.php';</script>";
    }
}

if (isset($_POST['DeleteTeacher'])) {
    $idToDelete = $_POST['IDTeacher'];
    $deleteQuery = "DELETE FROM teacher WHERE IDTeacher = '$idToDelete'";
    $deleteResult = mysqli_query($data, $deleteQuery);

    if ($deleteResult) {
        echo "<script>alert('Teacher deleted successfully.'); window.location.href='TeacherView.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the teacher.'); window.location.href='TeacherDelete.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Teacher</title>
    <link rel="stylesheet" href="TeacherDelete.css">
</head>
<body>

<div class="TCUP">
    <h1 style="background-color: darkkhaki; text-align: left; padding-left:150px; padding-bottom: 10px;">Delete Teacher</h1>

    <br><br>
    <form method="GET" action="TeacherDelete.php">
        <div>
            <label class="label_design">Teacher ID</label>
            <input type="text" class="TCidfield" name="IDTeacher" placeholder="Enter Teacher ID" required>
            <button type="submit" class="btnSearchTC">Search</button>
        </div>
    </form>

    <?php if ($TCinfo): ?>
        <br>
        <div>
            <form method="POST" action="">
                <div>
                    <label class="label_design">Teacher ID</label>
                    <input type="text" class="TCidfield" name="IDTeacher" value="<?php echo $TCinfo['IDTeacher']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Teacher Name</label>
                    <input type="text" class="TCnamefield" name="TeacherName" value="<?php echo $TCinfo['TeacherName']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Password</label>
                    <input type="text" class="TCpassfield" name="Password" value="<?php echo $TCinfo['Password']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Email</label>
                    <input type="text" class="TCemailfield" name="Email" value="<?php echo $TCinfo['Email']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Experience</label>
                    <textarea class="TCdesfield" name="Description" rows="10" readonly><?php echo $TCinfo['Description']; ?></textarea>
                </div>

                <br>
                <div>
                    <label class="label_design">Personal Photo</label>
                    <img width="350px" height="200px" src="<?php echo $TCinfo['PersonalPhoto']; ?>" alt="Teacher Photo">
                </div>

                <br><br>
                <div>
                    <center><input type="submit" class="btnDeleteTC" name="DeleteTeacher" value="Delete Teacher"></center>
                </div>
                <br>
            </form>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
