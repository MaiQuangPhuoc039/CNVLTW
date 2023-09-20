 <?php require_once 'database.php' ?>
 <?php
    if (!isset($category_id)) {
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
            $category_id = 1;
        }
    }

    $queryCategory = $conn->query("SELECT * FROM categories
                                        WHERE categoryID = $category_id");

    $result = $conn->query("SELECT * FROM products
                                         WHERE categoryID = $category_id ");

    $resultCate = $conn->query("SELECT * FROM categories");
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
     <header>
         <h1>Product Manager</h1>
     </header>
     <main>
         <h1>Product List</h1>

         <aside>
             <!-- display a list of categories -->
             <h2>Categories</h2>
             <nav>
                 <ul>
                     <?php while ($row1 = mysqli_fetch_assoc($resultCate)) : ?>
                         <?php $category_name = $row1['categoryName'];
                            $category_id = $row1['categoryID'];
                            ?>
                         <li>
                             <a href=".?category_id=<?php echo $category_id; ?>">
                                 <?php echo $row1['categoryName'] ?>
                             </a>
                         </li>
                     <?php endwhile; ?>
                 </ul>
             </nav>
         </aside>

         <section>
             <!-- display a table of products -->
             <h2>
                 <?php while ($row = mysqli_fetch_assoc($queryCategory)) : ?>
                    <?php $category_name = $row['categoryName'];
                        $category_id = $row['categoryID'];
                    ?>
                 <?php endwhile; ?>
                 <?php echo $category_name; ?> </h2>
             <table>
                 <tr>
                     <th>Code</th>
                     <th>Name</th>
                     <th class="right">Price</th>
                     <th>&nbsp;</th>
                 </tr>

                 <!-- data trong table -->
                 <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                     <tr>
                         <td><?php echo $row['productCode'] ?></td>
                         <td><?php echo $row['productName'] ?></td>
                         <td class="right"><?php echo $row['listPrice'] ?></td>
                         <td>
                             <a onclick="return confirm('xac nhan xoa');" href="delete_product.php?delete=<?php echo $row['productCode'];  ?>">
                                 <input type="submit" value="Delete">
                             </a>
                         </td>
                     </tr>
                 <?php endwhile; ?>


             </table>
             <p name="add"><a href="add_product_form.php">Add Product</a></p>
             <p><a href="category_list.php">List Categories</a></p>
         </section>
     </main>
     <footer>
         <p>&copy; My Guitar Shop, Inc.</p>
     </footer>
 </body>

 </html>