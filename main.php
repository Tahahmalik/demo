<head>
<title> My Basic Page </title>
<script>

load();

function load(){
	
	
	xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
              
            }

            if (this.readyState == 4 && this.status == 400) {
               alert("Please enter all information to be updated!!");
                
            }
        };
        xmlhttp.open("GET","load.php",true);
        xmlhttp.send();


};
 

function update(){

  var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var id = document.getElementById("id").value;
    
    var post = 'firstname='+fname+'&lastname='+lname+'&email='+email+'&id='+id;
        console.log(post);

	
	xmlhttp = new XMLHttpRequest();
	xmlhttp.open("POST", "update.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
	
	 xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
                //console.log(this.responseText);
            }

            if (this.readyState == 4 && this.status == 400) {
               alert("Please enter all information to be updated!!");
                
            }
        };
       
        xmlhttp.send(post);
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("email").value = "";
        document.getElementById("id").value = "";
}


function create(){
  
  var fname = document.getElementById("firstname").value;
    var lname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
   
    
    var post = 'firstname='+fname+'&lastname='+lname+'&email='+email;
        console.log(post);

  
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "insert.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  
   xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
                //console.log(this.responseText);
            }

            if (this.readyState == 4 && this.status == 400) {
               alert("Please enter all information to be updated!!");
                
            }
        }
       
        xmlhttp.send(post);
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("email").value = "";
};

function del() {

    var id = document.getElementById("recordnumber").value;
    
    var post = 'id='+id;
        
  
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "delete.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  
   xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table").innerHTML = this.responseText;
                //console.log(this.responseText);
            }

            if (this.readyState == 4 && this.status == 400) {
               alert("Please enter the row to be deleted!!");
                
            }
        };
       
        xmlhttp.send(post);
        document.getElementById("recordnumber").value ="";
        
}




</script>


</head>

<body>



<div id="table"><b> Current data in the table</b></div>

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