<?php
require_once('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Foods | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>
<div class="cotainer-fluid">

<?php 
	
	$db=dbconnect();
	$sql= "SELECT * FROM foods";
	$result= mysqli_query($db, $sql);
	if (mysqli_num_rows($result)>0) {
		while($row=mysqli_fetch_array($result)){
			$food_name=$row["food_name"];
			$food_dsc=$row["food_description"];
			$calories=$row["calories"];
			$protein=$row["protein"];
			$total_fat=$row["total_fat"];
			$carbohydrates=$row["carbohydrates"];
			
			$hello= "<div>
						<h3>$food_name</h3>
						<p>$food_dsc</p>
						<strong>Carbs: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $carbohydrates g</strong><br>
						<span>Fat: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $total_fat g </span>					
						<p>Protein: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $protein g</p>
						<p>Calories: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  $calories </p>
					</div>";
			echo "<div class='tollerdata'>";
			
			echo "<a href='' class='btn btn-default' draggable='true' data-toggle='tooltip' data-html='true'  data-placement='right' title='$hello'>$food_name</a> <br>";
			
			echo "</div>";

		}
	}



?>

<?php include_once('footer.php'); ?>	
</div>

</body>
</html>