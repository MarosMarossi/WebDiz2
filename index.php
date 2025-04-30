<?php

include 'pages/header.php';							//vloží hlavičku stránky
include 'connect.php';								//vloží súbor na spojenie s databázou

if (isset($_GET['link']))
    include 'pages/'.$_GET["link"];	//vloží obsah požadovanej stránky (premennú "link" vkladáme v adresnom riadku)
else 
    include 'pages/home.php';						//alebo vloží defaultnú domácu stránku

include 'pages/footer.php';	//vloží pätičku stránky


$conn->close();
?>