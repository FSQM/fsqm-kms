<?php
session_unset();

include('db.php');


ini_set('max_execution_time', 1000);

?>

<html>
<head>

  <!-- Favicons -->
  <link href="img/FSQM.jpg" rel="icon">
  <link href="img/FSQM.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="resources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="resources/css/bootstrap-theme.css" type="text/css"/>

<script src="resources/js/jquery.min.js" type="text/javascript"></script>
<script src="resources/js/bootstrap.js" type="text/javascript"></script>
<style>
body{
background-image:url(resources/bg.png);
background-size:100% , 100%;
background-repeat:no-repeat;
background-attachment: fixed;

}
*{

margin:0;
padding:0;


}

body , html{

width:100%;


}

</style>
</head>

<body>

<nav class="navbar nav navbar-default navbar-fixed-top">

<img src="resources/smart-pldt-logo.png" style="width:320px;height:40px;margin-top:5px; position:absolute;">



<h1 style=" position:absolute;font-size:20px;margin-left:333px;color:#cc0000;font-style:italic;">FSQM</h1>
<p style="position:absolute;margin-left:400px;margin-top:20px;font-family:verdana;color:gray;"> Fixed Service Quality Management</p>

 </nav>

<div class="form-container" style="width:400px; height:190px; margin:0 auto; margin-top:180px;background-color:rgba(86,84,84,0.29)";>

<br><br>
<div class="input-group" style="margin-left:30px;">
     <span class="input-group-addon">
	  <span class="glyphicon glyphicon-user" style="color:gray;">
	  </span>
	  </span>
      <input type="text" name="uname"  class="form-control" id="username" placeholder="Enter Username " style="background-color:white;width:300px;" >

    </div>

	<div class="catcher" style="position:absolute;color:white; margin-left:70px;"></div>

	 <br>
	<div class="input-group" style="margin-left:30px;">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-star" style="color:gray"></span>
	</span>

      <input type="password" name="pass" class="form-control" id="password" placeholder="Enter Password" style="width:300px;" required>
    </div>
	<div class="catcher2" style="position:absolute;color:white;margin-left:70px;"></div>
	<button type="submit" id="login" class="btn btn-default" style="margin-top:20px;float:right;background-color:#4d0000; color:white;font-weight:bold;border-radius:0px;border:none;margin-right:40px;" >Login</button>
	<div class="invalid-uname-password" style="position:absolute;color:white;margin-left:70px;margin-top:10px;"></div>
	<a href="#" style="position:absolute;margin-top:43px;margin-left:10px;color:white;font-size:12px;">Forgot Password</a>
	</div>

</div>

</body>
<footer style="bottom:0; position:fixed;width:100%; height:50px; background-color:white;"><br>
 <small class="footer" style="font-weight:bold;margin-left:50px;">&copy Copyright 2018, PLDT FSQM</small>
</footer>
<script>

$(document).ready(function(){
	$("#login").click(function(){
var username=$("#username").val();
var password=$("#password").val();

if(username == ""){

	$(".catcher").html('Please Enter Username!');
	$("#username").css('border-color', 'red');

}

else if(password == ""){

	$(".catcher2").html('Please Enter Password!');
	$("#password").css('border-color', 'red');

}


else{

	var data='username=' + username + '&password=' + password;

	$.ajax({


type:'post',
url:'process.php',
data: data,
success: function (x){
$(".invalid-uname-password").html(x);


}


	});

}


	});




});


$(document).ready(function(){
$("#username").keyup(function(){
$(".catcher").html('');
$("#username").css('border-color', 'white');
$(".invalid-uname-password").html('');

});

});


$(document).ready(function(){
$("#password").keyup(function(){
$(".catcher2").html('');
$("#password").css('border-color', 'white');
$(".invalid-uname-password").html('');

});

});




</script>

</html>
