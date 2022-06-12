<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" type="text/css"
        href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin">

    <link rel="stylesheet" href="/assets/styles/style.css">
    <script>
    function myFunction() {
        var x = document.getElementById("topNav");
        if (x.style.display === "flex") {
            x.style.display = "none";
        } else {
            x.style.display = "flex";
        }
    }
    </script>
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <a href="javascript:void(0);" class="hamburger" onclick="myFunction()">
                    Dropdown
                </a>
                <div id="topNav">
                    <a href="/" class="linkheader">HOME</a>
                    <a href="/assets/pages/browse.php" class="linkheader">CAR OFFERS</a>
                    <a href="/#drugi" class="linkheader">OLD FOR NEW</a>
                    <a href="/#aboutus" class="linkheader">ABOUT US</a>
                    <a href="/#contact" class="linkheader">CONTACT</a>
                    <a href="/assets/pages/login.php" class="linkheader
            <?php if (isset($_SESSION['username'])) echo 'hidelogin' ?>">
                        <img src="/assets/images/login.png" alt="" class="login">
                        LOG IN
                    </a>
                    <?php if (isset($_SESSION['username'])) {
                    ?>
                    <a href="/assets/includes/logout.php" class="logout linkheader">
                        <?php
                        echo "LOG OUT</a>";
                    }
                        ?>
                </div>
            </nav>

        </header>