<!DOCTYPE html>
<html>
	<head>
		<title>Excel2DB</title>
	</head>
	<body>
		<form action="<?php echo site_url('Import/insert') ?>" enctype="multipart/form-data" method="POST">
			<input type="file" name="file" required>
			<input type="submit" name="submit" value="Import">
			<br><br>
			<button><a href="<?php echo site_url('Show') ?>">Show Data</a></button>
		</form>
	</body>
</html>