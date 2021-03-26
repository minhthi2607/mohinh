<?php
$product = loadModel('product');
$category = loadModel('category');
$slug = $_REQUEST['id'];
$row = $product->product_row(['slug' => $slug, 'status' => 1]);
$catid = $row['catid'];
$args = array(
    'status' => 1,
    'not_id' => $row['id'],
    'catid' => $catid,
    'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
    'limit' => 4
);
$list_other = $product->product_list($args);
$title = $row['name'];
?>
<?php require_once('views/header.php'); ?>
<section class="clearfix content my-3 ">
    <div class="container">
        <div class="row product detail">
            <div class="col-md-6">
                <img class="img-fluid" src="public/images/<?php echo $row['img']; ?>" clas="card-img-top"
                    alt="<?php echo $row['img']; ?>">

            </div>
            <div class="col-md-6 text-center">
                <h1 class="text-center text-info"><?php echo $row['name']; ?></h1>
                <h3><?php echo str_limit($row['metadesc'], 250); ?></h3>
                <h2 class="text-danger text-center">Giá <?php echo number_format($row['price']); ?><sup>đ</sup></h2>
                <form action="index.php?option=cart&addcart=<?php echo $row['id']; ?>" method="post">
                    <input type="number" value="1" name="qty" min="1" max="10" />
                    <button type="submit " class="btn btn-info btn-sm" name="DATMUA">Đặt mua</button>
                </form>
            </div>
        </div>
        <h3 class="mt-5">Chi tiết sản phẩm</h3>
        <div class="row product detail">

            <div class="col-12">
                <?php echo $row['detail']; ?>
            </div>
        </div>
        <div class="fb-like mt-4" data-href="index.php?option=product&id=<?php echo $row['slug']; ?>" data-width=""
            data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
        <div class="binhluan">
            <div class="fb-comments" data-href="index.php?option=product&id=<?php echo $row['slug']; ?>"
                data-numposts="5" data-width="100%"></div>
        </div>
        <h3 class="mt-4 mb-3">Sản phẩm liên quan</h3>
        <div class="row product detail">

            <?php foreach ($list_other as $item) : ?>
            <div class=" class col-md-3 col-3 border ">
                <a href=" index.php?option=product&id=<?php echo $item['slug']; ?>" class=" text-decoration-none ">
                    <img class="img-fluid" src="public/images/<?php echo $item['img']; ?>" clas="card-img-top"
                        alt="<?php echo $item['img']; ?>">
                    <h6 class="card-title text-secondary text-center">
                        <a class="text-warning" href="index.php?option=product&id=<?php echo $item['slug']; ?>">
                            <?php echo $item['name']; ?>
                    </h6>
                    <h6 class="card-text  text-danger  mb-3">
                        <?php echo number_format($item['price']); ?><sup>đ</sup>
                    </h6>
                    <a href="index.php?option=cart&addcart=<?php echo $item['id']; ?>" class="btn btn-info h6">Mua
                        hàng</a>

                </a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>
<?php require_once('views/footer.php'); ?>