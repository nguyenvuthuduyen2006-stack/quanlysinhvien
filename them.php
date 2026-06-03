<?php
include "database.php";

$thongbao = "";

if (isset($_POST['btnThem'])) {

    $msv = trim($_POST['msv']);
    $hoten = trim($_POST['hoten']);
    $php = $_POST['php'];
    $mysql = $_POST['mysql'];
    $html = $_POST['html'];

    if (
        $msv == "" || $hoten == "" ||
        $php === "" || $mysql === "" || $html === ""
    ) {
        $thongbao = "Không được để trống!";
    }
    elseif (
        $php < 0 || $php > 10 ||
        $mysql < 0 || $mysql > 10 ||
        $html < 0 || $html > 10
    ) {
        $thongbao = "Điểm phải từ 0 - 10!";
    }
    else {

        $check = mysqli_query($conn, "SELECT * FROM sinhvien WHERE msv='$msv'");

        if (mysqli_num_rows($check) > 0) {
            $thongbao = "MSV đã tồn tại!";
        } else {

            mysqli_query($conn,
                "INSERT INTO sinhvien VALUES('$msv','$hoten','$php','$mysql','$html')"
            );

            $thongbao = "Thêm thành công!";
        }
    }
}

echo $thongbao;
?>
<br>
<a href="index.php">Xem danh sách</a>