<head>
	<title> My Basic Page </title>
	<script src="js/MyGuests.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
	<p id="heading">Current data in the table</p><br>
	

	<table>
		<tr>
			<td>
				<form action="" method="post" id="newrecord">
					First Name: <input type="text" name="firstname" id="firstname"><br><br>
					Last Name: <input type="text" name="lastname" id="lastname"><br><br>
					E-mail: <input type="text" name="email" id="email" >
				</form>
				<input type="submit" class="btn btn-success" value="Create Record" name="createnew"  id="createnew" onclick="create()">
			</td>
			<td>

				<table id="table" class="table">
					<th>ID</th>
					<th>First name</th>
					<th>Last name</th>
					<th>Email</th>
					<th>Registration date</th>
				</table> <br>
				<input type="submit" class="btn btn-success" value="Display all" name="load" onclick="load()">
				<input type="submit" class="btn btn-success" value="Enter New" name="Enter"  onclick="createnew()">
			</td>

			<td>
				<form action="" method="post" id="updaterecord">
					First Name: <input type="text" name="firstname" id="firstnameupdate"><br>
					Last Name: <input type="text" name="lastname" id="lastnameupdate"><br>
					E-mail: <input type="text" name="email" id="emailupdate" >
					<input type="text" name="id" id="idupdate">
				</form>
				<input type="submit" class="btn btn-success" value="Update" name="update"  id="updateclick" onclick="update()">

			</td>
		</tr>
	</table>
	

	<input type="submit" class="btn btn-success" value="Update" name="update"  id="updateclick" onclick="update()">

</body>