<?php
include 'session.php';
include 'dbconn.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "DELETE FROM car WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    header('location:/');
} else {
    header('location:/');
}