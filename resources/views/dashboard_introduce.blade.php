<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('public_customer/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/css/font-awesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public_customer/responsive.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('public_customer/carousel/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public_customer/carousel/owl-carousel/assets/owl.theme.default.min.css')}}">
    <!-- <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->

    <link rel="icon" href="{{ asset('public_customer/images/logolink.png')}}" type="image/x-icon">

    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header">
            <nav class="top-header">
                <div class="certification"><img src="{{ asset('public_customer/images/certification.png')}}" alt="Chứng nhận Bộ Công Thương"></div>
                <div class="iso"><img src="{{ asset('public_customer/images/iso.png')}}" alt="Chứng nhận ISO"></div>
                <div class="phone-contact">
                    <div><img src="{{ asset('public_customer/images/phone.png')}}" alt=""></div>
                    <div>(+84) 932 653 789</div>
                </div>
            </nav>
            <nav class="bot-header">
                <ul id="main-menu" class="menu_active">
                    <li class="item active"><a href="{{URL::to('')}}">Trang chủ</a></li>
                    <li class="item"><a href="{{URL::to('about-us')}}">Về chúng tôi</a></li>
                    <li class="item"><a href="{{URL::to('process')}}">Quy trình</a></li>
                    <li class="item"><a href="{{URL::to('product')}}">Sản phẩm</a></li>
                    <li class="item"><a href="{{URL::to('service')}}">Dịch vụ</a></li>
                    <li class="item"><a href="{{URL::to('contact')}}">Liên hệ</a></li>
                </ul>
                <div class="dir-user">
                    <div class="dir-tx">
                        <div><a href="{{URL::to('login')}}">Đăng nhập</a>/<a href="{{URL::to('register')}}">Đăng kí</a></div>
                        <p>Tài khoản</p>
                    </div>
                    <div class="icon">
                        <span><img src="{{ asset('public_customer/images/account.png')}}" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="{{ asset('public_customer/images/arrow_down.png')}}" alt=""></span>
                    </div>
                </div>
                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="{{URL::to('login')}}">Đăng nhập</a>
                        <a href="{{URL::to('register')}}">Đăng kí</a>
                    </div>
                </div>
            </nav>
            <div class="logo">
                <a href="#"><img src="{{ asset('public_customer/images/logo.png')}}" alt=""></a>
            </div>
        </div>
    </header>

    @yield('content_introduce')


    <!-- END FOOTER -->
    <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="{{ asset('public_customer/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{ asset('public_customer/js/plugins/ckeditor/ckeditor.js')}} " type="text/javascript "></script>

    <script src="{{ asset('public_customer/js/main.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/js/app.js')}} " type="text/javascript "></script>

    <script src="{{ asset('public_customer/js/progress_bar.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/js/view_img.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/url_global.js')}}" type="text/javascript "></script>

<!-- 
    <script>
        var item = JSON.parse(localStorage.getItem('account_customer'));
        if(item ==null || item=='')
        {
            
        }else{
            window.location.href= urlserver +'customer-home';
        }
    </script> -->
</body>

</html>