<?php
$category = loadModel('category');
$list = $category->category_list(['status' => 1]);
$str_catid = "";
foreach ($list as $row) {
    $str_catid .= "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}
?>

<?php require_once('views/header.php'); ?>
<form name="insert_cat" action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Thêm mới sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="THEM" class="btn btn-success btn-sm"><i class="far fa-save"></i>
                            Lưu[Thêm]</button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=product" role="button">
                            <i class="fas fa-times"></i> Thoát</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" required name="name" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="detail" required rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="metadesc" required rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ Khóa</label>
                                <textarea class="form-control" name="metakey" required rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Loại sản phẩm</label>
                                <select class="form-control" name="catid" required>
                                    <option value="">-- chọn loại sản phẩm --</option>
                                    <?php echo $str_catid; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">số lượng</label>
                                <input type="number" class="form-control" required name="number" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="">giá bán</label>
                                <input type="number" class="form-control" required name="price" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="">Giá khuyến mãi</label>
                                <input type="number" class="form-control" required name="pricesale" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1">Xuất bản</option>
                                    <option value="2" selected>Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<?php require_once('views/footer.php'); ?>