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

	<link rel="stylesheet"  href="TeacherUpdate.css">

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
						<th class="label_design" >Email</th>
						<th style="width: 340px; color: white; background-color: darkseagreen; font-size: 20px; ">Experience</th>
						<th style="width: 180px; color: white; background-color: darkseagreen; font-size: 20px; " >PersoanlPhoto</th>
						<th class="label_design" >Update</th>
						<th class="label_design" >Delete</th>
	

					</tr>

				<?php

				while ($TCInfo=$result->fetch_assoc()) { 

				?>

				<tr>
					<td class="td_design">

						<?php echo "{$TCInfo['IDTeacher']}"; ?> </td>

					<td class="td_design">

						<?php echo "{$TCInfo['TeacherName']}"; ?> </td>

					<td class="td_design" style="width: 60px";>

						<?php echo "{$TCInfo['Password']}"; ?> </td>

					<td style="width:80px; 	text-align: center; background: url('BGTUF.jpg'); background-size: cover; font-size: 15px;">

						<?php echo "{$TCInfo['Email']}"; ?> </td>

					<td  style="text-align: left; padding-left: 1%; " class="td_design">

						<?php echo "{$TCInfo['Description']}"; ?> </td>

					<td class="td_design">

					<img height="120px" width="160px" src= "<?php echo "{$TCInfo['PersonalPhoto']}"; ?>" ></td>

					<td class="td_design">

						<a href="TeacherUpdate2.php?IDTeacher=<?php echo $TCInfo['IDTeacher']; ?>"><button type="button" class="Updatebtn" >Update</button></a>

					</td>

					<td class="td_design">

						<a href="TeacherDelete.php?IDTeacher=<?php echo $TCInfo['IDTeacher']; ?>"><button type="button" class="Deletebtn" >Delete</button></a>

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