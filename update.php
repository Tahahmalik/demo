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

		$result_arr = $result->fetch_all(MYSQLI_ASSOC);

		echo json_encode($result_arr);
		
		

		$conn->close();

	}


	validate($firstname,$lastname,$email,$id);

	?>



</body>

