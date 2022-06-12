<?php
include '../includes/session.php';
include '../includes/dbconn.php';
include '../includes/header.php';

if ($_GET['Search']) {
    $search = $_GET['pretraga'];
    $query = "SELECT * FROM car WHERE name LIKE '%$search%' OR color LIKE '%$search%' ORDER BY views DESC";
    $result = mysqli_query($conn, $query);
} else {
    $query = "SELECT * FROM car";
    $result = mysqli_query($conn, $query);
}
?>


<main class="browse">
    <form action="" class="pretraga" method="GET">
        <div class="glpret">
            <input type="text" name="pretraga" placeholder="Search...">
            <input type="submit" value="Search" name="Search">
        </div>
    </form>
    <div class="gridpret">
        <div class="griditem">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <img src="../uploads/<?php echo $row['thumbnail']; ?>" alt="" class="slikapretraga">
            <div class="ispodslikepretraga">
                <h3 class="imeauta"><?php echo $row['name']; ?></h3>
                <span class="italic">Year of production: <?php echo $row['date_of_production']; ?></span></br>
                <span class="italic">State: <?php echo $row['old_new']; ?></span>
            </div>

            <?php } ?>
        </div>
    </div>

</main>

<?php include '../includes/footer.php'; ?>