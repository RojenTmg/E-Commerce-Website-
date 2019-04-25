<?php 
	$title = "Edit Product";
	require 'require/header.php';
	require 'require/connection.php';
?>

<section class="section">
	<h1 class="heading">Products</h1>
	<div class="alter-link">
		<!-- sub functionalities for product -->
		<ul>
			<li><a href="product.php">Product Details</a></li>
			<li><a href="add_product.php">Add Product</a></li>
			<li>Edit Product</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Edit Product</h2>

	<?php
		// update product
		if(isset($_POST['update'])) {
			$stmt = $pdo->prepare("UPDATE product SET name=:name, price=:price, manufacturer_id=:manufacturer_id, brand=:brand, description=:description, category_id=:category_id, product_img=:product_img, featured=:featured WHERE product_id=:product_id");

			$imgName = $_FILES['product_img']['name'];
			$tempPath = $_FILES['product_img']['tmp_name'];
			$finalPath = 'images/' . $imgName;
			move_uploaded_file($tempPath, $finalPath);

			$_POST['product_img'] = $finalPath;

			$criteria = [
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'manufacturer_id' => $_POST['manufacturer_id'],
				'brand' => $_POST['brand'],
				'description' => $_POST['description'],
				'product_img' => $_POST['product_img'],
				'category_id' => $_POST['category_id'],
				'product_id' => $_POST['product_id'],
				'featured' => $_POST['featured']
			];

			if($stmt->execute($criteria)) {
				header('Location:product.php?msg=updated');
			}
		}

		// to display information that is already stored in database
		if(isset($_GET['editId'])) {
			$category = $pdo->prepare("SELECT category_id, name FROM category");
			$category->execute();

			$stmt = $pdo->prepare("SELECT * FROM product WHERE product_id=:product_id");
			$criteria = [
				'product_id' => $_GET['editId']
			];
			$stmt->execute($criteria);
			$data = $stmt->fetch();
	?>

	<!-- form to display datas -->
	<div class="form">
		<form action="edit_product.php" method="POST" class="customer-form" enctype="multipart/form-data">
			<input type="hidden" name="product_id" value="<?php echo $_GET['editId']; ?>">
			<label>Product Name</label>
			<input type="text" name="name" value="<?php echo $data['name']; ?>">
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $data['price']; ?>">
			<label>Manufacture Code</label>
			<input type="text" name="manufacturer_id" value="<?php echo $data['manufacturer_id']; ?>">
			<label>Brand Name</label>
			<input type="text" name="brand" value="<?php echo $data['brand']; ?>">
			<label>Description</label>
			<textarea name="description" id="desc"><?php echo $data['description']; ?></textarea>
			<label>Category</label>
			<select name="category_id">
			<!-- to select category in dropdown list -->
			<?php 
				foreach($category as $row) { ?>
					<option value="<?php echo $row['category_id'];?>" <?php if($data['category_id'] == $row['category_id']) echo 'selected';?>>
					<?php echo $row['name'];?>
					</option>
				<?php }
			?>
			</select>
			<label>Featured ?</label>
			 <?php 
			 	if ($data['featured'] == "yes") {
					echo '<input type="radio" name="featured"  checked="checked" value="yes">';
					echo '<label id="radio">Yes</label>';
					echo '<input type="radio" name="featured" value="no">';
					echo '<label id="radio">No</label>'; 
			 	}
			 	else {
			 ?>
			<input type="radio" name="featured" value="yes">
			<label id="radio">Yes</label>
  			<input type="radio" name="featured" checked="checked" value="no">
			<label id="radio">No</label> 
			<?php } ?>
			<label>Choose Image</label>
			<input type="file" name="product_img" value="<?php echo $data['product_img']; ?>">
			<input type="submit" name="update" value="Save">
		</form>
	</div>
</section>

<?php }?>

<?php require 'require/footer.php'; ?>
