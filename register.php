<?php include('server.php'); 

if(isset($_POST['register'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		//if there are no errors , save user data to the database
		$password = $_POST['password1']; // encrypting password before storing it into database (security)
		$query = "SELECT `email` FROM `user` WHERE email='$email'";
		
  		/*if (mysqli_query($conn,$query))
  		{
		
      	echo "Username or email already exists. Try using another one.";
  		}

		else{*/
			$sql = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
			mysqli_query($conn, $sql) or die("Connection failed: " . mysqli_error());
			header('location:login.php'); // redirect to login page
		
		}
		
	
	?>
<!DOCTYPE>
<html>
<head>
	<title>Registration Formm</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="validate.js"></script>
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>	
	<form method="POST" action="">
		<!--Display errors here-->

		<div class="input_group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Your name">
		</div>
		<div class="input_group">
			<label>Email</label>
			<input type="email" name="email" placeholder="Your Email" required>
		</div>
		<div class="input_group">
			<label>Password</label>
			<input type="password" name="password1" placeholder="Your password" id="password" required>
		</div>
		<div class="input_group">
			<label>Confirm password</label>
			<input type="password" name="password2" placeholder="Confirm password" id="confirm_password" required>
		</div>
		<div class="input_group">
			<button type="submit"  onclick="validatePassword()" name="register" class="btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>
