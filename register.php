<?php
	session_start();
	
	// is SESSION is already set, redirect to index page
	if (isset($_SESSION['cusId'])) {
		header("Location: index.php");
	}

	if (isset($_POST['add'])) {
		include_once 'admin/require/connection.php';
		extract($_POST);
		
		// checks if input are empty or not
		if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($address) || 
			empty($city) || empty($country) || empty($postal_code) || empty($phone_no)) {
			header("Location: register.php?msg=empty&firstname=$firstname");
		} 
		else {
			// checks if input characters are valid or not
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)  || !preg_match("/^[a-zA-Z]*$/", $firstname)) {
				header("Location: register.php?msg=invalidchar");
			}
			else {
				// check if email is valid or not
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: register.php?msg=invalidemail&firstname=$firstname");
				}
				else {
					$sql = "INSERT INTO customer(firstname, lastname, password, email, address, city, country, postal_code, phone_no, added_date)
					 		VALUES(:firstname, :lastname, :password, :email, :address, :city, :country, :postal_code, :phone_no, :added_date)";
					$stmt = $pdo->prepare($sql);
					unset($_POST['add']);
					$_POST['added_date'] = date('Y/m/d');
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); 		

					if($stmt->execute($_POST)) {
						header("Location: register.php?msg=successful");
					}
				}
			}
		}
	} 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Customer</title>
	<link rel="stylesheet" type="text/css" href="admin/admin.css?<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet">
</head>
<body>

<section class="section">

	<h2 class="sub-heading">Please enter your details...</h2>
	
	<?php 
		// display notification message
		if (isset($_GET['msg'])) {
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Please enter all fields!</P>";
			} 
			elseif ($msg == "invalidchar") {
				echo "<p class=\"error\">Please enter valid names!</P>";
			} 
			elseif ($msg == "invalidemail") {
				echo "<p class=\"error\">Please enter valid email!</P>";
			} 
			elseif ($msg == "invalidpassword") {
				echo "<p class=\"error\">Please enter valid password!</P>";
			}
			elseif ($msg == "successful") {
				echo "<p class=\"success\">Account created successfully!<a href=\"index.php\" style=\"margin-left:10px;\">Go back to home page. </a></P>";
			}
		} 
	?>
	<div class="form">
		<!-- form field to register billing address -->
		<form action="register.php" method="POST" class="customer-form">
			<label>First Name</label>
			<input type="text" name="firstname">
			<label>Last Name</label>
			<input type="text" name="lastname">
			<label>Email</label>
			<input type="text" name="email">
			<label>Password</label>
			<input type="password" name="password">
			<label>Address</label>
			<input type="text" name="address">
			<label>City</label>
			<input type="text" name="city">
			<label>Country</label>
			<input type="text" name="country">
			<label>Postal Code</label>
			<input type="text" name="postal_code">
			<label>Phone Number</label>
			<input type="text" name="phone_no">
			<input type="submit" name="add" value="Add">
		</form>
	</div>

</body>
</html>

	