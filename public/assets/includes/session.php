<?php
//sesion
session_start();
if(isset($_SESSION['username'])){
    header('location:index.php');
}
?>