<?php
$title = "Trang chủ";
$category = loadModel('category');
$product = loadModel('product');
// goi lai đe chen loai san pham
$list_category = $category->category_list(['parentid' => 3, 'status' => 1]);
?>

<?php require_once('views/header.php'); ?>
<?php require_once('views/mod-slideshow.php'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <style>
    .sale-flash {
        position: absolute;
        left: 5px;
        top: 5px;
        width: 36px;
        height: 35px;
        z-index: 9;
        background: url(//bizweb.dktcdn.net/100/362/077/themes/746584/assets/sales.png?1576124007797) no-repeat;
        color: #FFF;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold
    }
    </style>
</head>
<section class="clearfix body1">
    <div class="container">

        <!-- --danh sach san pham -->
        <?php foreach ($list_category as $cat) : ?>

        <?php
            $catid = $cat['id'];
            // echo $catid;
            $args = array(
                'status' => 1,
                'catid' => $catid,
                'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
                'limit' => 8
            );
            $list = $product->product_list($args);
            ?>
        <!-- ten loai san phâm -->
        <div class="h4 mt-4">
            <div class="  text-center text-danger text-uppercase  "><?php echo $cat['name']; ?>
            </div>
        </div>

        <div class="row  ">

            <?php foreach ($list as $row) : ?>
            <div class=" col-md-3 col-6 my-3">

                <div class="img-container " style="width: 100%">
                    <!-- <div class="sale-flash">New </div> -->
                    <a href="index.php?option=product&id=<?php echo $row['slug']; ?>">
                        <img src="public/images/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                    </a>

                    <div class="card-body mt-3">
                        <a href="index.php?option=product&id=<?php echo $row['slug']; ?>">
                            <h6 class="card-title  text-warning"><?php echo $row['name']; ?></h6>
                        </a>
                        <h5 class="text-danger ">
                            <?php echo number_format($row['price']); ?><sup>đ</sup></h5>
                        <a href="index.php?option=cart&addcart=<?php echo $row['id']; ?>" class="btn btn-info">Đặt
                            mua</a>
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        </div>

        <?php endforeach; ?>
    </div>



</section> <?php require_once('views/footer.php'); ?>
