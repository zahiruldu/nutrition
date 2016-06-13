<?php

require_once('functions.php');

authenticate();
login_check();

$message = "";

//getting saved profile data show start here
if (login_check()) {
    $name = $_SESSION['name']; 
    $user_id =  $_SESSION['user_id']; 
      $db=dbconnect();
      $sql="SELECT * FROM user_profile WHERE user_id='$user_id'";
      $result= mysqli_query($db, $sql);
        if (mysqli_num_rows($result)>0) {
          
            while($row= mysqli_fetch_array($result)){
              $name= $row["user_name"];
              $gender=$row["gender"];
              $age=$row["age"];
              $height=$row["height"];
              $weight=$row["weight"];
              $bmr= $row["bmr"];
              $calory_need= $row["calory_need"];
              $calory_need= $row["calory_need"];
              $body_fat=$row["body_fat"];
              $activity_level=$row["activity_level"];
              $goal=$row["goal"];
              //Special consideration
              $add_adhd=$row["add_adhd"];
              $adrenal_burnout=$row["adrenal_burnout"];
              $anemia=$row["anemia"];
              $alzheimer=$row["alzheimer"];
              $arthritis=$row["arthritis"];
              $autism=$row["autism"];
              $autoimmune=$row["autoimmune_thyroiditis"];
              $depression=$row["depression"];
              $diabetes=$row["diabetes"];
              $digestive_problem=$row["digestive_problem"];
              $high_cholesterol=$row["high_cholesterol"];
              $hypertension=$row["hypertension"];
              $ibd=$row["ibd_celiac_crohn_disease"];
              $insomnia=$row["insomnia"];
              $kidney_disorder=$row["kidney_disorders"];
              $liver_disorder=$row["liver_disorders"];
              $pcos=$row["polycystic_ovary_syndrome"];
              $pyroluria=$row["pyroluria"];
              $stroke=$row["stroke"];
              $varicose=$row["varicose_veins"];
              $vegan=$row["vegan"];
              $vegetarian=$row["vegetarian"];
              $eye_condition=$row["eye_conditions"];
              $skin_condition=$row["skin_conditions"];
              //Food intolerance
              $meat_fish_poultry = $row["meat_fish_poultry"];
              $dairy = $row["dairy"];
              $nuts_seeds = $row["nuts_seeds"];
              $legumes = $row["legumes"];
              $oils =$row["oils"];
              $wholegrains = $row["wholegrains"];
              $fruits = $row["fruits"];
              $vegetables = $row["vegetables"];
              $egg = $row["egg"];
              $seafood = $row["seafood"];

              // Checking data value and making showable
              if ($gender=="male") {
                  $gendermale="active";
                  $gendermale1="checked";
                  $genderfemale=$genderfemale1="";
              }else{
                  $gendermale=$gendermale1="";
                  $genderfemale="active";
                  $genderfemale1="checked";
              }

              if ($body_fat=="low") {
                  $lowstatus="active";
                  $lowstatus1="checked";
                  $mediumstatus=$highstatus="";
              }elseif ($body_fat=="medium") {
                  $mediumstatus="active";
                  $mediumstatus1="checked";
                  $lowstatus=$highstatus="";
              }else{
                  $highstatus="active";
                  $highstatus1="checked";
                  $lowstatus=$mediumstatus="";
              }

              if ($activity_level =="level1") {
                  $level1status="selected";
                  $level2status=$level3status=$level4status=$level5status="";
              }elseif ($activity_level=="level2") {
                  $level2status="selected";
                  $level1status=$level3status=$level4status=$level5status="";
              }elseif ($activity_level=="level3") {
                  $level3status="selected";
                  $level1status=$level2status=$level4status=$level5status="";
              }elseif ($activity_level=="level4") {
                  $level4status="selected";
                  $level1status=$level2status=$level3status=$level5status="";
              }else{
                  $level5status="selected";
                  $level1status=$level2status=$level3status=$level4status="";
              }

              if ($goal=="lose") {
                  $losestatus="active";
                  $losestatus1="checked";
                  $maintainstatus=$gainstatus="";
              }elseif ($goal=="maintain") {
                  $maintainstatus="active";
                  $maintainstatus1="checked";
                  $losestatus=$gainstatus="";
              }else{
                  $gainstatus="active";
                  $gainstatus1="checked";
                  $losestatus=$maintainstatus="";
              }

              // Checking special consideration
              if ($add_adhd=="1") {
                  $add_adhdstatus="checked";
              }else{
                  $add_adhdstatus="";
              }

              if ($adrenal_burnout=="1") {
                  $adrenal_burnoutstatus="checked";
              }else{
                  $adrenal_burnoutstatus="";
              }

              if ($anemia=="1") {
                  $anemiastatus="checked";
              }else{
                  $anemiastatus="";
              }

              if ($alzheimer=="1") {
                  $alzheimerstatus="checked";
              }else{
                  $alzheimerstatus="";
              }

              if ($arthritis=="1") {
                  $arthritisstatus="checked";
              }else{
                  $arthritisstatus="";
              }

              if ($autism=="1") {
                  $autismstatus="checked";
              }else{
                  $autismstatus="";
              }

              if ($autoimmune=="1") {
                  $autoimmunestatus="checked";
              }else{
                  $autoimmunestatus="";
              }

              if ($depression=="1") {
                  $depressionstatus="checked";
              }else{
                  $depressionstatus="";
              }

              if ($diabetes=="1") {
                  $diabetesstatus="checked";
              }else{
                  $diabetesstatus="";
              }

              if ($digestive_problem=="1") {
                  $digestive_problemstatus="checked";
              }else{
                  $digestive_problemstatus="";
              }

              if ($high_cholesterol=="1") {
                  $high_cholesterolstatus="checked";
              }else{
                  $high_cholesterolstatus="";
              }

              if ($hypertension=="1") {
                  $hypertensionstatus="checked";
              }else{
                  $hypertensionstatus="";
              }

              if ($ibd=="1") {
                  $ibdstatus="checked";
              }else{
                  $ibdstatus="";
              }

              if ($insomnia=="1") {
                  $insomniastatus="checked";
              }else{
                  $insomniastatus="";
              }

              if ($kidney_disorder=="1") {
                  $kidney_disorderstatus="checked";
              }else{
                  $kidney_disorderstatus="";
              }

              if ($liver_disorder=="1") {
                  $liver_disorderstatus="checked";
              }else{
                  $liver_disorderstatus="";
              }

              if ($pcos=="1") {
                  $pcosstatus="checked";
              }else{
                  $pcosstatus="";
              }

              if ($pyroluria=="1") {
                  $pyroluriastatus="checked";
              }else{
                  $pyroluriastatus="";
              }

              if ($stroke=="1") {
                  $strokestatus="checked";
              }else{
                  $strokestatus="";
              }

              if ($varicose=="1") {
                  $varicosestatus="checked";
              }else{
                  $varicosestatus="";
              }

              if ($vegan=="1") {
                  $veganstatus="checked";
              }else{
                  $veganstatus="";
              }

              if ($vegetarian=="1") {
                  $vegetarianstatus="checked";
              }else{
                  $vegetarianstatus="";
              }

              //Eye condition
              if ($eye_condition=="cataracts") {
                  $cataractsstatus="selected";
                  $color_blindnessstatus=$eye_nonestatus=$eye_generalstatus=$dry_eyestatus=$lazy_eyestatus=$macular_degenerationstatus="";
              }elseif ($eye_condition=="color_blindness") {
                  $color_blindnessstatus="selected";
                  $cataractsstatus=$eye_nonestatus=$eye_generalstatus=$dry_eyestatus=$lazy_eyestatus=$macular_degenerationstatus="";
              }elseif ($eye_condition=="dry_eye") {
                  $dry_eyestatus="selected";
                  $color_blindnessstatus=$eye_nonestatus=$eye_generalstatus=$cataractsstatus=$lazy_eyestatus=$macular_degenerationstatus="";
              }elseif ($eye_condition=="lazy_eye") {
                  $lazy_eyestatus="selected";
                  $color_blindnessstatus=$eye_nonestatus=$eye_generalstatus=$dry_eyestatus=$cataractsstatus=$macular_degenerationstatus="";
              }elseif ($eye_condition=="macular_degeneration") {
                  $macular_degenerationstatus="selected";
                  $color_blindnessstatus=$eye_nonestatus=$eye_generalstatus=$dry_eyestatus=$lazy_eyestatus=$cataractsstatus="";
              }elseif ($eye_condition=="general") {
                  $eye_generalstatus="selected";
                  $color_blindnessstatus=$eye_nonestatus=$macular_degenerationstatus=$dry_eyestatus=$lazy_eyestatus=$cataractsstatus="";
              }elseif ($eye_condition=="none") {
                  $eye_nonestatus="selected";
                  $color_blindnessstatus=$eye_generalstatus=$macular_degenerationstatus=$dry_eyestatus=$lazy_eyestatus=$cataractsstatus="";
              }


              //Skin condition
              if ($skin_condition=="acne") {
                  $acnestatus= "selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$psoriasisstatus=$rosaceastatus="";
              }elseif ($skin_condition=="cold_sores") {
                  $cold_soresstatus="selected";
                  $acnestatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$psoriasisstatus=$rosaceastatus="";
              }elseif ($skin_condition=="dandruff") {
                  $dandruffstatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$acnestatus=$dermatitusstatus=$hivesstatus=$psoriasisstatus=$rosaceastatus="";
              }elseif ($skin_condition=="dermatitus") {
                  $dermatitusstatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$acnestatus=$hivesstatus=$psoriasisstatus=$rosaceastatus="";
              }elseif ($skin_condition=="hives") {
                  $hivesstatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$acnestatus=$dandruffstatus=$psoriasisstatus=$rosaceastatus="";
              }elseif ($skin_condition=="psoriasis") {
                  $psoriasisstatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$acnestatus=$rosaceastatus="";
              }elseif($skin_condition=="rosacea"){
                  $rosaceastatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$skin_nonestatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$acnestatus=$psoriasisstatus="";
              }elseif ($skin_condition=="general") {
                  $skin_generalstatus="selected";
                  $cold_soresstatus=$rosaceastatus=$skin_nonestatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$acnestatus=$psoriasisstatus="";
              }elseif ($skin_condition=="none") {
                  $skin_nonestatus="selected";
                  $cold_soresstatus=$skin_generalstatus=$rosaceastatus=$dandruffstatus=$dermatitusstatus=$hivesstatus=$acnestatus=$psoriasisstatus="";
              }

              //Food intolerance
              if ($meat_fish_poultry=="1") {
                  $meat_fish_poultrystatus="checked";
              }else{
                  $meat_fish_poultrystatus="";
              }

              if ($dairy=="1") {
                  $dairystatus="checked";
              }else{
                  $dairystatus="";
              }

              if ($nuts_seeds=="1") {
                  $nuts_seedsstatus="checked";
              }else{
                  $nuts_seedsstatus="";
              }

              if ($legumes=="1") {
                  $legumesstatus="checked";
              }else{
                  $legumesstatus="";
              }

              if ($oils=="1") {
                  $oilsstatus="checked";
              }else{
                  $oilsstatus="";
              }

              if ($wholegrains=="1") {
                  $wholegrainsstatus="checked";
              }else{
                  $wholegrainsstatus="";
              }

              if ($fruits=="1") {
                  $fruitsstatus="checked";
              }else{
                  $fruitsstatus="";
              }

              if ($vegetables=="1") {
                  $vegetablesstatus="checked";
              }else{
                  $vegetablesstatus="";
              }

              if ($egg=="1") {
                  $eggstatus="checked";
              }else{
                  $eggstatus="";
              }

              if ($seafood=="1") {
                  $seafoodstatus="checked";
              }else{
                  $seafoodstatus="";
              }



            }
        }
  }else{
    $name ="";
    $user_id="";
  }
// Getting saved profile data show ends here


// Processing new profile data and update old data start here
  if (isset($_POST['save']) AND !empty($_POST['save'])) {

      $user_id=$user_id;
      $name = safe($_POST['name']);
      $gender =$_POST['gender'];
      $age = safe($_POST['age']);
      $height = safe($_POST['height']);
      $weight = safe($_POST['weight']);
      $body_fat =$_POST['body'];
      $activity_level =$_POST['activity_level'];
      $goal = $_POST['goal'];      

      // special considerations
      $add_adhd = $_POST['add_adhd'];
      $adrenal_burnout = $_POST['adrenal_burnout'];
      $anemia = $_POST['anemia'];
      $alzheimer = $_POST['alzheimer'];
      $arthritis = $_POST['arthritis'];
      $autism = $_POST['autism'];
      $autoimmune = $_POST['autoimmune'];
      $depression = $_POST['depression'];
      $diabetes = $_POST['diabetes'];
      $digestive_problem = $_POST['digestive_problem'];
      $high_cholesterol = $_POST['high_cholesterol'];
      $hypertension = $_POST['hypertension'];
      $ibd = $_POST['ibd'];
      $insomnia = $_POST['insomnia'];
      $kidney_disorder = $_POST['kidney_disorder'];
      $liver_disorder = $_POST['liver_disorder'];
      $pcos = $_POST['pcos'];
      $pyroluria = $_POST['pyroluria'];
      $stroke = $_POST['stroke'];
      $varicose = $_POST['varicose'];
      $vegan = $_POST['vegan'];
      $vegetarian = $_POST['vegetarian'];
      $eye_condition = $_POST['eye_condition'];
      $skin_condition = $_POST['skin_condition'];

      //Food intolerance
      $meat_fish_poultry = $_POST['meat_fish_poultry'];
      $dairy = $_POST['dairy'];
      $nuts_seeds = $_POST['nuts_seeds'];
      $legumes = $_POST['legumes'];
      $oils = $_POST['oils'];
      $wholegrains = $_POST['wholegrains'];
      $fruits = $_POST['fruits'];
      $vegetables = $_POST['vegetables'];
      $egg = $_POST['egg'];
      $seafood = $_POST['seafood'];



      // BMR Calculations
      if ($gender=="male") {
              $bmr = 88.362 + (13.397 * $weight) + (4.799 * $height) - (5.677 * $age);
                
            }elseif ($gender=="female") {
              $bmr = 447.593 + (9.247 * $weight) + (3.098 * $height) - (4.330 * $age);
                
            }
      // Calculating required calory daily
      if ($activity_level=="level1") {
                $calory_need= ($bmr * 1.2);
            }elseif($activity_level=="level2"){
              $calory_need= ($bmr * 1.375);
            }elseif ($activity_level=="level3") {
              $calory_need= ($bmr * 1.55);
            }elseif ($activity_level=="level4") {
              $calory_need = ($bmr * 1.725);
            }elseif ($activity_level=="level5") {
              $calory_need= ($bmr * 1.9);
            }

      //checking data value and making default value
      if (empty($add_adhd)) {
        $add_adhd="0";
        $add_adhdstatus="";
      }else{
        $add_adhd=$add_adhd;
        $add_adhdstatus="checked";
      }

      if (empty($adrenal_burnout)) {
        $adrenal_burnout="0";
        $adrenal_burnoutstatus="";
      }else{
        $adrenal_burnout=$adrenal_burnout;
        $adrenal_burnoutstatus="checked";
      }

      if (empty($anemia)) {
        $anemia="0";
        $anemiastatus="";
      }else{
        $anemia=$anemia;
        $anemiastatus="checked";
      }

      if (empty($alzheimer)) {
        $alzheimer="0";
        $alzheimerstatus="";
      }else{
        $alzheimer=$alzheimer;
        $alzheimerstatus="checked";
      }

      if (empty($arthritis)) {
        $arthritis="0";
        $arthritisstatus="";
      }else{
        $arthritis=$arthritis;
        $arthritisstatus="checked";
      }

      if (empty($autism)) {
        $autism="0";
        $autismstatus="";
      }else{
        $autism=$autism;
        $autismstatus="checked";
      }

      if (empty($autoimmune)) {
        $autoimmune="0";
        $autoimmunestatus="";
      }else{
        $autoimmune=$autoimmune;
        $autoimmunestatus="checked";
      }

      if (empty($depression)) {
        $depression="0";
        $depressionstatus="";
      }else{
        $depression=$depression;
        $depressionstatus="checked";
      }

      if (empty($diabetes)) {
        $diabetes="0";
        $diabetesstatus="";
      }else{
        $diabetes=$diabetes;
        $diabetesstatus="checked";
      }

      if (empty($digestive_problem)) {
        $digestive_problem="0";
        $digestive_problemstatus="";
      }else{
        $digestive_problem=$digestive_problem;
        $digestive_problemstatus="checked";
      }

      if (empty($high_cholesterol)) {
        $high_cholesterol="0";
        $high_cholesterolstatus="";
      }else{
        $high_cholesterol=$high_cholesterol;
        $high_cholesterolstatus="checked";
      }

      if (empty($hypertension)) {
        $hypertension="0";
        $hypertensionstatus="";
      }else{
        $hypertension=$hypertension;
        $hypertensionstatus="checked";
      }

      if (empty($ibd)) {
        $ibd="0";
        $ibdstatus="";
      }else{
        $ibd=$ibd;
        $ibdstatus="checked";
      }

      if (empty($insomnia)) {
        $insomnia="0";
        $insomniastatus="";
      }else{
        $insomnia=$ibd;
        $insomniastatus="checked";
      }

      if (empty($kidney_disorder)) {
        $kidney_disorder="0";
        $kidney_disorderstatus="";
      }else{
        $kidney_disorder=$kidney_disorder;
        $kidney_disorderstatus="checked";
      }

      if (empty($liver_disorder)) {
        $liver_disorder="0";
        $liver_disorderstatus="";
      }else{
        $liver_disorder=$liver_disorder;
        $liver_disorderstatus="checked";
      }

      if (empty($pcos)) {
        $pcos="0";
        $pcosstatus="";
      }else{
        $pcos=$pcos;
        $pcosstatus="checked";
      }

      if (empty($pyroluria)) {
        $pyroluria="0";
        $pyroluriastatus="";
      }else{
        $pyroluria=$pyroluria;
        $pyroluriastatus="checked";
      }

      if (empty($stroke)) {
        $stroke="0";
        $strokestatus="";
      }else{
        $stroke=$stroke;
        $strokestatus="checked";
      }

      if (empty($varicose)) {
        $varicose="0";
        $varicosestatus="";
      }else{
        $varicose=$varicose;
        $varicosestatus="checked";
      }

      if (empty($vegan)) {
        $vegan="0";
        $veganstatus="";
      }else{
        $vegan=$vegan;
        $veganstatus="checked";
      }

      if (empty($vegetarian)) {
        $vegetarian="0";
        $vegetarianstatus="";
      }else{
        $vegetarian=$vegetarian;
        $vegetarianstatus="checked";
      }

      // Checking Food intolerance and making default value
      if (empty($meat_fish_poultry)) {
        $meat_fish_poultry="0";
        $meat_fish_poultrystatus="";
      }else{
        $meat_fish_poultry=$meat_fish_poultry;
        $meat_fish_poultrystatus="checked";
      }

      if (empty($dairy)) {
        $dairy="0";
        $dairystatus="";
      }else{
        $dairy=$dairy;
        $dairystatus="checked";
      }

      if (empty($nuts_seeds)) {
        $nuts_seeds="0";
        $nuts_seedsstatus="";
      }else{
        $nuts_seeds=$nuts_seeds;
        $nuts_seedsstatus="checked";
      }

      if (empty($legumes)) {
        $legumes="0";
        $legumesstatus="";
      }else{
        $legumes=$legumes;
        $legumesstatus="checked";
      }

      if (empty($oils)) {
        $oils="0";
        $oilsstatus="";
      }else{
        $oils=$oils;
        $oilsstatus="checked";
      }

      if (empty($wholegrains)) {
        $wholegrains="0";
        $wholegrainsstatus="";
      }else{
        $wholegrains=$wholegrains;
        $wholegrainsstatus="checked";
      }

      if (empty($fruits)) {
        $fruits="0";
        $fruitsstatus="";
      }else{
        $fruits=$fruits;
        $fruitsstatus="checked";
      }

      if (empty($vegetables)) {
        $vegetables="0";
        $vegetablesstatus="";
      }else{
        $vegetables=$vegetables;
        $vegetablesstatus="checked";
      }

      if (empty($egg)) {
        $egg="0";
        $eggstatus="";
      }else{
        $egg=$egg;
        $eggstatus="checked";
      }

      if (empty($seafood)) {
        $seafood="0";
        $seafoodstatus="";
      }else{
        $seafood=$seafood;
        $seafoodstatus="checked";
      }

      // inserting data into databse
      if (!empty($name)) {
              $db= dbconnect();
              $sql4="SELECT * FROM user_profile WHERE user_id='$user_id'";
              $result4= mysqli_query($db, $sql4);
              if (mysqli_num_rows($result4)>0) {
                  $sql3="UPDATE user_profile SET user_name='$name', gender='$gender', age='$age', height='$height', weight='$weight', bmr='$bmr', body_fat='$body_fat', activity_level='$activity_level', goal='$goal', add_adhd='$add_adhd', adrenal_burnout='$adrenal_burnout', anemia='$anemia', alzheimer='$alzheimer', arthritis='$arthritis', autism='$autism', autoimmune_thyroiditis='$autoimmune', depression='$depression', diabetes='$diabetes', digestive_problem='$digestive_problem', high_cholesterol='$high_cholesterol', hypertension='$hypertension', ibd_celiac_crohn_disease='$ibd',
                           insomnia='$insomnia', kidney_disorders='$kidney_disorder', liver_disorders='$liver_disorder', polycystic_ovary_syndrome='$pcos', pyroluria='$pyroluria', stroke='$stroke', varicose_veins='$varicose', vegan='$vegan', vegetarian='$vegetarian', eye_conditions='$eye_condition', skin_conditions='$skin_condition', meat_fish_poultry='$meat_fish_poultry', dairy='$dairy', nuts_seeds='$nuts_seeds', legumes='$legumes', oils='$oils', wholegrains='$wholegrains', fruits='$fruits', vegetables='$vegetables', egg='$egg', seafood='$seafood' WHERE user_id='$user_id' ";
                    $result3=mysqli_query($db, $sql3);
                      if ($result3) {
                          $message= "<span class=' alert alert-success fade-in flash'>You have successfully updated your profile!</span>";
                          header('refresh: 5; url=profile.php');
                      }else{
                        $message="<span class='alert alert-danger fade-in flash'>Your given value is incorrect! </span>";
                      }
              }else{
                  $sql2 ="INSERT INTO user_profile 
                                  (user_id, user_name, gender, age, height, weight, bmr, calory_need, body_fat, activity_level, goal, add_adhd, adrenal_burnout,anemia,alzheimer,arthritis,autism,autoimmune_thyroiditis,depression,diabetes,digestive_problem, high_cholesterol,hypertension,ibd_celiac_crohn_disease,insomnia,kidney_disorders,liver_disorders,polycystic_ovary_syndrome,pyroluria,stroke,varicose_veins,vegan,vegetarian,eye_conditions,skin_conditions,meat_fish_poultry,dairy,nuts_seeds,legumes,oils,wholegrains,fruits,vegetables,egg,seafood) 
                            VALUES('$user_id','$name','$gender','$age','$height','$weight','$bmr', '$calory_need', '$body_fat','$activity_level','$goal','$add_adhd','$adrenal_burnout','$anemia','$alzheimer','$arthritis','$autism','$autoimmune','$depression','$diabetes','$digestive_problem','$high_cholesterol','$hypertension','$ibd','$insomnia','$kidney_disorder','$liver_disorder','$pcos','$pyroluria','$stroke','$varicose','$vegan','$vegetarian','$eye_condition','$skin_condition','$meat_fish_poultry','$dairy','$nuts_seeds','$legumes','$oils','$wholegrains','$fruits','$vegetables','$egg','$seafood')";
                  $result2= mysqli_query($db, $sql2);
                      if ($result2) {
                        $message= "<span class='alert alert-success fade-in flash'>You have successfully created your profile!</span>";
                        header('refresh: 1; url=profile.php');
                      }else{
                        $message="<span class='alert alert-danger fade-in flash'>Your given value is incorrect! </span>";
                      }


              }              
              
          
          }      
      

      
      
  } // If Post ends here

 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>
<div class="container">
    <div style="text-align:center;"><?php echo $message; ?></div>
    
  <h2>Your Diet Profile</h2>
  
  <form class="form-horizontal" role="form" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" >Name:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $name; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Gender:</label>
      <div class="col-sm-10">          
        <div id="c321_units" class="btn-group"  data-toggle="buttons">
          <label class="btn btn-default <?php echo $gendermale; ?> " for="c321_units-0">
          <input  type="radio" value="male" name="gender" <?php echo $gendermale1; ?> >
          Male
          </label>
          <label class="btn btn-default <?php echo $genderfemale; ?>" for="c321_units-1">
          <input  type="radio" value="female" name="gender" <?php echo $genderfemale1; ?> >
          Female
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Age:</label>
      <div class="col-sm-2">
        <input type="number" class="form-control" name="age" placeholder="Years" value="<?php echo $age; ?>">
      </div>      
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Height:</label>
      <div class="col-sm-2">
        <input type="text" required class="form-control" name="height" placeholder="cm" value="<?php echo $height; ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Weight:</label>
      <div class="col-sm-2">
        <input type="text" required class="form-control" name="weight" placeholder="kg" value="<?php echo $weight; ?>">
      </div>
      <div class="col-sm-4">
          <?php 
            if ($bmr!="") {
                
                echo "<span class='btn btn-warning '>Your BMR Rate: ". $bmr."</span>";
            }

          ?>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="body-radio">Body Fat:</label>
        <div class="col-sm-3" data-editors="body">
          <div id="c321_goal" class="btn-group"  data-toggle="buttons">
            <label class="btn btn-default <?php echo $lowstatus; ?>" >
            <input  type="radio" value="low" name="body" <?php echo $lowstatus1; ?> >
            Low
            </label>
            <label class="btn btn-default <?php echo $mediumstatus; ?>" >
            <input type="radio" value="medium" name="body" <?php echo $mediumstatus1; ?> >
            Medium
            </label>
            <label class="btn btn-default <?php echo $highstatus; ?>" >
            <input type="radio" value="high" name="body" <?php echo $highstatus1; ?> >
            High
            </label>
            <p style="color:#A9A8A9;"><14% &nbsp; &nbsp; 14%-22%  &nbsp; &nbsp; >22% </p>
          </div>
        </div>
        <div class="col-sm-4">
          <p>Examples: <a href="http://www.builtlean.com/wp-content/uploads/2012/09/body-fat-percentage-men.jpg" target="_blank">Men</a> | <a href="http://www.builtlean.com/wp-content/uploads/2012/09/body-fat-percentage-women.jpg" target="_blank">Women</a></p>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Activity level:</label>
      <div class="col-sm-4">
        <select name="activity_level">
              <option value="level1" <?php echo $level1status; ?> >Little to no exercise</option>
              <option value="level2" <?php echo $level2status; ?> >Light exercise (1 - 3 days per week)</option>
              <option value="level3" <?php echo $level3status; ?> >Moderate exercise (3 - 5 days per week)</option>
              <option value="level4" <?php echo $level4status; ?> >Heavy exercise (6 -7 days per week)</option>
              <option value="level5" <?php echo $level5status; ?> >Very heavy exercise (2x per day)</option>
            </select>
      </div>
      <div class="col-sm-4">
            <?php 
            if ($calory_need!="") {
                echo "<span class='btn btn-info '>Daily needed: ".$calory_need . " KiloCalories</span>";
                echo "<br>";
                echo "<span><a href='pro_detail.php'>View Profile Details</a></span>";
            }

            ?>
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label" for="goal-radio">Goal:</label>
        <div id="goal-radio" class="col-sm-10" data-editors="goal">
          <div id="c321_goal" class="btn-group" data-toggle="buttons">
            <label class="btn btn-default <?php echo $losestatus; ?>" >
            <input  type="radio" value="lose" name="goal" <?php echo $losestatus1; ?>>
            Lose weight
            </label>
            <label class="btn btn-default <?php echo $maintainstatus; ?>" >
            <input  type="radio" value="maintain" name="goal" <?php echo $maintainstatus1; ?>>
            Maintain weight
            </label>
            <label class="btn btn-default <?php echo $gainstatus; ?>" >
            <input  type="radio" value="gain" name="goal" <?php echo $gainstatus1; ?>>
            Gain weight
            </label>
          </div>
        </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Special considerations:</label>
      <div class="col-sm-10">
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $add_adhdstatus; ?> name="add_adhd" value="1">ADD/ADHD
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $adrenal_burnoutstatus; ?> name="adrenal_burnout" value="1">Adrenal Burnout: addison's disease
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $anemiastatus; ?> name="anemia" value="1">Anemia
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $alzheimerstatus; ?> name="alzheimer" value="1">Alzheimer's
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $arthritisstatus; ?> name="arthritis" value="1">Arthritis: Oseo/Rheumatoid, Bone and joint pains
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $autismstatus; ?> name="autism" value="1">Autism
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $autoimmunestatus; ?> name="autoimmune" value="1">Autoimmune thyroiditis: Graves/Hashimoto's
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $depressionstatus; ?> name="depression" value="1">Depression
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $diabetesstatus; ?> name="diabetes" value="1">Diabetes
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $digestive_problemstatus; ?> name="digestive_problem" value="1">Digestive problems: IBD/Celiac's/Crohn's Disease
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $high_cholesterolstatus; ?> name="high_cholesterol" value="1">High Cholesterol: Arteriosclerosis/Arthersclerosis
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $hypertensionstatus; ?> name="hypertension" value="1">Hypertension/Hypotension
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $ibdstatus; ?> name="ibd" value="1">IBD/Celiac's/Crohn's Disease
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $insomniastatus; ?> name="insomnia" value="1">Insomnia
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $kidney_disorderstatus; ?> name="kidney_disorder" value="1">Kidney Disorders 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $liver_disorderstatus; ?> name="liver_disorder" value="1">Liver Disorders 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $pcosstatus; ?> name="pcos" value="1">Polycystic Ovary syndrome (PCOS) 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $pyroluriastatus; ?> name="pyroluria" value="1">Pyroluria 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $strokestatus; ?> name="stroke" value="1">Stroke 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $varicosestatus; ?> name="varicose" value="1">Varicose Veins 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $veganstatus; ?> name="vegan" value="1">Vegan 
          </label>
        </div>
        <div class="checkbox">
          <label class="checkbox-inline">
            <input type="checkbox" <?php echo $vegetarianstatus; ?> name="vegetarian" value="1">Vegetarian 
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Eye Conditions:</label>
      <div class="col-sm-10">
        <select name="eye_condition">
              <option value="none" <?php echo $eye_nonestatus; ?> >None</option>
              <option value="general" <?php echo $eye_generalstatus; ?> >General</option>
              <option value="cataracts" <?php echo $cataractsstatus; ?> >Cataracts</option>
              <option value="color_blindness" <?php echo $color_blindnessstatus; ?> >Color Blindness</option>
              <option value="dry_eye" <?php echo $dry_eyestatus; ?> >Dry eye</option>
              <option value="lazy_eye" <?php echo $lazy_eyestatus; ?> >Lazy eye</option>
              <option value="macular_degeneration" <?php echo $macular_degenerationstatus; ?> >Macular degeneration</option>              
            </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" >Skin Conditions:</label>
      <div class="col-sm-10">
        <select name="skin_condition">
              <option value="none" <?php echo $skin_nonestatus; ?>>None</option>
              <option value="general" <?php echo $skin_generalstatus; ?>>General</option>
              <option value="acne" <?php echo $acnestatus; ?> >Acne</option>
              <option value="cold_sores" <?php echo $cold_soresstatus; ?> >Cold sores</option>
              <option value="dandruff" <?php echo $dandruffstatus; ?> >Dandruff</option>
              <option value="dermatitus" <?php echo $dermatitusstatus; ?> >Dermatitus</option>
              <option value="hives" <?php echo $hivesstatus; ?> >Hives</option>
              <option value="psoriasis" <?php echo $psoriasisstatus; ?> >Psoriasis</option>
              <option value="rosacea" <?php echo $rosaceastatus; ?> >Rosacea</option>
            </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Food intolerance:</label>
      <div class="col-sm-10">
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $meat_fish_poultrystatus; ?> name="meat_fish_poultry" value="1">Meat, fish and Poultry 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $dairystatus; ?> name="dairy" value="1">Dairy 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $nuts_seedsstatus; ?> name="nuts_seeds" value="1">Nuts and Seeds 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $legumesstatus; ?> name="legumes" value="1">Legumes 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $oilsstatus; ?> name="oils" value="1">Oils 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $wholegrainsstatus; ?> name="wholegrains" value="1">Wholegrains 
              </label>
        </div>
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $fruitsstatus; ?> name="fruits" value="1">Fruits 
              </label>
        </div><!--
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php// echo $vegetablesstatus; ?> name="vegetables" value="1">Vegetables  
              </label>
        </div> -->
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $eggstatus; ?> name="egg" value="1">Egg  
              </label>
        </div> 
        <div class='checkbox'>
              <label class="checkbox-inline">
                  <input type="checkbox" <?php echo $seafoodstatus; ?> name="seafood" value="1">Seafood  
              </label>
        </div>    
        
      </div>
    </div>    
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary" name="save" value="Save">
      </div>
    </div>
  </form>
</div>



<?php include_once('footer.php'); ?>	
</div>

</body>
</html>