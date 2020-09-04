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
	<title>Transfer Credit</title>
</head>
<body class="bg-white">

	<nav class="navbar navbar-expand-md navbar-dark sticky-top nav-color p-1">
		<a class="navbar-brand ml-1" href="index.html" ><img src="image.jpg" width="35" height="35" class="mr-1"><strong> Credit Management</strong></a>
		<button class="navbar-toggler btn-sm mr-1" type="button" data-toggle="collapse" aria-controls="lable" data-target="#lable" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon btn-sm"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="lable">
			<div class="navbar-nav ml-1 mr-1">
				<a class="nav-link text-hover mr-1" href="index.html">Home</a>
				<a class="nav-link text-hover mr-1" href="user.php">View All Users</a>
				<a class="nav-link text-hover active " href="transfer.php">Transfer Credit</a>					
			</div>
		</div>					
	</nav>
	<div class="jumbotron bg-white">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="card">
					<div  class="card-body bg-primary">
						<?php

							$name = "epiz_26639344";
							$pass = "upHtOU2vpo1";
							$host = "sql210.epizy.com";
							$dbname = "epiz_26639344_XXX";

							$con = mysqli_connect($host,$name,$pass,$dbname);
						?>

						<?php 

							if(isset($_POST["submit"])){
								$fname = $_POST['from'];
								$tname = $_POST['to'];
								$amount = $_POST['amount'];

								$money = "SELECT * FROM bank WHERE name = '$fname'";

								if($result = mysqli_query($con,$money)){


									$row = mysqli_fetch_array($result);
									$credit = $row['currentcredit'];
									$from_name = $row['name'];

									if(($amount<=$credit)  && ($from_name != $tname)){
										$up = "UPDATE bank SET  currentcredit =	currentcredit-'$amount' WHERE name = '$fname' ";
										$up1 = "UPDATE bank SET currentcredit = currentcredit+'$amount' WHERE name = '$tname' ";
										if(mysqli_query($con,$up) && mysqli_query($con,$up1)){


											echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
											<b>Transfer successfully check here <a href='user.php' class='btn-sm mr-2 text-danger  font-weight-bolder alert-link'>View all Users</a></b>
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
											<span aria-hidden='true'>&times;</span>
											</button> </div>";	

										}
									}
									else{
									echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
									echo "<b>Transfer failed check here <a href='user.php' class='btn-sm mr-2 text-danger font-weight-bolder alert-link'>View all Users</a></b>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
									</button></div>";
									}									
								}


								else{
									echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
									echo "<b>Database connection failed</b>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'>&times;</span>
									</button></div>";
								}
							}
						?>
						<form action="" method="POST" class="p-2">
							<?php
								$query = "SELECT * from bank";
								if($result = mysqli_query($con,$query)){

									if(mysqli_num_rows($result)>0){

										echo "<div class='form-group'><label class='font-weight-bolder' for='exampleFormControlSelect1'>Transfer From</label> <select class='form-control' name='from'>";

										while ($row = mysqli_fetch_array($result)) {

											echo "<option>".$row["name"]."</option>";										
										}
										echo "</select></div>";
									}									
								}
								$query1 = "SELECT * from bank";

								if($result1 = mysqli_query($con,$query1)){

									if(mysqli_num_rows($result1)>0){

										echo "<div class='form-group'><label class='font-weight-bolder' for='exampleFormControlSelect1'>Transfer To</label> <select class='form-control' name='to'>";
										while ($row1 = mysqli_fetch_array($result1)) {

											echo "<option>".$row1["name"]."</option>";
											
										}
										echo "</select></div>";
									}									
								}
								echo '<div class="form-group"><label class="font-weight-bolder" for="exampleFormControlInput1">Amount</label><input type="text" class="form-control" name="amount" required></div>';
								echo '<button type="submit" class="btn btn-warning" name="submit">Transfer</button>';
							?>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
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
	<script type="text/javascript">
		$('.alert').alert()
	</script>

	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>