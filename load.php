

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$result_arr = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, firstname , lastname , email, reg_date FROM MyGuests";
$result = $conn->query($sql);

$result_arr = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($result_arr);
   


$conn->close();
?>

