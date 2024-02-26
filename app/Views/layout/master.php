<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<?= $this->include("layout/link"); ?>
</head>
<body>
	<?= $this->include("layout/nav"); ?>
	<?= $this->renderSection("content"); ?>
	<?= $this->include("layout/script"); ?>

</body>
</html>