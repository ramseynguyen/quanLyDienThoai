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

// Lấy dữ liệu từ biểu mẫu
$ten = $_POST['ten'];
$gia = $_POST['gia'];
$loai = $_POST['loai'];

// Tạo truy vấn SQL để chèn dữ liệu mới vào cơ sở dữ liệu
$sql = "INSERT INTO dienthoai (ten, gia, loai) VALUES ('$ten', '$gia', '$loai')";

if ($conn->query($sql) === TRUE) {
    // Thêm sản phẩm mới thành công, redirect về trang index.php
    header("Location: index.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
