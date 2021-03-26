<?php
$title = "Đăng Ký";
$user = loadModel('user');
$userid = (isset($_SESSION["userid"])) ? $_SESSION["userid"] : 1;
if (isset($_POST['DANGKY'])) {
    $slug = str_slug($_POST['username']);
    $data = array(
        'fullname' => $_POST["fullname"],
        'username' => $_POST["username"],
        'password' => sha1($_POST["password"]),
        'email' => $_POST["email"],
        'gender' => $_POST["gender"],
        'phone' => $_POST["phone"],
        'address' => $_POST["address"],
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $userid,
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $userid,
        'status' => 1
    );

    $user->user_insert($data);
    set_flash('message', ['type' => 'success', 'msg' => 'Đăng ký thành công']);
    redirect("index.php");
}
require_once('views/header.php');
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <style>
    .swapper {
        max-width: 500px;
        min-height: 300px;
        box-shadow: 1px 1px 4px 5px #ccc;
        margin-left: auto;
        margin-right: auto;
        border-radius: 7px;
        padding: 20px;
    }
    </style>




</head>
<section class=" clearfix content ">
    <div class="swapper mt-md-5">
        <div class="page_title">
            <div class="page-title ">
                <h1 class="text-center">Đăng ký tài khoản</h1>
            </div>
        </div>

        <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3 nopadding-xs"> -->
        <form accept-charset="utf-8" action="index.php?option=customer&cat=register" id="customer_register"
            method="post">




            <div class="form-group">
                <label>Họ và tên <span class="required">*</span></label>
                <input type="text" class="form-control" name="fullname" placeholder="">
            </div>
            <div class="form-group">
                <label>Tên tài khoản <span class="required">*</span></label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email"
                    id="email" required="">
            </div>
            <div class="form-group">
                <label>Mật khẩu<span class="required">*</span></label>
                <input name="password" type="password" class="form-control" placeholder="Mật khẩu" />
            </div>
            <div class="form-group">
                <label>Gới tính<span class="required">*</span></label></br>
                <input value="1" name="gender" type="radio" checked>Nam
                <input value="2" name="gender" type="radio" checked>Nữ
            </div>
            <div class="form-group">
                <label for="email">Điện thoại <span class="required">*</span></label>
                <input type="text" class="form-control number-sidebar-z" value="" name="phone" id="phone" placeholder=""
                    required="">
            </div>
            <div class="form-group">
                <label>Địa chỉ<span class="required">*</span></label>
                <input class="form-control" name="address" type="text" placeholder="" />
            </div>
            <p class="action-btn text-center ">
                <button type="submit" name="DANGKY" class="btn btn-success">Đăng ký</button>
                <a href="index.php" class="btn btn-success"><i class="fa fa-reply"></i>
                    Quay lại
                </a>

            </p>
        </form>

    </div>



</section>

<?php
require_once('views/footer.php');
?>