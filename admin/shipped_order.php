<?php 
	$title = "Shipped Order";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Orders</h1>
	<div class="alter-link">
		<ul>
			<li><a href="order.php">Pending Orders</a></li>
			<li><a href="shipped_order.php">Shipped Orders</a></li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Shipped Orders</h2>

	<div>
	<pre>
		<!-- displays all the orders that are marked as shipped -->
		<?php
			$stmt = $pdo->prepare("SELECT billing_id, firstname, lastname, email, total_items, address, city, country, total, payment_method, status FROM billing_address 
				WHERE status = \"shipped\"");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Order Id', 'Name', 'Lastname', 'Email', 'Items Purchased', 'Address', 'City', 'Country', 'Total Price', 'Payment Method', 'Status']);
			foreach ($stmt as $row) {
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
	</pre>
	</div>
</section>

<?php require 'require/footer.php'; ?>
