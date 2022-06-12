<?php
include 'session.php';
include 'dbconn.php';

if ($_POST['edit']) {
    $query = "INSERT INTO car(name,color,date_of_production,old_new,price,thumbnail,description,user_uid,employee_eid,brand_bid,date_of_sale) values()";
    $result = mysqli_query($conn, $query);
}

if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM car WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $color = $row['color'];
    $date_of_production = $row['date_of_production'];
    $old_new = $row['old_new'];
    $price = $row['price'];
    $thumbnail = $row['thumbnail'];
    $description = $row['description'];
    $uid = $row['user_uid'];
    $eid = $row['employee_eid'];
    $brand = $row['brand_bid'];
    $views = $row['views'];
    $date_of_sale = $row['date_of_sale'];

    $query = "SELECT * FROM user WHERE uid='$uid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $user = $row['username'];

    $query = "SELECT * FROM employee WHERE eid='$eid'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $employee = $row['username'];

    $query = "SELECT * FROM brand WHERE bid='$brand'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $brand = $row['name'];

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

?>
<main class="edit">
    <form action="edit.php" method="POST" class="editform">
        <div class="glpret">
            <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">
            <input type="text" name="color" value="<?php echo $color; ?>" placeholder="Color">
            <input type="text" name="date_of_production" value="<?php echo $date_of_production; ?>"
                placeholder="Date of production">
            <input type="text" name="old_new" value="<?php echo $old_new; ?>" placeholder="State">
            <input type="text" name="price" value="<?php echo $price; ?>" placeholder="Price">
            <input type="text" name="thumbnail" value="<?php echo $thumbnail; ?>" placeholder="Thumbnail">
            <input type="text" name="description" value="<?php echo $description; ?>" placeholder="Description">
            <select name="user_uid">
                <?php
                    $query = "SELECT * FROM user";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['uid']; ?>"><?php echo $row['username']; ?></option>
                <?php } ?>
            </select>
            <select name="employee_eid">
                <?php
                    $query = "SELECT * FROM employee";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['eid']; ?>"><?php echo $row['username']; ?></option>
                <?php } ?>
            </select>
            <select name="brand_bid">
                <?php
                    $query = "SELECT * FROM brand";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['bid']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <span>$views <?php echo $views; ?></span>
            <input type="text" name="date_of_sale" value="<?php echo $date_of_sale; ?>" placeholder="Date of sale">
            <input type="submit" value="Edit" name="edit">
        </div>
    </form>
</main>


<?php
} else {
    header('location:/');
}

?>