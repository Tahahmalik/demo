function load() {
    $(".tablerows").remove();
    $.getJSON( "load.php", function( data ) {

  $.each(data, function ( key , value) {
    $(".table").append("<tr class='tablerows'>"+"<td>"+this.id+"</td>"+"<td>"+this.firstname+"</td>"+"<td>"+this.lastname+"</td>"+"<td>"+this.email+"</td>"+"<td>"+this.reg_date+"</td>"+"</tr>");
  
  });
  });
} 


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
            $(".tablerows").remove();
            $.getJSON( "load.php", function( data ) {
            $.each(data, function ( key , value) {
            $(".table").append("<tr class='tablerows'>"+"<td>"+this.id+"</td>"+"<td>"+this.firstname+"</td>"+"<td>"+this.lastname+"</td>"+"<td>"+this.email+"</td>"+"<td>"+this.reg_date+"</td>"+"</tr>");
             console.log(this.firstname);
             });
            });   

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
            $(".tablerows").remove();
            $.getJSON( "load.php", function( data ) {
            $.each(data, function ( key , value) {
            $(".table").append("<tr class='tablerows'>"+"<td>"+this.id+"</td>"+"<td>"+this.firstname+"</td>"+"<td>"+this.lastname+"</td>"+"<td>"+this.email+"</td>"+"<td>"+this.reg_date+"</td>"+"</tr>");
             console.log(this.firstname);
             });
            });   

                
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
            $(".tablerows").remove();
            $.getJSON( "load.php", function( data ) {
            $.each(data, function ( key , value) {
            $(".table").append("<tr class='tablerows'>"+"<td>"+this.id+"</td>"+"<td>"+this.firstname+"</td>"+"<td>"+this.lastname+"</td>"+"<td>"+this.email+"</td>"+"<td>"+this.reg_date+"</td>"+"</tr>");
             console.log(this.firstname);
             });
            });    
                
            }

            if (this.readyState == 4 && this.status == 400) {
               alert("Please enter the row to be deleted!!");
                
            }
        };
       
        xmlhttp.send(post);
        document.getElementById("recordnumber").value ="";
        
}



