<?php 
	$title = "Add Customer";
	require 'require/header.php';
?>

<?php
	if (isset($_POST['add'])) {
		include_once 'require/connection.php';
		extract($_POST);
		
		// checks if input are empty or not
		if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($address) || 
			empty($city) || empty($country) || empty($postal_code) || empty($phone_no)) {
			header("Location: add_customer.php?msg=empty&firstname=$firstname");
		} 
		else {
			// checks if input characters are valid or not
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)  || !preg_match("/^[a-zA-Z]*$/", $firstname)) {
				header("Location: add_customer.php?msg=invalidchar");
			}
			else {
				// check if email is valid or not
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: add_customer.php?msg=invalidemail&firstname=$firstname");
				}
				else {
					$sql = "INSERT INTO customer(firstname, lastname, password, email, address, city, country, postal_code, phone_no, added_date)
					 		VALUES(:firstname, :lastname, :password, :email, :address, :city, :country, :postal_code, :phone_no, :added_date)";
					$stmt = $pdo->prepare($sql);
					unset($_POST['add']);
					$_POST['added_date'] = date('Y/m/d');
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT); 		

					if($stmt->execute($_POST)) {
						header("Location: add_customer.php?msg=successful");
					}
				}
			}
		}
	} 
?>

<section class="section">
	<h1 class="heading">Customers</h1>
	
	<div class="alter-link">
		<ul>
			<li><a href="customer.php">Customer Details</a></li>
			<li><a href="add_customer.php">Add Customer</a></li>
			<li>Edit Customer</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Add Customer's Detail</h2>
	
	<?php 
		// notification message 
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
				echo "<p class=\"success\">Account created successfully!</P>";
			}
		} 
	?>
	<div class="form">
		<form action="add_customer.php" method="POST" class="customer-form">
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

	


</section>

<?php require 'require/footer.php'; ?>
