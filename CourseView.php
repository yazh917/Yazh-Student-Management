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

	<link rel="stylesheet"  href="CourseView.css">

</head>

<body>
		
	<form class="ViewCourse" action="" method="POST">

		<br>
		<br>
		<h1 class="TitleView" ><center>List of Yazh Course<center></h1>

				<br><br>
				<table border="5"><center>
					<tr>
						<th class="label_design">IDCourse</th>
						<th style="width: 500px; color: white; background-color: black; font-size: 20px; ">Course Name</th>
						<th class="label_design">Image</th>

			
					</tr>

				<?php

				while ($CourseInfo=$result->fetch_assoc()) { 

				?>

				<tr>
					<td class="td_design">

						<?php echo "{$CourseInfo['IDCourse']}"; ?> </td>

					<td class="td_design" style="width: 60px";>

						<?php echo "{$CourseInfo['CourseName']}"; ?> </td>

					<td class="td_design">

						<img height="200px" width="250px"  src= "<?php echo "{$CourseInfo['CourseImage']}"; ?>" ></td>


				</tr>

				<?php 

				}
				?>

				
				</table>

			</center>
</form>

</body>
</html>