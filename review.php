<?php 
	$title = "Product";
	require 'require/header.php';
	require 'admin/require/connection.php';

	// if SESSION is not set, redirect to login page
	if (!isset($_SESSION['cusId'])) {
		$disp = $_GET['disp'];
		header("Location: login.php?disp=$disp");
	} 
?>

<?php
	if (isset($_POST['post'])) {
		extract($_POST);

		// checks if input are empty or not
		if (empty($review_detail)) {
			header("Location: review.php?msg=empty");
		} 
		else {
			// insert reviw details into database
			$sql = "INSERT INTO review(review_detail, rating, posted_date, product_id, customer_id)
			 		VALUES(:review_detail, :rating, :posted_date, :product_id, :customer_id)";
			$stmt = $pdo->prepare($sql);
			$_POST['posted_date'] = date('Y/m/d');

			// if rating is set run this code
			if (!empty($_POST['rating'])) {
				$criteria = [
					'review_detail' => $_POST['review_detail'],
					'rating' => $_POST['rating'],
					'posted_date' => $_POST['posted_date'],
					'product_id' => $_GET['disp'],
					'customer_id' => $_SESSION['cusId']
				];
			// if rating is not set run this code with rating of 0
			} else {
				$criteria = [
					'review_detail' => $_POST['review_detail'],
					'rating' => "0",
					'posted_date' => $_POST['posted_date'],
					'product_id' => $_GET['disp'],
					'customer_id' => $_SESSION['cusId']
				];
			}

			if($stmt->execute($criteria)) {
				header("Location: review.php?msg=successful");
			}
		}
	} 
?>
	
<?php 
	if (isset($_GET['msg'])) {
		echo '<div class="review-msg">';
			// display notification message
			extract($_GET);
			if ($msg == "empty") {
				echo "<p class=\"error\">Empty review cannot be posted! Please write something...</P>";
			} 
			elseif ($msg == "successful") {
				echo "<p class=\"success\">Submission confirmed! After approval from administration, review will appear on the website.</P>";
			}
		echo '</div>';
	} 
?>

<div class="main-container">
	<?php 
		// display related product details according the the 'display id'
		if (isset($_GET['disp'])) {
			$stmt = $pdo->prepare("SELECT * FROM product WHERE product_id=:product_id");
			$criteria = [
				'product_id' => $_GET['disp']
			];
			$stmt->execute($criteria);
			$data = $stmt->fetch();

		echo '<div class="img">';
			echo '<img src="admin/' . $data['product_img']. '">';
		echo '</div>';
		echo '<div class="details">';
			echo '<h2 style="text-align: center;">' . $data['name']. '</h2>';
			echo '<hr/>';
		echo '</div>';
	?>
		<div class="review">
			<form action="review.php?disp=<?php echo $_GET['disp']; ?>" method="POST">

				<!-- https://www.youtube.com/watch?v=NmF_00eAjD8 -->
				<div class="rating">
					<?php for($i = 5; $i > 0; $i--) {
						echo '<input type="radio" name="rating" value="'. $i . '" id="star'. $i . '">';
						echo '<label for="star'. $i . '"></label>';
					} ?>	
				</div>

				<textarea name="review_detail" placeholder="Write your review here..."></textarea>
				<input type="submit" name="post" value="Post">
				
			</form>
		</div>
	<?php } ?>
	</div>
</div>


<?php require 'require/footer.php'; ?>
