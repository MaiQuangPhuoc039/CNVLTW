<?php
require_once('database.php');

// Get all categories
$query = $conn->query("SELECT * FROM categories
                       ORDER BY categoryID");




$conn->close();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>


    <?php
    if (isset($_POST['add'])) {
        $ma = $_POST['maSV'];
        echo $ma;
    }
    ?>

    <header>
        <h1>Product Manager</h1>
    </header>
    <main>
        <h1>Category List</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>


            <?php while ($row = mysqli_fetch_assoc($query)) : ?>

                <form action="delete_category.php" method="post">
                    <tr>
                        <th><?php echo $row['categoryName'] ?></th>
                        <!-- $row['categoryID'] lấy cột categoryID -->
                        <th><input type="hidden" value="<?php echo $row['categoryID'] ?>" name="delete">
                            <input type="submit" value="Delete">
                        </th>
                    </tr>
                </form>

            <?php endwhile; ?>

            <!-- add code for the rest of the table here -->

        </table>

        <h2>Add Category</h2>

        <!-- add code for the form here -->
        <form action="add_category.php" method="post">

            <label for="nameCategory">Name </label>
            <input name="nameCategory">
            <input type="submit" value="Add">
           

        </form>

        <br>
        <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>

</html>