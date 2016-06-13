<?php
require_once('functions.php');

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
                  $gender="Male";
                  
              }else{
                  $gender="Female";
              }

              if ($body_fat=="low") {
                  $body_fat="Low";                 
              }elseif ($body_fat=="medium") {
                  $body_fat="Medium";                 
              }else{
                  $body_fat="High";                  
              }

              if ($activity_level =="level1") {
                  $activity_level="Little to no exercise";                  
              }elseif ($activity_level=="level2") {
                  $activity_level="Light exercise (1-3 days per week)";                  
              }elseif ($activity_level=="level3") {
                  $activity_level="Moderate exercise (3-5 days per week)";                  
              }elseif ($activity_level=="level4") {
                  $activity_level="Heavy exercise (6-7 days per week)";                  
              }else{
                  $activity_level="Very heavy exercise (2x per day)";                  
              }

              if ($goal=="lose") {
                  $goal="Lose weight";                  
              }elseif ($goal=="maintain") {
                  $goal="Maintain weight";                  
              }else{
                  $goal="Gain weight";                  
              }

              // Checking special consideration
              if ($add_adhd=="1") {
                  $add_adhdstatus="<div class='btn btn-info spec' >ADD/ADHD</div>";
              }else{
                  $add_adhdstatus="";
              }

              if ($adrenal_burnout=="1") {
                  $adrenal_burnoutstatus="<div  class='btn btn-info spec'>Adrenal Burnout: addison's disease</div>";
              }else{
                  $adrenal_burnoutstatus="";
              }

              if ($anemia=="1") {
                  $anemiastatus="<div class='btn btn-info spec'>Anemia</div>";
              }else{
                  $anemiastatus="";
              }

              if ($alzheimer=="1") {
                  $alzheimerstatus="<div class='btn btn-info spec'>Alzheimer's</div>";
              }else{
                  $alzheimerstatus="";
              }

              if ($arthritis=="1") {
                  $arthritisstatus="<div class='btn btn-info spec'>Arthritis: Oseo/Rheumatoid, Bone and joint pains</div>";
              }else{
                  $arthritisstatus="";
              }

              if ($autism=="1") {
                  $autismstatus="<div class='btn btn-info spec'>Autism</div>";
              }else{
                  $autismstatus="";
              }

              if ($autoimmune=="1") {
                  $autoimmunestatus="<div class='btn btn-info spec'>Autoimmune thyroiditis: Graves/Hashimoto's</div>";
              }else{
                  $autoimmunestatus="";
              }

              if ($depression=="1") {
                  $depressionstatus="<div class=' btn btn-info spec'>Depression</div>";
              }else{
                  $depressionstatus="";
              }

              if ($diabetes=="1") {
                  $diabetesstatus="<div class='btn btn-info spec'>Diabetes</div>";
              }else{
                  $diabetesstatus="";
              }

              if ($digestive_problem=="1") {
                  $digestive_problemstatus="<div class='btn btn-info spec'>Digestive problems: IBD/Celiac's/Crohn's Disease</div>";
              }else{
                  $digestive_problemstatus="";
              }

              if ($high_cholesterol=="1") {
                  $high_cholesterolstatus="<div class='btn btn-info spec'>High Cholesterol: Arteriosclerosis/Arthersclerosis</div>";
              }else{
                  $high_cholesterolstatus="";
              }

              if ($hypertension=="1") {
                  $hypertensionstatus="<div class='btn btn-info spec'>Hypertension/Hypotension</div>";
              }else{
                  $hypertensionstatus="";
              }

              if ($ibd=="1") {
                  $ibdstatus="<div class='btn btn-info spec'>IBD/Celiac's/Crohn's Disease</div>";
              }else{
                  $ibdstatus="";
              }

              if ($insomnia=="1") {
                  $insomniastatus="<div class='btn btn-info spec'>Insomnia</div>";
              }else{
                  $insomniastatus="";
              }

              if ($kidney_disorder=="1") {
                  $kidney_disorderstatus="<div class='btn btn-info spec'>Kidney Disorders</div>";
              }else{
                  $kidney_disorderstatus="";
              }

              if ($liver_disorder=="1") {
                  $liver_disorderstatus="<div class='btn btn-info spec'>Liver Disorders</div>";
              }else{
                  $liver_disorderstatus="";
              }

              if ($pcos=="1") {
                  $pcosstatus="<div class='btn btn-info spec'>Polycystic Ovary syndrome (PCOS)</div>";
              }else{
                  $pcosstatus="";
              }

              if ($pyroluria=="1") {
                  $pyroluriastatus="<div class='btn btn-info spec'>Pyroluria</div>";
              }else{
                  $pyroluriastatus="";
              }

              if ($stroke=="1") {
                  $strokestatus="<div class='btn btn-info spec'>Stroke</div>";
              }else{
                  $strokestatus="";
              }

              if ($varicose=="1") {
                  $varicosestatus="<div class='btn btn-info spec'>Varicose Veins</div>";
              }else{
                  $varicosestatus="";
              }

              if ($vegan=="1") {
                  $veganstatus="<div class='btn btn-info spec'>Vegan</div>";
              }else{
                  $veganstatus="";
              }

              if ($vegetarian=="1") {
                  $vegetarianstatus="<div class='btn btn-info spec'>Vegetarian</div>";
              }else{
                  $vegetarianstatus="";
              }

              //Eye condition
              if ($eye_condition=="cataracts") {
                  $eye_condition="Cataracts";
              }elseif ($eye_condition=="color_blindness") {
                  $eye_condition="Color Blindness";
              }elseif ($eye_condition=="dry_eye") {
                  $eye_condition="Dry Eye";
              }elseif ($eye_condition=="lazy_eye") {
                  $eye_condition="Lazy Eye";
              }elseif ($eye_condition=="macular_degeneration") {
                  $eye_condition="Macular Degeneration";
              }elseif ($eye_condition=="general") {
                  $eye_condition="General";
              }elseif ($eye_condition=="none") {
                  $eye_condition="None";
              }


              //Skin condition
              if ($skin_condition=="acne") {
                  $skin_condition= "Acne";
              }elseif ($skin_condition=="cold_sores") {
                  $skin_condition="Cold Sores";
              }elseif ($skin_condition=="dandruff") {
                  $skin_condition="Dandruff";
              }elseif ($skin_condition=="dermatitus") {
                  $skin_condition="Dermatitus";
              }elseif ($skin_condition=="hives") {
                  $skin_condition="Hives";
              }elseif ($skin_condition=="psoriasis") {
                  $skin_condition="Psoriasis";
              }elseif($skin_condition=="rosacea"){
                  $skin_condition="Rosacea";
              }elseif ($skin_condition=="general") {
                  $skin_condition="General";
              }elseif ($skin_condition=="none") {
                  $skin_condition="None";
              }

              //Food intolerance
              if ($meat_fish_poultry=="1") {
                  $meat_fish_poultrystatus="<div class='btn btn-warning spec'>Meat, fish and Poultry</div>";
              }else{
                  $meat_fish_poultrystatus="";
              }

              if ($dairy=="1") {
                  $dairystatus="<div class='btn btn-warning spec'>Dairy</div>";
              }else{
                  $dairystatus="";
              }

              if ($nuts_seeds=="1") {
                  $nuts_seedsstatus="<div class='btn btn-warning spec'>Nuts and Seeds</div>";
              }else{
                  $nuts_seedsstatus="";
              }

              if ($legumes=="1") {
                  $legumesstatus="<div class='btn btn-warning spec'>Legumes</div>";
              }else{
                  $legumesstatus="";
              }

              if ($oils=="1") {
                  $oilsstatus="<div class='btn btn-warning spec'>Oils</div>";
              }else{
                  $oilsstatus="";
              }

              if ($wholegrains=="1") {
                  $wholegrainsstatus="<div class='btn btn-warning spec'>Wholegrains</div>";
              }else{
                  $wholegrainsstatus="";
              }

              if ($fruits=="1") {
                  $fruitsstatus="<div class='btn btn-warning spec'>Fruits</div>";
              }else{
                  $fruitsstatus="";
              }

              if ($vegetables=="1") {
                  $vegetablesstatus="<div class='btn btn-warning spec'>Vegetables</div>";
              }else{
                  $vegetablesstatus="";
              }

              if ($egg=="1") {
                  $eggstatus="<div class='btn btn-warning spec'>Egg</div>";
              }else{
                  $eggstatus="";
              }

              if ($seafood=="1") {
                  $seafoodstatus="<div class='btn btn-warning spec'>Seafood</div>";
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


 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile Details | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>
<div class="container">  

    <h3 style="text-align:center;">Diet Resume <br>of<br> <?=$name; ?></h3>
    
     <div class="row">
        <div class="col-sm-3">
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Full Name:</strong></span><?=$name; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Gender:</strong></span> <?=$gender; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Age:</strong></span> <?=$age; ?> years</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Height:</strong></span> <?=$height; ?> cm</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Weight:</strong></span> <?=$weight; ?> kg</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Body Fat:</strong></span> <?=$body_fat; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Eye Condition:</strong></span> <?=$eye_condition; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Skin Condition:</strong></span> <?=$skin_condition; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">Goal:</strong></span> <?=$goal; ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">BMR Rate:</strong></span> <?=$bmr; ?></li>
            </ul>
             <div class="panel panel-default">
                 <div class="panel-heading">Activity Level</div>
                    <div class="panel-body">
                    <i style="color:green" class="fa fa-check-square"></i><?=$activity_level; ?>

                    </div>
              </div>         
             
          </div>
          <div class="col-sm-6">
              <div class="col-sm-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Diet status</div>
                        <div class="panel-body">
                        <i style="color:green" class="fa fa-check-square">Your daily intake: </i> <?=$calory_need; ?> kcl

                        </div>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Special considerations</div>
                        <div class="panel-body">
                        <?php echo $add_adhdstatus. $adrenal_burnoutstatus. $anemiastatus.$alzheimerstatus.$arthritisstatus.$autismstatus.$autoimmunestatus.$depressionstatus.$diabetesstatus.$digestive_problemstatus.$high_cholesterolstatus.$hypertensionstatus.$ibdstatus.$insomniastatus.$kidney_disorderstatus.$liver_disorderstatus.$pcosstatus.$pyroluriastatus.$strokestatus.$varicosestatus.$veganstatus.$vegetarianstatus;?>
                        

                        </div>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Food intolerance</div>
                        <div class="panel-body">
                        <?php echo $meat_fish_poultrystatus.$dairystatus.$nuts_seedsstatus.$legumesstatus.$oilsstatus.$wholegrainsstatus.$fruitsstatus.$vegetablesstatus.$eggstatus.$seafoodstatus; ?>                        

                        </div>
                  </div>
              </div>
            
          </div>
      </div> 

</div>


<?php include_once('footer.php'); ?>	
</div>

</body>
</html>