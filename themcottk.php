<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "quanlysinhvien"
);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

$sql = "
SELECT
    MAX((php*2 + mysql*2 + html)/5) AS maxdtb,
    MIN((php*2 + mysql*2 + html)/5) AS mindtb,
    AVG((php*2 + mysql*2 + html)/5) AS avgdtb
FROM sinhvien
";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thống kê điểm</title>
</head>
<body>

<h2>THỐNG KÊ ĐIỂM TRUNG BÌNH</h2>

<p>Điểm cao nhất: <?= $row['maxdtb'] ?></p>
<p>Điểm thấp nhất: <?= $row['mindtb'] ?></p>
<p>Điểm trung bình: <?= $row['avgdtb'] ?></p>

<a href="index.php">Quay lại</a>

<h3>THỐNG KÊ</h3>

<p>Tổng sinh viên: <?= $tong ?></p>
<p>Giỏi: <?= $g ?> | Khá: <?= $k ?> | Trung bình: <?= $tb ?> | Yếu: <?= $y ?></p>
<p>Sinh viên có học bổng: <?= $hb ?></p>

</body>
</html>