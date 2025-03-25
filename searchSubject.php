<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "yzstudentmanagementsystem";

$data = mysqli_connect($host, $user, $pass, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$search_query = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = mysqli_real_escape_string($data, $search_query);

$sql = "SELECT * FROM subjects WHERE SubjectName LIKE '%$search_query%'";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Subject Results</title>
    <link rel="stylesheet" href="searchResults.css">
</head>
<body>
	<a href="index.php">
		
	<img src="home.png" class="Imghome">
	</a>
	
    <h1>Search Results for Subjects</h1>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="container">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div>
                    <img src="<?php echo $row['SubjectImage']; ?>" alt="<?php echo $row['SubjectName']; ?>" style="max-width: 200px;">
                    <h3><?php echo $row['SubjectName']; ?></h3>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No results found for "<?php echo htmlspecialchars($search_query); ?>"</p>
    <?php } ?>
</body>
</html>
