<?php
require_once('functions.php');
require_once('functions_meal.php');


	if (login_check()) {		
		$user_id = $_SESSION['user_id'];

		$db=dbconnect();
		$sqll="SELECT calory_need FROM user_profile WHERE user_id='$user_id'";
		$resultt= mysqli_query($db, $sqll);
			if ($row=mysqli_fetch_array($resultt)) {
				$cneed=$row["calory_need"];
			}

		}else{
			$cneed="";
		}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Plan| Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>


	<div class="container">
		<div class="row">
			<form class="form-inline" role="form" action="" method="post">
		    <div class="form-group">
		      <label for="name">I want to eat:</label>
		      <input type="text" class="form-control" name="calories" id="name" placeholder="calories" required value="<?=$cneed; ?>">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Calories in:</label>
		      <select name="meal">
		      	<option>1</option>
		      	<option>2</option>
		      	<option>3</option>
		      	<option>4</option>
		      	<option>5</option>
		      	<option>6</option>
		      	<option>7</option>
		      	<option>8</option>
		      	<option>9</option>
		      </select>
		      <label>meals.</label>
		      <span>I like to eat</span>
		      	<select name="foodtype">
		      		<option value="">Anything</option>
		      		<option value="1">Meat, fish, Poultry</option>
		      		<option value="2">Dairy</option>
		      		<option value="3">Nuts and Seeds</option>
		      		
		      	</select>
		    </div>
		    
		    <button type="submit" name="generate" class="btn btn-warning btn-lg">Generate <span class="glyphicon glyphicon-random"></span></button>
		  </form>
		</div>
		<div class="row">
<?php
	
	if (isset($_POST['generate']) && !empty($_POST['calories'])) {
		$calory_need = safe($_POST['calories']);
		$meal = $_POST['meal'];
		$foodtype = $_POST['foodtype'];
		if (!empty($foodtype)) {
			$select_type=" AND food_category='$foodtype'";
		}else{
			$select_type=" AND food_category=1 OR food_category=6";
		}

		$db=dbconnect();
		

		switch ($meal) {
			case '1': // 1 Meal starts here
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/2;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				break; // 1 Meal ends here


//////////////////////////////////////////////////////
//////// Meal plan 2
//////////////////////////////////////////////////////




			case '2': // 2 meal starts here
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/4;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";


				break; // 2 Meal ends here


//////////////////////////////////////////////////////
//////// Meal plan 3
//////////////////////////////////////////////////////




			case '3':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/8;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				break;



//////////////////////////////////////////////////////
//////// Meal plan 4
//////////////////////////////////////////////////////




			case '4':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/7;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks');

				echo "</div></div>";


				break;


//////////////////////////////////////////////////////
//////// Meal plan 5
//////////////////////////////////////////////////////





			case '5':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/8;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks1');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql5="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 1,1";

				$result5= mysqli_query($db,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					    $food_id= $row5["food_id"];
						$name= $row5["food_name"];
						$carbs_snack2 = $row5["carbohydrates"];
						$fats_snack2 = $row5["total_fat"];
					    $protein_snack2 =$row5["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack2,$fats_snack2,$protein_snack2,'Snacks2');

				echo "</div></div>";

				break;


//////////////////////////////////////////////////////
//////// Meal plan 6
//////////////////////////////////////////////////////




			case '6':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/9;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks1');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql5="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 1,1";

				$result5= mysqli_query($db,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					    $food_id= $row5["food_id"];
						$name= $row5["food_name"];
						$carbs_snack2 = $row5["carbohydrates"];
						$fats_snack2 = $row5["total_fat"];
					    $protein_snack2 =$row5["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack2,$fats_snack2,$protein_snack2,'Snacks2');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql6="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 2,1";

				$result6= mysqli_query($db,$sql6);
				while($row6=mysqli_fetch_array($result6)){
					    $food_id= $row6["food_id"];
						$name= $row6["food_name"];
						$carbs_snack3 = $row6["carbohydrates"];
						$fats_snack3 = $row6["total_fat"];
					    $protein_snack3 =$row6["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack3,$fats_snack3,$protein_snack3,'Snacks3');

				echo "</div></div>";

				break;


//////////////////////////////////////////////////////
//////// Meal plan 7
//////////////////////////////////////////////////////





			case '7':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/10;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks1');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql5="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 1,1";

				$result5= mysqli_query($db,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					    $food_id= $row5["food_id"];
						$name= $row5["food_name"];
						$carbs_snack2 = $row5["carbohydrates"];
						$fats_snack2 = $row5["total_fat"];
					    $protein_snack2 =$row5["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack2,$fats_snack2,$protein_snack2,'Snacks2');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql6="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 2,1";

				$result6= mysqli_query($db,$sql6);
				while($row6=mysqli_fetch_array($result6)){
					    $food_id= $row6["food_id"];
						$name= $row6["food_name"];
						$carbs_snack3 = $row6["carbohydrates"];
						$fats_snack3 = $row6["total_fat"];
					    $protein_snack3 =$row6["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack3,$fats_snack3,$protein_snack3,'Snacks3');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql7="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 3,1";

				$result7= mysqli_query($db,$sql7);
				while($row7=mysqli_fetch_array($result7)){
					    $food_id= $row7["food_id"];
						$name= $row7["food_name"];
						$carbs_snack4 = $row7["carbohydrates"];
						$fats_snack4 = $row7["total_fat"];
					    $protein_snack4 =$row7["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack4,$fats_snack4,$protein_snack4,'Snacks4');

				echo "</div></div>";
				break;


//////////////////////////////////////////////////////
//////// Meal plan 8
//////////////////////////////////////////////////////





			case '8':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/11;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks1');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql5="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 1,1";

				$result5= mysqli_query($db,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					    $food_id= $row5["food_id"];
						$name= $row5["food_name"];
						$carbs_snack2 = $row5["carbohydrates"];
						$fats_snack2 = $row5["total_fat"];
					    $protein_snack2 =$row5["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack2,$fats_snack2,$protein_snack2,'Snacks2');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql6="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 2,1";

				$result6= mysqli_query($db,$sql6);
				while($row6=mysqli_fetch_array($result6)){
					    $food_id= $row6["food_id"];
						$name= $row6["food_name"];
						$carbs_snack3 = $row6["carbohydrates"];
						$fats_snack3 = $row6["total_fat"];
					    $protein_snack3 =$row6["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack3,$fats_snack3,$protein_snack3,'Snacks3');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql7="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 3,1";

				$result7= mysqli_query($db,$sql7);
				while($row7=mysqli_fetch_array($result7)){
					    $food_id= $row7["food_id"];
						$name= $row7["food_name"];
						$carbs_snack4 = $row7["carbohydrates"];
						$fats_snack4 = $row7["total_fat"];
					    $protein_snack4 =$row7["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack4,$fats_snack4,$protein_snack4,'Snacks4');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql8="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 4,1";

				$result8= mysqli_query($db,$sql8);
				while($row8=mysqli_fetch_array($result8)){
					    $food_id= $row8["food_id"];
						$name= $row8["food_name"];
						$carbs_snack5 = $row8["carbohydrates"];
						$fats_snack5 = $row8["total_fat"];
					    $protein_snack5 =$row8["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack5,$fats_snack5,$protein_snack5,'Snacks5');

				echo "</div></div>";

				break;


//////////////////////////////////////////////////////
//////// Meal plan 9
//////////////////////////////////////////////////////

			case '9':
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/12;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql4="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 0,1";

				$result4= mysqli_query($db,$sql4);
				while($row4=mysqli_fetch_array($result4)){
					    $food_id= $row4["food_id"];
						$name= $row4["food_name"];
						$carbs_snack1 = $row4["carbohydrates"];
						$fats_snack1 = $row4["total_fat"];
					    $protein_snack1 =$row4["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack1,$fats_snack1,$protein_snack1,'Snacks1');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql5="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 1,1";

				$result5= mysqli_query($db,$sql5);
				while($row5=mysqli_fetch_array($result5)){
					    $food_id= $row5["food_id"];
						$name= $row5["food_name"];
						$carbs_snack2 = $row5["carbohydrates"];
						$fats_snack2 = $row5["total_fat"];
					    $protein_snack2 =$row5["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack2,$fats_snack2,$protein_snack2,'Snacks2');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql6="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 2,1";

				$result6= mysqli_query($db,$sql6);
				while($row6=mysqli_fetch_array($result6)){
					    $food_id= $row6["food_id"];
						$name= $row6["food_name"];
						$carbs_snack3 = $row6["carbohydrates"];
						$fats_snack3 = $row6["total_fat"];
					    $protein_snack3 =$row6["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack3,$fats_snack3,$protein_snack3,'Snacks3');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql7="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 3,1";

				$result7= mysqli_query($db,$sql7);
				while($row7=mysqli_fetch_array($result7)){
					    $food_id= $row7["food_id"];
						$name= $row7["food_name"];
						$carbs_snack4 = $row7["carbohydrates"];
						$fats_snack4 = $row7["total_fat"];
					    $protein_snack4 =$row7["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack4,$fats_snack4,$protein_snack4,'Snacks4');

				echo "</div></div>";



				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql8="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 4,1";

				$result8= mysqli_query($db,$sql8);
				while($row8=mysqli_fetch_array($result8)){
					    $food_id= $row8["food_id"];
						$name= $row8["food_name"];
						$carbs_snack5 = $row8["carbohydrates"];
						$fats_snack5 = $row8["total_fat"];
					    $protein_snack5 =$row8["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack5,$fats_snack5,$protein_snack5,'Snacks5');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Snacks: <br>";
				$sql9="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=3 OR food_category=7 OR food_category=8 ORDER BY calories DESC LIMIT 5,1";

				$result9= mysqli_query($db,$sql9);
				while($row9=mysqli_fetch_array($result9)){
					    $food_id= $row9["food_id"];
						$name= $row9["food_name"];
						$carbs_snack6 = $row9["carbohydrates"];
						$fats_snack6 = $row9["total_fat"];
					    $protein_snack6 =$row9["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

				echo "</div><div class='col-sm-6'>";
										 
					
					show_chart_data($carbs_snack6,$fats_snack6,$protein_snack6,'Snacks6');

				echo "</div></div>";

				break;


			
			default:
				echo "<div class='row'><div class='col-sm-6'>";
				echo "Breakfast: <br>";
				$calory_range=$calory_need/8;
				$sql="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 0,1";
				$result=mysqli_query($db, $sql);
					while ($row=mysqli_fetch_array($result)) {
						$food_id= $row["food_id"];
						$name= $row["food_name"];
						$carbs_break= $row["carbohydrates"];
						$fats_break= $row["total_fat"];
						$protein_break=$row["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}
					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 0,2";
				$resultv=mysqli_query($db, $sqlv);
					while ($rowv=mysqli_fetch_array($resultv)) {
						$food_id= $rowv["food_id"];
						$name= $rowv["food_name"];
						$carbs_break1 += $rowv["carbohydrates"];
						$fats_break1 += $rowv["total_fat"];
						$protein_break1 +=$rowv["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $car=$carbs_break + $carbs_break1;
					 $fat=$fats_break + $fats_break1;
					 $pro= $protein_break + $protein_break1;
					
					show_chart_data($car,$fat,$pro,'Breakfast');

				echo "</div></div>";


				echo "<div class='row'><div class='col-sm-6'>";
					echo "Lunch: <br>";
				$sql2="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 1,1";

				$result2= mysqli_query($db,$sql2);
				while($row2=mysqli_fetch_array($result2)){
					   $food_id= $row2["food_id"];
						$name= $row2["food_name"];
						$carbs_lunch= $row2["carbohydrates"];
						$fats_lunch= $row2["total_fat"];
						$protein_lunch=$row2["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv1="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 2,2";
				$resultv1=mysqli_query($db, $sqlv1);
					while ($rowv1=mysqli_fetch_array($resultv1)) {
						$food_id= $rowv1["food_id"];
						$name= $rowv1["food_name"];
						$carbs_lunch1 += $rowv1["carbohydrates"];
						$fats_lunch1 += $rowv1["total_fat"];
						$protein_lunch1 +=$rowv1["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $ca=$carbs_lunch + $carbs_lunch1;
					 $fa=$fats_lunch + $fats_lunch1;
					 $pr= $protein_lunch + $protein_lunch1;
					
					show_chart_data($ca,$fa,$pr,'Lunch');

				echo "</div></div>";




				echo "<div class='row'><div class='col-sm-6'>";
					echo "Dinner: <br>";
				$sql3="SELECT * FROM foods WHERE calories<='$calory_range' $select_type ORDER BY calories DESC LIMIT 5,1";

				$result3= mysqli_query($db,$sql3);
				while($row3=mysqli_fetch_array($result3)){
					    $food_id= $row3["food_id"];
						$name= $row3["food_name"];
						$carbs_dinner= $row3["carbohydrates"];
						$fats_dinner= $row3["total_fat"];
						$protein_dinner=$row3["protein"];
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
				}

					// Vegetables items
				$vegetable_range=$calory_range/2;
				$sqlv2="SELECT * FROM foods WHERE calories<='$vegetable_range' AND food_category=8 ORDER BY calories DESC LIMIT 4,2";
				$resultv2=mysqli_query($db, $sqlv2);
					while ($rowv2=mysqli_fetch_array($resultv2)) {
						$food_id= $rowv2["food_id"];
						$name= $rowv2["food_name"];
						$carbs_dinner1 += $rowv2["carbohydrates"];
						$fats_dinner1 += $rowv2["total_fat"];
						$protein_dinner1 +=$rowv2["protein"];						
						$hello=get_tooltip($food_id);
						
						echo "<div class='tollerdata'>";			
						echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$name</a> <br>";						
						echo "</div>";
						
					}

				echo "</div><div class='col-sm-6'>";
					 $c=$carbs_dinner + $carbs_dinner1;
					 $f=$fats_dinner + $fats_dinner1;
					 $p= $protein_dinner + $protein_dinner1;
					
					show_chart_data($c,$f,$p,'Dinner');

				echo "</div></div>";

				break;
		}
		
			
	}

	
 ?>
		</div>
		
	</div>




<?php include_once('footer.php'); ?>	
</div>

</body>
</html>