<?php
/**/
	if(!$_SESSION['email'])
    {
        header("Location: register.php");  //Redirect to login page to secure the welcome page without login access
    }
// Crud
	if (isset($_POST['createNew'])){
		$nazov = $_POST['nBook'];
		$autor = $_POST['nAuthor'];
		$rok = $_POST['nDate'];
		$obr = $_POST['nPicture'];
		$insert_book = "INSERT INTO knihy (nazov,autor,rok,obr) VALUES ('$nazov','$autor','$rok','$obr')";
		$query = $conn->query($insert_book);
	}


	if (isset($_GET["hladaj"]))
		$sql = "SELECT * FROM knihy WHERE nazov LIKE '%".$_GET["hladaj"]."%'";
	else
		$sql = "SELECT * FROM knihy";
	$result = $conn->query($sql);


	$dir = "images/";
	// Sort in ascending order - this is default
	$img_fil = scandir($dir);
	
		/*<?php while ($row = $result->fetch_assoc()) { ?>
		<option>"><?php echo $row["obr"]; ?></option>
	<?php } ?>*/


?>

<div class="row mt-5">
	<div class="col-md-12">
		<i class="fa-solid fa-pen"></i><!---->
		<button class="btn btn-info" style="margin-bottom: 1rem;" id="addnewButton">+ Pridať novú</button>
		<button class="btn btn-info" style="margin-bottom: 1rem; margin-left: 1rem; background-color:brown;" id="uploadButton">+ Upload súbor</button>
		<table id="table_id" class="display">
			<thead>
				<tr>
					<th>Názov</th>
					<th>Autor</th>
					<th>Dátum</th>
					<th>Obrázok</th>
					<th>Činnosť</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while ($row = $result->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $row["nazov"]; ?></td>
					<td><?php echo $row["autor"]; ?></td>
					<td><?php echo $row["rok"]; ?></td>
					<td><?php echo $row["obr"]; ?></td>
					<td>
						<?php echo "
						<a class='btn btn-success' href='pages/edit.php?id=$row[id]'>Edit</a>
						<a  class='btn btn-danger' href='pages/delete.php?id=$row[id]'>Delete</a>
						";
						?>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal-container" id="createForm" style="display: none;"><!-- nechce ist v myjs -->
	<div class="form_con" style="position: absolute; overflow: hidden; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 100%; width: 400px;">
		<button class="close_button" id="closeForm">x</button>
		<h1 class="form-title">Vytvoriť nový</h1>
		<form method="post">
			<div class="input-group">
				<i class="fa-solid fa-book"></i>
				<input class="form_inp" type="text" name="nBook" id="nBook" placeholder="Názov" required>
				<label for="nBook"><b>Názov knihy</b></label>
			</div>
			<div class="input-group">
				<i class="fa-solid fa-user"></i>
				<input class="form_inp" type="text" name="nAuthor" id="nAuthor" placeholder="Autor" required>
				<label for="nAuthor"><b>Autor knihy</b></label>
			</div>
			<div class="input-group">
				<i class="fa-solid fa-calendar-days"></i>
				<input class="form_inp" type="date" name="nDate" id="nDate" placeholder="Dátum" required>
				<label for="nDate"><b>Dátum vydania</b></label>
			</div>
			<div>
				<i class="fa-solid fa-folder-open"></i>
				<!--<input class="form_inp" type="text" name="nPicture" id="nPicture" placeholder="Vložte názov obrázku" required>-->
				<select name="nPicture" id="nPicture" placeholder="Vložte názov obrázku" required>
					<?php foreach($img_fil as $x => $y) { ?>
						<option value='<?php echo "$y";?>'><?php echo "$y";?></option>
					<?php }; ?>
				</select>
				<label for="nPicture"><b>Obrázok knihy</b></label>
			</div>
			<input type="submit" class="btn custom_button" value="Vytvoriť" name="createNew">
		</form>
	</div>
</div>

<div class="modal-container" id="uploadForm" style="display: none;"><!-- upload file -->
    <div class="form_con" style="position: absolute; overflow: hidden; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 100%; width: 400px;">
	<button class="close_button"  id="closeUForm">x</button><!-- id asi je iba jedno preto nejde js onclick="fCloseForm();"-->
        <h1 class="form-title">Vytvoriť nový obrázok</h1>
        <form action="pages/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <i class="fa-solid fa-folder-open"></i>
                <input class="form_inp" type="file" name="nFile" id="nFile" required>
                <label for="nFile"><b>Obrázok knihy</b></label><!-- file -->
            </div>
            <input type="submit" class="btn custom_button" value="Upload" name="submit">

        </form>
    </div>
</div>

