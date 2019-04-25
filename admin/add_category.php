<?php 
	$title = "Add Category";
	require 'require/header.php';
?>

<?php
	if (isset($_POST['add'])) {
		include_once 'require/connection.php';
		extract($_POST);

		// checks if input are empty or not
		if (empty($name)) {
			header("Location: add_category.php?msg=empty");
		} 
		else {
			$sql = "INSERT INTO category(name, description, category_img)
			 		VALUES(:name, :description, :category_img)";
			$stmt = $pdo->prepare($sql);

			// uploading image into database
			$imgName = $_FILES['category_img']['name'];
			$tempPath = $_FILES['category_img']['tmp_name'];
			$finalPath = 'images/' . $imgName;
			move_uploaded_file($tempPath, $finalPath);

			$_POST['category_img'] = $finalPath;

			$criteria = [
			'name' => $_POST['name'],
			'description' => $_POST['description'],
			'category_img' => $_POST['category_img']
			];

			if($stmt->execute($criteria)) {
				header("Location: add_category.php?msg=successful");
			}
		}
	} 
?>

<section class="section">
	<h1 class="heading">Categories</h1>
	<div class="alter-link">
		<ul>
			<li><a href="category.php">Category Details</a></li>
			<li><a href="add_category.php">Add Category</a></li>
			<li>Edit Category</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Add Category</h2>
	<?php 
		// notification message
		if (isset($_GET['msg'])) {
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Please enter a name for Category!</P>";
			} 
			elseif ($msg == "successful") {
				echo "<p class=\"success\">Category added successfully!</P>";
			}
		} 
	?>
	<div class="form">
		<form action="add_category.php" method="POST" enctype="multipart/form-data" class="customer-form">
			<label>Category Name</label>
			<input type="text" name="name">
			<label>Description</label>
			<textarea name="description" id="desc"></textarea>
			<label>Choose Image</label>
			<input type="file" name="category_img">
			<input type="submit" name="add" value="Add">
		</form>
	</div>
</section>

<?php require 'require/footer.php'; ?>
