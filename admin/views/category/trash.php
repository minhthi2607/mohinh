 <?php
    $category = loadModel('category');
    $list = $category->category_list(['status' => 'trash', 'sort' => ['orderby' => 'created_at', 'order' => 'DESC']]);
    ?>
 <?php require_once("views/header.php"); ?>
 <div class="content-wrapper my-2">
     <section class="content">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">
                     <strong class=text-danger>Thùng rác loại sản phẩm</strong>
                 </h3>
                 <div class="card-tools">

                     <a class="btn btn-sm btn-danger " href="index.php?option=category">
                         <i class="fas fa-times "></i>

                         Thoát</a>
                 </div>
             </div>
             <div class="card-body">
                 <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                     <?php require_once('views/message.php'); ?>
                     <table class="table table-bordered dataTable no-footer" id="myTable" role="grid"
                         aria-describedby="myTable_info">
                         <thead>
                             <tr role="row">
                                 <th class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1"
                                     aria-sort="ascending"
                                     aria-label="Tên loại sản phẩm: activate to sort column descending"
                                     style="width: 608px;">Tên loại sản phẩm</th>
                                 <th style="width:160px" class="text-center sorting" tabindex="0"
                                     aria-controls="myTable" rowspan="1" colspan="1"
                                     aria-label="Chức năng: activate to sort column ascending">
                                     Chức năng</th>
                                 <th style="width:30px" class="text-center sorting" tabindex="0" aria-controls="myTable"
                                     rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending">ID</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($list as $row) : ?>
                             <tr role="row" class="odd">
                                 <td class="sorting_1"><a href="category_update.php"> <?php echo $row['name']; ?></a>
                                 </td>
                                 <td class="text-center">


                                     <a class="btn btn-info btn-sm"
                                         href="index.php?option=category&cat=retrash&id= <?php echo $row['id']; ?>">

                                         <i class="fas fa-trash-restore"></i>
                                     </a>
                                     <a class="btn btn-sm btn-danger "
                                         href="index.php?option=category&cat=delete&id= <?php echo $row['id']; ?>">
                                         <i class="fas fa-trash-alt"></i>
                                     </a>
                                 </td>
                                 <td class="text-center"><?php echo $row['id']; ?></td>
                             </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>

                 </div>
             </div>
     </section>
 </div>
 <script>
$(document).ready(function() {
    $('#myTable').DataTable();
});
 </script>
 <?php require_once("views/footer.php"); ?>