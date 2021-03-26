<?php
$product = loadModel('product');
$list = $product->product_list(['status' => 'index']);
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
                    <a class="btn btn-sm btn-success" href="index.php?option=product&cat=insert"><i
                            class="fas fa-plus"></i> Thêm</i></a>
                    <a class="btn btn-sm btn-danger" href="index.php?option=product&cat=trash"><i
                            class="far fa-trash-alt"> Thùng rác</i></a>
                </div>
            </div>
            <div class="card-body">
                <?php require_once("views/message.php"); ?>
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col" style="width:100px">Hình</th>
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
                                <?php if ($row['status'] == 1) : ?>
                                <a href="index.php?option=product&cat=status&id=<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i></a>
                                <?php else : ?>
                                <a href="index.php?option=product&cat=status&id=<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i></a>
                                <?php endif; ?>
                                <a href="index.php?option=product&cat=update&id=<?php echo $row['id']; ?>"
                                    class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                                <a href="index.php?option=product&cat=deltrash&id=<?php echo $row['id']; ?>"
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