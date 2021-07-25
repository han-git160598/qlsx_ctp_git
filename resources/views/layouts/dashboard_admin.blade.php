<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('public_admin/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/css/font-awesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/responsive.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('public_admin/carousel/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public_admin/carousel/owl-carousel/assets/owl.theme.default.min.css')}}">

    <link rel="icon" href="{{asset('public_admin/images/logolink.png')}}" type="image/x-icon">





    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header" class="header-customer">
            <nav class="bot-header">
                <div class="dir-user">
                    <div class="dir-tx">
                        <div class="fz-075rem t-right">Tài khoản</div>
                        <p id="account_name"></p>
                    </div>
                    <div class="icon">
                        <span><img src="{{asset('public_admin/images/avatar.png')}}" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="{{asset('public_admin/images/arrow_down.png')}}" alt=""></span>
                    </div>
                </div>

                <div class="ring-bell">
                    <!-- header-cart -->
                    <span class="d-block icon"><img src="{{asset('public_admin/images/bell.png')}}" alt=""></span>
                    <span class="amount">4</span>
                </div>

                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="{{URL::to('my-info')}}">Tài khoản của tôi</a>
                        <a href="{{URL::to('my-reset-password')}}">Thay đổi mật khẩu</a>
                        <a onclick="logout()">Đăng xuất</a>
                    </div>
                </div>

                <div class="logo">
                    <a href="#"><img src="{{asset('public_admin/images/logo.png')}}" alt=""></a>
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
        @yield('content')
        
    </div>
    @yield('modal')

    <script src="{{asset('public_admin/js/jquery.js')}}" type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="{{asset('public_admin/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{asset('public_admin/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{asset('public_admin/js/plugins/ckeditor/ckeditor.js')}}" type="text/javascript "></script>
    <script src="{{asset('public_admin/admin_js/verify.js')}}" type="text/javascript"></script>

    <script src="{{asset('public_admin/js/main.js')}}" type="text/javascript "></script>
    <script src="{{asset('public_admin/js/app.js')}}" type="text/javascript "></script>

    <script src="{{asset('public_admin/js/progress_bar.js')}}" type="text/javascript "></script>
    <script src="{{asset('public_admin/js/view_img.js')}}" type="text/javascript "></script>
    <script src="../public_customer/url_global.js " type="text/javascript "></script>

    <script src="{{asset('public_admin/admin_js/logout.js')}}" type="text/javascript"></script>
    @yield('ajax')
    <script type="text/javascript">
        $(document).ready(function(){
            var account_admin = JSON.parse(localStorage.getItem('account_customer'))
            $('#account_name').text(account_admin.full_name)
        })

    </script>
</body>

</html>
