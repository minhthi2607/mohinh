<?php
$category = loadModel('category');
$id = $_REQUEST["id"];

$row = $category->category_row(['id' => $id]);
if ($row == null) {
    set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);

    redirect("index.php?option=category&cat=trash");
}

$category->category_delete( $id);
set_flash('message', ['type' => 'success', 'msg' => 'Xóa thành công!']);

   redirect("index.php?option=category&cat=trash");