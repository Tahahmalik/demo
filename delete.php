<head>
</head> 


<?php

$id = $_POST['id'];

function validate($id) {

if ( (!ctype_digit($id)) || (empty($id))) {
    http_response_code(400);
  
} else {
    delete($id);
}
}






function load (){
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

$sql = "SELECT id, firstname , lastname , email, reg_date FROM MyGuests";
$result = $conn -> query($sql);

if ($result->num_rows > 0) {
    $result_arr = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result_arr);
    }
    
else {
    echo "0 results";
}
}




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

$sql = "SELECT id, firstname , lastname , email  FROM MyGuests where id = '$id'";

$result = $conn -> query($sql);
if ($result->num_rows > 0) {
 
$sql = "DELETE FROM MyGuests where id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
load();

    }

 else {

    echo " That record does not exist!";
    load();
 };   

 
$conn->close();
}
    
              

validate($id);

?>

<body>
    
 
</body>
