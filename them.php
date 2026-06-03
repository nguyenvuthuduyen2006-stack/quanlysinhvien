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

if (isset($_POST['btnThem'])) {

    $msv = $_POST['msv'];
    $hoten = $_POST['hoten'];
    $php = $_POST['php'];
    $mysql = $_POST['mysql'];
    $html = $_POST['html'];

    if (
        $msv == "" || $hoten == "" ||
        $php == "" || $mysql == "" || $html == ""
    ) {
        $thongbao = "Không được để trống!";
    }
    else {

        $check = mysqli_query($conn,
            "SELECT * FROM sinhvien WHERE msv='$msv'"
        );

        if (mysqli_num_rows($check) > 0) {
            $thongbao = "MSV đã tồn tại!";
        } else {

            $sql = "INSERT INTO sinhvien(msv,hoten,php,mysql,html)
                    VALUES('$msv','$hoten','$php','$mysql','$html')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: index.php");
                exit();
            } else {
                $thongbao = "Lỗi: " . mysqli_error($conn);
            }
        }
    }
}
?>

<p style="color:red;">
    <?= $thongbao ?>
</p>

<a href="from_them.html">Quay lại</a>