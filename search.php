<?php 
	$title = "Search Items";
	require 'require/header.php';
	require 'admin/require/connection.php';
?>

<div class="main-container">
		<section class="ind-section">
		<?php 
			// returns total product found if search bar is not empty
			if(!empty($_POST['search'])) {
				$key = $_POST['key'];
				$stmt = $pdo->prepare("SELECT * FROM product WHERE name LIKE '%$key%'");
				$stmt->execute();
			$totalProductfound = $stmt->rowcount();
		?>
		<h1>Products Found</h1>
		<p style="text-align: center;"><?php echo $totalProductfound; ?> items found for <?php echo '"' . $key . '"';?></p>
		<div class="products">
		<section>
		<?php	
				foreach ($stmt as $row) {
				echo '<form action="cart.php?action=add&id='. $row['product_id'] . '" method="POST" class="featured-type product">';
		          	echo '<a href="product.php?disp='. $row['product_id'] . '"><img src="admin/'. $row['product_img'] . '" alt="image comming soon..."></a>';
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
		?>
		</section>
		</div>
</section>
</div>
<?php 
} 
	require 'require/footer.php';
?>