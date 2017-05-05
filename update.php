<head>
</head>
<body>
<?php

function update($firstname,$lastname,$email,$id) {

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



$sql = "UPDATE MyGuests SET firstname = '$firstname' , lastname = '$lastname' , email = '$email' WHERE ID = '$id'";



if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
};







$conn->close();

}

update($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['id']);

?>

<a href="main.php"> Click here to go to the main page </a>

</body>

