<?php
	require './header.php';
	$m = new model();
	$result = $m->get_query_data();
?>
	<div class="container">
		<?php
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
		?>
		<div class="jumbotron">
			<h2 class="display-4"><?php echo $row["HEADING"]; ?></h2>
			<p class="lead"><?php echo $row["DESCRIPTION"]; ?></p>
			<img height="100" src="img/<?php echo $row['image'];  ?>">
			<p class="lead">published by <?php echo $row["OWNER"]. " of " .  $row["DEPARTMENT"]." department"; ?></p>

			<h4>comments:</h4>
			<?php
				$qid = $row["query_id"];
				$result2 = $m->get_comments($qid);
				if ($result2->num_rows > 0) {
				while($data = $result2->fetch_assoc()) {
			?>
			<p class="lead"><?php echo $data["CONTENT"]; ?></p>
			<?php }} ?>

			<form action="./controller.php" method="post">
			<input type="hidden" name="comment_id" value="<?php echo $row["query_id"] ?>" />
			<textarea name="comment" placeholder="write answer"></textarea>
			<input type="submit" class="btn btn-success" name="new_comment_btn"/>
			</form>
		</div>
	</div>
	<?php }
			}else{
		?>

		<h1>NO BLOGS TO DISPLAY!</h1>
		<h4>Start blogging today!</h4>
		<?php } ?>
