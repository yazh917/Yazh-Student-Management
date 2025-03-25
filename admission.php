<?php
include('BarAdminHome.php');

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
	<link rel="stylesheet" href="admission.css">
</head>
<body>
    <div>
        <h1 style="padding-left: 750px; padding-top: 101px;">Admission View</h1>
    </div>

    <div style="margin-right: 21%;">
    <table border="5px" class="TableAD">
        <tr>
            <th style="padding-right: 50px; padding-left: 50px; height: 50px; font-size: 20px;">Name</th>
            <th style="padding-right: 80px; padding-left: 80px; font-size: 20px;">IC</th>
            <th style="padding-right: 80px; padding-left: 80px; font-size: 20px;">Email</th>
            <th style="padding-right: 50px; padding-left: 50px; font-size: 20px;">Phone</th>
            <th style="padding-right: 100px; padding-left: 100px; font-size: 20px;">Message</th>
            <th style="padding-right: 50px; padding-left: 50px; font-size: 20px;">Status</th>
            <th style="padding-right: 50px; padding-left: 50px; font-size: 20px;">Action</th>
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
                <td style="text-align: center; font-size: 20px;">
                    <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $ADInfo['ID']; ?>">
                        <select style="width: 150px; height: 30px; text-align: center; " name="status" required>
                            <option value="Pending" <?php echo ($ADInfo['Status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="Approved" <?php echo ($ADInfo['Status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>

                        </select>
                        <button style="height: 30px; margin-top: 10px; " type="submit" name="update_status">Update</button>
                    </form>
                </td>
            </tr>

        <?php } ?>
    </table>
</body>
</html>
