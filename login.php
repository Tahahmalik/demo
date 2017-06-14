<html>
<head>
  <title>ABC Design - Login</title>
  
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script src="js/MyGuests.js"></script>
  
</head>
<body>
  <h2>Login Page</h2>
  <form action="checklogin.php" method="POST">
   Enter Username: <input type="text" name="username" id="username" required="required" /> <br/>
   Enter password: <input type="password" name="password" id="password" required="required" /> <br/>
   Role : <select id="userrole">
        <option value="admin">Customer</option>
        <option value="lastname">Employee</option>
          </select> 
   <input type="submit" value="Login" />
 </form>
 <a href="register.php">New to ABC Designs? Click here to register<br/><br/>
</body>
</html>