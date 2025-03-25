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

$STinfo = null; // Placeholder for student info
if (isset($_GET['StudentID'])) {
    $id = $_GET['StudentID'];
    $sql = "SELECT * FROM student WHERE StudentID = '$id'";
    $result = mysqli_query($data, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $STinfo = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('No student found with the given ID.'); window.location.href='studentdelete.php';</script>";
    }
}

if (isset($_POST['DeleteStudent'])) {
    $idToDelete = $_POST['StudentID'];
    $deleteQuery = "DELETE FROM student WHERE StudentID = '$idToDelete'";
    $deleteResult = mysqli_query($data, $deleteQuery);

    if ($deleteResult) {
        echo "<script>alert('Student deleted successfully.'); window.location.href='StudentView.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the student.'); window.location.href='studentdelete.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Student</title>
    <link rel="stylesheet" href="StudentDelete.css">
</head>
<body>
<div class="STDL">
    <h1 style="background-color: lightblue; text-align: left; padding-left:150px; padding-bottom: 10px;">Delete Student</h1>

    <br>
    <form method="GET" action="studentdelete.php">
        <div>
            <label class="label_design">Student ID</label>
            <input type="text" class="STidfield" name="StudentID" placeholder="Enter Student ID" required>
            <button type="submit" class="btnSearchST">Search</button>
        </div>
    </form>

    <?php if ($STinfo): ?>
        <br>
        <div>
            <form method="POST" action="">
                <div>
                    <label class="label_design">Student ID</label>
                    <input type="text" class="STidfield" name="StudentID" value="<?php echo $STinfo['StudentID']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Student Name</label>
                    <input type="text" class="STnamefield" name="StudentName" value="<?php echo $STinfo['StudentName']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Age</label>
                    <input type="text" class="STagefield" name="Age" value="<?php echo $STinfo['Age']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Gender</label>
                    <input type="text" class="STgenderfield" name="Gender" value="<?php echo $STinfo['Gender']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Course</label>
                    <input type="text" class="STcoursefield" name="CourseName" value="<?php echo $STinfo['CourseName']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Email</label>
                    <input type="text" class="STemailfield" name="Email" value="<?php echo $STinfo['EmailST']; ?>" readonly>
                </div>

                <br>
                <div>
                    <label class="label_design">Phone</label>
                    <input type="text" class="STphonefield" name="Phone" value="<?php echo $STinfo['Phone']; ?>" readonly>
                </div>

                <br><br>
                <div>
                    <center><input type="submit" class="btnDeleteST" name="DeleteStudent" value="Delete Student"></center>
                </div>
                <br>
            </form>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
