<?php

session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

if (isset($_POST['Apply'])) {

	$AdmissionName= $_POST['Name'];
	$AdmissionIC= $_POST['IC'];
	$AdmissionEmail= $_POST['Email'];
	$AdmissionPhone= $_POST['Phone'];
	$AdmissionMessage= $_POST['Message'];

	$sql="INSERT INTO admission(Name, IC, Email, Phone, Message) VALUES ('$AdmissionName', '$AdmissionIC', '$AdmissionEmail', '$AdmissionPhone', '$AdmissionMessage')";

	$result=mysqli_query ($data, $sql);

	if ($result) {

		echo "<script>alert ('Apply Success'); window.location='index.php';</script>";
	}

	else {

		echo "<script>alert ('Apply Failed'); window.location='index.php';</script>";
	}
}

?>