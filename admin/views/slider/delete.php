<?php 
$id = $_REQUEST["id"];
$slider=loadModel('slider');
$row=$slider->slider_row(['id'=>$id,'status'=>0]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
    redirect("index.php?option=slider&cat=trash");  
}
if(file_exists('../public/images/slider/'.$row['img']))
{
    unlink('../public/images/slider/'.$row['img']);
}
 $slider->slider_delete($id);
 set_flash('message',['type'=>'success','msg' => 'Thành công']);
 redirect("index.php?option=slider&cat=trash");