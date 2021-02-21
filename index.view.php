<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
	<title>Pagination</title>
</head>
<body>
	<div class="container">
		<h1>Articles</h1>
		<section class="articles">
			<ul>
				<!-- 1ST: USING A FOREACH CICLE, LETS TO SHOW ELEMENTS FROM DB-->
				<?php foreach ($articles as $article): ?>
					<li> <?php echo $article['id'] . '.- ' . $article['article'] ?></li>
				<?php endforeach; ?>
			</ul>
		</section>
		<div class="pagination">
			<ul>
				<!-- 2ND: PRECEDING BUTTON DEACTIVATED -->
				<?php if ($page == 1): ?>
					<li class="disabled"><a href="">&laquo;</a></li>
					<?php else: ?>
					<li><a href="?page=<?php echo $page - 1 ?>">&laquo;</a></li>
				<?php endif; ?>

				<!-- 3RD: HOW TO SHOW THE ACTIVE AND REST BUTTONS. -->
				<?php for ($i = 1; $i <= $articlesQuantity ; $i++) { 
					if ($page === $i) {
						echo "<li class='active'><a href='?page=$i'>$i</a></li>";
					}else{
						echo "<li><a href='?page=$i'>$i</a></li>";
					}
				} ?>

				<!-- 4TH: FOLLOWING BUTTON DEACTIVATED-->
				<?php if ($page == $articlesQuantity): ?>
					<li class="disabled fixed"><a href="">&raquo;</a></li>
					<?php else: ?>
					<li><a href="?page=<?php echo $page + 1 ?>">&raquo;</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</body>
</html>