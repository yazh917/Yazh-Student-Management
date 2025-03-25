<?php

	include ('BarAdminHome.php');

	$host="localhost";
	$user="root";
	$pass="";
	$db="yzstudentmanagementsystem";

	$data = mysqli_connect($host, $user, $pass, $db);


	$sql = "SELECT * FROM course"; 

	$result = mysqli_query($data, $sql);


?>


<html>
<head>

	<link rel="stylesheet"  href="CourseUpdate.css">

</head>

<body>
		
	<form class="ViewCourse" action="" method="POST">

		<br>
		<br>
		<h1 class="TitleView" ><center>List of Yazh Course<center></h1>

				<br><br>
				<table border="5"><center>
					<tr>
						<th class="label_design">ID</th>
						<th class="label_design">CourserName</th>
						<th style="width:400px; background-color: black; color: white; font-size: 20px; ">Image</th>
						<th class="label_design" >Update</th>
	

					</tr>

				<?php

				while ($CourseInfo=$result->fetch_assoc()) { 

				?>

				<tr>

					<td class="td_design">

						<?php echo "{$CourseInfo['IDCourse']}"; ?></td>
	
					<td style="width: 360px; height: 200px; text-align: center; background: url('BGCUF.jpg'); background-size: cover; font-size: 22px;">

						<?php echo "{$CourseInfo['CourseName']}"; ?> </td>


					<td class="td_design" ><center><img height="300px" width="360px" src= "<?php echo "{$CourseInfo['CourseImage']}"; ?>" ></center></td>

					<td class="td_design" >

						<a href="CourseUpdate2.php?IDCourse=<?php echo $CourseInfo['IDCourse']; ?>"><button type="button" class="Updatebtn" >Update</button></a>

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