<?php
$id = $_REQUEST["id"];
$product = loadModel('product');
$row = $product->product_row(['id' => $id, 'status' => 0]);



if (file_exists('../public/images/product/' . $row['img'])) {
    unlink('../public/images/product/' . $row['img']);
}
$product->product_delete($id);
set_flash('message', ['type' => 'success', 'msg' => 'thành công']);
redirect("index.php?option=product&cat=trash");
