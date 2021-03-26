<?php
$slider = loadModel('slider');
$list_slider = $slider->slider_list(['status' => 1, 'position' => 'slidershow']);
?>
<section class="clearfix slideshow">
    <div class="container">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <?php $index = 0; ?>
                <?php foreach ($list_slider as $row_slider) : ?>
                <?php if ($index == 0) : ?>
                <div class="carousel-item active">
                    <img src="public/images/<?php echo $row_slider['img']; ?>" class="d-block w-100">
                </div>
                <?php else : ?>
                <div class="carousel-item ">
                    <img src="public/images/<?php echo $row_slider['img']; ?>" class="d-block w-100">
                </div>
                <?php endif; ?>

                <?php $index++; ?>
                <?php endforeach; ?>


            </div>
        </div>
        <a class="  -control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</section>