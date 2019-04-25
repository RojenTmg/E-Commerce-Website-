<?php 
	$title = "Edit Category";
	require 'require/header.php';
	require 'require/connection.php';
?>

<section class="section">
	<h1 class="heading">Categories</h1>
	<div class="alter-link">
		<!-- sub functionalities for category -->
		<ul>
			<li><a href="category.php">Category Details</a></li>
			<li><a href="add_category.php">Add Category</a></li>
			<li>Edit Category</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Edit Category</h2>

	<?php
		// update category
		if(isset($_POST['update'])) {
			$stmt = $pdo->prepare("UPDATE category SET name=:name, description=:description, category_img=:category_img WHERE category_id=:category_id");
			unset($_POST['update']);

			$imgName = $_FILES['category_img']['name'];
			$tempPath = $_FILES['category_img']['tmp_name'];
			$finalPath = 'images/' . $imgName;
			move_uploaded_file($tempPath, $finalPath);

			$_POST['category_img'] = $finalPath;

			if($stmt->execute($_POST)) {
				header('Location:category.php?msg=updated');
			}
		}

		// to display information that is already stored in database
		if(isset($_GET['editId'])) {
			$stmt = $pdo->prepare("SELECT * FROM category WHERE category_id=:category_id");
			$criteria = [
				'category_id' => $_GET['editId']
			];
			$stmt->execute($criteria);
			$data = $stmt->fetch();
	?>

		<!-- form to display datas -->
		<div class="form">
		<form action="edit_category.php" method="POST" enctype="multipart/form-data" class="customer-form">
			<input type="hidden" name="category_id" value="<?php echo $_GET['editId']; ?>">
			<label>Category Name</label>
			<input type="text" name="name"  value="<?php echo $data['name'];?>">
			<label>Description</label>
			<textarea name="description" id="desc"><?php echo $data['description'];?></textarea>
			<label>Choose Image</label>
			<input type="file" name="category_img" value="<?php echo $data['category_img']; ?>">
			<input type="submit" name="update" value="Save">
		</form>
	</div>
</section>

<?php }?>

<?php require 'require/footer.php'; ?>
