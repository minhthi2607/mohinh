<?php
$id=$_REQUEST["id"];
 $menu= loadModel('menu');
 $row=$menu->menu_row(['id'=>$id]);
 $list = $menu->menu_list(['status'=>1]);
 $str_parentid="";
 $str_orders="";
 foreach($list as $item)
 {
     if($item['id']==$row['parentid'])
     {
        $str_parentid.="<option selected value='".$item['id']."'>".$item['name']."</option>";
     }else
     {
        $str_parentid.="<option value='".$item['id']."'>".$item['name']."</option>";
     }
     
     $str_orders.="<option value='".$item['orders']."'>Sau: ".$item['name']."</option>";
 }
?>
<?php include('views/header.php');?>
<form name="form1" action="index.php?option=menu&cat=process&id=<?php echo $id;?>" method="post">
    <div class="content-wrapper my-2">
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong class="text-uppercase text-danger">Cập nhật Menu</strong>
                    </h3>
                    <div class="card-tools">
                        <button type="submit" name="CAPNHAP" class="btn btn-sm btn-success"><i
                                class="far fa-save"></i>Cập nhật</i></button>
                        <a href="index.php?option=menu" class="btn btn-sm btn-danger"><i
                                class="fas fa-times">Thoát</i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên Menu</label>
                                <input type="text" class="form-control" value="<?php echo $row['name'];?>" name="name"
                                    placeholder="Tên menu">

                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input type="text" class="form-control" value="<?php echo $row['link'];?>" name="link"
                                    placeholder="Liên kết">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Menu cấp cha</label>
                                <select class="form-control" name="parentid">
                                    <option value="0">Chọn menu</option>
                                    <?php echo $str_parentid;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Vị trí </label>
                                <select class="form-control" name="position">
                                    <option value="mainmenu">Main Menu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thứ tự </label>
                                <select class="form-control" name="orders">
                                <option value="1" <?php if($row['status']==1){echo 'selected';} ?>>1</option>
                                    <option value="0" <?php if($row['status']==0){echo 'selected';} ?>>0
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1" <?php if($row['status']==1){echo 'selected';} ?>>Xuất bản</option>
                                    <option value="2" <?php if($row['status']==2){echo 'selected';} ?>>Chưa xuất bản
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
        </section>

    </div>
</form>
<?php include('views/footer.php');?>