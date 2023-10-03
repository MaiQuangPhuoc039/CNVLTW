<?php  
   // get data from index
   $inves = filter_input(INPUT_POST , 'investment', FILTER_VALIDATE_FLOAT);
   $interest = filter_input(INPUT_POST, 'interest_rate' , FILTER_VALIDATE_FLOAT);
   $years = filter_input(INPUT_POST , 'years', FILTER_VALIDATE_INT);
   
//    error 
if($inves == NULL || $inves == false ){
    $error_message = "investment must be a valid number";
}else if($inves < 0 ){
    $error_message = "investment must be greater than zero ";
}

else if($interest == NULL || $interest == false ){
    $error_message = "interest must be a valid number";
}else if($interest < 0 ){
    $error_message = "interest must be greater than zero ";
}

else if($years == NULL || $years == false ){
    $error_message = "years must be a valid number";
}else if($years < 0 ){
    $error_message = "years must be greater than zero ";
}
else{
    $error_message= '';
}

if($error_message != ''){
    include('index.php');
    die();
}
 
//   calulate 
$future_value = $inves;
for($i  =1 ; $i <= $years ; $i++){
    $future_value  += $future_value * $interest *.01;
}

// format
 $inves_f = '$'.number_format($inves, 2);
 $interest_f = $interest."%";
 $future_value_f = '$'.number_format($future_value,2);

?>



<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $inves_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $interest_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
</body>
</html>