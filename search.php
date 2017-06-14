<?php


$handle = $_POST['searchhandle'];
$searchtype = $_POST['search'];

function search($handle,$searchtype) {

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

$sql="SELECT id, firstname, lastname, email, reg_date,value FROM customervalue WHERE " . $searchtype . " LIKE '%" . $handle . "%'"; 

   $result = $conn -> query($sql);
    
    
    if ($result->num_rows > 0) {
                   
          $result_arr = $result->fetch_all(MYSQLI_ASSOC);
    	  echo json_encode($result_arr);

           
		
        } else {
            echo "No Records found" . $conn->error;
        }

    
    $conn->close();


}

search($handle,$searchtype);



?>

