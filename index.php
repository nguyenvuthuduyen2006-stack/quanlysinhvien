<?php
include "database.php";

$sql = "SELECT * FROM sinhvien";
$result = mysqli_query($conn, $sql);

$tong = 0;
$g = $k = $tb = $y = 0;
$hb = 0;

$max_php = $max_mysql = $max_html = 0;
$min_php = $min_mysql = $min_html = 10;
?>
<h2>DANH SÁCH SINH VIÊN</h2>

<a href="from_them.html">Thêm sinh viên</a>

<table border="1" cellpadding="10">
<tr>
    <th>MSV</th>
    <th>Họ tên</th>
    <th>ĐTB</th>
    <th>Xếp loại</th>
    <th>Học bổng</th>
    <th>Xóa</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { 

$dtb = ($row['php']*2 + $row['mysql']*2 + $row['html']) / 5;

if ($dtb >= 8) {
   $xl = "Giỏi";
   $g++;
}
elseif ($dtb >= 6.5) {
   $xl = "Khá";
   $k++;
}
elseif ($dtb >= 5) {
   $xl = "Trung bình";
   $tb++;
}
else {
   $xl = "Yếu";
   $y++;
}

// học bổng
$hb_text = ($dtb >= 8 && $row['php'] >= 7 && $row['mysql'] >= 7 && $row['html'] >= 7)
? "Đủ điều kiện" : "Không đủ";

// thống kê
$tong++;
if ($hb_text == "Đủ điều kiện") $hb++;
?>

<tr>
<td><?= $row['msv'] ?></td>
<td><?= $row['hoten'] ?></td>
<td><?= number_format($dtb,2) ?></td>
<td><?= $xl ?></td>
<td><?= $hb_text ?></td>
<td>
<a href="xoasv.php?msv=<?= $row['msv'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
</td>
</tr>

<?php } ?>
</table>
<p>Tổng sinh viên: <?= $tong ?></p>
<p>Giỏi: <?= $g ?> | Khá: <?= $k ?> | Trung bình: <?= $tb ?> | Yếu: <?= $y ?></p>
<p>Sinh viên có học bổng: <?= $hb ?></p>
