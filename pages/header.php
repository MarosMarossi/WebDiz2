<?php
	session_start();
	
?>

<!DOCTYPE html>
<html lang="sk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
	<link rel="stylesheet" href="scripts/mycss.css">
	<title>WebDizajn 2 Knihy</title>
</head>
<body>
<div style="position:fixed; bottom:8rem; right: 5rem; width: 0; height: 0; z-index:1;"><button class="back_to_top fa-solid fa-arrow-up" onclick="top_Function()" id="back_top_btn" title="Späť hore"></button></div>
	<div class="container">
		<div class="row rcorners2">
			<div class="col-md-8">

				<ul class="nav nav-pills nav-fill col-md-12 mt-1" style="align-items: end;">
					<a class="navbar-brand" href="index.php?link=home.php">
						<img src="images/logoo.jpg" class="rounded-circle mt-2 mb-3" width="90" height="90" alt="LOGO">
					</a>
					<li class="nav-item mb-3 "><a href="index.php?link=home.php" class="nav-link">Domov</a></li>
					<li <?php /**/if(!isset($_SESSION['email'])){echo"style='display:none;'";} ?> class="nav-item mb-3 "><a href="index.php?link=dataTables.php" class="nav-link">Tabulka</a></li>
					<li class="nav-item mb-3 "><a href="index.php?link=contactUs.php" class="nav-link">Kontakt</a></li>
					<li class="nav-item mb-3 "><a href="index.php?link=aboutUs.php" class="nav-link">O projekte</a></li>
				</ul>

			</div>
			<div class="col-md-4 mt-2">
				<form action="index.php" method="get">
				  <div class="form-row">
					  <div class="col-md-8">
						<input type="text" class="form-control" name="hladaj" placeholder="hľadaný text">
					  </div>
					  <div class="col-md-4">
						<button type="submit" class="btn btn-primary">Odoslať</button>
					  </div>
				  </div>
				</form>
				<div>
				<a <?php if(isset($_SESSION['email'])){echo"style='display:none;'";} ?> class="register_icon" href="register.php" title="Prihlásiť sa">
					<i class="fa-solid fa-circle-user"></i>
				</a>
				
				<a <?php if(!isset($_SESSION['email'])){echo"style='display:none;'";} ?> class="logout_icon" href="logout.php" title="Odhlásiť sa">
					<i class="fa-solid fa-arrow-right"></i>
				</a>
				</div>
			</div>
		</div>
		<div style="padding: 20px;">

	</div>







		