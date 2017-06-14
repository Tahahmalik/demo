<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/MyGuests.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
   	 Print '<script>alert(" You need to log in!") </script>';
      header("location: login.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
   
<body>
   
	<table class="display">
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
					<th class="tableheader">ID</th>
					<th class="tableheader"></th>
					<th class="tableheader">First name</th>
					<th class="tableheader">Last name</th>
					<th class="tableheader">Email</th>
					<th class="tableheader">Registration date</th>
					<th class="tableheader">Cars Value</th>
				</table> <br>
				<input type="submit" class="btn btn-success" value="Display all" name="load" onclick="load()">
				<input type="submit" class="btn btn-success" value="Enter New" name="Enter"  onclick="createnew()"><br>
				Search where <select id="search">
				<option value="firstname">First Name</option>
				<option value="lastname">Last Name</option>
				<option value="email">Email</option>
				<option value="id">Id</option>
			</select> 
			<input type="text" name="searchhandle" id="searchhandle">
			<input type="submit" class="btn btn-success" value="Search" name="Search" onclick="search()"><br>
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
</body>
</html>