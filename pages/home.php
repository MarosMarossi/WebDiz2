
<?php
	$_SESSION["datumDnes"] = date("l, d.m.Y");
	$conn->query("SET CHARACTER SET utf8");

	if (isset($_GET["hladaj"])) 
	$sql = "SELECT * FROM knihy WHERE nazov LIKE '%".$_GET["hladaj"]."%'";

	else 
		$sql = "SELECT * FROM knihy";

	$result = $conn->query($sql);
?>

<div class="row jumbotron jumbotron_cstm ">
	<div class="col-md-12 text-center display-4">
		<?php
		if(isset($_SESSION['email'])){
			echo "Ahoj" . $_SESSION['email'] . "<br>" . $_SESSION["datumDnes"];
		}
		else {
			echo "WEBDIZAJN 2<br>" . $_SESSION["datumDnes"];
		};
		?>
	</div>
	<div class="col-md-12 mt-3 text-center">
  		<p>Vitajte na domovskej stránke projektu Webový Dizajn 2. Táto stránka rieši tvorbu a dizajn webových stránok s využitím PHP, HTML, CSS, JS.
			<br>Témou projektu je jednoduchá stránka o knihách.
		</p>
	</div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner img-fluid" style="margin-bottom: 2rem; border: 5px solid rgb(138, 138, 138); border-radius: 35px;">
		<div class="carousel-item active">
		<img class="d-block w-100" src="images/kniz1.jpg" style="height: 25rem;" alt="First slide">
		<div class="carousel-caption d-none d-md-block">
			<h5>Knihy</h5>
		</div>
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="images/kniz2.jpg" style="height: 25rem;" alt="Second slide">
		<div class="carousel-caption d-none d-md-block">
			<h5>Knižnice</h5>
		</div>
		</div>
		<div class="carousel-item">
		<img class="d-block w-100" src="images/kniz3.jpg" style="height: 25rem;" alt="Third slide">
		<div class="carousel-caption d-none d-md-block">
			<h5>Knihníčatá</h5>
		</div>
	</div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="border-radius: 35px;background-color:rgba(0,0,0,.2);">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="border-radius: 35px;background-color:rgba(0,0,0,.2);">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="row">
	<?php
		while ($row = $result->fetch_assoc()) {
	?>
	<div class="col-md-3 mb-4">
		<div class="card" style="background-color:rgb(247, 247, 247); border: 2px solid rgba(0,0,0,.2); border-radius: .5rem;">
			<img class="card-img-top" style="height: 15rem;" src="images/<?php echo $row["obr"]; ?>" alt="Foto">		
			<div class="card-body">
				<h5 class="card-title"><?php echo $row["nazov"]; ?></h5>
				<p class="card-text"><?php echo $row["autor"]; ?></p>
				<p class="card-text"><small class="text-muted"><?php echo $row["rok"]; ?></small></p>
			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>



