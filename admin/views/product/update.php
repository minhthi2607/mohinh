<?php
$category = loadModel('category');
$product = loadModel('product');
$id = $_REQUEST["id"];
$row = $product->product_row(['id' => $id]);
$list2 = $product->product_list(['status' => 'index']);
$list = $category->category_list(['status' => 1]);
$str_catid1 = "";
$str_catid = "";
foreach ($list as $row2) {
    $str_catid1 .= "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
}
foreach ($list2 as $item) {
    if ($item['id'] == $row['catid']) {
        $str_catid .= "<option selected value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    } else {
        $str_catid .= "<option value='" . $item['id'] . "'>" . $item['name'] . "</option>";
    }
}
?>

<?php require_once('views/header.php'); ?>
<form name="insert_cat" action="index.php?option=product&cat=process&id=<?php echo $id ?>" method="post"
    enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập Nhật Sản Phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-success btn-sm"><i class="far fa-save"></i>
                            Lưu[Cập Nhật]</button>
                        <a class="btn btn-danger btn-sm" href="index.php?option=product" role="button">
                            <i class="fas fa-times"></i> Thoát</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" required name="name"
                                    value="<?php echo $row['name'] ?>" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="detail" required
                                    rows="3"><?php echo $row['detail'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" name="metadesc" required
                                    rows="3"><?php echo $row['metadesc'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ Khóa</label>
                                <textarea class="form-control" name="metakey" required
                                    rows="3"><?php echo $row['metakey'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Loại sản phẩm</label>
                                <select class="form-control" name="catid" required>
                                    <option value="">-- chọn loại sản phẩm --</option>
                                    <?php echo $str_catid1; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">số lượng</label>
                                <input type="number" class="form-control" required name="number"
                                    value="<?php echo $row['number'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">giá bán</label>
                                <input type="number" class="form-control" required name="price"
                                    value="<?php echo $row['price'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Giá khuyến mãi</label>
                                <input type="number" class="form-control" required name="pricesale"
                                    value="<?php echo $row['pricesale'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Hình ảnh</label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if ($row['status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Xuất bản</option>
                                    <option value="2" <?php if ($row['status'] == 2) {
                                                            echo "selected";
                                                        } ?>>Chưa xuất bản</option>
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