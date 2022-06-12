<?php include '../includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel='stylesheet' href='../styles/style.css'>
</head>

<body class="adminbod">
    <div class="wrap">
        <div class="adminlogin">
            <form action="" method="post" id="admin" class="<?php if (isset($_SESSION['id'])) echo 'hidelogin' ?>">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="username" class="inputbox">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="inputbox">
                <input type="submit" name="admin" value="Login" class="submitbutton">
            </form>
            <?php
            include '../includes/dbconn.php';
            if (isset($_POST['admin'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $query = "SELECT * FROM employee WHERE username = '$username' AND password = '$password';";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                if ($row) {
                    $_SESSION['id'] = $row['eid'];
                    $_SESSION['username'] = $row['username'];
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Car name</th>
                        <th>Price</th>
                        <th>Date of production</th>
                        <th>Sold to</th>
                        <th>Sold date</th>
                        <th>Views</th>
                        <th>Posted by</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $query = "SELECT * FROM car";
                            $resultj = mysqli_query($conn, $query);
                            while ($rowj = mysqli_fetch_assoc($resultj)) {
                            ?>
                    <tr>
                        <td><?php echo $rowj['cid']; ?></td>
                        <td><img src="../uploads/<?php echo $rowj['thumbnail']; ?>" alt="" class="carimage"
                                width="200px"></td>
                        <td><?php echo $rowj['name']; ?></td>
                        <td><?php echo $rowj['price']; ?></td>
                        <td><?php echo $rowj['date_of_production']; ?></td>
                        <td><?php echo $rowj['user_uid']; ?></td>
                        <td><?php echo $rowj['date_of_sale']; ?></td>
                        <td><?php echo $rowj['views']; ?></td>
                        <td><?php echo $rowj['employee_eid']; ?></td>
                        <td><a href="../includes/edit.php?cid=<?php echo $rowj['cid']; ?>">Edit</a></td>
                        <td><a href="../includes/delete.php?cid=<?php echo $rowj['cid']; ?>">Delete</a></td>
                        <td><?php echo $rowj['description']; ?></td>
                    </tr>
                    <?php
                            }
                            ?>

                </tbody>
            </table>
            <?php

                } else {
                    echo "<script>alert('Username or password is incorrect')</script>";
                }
            }
            if (isset($_SESSION['id']) && (!isset($_GET['newcar']))) {
                ?>
            <a class="addcar" href="?newcar=1">Add car</a>
            <a href="../includes/logout.php">Log out</a>
            <?php
            }
            if ($_GET['newcar']) {

            ?>
            <form action="" method="post" id="addcar" enctype="multipart/form-data">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name" class="inputbox" id="name">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="inputbox"></textarea>
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="inputbox">
                <label for="color">Color</label>
                <input type="text" name="color" placeholder="color" class="inputbox" id="color">
                <label for="old_new">Old or new</label>
                <input type="text" name="old_new" placeholder="old_new" class="inputbox" id="old_new">
                <label for="date_of_production">Date of production</label>
                <input type="date" name="date_of_production" placeholder="date_of_production" class="inputbox"
                    id="date_of_production">
                <label for="price">Price</label>
                <input type="text" name="price" placeholder="price" class="inputbox" id="price">
                <label for="brand">Brand</label>
                <select name="brand" id="brand" class="inputbox">
                    <?php
                        $query = "SELECT * FROM brand";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                    <option value="<?php echo $row['bid']; ?>"><?php echo $row['name']; ?></option>
                    <?php
                        }

                        ?>
                </select>
                <input type="submit" name="addcar" value="Add car" class="submitbutton">
            </form>
            <?php
            }
            ?>
            <?php
            if (isset($_POST['addcar'])) {
                $filename = $_FILES["image"]['name'];
                $tempname = $_FILES["image"]["tmp_name"];
                $folder = "../uploads/" . $filename;

                $name = $_POST['name'];
                $description = $_POST['description'];
                $image = $filename;
                $color = $_POST['color'];
                $old_new = $_POST['old_new'];
                $date_of_production = $_POST['date_of_production'];
                $price = $_POST['price'];
                $brand = $_POST['brand'];

                $query = "INSERT INTO car (name, description, thumbnail, color, old_new, date_of_production, price, brand_bid, employee_eid) VALUES ('$name', '$description', '$image', '$color', '$old_new', STR_TO_DATE('$date_of_production', '%Y-%m-%d'), $price, $brand, $_SESSION[id]);";
                var_dump($query);
                if (move_uploaded_file($tempname, $folder)) {
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<script>alert('Car added successfully')</script>";
                    }
                } else {
                    echo "<script>alert('Failed to add car')</script>";
                }

            ?>


            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>