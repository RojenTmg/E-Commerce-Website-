<?php 
	$title = "Product";
	require 'require/header.php';
	require 'admin/require/connection.php';
?>

<div class="main-container">
	<div class="item">
	<?php 
		// $_GET['disp'] is the indication to display the choosen product
		if (isset($_GET['disp'])) {
			$pro_id = $_GET['disp'];

			// display produtct along with all the description
			// https://www.youtube.com/watch?v=NmF_00eAjD8
			$stmt = $pdo->prepare("SELECT product_img, name, price, manufacturer_id, brand, description, ROUND(AVG(r.rating)) as rating, COUNT(r.rating) as totalRating
				FROM product AS p
				JOIN review AS r
				ON p.product_id = r.product_id
				WHERE p.product_id=$pro_id
				AND r.rating != 0
				AND r.status = 'yes'");
			$stmt->execute();
			$data = $stmt->fetch();

		echo '<div class="img">';
			echo '<img src="admin/' . $data['product_img']. '">';
		echo '</div>';
		echo '<div class="details">';
			echo '<h2 class="">' . $data['name']. '</h2>';
			echo '<p class="price">$' . $data['price']. '</p>';
			echo '<p class="">' . $data['manufacturer_id']. '</p>';
			echo '<p class="">' . $data['brand']. '</p>';

	?>
		<!-- rating the product -->
			<div class="rating-product">
				<?php for($i = 5; $i > 0; $i--) {
					if ($i == $data['rating']) {
					echo '<input type="radio" checked disabled>';
					echo '<label></label>';
					} 
					else {
						echo '<input type="radio" disabled>';
						echo '<label></label>';
					}

				} ?>	
			</div>
	<?php			
			echo '<p style="text-align:right;"><i>(rated by '. $data['totalRating']. ' people)</i></p>';			
			echo '<hr/>';
			echo '<p><b>Description : </b></p>';
			echo '<p class="pad"> ' . $data['description']. '</p>';
		echo '</div>';
	?>
		<form action="cart.php?action=add&id=<?php echo $pro_id; ?>" method="POST" class="product-form"> 
			<input type="text" name="quantity" value="1">
			<input type="hidden" name="name" value="<?php echo $data['name']; ?>">
			<input type="hidden" name="price" value="<?php echo $data['price']; ?>">
			<input type="submit" name="cart" value="Add to cart">
		</form>
		<div class="review">
			<h1>Product Reviews</h1>
			<div>
				<?php 
					// to display only the reviews which are approved
					$disp = $_GET['disp'];
					$stmt = $pdo->prepare("SELECT c.email as cus_email, c.firstname as cus_name, review_detail, rating, posted_date, status
					FROM review r
					JOIN customer AS c
					ON c.customer_id = r.customer_id
					WHERE status = 'yes'
					AND product_id = $disp");	// to display the review in association to related product
					$stmt->execute();

					foreach ($stmt as $row) {
						$link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
						echo '<div class="product-review">';
					?>
						<!-- rating product -->
						<div class="rating-product">
							<?php for($i = 5; $i > 0; $i--) {
								if ($i == $row['rating']) {
								echo '<input type="radio" checked disabled>';
								echo '<label></label>';
								} 
								else {
									echo '<input type="radio" disabled>';
									echo '<label></label>';
								}

							} ?>	
						</div>

					<?php	
						echo '<h3><b>' . $row['cus_name']. '</b></h3>';
						echo '<p>' . $row['posted_date']. '</p>';
						echo '<p>' . $row['review_detail']. '</p>';
						echo '<div class="reviewer"><p>' . $row['cus_email']. '</p></div>';
						?>
						<!-- https://www.youtube.com/watch?v=Z4gMdPtAcZ0 -->
						<iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php echo $link; ?>&layout=button_count&size=small&mobile_iframe=true&width=69&height=20&appId" width="69" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

						<?php 
						echo '</div>';
					}
				?>
			</div>
			<form action="review.php?disp=<?php echo $_GET['disp']; ?>" method="POST">
				<input type="submit" name="submit" value="Write a review">
			</form>
		</div>
	<?php } ?>
	</div>
</div>


<?php require 'require/footer.php'; ?>
