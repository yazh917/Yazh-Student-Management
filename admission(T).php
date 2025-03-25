<?php
include('BarTeacherHome.php');

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $new_status = $_POST['status'];

    $update_sql = "UPDATE admission SET Status = '$new_status' WHERE ID = '$id'";
    mysqli_query($data, $update_sql);
}


$sql = "SELECT * FROM admission";
$result = mysqli_query($data, $sql);
?>




<html>
<head>
	<link rel="stylesheet" href="admission(T).css">
</head>
<body background="BGTHA.jpg" class="BG" >
	<br>
    <div>
        <h1 style="padding-left: 580px; padding-top: 101px;">Admission View</h1>
    </div>
    <br><br>

    <div style="margin-right: 13%;">
    <table border="5px" class="TableAD">
        <tr>
            <th style="padding-right: 50px; padding-left: 50px; height: 50px; font-size: 20px; background-color: white; " >Name</th>
            <th style="padding-right: 80px; padding-left: 80px; font-size: 20px; background-color: white; ">IC</th>
            <th style="padding-right: 100px; padding-left: 100px; font-size: 20px; background-color: white; ">Email</th>
            <th style="padding-right: 50px; padding-left: 50px; font-size: 20px; background-color: white; ">Phone</th>
            <th style="padding-right: 135px; padding-left: 135px; font-size: 20px; background-color: white; ">Message</th>
            <th style="padding-right: 50px; padding-left: 50px; font-size: 20px; background-color: white; ">Status</th>

        </tr>
    </div>


        <?php while ($ADInfo = $result->fetch_assoc()) { ?>
            <tr>
                <td style="text-align: center; height: 80px; font-size: 20px;"> <?php echo $ADInfo['Name']; ?> </td>
                <td style="text-align: center; font-size: 20px;"> <?php echo $ADInfo['IC']; ?> </td>
                <td style="text-align: center; font-size: 20px;"> <?php echo $ADInfo['Email']; ?> </td>
                <td style="text-align: center; font-size: 20px;"> <?php echo $ADInfo['Phone']; ?> </td>
                <td style="text-align: center; font-size: 20px;"> <?php echo $ADInfo['Message']; ?> </td>
				<td style="text-align: center; font-size: 20px;"> 
    			<span class="<?php echo ($ADInfo['Status'] == 'Pending') ? 'status-pending' : (($ADInfo['Status'] == 'Approved') ? 'status-approved' : 'status-rejected'); ?>">
        					<?php echo $ADInfo['Status'] ? $ADInfo['Status'] : "Pending"; ?>
    			</span>
				</td>
            </tr>

        <?php } ?>
    </table>
    <br><br>
</body>
</html>
