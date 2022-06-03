<?php
$conn= new mysqli("localhost","username","password","auto_db");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>
