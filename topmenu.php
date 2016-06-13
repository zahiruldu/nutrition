<?php require_once('functions.php'); ?>
<header>
	<h1>Nutrition Planner</h1>
<nav class="navbar navbar-default ">
  <div class="container">
    
	<ul class="nav nav-tabs">
		<li><a href="index.php">Home</a></li>
		
			<?php 
			if (logged_in()) { ?>
			<li><a href="foods.php">Foods</a></li>
			<li><a href="addfood.php">Add Food</a></li>
			<li><a href="mealplan.php">Plan</a></li>
			<li><a href="profile.php">Diet Profile</a></li>
			<li><a href="logout.php">Logout</a></li>				
			<?php }else { ?>
			<li><a href="foods.php">Foods</a></li>
			<li><a href="mealplan.php">Plan</a></li>
			<li><a href="signup.php">Signup</a></li>
			<li><a href="login.php">Login</a></li>

			<?php }

			?>
		
		

	</ul>
	
  </div>
</nav>
</header>


