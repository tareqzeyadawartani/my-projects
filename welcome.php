<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome</title>
</head>
<body>
	<?php
	echo "welcome to our php page" . $_SESSION['username'];
	?>
</body>
</html>