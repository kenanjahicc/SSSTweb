<?php include '../includes/session.php';?>
<?php include '../includes/header.php' ; ?>

<main class="loginmain">

<div class="loginbox">
    <h1>Login</h1>
    <img src="../images/login.png" alt="" class="loginOnPage">
    <form action="../includes/loginfunc.php" method="post" class="loginform" id="login">
        <label for="username" class="loginlabel">Username</label>
        <input type="text" name="username" placeholder="Enter Username" class="inputbox">
        <label for="password" class="loginlabel">Password</label>
        <input type="password" name="password" placeholder="Enter Password" class="inputbox">
        <input type="submit" name="login" value="Login" class="submitbutton">
        <a href="register.php">Create an account</a>
        <?php
        if($_GET['error']){
            echo "<script>alert('Username or password is incorrect')</script>";
        }
        ?>
    </form>
</div>

</main>

<?php include '../includes/footer.php' ; ?>
