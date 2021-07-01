<!DOCTYPE html>
<html lang="en">

<head>
    <<meta charset="UTF-8">
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
        <div id="wp-header" class="header-customer">
            <nav class="bot-header">
                <div class="search">
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="input" value="">
                    <button class="input d-flex">
                        <span class="icon d-block"><img src="{{ asset('public_customer/images/search.png')}}" alt=""></span>
                        <span class="d-block">Tìm kiếm</span>
                    </button>
                </div>
                <div class="dir-user">
                    <div class="dir-tx" id="username_ac">
                        <!-- <div><a href="login.html">Đăng nhập</a>/<a href="register.html">Đăng kí</a></div>
                        <p>Tài khoản</p> -->
                    </div>
                    <div class="icon">
                        <span><img src="{{ asset('public_customer/images/account.png')}}" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="{{ asset('public_customer/images/arrow_down.png')}}" alt=""></span>
                    </div>
                </div>
                <div class="header-cart">
                    <span class="d-block icon"><img src="{{ asset('public_customer/images/header-cart.png')}}" alt=""></span>
                    <span class="amount">4</span>
                </div>

                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="my-order.html">Đơn hàng của tôi</a>
                        <a href="my-info.html">Tài khoản của tôi</a>
                        <a href="my-notify.html">Thông báo của tôi</a>
                        <a onclick="customer_logout()">Đăng xuất</a>
                    </div>
                </div>
                <div class="dir-box header-cart-box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <div class="wp-header-cart-box">
                            <a href="#" class="d-flex header-cart-item px-1rem">
                                <div class="thumb-nail">
                                    <img src="{{ asset('public_customer/images/product_1.png')}}" alt="">
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
                                    <img src="{{ asset('public_customer/images/product_1.png')}}" alt="">
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
                                    <img src="{{ asset('public_customer/images/product_1.png')}}" alt="">
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
                            <button class="btn-submit d-inline-block mg-t-1rem mg-r-1rem"><span>Xem đơn hàng</span></button>
                        </div>

                    </div>
                </div>
                <div class="logo">
                    <a href="#"><img src="{{ asset('public_customer/images/logo.png')}}" alt=""></a>
                </div>
            </nav>
        </div>
    </header>

    <!-- END HEADER -->

    <!-- CONTENT -->
    @yield('customer_content')
    <!-- CONTENT -->

    
    <footer>
        <div class="wp-container">
            <div class="box-content">
                <div class="title">
                    <a href="index.html" class="logo"><img src="{{ asset('public_customer/images/logo.png')}}" alt=""></a>
                </div>
                <div class="content">
                    <p>Công ty Cổ Phần Cường Thịnh Phúc</p>
                    <p>A5/6c Nguyễn Cữu Phú, Ấp 01, Tân Kiên Huyện Bình Chánh, TP. Hồ Chí Minh</p>
                    <p>Email: cuongthinhphuc@gmail.com</p>
                </div>
            </div>
            <div class="box-content">
                <div class="title">
                    <h4 class="fw-600 fz-2rem t-cap t-left">Về chúng tôi</h4>
                </div>
                <div class="content">
                    <a href="#">Giới thiệu</a>
                    <a href="#">Bảo hành</a>
                    <a href="#">Tuyển dụng</a>
                </div>
            </div>
            <div class="box-content">
                <div class="title">
                    <h4 class="fw-600 fz-2rem t-cap t-left">Tải ứng dụng ABC</h4>
                </div>
                <div class="content">
                    <a href="#" class="brand"><img src="{{ asset('public_customer/images/appstore.png')}}" alt=""></a>
                    <a href="#" class="brand"><img src="{{ asset('public_customer/images/ggplay.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    </footer>

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



    
    <script src="{{ asset('public_customer/customer_js/customer-home.js')}}" type="text/javascript "></script>
    <script src="{{ asset('public_customer/url_global.js')}}" type="text/javascript "></script>

    <script>
        $( document ).ready(function() {
        var username = JSON.parse(localStorage.getItem('account_customer'));
        
        if(username != null || username !='')
        {
        //$('#username').html(username.full_name);
        var output = `
            <div><a>Tài khoản</a></div>
            <p>${username.customer_name}</p>`;
            $('#username_ac').html(output);
        }else{

        }          
        
    });
    function customer_logout() {
    localStorage.removeItem('account_customer');
    window.location = urlserver;
}
    </script>


</body>

</html>