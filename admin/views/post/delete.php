<?php 
$id = $_REQUEST["id"];
$post=loadModel('post');
$row=$post->post_row(['id'=>$id,'status'=>0]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
    redirect("index.php?option=post&cat=trash");  
}
if(file_exists('../public/images/post/'.$row['img']))
{
    unlink('../public/images/post/'.$row['img']);
}
 $post->post_delete($id);
 set_flash('message',['type'=>'success','msg' => 'Thành công']);
 redirect("index.php?option=post&cat=trash");