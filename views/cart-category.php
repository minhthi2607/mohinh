<?php
$cart=loadClass("cart");
// dang nhap moi mua dc hang\
if(!isset($_SESSION['user_customer']))
{
    redirect('index.php?option=customer&cat=login');
}
else{
    require_once('views/cart-buy.php');
}