<?php 
	session_start();
	
	// if SESSION is not set, redirect to login page
	if (!isset($_SESSION['adminId'])) {
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="admin.css?<?php echo time(); ?>">
</head>
<body>
	<header>
		<h1>Ed's Electronics</h1>
		<!-- logout button for administrator -->
		<form action="logout.php" method="" class="logout">
			<input type="submit" name="logout" value="Logout">
		</form>
	</header>

	<div class="main-container">		
		<aside>
			<!-- navigation pannel -->
			<ul class="">
				<li><a href="/assignment">View Store</a></li>
				<li><a href="index.php">Home</a></li>
				<li><a href="administrator.php">Administrator</a></li>
			</ul><br/>
			<ul class="">
				<li><a href="customer.php">Customer</a></li>
				<li><a href="category.php">Category</a></li>
				<li><a href="product.php">Product</a></li>
				<li><a href="review.php">Review</a></li>
				<br/>
				<li><a href="billing.php">Billing Address</a></li>
				<li><a href="order.php">Order Details</a></li>
			</ul>		
		</aside>
