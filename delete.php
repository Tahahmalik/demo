<head>
</head> 


<?php


function delete($id){

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

$sql = "DELETE FROM MyGuests where id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
};

delete($_POST['recordnumber']);

?>
<body>
    
<a href="main.php">Click here to go back to the main page </a>    
</body>
