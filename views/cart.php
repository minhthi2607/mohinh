<?php
$cart = loadClass('cart');
$product = loadModel('product');
//them gio hang
if (isset($_REQUEST['addcart'])) {
    $id = $_REQUEST['addcart'];
    $row = $product->product_row(['id' => $id, 'status' => 1]);
    // xu ly so luong
    $qty = (isset($_POST['DATMUA'])) ? $_POST['qty'] : 1;
    $data = array(
        'id' => $id,
        'name' => $row['name'],
        'img' => $row['img'],
        'price' => $row['price'],
        'qty' => $qty,
        'amount' => ($row['price'] * $qty)
    );
    $cart->cart_add($data);
    redirect("index.php?option=cart");
}
// xoa gio hang
if (isset($_REQUEST['delcart'])) {
    $id = $_REQUEST['delcart'];
    if ($id == 'all') {
        $cart->cart_delete();
    } else {
        $cart->cart_delete($id);
    }

    redirect("index.php?option=cart");
}
// update gio hang
if (isset($_REQUEST['updatecart']) && isset($_POST['CAPNHAT'])) {
    $qty = $_POST['qty'];
    $cart_list = $cart->cart_content();
    $i = 0;
    $data = array();
    foreach ($cart_list as $cart_row) {
        $row = array(
            'id' => $cart_row['id'],
            'qty' => $qty[$i]
        );
        $data[] = $row;
        $i++;
    }
    $cart->cart_update($data);
    redirect("index.php?option=cart");
}
?>
<?php
$cart_list = $cart->cart_content();
?>
<?php require_once('views/header.php'); ?>

<section class="clearfix body1">
    <div class="container">


        <?php if ($cart_list != null) : ?>
        <h3 class="text-center text-info">Giỏ Hàng</h3>
        <form action="index.php?option=cart&updatecart=1" method="post">
            <table class="table table-bordered table-hover my-3">
                <tr>
                    <td>Mã</td>
                    <td style="width:50px;">Hình</td>
                    <td>Tên sản phẩm</td>
                    <td>Giá</td>
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
                    <td></td>
                </tr>
                <?php $total_money = 0; ?>
                <?php foreach ($cart_list as $cart_row) : ?>
                <tr>
                    <td><?php echo $cart_row['id']; ?></td>
                    <td> <img class="img-fluid" src="public/images/<?php echo $cart_row['img']; ?>" clas="card-img-top"
                            alt="<?php echo $cart_row['img']; ?>"></td>
                    <td><?php echo $cart_row['name']; ?></td>
                    <td> <?php echo number_format($cart_row['price']); ?></td>
                    <td><input min="1" max="10" name="qty[]" type="number" value="<?php echo $cart_row['qty']; ?>"></td>
                    <td><?php echo  number_format($cart_row['amount']); ?></td>
                    <td class="text-center">
                        <a href="index.php?option=cart&delcart=<?php echo $cart_row['id']; ?>"
                            class=" btn btn-danger btn-xs">
                            <i class="fas fa-eraser"></i></a>
                    </td>
                </tr>
                <?php $total_money += $cart_row['amount']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">
                        <button class="btn btn-success " name="CAPNHAT" type="submit"> Cập nhật</button>
                        <a class="btn btn-danger btn-md" href="index.php?option=cart&delcart=all">Xóa giỏ hàng</a>

                    </td>
                    <td colspan=" 3" class="text-right">Tổng tiền</>
                    <td colspan="2">
                        <strong><?php echo  number_format($total_money); ?></strong>
                    </td>
                </tr>
            </table>
        </form>
        <a href=" index.php" class="btn btn-success "> Tiếp tục mua sắm</>
        </a>
        <a href="index.php?option=cart&cat=buy" class="btn btn-info">Thanh toán</a>

        <?php endif; ?>
    </div>





</section>

<?php require_once('views/footer.php'); ?>