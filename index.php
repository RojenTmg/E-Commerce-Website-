<?php 
	$title = "Ed's Electronics";
	require 'require/header.php';
	require 'admin/require/connection.php';
?>

<div class="main-container">
<section class="ind-section">

	<div class="slide-img">
		<!-- <img src="images/banners/2.jpg"> -->
	</div>
	
	<h1>Categories</h1>
	<section id="category">
	<?php 
		$stmt = $pdo->prepare("SELECT * FROM category");
		$stmt->execute();

		// displays total categrory along with description
		foreach ($stmt as $row) {
		  echo '<div class="category-type product">';
          	echo '<a href="category.php?catg=' . $row['category_id'] . '&cat_name=' . $row['name'] . '"><img src="admin/'. $row['category_img'] . '" alt="image comming soon..."></a>';
          	echo '<div class="desc">';
	      	  	echo '<p class="name">' . $row['name']. '</p>';
	          	echo '<p class="description">' . $row['description']. '</p>';
          	echo '</div>';
		  echo '</div>';
		}
	?>
	</section>

	<h1>Featured Products</h1>
	<section id="featured">
	<?php 
		// displays featured products
		$stmt = $pdo->prepare("SELECT * FROM product WHERE featured = 'yes' LIMIT 5");
		$stmt->execute();
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

	<h1>Latest Products</h1>
	<section id="latest">
	<?php 
		// displays latest product
		$stmt = $pdo->prepare("SELECT * FROM product ORDER BY added_date DESC LIMIT 40");
		$stmt->execute();
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

</section>
</div>

<?php require 'require/footer.php'; ?>


