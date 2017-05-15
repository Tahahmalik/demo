<head>
</head>

<body>


<?php


function create() {


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

$sql = "INSERT INTO MyGuests (firstname, lastname , email) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."')";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
};


$sql = "SELECT id, firstname , lastname , email, reg_date FROM MyGuests";
$result = $conn -> query($sql);


$result_arr = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($result_arr);



$conn->close();

}

create();

?>



</body>