<?php include('server.php'); 
session_start();
?>
<!DOCTYPE>
<html>
<head>
	<title>Registration From</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	
	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success']; 
					?>
				</h3>
			</div><br><br>
		<?php endif ?>
		<?php if (isset($_SESSION["username"])): ?>
			<div class="dd"><p>Welcome <strong><?php echo $_SESSION['username'] ?></strong></p></div><br><br>
		<?php endif ?>
		<p>
			<button>
				<a href="add.php" >Add your items</a>
			</button>
			<button>
				<a href="view1.php" >view your items</a>
			</button>
			<button>
				<a href="products.php" >view bidding items</a>
			</button>
		</p><br><br>
		<p>
			<a href="login.php">Logout</a>
		</p>
	</div>
</body>
</html>
