<?php

	include ('BarAdminHome.php');

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);


	$sql = "SELECT * FROM teacher"; 

	$result = mysqli_query($data, $sql);


?>


<html>
<head>

	<link rel="stylesheet"  href="TeacherView.css">

</head>

<body>
		
	<form class="ViewTeacher" action="" method="POST">

		<br>
		<br>
		<h1 class="TitleView" ><center>List of Yazh Teacher<center></h1>

				<br>
				<table border="5"><center>
					<tr>
						<th class="label_design">IDTeacher</th>
						<th class="label_design">TeacherName</th>
						<th class="label_design">Password</th>
						<th class="label_design">Email</th>
						<th class="label_design">Experience</th>
						<th class="label_design">Photo</th>

					</tr>

				<?php

				while ($TCInfo=$result->fetch_assoc()) { 

				?>

				<tr>
					<td class="td_design">

						<?php echo "{$TCInfo['IDTeacher']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$TCInfo['TeacherName']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$TCInfo['Password']}"; ?> </td>

					<td style="width:80px; 	text-align: center; background:url('BGVTF.jpg'); background-size: cover; font-size: 15px;">

						<?php echo "{$TCInfo['Email']}"; ?> </td>

					<td style="width:520px; 	text-align: center; background:url('BGVTF.jpg'); background-size: cover; font-size: 15px; text-align: justify; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; ">

						<?php echo "{$TCInfo['Description']}"; ?> </td>

					<td class="td_design">

						<img height="145px" width="160px" src= "<?php echo "{$TCInfo['PersonalPhoto']}"; ?>" ></td>

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