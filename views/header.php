<!doctype html>
<html lang="en">

<head>
    <title><?php if (isset($title)) {
                echo $title;
            } else {
                echo "Otaku shop";
            } ?> </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">


</head>

<body>
    <!-- facebook -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0"
        nonce="F0UdoJHW"></script>
    <!-- facebook -->
    <?php $product = loadModel('product');
    ?>
    <section class=" clearfix mainmenu">

        <div class="container ">

            <!-- logo mobile -->
            <nav class="navbar navbar-expand-lg navbar-light  "><a href=" index.php"
                    class="navbar-brand d-md-none d-sm-block"><svg class="bi bi-house-fill" width="1em" height="1em"
                        viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"></svg><img
                        class="img-fluid" src="public/images/icon/logo.jpg" width="40" height="40 "></a><button
                    class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- logo mobile -->



                    <?php require_once('views/mod-mainmenu.php'); ?>
                    <div class="navbar " id="myTable">
                        <div class="class mr-2 text-secondary">
                            <?php if (isset($_SESSION['fullname_customer'])) : ?>
                            <div> <i class="fas fa-user mr-1 "></i>
                                <?php echo $_SESSION['fullname_customer']; ?>


                                <a class="mr-1 text-dark" href="index.php?option=customer&cat=logout">Thoát
                                </a></div>
                            <?php else : ?>
                            <a class="mr-1 text-dark" href="index.php?option=customer&cat=login"><i
                                    class="fas fa-sign-in-alt mr-1"></i>Đăng nhập
                            </a>
                            <a class="mr-1 text-dark" href="index.php?option=customer&cat=register">Đăng ký
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="mr-2">
                            <?php
                            $cart = loadClass('cart');
                            $sl = $cart->cart_qty();
                            ?>
                            <a class="" href="index.php?option=cart">
                                <button type="button" class="btn btn-info ">

                                    <i class="fab fa-opencart"></i>
                                    <span class="badge ">
                                        <sup> <?php echo $sl; ?></sup>
                                    </span>
                                </button>
                            </a>
                        </div>
                        <form class="form-inline my-2 my-lg-0"><input class="form-control mr-sm-2" type="search"
                                placeholder="Tìm kiếm sản phẩm" aria-label="Search"></form>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>