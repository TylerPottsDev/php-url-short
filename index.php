<?php
	include 'db.php';

	$db = new Database("localhost", "url_short", "root", "root");
	$db = $db->connect();

	$stmt = $db->query("SELECT * FROM urls");
	$urls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP URL Shortener</title>

	<link rel="stylesheet" href="main.css" />
</head>
<body>
	<header>
		<h1>Tyler's URL Shortener</h1>
	</header>
	<main>
		<section class="form">
			<form action="/add/index.php" method="post">
				<input type="text" name="long_url" id="long_url" placeholder="e.g. https://example.com" />
				<input type="submit" value="SHORTEN" />
			</form>
		</section>

		<section class="urls">
			<?php foreach ($urls as $url) : ?>
			<div class="url">
				<div class="id">
					<?= $url['ID']; ?>
				</div>
				<div class="short_url">
					<a href="http://localhost/r?c=<?= $url['ID']; ?>" target="_blank">
						http://localhost/r?c=<?= $url['ID']; ?>
					</a>
				</div>
				<div class="long_url">
					<a href="<?= $url['long_url']; ?>" target="_blank"><?= $url['long_url']; ?></a>
				</div>
			</div>
			<?php endforeach; ?>
		</section>
	</main>
</body>
</html>