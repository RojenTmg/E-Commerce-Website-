<?php 
	$title = "Index";
	require 'require/header.php';
?>

<section class="section">
	<h1 class="heading">Home Page</h1>
		<div class="index">
			<a href="administrator.php">
			<!-- listing out all the functionality that administrator can perform -->
			<div>
				<h2>Manage Administrator</h2>
				<p>- View all the administrators, Add new admins and Edit previously created administrators the Administration Department.</p>
			</div>
			</a>
			<a href="customer.php">
			<div>
				<h2>Manage Customers</h2>
				<p>- View total Customers, Add new Customers and Edit previously created Customers.</p>
			</div>
			</a>
			<a href="category.php">
			<div>
				<h2>Manage Category</h2>
				<p>- View, Add and Edit the Category.</p>
			</div>
			</a>
			<a href="product.php">
			<div>
				<h2>Manage Product</h2>
				<p>- View, Add and Edit the products.</p>
			</div>
			</a>
			<a href="review.php">
			<div>
				<h2>Manage Reviews</h2>
				<p>- Hold and Approve the reviews posted by your customers.</p>
			</div>
			</a>
			<a href="billing.php">
			<div>
				<h2>Manage Billing Address</h2>
				<p>- Manage the Billing Address of customers.</p>
			</div>
			</a>
			<a href="shipped_order.php">
			<div>
				<h2>Manage Orders</h2>
				<p>- Manage pending orders and shiped ready orders to respective customers.</p>
			</div>
		</div>
</section>

<?php require 'require/footer.php'; ?>
