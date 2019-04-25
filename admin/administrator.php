<?php 
	$title = "Administrator";
	require 'require/header.php';
	require 'require/connection.php';
	include 'require/table_generator.php';
?>

<section class="section">
	<h1 class="heading">Administrator</h1>
	
	<div class="alter-link">
		<!-- sub functionalities for admin -->
		<ul>
			<li><a href="administrator.php">Admiminstrator Details</a></li>
			<li><a href="add_admin.php">Add Admin</a></li>
			<li>Edit Admin</li>
		</ul>
	</div>
	<hr class="line"/>

	<div class="relative">
		<h2 class="sub-heading">Administrator Details</h2>
		<?php 
			// delete record
			if (isset($_GET['del'])) {
				$stmt = $pdo->prepare("DELETE FROM admin WHERE admin_id = :admin_id");
				$criteria = [
					'admin_id' => $_GET['del']
				];
				if ($stmt->execute($criteria)) 
					echo '<p class="delete">Account Deleted Successfully</p>'; 
			}
			// delete record

			// update message
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "updated") {
						echo '<p class="update">Account updated Successfully</p>'; 
				}	
			}	
		?>
	</div>

	<div>
	<pre>
		<?php
			// display admin information in tabular form
			$stmt = $pdo->prepare("SELECT admin_id, username, email, added_date FROM admin");
			$stmt->execute();

			$displayTable = new TableGenerator();
			$displayTable->setHeadings(['Admin Id','Username', 'Email', 'Added Date', 'Edit', 'Delete']);
			foreach ($stmt as $row) {
				$row[] = '<a href="edit_admin.php?editId='. $row['admin_id'] . '">edit</a>';
				$row[] = '<a href="#" onClick="javascript:
												if(confirm(\'Are you sure you want to delete this account?\')) {
													document.location=\'administrator.php?del=' . $row['admin_id'] . '\';
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
