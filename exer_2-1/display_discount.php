<?php
  //  get data
  $product_description =$_POST['product_description'];
  $discount_percent = $_POST['discount_percent'];
  $list_price= $_POST['list_price'];

  // calculate
  $discount = $list_price * $discount_percent * .01;
  $discount_price = $list_price - $discount;

  $list_price_formatted = "$".number_format($list_price, 2);
  $discount_percent_formatted = $discount_percent."%";
  $discount_formatted = "$".number_format($discount, 2);
  $discount_price_formatted = "$".number_format($discount_price, 2);

  $product_description_escaped = htmlspecialchars($product_description);


  // $list_price_formatted = "$".number_format($list_price, 2);
  // $discount_percent_formatted = $discount_percent."%";
  // $discount_formatted = "$".number_format($discount, 2);
  // $discount_price_formatted = "$".number_format($discount_price, 2);  

  // $product_description_escaped = htmlspecialchars($product_description);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="indexcss.css">
</head>
<body>
<main>
        <h1>Product Discount Calculator</h1>

        <label>Product Description:</label>
        <span><?php echo $product_description_escaped; ?></span> <br>

        <label>List Price:</label>
        <span><?php echo $list_price_formatted; ?></span> <br>

        <label>Standard Discount:</label>
        <span><?php echo $discount_percent_formatted; ?></span><br>

        <label>Discount Amount:</label>
        <span><?php echo $discount_formatted; ?></span> <br>

        <label>Discount Price:</label>
        <span><?php echo $discount_price_formatted; ?></span> <br>
    </main>

</body>
</html>