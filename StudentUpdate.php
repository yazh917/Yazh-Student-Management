<?php

	include ('BarAdminHome.php');

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);


	$sql = "SELECT * FROM student"; 

	$result = mysqli_query($data, $sql);


?>


<html>
<head>

	<link rel="stylesheet"  href="StudentUpdate.css">

</head>

<body>
		
	<form class="ViewStudent" action="" method="POST">

		<br>
		<br><br>
		<h1 class="TitleView" ><center>List of Yazh Student<center></h1>

				<br>
				<table border="5"><center>
					<tr>
						<th class="label_design">IDStudent</th>
						<th class="label_design">StudentName</th>
						<th style="width: 60px; color: white; background-color: black; font-size: 20px; ">Age</th>
						<th style="color: white; background-color: black; font-size: 20px; " >Gender</th>
						<th style="width: 270px; color: white; background-color: black; font-size: 20px; ">Course</th>
						<th style="width: 180px; color: white; background-color: black; font-size: 20px; " >Password</th>
						<th style="width: 180px; color: white; background-color: black; font-size:20px; " >Email</th>
						<th class="label_design">Phone</th>
						<th class="label_design">Update</th>
						<th class="label_design">Delete</th>

					</tr>

				<?php

				while ($STInfo=$result->fetch_assoc()) { 

				?>

				<tr>
					<td class="td_design">

						<?php echo "{$STInfo['StudentID']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$STInfo['StudentName']}"; ?> </td>

					<td class="td_design" style="width: 60px";>

						<?php echo "{$STInfo['Age']}"; ?> </td>

					<td style="width:80px; 	text-align: center; background:url('BGUSF.jpg'); background-size: cover; font-size: 15px;">

						<?php echo "{$STInfo['Gender']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$STInfo['CourseName']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$STInfo['PasswordST']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$STInfo['EmailST']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$STInfo['Phone']}"; ?> </td>

					<td class="td_design">

						<a href="StudentUpdate2.php?StudentID=<?php echo $STInfo['StudentID']; ?>"><button type="button" class="Updatebtn" >Update</button></a>

					</td>

					<td class="td_design">

						<a href="StudentDelete.php?StudentID=<?php echo $STInfo['StudentID']; ?>"><button type="button" class="Deletebtn" >Delete</button></a>

					</td>

				</tr>

				<?php 

				}
				?>

				</tr>
				</table>

			</center>
</form>

</body>
</html>