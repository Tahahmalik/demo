<head>
</head>
<body>
<?php

//define the parameters
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$id = ($_POST['id']);

//validate parameters

function validate($firstname,$lastname,$email,$id) {

if ( (!ctype_digit($id)) || (empty($id))) {


    http_response_code(400);

	
} else {
	    

	update($firstname,$lastname,$email,$id);
}
}




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

}


validate($firstname,$lastname,$email,$id);

?>



</body>

