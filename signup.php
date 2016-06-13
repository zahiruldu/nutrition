<?php
require_once('functions.php');


$message= $usernameError= $emailError= $passwordError=$password2Error="";

 $db= dbconnect();

if(isset($_POST['signup'])){

  $username = safe($_POST['name']);  
  $email = safe($_POST['email']);
  $password = $_POST['pass'];
  $password2= $_POST['pass2'];
  $reg_ip= get_ip();
  

    
// Email authentication
    if (empty($email)) {
      $emailError = "* Email field can't be blank!";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "* Error in your Email format!";
    } else{
          

                     $sql = "SELECT email FROM users WHERE email='$email'";

                     $result = mysqli_query($db, $sql);

                     if (mysqli_num_rows($result) != 0) {
                            
                            $emailError = "* The Email address already exists!";
                     } else {

                            $email = $email;
                     }

                     
    }



// password authentication
    if (empty($password)) {

      $passwordError = "* Password can't be blank!";

    } elseif (strlen($password) <7) {

      $passwordError = "* Password can't be less than 7 characters!";

    }elseif(strlen($password) >10){
      $passwordError = "* Password can't be more than 10 characters!";

    }elseif (!preg_match("#[0-9]+#", $password)) {

      $passwordError = "* Password must include at least one number!";

    } elseif (!preg_match("#[a-zA-Z]+#", $password)) {

      $passwordError = "* Password must include at least one letter!";
    } else{

     	$password= $password;
    }



//Confirmation password authentication
		if (empty($password2)) {

			$password2Error = "* Please enter confirmation password same!";

		} elseif ($password2 !== $password) {

			$password2Error = "* Confirmation password must be same !";

		} elseif ($password2 == $password) {

					 $salting = md5($email);

			         $salt = sha1($salting.$password);

			         $pass = md5(sha1($salt));
		}
//Name authentication

//Last Name authentication
    if (empty($username)) {

      $usernameError = "* Please write a username!";
    } else{

      $sql2 = "SELECT name FROM users WHERE name='$username'";

                     $result = mysqli_query($db, $sql);

                     if (mysqli_num_rows($result) != 0) {
                            
                            $usernameError = "* Username already exists!";
                     } else {

                            $username = $username;
                     }


    }


// all error checking and inserting into database
      if (empty($emailError) && empty($usernameError) && empty($passwordError) && empty($password2Error)) {

        $sql2 = "INSERT INTO users (name, email, password, salt, reg_ip, created_at) 
                    VALUES('$username', '$email', '$pass', '$salt', '$reg_ip', NOW())";
          if(mysqli_query($db, $sql2)){

            $id = mysqli_insert_id($db);

            $try=send_mail_confirm ($email, $username, $id, $salt);
            if (!$try) {
            	mail_with_php($email, $username, $id, $salt);
            }

            $message= "<div class='btn btn-success fade-in flash'>Hi $username, You have registered successfully!</div>";
          }

        
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
<div class="container-fluid">

<?php include_once('topmenu.php'); ?> 
	<div class="container-fluid"  id="register-form">
		<div class="container">

					<div style="text-align:center;"><?=$message; ?></div>
					<h2>Join for Diet Planner</h2>
					
				<form class="form-horizontal" role="form" method="post" action="">
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="email">Username:</label>
				      <div class="col-sm-10">
				        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?=$username;?>">
				        <span id="error"><?php  echo $usernameError;?> </span>
				      </div>
				    </div>
				     <div class="form-group">
				      <label class="control-label col-sm-2" for="email">Email:</label>
				      <div class="col-sm-10">
				        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?=$email;?>">
				        <span id="error"><?php  echo $emailError;?> </span>
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="pwd">Password:</label>
				      <div class="col-sm-10">          
				        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter password">
				        <span id="error"><?php  echo $passwordError;?> </span>
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-sm-2" for="pwd">Confirm:</label>
				      <div class="col-sm-10">          
				        <input type="password" class="form-control" id="pwd" name="pass2" placeholder="Confirm password">
				        <span id="error"><?php  echo $password2Error;?> </span>
				      </div>
				    </div>				    
				    <div class="form-group">        
				      <div class="col-sm-offset-2 col-sm-10">
				        <button type="submit" name="signup" class="btn btn-default">Signup</button>
				      </div>
				    </div>
	
  		  		</form>
		</div>
	</div>

<?php include_once('footer.php'); ?>

</div>
</body>
</html>