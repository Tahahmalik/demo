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


$sql = "SELECT id, firstname , lastname , email, reg_date FROM MyGuests";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>email</th><th>reg date</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["reg_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();
};

delete(16);

?>
