<?php
session_start();

$user_check = $_SESSION["usname"];

if(!isset($_SESSION['usname'])){
    header("location:index.php");
}
?>