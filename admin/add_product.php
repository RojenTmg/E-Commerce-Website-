<?php 
	$title = "Add Product";
	require 'require/header.php';
?>

<?php
	include_once 'require/connection.php';
	
	$category = $pdo->prepare("SELECT category_id, name FROM category");
	$category->execute();
	
	if (isset($_POST['add'])) {
		extract($_POST);
		extract($_FILES);

		// checks if input are empty or not
		if (empty($name) || empty($price) || empty($manufacturer_id) || empty($brand) || empty($description)) {
			header("Location: add_product.php?msg=empty");
		} 
		else {
			$sql = "INSERT INTO product(name, price, manufacturer_id, brand, description, featured, added_date, admin_id, product_img, category_id)
			 		VALUES(:name, :price, :manufacturer_id, :brand, :description, :featured, :added_date, :admin_id, :product_img, :category_id)";
			$stmt = $pdo->prepare($sql);

				// uploading images
				$imgName = $_FILES['product_img']['name'];
				$tempPath = $_FILES['product_img']['tmp_name'];
				$finalPath = 'images/' . $imgName;
				move_uploaded_file($tempPath, $finalPath);

				$_POST['product_img'] = $finalPath;
				$_POST['added_date'] = date('Y/m/d');

			$criteria = [
				'name' => $_POST['name'],
				'price' => $_POST['price'],
				'manufacturer_id' => $_POST['manufacturer_id'],
				'brand' => $_POST['brand'],
				'description' => $_POST['description'],
				'featured' => $_POST['featured'],
				'added_date' => $_POST['added_date'],
				'admin_id' => $_SESSION['adminId'],
				'product_img' => $_POST['product_img'],
				'category_id' => $_POST['category_id']
			];

			if($stmt->execute($criteria)) {

				//https://www.youtube.com/watch?v=U13smZvdArI
				// require 'PHPMailer/PHPMailerAutoLoad.php';
				// $stmt = $pdo->prepare("SELECT email FROM customer");
				// $stmt->execute();

				// $stmt = $pdo->prepare("SELECT email, password FROM admin WHERE admin_id=:admin_id");
				// $criteria = [
				// 	'admin_id' => $_SESSION['adminId']
				// ];
				// $stmt->execute($criteria);
				// $admin = $stmt->fetch();

				// $email = new PHPMailer();
				// $email->isSMTP();
				// $email->SMTPAuth = true;
				// $email->SMTPSecure = 'ssl';
				// $email->Host = 'edselectronic.gmail.com';
				// $email->Port = '465';
				// $email->isHTML();
				// $email->Username = ' . $admin[\'email\'] . ';
				// $email->Password = ' . $admin[\'password\'] . ';
				// $email->SetFrom('no-reply@eds.com');
				// $email->Subject = 'New Product added!';
				// $email->Body = 'new product';
				// foreach ($stmt as $customer) {
				// 	$email->AddAddress(' . $customer . ');
				// }

				// $email->Send();

				header("Location: add_product.php?msg=successful");
			}
		}
	} 
?>

<section class="section">
	<h1 class="heading">Products</h1>
	<div class="alter-link">
		<ul>
			<li><a href="product.php">Product Details</a></li>
			<li><a href="add_product.php">Add Product</a></li>
			<li>Edit Product</li>
		</ul>
	</div>
	<hr class="line"/>

	<h2 class="sub-heading">Add Product</h2>
	<?php 
		// notification messages
		if (isset($_GET['msg'])) {
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Please enter all fields!</P>";
			} 
			elseif ($msg == "successful") {
				echo "<p class=\"success\">Product added successfully! And notified to customers.</P>";
			}
		} 
	?>
	<div class="form">
		<form action="add_product.php" method="POST" enctype="multipart/form-data" class="customer-form">
			<label>Product Name</label>
			<input type="text" name="name">
			<label>Price</label>
			<input type="text" name="price">
			<label>Manufacture Code</label>
			<input type="text" name="manufacturer_id">
			<label>Brand Name</label>
			<input type="text" name="brand">
			<label>Description</label>
			<textarea name="description" id="desc"></textarea>
			<label>Category</label>
			<select name="category_id">
			<?php 
				foreach($category as $row) {
					echo '<option value="' . $row['category_id'] . '">' . $row['name'] . '</option>';
				}				
			?>
			</select> 
			<label>Featured ?</label>
			<input type="radio" name="featured" value="yes">
			<label id="radio">Yes</label>
			<input type="radio" name="featured" checked="checked" value="no">
			<label id="radio">No</label> 
			<label>Choose Image</label>
			<input type="file" name="product_img">
			<input type="submit" name="add" value="Save">
		</form>
	</div>
</section>

<?php require 'require/footer.php'; ?>
