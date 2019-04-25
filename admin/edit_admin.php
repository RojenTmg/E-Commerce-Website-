<?php 
	$title = "Edit Administrator";
	require 'require/header.php';
	require 'require/connection.php';
?>

<section class="section">
	<h1 class="heading">Administrator</h1>
	
	<div class="alter-link">
		<!-- sub functionalities for administrator -->
		<ul>
			<li><a href="administrator.php">Admiminstrator Details</a></li>
			<li><a href="add_admin.php">Add Admin</a></li>
			<li>Edit Admin</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Edit Administrator's Details</h2>

	<?php
		// update admin
		if(isset($_POST['update'])) {
			$stmt = $pdo->prepare("UPDATE admin SET username=:username, password=:password WHERE admin_id=:admin_id");
			unset($_POST['update']);

			if($stmt->execute($_POST)) {
				header('Location:administrator.php?msg=updated');
			}
		}

		// to display information that is already stored in database
		if(isset($_GET['editId'])) {
			$stmt = $pdo->prepare("SELECT * FROM admin WHERE admin_id=:admin_id");
			$criteria = [
				'admin_id' => $_GET['editId']
			];
			$stmt->execute($criteria);
			$data = $stmt->fetch();
	?>

	<!-- form to display datas -->
	<div class="form">
		<form action="edit_admin.php" method="POST" class="customer-form">
			<input type="hidden" name="admin_id" value="<?php echo $_GET['editId']; ?>">
			<label>User Name</label>
			<input type="text" name="username" value="<?php echo $data['username'];?>">
			<label>Email</label>
			<input type="text" name="email" disabled="disabled" value="<?php echo $data['email'];?>">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $data['password'];?>">
			<input type="submit" name="update" value="Save">
		</form>
	</div>
</section>

<?php }?>

<?php require 'require/footer.php'; ?>
