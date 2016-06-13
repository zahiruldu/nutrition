<?php
require_once('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>
<div class="cotainer-fluid">
<?php
	
	if (login_check()) {
		$name = $_SESSION['name'];

		echo "Hi $name,";
	}

	
 ?>
Home Page!
<img src="img/pasta.jpg" width="100%" height="" alt="pasta"></div>




<?php include_once('footer.php'); ?>	
</div>

</body>
</html>