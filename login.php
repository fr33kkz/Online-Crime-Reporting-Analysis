<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
         <li ><a href="home.php">Home</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li class="active"><a href="login.php">User Login  <i class="fa fa-user"></i></a></li>
         <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
       </ul>
     </div>
   </div>
  </nav>
	<br><br><br><br>
	<div class="header">
		<h2>User Login</h2>
	</div>

	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			New User? Register <a href="register.php">here</a>
		</p>
	</form>
</body>
</html>
