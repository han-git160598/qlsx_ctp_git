<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public_admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/reset.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/global.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/style.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/responsive.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../public_admin/carousel/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../public_admin/carousel/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

    <link rel="icon" href="../public_admin/images/logolink.png" type="image/x-icon">

    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header" class="header-customer">
            <nav class="bot-header">
                <div class="dir-user">
                    <div class="dir-tx">
                        <div class="fz-075rem t-right">Tài khoản</div>
                        <p>Jemis Kevin</p>
                    </div>
                    <div class="icon">
                        <span><img src="../public_admin/images/avatar.png" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="../public_admin/images/arrow_down.png" alt=""></span>
                    </div>
                </div>

                <div class="ring-bell">
                    <!-- header-cart -->
                    <span class="d-block icon"><img src="../public_admin/images/bell.png" alt=""></span>
                    <span class="amount">4</span>
                </div>

                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="my-info.html">Tài khoản của tôi</a>
                        <a href="my-reset-password.html">Thay đổi mật khẩu</a>
                        <a href="index.html">Đăng xuất</a>
                    </div>
                </div>

                <div class="logo">
                    <a href="#"><img src="../public_admin/images/logo.png" alt=""></a>
                </div>
            </nav>
        </div>
        <div id="header-hidden"></div>
    </header>

    <!-- END HEADER -->
    <div id="wp-admin">
        <!-- sidebar left fixed -->
         @yield('sidebar')
        <div id="sidebar-left-hidden"></div>
        <!-- wp content -->
        <div id="wp-content">
            @yield('content')
        </div>
    </div>

    @yield('modal')     
    <!-- <div class="box-content justify-content-center">
        <div class="box-item w-100 ">
            <div class="item-title ">
                <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem ">Xóa thông tin</h4>
                <span class="icon "><a href="#cancel_delete_attach"><img src="../public_admin/images/x-black.png " alt=" "></a></span>
            </div>
            <div class="item-content mg-t-2rem t-center">
                <span class="d-inline-block tick-success "><img src="../public_admin/images/warning-del.png " alt=" "></span>
                <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa thông tin này?</p>
            </div>

            <div class="item-content t-center mg-t-175rem ">
                <button id="delete_attach" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div> -->
    <!-- END FOOTER -->
    <script src="../public_admin/js/jquery.js " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="../public_admin/js/bootstrap/bootstrap.min.js " type="text/javascript "></script>
    <script src="../public_admin/carousel/owl-carousel/owl.carousel.min.js "></script>
    <script src="../public_admin/js/plugins/ckeditor/ckeditor.js " type="text/javascript "></script>

    <script src="../public_admin/js/main.js " type="text/javascript "></script>
    <script src="../public_admin/js/app.js " type="text/javascript "></script>

    <script src="../public_admin/js/progress_bar.js " type="text/javascript "></script>
    <script src="../public_admin/js/view_img.js " type="text/javascript "></script>

     <script src="../public_customer/url_global.js " type="text/javascript "></script>
    <script>
    </script>
</body>

</html>