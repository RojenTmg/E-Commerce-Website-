<?php
	session_start(); 
	require 'admin/require/connection.php';
?>

<!doctype html>
<html>
	<head>
		<title><?php echo $title;?></title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="customer.css?<?php echo time(); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Audiowide|Thasadith" rel="stylesheet">
	</head>

	<body>
		<header>
			<div class="eds">
				<h1><a href="index.php">Ed's Electronics</a></h1>
			</div>
			<?php 
				// notify customer whether they are logged in or logged out
				if (isset($_SESSION['cusName'])) {
					echo '<p class="cusName">You are signed in as ' . $_SESSION['cusName'] . '.</p>';
				}
				elseif (isset($_GET['logout'])) {
					echo '<p class="cusName">You have been logged out.</p>';					
				}
			?>
			<div class="login">
				<a href="register.php" class="a">Register</a>
				<span> / </span>
				<a href="login.php" class="a">Sign In</a>
				<!-- if customer is logged in then display logout button -->
				<?php 
				if (isset($_SESSION['cusId'])) {
					echo '<a href="logout.php" class="logout">Log out</a>';
				}
				?>
			</div>
		</header>
		<nav>
			<div class="categories">
			<ul>
				<li class="drop-down-item">
					<strong>CATEGORY</strong>
					<div class="drop-down">
						<ul>
						<?php 
							// query all the category name and display them in drop down list
							$stmt = $pdo->prepare("SELECT * FROM category");
							$stmt->execute();
							foreach ($stmt as $row) {
								$catId = $row['category_id'];
								echo '<li><a href="category.php?catg=' . $catId . '&cat_name=' . $row['name'] . '">'. $row['name'] . '</a></li>';
							}
						?>
						</ul>
					</div>
				</li>
				
				<?php 
					// query all the category name and display them in drop down list		
					$stmt = $pdo->prepare("SELECT * FROM category");
					$stmt->execute();
					foreach ($stmt as $row) {
							$catId = $row['category_id'];
							echo '<li><a href="category.php?catg=' . $catId . '&cat_name=' . $row['name'] . '">'. $row['name'] . '</a></li>';
					}
				?>
			</ul>
			</div>
			<div class="cart">
				<!-- shows the total number of items in the cart -->
				<a href="cart.php?action">View Cart</a>
				<input type="text" name="no_cart" value="<?php 
				if (isset($_SESSION['shopping_cart'])) 
					echo  count($_SESSION['shopping_cart']); 
				else 
					echo 0;?>" class="no-cart" disabled="disabled">
			</div>
			<div class="search">
				<form action="search.php" method="POST">
					<input type="text" name="key" placeholder="Search products">
					<input type="submit" name="search" value="Search">
				</form>
			</div>
		</nav>
		<hr class="line">

