<?php 
	$title = "Edit Customer";
	require 'require/header.php';
	require 'require/connection.php';
?>

<section class="section">
	<h1 class="heading">Customers</h1>
	
	<div class="alter-link">
		<!-- sub functionalities for customer -->
		<ul>
			<li><a href="customer.php">Customer Details</a></li>
			<li><a href="add_customer.php">Add Customer</a></li>
			<li>Edit Customer</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Edit Customer's Detail</h2>

	<?php
		// update customer
		if(isset($_POST['update'])) {
			$stmt = $pdo->prepare("UPDATE customer SET firstname=:firstname, lastname=:lastname, password=:password,  address=:address, city=:city, country=:country, postal_code=:postal_code, phone_no=:phone_no WHERE customer_id=:customer_id");
			unset($_POST['update']);
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

			if($stmt->execute($_POST)) {
				header('Location:customer.php?msg=updated');
			}
		}

		// to display information that is already stored in database
		if(isset($_GET['editId'])) {
			$stmt = $pdo->prepare("SELECT * FROM customer WHERE customer_id =:customer_id");
			$criteria = [
				'customer_id' => $_GET['editId']
			];
			$stmt->execute($criteria);
			$data = $stmt->fetch();
	?>
	
	<!-- form to display datas -->
	<div class="form">
		<form action="edit_customer.php" method="POST" class="customer-form">
			<input type="hidden" name="customer_id" value="<?php echo $_GET['editId']; ?>">
			<label>First Name</label>
			<input type="text" name="firstname" value="<?php echo $data['firstname']; ?>">
			<label>Last Name</label>
			<input type="text" name="lastname" value="<?php echo $data['lastname']; ?>">
			<label>Email</label>
			<input type="text" name="email" disabled="disabled" value="<?php echo $data['email']; ?>">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $data['password']; ?>">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $data['address']; ?>">
			<label>City</label>
			<input type="text" name="city" value="<?php echo $data['city']; ?>">
			<label>Country</label>
			<input type="text" name="country" value="<?php echo $data['country']; ?>">
			<label>Postal Code</label>
			<input type="text" name="postal_code" value="<?php echo $data['postal_code']; ?>">
			<label>Phone Number</label>
			<input type="text" name="phone_no" value="<?php echo $data['phone_no']; ?>">
			<input type="submit" name="update" value="Save">
		</form>
	</div>
</section>

<?php }?>

<?php require 'require/footer.php'; ?>
