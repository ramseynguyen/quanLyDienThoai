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

// Truy vấn để lấy thông tin sản phẩm có mã sản phẩm tương ứng
$sql = "SELECT * FROM dienthoai WHERE ma_sp='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="styles/edit.css">
</head>
<body>
    <h1>Chỉnh sửa sản phẩm</h1>
    <form action="edit_process.php" method="POST">
        <input type="hidden" name="ma_sp" value="<?php echo $row['ma_sp']; ?>">
        <label for="ten">Tên:</label>
        <input type="text" id="ten" name="ten" value="<?php echo $row['ten']; ?>" required><br>
        <label for="gia">Giá:</label>
        <input type="text" id="gia" name="gia" value="<?php echo $row['gia']; ?>" required><br>
        <label for="loai">Loại:</label>
        <input type="text" id="loai" name="loai" value="<?php echo $row['loai']; ?>"><br>
        <input type="submit" value="Cập nhật">
    </form>
    <a href="index.php">Quay lại</a>
</body>
</html>

<?php
$conn->close();
?>
