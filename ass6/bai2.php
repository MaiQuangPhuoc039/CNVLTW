<?php
error_reporting(0);
$so_luong_phan_tu = $_POST['so_phan_tu'];
$mang_so = array($so_luong_phan_tu);
for ($i = 0; $i < $so_luong_phan_tu; $i++) {
    $mang_so[$i]  = mt_rand(0, 50);
}

// xuat mang
function xuat($mang_so)
{
    echo implode(" ", $mang_so);
}

// tim max 
function tim_max($mang_so)
{
    if (isset($mang_so[0])) {
        $max = $mang_so[0];
        for ($i = 1; $i < count($mang_so); $i++) {
            if ($mang_so[$i] > $max) {
                $max = $mang_so[$i];
            }
        }
        echo $max;
    }
}

// tim min 
function tim_min($mang_so)
{
    if (isset($mang_so[0])) {
        $min = $mang_so[0];
        for ($i = 1; $i < count($mang_so); $i++) {
            if ($mang_so[$i] < $min) {
                $min = $mang_so[$i];
            }
        }
        echo $min;
    }
}

function sum($mang_so)
{
    $sum = 0;
    for ($i = 0; $i < count($mang_so); $i++) {
        $sum += $mang_so[$i];
    }
    echo $sum;
}

?>




<!DOCTYPE html>
<html>

<head>
    <title>PHÁT SINH MẢNG VÀ TÍNH TOÁN</title>
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
    <form action="bai2.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th colspan="2">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập số phần tử:</td>
                    <td><input type="text" name="so_phan_tu" width="100%" value="<?php echo $so_luong_phan_tu; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Phát sinh và tính toán"></td>
                </tr>
                <tr>
                    <td>Mảng: </td>
                    <td><input type="text" name="mang_so" disabled="disabled" value="<?php xuat($mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>GTLN ( MAX ) trong mảng: </td>
                    <td><input type="text" name="max" disabled="disabled" value="<?php tim_max($mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>GTNN ( MIN ) trong mảng: </td>
                    <td><input type="text" name="min" disabled="disabled" value="<?php tim_min($mang_so); ?>"></td>
                </tr>
                <tr>
                    <td>Tổng mảng: </td>
                    <td><input type="text" name="sum" disabled="disabled" value="<?php sum($mang_so); ?>"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>