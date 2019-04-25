<?php 
	session_start();

	// is SESSION is already set, redirect to index page
	if (isset($_SESSION['cusId'])) {
		header("Location: index.php");
	}

	// connecting to database
	$host = "localhost";
	$dbname = "eds_electronics";
	$user = "root";
	$password = "";
	$dsn = 'mysql:host=' . $host . '; dbname='. $dbname;
	$pdo = new PDO($dsn, $user, $password);
	// connecting to database


	if (isset($_POST['login'])) {
		$sql = "SELECT * FROM customer WHERE email = :email";
		$stmt = $pdo->prepare($sql);
		$criteria = [ 
			'email' => $_POST['email']
		];
		unset($_POST['login']); 
		$stmt->execute($criteria);

		// checks if any email is matched with input data
		if ($stmt->rowCount() > 0) {
			$cus = $stmt->fetch();

			// verify the password with related email address
			if (password_verify($_POST['password'], $cus['password'])) {
				$_SESSION['cusId'] = $cus['customer_id'];
				$_SESSION['cusName'] = $cus['firstname'];

				if (isset($_GET['disp_id'])) {
					$disp = $_GET['disp_id'];
					header("Location: review.php?disp=$disp");
				}
				else {
					header("Location: index.php");
				}
			}
			else { 
				header("Location: login.php?msg=incorrectPwd");
			}
		}
		else {
				header("Location: login.php?msg=loginFailed");
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<!-- <link rel="stylesheet" type="text/css" href="cus/cus.css"> -->
		<link rel="stylesheet" type="text/css" href="customer.css?<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet">
</head>
<body>

<div class="log-container">
	<!-- <div class="container-a"> -->
		<!-- <span></span> -->
	<!-- </div> -->
	<!-- <div  class="container-b"> -->
	<div class="log-content">
		<h1>Ed's Electronics</h1>
		<form action="login.php<?php 
			if (isset($_GET['disp'])) 
			echo '?disp_id='.$_GET['disp']; ?> " method="POST" class="log-login">
			<!-- <label for="username">Username:</label> <br/> -->
			<h1>Sign in</h1>
			<input type="text" name="email" placeholder="Email"> <br/>
			<!-- <label for="password">Password:</label> <br/> -->
			<input type="password" name="password" placeholder="Password"> <br/>
			<input type="submit" name="login" value="Sign in">
			<h4>Get started...</h4>
			<a href="register.php">Create your eds account</a>			
			<?php 
				if (isset($_GET['msg'])) {
					if ($_GET['msg'] == "incorrectPwd") {
						echo "<p> Password Incorrect! </p>";
					}
					elseif ($_GET['msg'] == "loginFailed") {
						echo "<p> Login Failed. Email not found! </p>";
					}
				}
			?>
		</form>
	</div>
</div>

</body>
</html>