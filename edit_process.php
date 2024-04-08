<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "san_pham";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$ma_sp = $_POST['ma_sp'];
$ten = $_POST['ten'];
$gia = $_POST['gia'];
$loai = $_POST['loai'];

// Cập nhật thông tin sản phẩm vào cơ sở dữ liệu
$sql = "UPDATE dienthoai SET ten='$ten', gia='$gia', loai='$loai' WHERE ma_sp='$ma_sp'";

if ($conn->query($sql) === TRUE) {
    // Cập nhật sản phẩm mới thành công, redirect về trang index.php
    header("Location: index.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
