<?php 
	$title = "Billing Address";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Billing Addresses</h1>

	<div class="relative">
		<h2 class="sub-heading">Billing Address Details</h2>
	</div>

	<div>
	<pre>
		<?php
			// display billing address of address that customer ordered ie address for shipping 
			$stmt = $pdo->prepare("SELECT billing_id, firstname, lastname, email, address, city, country, phone_no, billed_date, payment_method FROM billing_address");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Billing Id', 'Firstname', 'Lastname', 'Email', 'Address', 'City', 'Country', 'Phone No', 'Billed Date', 'Payment Method']);
			foreach ($stmt as $row) {
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
	</pre>
	</div>

</section>

<?php require 'require/footer.php'; ?>
