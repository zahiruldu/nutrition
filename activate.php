<?php
require_once('functions.php');

$db= dbconnect();

authenticate();

$message = "";

if (isset($_GET['i']) && isset($_GET['s'])  && !empty($_GET['i']) && !empty($_GET['s'])) {

  $id = $_GET['i'];
  $salt = $_GET['s'];
  

      $sql = "SELECT * FROM users WHERE user_id = '$id' AND salt = '$salt'";

      $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == "") {
          
          $message = " <div class='error fade-in flash'>There has some problem in your Verification link or you are not registerd with us!</div>";

        }elseif (mysqli_num_rows($result) > 0) {

          while($row = mysqli_fetch_assoc($result)) {

            $user_id = $row["user_id"];
            $username  = $row ["name"];            
            $email    = $row["email"];
            $activate   = $row["email_activated"];

                    if ($activate > 0) {
                        
                        $message = "<div class='warning fade-in flash'>You are already activated ! </div><p class='activate-login'><a href='login.php'>Login</a></p>";

                      }  else {
                        // activating  user account
                          $sql2 = "UPDATE users SET email_activated='1', updated_at= NOW() WHERE user_id='$id' AND salt='$salt'";

                          $result2 = mysqli_query($db, $sql2);

                            if ($result2) {

                              $message = "<div class='success fade-in flash'>Congratulations ".$username."! Your email address has now been verified </div> <p ><a href='login.php' class='btn' style='background:#EE1A29; color:white;'>Login</a></p>";
                            }
                      }
                }
        }

} else{

   $message = "<div class='info'>Check your email and click on the activation link we sent you!</div>";

   //mysql_close($db);

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Nutrition Planner</title>
	<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>

<?php echo $message; ?> 


<?php include_once('footer.php'); ?>
</div>
</body>
</html>