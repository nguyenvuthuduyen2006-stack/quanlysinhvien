<?php
include "database.php";

$msv = $_GET['msv'];

mysqli_query($conn, "DELETE FROM sinhvien WHERE msv='$msv'");

header("Location: index.php");
exit;
?>