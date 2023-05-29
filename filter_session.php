<?php
    session_start();
    if(!isset($_SESSION["nom"])){
        header("location: login.php");
        exit();
    }
?>