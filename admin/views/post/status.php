<?php 
$id = $_REQUEST["id"];
$post=loadModel('post');
$row=$post->post_row(['id'=>$id]);
if($row==null)
{
    set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
    redirect("index.php?option=post");  
}
 $tt=($row['status']==1)?2:1;
 $userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
 $data=array(
     'status'=>$tt,
     'updated_by'=>$userid,
     'updated_at'=>date('Y-m-d H:i:s')
 );
 $post->post_update($data,$id);
 set_flash('message',['type'=>'success','msg' => 'Thành công']);
 redirect("index.php?option=post");