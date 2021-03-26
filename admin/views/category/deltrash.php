<?php
$category = loadModel('category');
$id = $_REQUEST["id"];

$row = $category->category_row(['id' => $id]);
if ($row == null) {
    set_flash('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);

    redirect("index.php?option=category");
}

$userid = (isset($_SESSION['userid'])) ? $_SESSION['userid'] : 1;
$data = array(
    'status' => 0,
    'updated_at' => date('Y-m-d H:i:s'),
    'updated_by' => $userid


);
$category->category_update($data, $id);
set_flash('message', ['type' => 'success', 'msg' => 'Thành công!']);

redirect("index.php?option=category");