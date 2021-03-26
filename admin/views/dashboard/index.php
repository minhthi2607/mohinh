 <?php
$contact= loadModel('contact');
 $list =$contact->contact_list(['status'=>'index']);
?>
 <?php require_once("views/header.php");?>
 <div class="content-wrapper my-2">
     <section class="content">
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">
                     <strong class=text-danger>Tiêu Đề</strong>
                 </h3>
                 <div class="card-tools">
                     <a class="btn btn-sm btn-success " href="#">
                         <i class="fas fa-plus-square"></i>
                         Thêm
                     </a>
                 </div>
             </div>
             <div class="card-body">
                 Nội dung
             </div>
         </div>
     </section>
 </div>
 <?php require_once("views/footer.php");?>