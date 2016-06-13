<?php
require_once('functions.php');

authenticate();

  $message = "";


    if (isset($_POST['reset'])) {

        $email = safe($_POST["email"]);

          if (empty($email)) {

            $message = "<div class='warning'>Please enter Email and request for reset!</div>";

          }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $message = "<div class='error'>Error in your Email format!</div>";

          }else{

                    

                     $db= dbconnect();

                     $sql = "SELECT * FROM users WHERE email='$email'";

                     $result = mysqli_query($db, $sql);

                     if (mysqli_num_rows($result) != 1) {
                            
                            $message = "<div class='info'>We haven't find your Email in our record!</div>";

                     } elseif (mysqli_num_rows($result) !=0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                          $id  = $row["user_id"];
                          $username = $row["name"];
                          $email = $row["email"];
                          $salt = $row["salt"];
                          $activate = $row["email_activated"];
                          $request_ip = get_ip();

                          $try = resetpass($email, $username, $id, $salt, $request_ip);

                            if ($try) {

                              $message = "<div class='success'>We have sent a link to reset your password! Please check your email.</div>";

                            } else{

                                $message = "<div class='warning'>There has some problem to send you a email. Please contact to our support. </div>";

                            }


                          
                        }

                      
                     }

                     mysqli_close($db);
              }

    }





?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password | Nutrition Planner</title>
	<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>

  <div><?php echo $message; ?></div>

          
          <form class="form-inline" role="form" action="" method="POST" style="text-align:center;" >
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email address used in register">
            </div>
                       
            <input type="submit" value="Reset" name="reset" class="btn" style="background:#EE1A29; color:white;" />
          </form> 


<?php include_once('footer.php'); ?>
</div>
</body>
</html>