<?php
	session_start();
	
	if (isset($_POST['add'])) {
		include_once 'admin/require/connection.php';
		extract($_POST);
		
		// checks if input are empty or not
		if (empty($firstname) || empty($lastname) || empty($email) || empty($address) || 
			empty($city) || empty($country) || empty($post_code) || empty($phone_no)) {
			header("Location: billing_address.php?msg=empty&firstname=$firstname");
		} 
		else {
			// checks if input characters are valid or not
			if (!preg_match("/^[a-zA-Z]*$/", $firstname)  || !preg_match("/^[a-zA-Z]*$/", $firstname)) {
				header("Location: billing_address.php?msg=invalidchar");
			}
			else {
				// check if email is valid or not
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: billing_address.php?msg=invalidemail&firstname=$firstname");
				}
				else {
					// inserts billing address of customer into the database
					$sql = "INSERT INTO billing_address(firstname, lastname, email, address, city, country, post_code, phone_no, billed_date, payment_method, total_items, total, status)
					 		VALUES(:firstname, :lastname, :email, :address, :city, :country, :post_code, :phone_no, :billed_date, :payment_method, :total_items, :total, :status)";
					$stmt = $pdo->prepare($sql);

					if ($_POST['add'] == 'Paypal Payment')
						$_POST['payment_method'] = "paypal";
					else 
						$_POST['payment_method'] = "cash on delivery";

					$_POST['status'] = "pending";
					$_POST['billed_date'] = date('Y/m/d');

					$criteria = [
						'firstname' => $_POST['firstname'],
						'lastname' => $_POST['lastname'],
						'email' => $_POST['email'],
						'address' => $_POST['address'],
						'city' => $_POST['city'],
						'country' => $_POST['country'],
						'post_code' => $_POST['post_code'],
						'phone_no' => $_POST['phone_no'],
						'billed_date' => $_POST['billed_date'],
						'payment_method' => $_POST['payment_method'],
						'total_items' => count($_SESSION['shopping_cart']),
						'total' => $_GET['total'],
						'status' => $_POST['status']
					];

					if($stmt->execute($criteria)) {

						if ($_POST['add'] == 'Paypal Payment') {
							header("Location: https://www.paypal.com/np/signin?country.x=NP&locale.x=en_NP");
						} else{
							header("Location: billing_address.php?msg=successful");
						}
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
		// displays messages according to the insertion performed
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
				unset($_SESSION['shopping_cart']);
				echo "<p class=\"success\">Thank You for buying form our store. Your order will be shipped within 24 hours! <a href=\"index.php\" style=\"margin-left:10px;\">Go back to home page. </a></P>";
			}
		} 
	?>
	<div class="form">
		<form action="billing_address.php?total=<?php echo $_GET['total']; ?>" method="POST" class="customer-form">

			<?php
				// displays all data of customer if they are already logged in
				if (isset($_SESSION['cusName'])) {
					include_once 'admin/require/connection.php';
					
					$stmt = $pdo->prepare("SELECT customer_id, firstname, lastname, email, address, city, country, postal_code, phone_no FROM customer WHERE customer_id=:customer_id");
					$criteria = [
						'customer_id' => $_SESSION['cusId'] 
					];
					$stmt->execute($criteria);
					$customer = $stmt->fetch();

					echo '<label>First Name</label>';
					echo '<input type="text" name="firstname"  value="' . $customer['firstname'] . '">';
					echo '<label>Last Name</label>';
					echo '<input type="text" name="lastname" value="' . $customer['lastname'] . '">';
					echo '<label>Email</label>';
					echo '<input type="text" name="email" value="' . $customer['email'] . '">';
					echo '<label>Address</label>';
					echo '<input type="text" name="address" value="' . $customer['address'] . '">';
					echo '<label>City</label>';
					echo '<input type="text" name="city" value="' . $customer['city'] . '">';
					echo '<label>Country</label>';
					echo '<input type="text" name="country" value="' . $customer['country'] . '">';
					echo '<label>Postal Code</label>';
					echo '<input type="text" name="post_code" value="' . $customer['postal_code'] . '">';
					echo '<label>Phone Number</label>';
					echo '<input type="text" name="phone_no" value="' . $customer['phone_no'] . '">';
				}
				// displays fields for customer to enter their billing address
				else {
			?>
				<label>First Name</label>
				<input type="text" name="firstname">
				<label>Last Name</label>
				<input type="text" name="lastname">
				<label>Email</label>
				<input type="text" name="email">
				<label>Address</label>
				<input type="text" name="address">
				<label>City</label>
				<input type="text" name="city">
				<label>Country</label>
				<input type="text" name="country">
				<label>Postal Code</label>
				<input type="text" name="post_code">
				<label>Phone Number</label>
				<input type="text" name="phone_no">
			<?php
				}
			 ?>
			 	<br>
			 	<!-- different payment methods -->
				<input type="submit" name="add" value="Paypal Payment" id="paypal">
				<input type="submit" name="add" value="Cash on Delivery" style="display: inline;">
		</form>
	</div>

</body>
</html>

	