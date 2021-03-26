<?php
$title = 'Đăng Nhập';
$error = "";
if (isset($_POST['DANGNHAP'])) {
    $user = loadModel('user');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $args = array();
    $args['access'] = 0;
    $args['status'] = 1;
    //kiem tra tai khoan-email hoac ten dang nhap 
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $args['email'] = $username;
    } else {
        $args['username'] = $username;
    }
    $count_username = $user->user_count($args);
    // echo $count_username;
    if ($count_username == 1) {
        $args['password'] = sha1($password);
        $row_user = $user->user_row($args);
        if ($row_user != null) {
            $_SESSION['user_customer'] = $row_user['username'];
            $_SESSION['fullname_customer'] = $row_user['fullname'];
            $_SESSION['userid_customer'] = $row_user['id'];
        }
        
        redirect('index.php');
       
    } else {
        $error = "Sai mật khẩu";
    }
} else {
    $error = "Tài khoản không tồn tại";
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
<form action="index.php?option=customer&cat=login" method="post" name="form1">


    <div class="swapper mt-md-5">
        <h1 class="text-center">Đăng nhập tài khoản</h1>
        <div class="form-group">
            <label>Tên đăng nhập</label>
            <input name="username" type="text" class="form-control" placeholder="Tên đăng nhập hoặc email" />
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input name="password" type="password" class="form-control" placeholder="Mật khẩu" />
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-info" name="DANGNHAP" type="submit">
                Đăng nhập
            </button>
            <div class="form-group mt-3">
                <?php echo "<span class='text-danger'>" . $error . "</span>"; ?>
            </div>
        </div>
    </div>
    <!-- <a href="index.php?option=customer&cat=register">Chưa có tài khoản ? Đăng kí mới</a> -->

</form>








<?php
require_once('views/footer.php');
?>