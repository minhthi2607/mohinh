<?php
$category = loadModel('category');
$product = loadModel('product');
$pt = loadClass('Phantrang');
$slug = $_REQUEST['cat'];
$row_cat = $category->category_row(['slug' => $slug, 'status' => 1]);
$catid = $row_cat['id'];

$limit = 6;
$pageCurrent = $pt->pageCurrent();
$offset = $pt->pageOffset($pageCurrent, $limit);
$args = array(
    'status' => 1,
    'catid' => $catid,
    'sort' => ['orderby' => 'created_at', 'order' => 'DESC'],
    'offset' => $offset,
    'limit' => $limit
);
//hiện kiên kết trang
$total = $product->product_count($args);

$list = $product->product_list($args);
$title = $row_cat['name'];
?>
<?php require_once('views/header.php'); ?>
<section class="clearfix content">
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <?php require_once('views/mod-category.php'); ?>
            </div>
            <div class="col-md-9">
                <h2 class="text-center text-uppercase"><?php echo $title; ?></h2>
                <div class="row mt-1">
                    <?php foreach ($list as $row) : ?>
                    <div class="col-md-4 col-md mt-3 mb-5  ">

                        <div class="img-container " style="width: 100%">
                            <a href="index.php?option=product&id=<?php echo $row['slug']; ?>">
                                <img src="public/images/<?php echo $row['img']; ?>" class="card-img-top" alt="...">
                            </a>

                            <div class="card-body mt-3">
                                <a href="index.php?option=product&id=<?php echo $row['slug']; ?>">
                                    <h6 class="card-title text-center text-warning"><?php echo $row['name']; ?></h6>
                                </a>
                                <h5 class="text-danger text-center">
                                    <?php echo number_format($row['price']); ?><sup>đ</sup></h5>
                                <a href="index.php?option=cart&addcart=<?php echo $row['id']; ?>"
                                    class="btn btn-info ml-5">Đặt mua</a>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php echo $pt->pageLink($total, $pageCurrent, $limit, 'index.php?option=product&cat=' . $slug); ?>
            </div>
        </div>

    </div>
</section>

<?php require_once('views/footer.php'); ?>