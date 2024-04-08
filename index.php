<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm điện thoại</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
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

    // Truy vấn để lấy danh sách sản phẩm
    $sql = "SELECT * FROM dienthoai";
    $result = $conn->query($sql);

    // Kiểm tra và hiển thị danh sách sản phẩm
    echo "<button class='add-button' onclick='openCreateForm()'>Tạo điện thoại mới</button>";

    // Create Popup Form
    echo '<div id="createFormPopup" class="create-form-popup">
        <form action="create_process.php" method="post" class="form-container">
            <h2>Tạo điện thoại mới</h2>
            <label for="ma_sp">Mã SP:</label>
            <input type="text" id="ma_sp" name="ma_sp" required>
            <label for="ten">Tên:</label>
            <input type="text" id="ten" name="ten" required>
            <label for="gia">Giá:</label>
            <input type="text" id="gia" name="gia" required>
            <label for="loai">Loại:</label>
            <input type="text" id="loai" name="loai" required>

            <button type="submit">Tạo</button>
            <button type="button" onclick="closeCreateForm()">Hủy</button>
        </form>
    </div>';

    echo "<table>
            <tr>
                <th>Mã SP</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Loại</th>
                <th>Thao tác</th>
            </tr>";
    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu từ các hàng của bảng
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["ma_sp"]."</td>
                    <td>".$row["ten"]."</td>
                    <td>".$row["gia"]."</td>
                    <td>".$row["loai"]."</td>
                    <td>
                        <a href='edit.php?id=".$row["ma_sp"]."'>Chỉnh sửa</a> |
                        <a href='#' onclick='confirmDelete(\"".$row["ma_sp"]."\")'>Xóa</a>
                    </td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Không có sản phẩm nào.</td></tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <script>
        // Mở form tạo điện thoại mới khi click vào button tạo điện thoại mới
        function openCreateForm() {
            document.getElementById("createFormPopup").style.display = "block";
        }

        // Đóng form
        function closeCreateForm() {
            document.getElementById("createFormPopup").style.display = "none";
        }

        // Confirm có xóa sản phẩm không?
        function confirmDelete(ma_sp) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        if (confirmation) {
            // Xóa sản phẩm
            window.location.href = 'delete.php?id=' + ma_sp;
        } else {
            // Không xóa sản phẩm, quay về page hiện tại
            return false;
        }
    }
    </script>
</body>
</html>
