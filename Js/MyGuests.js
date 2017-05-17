function load() {
  $(".tablerows").remove();
  $.getJSON( "load.php", function( data ) {

    $.each(data, function ( key , value) {

      var id = this.id;

      $(".table").append("<tr class='tablerows'><td>"+this.id+"</td><td>"+this.firstname+"</td><td>"+this.lastname+"</td><td>"+this.email+"</td><td>"+this.reg_date+"</td><td><img src='images/delete.png' onclick='del("+this.id+")'></td><td><img src='images/edit.png' onclick='changerecord("+id+")'></td></tr>");

    });
  });
} 



function update(){

  var fname = document.getElementById("firstnameupdate").value;
  var lname = document.getElementById("lastnameupdate").value;
  var email = document.getElementById("emailupdate").value;
  var id = document.getElementById("idupdate").value;

  var post = 'firstname='+fname+'&lastname='+lname+'&email='+email+'&id='+id;
  console.log(post);


  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "update.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  

  xmlhttp.onreadystatechange = function() {



    if (this.readyState == 4 && this.status == 200) {

     load();

   }

   if (this.readyState == 4 && this.status == 400) {
     alert("Please enter all information to be updated!!");

   }
 };

 xmlhttp.send(post);

 $("#updaterecord").css("visibility","hidden"); 
 $("#updateclick").hide();

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

      load();

    }

    if (this.readyState == 4 && this.status == 400) {
     alert("Please enter all information to be updated!!");

   }
 }

 xmlhttp.send(post);
 document.getElementById("firstname").value = "";
 document.getElementById("lastname").value = "";
 document.getElementById("email").value = "";
 $("#newrecord").css("visibility","hidden");
 $("#createnew").css("visibility","hidden");

};

function del(id) {



  var post = 'id='+id;
  console.log(post);    
  
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "delete.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  
  xmlhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
      load();

    }

    if (this.readyState == 4 && this.status == 400) {
     alert("Please enter the row to be deleted!!");

   }
 };

 xmlhttp.send(post);

}




function changerecord(id){
  $("#updaterecord").css("visibility","visible");
  $("#updateclick").show();


  $.getJSON( "load.php", function( data ) {

    $.each(data, function ( key , value) {

      if (this.id == id) {

        console.log(this.firstname);
        console.log(this.lastname);
        console.log(this.email);
        console.log(this.id);
        document.getElementById("firstnameupdate").value = this.firstname;
        document.getElementById("lastnameupdate").value = this.lastname;
        document.getElementById("emailupdate").value = this.email;
        document.getElementById("idupdate").value = this.id;     
        
      } 


    });

  });

}

function createnew() {
$("#createnew").css("visibility","visible");

$("#newrecord").css("visibility","visible");

}