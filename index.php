<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE MyGuests SET lastname = 'Khan' WHERE id=12";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
?>
