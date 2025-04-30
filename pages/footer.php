
</div>
	<hr class="mt-5 foot_hr" style="margin-bottom: 0px;">
	<div class="d-flex flex-wrap justify-content-between align-items-center" style="background-color:rgba(186, 186, 186, 0.5);">
		<p class="col-md-4 mb-3 mt-3 ">© Copyright asi Maroš, 2025</p>
		<a class="col-md-4 d-flex align-items-center justify-content-center" href="index.php?link=home.php">
			<img src="images/logoo.jpg" class="rounded-circle" width="40" height="40" alt="LOGO">
		</a>
		<ul class="nav col-md-4 justify-content-end">
			<li class=" foot_list"><a class="foot_a" href="index.php?link=home.php">Domov</a></li>
			<li <?php /**/if(!isset($_SESSION['email'])){echo"style='display:none;'";} ?> class=" foot_list"><a class="foot_a" href="index.php?link=dataTables.php">Tabulka</a></li>
			<li class=" foot_list"><a class="foot_a" href="index.php?link=contactUs.php">Kontakt</a></li>
			<li class=" foot_list"><a class="foot_a" href="index.php?link=aboutUs.php">O projekte</a></li>
		</ul>
	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
	<script class="init">
		$(document).ready(function () {
			$('#table_id').DataTable();
		});
	</script>
	<script type="text/javascript" src="scripts/myjs.js"></script>
</body>
</html>