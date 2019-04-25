
<?php
	session_start();
	
	include_once 'admin/require/connection.php';

	// add order details into database
	$sql = "INSERT INTO order_detail(total_items, shipped_to, total, order_date, status, billing_id)
	 		VALUES(:total_items, :shipped_to, :total, :order_date, status, billing_id)";
	$stmt = $pdo->prepare($sql);

	$_POST['billed_date'] = date('Y/m/d');	

	$criteria = [
		'total_items' => $_POST['total_items'],
		'shipped_to' => $_POST['shipped_to'],
		'total' => $_POST['total'],
		'order_date' => $_POST['order_date'],
		'status' => $_POST['status'],
		'billing_id' => $_POST['billing_id']
	];

	if($stmt->execute($criteria)) {
		header("Location: billing_address.php?msg=successful");
	}