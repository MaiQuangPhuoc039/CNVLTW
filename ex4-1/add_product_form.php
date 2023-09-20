<!-- <?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $conn->prepare($query);
$statement->execute();
$categories = $statement->free_result();
$statement->close();
?> -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

    <?php require_once 'database.php'; ?>
    <?php

    require('database.php');
    $query = 'SELECT *
              FROM categories
              ORDER BY categoryID';
    $statement = $conn->prepare($query);
    $statement->execute();
    $categories = $statement->free_result();
    $statement->close();

    $sql = $conn->query("SELECT * FROM categories");
    if (isset($_POST['add'])) {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $code = filter_input(INPUT_POST, 'code');
        $name = filter_input(INPUT_POST, 'name');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

        if ( $category_id == null || $category_id == false ||
            $code == null || $name == null || $price == null || $price == false)
        {
            $error = "Invalid product data. Check all fields and try again.";
            include('error.php');
        } else {
            $add = "INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (N'$category_id',N'$code',N'$name',N'$price') ";
            mysqli_query($conn, $add);
            header("location: index.php");
            // include('index.php');
        }
    }
    $conn->close();
    ?>

    <header>
        <h1>Product Manager</h1>
    </header>

    <main>
        <h1>Add Product</h1>
        <form action="add_product_form.php" method="POST" id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
                <?php while ($row = mysqli_fetch_assoc($sql)) : ?>
                    <option value="<?php echo $row['categoryID']; ?>">
                        <?php echo $row['categoryName']; ?>
                    </option>
                <?php endwhile; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" name="add" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>

</html>