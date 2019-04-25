<?php 
	$title = "Add Administrator";
	require 'require/header.php';
?>

<?php
	if (isset($_POST['add'])) {
		include_once 'require/connection.php';
		extract($_POST);

		// checks if input are empty or not
		if (empty($username) || empty($email) || empty($password)) {
			header("Location: add_admin.php?msg=empty&username=$username");
		} 
		else {
			// checks if input characters are valid or not
			if (!preg_match("/^[a-zA-Z]*$/", $username)) {
				header("Location: add_admin.php?msg=invalidchar");
			}
			else {
				// check if email is valid or not
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: add_admin.php?msg=invalidemail&username=$username");
				}
				else {
					$sql = "INSERT INTO admin(username, password, email, added_date)
					 		VALUES(:username, :password, :email, :added_date)";

					$stmt = $pdo->prepare($sql);
					unset($_POST['add']);
					$_POST['added_date'] = date('Y/m/d');
					$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

					if($stmt->execute($_POST)) {
						header("Location: add_admin.php?msg=successful");
					}
				}
			}
		}
	} 
?>

<section class="section">
	<h1 class="heading">Administrator</h1>
	
	<div class="alter-link">
		<ul>
			<li><a href="administrator.php">Admiminstrator Details</a></li>
			<li><a href="add_admin.php">Add Admin</a></li>
			<li>Edit Admin</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Add Administrator's Detail</h2>
	<?php 
		// display notification messages for user input
		if (isset($_GET['msg'])) {
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Please enter all fields!</P>";
			} 
			elseif ($msg == "invalidchar") {
				echo "<p class=\"error\">Please enter valid Username!</P>";
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
		<form action="add_admin.php" method="POST" class="customer-form">
			<label>User Name</label>
			<?php 
				if (isset($_GET['username'])) {
						echo '<input type="text" name="username" value="' . $username . '">';
				}
				else {
					echo '<input type="text" name="username">';
				}
			?>
			<label>Email</label>
			<input type="text" name="email">
			<label>Password</label>
			<input type="password" name="password">
			<input type="submit" name="add" value="Add">
		</form>
	</div>
</section>

<?php require 'require/footer.php'; ?>
