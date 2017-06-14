<?php


$id = $_POST['id'];


function search($id) {

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

$sql="SELECT Model, Year, Colour, Type, Plate FROM cars WHERE Owner='$id'"; 

   $result = $conn -> query($sql);
    
    
    if ($result->num_rows > 0) {
                   
          $result_arr = $result->fetch_all(MYSQLI_ASSOC);
    	  echo json_encode($result_arr);

           
		
        } else {
            echo "No Records found" . $conn->error;
        }

    
    $conn->close();


}

search($id);



?>

