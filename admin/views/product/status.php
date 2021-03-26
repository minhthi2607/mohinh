<?php 
$id = $_REQUEST["id"];
$product= loadModel('product');
$row =$product ->product_row(['id'=>$id]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg'=>'thất bại']);
    redirect("index.php?option=product");
}
$stt=($row['status']==1)?2:1;
$userid=(isset($_SESSION["userid"]))? $_SESSION["userid"]:1;
$data=array(
'status'=>$stt,
'updated_by'=>$userid,
'updated_at'=>date('Y-m-d H:i:s')
);
$product->product_update($data,$id);
set_flash('message',['type'=>'success','msg'=>'thành công']);
redirect("index.php?option=product");