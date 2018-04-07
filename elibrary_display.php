<?php
	require './header.php';
	$m = new model();
	$result = $m->get_book_list();
	if ($result->num_rows > 0) {
		$count = 0;
		while($row = $result->fetch_assoc()) {
			++$count;
?>
		<table class="table table-striped">
			<tr>
				<th>Index</th>
				<th>Book Name</th>
				<th>Author</th>
				<th>Department</th>
				<th>Google Link</th>
			</tr>
			<tr>
				<td><p class="lead"><?php echo $count; ?></p></td>
				<td><p class="lead"><?php echo $row["NAME"]; ?></p></td>
				<td><p class="lead"><?php echo $row["AUTHOR"]; ?></p></td>
				<td><p class="lead"><?php echo $row["DEPARTMENT"]; ?></p></td>
				<td><p class="lead"><a class="btn btn-link" target="_blank" href="<?php echo $row["LINK"]; ?>">View PDF</a></td>
			</tr>
		</table>
	<?php
		}
	}else{
	?>
		<h1>NO BOOKS TO DISPLAY!</h1>
	<?php } ?>
	</div>

<?php require './footer.php'; ?>