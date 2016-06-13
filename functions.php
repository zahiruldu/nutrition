<?php
 session_start();
 
require_once('app/config.php');



function safe($value){
	 	$check =  strip_tags($value);

   		return $check;
		}


// getting user ip address
 function get_ip (){

  $ip = $_SERVER['REMOTE_ADDR'];

  return $ip;
 }

 
//Getting user agent / Browser information
 function get_agent(){

  $agent = $_SERVER['HTTP_USER_AGENT'];

  return $agent;
 }

// getting  user id
 function get_logged_id(){
  $id= $_SESSION['user_id'];
  return $id;
 }


function login_check(){ 

  if (empty($_SESSION['user_id'])) {
    return false;
    
  }else{

    $login_id = $_SESSION['user_id'];
    $db = dbconnect();
    $sql= "SELECT * FROM users WHERE user_id ='$login_id'";
    $result = mysqli_query($db,$sql);
      if (mysqli_num_rows($result)>0) {
        
        return true;
      }else{

        session_destroy();
      }
  }
}

// logged in check
 function logged_in (){

    if (isset($_SESSION['user_id']) AND !empty($_SESSION['user_id'])) {

        return true;

    } else {

      return false;
    } 

 }

 // user authentication

 function authenticate(){

  $user_id = $name =$user_agent = $user_ip = "";

    if (isset($_SESSION['user_id'])) {

      

        if ($_SESSION['user_ip'] !== get_ip()) {
          
          session_destroy();


        } else{
          return true;
        }
    }
 }


// Getting tooltip data based on Product ID
function get_tooltip($food_id){
	$food_id=$food_id;
	$db=dbconnect();
	$sql="SELECT * FROM foods WHERE food_id='$food_id'";
	$result=mysqli_query($db, $sql);
	if ($row=mysqli_fetch_array($result)) {
		$id=$row["food_id"];
		$name=$row["food_name"];		
		$desc=$row["food_description"];
		$calories=$row["calories"];
		$protein=$row["protein"];
		$fat=$row["total_fat"];
		$carbs=$row["carbohydrates"];
		
		$tool="<div>
						<h3>$name</h3>
						<p>$desc</p>
						<strong>Carbs: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $carbs g</strong><br>
						<span>Fat: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $total_fat g </span>					
						<p>Protein: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $protein g</p>
						<p>Calories: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $calories </p>
					</div>";

		return $tool;

	}

}



function show_chart_data($carb, $fat, $protein, $chart_name){
	$carb=$carb;	
	$fat=$fat;
	$protein=$protein;
	$chart_name=$chart_name;

echo "  <script type='text/javascript'>

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Carbs', $carb],
          ['Fats', $fat],
          ['Protein', $protein]
          
        ]);

        // Set chart options
        var options = {'title':'Nutrition Percentage',
                       'width':300,
                       'height':225};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('$chart_name'));
        chart.draw(data, options);
      }
    </script>";

    echo "<div id='$chart_name'></div>";


}



// Sending registration confirmation function
  function send_mail_confirm ($email, $name, $id, $salt){

    $message = "
<html lang='en-US'>
<body style='background:#F4F4F4;'>
      <center><img style='width:150px; padding-top:5px;' src='".get_logo()."' alt='' /></center>
    <div style='margin:0px auto; width:640px; height:380px; background:#fff; border:1px solid #e7e7e7; border-radius:15px; text-align:center;'>
      <h2 style='color: #16488a;font-family: Arial,Helvetica,sans-serif;font-size: 22px;font-weight: bold;line-height: 1.4;'>Verify your email address.</h2>
      <h3 style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;font-weight:normal;'>Dear ".$name.",</h3>
      <p style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;padding: 10px 30px;'>Welcome to Nutrition Planner! You are requested to verify your email address for use</p>
      <div style='font-family:arial;font-size:8px;background:#F0F0F0;border-radius:5px;display:inline-block;color:#777777;'><h1 style='padding:0px 15px;'>Account Name: <span style='color:#256BCF;text-decoration:underline;'>".$email."</span></h1></div><br />
      <div style='font-family:arial;font-size:8px;background:#F8B028;border-radius:5px;display:inline-block;margin-top:30px;'><h1 style='padding:0px 15px;color:#256BCF;text-decoration:underline;'><a href='".get_domain()."/activate.php?i=$id&s=$salt'>Verify this email</a>.</h1></div>
    </div>
    <div style='width: 100%; height:80px; background: none;'></div>
</body>
</html>";
        
  require ('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = get_smtp_host();  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = get_smtp_user();                 // SMTP username
      $mail->Password = get_smtp_pass();                           // SMTP password
      $mail->SMTPSecure = get_smtp_secure();                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = get_smtp_port();                                    // TCP port to connect to

      $mail->From = 'do-not-reply@Nutrition.com';
      $mail->FromName = 'Nutrition';
      $mail->addAddress($email, $name);     // Add a recipient
      //$mail->addAddress('emammahadi@gmail.com');               // Name is optional
      //$mail->addReplyTo('zahirul.arb@gmail.com', 'Test message');
      //$mail->addCC('zahir.arb@gmail.com');
      //$mail->addBCC('info@rainbowbrush.com');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Verify your Email';
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $sendmail = $mail->send();

      return $sendmail;

      
 } //Sending registration confirmation function  ends



  // Sending registration confirmation function
  function resetpass($email, $name, $id, $salt, $request_ip){

    $message = "
<html lang='en-US'>
<body style='background:#F4F4F4;'>
      <center><img style='width:150px; padding-top:5px;' src='".get_logo()."' alt='' /></center>
    <div style='margin:0px auto; width:640px; height:380px; background:#fff; border:1px solid #e7e7e7; border-radius:15px; text-align:center;'>
      <h2 style='color: #16488a;font-family: Arial,Helvetica,sans-serif;font-size: 22px;font-weight: bold;line-height: 1.4;'>Reset Password.</h2>
      <h3 style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;font-weight:normal;'>Dear ".$name.",</h3>
      <p style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;padding: 10px 30px;'>Thank you for requesting to reset your password! Please click on the reset link bellow to setup a new password.</p>
      <div style='font-family:arial;font-size:8px;background:#F0F0F0;border-radius:5px;display:inline-block;color:#777777;'><h1 style='padding:0px 15px;'>Account Name: <span style='color:#256BCF;text-decoration:underline;'>".$email."</span></h1></div><br />
      <div style='font-family:arial;font-size:8px;background:#F8B028;border-radius:5px;display:inline-block;margin-top:30px;'><h1 style='padding:0px 15px;color:#256BCF;text-decoration:underline;'><a href='".get_domain()."/reset.php?i=$id&p=$request_ip&s=$salt'>Reset Password</a>.</h1></div>
    </div>
    <div style='width: 100%; height:80px; background: none;'></div>
</body>
</html>";
        
  require ('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = get_smtp_host();  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = get_smtp_user();                 // SMTP username
      $mail->Password = get_smtp_pass();                           // SMTP password
      $mail->SMTPSecure = get_smtp_secure();                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = get_smtp_port();                                    // TCP port to connect to

      $mail->From = 'do-not-reply@Nutrition.com';
      $mail->FromName = 'Nutrition';
      $mail->addAddress($email, $name);     // Add a recipient
      //$mail->addAddress('emammahadi@gmail.com');               // Name is optional
      //$mail->addReplyTo('zahirul.arb@gmail.com', 'Test message');
      //$mail->addCC('zahir.arb@gmail.com');
      //$mail->addBCC('info@rainbowbrush.com');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Reset Password';
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $sendmail = $mail->send();

      return $sendmail;

      
 } //Sending password reset function  ends



  // send message on password change
  function send_sms_change_pass($email, $name, $request_ip){

    $message = "
<html lang='en-US'>
<body style='background:#F4F4F4;'>
      <center><img style='width:150px; padding-top:5px;' src='".get_logo()."' alt='' /></center>
    <div style='margin:0px auto; width:640px; height:380px; background:#fff; border:1px solid #e7e7e7; border-radius:15px; text-align:center;'>
      <h2 style='color: #16488a;font-family: Arial,Helvetica,sans-serif;font-size: 22px;font-weight: bold;line-height: 1.4;'> Confirmation of Password Change.</h2>
      <h3 style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;font-weight:normal;'>Dear ".$name.",</h3>
      <p style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;padding: 10px 30px;'>You have successfully changed your password!</p>
      <div style='font-family:arial;font-size:8px;background:#F0F0F0;border-radius:5px;display:inline-block;color:#777777;'><h1 style='padding:0px 15px;'> For Account: <span style='color:#256BCF;text-decoration:underline;'>".$email."</span></h1></div><br /><br>
      <div style='font-family:arial;font-size:8px;background:#F0F0F0;border-radius:5px;display:inline-block;color:#777777;'><h1 style='padding:0px 15px;'> From IP Address: <span style='color:#256BCF;text-decoration:none;'>".$request_ip."</span></h1></div>
    </div>
    <div style='width: 100%; height:80px; background: none;'></div>
</body>
</html>";
        
  require ('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

      $mail = new PHPMailer;

      //$mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = get_smtp_host();  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = get_smtp_user();                 // SMTP username
      $mail->Password = get_smtp_pass();                           // SMTP password
      $mail->SMTPSecure = get_smtp_secure();                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = get_smtp_port();                                    // TCP port to connect to

      $mail->From = 'do-not-reply@Nutrition.com';
      $mail->FromName = 'Nutrition';
      $mail->addAddress($email, $name);     // Add a recipient
      //$mail->addAddress('emammahadi@gmail.com');               // Name is optional
      //$mail->addReplyTo('zahirul.arb@gmail.com', 'Test message');
      //$mail->addCC('zahir.arb@gmail.com');
      //$mail->addBCC('info@rainbowbrush.com');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Password Confirmation';
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $sendmail = $mail->send();

      return $sendmail;

      
 } //Sending password reset function  ends

 function mail_with_php($email, $username, $id, $salt){

        // multiple recipients
      $to  = $email; // note the comma
      //$to .= 'wez@example.com';

      // subject
      $subject = 'Verify Your Email';

      // message
        $message = "
          <html lang='en-US'>
          <body style='background:#F4F4F4;'>
                <center><img style='width:150px; padding-top:5px;' src='".get_logo()."' alt='' /></center>
              <div style='margin:0px auto; width:640px; height:380px; background:#fff; border:1px solid #e7e7e7; border-radius:15px; text-align:center;'>
                <h2 style='color: #16488a;font-family: Arial,Helvetica,sans-serif;font-size: 22px;font-weight: bold;line-height: 1.4;'>Verify your email address.</h2>
                <h3 style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;font-weight:normal;'>Dear ".$name.",</h3>
                <p style='color: #777777;font-family: Arial,Helvetica,sans-serif;font-size: 17px;line-height: 1.4;padding: 10px 30px;'>Welcome to Nutrition Planner! You are requested to verify your email address for use</p>
                <div style='font-family:arial;font-size:8px;background:#F0F0F0;border-radius:5px;display:inline-block;color:#777777;'><h1 style='padding:0px 15px;'>Account Name: <span style='color:#256BCF;text-decoration:underline;'>".$email."</span></h1></div><br />
                <div style='font-family:arial;font-size:8px;background:#F8B028;border-radius:5px;display:inline-block;margin-top:30px;'><h1 style='padding:0px 15px;color:#256BCF;text-decoration:underline;'><a href='".get_domain()."/activate.php?i=$id&s=$salt'>Verify this email</a>.</h1></div>
              </div>
              <div style='width: 100%; height:80px; background: none;'></div>
          </body>
          </html>";

      // To send HTML mail, the Content-type header must be set
      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      // Additional headers
      $headers .= 'To: '.$username.' <'.$email.'>' . "\r\n";
      $headers .= 'From: Admin | Nutrition Planner <do-not-reply@Nutrition.com>' . "\r\n";
      //$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
      //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

      // Mail it
      mail($to, $subject, $message, $headers);


 }


