<?php include '../includes/session.php';?>
<?php include '../includes/header.php' ; ?>

<main class="registermain">

<div class="loginbox">
    <h1>Register</h1>
    <img src="../images/login.png" alt="" class="loginOnPage">
    <form action="" method="post" class="loginform" id="register">
        <label for="username" class="loginlabel">Username</label>
        <input type="text" name="username" placeholder="username" class="inputbox">
        <label for="password" class="loginlabel">Password</label>
        <input type="password" name="password" placeholder="password" class="inputbox">
        <label for="email" class="loginlabel">Email</label>
        <input type="text" name="email" placeholder="example@example.com" class="inputbox">
        <input type="submit" name="register" value="Register" class="submitbutton">
    </form>
</div>

</main>

<?php include '../includes/footer.php' ;
include '../includes/dbconn.php';
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $query="INSERT INTO user(username,password,email) VALUES ('$username','$password','$email')";
    $result=mysqli_query($conn,$query);
    if(mysqli_affected_rows($conn)==1){
        echo "<script>alert('Succesful registration !')</script>";
    }else{
        echo "<script>alert('This data was already used on another account')</script>";
    }
$conn->close();
exit();
}


?>
