<?php
require_once('functions.php');

$message = "";

  if (isset($_POST['addfood']) AND !empty($_POST['addfood'])) {
    // Defining Defaul value
    $foodname=$description=$calories=$protein=$omega_fatty_acids=$monosaturated_fat=$polyunsaturated_fat=
    $cholesterol=$saturated_fat=$total_fat=$price=$per_value=$per_name=$carbohydrates=$sugars="0";
    // Getting value
      $foodname = safe($_POST['food_name']);
      $food_dsc = safe($_POST['food_dsc']);
      $food_category = safe($_POST['food_category']);
      $calories = safe($_POST['calories']);
      $protein = safe($_POST['protein']);
      $omega_fatty_acids = safe($_POST['omega_fatty_acids']);
      $monosaturated_fat = safe($_POST['monosaturated_fat']);
      $polyunsaturated_fat = safe($_POST['polyunsaturated_fat']);
      $cholesterol = safe($_POST['cholesterol']);
      $saturated_fat = safe($_POST['saturated_fat']);
      $total_fat = safe($_POST['total_fat']);
      $price = safe($_POST['price']);
      $per_value = safe($_POST['per_value']);
      $per_name = safe($_POST['per_name']);

      // Optional fields
      $carbohydrates = safe($_POST['carbohydrates']);
      $sugars = safe($_POST['sugars']);
      $fiber = safe($_POST['fiber']);
      $water = safe($_POST['water']);

      // Mineral
      $calcium = safe($_POST['calcium']);
      $copper = safe($_POST['copper']);
      $iodine = safe($_POST['iodine']);
      $iron = safe($_POST['iron']);
      $magnesium = safe($_POST['magnesium']);
      $manganese = safe($_POST['manganese']);
      $phosphorus = safe($_POST['phosphorus']);
      $potassium = safe($_POST['potassium']);
      $selenium = safe($_POST['selenium']);
      $sodium = safe($_POST['sodium']);
      $zinc = safe($_POST['zinc']);

      // Vitamins
      $choline = safe($_POST['choline']);
      $vitamin_a = safe($_POST['vitamin_a']);
      $vitamin_b1 = safe($_POST['vitamin_b1']);
      $vitamin_b2_riboflavin = safe($_POST['vitamin_b2_riboflavin']);
      $vitamin_b3 = safe($_POST['vitamin_b3']);
      $vitamin_b5_pantothenic_acid = safe($_POST['vitamin_b5_pantothenic_acid']);
      $vitamin_b6_pyridoxin = safe($_POST['vitamin_b6_pyridoxin']);
      $vitamin_b9_folate = safe($_POST['vitamin_b9_folate']);
      $vitamin_b12_cobalamin = safe($_POST['vitamin_b12_cobalamin']);
      $vitamin_c = safe($_POST['vitamin_c']);
      $vitamin_d = safe($_POST['vitamin_d']);
      $vitamin_e = safe($_POST['vitamin_e']);
      $vitamin_k = safe($_POST['vitamin_k']);

      // Inserting value to database
      $db = dbconnect();
      $sql = "INSERT INTO foods(
                    food_name,
                    food_description,
                    food_category,
                    calories,
                    protein,
                    omega_fatty_acids,
                    monosaturated_fat,
                    polyunsaturated_fat,
                    cholesterol,
                    saturated_fat,
                    total_fat, 
                    carbohydrates,
                    sugars,
                    fiber,
                    water,
                    calcium,
                    copper,
                    iodine,
                    iron,
                    magnesium,
                    manganese,
                    phosphorus,
                    potassium,
                    selenium,
                    sodium,
                    zinc,
                    choline,
                    vitamin_a_ui,
                    vitamin_b1_thiamin,
                    vitamin_b2_riboflavin,
                    vitamin_b3_niacin,
                    vitamin_b5_pantothenic_acid,
                    vitamin_b6_pyridoxin,
                    vitamin_b9_folate,
                    vitamin_b12_cobalamin,
                    vitamin_c,
                    vitamin_d,
                    vitamin_e,
                    vitamin_k,
                    created_at) 
              VALUES(
                    '$foodname',
                    '$food_dsc',
                    '$food_category',
                    '$calories',
                    '$protein',
                    '$omega_fatty_acids',
                    '$monosaturated_fat',
                    '$polyunsaturated_fat',
                    '$cholesterol',
                    '$saturated_fat',
                    '$total_fat',
                    '$carbohydrates',
                    '$sugars',
                    '$fiber',
                    '$water',
                    '$calcium',
                    '$copper',
                    '$iodine',
                    '$iron',
                    '$magnesium',
                    '$manganese',
                    '$phosphorus',
                    '$potassium',
                    '$selenium',
                    '$sodium',
                    '$zinc',
                    '$choline',
                    '$vitamin_a',
                    '$vitamin_b1',
                    '$vitamin_b2_riboflavin',
                    '$vitamin_b3',
                    '$vitamin_b5_pantothenic_acid',
                    '$vitamin_b6_pyridoxin',
                    '$vitamin_b9_folate',
                    '$vitamin_b12_cobalamin',
                    '$vitamin_c',
                    '$vitamin_d',
                    '$vitamin_e',
                    '$vitamin_k',
                      NOW())";

      if (!empty($foodname)) {
           $result= mysqli_query($db, $sql);
          if ($result) {
              $message = "<span class='alert alert-success fade-in flash'>You have added $foodname food successfully!</span>";
            }    else{
              $message = "<span class='alert alert-danger fade-in flash'>There is problem to add food". mysqli_error($db)."</span>";
            } 

      }else{
        $message= "<span class='alert alert-warning fade-in flash'>You must give a food name</span>";
      }
      // Inserting value to database ends here
      
      

      
      
  }

 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add food | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>

<div class="container">
<div style="text-align:center;"><?php echo $message; ?></div>
  <h2>Add a food item</h2>
  <form class="form-horizontal" role="form"  method="post" action="">
  		<table  id="foodform">
  			<tr>
  				<th>Food Name:</th>
  				<td><input type="text" name="food_name"  placeholder="e.g. Carrot" value=""></td>
  			</tr>
        <tr>
          <th>Food Description:</th>
          <td><input type="text" name="food_dsc"  placeholder="e.g. Short description" value="" maxlength="100"></td>
        </tr>
  			<tr>
  				<th>Food Type:</th>
  				<td>
            <select name="food_category">
            <?php 

            $db = dbconnect();
          $sql2 ="SELECT * FROM food_categories";

          $result = mysqli_query($db, $sql2);

          if ($result) {
            while ($row = mysqli_fetch_array($result)) {
              
              $cat_id = $row["category_id"];
              $cat_name = $row["category_name"];

              echo "<option value='".$cat_id."'>" .$cat_name."</option>";
            }   
            
          }
          mysqli_close($db);                

          ?>     
            </select>
          </td>
  			</tr>
  			<tr>
  				<th>Calories:</th>
  				<td><input type="text" name="calories" placeholder="e.g. 143" value="0.00">kcl</td>
  			</tr>
        <tr>
          <th>Protein:</th>
          <td><input type="text" name="protein" placeholder="e.g. 21" value="0.00">g</td>
        </tr>
        <tr>
          <th>Omega fatty acids:</th>
          <td><input type="text" name="omega_fatty_acids" placeholder="e.g. 20" value="0.00">mg</td>
        </tr>
        <tr>
          <th>Monosaturated Fat:</th>
          <td><input type="text" name="monosaturated_fat" placeholder="e.g. 2.5" value="0.00">g</td>
        </tr>
         <tr>
          <th>Polyunsaturated Fat: </th>
          <td> <input type="text" name="polyunsaturated_fat" placeholder="e.g. 0.2" value="0.00">g</td>
        </tr>
         <tr>
          <th>Cholesterol:</th>
          <td><input type="text" name="cholesterol" placeholder="e.g. 43" value="0.00">mg</td>
        </tr>
         <tr>
          <th>Saturated Fat:</th>
          <td><input type="text" name="saturated_fat" placeholder="e.g. 1.7" value="0.00">g</td>
        </tr>
        <tr>
          <th>Total Fat:</th>
          <td><input type="text" name="total_fat"  placeholder="e.g. 6" value="0.00">g</td>
        </tr>
  			<tr>
  				<th>Price(optional):</th>
  				<td><input type="text" name="price" placeholder="e.g. 100" value=""> $USD</td>
  			</tr>
  			<tr>
  				<th>Per:</th>
  				<td><input type="number" name="per_value" value="1" size="5">
  				<input type="text" name="per_name" value="Serving"></td>
  			</tr>
  		</table> 


      <a class="btn btn-primary"  data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Show optional fields
      </a> <br>   
       <div class="collapse" id="collapseExample">
        <div class="wel">
                <table id="foodform" >
                  <tr>
                    <th>Carbohydrates:</th>
                    <td><input type="text"  name="carbohydrates" value="0.00">g</td>
                  </tr>
                  <tr>
                    <th>Sugars:</th>
                    <td><input type="text" name="sugars" value="0.00" >g</td>
                  </tr>
                  <tr>
                    <th>Fiber:</th>
                    <td><input type="text" name="fiber" value="0.00"  >g</td>
                  </tr>
                  <tr>
                    <th>Water:</th>
                    <td><input type="text" name="water" value="0.00">ml</td>
                  </tr>
                  <tr>
                    <th colspan="2"><span style="color:tomato; text-align:right; font-size:20px;">Minerals</span></th>
                    
                  </tr>
                  <tr>
                    <th>Calcium:</th>
                    <td><input type="text" name="calcium" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Copper:</th>
                    <td><input type="text" name="copper" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Iodine:</th>
                    <td><input type="text" name="iodine" value="0.00">mcg</td>
                  </tr>
                  <tr>
                    <th>Iron:</th>
                    <td><input type="text" name="iron" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Magnesium:</th>
                    <td><input type="text" name="magnesium" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Manganese:</th>
                    <td><input type="text" name="manganese" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Phosphorus:</th>
                    <td><input type="text" name="phosphorus" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Potassium:</th>
                    <td><input type="text" name="potassium" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Selenium:</th>
                    <td><input type="text" name="selenium" value="0.00">mcg</td>
                  </tr>
                  <tr>
                    <th>Sodium:</th>
                    <td><input type="text" name="sodium" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Zinc:</th>
                    <td><input type="text" name="zinc" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th colspan="1">Vitamins</th>
                    
                  </tr>
                  <tr>
                    <th>Choline:</th>
                    <td><input type="text" name="choline" value="0.00">mg</td>
                  </tr>
                  <tr>
                    <th>Vitamin A:</th>
                    <td><input type="text" name="vitamin_a" value="0.00">UI</td>
                  </tr>
                  <tr>
                    <th>Vitamin B1:</th>
                    <td><input type="text" name="vitamin_b1" value="0.00">Thiamin</td>
                  </tr>
                  <tr>
                    <th>Vitamin B2, Riboflavin:</th>
                    <td><input type="text" name="vitamin_b2_riboflavin" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin B3:</th>
                    <td><input type="text" name="vitamin_b3" value="0.00">Niacin</td>
                  </tr>
                  <tr>
                    <th>Vitamin B5, Pantothenic acid:</th>
                    <td><input type="text" name="vitamin_b5_pantothenic_acid" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin B6, Pyridoxin:</th>
                    <td><input type="text" name="vitamin_b6_pyridoxin" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin B9, Folate:</th>
                    <td><input type="text" name="vitamin_b9_folate" value="0.00">mcg</td>
                  </tr>
                  <tr>
                    <th>Vitamin B12, Cobalamin:</th>
                    <td><input type="text" name="vitamin_b12_cobalamin" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin C:</th>
                    <td><input type="text" name="vitamin_c" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin D:</th>
                    <td><input type="text" name="vitamin_d" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin E:</th>
                    <td><input type="text" name="vitamin_e" value="0.00"></td>
                  </tr>
                  <tr>
                    <th>Vitamin K:</th>
                    <td><input type="text" name="vitamin_k" value="0.00"></td>
                  </tr>
                </table> 
          
        </div>
      </div>
      <br>
      
        <input type="submit" class="btn btn-default" name="addfood" value="submit">
    
  </form>
</div>


<?php include_once('footer.php'); ?>	
</div>

</body>
</html>