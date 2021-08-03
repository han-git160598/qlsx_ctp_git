<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('ctp/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/css/font-awesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('ctp/responsive.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('ctp/carousel/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('ctp/carousel/owl-carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('ctp/owlcarousel/owl.theme.default.min.css')}}">

    <link rel="icon" href="{{asset('ctp/images/logolink.png')}}" type="image/x-icon">

    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header" class="header-customer">
            <nav class="bot-header">
                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="input" value="">
                    <button class="input d-flex">
                        <span class="icon d-block"><img src="{{asset('ctp/images/search.png')}}" alt=""></span>
                        <span class="d-block">Tìm kiếm</span>
                    </button>
                </div>
                <div class="dir-user">
                    <div class="dir-tx">
                        <div><a href="{{asset('customer/login')}}">Đăng nhập</a>/<a href="{{asset('customer/register')}}">Đăng kí</a></div>
                        <p>Tài khoản</p>
                    </div>
                    <div class="icon">
                        <span><img src="{{asset('ctp/images/account.png')}}" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="{{asset('ctp/images/arrow_down.png')}}" alt=""></span>
                    </div>
                </div>
                <div class="header-cart">
                    <span class="d-block icon"><img src="{{asset('ctp/images/header-cart.png')}}" alt=""></span>
                    <span class="amount">4</span>
                </div>

                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="{{asset('customer/order')}}">Đơn hàng của tôi</a>
                        <a href="{{asset('customer/profile')}}">Tài khoản của tôi</a>
                        <a href="{{asset('customer/notify')}}">Thông báo của tôi</a>
                        <a href="{{asset('customer/check_logout')}}">Đăng xuất</a>
                    </div>
                </div>

                <div class="dir-box header-cart-box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <div class="wp-header-cart-box">
                            <a href="#" class="d-flex header-cart-item px-1rem">
                                <div class="thumb-nail">
                                    <img src="{{asset('ctp/images/product_1.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-1rem lh-1rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-1rem lh-1rem">Bao bì nhựa</span>
                                </div>
                                <div class="cost t-left">
                                    <span class="fw-400 fz-1rem">x10000 Cái</span>
                                </div>

                            </a>
                            <a href="#" class="d-flex header-cart-item px-1rem">
                                <div class="thumb-nail">
                                    <img src="{{asset('ctp/images/product_1.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-1rem lh-1rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-1rem lh-1rem">Bao bì nhựa</span>
                                </div>
                                <div class="cost t-left">
                                    <span class="fw-400 fz-1rem">x10000 Cái</span>
                                </div>

                            </a>
                            <a href="#" class="d-flex header-cart-item px-1rem">
                                <div class="thumb-nail">
                                    <img src="{{asset('ctp/images/product_1.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-1rem lh-1rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-1rem lh-1rem">Bao bì nhựa</span>
                                </div>
                                <div class="cost t-left">
                                    <span class="fw-400 fz-1rem">x10000 Cái</span>
                                </div>

                            </a>

                        </div>
                        <div class="item-content t-right">
                            <a href="{{asset('/customer/cart')}}" class="btn-submit d-inline-block mg-t-1rem mg-r-1rem"><span>Xem đơn hàng</span></a>
                        </div>

                    </div>
                </div>
                <div class="logo">
                    <a href="#"><img src="{{asset('ctp/images/logo.png')}}" alt=""></a>
                </div>
            </nav>
        </div>
    </header>

    <!-- END HEADER -->
    @yield('customer_content')

   

    <!-- END FOOTER -->
    <script src="{{asset('ctp/js/jquery.js')}} " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js')}}/1.16.0/umd/popper.min.js')}} "></script>
    <script src="{{asset('ctp/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{asset('ctp/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{asset('ctp/js/plugins/ckeditor/ckeditor.js')}} " type="text/javascript "></script>

    <script src="{{ asset('backend/js/main/admin_local.js') }}"></script>

    <script src="{{asset('ctp/js/main.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/js/app.js')}}" type="text/javascript "></script>

    <script src="{{asset('ctp/js/progress_bar.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/js/view_img.js')}}" type="text/javascript "></script>
    
    <script>
    </script>
</body>

</html>