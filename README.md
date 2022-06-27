Dùng xampp tạo bảng product.
1: Chạy lệnh php artisan migrate để cập nhật bảng product vào CSDL.
2: Chạy lệnh php artisan db:seed để cập nhật dữ liệu ảo vào CSDL.
3: Chạy lẹnh php artisan backup:data để backup dữ liệu hoặc có thể bỏ qua bước này và sang bước 4.
4: Chạy lệnh php artisan schedule:work để có thể chạy tự động mỗi phút 1 lần backup dữ liệu mới.
    - Các file backup nằm ở thư mục backup.
