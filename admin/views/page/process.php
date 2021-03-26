<?php
$post=loadModel('post');
$userid=(isset($_SESSION["userid"]))?$_SESSION["userid"]:1;
if(isset($_POST['THEM']))
{
    $slug = str_slug($_POST['title']);
    $data=array(
        'topid'=>$_POST["topid"],
        'title'=>$_POST["title"],
        'slug'=>$slug,
        'detail'=>$_POST["detail"],
        'type'=>$_POST["type"],
        'metakey'=>$_POST["metakey"],
        'metadesc'=>$_POST["metadesc"],
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$userid,
        'status'=>$_POST["status"],
        );
        //upload file
        if(strlen($_FILES["img"]["name"])==0)
        {
            set_flash('message',['type'=>'danger','msg' => 'Chưa chọn hình sản phẩm']);
            redirect("index.php?option=page");
        }
        $path_upload='../public/images/';
        $target_file =  $path_upload . basename($_FILES["img"]["name"]);
        $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $file_name=$slug.".".$type_file;
        if(in_array($type_file,['jpg','png','gif']))
        {
            move_uploaded_file($_FILES["img"]["tmp_name"],$path_upload.$file_name);
            $data['img']=$file_name;
            $post->post_insert($data);
            set_flash('message',['type'=>'success','msg' => 'Thêm thành công']);
            redirect("index.php?option=page");
        }
        else
        {
            set_flash('message',['type'=>'danger','msg' => 'Định dang tập tin không đúng']);
            redirect("index.php?option=page");

        }
        //echo$type_file;
        // $data['img']='tenhinh';
        // print_r($data);
}
if(isset($_POST['CAPNHAT']))
{
    $id=$_REQUEST["id"];
    $row=$post->post_row(['id'=>$id]);
    if($row==null)
    {
        set_flash('message',['type'=>'danger','msg' => 'Mẫu tin không tồn tại']);
        redirect("index.php?option=page");  
    }
    $slug = str_slug($_POST['title']);
    $data=array(
        'topid'=>$_POST["topid"],
        'title'=>$_POST["title"],
        'slug'=>$slug,
        'detail'=>$_POST["detail"],
        'type'=>$_POST["type"],
        'metakey'=>$_POST["metakey"],
        'metadesc'=>$_POST["metadesc"],
        'updated_at'=>date('Y-m-d H:i:s'),
        'updated_by'=>$userid,
        'status'=>$_POST["status"],
        );
        //upload file
        if(strlen($_FILES["img"]["name"])>0)
        {
            
            $path_upload='../public/images/';
            
            $target_file =  $path_upload . basename($_FILES["img"]["name"]);
            $type_file = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $file_name=$slug.".".$type_file;
            if(in_array($type_file,['jpg','png','gif']))
            {
                if(file_exists($path_upload.$row['img']))
                {
                    unlink($path_upload.$row['img']);
                }
                move_uploaded_file($_FILES["img"]["tmp_name"],$path_upload.$file_name);
                $data['img']=$file_name;
            }
        }
        $post->post_update($data, $id);
        set_flash('message',['type'=>'success','msg' => 'cập nhật thành công']);
        redirect("index.php?option=page");
}