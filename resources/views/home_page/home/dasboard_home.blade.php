<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('ctp/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public_admin/css/font-awesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/responsive.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('ctp/carousel/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('ctp/carousel/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('ctp/owl.theme.default.min.css')}}">

    <link rel="icon" href="{{asset('ctp/images/logolink.png')}}" type="image/x-icon">

    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header">
            <nav class="top-header">
                <div class="certification"><img src="{{asset('ctp/images/certification.png')}}" alt="Chứng nhận Bộ Công Thương"></div>
                <div class="iso"><img src="{{asset('ctp/images/iso.png')}}" alt="Chứng nhận ISO"></div>
                <div class="phone-contact">
                    <div><img src="{{asset('ctp/images/phone.png')}}" alt=""></div>
                    <div>(+84) 932 653 789</div>
                </div>
            </nav>
            <nav class="bot-header">
                <ul id="main-menu">
                    <li class="item"><a href="{{asset('/')}}">Trang chủ</a></li>
                    <li class="item"><a href="{{asset('/home/about-us')}}">Về chúng tôi</a></li>
                    <li class="item"><a href="{{asset('/home/process')}}">Quy trình</a></li>
                    <li class="item"><a href="{{asset('/home/product')}}">Sản phẩm</a></li>
                    <li class="item"><a href="{{asset('/home/service')}}">Dịch vụ</a></li>
                    <li class="item"><a href="{{asset('/home/contact')}}">Liên hệ</a></li>
                </ul>
                <div class="dir-user">
                    <div class="dir-tx">
                        <div><a href="{{asset('/login')}}">Đăng nhập</a>/<a href="{{asset('/register')}}">Đăng kí</a></div>
                        <p>Tài khoản</p>
                    </div>
                    <div class="icon">
                        <span><img src="{{asset('ctp/images/account.png')}}" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="{{asset('ctp/arrow_down.png')}}" alt=""></span>
                    </div>
                </div>
                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="login.html">Đăng nhập</a>
                        <a href="register.html">Đăng kí</a>
                    </div>
                </div>
            </nav>
            <div class="logo">
                <a href="#"><img src="{{asset('ctp/images/logo.png')}}" alt=""></a>
            </div>
        </div>
    </header>
    @yield('home_content')
    <!-- END HEADER -->
  
    

    <!-- END FOOTER -->
    <script src="{{asset('ctp/js/jquery.js')}}" type="text/javascript "></script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{asset('ctp/js/bootstrap/bootstrap.min.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/carousel/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public_admin/js/plugins/ckeditor/ckeditor.js')}}" type="text/javascript "></script>

    <script src="{{asset('ctp/js/main.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/js/app.js')}}" type="text/javascript "></script>

    <script src="{{asset('ctp/js/progress_bar.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/js/view_img.js')}}" type="text/javascript "></script>
    <script src="{{asset('public_home/admin/admin_local.js')}}" type="text/javascript "></script>
    @yield('js')
</body>

</html>