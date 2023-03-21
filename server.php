<?php
	session_start();

	$Name = "";
	$email    = "";
	$mob_num = "";
	$addr = "";
	$a_no = "";
	$p_id = "";
	$errors = array();
	$_SESSION['success'] = "";

	$db = mysqli_connect('localhost', 'root', '', 'registration');

	if (isset($_POST['reg_user'])) {
		$Name = mysqli_real_escape_string($db, $_POST['Name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$mob_num = mysqli_real_escape_string($db, $_POST['mob_num']);
		$addr = mysqli_real_escape_string($db, $_POST['addr']);
		$a_no = mysqli_real_escape_string($db, $_POST['a_no']);
		$gen = mysqli_real_escape_string($db, $_POST['gender']);

		if (empty($Name)) { array_push($errors, "Name is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($mob_num)) { array_push($errors, "Mobile Number is required"); }
		if (empty($addr)) { array_push($errors, "Address is required"); }
		if (empty($a_no)) { array_push($errors, "Aadhar Number is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO users (Name, email, password, mobile, addr, a_no, gen)
					  VALUES('$Name', '$email', '$password','$mob_num', '$addr', '$a_no', '$gen')";
			mysqli_query($db, $query);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: index3.php');
		}

	}

	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE email='$email' AND Password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: index3.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}


	if (isset($_POST["police_login"])) {
		$p_id = mysqli_real_escape_string($db, $_POST['p_id']);
		$p_pass = mysqli_real_escape_string($db, $_POST['p_pass']);

		if (empty($p_id)) {
			array_push($errors, "Police ID is required");
		}
		if (empty($p_pass)) {
			array_push($errors, "Password is required");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM police WHERE p_id='$p_id' AND p_pass='$p_pass'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['p_id'] = $p_id;
				
				$_SESSION['success'] = "You are now logged in";
				header('location: policehome.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

?>
