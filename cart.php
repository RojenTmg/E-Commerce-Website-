<?php 
	session_start();

	$title = "Cart";
	require 'require/header.php';
	require 'admin/require/connection.php';
?>

<div class="main-container">
	<section class="ind-section">
		<h1 style="margin: 50px 0;">Total Products in your Cart</h1>
		<section id="latest">
		
		<?php 
			// count the total number of product in the category
			$total = 0;
			// adds items to the cart
			if (isset($_POST['cart'])) {
				if(isset($_SESSION['shopping_cart'])) {
					// count the number of product in shopping cart
					$count = count($_SESSION['shopping_cart']);

					// matches array key to product ids
					$product_ids = array_column($_SESSION['shopping_cart'], 'id');

					if (!in_array($_GET['id'], $product_ids)) {
						$_SESSION['shopping_cart'][$count] = array(
						'id' => $_GET['id'], 
						'name' => $_POST['name'], 
						'price' => $_POST['price'], 
						'quantity' => $_POST['quantity'] 
						);
					}
					else {
						for ($i=0; $i < count($product_ids); $i++) {
							// the the product already exits in the array, run this code 
							if ($product_ids[$i] == $_GET['id']) {
								// add the item to existing product
								$_SESSION['shopping_cart'][$i]['quantity'] += $_POST['quantity'];
							}
						}
					}
				}
				else {
					// adds product in the shopping cart using SESSION
					$_SESSION['shopping_cart'][0] = array(
						'id' => $_GET['id'], 
						'name' => $_POST['name'], 
						'price' => $_POST['price'], 
						'quantity' => $_POST['quantity'] 
					);
				}
			}

			if ($_GET['action'] == "delete") {
				// removes product from the cart
				foreach ($_SESSION['shopping_cart'] as $key => $product) {
					if ($product['id'] == $_GET['delId']) {
						unset($_SESSION['shopping_cart'][$key]);
					}
				}
				// reset session key to associate product id 
				$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
			}
		?>

		<table class="tbl">
			<!-- displays total products added to cart -->
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					if (isset($_SESSION['shopping_cart'])) {
						$total = 0;
						foreach ($_SESSION['shopping_cart'] as $key => $row) {
					?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td>$<?php echo $row['price']; ?></td>
						<td>$<?php echo number_format($row['quantity'] * $row['price'], 2); ?></td>
						<td><a href="cart.php?action=delete&delId=<?php echo $row['id']; ?>">remove</a></td>
					</tr>

					<?php
						$total += $row['quantity'] * $row['price'];	
						}
				?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" align="right">Total :</td>
					<td align="right">$<?php echo number_format($total, 2); 
					}
					?></td>
				</tr>
			</tfoot>
		</table>

		<?php 
			// if user clicks on the "Shop now" button, then page redirects to billing address for final phase of ordering
			if ($total == 0) {
				echo '<a href="#" class="buy">Shop now</a>';
				
			} else {
				echo '<a href="billing_address.php?total='. $total . '" class="buy">Shop now</a>';
			}
		?>

		</section>
</section>
</div>
<?php 
	require 'require/footer.php';
?>