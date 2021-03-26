<?php
$category = loadModel('category');
$list_category1 = $category->category_list(['parentid' => 0, 'status' => 1]);
?>
<h3><i class=" text-danger mt-3"></i> DANH MỤC LOẠI SẢN PHẨM</h3>
<div class="menu">
    <ul>
        <?php foreach ($list_category1 as $row_cat1) : ?>

        <li>
            <a class="mt-3" href="index.php?option=product&cat=<?php echo $row_cat1['slug']; ?>">
                <?php echo $row_cat1['name']; ?>
            </a>
            <?php
                $list_category2 = $category->category_list(['parentid' => $row_cat1['id'], 'status' => 1]);
                ?>
            <?php if (count($list_category2)) : ?>
            <ul>
                <?php foreach ($list_category2 as $row_cat2) : ?>
                <li><a
                        href="index.php?option=product&cat=<?php echo $row_cat2['slug']; ?>"><?php echo $row_cat2['name']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>