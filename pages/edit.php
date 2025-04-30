<?php
    include "../connect.php";
    //crUd
    $nazov = "";
	$autor = "";
	$rok = "";
	$obr = "";
    if($_SERVER["REQUEST_METHOD"]=='GET'){
        if(!isset($_GET['id'])){
            header("location:/Webdizajn2/index.php");
            exit;
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM knihy WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        while(!$row){
            header("location:/Webdizajn2/index.php");
            exit;
        }
        $nazov = $row['nazov'];
        $autor = $row['autor'];
        $rok = $row['rok'];
        $obr = $row['obr'];
    }
    else{
        $id = $_POST['id'];
        $nazov = $_POST['nBook'];
		$autor = $_POST['nAuthor'];
		$rok = $_POST['nDate'];
		$obr = $_POST['nPicture'];
        $sql = "UPDATE knihy SET nazov='$nazov',autor='$autor',rok='$rok',obr='$obr' WHERE id='$id'";
        $result = $conn->query($sql);
        header("location:/Webdizajn2/index.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	
    <link rel="stylesheet" href="../scripts/mycss.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

<div class="modal-container" id="createForm" style="display: block;"><!-- nechce ist v myjs -->
	<div class="form_con" style="position: absolute; overflow: hidden; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 100%; width: 400px;">
		<a class="close_button" href="../index.php">x</a>
		<h1 class="form-title">Upraviť</h1>
		<form method="post">
            <input type="hidden" name="id" value="<?php echo $id;?>" class="form_inp">
			<div class="input-group">
				<i class="fa-solid fa-book"></i>
				<input class="form_inp" type="text" value="<?php echo $nazov;?>" name="nBook" id="nBook" placeholder="Názov" required>
				<label for="nBook"><b>Názov knihy</b></label>
			</div>
			<div class="input-group">
				<i class="fa-solid fa-user"></i>
				<input class="form_inp" type="text" value="<?php echo $autor;?>" name="nAuthor" id="nAuthor" placeholder="Autor" required>
				<label for="nAuthor"><b>Autor knihy</b></label>
			</div>
			<div class="input-group">
				<i class="fa-solid fa-calendar-days"></i>
				<input class="form_inp" type="date" value="<?php echo $rok;?>" name="nDate" id="nDate" placeholder="Dátum" required>
				<label for="nDate"><b>Dátum vydania</b></label>
			</div>
			<div class="input-group">
				<i class="fa-solid fa-folder-open"></i>
				<input class="form_inp" type="text" value="<?php echo $obr;?>" name="nPicture" id="nPicture" placeholder="Vložte názov obrázku" required>
				<label for="nPicture"><b>Obrázok knihy</b></label><!-- file -->
			</div>
			<input type="submit" class="btn custom_button" value="Upraviť" name="createNew"><!-- mozno ak if isset zmenim name mozem do datables dať aj php-->
		</form>
	</div>
</div>
    
</body>
</html>