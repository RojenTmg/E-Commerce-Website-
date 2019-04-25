<?php 
	$title = "Pending Order";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Orders</h1>
	<div class="alter-link">
		<!-- listing out all the functionalities  -->
		<ul>
			<li><a href="order.php">Pending Orders</a></li>
			<li><a href="shipped_order.php">Shipped Orders</a></li>
		</ul>
	</div>
	<hr class="line"/>

	<div class="relative">
	<h2 class="sub-heading">Pending Orders</h2>
		<!-- notification message -->
		<?php 
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Order is Shipped!</p>'; 
				}
			}
		?>
	</div>

	<div>
	<pre>
		<?php

			if(isset($_POST['submit'])) {
				$stmt = $pdo->prepare("UPDATE billing_address SET status=:status WHERE billing_id=:billing_id");

				// identifies status of order and stored it in database
				if (isset($_POST['status'])) {
					if ($_POST['status']=="yes") 
						$status = "shipped";
					else 
						$status = "pending";
				} 

				$criteria = [
					'status' => $status,
					'billing_id' => $_GET['revId']
				];

				if($stmt->execute($criteria)) {
					header('Location:order.php?msg=updated');
				}
			}

			// selects all the pending orders
			$stmt = $pdo->prepare("SELECT billing_id, firstname, lastname, email, total_items, address, city, country, total, payment_method, status FROM billing_address 
				WHERE status = \"pending\"");
			$stmt->execute();

			// displaying all the billing address of customer who ordered products
			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Order Id', 'Name', 'Lastname', 'Email', 'Items Purchased', 'Address', 'City', 'Country', 'Total Price', 'Payment Method', 'Status', 'Shipped?']);
			foreach ($stmt as $row) {
				$row[] = '<form action="order.php?revId='.$row['billing_id'].'" method="POST" style="display=flex;">
								<input type="radio" name="status" value="yes">
								<label>Yes</label>
								<input type="radio" name="status" checked>
								<label>No</label> 
								<input type="submit" name="submit" value= "submit">
							</form>';
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
	</pre>
	</div>

</section>

<?php require 'require/footer.php'; ?>
