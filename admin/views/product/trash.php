<?php
$product = loadModel('product');
$list = $product->product_list(['status' => 'trash']);
?>
<?php require_once('views/header.php'); ?>
<div class="content-wrapper my-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <strong class="text-danger">Danh sách sản phẩm</strong>
                </h3>

                <div class="card-tools">
                    <a class="btn btn-sm btn-danger" href="index.php?option=product"><i class="far fa-trash-alt">
                            Thoát</i></a>
                </div>
            </div>
            <div class="card-body">
                <?php require_once("views/message.php"); ?>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" style=width:120px;>Hình</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Phân Loại</th>
                            <th scope="col">Chức năng</th>
                            <th scope="col" style=width:20px;>ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                        <tr>
                            <th>
                                <img src="../public/images/<?php echo $row['img']; ?>" class="img-fluid" alt="">
                            </th>
                            <td><a href=""><?php echo $row['name']; ?></a></td>
                            <td><?php echo $row['catid']; ?></td>
                            <td>

                                <a href="index.php?option=product&cat=retrash&id=<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-info"><i class="fas fa-undo"></i></a>
                                <a href="index.php?option=product&cat=delete&id=<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                            <td class="text-center"><?php echo $row['id']; ?></td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<?php require_once('views/footer.php'); ?>