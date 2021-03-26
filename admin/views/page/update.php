<?php
$topic= loadModel('topic');
$post= loadModel('post');
$id=$_REQUEST["id"]; 
$row=$post->post_row(['id'=>$id]);
$listtopic = $topic->topic_list(['status'=>1]);
$strtopid="";
foreach($listtopic as $item)
{
    if($item['id']==$row['topid'])
    {
    $strtopid.="<option selected value='".$item['id']."'>".$item['name']."</option>";

    }else{
    $strtopid.="<option value='".$item['id']."'>".$item['name']."</option>";
    }
}
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=page&cat=process&id=<?php echo $id;?>" method="post"
    enctype="multipart/form-data">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-danger">Cập nhật sản phẩm</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAT" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Cập Nhật</i></button>
                        <a href="index.php?option=page" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="form-group">
                                <label for="">Tên bài viết</label>
                                <input type="text" value="<?php echo $row['title'];?>" class="form-control" required
                                    name="title" placeholder="Tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="">Chi tiết bài viết</label>
                                <textarea class="form-control" required name="detail"
                                    rows="3"><?php echo $row['detail'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control" required name="metadesc"
                                    rows="3"><?php echo $row['metadesc'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Từ khóa</label>
                                <textarea class="form-control" required name="metakey"
                                    rows="3"><?php echo $row['metakey'];?></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Kiểu chủ đề</label>
                                <select class="form-control" name="topid" required>
                                    <option value="">Chọn kiểu chủ đề</option>
                                    <?php echo $strtopid;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kiểu bài viết</label>
                                <select class="form-control" name="type">
                                    <option value="page" <?php if($row['type']=='page'){echo"selected";}?>>page</option>
                                    <option value="post" <?php if($row['type']=='post'){echo"selected";}?>>post
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Hình đại diện</label>
                                <input type="file" class="form-control" name="img">
                            </div>

                            <div class="form-group">
                                <label for="">Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status']==1){echo"selected";}?>>Xuất bản</option>
                                    <option value="2" <?php if($row['status']==2){echo"selected";}?>>Chưa xuất bản
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<?php include('views/footer.php');?>