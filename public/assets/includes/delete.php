<?php
include 'session.php';
include 'dbconn.php';

if ($_GET['cid']) {
    $cid = $_GET['cid'];
    $query = "DELETE FROM car WHERE cid='$cid'";
    $result = mysqli_query($conn, $query);
    header('location:../pages/browse.php');
} else {
    header('location:/');
}