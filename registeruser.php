<?php


$newusername = mysql_real_escape_string($_POST['newusername']);
$newpassword = mysql_real_escape_string($_POST['newpassword']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
};

$sql = "INSERT INTO admins (username, password ) VALUES ('$newusername','$newpassword')";
$result = $conn->query($sql);

if ($conn->query($sql) === TRUE) {

Print '<script>alert("Thank you , redirecting to main page")</script>'; //
header("location: login.php");
};

$conn->close();

?>