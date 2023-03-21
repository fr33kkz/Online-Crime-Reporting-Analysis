<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<script>
     function f1()
        {
            var sta=document.getElementById("name1").value;
            var sta1=document.getElementById("email1").value;
            var sta2=document.getElementById("pass").value;
            var sta3=document.getElementById("addr").value;
            var sta4=document.getElementById("aadh").value;
            var sta5=document.getElementById("mobno").value;
            var sta6=document.getElementById("pass2").value;

  var x=sta.trim();
  var x1=sta1.indexOf(' ');
  var x2=sta2.indexOf(' ');
  var x3=sta3.trim();
  var x4=sta4.indexOf(' ');
	var x5=sta5.indexOf(' ');
  var x6=sta6.indexOf(' ');
	if(sta!="" && x==""){
		document.getElementById("name1").value="";
		document.getElementById("name1").focus();
		  alert("Space Not Allowed");
        }

         else if(sta1!="" && x1>=0){
    document.getElementById("email1").value="";
    document.getElementById("email1").focus();
      alert("Space Not Allowed");
        }
        else if(sta2!="" && x2>=0){
    document.getElementById("pass").value="";
    document.getElementById("pass").focus();
      alert("Space Not Allowed");
        }
        else if(sta3!="" && x3==""){
    document.getElementById("addr").value="";
    document.getElementById("addr").focus();
      alert("Space Not Allowed");
        }
        else if(sta4!="" && x4>=0){
    document.getElementById("aadh").value="";
    document.getElementById("aadh").focus();
      alert("Space Not Allowed");
        }
        else if(sta5!="" && x5>=0){
    document.getElementById("mobno").value="";
    document.getElementById("mobno").focus();
      alert("Space Not Allowed");
        }
        else if(sta6!="" && x6>=0){
    document.getElementById("pass2").value="";
    document.getElementById("pass2").focus();
      alert("Space Not Allowed");
        }
}
</script>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	body {
	background-size: cover;
	background-image: url(log.jpeg);
	background-position: bottom;
}
body,
html {
		width: 100%;
		height: 100%;
		font-family: "Lato";
		color: black;
}
</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	 <div class="container">
		 <div class="navbar-header">
			 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				 <span class="sr-only">Toggle navigation</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			 </button>
			 <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
		 </div>
		 <div id="navbar" class="collapse navbar-collapse">
			 <ul class="nav navbar-nav">
				 <li class="active"><a href="home.php">Home</a></li>
			 </ul>
			 <ul class="nav navbar-nav navbar-right">
				 <li><a href="login.php">User Login  <i class="fa fa-user"></i></a></li>
				 <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
			 </ul>
		 </div>
	 </div>
	</nav>
	<div class="header">
		<h2>Register</h2>
	</div>

	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="Name" required="" id="name1" value="<?php echo $Name; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" required="" id="email1" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Mobile Number</label>
			<input type="text" name="mob_num" required pattern="[6789][0-9]{9}" minlength="10" maxlength="10" id="mobno" value="<?php echo $mob_num; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required="" placeholder="6 Character minimum" pattern=".{6,}" id="pass">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required="" placeholder="Confirm Password" pattern=".{6,}" id="pass2">
		</div>
		<div class="input-group">
			<label>Home Address</label>
			<input type="text" name="addr" required="" id="addr" value="<?php echo $addr; ?>">
		</div>
		<div class="input-group">
			<label>Aadhar Number</label>
			<input type="text" name="a_no" minlength="12" maxlength="12" required pattern="[123456789][0-9]{11}" id="aadh" value="<?php echo $a_no; ?>">
		</div>
		<div class="input-group">
		<label>Gender</label><select name="gender">
			<option>Male</option>
			<option>Female</option>
			<option>Others</option>
		</select>
	</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>

		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
