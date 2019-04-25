<?php 
	$title = "Approved Review";
	require 'require/header.php';
	require 'require/connection.php';
	require 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Reviews</h1>
	<div class="alter-link">
		<ul>
			<li>Holding and Approved Reviews</li>
		</ul>
	</div>
	<hr class="line"/>

	<div class="relative">
		<h2 class="sub-heading">Review Details</h2>
<?php
			// delete record
			if(isset($_POST['submit'])) {
				$stmt = $pdo->prepare("UPDATE review SET status=:status WHERE review_id=:review_id");

				if (isset($_POST['status'])) {
					if ($_POST['status']=="yes") 
						$hold = "yes";
					else 
						$hold = "no";
				} 

				$criteria = [
					'status' => $hold,
					'review_id' => $_GET['revId']
				];

				if($stmt->execute($criteria)) {
					header('Location:review.php?msg=updated');
				}
			}
			// delete record

			// update message
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Review Altered!</p>'; 
				}
			}
		?>
	</div>

	<div>
	<pre>
		<?php
			// display all the reviews in tabular form
			$stmt = $pdo->prepare("SELECT review_id, p.name as product_name, p.product_id as product_id, c.email as cus_email, c.firstname as cus_name, review_detail, posted_date, status
				FROM review r
				JOIN product AS p
				ON p.product_id = r.product_id
				JOIN customer AS c
				ON c.customer_id = r.customer_id");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Review Id','Product Name', 'Product Id', 'Customer Email', 'Customer Name', 'Review', 'Posted Date', 'Review Visible ?','Hold']);
			foreach ($stmt as $row) {
				$row[] = '<form action="review.php?revId='.$row['review_id'].'" method="POST" style="display=flex;">
								<input type="radio" name="status" value="yes">
								<label>Yes</label>
								<input type="radio" name="status">
								<label>No</label> 
								<input type="submit" name="submit" value= "submit">
							</form>';
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
			</tbody>
		</table>
	</pre>
	</div>
</section>

<?php require 'require/footer.php'; ?>
