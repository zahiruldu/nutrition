<?php
require_once('functions.php');

$message = $pass2Error="";

	if (isset($_POST['change'])) {
		
		$user_id = $_SESSION['user_id'];
		$pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
			if ($pass2 != $pass1) {
				 $pass2Error ="Confirm password must be same!";
			}else{
				$password = $pass1;
			}
		$salt = salt_key();
		$password = md5($_POST['pass'] . $salt);


		$db= dbconnect();

		$sql="UPDATE users SET password ='$password' WHERE user_id='$user_id'";
		$result= mysqli_query($db, $sql);

		if ($result) {
			$message = "password change Success!";
		}else{
			$message = mysqli_error($db);
		}

		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Join</title>
	<?php include_once('headlink.php'); ?>	
</head>
<body>


<?php include_once('topmenu.php'); ?>

<div style="text-align: center;">
	<p><?=$message; ?></p>
	<p>Change password!</p>
	<form  method="post" action="" >
		
		<input type="password"  name="pass1" placeholder="New password"><br>
		<input type="password" name="pass2" placeholder="Confirm password"><?=$pass2Error; ?><br>

		<input type="submit" name="change" value="change">
	</form>
</div>

<?php include_once('footer.php'); ?>
</body>
</html>