<?php
$title = 'Liên hệ ';


$contact = loadModel('contact');
$userid = (isset($_SESSION['userid'])) ? $_SESSION['userid'] : 1;
if (isset($_POST['LUU'])) {
    $data = array(
        'fullname' => $_POST['fullname'],

        'email' => $_POST['email'],
        'phone' => ($_POST['phone']),

        'title' => $_POST['title'],
        'detail' => $_POST['detail'],

        'created_at' => date('Y-m-d H:i:s'),

        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => $userid,
        'status' => 1,

    );
    $contact->contact_insert($data);
    set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công!']);

    redirect("index.php?option=contact");
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
<div class="container">
    <div class="row ">
        <div class="swapper">
            <div class="static-contain">
                <form accept-charset="utf-8" action="index.php?option=contact" id="contact" method="post">
                    <input name="FormType" type="hidden" value="contact">
                    <input name="utf8" type="hidden" value="true"><input type="hidden"
                        id="Token-7f2b7be1d49348ec90eddd02a2bf33b6" name="Token"
                        value="03AGdBq25YL7TCkiuHK1odtQyXoWui1jY1ZxC4_JwBb90e1pRKJRXGNa1lqp0eLzYthd-ryNfZ9Jau-VhffUMkRojXnQM27_zS3IrQ60f0KWWIeDI7lxaA1xAuBHw64686Hv1lm7aHpFfvgkkGvMlyi8psoampHe3OCI3JnwNVn_YBGNbysxCEIrsM6PoPiiAmwsYjI27xtRa9HTqQb0HvTGSmLgStVNHopAqAeAiyFAAJshAFtZdU5WQYqWMKd4VRKOO1bi908hHcjSkTkIeCfEzQ6-u6nngmYW_sbZzmUdZEDWM9YIdPtUIhEW7EyVQAsYkrOPzgKuuWIVR9bLKVW405MwwYV9UMCsL6c6D8Mv4keS7nzNSSDsOSYGDl1_3MtVA_zBTYu7CE">
                    <script src="https://goo.gl/maps/krZSKx7wMkpaeeHGA">
                    </script>
                    <script>
                    grecaptcha.ready(function() {
                        grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {
                                action: "/contact"
                            })
                            .then(function(token) {
                                document.getElementById("Token-7f2b7be1d49348ec90eddd02a2bf33b6").value =
                                    token
                            });
                    });
                    </script>



                    <div class=" md-5">

                        <h1 class="text-center text-info">Liên hệ</h1>
                        <div class="form-group">
                            <label>Họ tên<span class="required">*</span></label>
                            <input name="fullname" type="text" class="form-control" placeholder="Họ và tên của bạn" />
                        </div>
                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input name="email" type="text" class="form-control" placeholder="Email của bạn" />
                        </div>
                        <div class="form-group">
                            <label>Điện thoại <span class="required">*</span></label>
                            <input name="phone" type="text" class="form-control" placeholder="Điện thoại của bạn" />
                        </div>
                        <div style="float:none" class="">
                            <label>Tiêu đề <span class="required">*</span></label>
                            <textarea name="title" id="comment" class="input-text" cols="50" rows="3"
                                style="width:100%;height:50px;"></textarea>
                        </div>

                        <label>Nội dung <span class="required">*</span></label>
                        <br>
                        <div style="float:none" class="">
                            <label>Chi tiết <span class="required">*</span></label>
                            <textarea name="detail" id="comment" class="input-text" cols="50" rows="3"
                                style="width:100%;height:150px;"></textarea>
                        </div>



                        <div class="buttons-set">
                            <button type="submit" title="Submit" name="LUU" class="btn btn-danger submit"> <span> Gửi
                                    liên hệ
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <body>
            <header class="header sticker">
                <div class="container">
                    <div class="">
                        <div class=" mt-5">
                            <div class="box-maps">
                                <div class="iFrameMap">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9040768064847!2d105.78136141440747!3d21.036523792890307!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4a9b88235d:0x2aaf2c5a6046cc9b!2zMjIwIFh1w6JuIFRo4buneSwgROG7i2NoIFbhu41uZyBI4bqtdSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1548346560257"
                                        width="600" height="450" style="border:0" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


        </body>

    </div>




</div>

<?php require_once('views/footer.php'); ?>