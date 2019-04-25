<?php 
	$title = "Customer";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Customers</h1>
	
	<div class="alter-link">
		<!-- sub functionalies for customer  -->
		<ul>
			<li><a href="customer.php">Customer Details</a></li>
			<li><a href="add_customer.php">Add Customer</a></li>
			<li>Edit Customer</li>
		</ul>
	</div>
	<hr class="line"/>

	<div class="relative">
		<h2 class="sub-heading">Customer Details</h2>
		<?php 
			// delete record
			if (isset($_GET['del'])) {
				$stmt = $pdo->prepare("DELETE FROM customer WHERE customer_id = :customer_id");
				$criteria = [
					'customer_id' => $_GET['del']
				];
				if ($stmt->execute($criteria)) 
					echo '<p class="delete">Account Deleted Successfully</p>'; 
			}
			// delete record

			// update message
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Account updated Successfully</p>'; 
				}
			}
		?>
	</div>

	<div>
	<pre>
		<?php
			// display cusomter information in tabular form
			$stmt = $pdo->prepare("SELECT customer_id, firstname, lastname, email, address, city, country, phone_no, added_date FROM customer");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Customer Id', 'Firstname', 'Lastname', 'Email', 'Address', 'City', 'Country', 'Phone No', 'Added Date', 'Edit', 'Delete']);
			foreach ($stmt as $row) {
				$row[] = '<a href="edit_customer.php?editId='. $row['customer_id'] . '">edit</a>';
				$row[] = '<a href="#" onClick="javascript:
												if(confirm(\'Are you sure you want to delete this account?\')) {
													document.location=\'customer.php?del=' . $row['customer_id'] . '\';
												}
						  ">delete</a>';
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
	</pre>
	</div>

</section>

<?php require 'require/footer.php'; ?>
