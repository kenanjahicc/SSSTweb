<?php
$conn= new mysqli("db","root","","mydb");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>
