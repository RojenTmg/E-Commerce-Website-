<?php 
	session_start();

	// is SESSION is already set, redirect to index page
	if (isset($_SESSION['adminId'])) {
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
		$sql = "SELECT * FROM admin WHERE email = :email";
		$stmt = $pdo->prepare($sql);
		$criteria = [ 
			'email' => $_POST['email']
		];
		unset($_POST['login']); 
		$stmt->execute($criteria);

		// checks if any email is matched with input data
		if ($stmt->rowCount() > 0) {
			$admin = $stmt->fetch();

			// verify the password with related email address
			if (password_verify($_POST['password'], $admin['password'])) {
				$_SESSION['adminId'] = $admin['admin_id'];
				$_SESSION['adminName'] = $admin['username'];
				header("Location: index.php");
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
		<link rel="stylesheet" type="text/css" href="admin.css?<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet">
</head>
<body>

<!-- login form for customer -->
<div class="container">
	<div class="content">
		<h1>Ed's Electronics</h1>
		<form action="login.php" method="POST" class="login">
			<h1>- - Welcome - -</h1>
			<input type="text" name="email" placeholder="Email"> <br/>
			<input type="password" name="password" placeholder="Password"> <br/>
			<input type="submit" name="login" value="LOG IN">
			<h4>Get started...</h4>
			<?php 
				if (isset($_GET['msg'])) {
					if ($_GET['msg'] == "incorrectPwd") {
						echo "<p> Password Incorrect! </p>";
					}
					elseif ($_GET['msg'] == "loginFailed") {
						echo "<p> Login Failed. Email not found! </p>";
					}
					elseif ($_GET['msg'] == "logged-out") {
						echo "<p> You have been logged out! </p>";
					}
				}
			?>
		</form>
	</div>
</div>

</body>
</html>