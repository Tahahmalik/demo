<head>
<title> My Basic Page </title>
</head>

<body>

<form action="welcome_get.php" method="get">
First Name: <input type="text" name="firstname"><br>
Last Name: <input type="text" name="lastname"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

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

$sql = "INSERT INTO MyGuests (firstname , lastname , email) VALUES 

('Affan', 'Malik', 'Affan.m86@gmail.com'),
('Hasaan' , 'Malik', 'Hasaan_malik@gmail.com')";



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


</body>