<?php 
	$title = "Product";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Products</h1>
	<div class="alter-link">
		<!-- sub functionalitied for product -->
		<ul>
			<li><a href="product.php">Product Details</a></li>
			<li><a href="add_product.php">Add Product</a></li>
			<li>Edit Product</li>
		</ul>
	</div>
	<hr class="line"/>

	<div class="relative">
		<h2 class="sub-heading">Product Details</h2>
		<?php
			// delete record
			if (isset($_GET['del'])) {
				$stmt = $pdo->prepare("DELETE FROM product WHERE product_id = :product_id");
				$criteria = [
					'product_id' => $_GET['del']
				];
				if ($stmt->execute($criteria)) 
					echo '<p class="delete">Product Deleted Successfully</p>'; 
			}
			// delete record

			// update message
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Product updated Successfully</p>'; 
				}
			}
		?>
	</div>

	<div>
	<pre>
		<?php
			$stmt = $pdo->prepare("SELECT product_id, p.name as product_name, price, manufacturer_id, brand, c.name as category_name, featured, a.username as admin_name, product_img
				FROM product AS p
				JOIN category AS c
				ON p.category_id = c.category_id
				JOIN admin a
				ON a.admin_id = p.admin_id");
			$stmt->execute();
		?>

		<!-- displaying product details in tabular form -->
		<table class="tbl">
			<thead>
				<tr>
					<th>Product Id</th>
					<th>Image</th>
					<th>Name</th>
					<th>Price</th>
					<th>Manufacturer Id</th>
					<th>Brand</th>
					<th>Category Type</th>
					<th>Featured ?</th>
					<th>Posted By(admin)</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody id="tbl-pdt">
				<?php 
					foreach($stmt as $row) {
						echo '<tr>';
						echo '<td>' . $row['product_id'] . '</td>';
						echo '<td><img src="' . $row['product_img'] . '" alt="Img N/A"</td>';
						echo '<td>' . $row['product_name'] . '</td>';
						echo '<td>' . $row['price'] . '</td>';
						echo '<td>' . $row['manufacturer_id'] . '</td>';
						echo '<td>' . $row['brand'] . '</td>';
						echo '<td>' . $row['category_name'] . '</td>';
						echo '<td>' . $row['featured'] . '</td>';
						echo '<td>' . $row['admin_name'] . '</td>';
						echo '<td><a href="edit_product.php?editId='. $row['product_id'] . '">edit</a></td>';
						echo '<td><a href="#" onClick="javascript:
									                  	 if(confirm(\'Are you sure you want to delete this product?\')) {
															document.location=\'product.php?del=' . $row['product_id'] . '\';
														 }
							 ">delete</a></td>';
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</pre>
	</div>
</section>

<?php require 'require/footer.php'; ?>


