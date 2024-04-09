Bước 1: Thiết kế cơ sở dữ liệu MySQL
Tạo một cơ sở dữ liệu MySQL với một bảng "dienthoai" bao gồm các trường: ma_sp, ten,gia,hinh,loai,nsx,ngay_tao,ngay_cap_nhap
Bước 2: Thiết kế giao diện HTML và CSS
Tạo các trang HTML cơ bản cho CRUD (ví dụ: index.php, create.php, edit.php).
Sử dụng CSS để thiết kế giao diện cho các trang này.
Bước 3: Lập trình CRUD với PHP
Read (Xem):
Trong index.php, kết nối cơ sở dữ liệu và truy vấn để lấy danh sách sản phẩm và hiển thị chúng.
Create (Tạo):
Trong create.php, tạo một form để người dùng nhập thông tin của sản phẩm mới và thêm dữ liệu vào cơ sở dữ liệu khi form được gửi đi.
Update (Cập nhật):
Trong edit.php, hiển thị một form điền thông tin sản phẩm hiện tại và cho phép người dùng cập nhật thông tin.
Xử lý form để cập nhật dữ liệu trong cơ sở dữ liệu khi form được gửi đi.
Delete (Xóa):
Trong index.php, cung cấp một nút hoặc link để xóa sản phẩm.
Xử lý yêu cầu xóa và thực hiện truy vấn xóa trong cơ sở dữ liệu.
Bước 4: Kết nối PHP với cơ sở dữ liệu MySQL
Trong các tệp PHP, sử dụng các hàm như mysqli_connect() và mysqli_query() để kết nối và thực hiện các truy vấn SQL.


Detail
Bước 1: Thiết kế cơ sở dữ liệu MySQL
    1. Mở trình quản lý cơ sở dữ liệu MySQL phpMyAdmin
    2. Tạo một cơ sở dữ liệu mới là: san_pham
    3. Chọn cơ sở dữ liệu mới tạo (san_pham) và tạo một bảng mới có tên là dienthoai.
        ma_sp: Mã sản phẩm, đây có thể là một số duy nhất hoặc một chuỗi ký tự, tùy thuộc vào cách bạn muốn tự định nghĩa.
        ten: Tên của điện thoại.
        gia: Giá của điện thoại.
        hinh: Đường dẫn đến hình ảnh của điện thoại.
        loai: Loại điện thoại, ví dụ: smartphone, feature phone, tablet, ...
        nsx: Nhà sản xuất (NSX) của điện thoại.
        ngay_tao: là trường để lưu ngày sản phẩm được tạo ra. Kiểu dữ liệu DATE đủ để lưu trữ ngày, không cần lưu trữ thời gian.
        ngay_cap_nhap: là trường để lưu ngày sản phẩm được cập nhật. Kiểu dữ liệu DATETIME được sử dụng để lưu trữ cả ngày và thời gian.

        CREATE TABLE dienthoai (
            ma_sp INT AUTO_INCREMENT PRIMARY KEY,
            ten VARCHAR(255) NOT NULL,
            gia DECIMAL(10, 2) NOT NULL,
            hinh VARCHAR(255),
            loai VARCHAR(100),
            nsx VARCHAR(100),
            ngay_tao DATETIME,
            ngay_cap_nhap DATETIME
        );

Bước 2: Kết nối PHP với cơ sở dữ liệu MySQL
    Trong các tệp PHP, sử dụng các hàm như mysqli_connect() và mysqli_query() để kết nối và thực hiện các truy vấn SQL.
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

Bước 3: Thiết kế giao diện HTML và CSS
    1. Tạo các trang HTML cơ bản cho CRUD (index.php, edit.php).
    2. Tạo file css: style (css cho trang index.php) và edit (css cho trang edit.php)


Bước 4: Lập trình CRUD với PHP
    1. Read (Xem):
    Trong index.php, kết nối cơ sở dữ liệu và truy vấn để lấy danh sách sản phẩm và hiển thị chúng.
    2. Create (Tạo):
    Trong index.php,
        Khi click vào button tạo điện thoại mởi,
        sẽ mở một form để người dùng nhập thông tin của sản phẩm mới và thêm dữ liệu vào cơ sở dữ liệu khi form được gửi đi.
        Luồng đi như sau: Khi click button -> mở popup -> Nhập dữ liệu vào form tương ứng-> click button tạo -> gọi tới xử lý create_process -> Tạo thành công, redirect về trang index.php
    3. Update (Cập nhật):
    Trong edit.php, hiển thị một form điền thông tin sản phẩm hiện tại và cho phép người dùng cập nhật thông tin.
    Xử lý form để cập nhật dữ liệu trong cơ sở dữ liệu khi form được gửi đi.
        Luồng đi như sau: Khi click button -> Mở trang edit -> Nhập dữ liệu vào form tương ứng-> click button Cập nhật -> gọi tới xử lý edit_process -> Câp nhật thành công, redirect về trang index.php

    4. Delete (Xóa):
        Trong index.php, cung cấp một nút hoặc link để xóa sản phẩm.
        Xử lý yêu cầu xóa và thực hiện truy vấn xóa trong cơ sở dữ liệu.
        Luồng đi như sau: Khi click button -> Xác nhận có xóa không ? -> click OK -> Gọi xử lý delete.php -> xóa sản phẩm thành công và redirect về trang index.php 

