<?php
error_reporting(0);
 $nhap = $_POST['nhap_mang'];
$ket_qua = 0;

if (isset($_POST['btn_sum'])) {
   
    $mang = explode(",", $_POST['nhap_mang']);
    //    $cou = count($mang);
    for ($i = 0; $i < count($mang); $i++) {
        $ket_qua +=  $mang[$i];
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Nhập và tính toán trên dãy số</title>
    <meta charset="utf-8">
    <style>
        * {
            font-family: Tahoma;
        }

        table {
            width: 400px;
            margin: 100px auto;
        }

        table th {
            background: #66CCFF;
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>


    <form method="POST" action="bai1.php">
        <table>
            <thead>
                <tr>
                    <th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập dãy số:</td>
                    <td><input type="text" name="nhap_mang" value="<?php echo $nhap;  ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn_sum" value="Tổng dãy số"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td><input type="text" name="ket_qua" disabled="disabled" value="<?php echo $ket_qua ?>"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>