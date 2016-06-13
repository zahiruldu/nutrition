<?php
//meal 1 with two foods
function meal_one($calory){
	$calory_need=$calory;
	$sql="SELECT *
					FROM foods
					WHERE (
					SELECT 
					    CONCAT('|', foods1.food_id, '|', foods2.food_id, '|')
					FROM 
					    foods foods1
					    JOIN
					    foods foods2 ON foods1.food_id <> foods2.food_id
					ORDER BY
					    ABS(foods1.calories + foods2.calories - '$calory_need')
					LIMIT 1) LIKE CONCAT('%|', food_id ,'|%');";

	return $sql;

}

function meal_two($calory){
	$calory_need=$calory;
	$sql="SELECT *
					FROM foods
					WHERE (
					SELECT 
					    CONCAT('|', foods1.food_id, '|', foods2.food_id, '|', foods3.food_id, '|')
					FROM 
					    foods foods1
					    JOIN
					    foods foods2 ON foods1.food_id <> foods2.food_id
					    JOIN
					    foods foods3 ON foods1.food_id <> foods3.food_id AND foods2.food_id <> foods3.food_id
					ORDER BY
					    ABS(foods1.calories + foods2.calories + foods3.calories - '$calory_need')
					LIMIT 1) LIKE CONCAT('%|', food_id ,'|%'); ";

	return $sql;

}

function meal_three($calory){
	$calory_need=$calory;
	$sql="SELECT *
					FROM foods
					WHERE (
					SELECT 
					    CONCAT('|', foods1.food_id, '|', foods2.food_id, '|', foods3.food_id, '|', foods4.food_id, '|')
					FROM 
					    foods foods1
					    JOIN
					    foods foods2 ON foods1.food_id <> foods2.food_id
					    JOIN
					    foods foods3 ON foods1.food_id <> foods3.food_id AND foods2.food_id <> foods3.food_id
					    JOIN
					    foods foods4 ON foods1.food_id <> foods4.food_id AND foods2.food_id <> foods4.food_id AND foods3.food_id <> foods4.food_id
					ORDER BY
					    ABS(foods1.calories + foods2.calories + foods3.calories + foods4.calories - '$calory_need')
					LIMIT 1) LIKE CONCAT('%|', food_id ,'|%');";

	return $sql;

}


function meal_four($calory){
	$calory_need=$calory;
	$sql="SELECT food_id,food_name,calories
					FROM foods
					WHERE (
					SELECT 
					    CONCAT('|', foods1.food_id, '|', foods2.food_id, '|', foods3.food_id, '|', foods4.food_id, '|', foods5.food_id, '|')
					FROM 
					    foods foods1
					    JOIN
					    foods foods2 ON foods1.food_id <> foods2.food_id
					    JOIN
					    foods foods3 ON foods1.food_id <> foods3.food_id AND foods2.food_id <> foods3.food_id
					    JOIN
					    foods foods4 ON foods1.food_id <> foods4.food_id AND foods2.food_id <> foods4.food_id AND foods3.food_id <> foods4.food_id
					    JOIN
					    foods foods5 ON foods1.food_id <> foods5.food_id AND foods2.food_id <> foods5.food_id AND foods3.food_id <> foods5.food_id AND foods4.food_id <> foods5.food_id
					ORDER BY
					    ABS(foods1.calories + foods2.calories + foods3.calories + foods4.calories + foods5.calories - '$calory_need')
					LIMIT 1) LIKE CONCAT('%|', food_id ,'|%');";
	
	return $sql;
}
