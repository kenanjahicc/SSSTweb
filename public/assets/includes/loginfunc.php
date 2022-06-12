<?php
include 'session.php';
include 'dbconn.php';

//login
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$query);
    //get id from mysql query result
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1){
        $_SESSION['id']=$row['uid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];
        header('location:../../index.php');
    }else{
        header('location:../pages/login.php?error=1');
    }
$conn->close();
exit();
}