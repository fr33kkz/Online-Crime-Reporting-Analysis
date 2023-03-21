<?php
include('server.php');
if(!isset($_SESSION['email']))
{
    header('Location: home.php');
    exit();
}
?>
<?php
include('db.php');
$status="";
    $email=$_SESSION['email'];

        $result=mysqli_query($con,"SELECT a_no FROM users where email='$email' ");
        $q2=mysqli_fetch_assoc($result);
        $a_no=$q2['a_no'];

        $result1=mysqli_query($con,"SELECT Name FROM users where email='$email' ");
        $q2=mysqli_fetch_assoc($result1);
        $Name=$q2['Name'];


if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {


        $location=$_POST['location'];
        $type_crime=$_POST['type_crime'];
        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];

        $var=strtotime(date("Ymd"))-strtotime($d_o_c);


    if($var>=0)
    {

      $comp="INSERT into complaint(a_no,location,type_crime,d_o_c,description) values('$a_no','$location','$type_crime','$d_o_c','$description')";
      mysqli_select_db($con,"registration");
      $res=mysqli_query($con,$comp);

      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
 <script>
     function f1()
        {
           var sta1=document.getElementById("desc").value;
           var x1=sta1.trim();
          if(sta1!="" && x1==""){
          document.getElementById("desc").value="";
          document.getElementById("desc").focus();
          alert("Space Found");
        }
}
 </script>

<head>
	<title>Complainer Home Page</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body style="background-size: cover;
    background-image: url(comp.jpg);
    background-position: center;">
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index3.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index3.php">Log New Complain</a></li>
        <li><a href="history.php">Complaint History</a></li>
        <li><a href="status.php">Complaint Status</a></li>
        <li><a href="index.php?logout='1'">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>


<div class="video" style="margin-top: 5%">
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p><h2 style="color:white">Welcome <?php echo "$Name" ?></h2></p><br>
                                    <p><h2>Log New Complain</h2></p><br>
				<form action="#" method="post" style="color: gray">Aadhar
					<input type="text"  name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$a_no"; ?>>

				<div class="top-w3-agile" style="color: gray">Location of Crime

                    <select class="form-control" name="location">
						<?php
                        $loc=mysqli_query($con,"select location from police_station");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                                	<option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>

				    </select>
				</div>
				<div class="top-w3-agile" style="color: gray">Type of Crime
					<select class="form-control" name="type_crime">
						<option>Theft</option>
						<option>Robbery</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
				    </select>
				</div>
					<div class="Top-w3-agile" style="color: gray">
					Date Of Crime : &nbsp &nbsp
						<input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
					</div>
					<br>
          <div class="top-w3-agile" style="color: gray">Record Audio: &nbsp &nbsp
          <button type="button" class="btn btn-primary" id="record">Record</button>
          <button type="button" class="btn btn-secondary" id="stop" disabled>Stop</button>
        <br>
        <br>
        <label for="previewField">Recording preview:</label>
        <br><br>
        <fieldset id="previewField" class="">
            <audio id="preview" controls style="width: 100%"></audio>
        </fieldset>
					<div class="top-w3-agile" style="color: gray">
            <br>
					Description
						<textarea  name="description" rows="20" cols="50" placeholder="Describe the incident in details with time" onfocusout="f1()" id="desc" required></textarea>
					</div>
					<input type="submit" value="Submit" name="s">
				</form>
			</div>
		</div>
	</div>
</div>
<div style="position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Crime Portal 2022 - St. Peter's Engineering College, Major Project</b></h4>
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
 integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
 crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>

<script src="scripts/app.js"></script>
</body>
</html>
