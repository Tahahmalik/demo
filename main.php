<head>
<title> My Basic Page </title>

<script src="js/MyGuests.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>



<div >
<b> Current data in the table</b>
<table id="table" class="table">
<th>id</th>
<th>First name</th>
<th>Last name</th>
<th>Email</th>
<th>Registration date</th>

</table>

</div>

<form action="" method="post">
First Name: <input type="text" name="firstname" id="firstname">
Last Name: <input type="text" name="lastname" id="lastname">
E-mail: <input type="text" name="email" id="email" >
ID: <input type="text" name="id" id="id">
<br>
Delete : <input type="integer" name="recordnumber" id="recordnumber">
 

 
</form>
<input type="submit" class="btn btn-success" value="load" name="load" onclick="load()">
<input type="submit" class="btn btn-success" value="Update" name="update"  onclick="update()">
<input type="submit" class="btn btn-success" value="Create" name="create"  onclick="create()">    
<input type="submit" class="btn btn-success" value="Delete" name="Delete"  onclick="del()"><br>

</body>