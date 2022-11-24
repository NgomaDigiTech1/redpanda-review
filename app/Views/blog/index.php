<html>
	<head>
	<title><?= $page_title?></title>
	
	</head>
	<body>
		<h1><?= $page_body?></h1>

	<!--------------Template Engine------------------------>

		<h3>Subjects list</h3>
		<?php if (count($subjects) > 0): ?>
			<ul>
				<?php foreach ($subjects as $subject): ?>
					<li><?= $subject ?></li>
				<?php endforeach ?>
			</ul>

		<?php else: ?>
			<p>No data found</p>
		<?php endif ?>

	</body>
</html>
