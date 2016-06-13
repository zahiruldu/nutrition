<?php
require_once('functions.php');

$db= dbconnect();

$email = $password = $emailError = $passwordError = $logError = "";

 if (isset($_POST['login'])) {

      $email = safe($_POST['email']);
      $password = $_POST['password'];


          if (empty($email)) {

          $emailError = "* Email field can't be blank!";

          }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $emailError = "* Error in your Email format!";

          } else {

            $email = $email;
          }


// password authentication
        if (empty($password)) {

          $passwordError = "* Password can't be blank!";

        } elseif (strlen($password) > 10) {

          $passwordError = "* We think your Password is not more than 10 characters!";

        }elseif(strlen($password) < 7){

          $passwordError = "* We think your Password is not less than 7 characters!";

        }elseif (!preg_match("#[0-9]+#", $password)) {

          $passwordError = "* We think your Password has at least one number!";

        } elseif (!preg_match("#[a-zA-Z]+#", $password)) {

          $passwordError = "* We think your Password has at least one letter!";
        } else{
                         
                        $salting = md5($email);

                        $salt = sha1($salting.$password);

                        $pass = md5(sha1($salt));
               }

                  if (empty($emailError) AND empty($passwordError)) {
                    
                    

                    $sql2 = "SELECT * FROM users WHERE email='$email' AND password= '$pass'";

                    $result2 = mysqli_query ($db, $sql2);
                    	                  

                      if (mysqli_num_rows($result2) == "") {
                        
                        $logError = "<span class='error fade-in flash'>Your Email or Password is incorrect!</span>";

                      }elseif (mysqli_num_rows($result2) > 0) {
                        
                          while ($row = mysqli_fetch_array($result2)) {
                              
                              $user_id    = $row["user_id"];
                              $username   = $row["name"];                              
                              $activate   = $row["email_activated"];
                              $user_type  = $row["user_type"];

                                if ($activate>1) {

                                  $logError = "<span class='warning fade-in flash'>Your account has been suspended! Contact support for any assistance.</span>";
                                }elseif ($activate<1) {

                                  $logError = "<span class='warning fade-in flash'>You have not activated your account yet! Please verify it.</span>";
                                } else {


                                  $logError = "<span class='success fade-in flash'>Your login success!</span>";

                                 
                                  $_SESSION['user_id']   = $user_id;
                                  $_SESSION['name']      = $username;
                                  $_SESSION['user_type'] = $user_type;
                                  $_SESSION['user_ip']   = get_ip();
                                  $_SESSION['email']     = $email;                                                                  

                                  header('refresh: 2; url=profile.php');

                                }
                          }
                      }

                  }




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

<div style="text-align:center;"><?php echo $logError; ?></div>
<div class="container" id="register-form">

	<h2>Login</h2>
	  

                  <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-3">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php  echo $email;?>">
                        <span id="error"><?php  echo $emailError;?> </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="pwd">Password:</label>
                      <div class="col-sm-3">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        <span id="error"><?php  echo $passwordError;?> </span>
                         <label><a href="forgot_pass.php"> Forgot password?</a></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <input type="submit" class="btn btn" name="login" value="Login" style="background:#EE1A29; color:white;" />
                      </div>
                    </div>
                  </form>

</div>
<?php include_once('footer.php'); ?>
</div>
</body>
</html>