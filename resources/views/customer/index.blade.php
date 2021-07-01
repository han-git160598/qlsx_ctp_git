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
                <ul id="main-menu">
                    <li class="item active"><a href="index.html">Trang chủ</a></li>
                    <li class="item"><a href="about-us.html">Về chúng tôi</a></li>
                    <li class="item"><a href="process.html">Quy trình</a></li>
                    <li class="item"><a href="product.html">Sản phẩm</a></li>
                    <li class="item"><a href="service.html">Dịch vụ</a></li>
                    <li class="item"><a href="contact.html">Liên hệ</a></li>
                </ul>
                <div class="dir-user">
                    <div class="dir-tx">
                        <div><a href="{{URL::to('login')}}">Đăng nhập</a>/<a href="register.html">Đăng kí</a></div>
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
                        <a href="login.html">Đăng nhập</a>
                        <a href="register.html">Đăng kí</a>
                    </div>
                </div>
            </nav>
            <div class="logo">
                <a href="#"><img src="{{ asset('public_customer/images/logo.png')}}" alt=""></a>
            </div>
        </div>
    </header>

    <!-- END HEADER -->
    <div id="wrapper">
        <div class="wp-container">
            <div id="slide-home" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#slide-home" data-slide-to="0" class="active"></li>
                    <li data-target="#slide-home" data-slide-to="1"></li>
                    <li data-target="#slide-home" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="Los Angeles">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="Chicago">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('public_customer/images/bg-home.png')}}" alt="New York">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#slide-home" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#slide-home" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
            <!-- contact box -->
            <div id="contact-box">
                <span class="box-contact-shadow"></span>
                <span class="box-contact-close"></span>
                <div class="box-contact">

                    <div class="icon-contact ">
                        <div><img src="{{ asset('public_customer/images/phone_1.png')}} " alt=" "></div>
                        <p>Liên hệ</p>
                    </div>

                    <div class="menu-contact ">
                        <span class="triangle "></span>
                        <ul class="content-contact ">
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-phone.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">(+84) 944810055</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-mes.png')}}" alt=" "></a>
                                <a href="# " class="item-title ">Messager</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-viber.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">Viber</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-zalo.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">Zalo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

    <script>
    </script>
</body>

</html>