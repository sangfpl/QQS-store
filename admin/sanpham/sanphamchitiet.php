<div class="form-container">
    <h2>Chi tiết sản phẩm</h2>
        <select name="iddm" id="">
            <?php
            foreach ($listdanhmuc  as $danhmuc) {
                extract($danhmuc);
                echo ' <option value="' . $id . '">' . $name . '</option>';
            }
            ?>
        </select>
    <div class="contents">
        <div class="content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Mã loại</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá cũ</th>
                    <th>Giá mới</th>
                    <th>Xuất xứ</th>
                    <th>Số lượng</th>
                    <th>Danh mục</th>
                    <th>Mô tả</th>
                    <th>Tùy chỉnh</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($product_details as  $spct) :
                        extract($product_details);
                        $hinhpath = "../upload/" . $hinh;
                    if(is_file($hinhpath)){
                        $hinh = "<img src ='" . $hinhpath . "' height='80'>";
                    }else{
                        $hinh = "no photo";
                    }
                       

                    ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?=$name?></td>
                            <td><?=$hinh?></td>
                            <td><?=$price?></td>
                            <td><?=$newprice?></td>
                            <td><?=$xuatxu?></td>
                            <td><?=$soluong?></td>
                            <td><?=$iddm?></td>
                            <td><?=$mota?></td>
                        </tr>
                        
                    <?php break; endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- <input type="submit" class="submit" value="THÊM MỚI DANH MỤC"> -->
        <!-- <a href=""  ><input type="button" class="submit" value="THÊM MỚI SẢN PHẨM"></a> -->

    </div>
</div>