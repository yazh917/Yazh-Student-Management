<?php

$host="localhost";
$user="root";
$pass="";
$db="yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

$sql="SELECT * FROM teacher ";

$result=mysqli_query($data,$sql);

?>
