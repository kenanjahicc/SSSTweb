<?php
include 'assets/includes/session.php';
include 'assets/includes/dbconn.php';
include 'assets/includes/header.php'; ?>
<?php
if ($_POST['Send'] && $_POST['subject'] && $_POST['message']) {
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $query = "INSERT INTO messages (subject, msg, user_uid, time_sent) VALUES ('$subject', '$message', $_SESSION[id], curdate());";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>alert('Message sent!')</script>";
    } else {
        echo "<script>alert('Message not sent!')</script>";
    }
}
?>
<main>
    <div class="prvi">
        <div class="naslici">
            <img src="assets/images/logo.png" alt="" class="logo">
        </div>
    </div>
    <div class="prvi drugi" id="drugi">
        <div class="naslicidrugi">
            <h1 class="oldfornew">Old for new</h1>
            <span class="oldfornewtext">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam autem temporibus consequuntur culpa illum
                quod consequatur vitae a, provident voluptate.
            </span>
        </div>
    </div>
    <?php if ($_SESSION['id']) { ?>
    <div class="contact" id="contact">
        <div class="contact">
            <form action="" method="POST">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="inputbox">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="inputbox"></textarea>
                <input type="submit" value="Send" class="inputbox" name="Send">
            </form>
        </div>
    </div>
    <?php } ?>
    <div class="prvi treci" id="aboutus">
        <div class="naslicidrugi trecislika">
            <h1 class="oldfornew">About us</h1>
            <span class="oldfornewtext">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt eaque architecto numquam nulla totam quas
                repellat reprehenderit? Eaque obcaecati delectus doloribus suscipit aspernatur, corrupti voluptatum,
                tempore labore odio architecto voluptatem dignissimos alias ipsa cum esse quisquam iure neque doloremque
                excepturi cumque quaerat necessitatibus nostrum aut? Magni ipsam quis autem natus.
            </span>
        </div>
    </div>
</main>

<?php include 'assets/includes/footer.php'; ?>