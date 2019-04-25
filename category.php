<?php 
	$title = "Category";
	require 'require/header.php';
	require 'admin/require/connection.php';
?>

<div class="main-container">
	<section class="section">
	<h1>
	<?php
		// display category name for selected category
		$cat_name = $_GET['cat_name'];
		if (isset($_GET['cat_name'])) {
			echo $_GET['cat_name'];
		}	
	?>	
	</h1>
		<div class="products">
			<section>
				<?php
				// display all the products in selected category
				if (isset($_GET['catg'])) {
					$stmt = $pdo->prepare("SELECT * FROM product WHERE category_id=:category_id  ORDER BY added_date DESC ");
					$criteria = [
						'category_id' => $_GET['catg']
					];
					$stmt->execute($criteria);
					foreach ($stmt as $row) {
					  echo '<form action="cart.php?action=add&id='. $row['product_id'] . '" method="POST" class="product">';
			          	echo '<a href="product.php?disp='. $row['product_id'] . 
			          							   '&catg=' . $_GET['catg'] . '">
			          		  <img src="admin/'. $row['product_img'] . '" alt="image comming soon..."></a>';
			          	echo '<div class="desc">';
				      	  	echo '<p class="name">' . $row['name']. '</p>';
				         	echo '<p class="">' . $row['brand']. '</p>';
				          	echo '<p class="price">$' . $row['price']. '</p>';
			          	echo '</div>';
          				echo '<input type="text" name="quantity" value="1">';
						echo '<input type="hidden" name="name" value="' . $row['name']. '">';
						echo '<input type="hidden" name="price" value="' . $row['price']. '">';
						echo '<input type="submit" name="cart" value="Add to cart">';
					  echo '</form>';
					}
				}

			?>

			</section>
		</div>
	</section>
</div>


<?php require 'require/footer.php'; ?>


