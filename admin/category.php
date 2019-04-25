<?php 
	$title = "Category";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
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

	<div class="relative">
		<h2 class="sub-heading">Category Details</h2>
		<?php 
			// delete record
			if (isset($_GET['del'])) {
				$stmt = $pdo->prepare("DELETE FROM category WHERE category_id = :category_id");
				$criteria = [
					'category_id' => $_GET['del']
				];
				if ($stmt->execute($criteria)) 
					echo '<p class="delete">Category Deleted Successfully</p>'; 
			}
			// delete record
			
			// update message
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Category updated Successfully</p>'; 
				}
			}
		?>
	</div>

	<div>
	<pre>
		<?php
			// display category information in tabular form
			$stmt = $pdo->prepare("SELECT category_id, name FROM category");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Category Id','Name', 'Edit', 'Delete']);
			foreach ($stmt as $row) {
				$row[] = '<a href="edit_category.php?editId='. $row['category_id'] . '">edit</a>';
				$row[] = '<a href="#" onClick="javascript: 
												if(confirm(\'Are you sure you want to delete this Category?\')) {
													document.location=\'category.php?del=' . $row['category_id'] . '\';
												}
						  ">delete</a>';
				$displayTable->addRow($row);
			}
			echo $displayTable->getHTML();
		?>
	</pre>
	</div>
	
</section>

<?php require 'require/footer.php'; ?>
