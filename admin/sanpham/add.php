<?php
$thongbao = ''; // Khởi tạo biến thông báo lỗi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tensp = trim($_POST['tensp']);
    $giasp = trim($_POST['giasp']);
    $giamoi = trim($_POST['giamoi']);
    $xuatxu = trim($_POST['xuatxu']);
    $soluong = trim($_POST['soluong']);

    // Kiểm tra nếu các trường dữ liệu không chứa khoảng trắng ở đầu và cuối chuỗi
    if (empty($tensp) || empty($giasp) || empty($giamoi) || empty($xuatxu) || empty($soluong)) {
        $thongbao = "Vui lòng điền đầy đủ thông tin.";
    } elseif (!preg_match("/^[A-Za-z0-9\s]+$/", $tensp)) {
        $thongbao = "Tên sản phẩm chỉ được chứa chữ, số và dấu cách.";
    } elseif (!preg_match("/^[0-9]+(?:\.[0-9]{1,2})?$/", $giasp)) {
        $thongbao = "Giá cũ sản phẩm không hợp lệ.";
    } elseif (!preg_match("/^[0-9]+(?:\.[0-9]{1,2})?$/", $giamoi)) {
        $thongbao = "Giá mới sản phẩm không hợp lệ.";
    } elseif (!preg_match("/^[A-Za-z0-9\s]+$/", $xuatxu)) {
        $thongbao = "Xuất xứ sản phẩm chỉ được chứa chữ, số và dấu cách.";
    } elseif (!preg_match("/^[0-9]+$/", $soluong)) {
        $thongbao = "Số lượng sản phẩm phải là số nguyên dương.";
    }

    if (empty($thongbao)) {
        // Nếu không có lỗi, tiếp tục xử lý dữ liệu và thực hiện các hành động cần thiết
    }
}
?>

<div class="form-container">
    <h2>Thêm sản phẩm</h2>
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <label for="">Danh Mục:</label>
        <select name="iddm" id="">
            <option value="0">--Chọn danh mục--</option>
            <?php 
            foreach($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
            }
            
            ?>
        </select>

        <label for="">Tên Sản Phẩm:</label>
        <input type="text" name="tensp" placeholder="Nhập tên sản phẩm..." required>

        <label for="">Giá Cũ:</label>
        <input type="text" name="giasp" placeholder="Nhập giá cũ sản phẩm..." required>

        <label for="">Giá Mới:</label>
        <input type="text" name="giamoi" placeholder="Nhập giá mới sản phẩm..." required>

        <label for="">Xuất xứ:</label>
        <input type="text" name="xuatxu" placeholder="Nhập giá xuất xứ sản phẩm..." required>

        <label for="">Số lượng:</label>
        <input type="text" name="soluong" placeholder="Nhập giá số lượng sản phẩm..." required>

        <label for="">Hình Ảnh:</label>
        <input type="file" name="hinh" required>

        <label for="">Mô Tả:</label>
        <textarea name="mota" id="" cols="30" rows="10"></textarea>

        <div class="btn">
            <input type="reset" value="RESET">
            <input type="submit" name="themmoi" value="THÊM MỚI SẢN PHẨM">
            <a href="index.php?act=listsp"><input type="" value="DANH SÁCH SẢN PHẨM"></a>
        </div>
        <div class="thongbao">
            <?php echo $thongbao; ?>
        </div>
    </form>
</div>
