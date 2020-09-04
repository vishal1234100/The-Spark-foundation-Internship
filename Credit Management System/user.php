<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
 	<link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
 	<link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
	<title>View All Users</title>
</head>
<body class="bg-white">
	<nav class="navbar navbar-expand-md navbar-dark sticky-top nav-color p-1">
		<a class="navbar-brand ml-1" href="index.html"><img src="image.jpg" width="35" height="35" class="mr-1"><strong> Credit Management</strong></a>
		<button class="navbar-toggler btn-sm mr-1" type="button" data-toggle="collapse" aria-controls="lable" data-target="#lable" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon btn-sm"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="lable">
			<div class="navbar-nav ml-1 mr-1">
				<a class="nav-link text-hover mr-1" href="index.html">Home</a>
				<a class="nav-link text-hover mr-1 active" href="user.php">View All Users</a>
				<a class="nav-link text-hover " href="transfer.php">Transfer Credit</a>					
			</div>
		</div>					
	</nav>

	<div class="jumbotron bg-white">	
				
		<?php
			$name = "epiz_26639344";
			$pass = "upHtOU2vpo1";
			$host = "sql210.epizy.com";
			$dbname = "epiz_26639344_XXX";

			$con = mysqli_connect($host,$name,$pass,$dbname);

			$query = "SELECT * from bank";

			if($result = mysqli_query($con,$query)){

				if(mysqli_num_rows($result)>=0){

					echo "<div class='row'> <div class='col-lg-2'></div><div class='col-12 col-lg-8'><div class='table-responsive'> <table class='table table-striped table-bordered table-primary table-hover table-sm'> <thead><tr class='bg-primary'><th scope='col' class='text-center'>ID</th><th scope='col' class='text-center'>Name</th><th scope='col' class='text-center'>Email</th><th scope='col' class='text-center'>current_Credit</th></tr></thead>";
					while ($row = mysqli_fetch_array($result)) {
						echo "<tr><th scope='row' class='text-center'>".$row["id"]."</th><td class='text-center'>".$row["name"]."</td><td class='text-center'>".$row["email"]."</td><td class='text-center'>".$row["currentcredit"]."</td></tr>";
					}
				}
				echo "</table></div></div><div class='col-lg-2'></div></div>";						
			}
		?>
			
	</div>

	<div class="fixed-bottom bg-light">
		<footer>
			<div class="container d-block text-center pt-1">
				<a href="mailto:motevishal80@gmail.com"  class="contacticon"><i class="fas fa-mail-bulk fa-1x pr-3 d-inline"></i></a>
				<a href="https://www.linkedin.com/in/vishal-mote-37297318b" class="contacticon"><i class="fab fa-linkedin fa-1x pr-3 d-inline"></i></a>
				<a href="tel:8766701604" class="contacticon"><i class="fas fa-phone fa-1x pr-3 d-inline "></i></a>
				<a href="https://wa.me/918766701604" class="contacticon"><i class="fab fa-whatsapp fa-1x pr-3 d-inline "></i></a> 
			</div>
			<div class=" container d-block text-center pb-1">
				<small class="font-weight-bold text-danger"> Designed By Vishal Mote &copy;2020</small>
			</div>
		</footer>
	<div>

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>