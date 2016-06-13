<?php
require_once('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Nutrition Planner</title>
<?php include_once('headlink.php'); ?>	
</head>
<body>
<div class="container-fluid">
<?php include_once('topmenu.php'); ?>
<div class="cotainer-fluid">
<?php
	
	if (login_check()) {
		$name = $_SESSION['name'];
		$user_id = $_SESSION['user_id'];

		$db=dbconnect();
		$sql="SELECT * FROM user_profile WHERE user_id='$user_id'";
		$result= mysqli_query($db, $sql);
			while($row=mysqli_fetch_array($result)){
				$calory_need =$row["calory_need"];
				//$sql2= "SELECT food_id, food_name, calories FROM (
				//						   SELECT food_id, food_name, calories,
				//						          @cumSum:= @cumSum + calories AS cumSum
				//						   FROM foods, (SELECT @cumSum:=0) var
				//						   ORDER BY  RAND() ) t
				//						WHERE cumSum <='$calory_need' ";

				//$sql2="SELECT food_id,
				//			SUM(calories) as total_calory,
				//			SUM(food_id) as item_limit
				//			FROM foods 
				//			GROUP BY food_id
				//			HAVING total_calory>1000 AND item_limit>6";
							
				//$sql2="SELECT* FROM foods(SELECT calories)"

				//$sql2= "SELECT food_id, food_name, calories
					//	FROM (SELECT food_id, food_name, calories,
					//	             @cumeSum:= @cumeSum + calories AS cumeSum
					//	      FROM foods CROSS JOIN (SELECT @cumeSum:=0) var
					//	      ORDER BY calories
					//	     ) p
					//	WHERE cumeSum <= 2000  
					//	ORDER BY calories
					//	 LIMIT 6 ";
				//$sql2="SELECT * FROM foods WHERE SUM(calories)=1000";
				$sql2= "SELECT foods1.food_id, foods2.food_id, foods3.food_id, foods4.food_id
								FROM foods foods1 JOIN
								     foods foods2
								     ON foods1.food_id < foods2.food_id AND foods1.food_category = 1 AND foods2.food_category = 1 JOIN
								     foods foods3
								     ON foods2.food_id < foods3.food_id AND foods3.food_category = 1 JOIN
								     foods foods4
								     ON foods3.food_id < foods4.food_id AND foods3.food_category = 1 
								ORDER BY ABS(1000 - (foods1.calories + foods2.calories + foods3.calories + foods4.calories))
								LIMIT 5;";
				$result2=mysqli_query($db, $sql2);
				if (!$result2) {
					echo mysqli_error($db);
				}

				$count=mysqli_num_rows($result2);
				echo "Total Food: $count";
					
					while($row=mysqli_fetch_array($result2)){
						$name=$row["food_id"];
						$calories=$row["calories"];
						//$calorye=array($row["calories"]);
						echo "$name: $calories <br>";
						

						
					}
			}
	}

	
 ?>

<?php 
echo "Your Daily Target: $calory_need Kcl";
?>
<img src="img/pasta.jpg" width="100%" height="" alt="pasta"></div>




<?php include_once('footer.php'); ?>	
</div>

</body>
</html>