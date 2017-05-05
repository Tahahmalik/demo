<head>
<title> My Basic Page </title>
</head>

<body>



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
?>

<form action="" method="post">
First Name: <input type="text" name="firstname">
Last Name: <input type="text" name="lastname">
E-mail: <input type="text" name="email">
 <input type="submit" class="btn btn-success" value="Create" name="create"  formaction="insert.php">    <input type="submit" class="btn btn-success" value="Update" name="update"  formaction="update.php">
ID: <input type="text" name="id">
<br>
Delete : <input type="integer" name="recordnumber">
 <input type="submit" class="btn btn-success" value="Delete" name="Delete"  formaction="delete.php">


</form>

</body>