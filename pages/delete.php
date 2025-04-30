<?php
    include "../connect.php";
    // cruD
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM knihy where id=$id";
        $conn->query($sql);
    }
    header("location:/Webdizajn2/index.php");
    exit;
?>