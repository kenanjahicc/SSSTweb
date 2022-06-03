<?php
//connect to database
//die('"127.0.0.1","root","password","mydb","3306"');
$conn=mysqli_connect("127.0.0.1","rooooot", '');
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

include 'session.php';

//login
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=$username;
        header('location:index.php');
    }else{
        echo "<script>alert('Username or password is incorrect')</script>";
    }
}


?>
