<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">

    <link rel="stylesheet" href="/assets/styles/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <nav>
            <a href="/" class="linkheader">HOME</a>
            <a href="" class="linkheader">CAR OFFERS</a>
            <a href="/#drugi" class="linkheader">OLD FOR NEW</a>
            <a href="" class="linkheader">ABOUT US</a>
            <a href="" class="linkheader">CONTACT</a>
            <a href="/assets/pages/login.php" class="linkheader
            <?php if(isset($_SESSION))echo 'hidelogin'?>
            ">
                <img src="/assets/images/login.png" alt="" class="login">
                LOG IN
            </a>
            </nav>

        </header>
