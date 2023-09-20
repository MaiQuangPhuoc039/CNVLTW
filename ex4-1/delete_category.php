<?php
    $categoryID = filter_input(INPUT_POST, "delete");

    require_once('database.php');

    $queryCategoryDelete = "DELETE FROM `my_guitar_shop1`.`categories` WHERE  `categoryID`= $categoryID";
    $statement = $conn->prepare($queryCategoryDelete);
    $success = $statement->execute();
    $statement->close();
    include("category_list.php");
?>