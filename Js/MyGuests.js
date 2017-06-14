var document;

$(document).ready(function(){

  window.loadcustomers();
  $('.listitem').hover(function(){


    $(this).css("background-color","#33FF66");


  },

  function(){

    $(this).css("background-color","transparent");
  }

  )


//$('.listitem').css("background-color","red");
$('#searchhandle').keyup(function(){

  window.search();

});

});


function loadcustomers() {
  $(".tablerows").remove();

  var post = "table=";
  $.post("load.php" ,post, function(data) {

$.each(data, function ( key , value) {
      var id = this.id;
      $(".table").append("<tr class='tablerows'><td>"+this.id+"</td><td><input type='submit' class='btn btn-success' value='Show cars' name='Show cars' onclick='showcars("+this.id+",&quot;"+this.firstname+"&quot;)'></td><td>"+this.firstname+"</td><td>"+this.lastname+"</td><td>"+this.email+"</td><td>"+this.reg_date+"</td><td>$"+this.value+"</td><td><img src='images/delete.png' onclick='del("+this.id+")'></td><td><img src='images/edit.png' onclick='changerecord("+id+")'></td><td><a href=mailto:"+this.email+"><img src='images/mail.png'></a></td></tr>");

  });

      
      },'json');

};






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

     loadcustomers();

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

      loadcustomers();

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
      loadcustomers();

    }

    if (this.readyState == 4 && this.status == 400) {
     alert("Please enter the row to be deleted!!");

   }
 };

 xmlhttp.send(post);

}

function search() {

  var searchhandle = document.getElementById("searchhandle").value;
  var search = document.getElementById("search").value;

  var post = 'search='+search+'&searchhandle='+searchhandle;
  console.log(post);

  $(".tablerows").remove();
  $.post( "search.php", post, function(data) {
    console.log(data);
    $.each(data, function ( key , value) {

      var id = this.id;
      $(".table").append("<tr class='tablerows'><td>"+this.id+"</td><td><input type='submit' class='btn btn-success' value='Show cars' name='Show cars' onclick='showcars("+this.id+")'></td><td>"+this.firstname+"</td><td>"+this.lastname+"</td><td>"+this.email+"</td><td>"+this.reg_date+"</td><td>$"+this.value+"</td><td><img src='images/delete.png' onclick='del("+this.id+")'></td><td><img src='images/edit.png' onclick='changerecord("+id+")'></td><td><a href=mailto:"+this.email+"><img src='images/mail.png'></a></td></tr>");

     /* $(".table").append("<tr class='tablerows'><td>"+this.id+"</td><td>"+this.firstname+"</td><td>"+this.lastname+"</td><td>"+this.email+"</td><td>"+this.reg_date+"</td><td><img src='images/delete.png' onclick='del("+this.id+")'></td><td><img src='images/edit.png' onclick='changerecord("+id+")'></td><td><a href=mailto:"+this.email+"><img src='images/mail.png'></a></td></tr>");
     */
   });
  },'json');  


};



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

};

function showcars(id,firstname) {

  var showWindow = window.open("", "MsgWindow", "left=2000,width=350,height=200,location=no,menubar=no,resizable=no,status=no,titlebar=no,toolbar=no,top=300");

  var identity = 'idee='+id;
  console.log(identity);

  showWindow.document.writeln("<p> These are "+firstname+"'s cars</p>");
  $.post( "loadcars.php", identity, function(data) {
    showWindow.document.writeln("<table class='table'><th>"+"Model  "+"</th>"+"<th>"+"Year  "+"</th>"+"<th>"+"Colour  "+"</th>"+"<th>"+"Type"+"</th>"+"<th>"+"Plate"+"</th>");

    $.each(data, function ( key , value) {

      showWindow.document.writeln("<tr><td> "+this.Model+"</td><td> "+  this.Year+"</td><td> "+  this.Colour+"</td><td> "+  this.Type+"</td><td>"+this.Plate+"</td></tr><br>");

    });
    showWindow.document.writeln("</table>");
    
    
  }, 'json');


  
};


function checklogin() {

var username = document.getElementById("username").value;
var password = document.getElementById("password").value;
var userrole = document.getElementById("userrole").value;

var post = 'username='+username+'&password='+password+'&userrole='+userrole ;
console.log(post);

/*
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", "checklogin.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  
  
  xmlhttp.onreadystatechange = function() {

   
       if (this.readyState == 4 && this.status == 401) {
     alert(" Your Username or password incorrect , please try again");

   }

   if (this.readyState == 4 && this.status == 200) {

    
    
   }
 };

 xmlhttp.send(post); */

}