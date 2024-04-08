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

// Lấy mã sản phẩm từ URL
$id = $_GET['id'];

// Xóa sản phẩm có mã sản phẩm tương ứng
$sql = "DELETE FROM dienthoai WHERE ma_sp='$id'";

if ($conn->query($sql) === TRUE) {
    // XÓa sản phẩm mới thành công, redirect về trang index.php
    header("Location: index.php");
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
