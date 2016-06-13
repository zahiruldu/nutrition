<?php
require_once('functions.php');

authenticate();

$message = $form = "";

 $db= dbconnect();

if (isset($_GET['i']) && isset($_GET['s'])  && isset($_GET['p']) && !empty($_GET['i']) && !empty($_GET['s']) && !empty($_GET['p'])) {
    
    $id     = $_GET['i'];
    $salt     = $_GET['s'];
    $request_ip = $_GET['p'];

        if ($request_ip != get_ip()) {

          $message = "<div class='warning'>Your reset request was from diffrent device. Please do it from same device.</div>";

        }else {
         

          $sql = "SELECT * FROM users WHERE user_id = '$id' AND salt = '$salt'";

          $result = mysqli_query($db, $sql);

            if (mysqli_num_rows($result) == "") {

              $message = "<div class='error'>There has some problem in your verification link!</div>";

            } else{

              $form = "<form class='form-horizontal' role='form' action='' method='POST'>
                          <div class='form-group'>
                            <label class='control-label col-sm-2' for='password'>Password:</label>
                            <div class='col-sm-10'>
                              <input type='password' class='form-control' id='newpass' name='newpass' placeholder='New password'>
                            </div>
                          </div>
                          <div class='form-group'>
                            <label class='control-label col-sm-2' for='confirm'>Confirm:</label>
                            <div class='col-sm-10'>          
                              <input type='password' class='form-control' id='confirm' name='newpass2' placeholder='Confirm password'>
                            </div>
                          </div>              
                          <div class='form-group'>        
                            <div class='col-sm-offset-2 col-sm-10'>
                              <input type='submit'  name='reset' value='Submit' class='btn' style='background:#EE1A29; color:white;' />
                            </div>
                          </div>
                        </form>";

                      while ($row = mysqli_fetch_assoc($result)) {

                        $user_email = $row["email"];
                        $username = $row["name"];
                      }

            }


        }

  } else{

    $message = "<div class='info'>Check your email and click on the Reset link we sent you!</div>";

  }// getting the reset information and executing Ends here


// Processing the password reset form data
  if (isset($_POST['reset'])) {


     $email = $user_email;

     $pass1 = $_POST['newpass'];

     $pass2 = $_POST['newpass2'];

      if (empty($pass1) || empty($pass2)) {
        
        $message = "<div class='warning'>You can't keep blank any field!</div>";

      } elseif (strlen($pass1) <7) {

        $message = "<div class='warning fade-in flash'>Password can't be less than 7 characters!</div>";

      }elseif(strlen($pass1) >10){
        $message = "<div class='warning fade-in flash'>Password can't be more than 10 characters!</div>";

      } elseif (!preg_match("#[0-9]+#", $pass1)) {

        $message = "<div class='warning fade-in flash'>Password must include at least one number!</div>";

      } elseif (!preg_match("#[a-zA-Z]+#", $pass1)) {

        $message ="<div class='warning fade-in flash'>Password must include at least one letter!</div>";

      } elseif ($pass2 !== $pass1) {

        $message = "<div class='warning fade-in flash'>Confirmation password must be same !</div>";

      } elseif ($pass2 == $pass1) {

           $salting = md5($email);

           $salt2 = sha1($salting.$pass1);

           $pass = md5(sha1($salt2));

            if (empty($message)) {
              
              $sql = "UPDATE users SET password='$pass', salt='$salt2', updated_at= NOW() WHERE email='$email'";

                     $result = mysqli_query($db, $sql);

                      if (!$result) {

                        $message = "<div class='info fade-in flash'>There is some problem to create your new password! Contact admin.</div>";

                      } else {

                        send_sms_change_pass($email, $username, $request_ip);

                        $message = "<div class='success fade-in flash'>Thanks! Your new password has been successfully created.</div>";

                        header('refresh: 2; url=login.php');
                      }

              
            }

                    
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
  <div class="container">
           
          
           <h3>Reset Password</h3>


            <div class="activate-page">
              <?php echo $message; ?>
            </div>
          
            <div class="col-sm-6">
              <?php echo $form; ?>
            </div>
    
  </div>


<?php include_once('footer.php'); ?>
</div>
</body>
</html>