<?php
error_reporting(0);
$nhap = $_POST['nhap_mang'];
$mang_so = array();
$mang_duy_nhat = array();
$so_lan_xuat_hien = array();
if (isset($_POST['nhap_mang'])) {
    $mang_so = explode(",", $_POST['nhap_mang']);
    $so_lan_xuat_hien = array_count_values($mang_so);
    $mang_duy_nhat = array_unique($mang_so);
}

function so_lan_xuat_hien($so_lan_xuat_hien)
{
    foreach ($so_lan_xuat_hien as $item => $value) {
        echo $item . ":" . $value . " ";
    }
}

function mang_duy_nhat($mang_duy_nhat)
{
    foreach ($mang_duy_nhat  as $item) {
        echo $item . " ";
    }
}



?>






<!DOCTYPE html>
<html>

<head>
    <title>ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG DUY NHẤT</title>
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

        input {
            width: 100%;
        }
    </style>
</head>

<body>
    <form action="bai3.php" method="POST">
        <table border="0">
            <thead>
                <tr>
                    <th colspan="2">ĐẾM SỐ LẦN XUẤT HIỆN VÀ TẠO MẢNG
                        DUY NHẤT</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mảng:</td>
                    <td><input type="text" name="nhap_mang" value="<?php echo $nhap; ?>"></td>
                </tr>
                <tr>
                    <td>Số lần xuất hiện:</td>
                    <td><input type="text" name="so_lan_xuat_hien" value="<?php so_lan_xuat_hien($so_lan_xuat_hien); ?>" disabled="disabled"></td>
                </tr>

                <tr>
                    <td>Mảng duy nhất:</td>
                    <td><input type="text" name="mang_duy_nhat" value="<?php mang_duy_nhat($mang_duy_nhat); ?>" disabled="disabled"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Thực hiện"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>