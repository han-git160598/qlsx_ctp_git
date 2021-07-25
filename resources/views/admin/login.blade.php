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

    <title>QLSX - Đăng nhập</title>
</head>

<body class="bg-main-content">
    <!-- END HEADER -->
    <div id="wrapper" class="register">
        <style>
            .item-title {
                color: #333333!important;
                border-bottom: none!important;
            }

            .item-title .icon {
                width: 1.5rem!important;
                height: 1.5rem!important;
            }
            /* span[data-tag='a'] {
                cursor: pointer;
            } */
        </style>
        <div class="wp-container">
            <div class="bot-content my-0">
                <div class="wp-content">
                    <div class="step-start">
                        <div class="box-content">
                            <div class="box-left">
                                <div class="w-100">
                                    <img src="{{asset('public_admin/images/frame-reg.png')}}" alt="">
                                </div>
                            </div>
                            <div class="box-right">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Đăng nhập</h4>
                                    </div>


                                    <form method="POST"  class="box-request mg-t-1rem" id="login_form">
                                        @csrf
                                        <div>
                                            <input type="text" name="login_phone" id="login_phone" class="mt-5" placeholder="Số điện thoại" value="">
                                        </div>
                                        <div>
                                            <input type="password" name="login_password" id="login_password" class="mt-3" placeholder="Nhập lại mật khẩu" value="">
                                            <span onclick="hidden_password()"><img src="{{asset('public_admin/images/eye.png')}}" alt=""></span>
                                        </div>
                                    </form>
                                    <div class="t-center">
                                        <small class="error-text t-center my-3">Vui lòng điền thông tin đăng nhập</small>
                                        <button type="submit" class="w-30 m-0 d-inline-block btn btn-green" id="btn_login">Đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END FOOTER -->
    <script src="{{asset('public_admin/js/jquery.js')}}" type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="{{asset('public_admin/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{asset('public_admin/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{asset('public_admin/js/plugins/ckeditor/ckeditor.js')}}" type="text/javascript "></script>

    <script src="{{asset('public_admin/js/main.js')}}" type="text/javascript "></script>

    {{-- <script src="{{asset('public_admin/js/otp.js')}}" type="text/javascript"></script> --}}
    {{-- <script src="{{asset('public_admin/js/login.js')}}" type="text/javascript"></script> --}}
    <script src="{{asset('public_customer/url_global.js')}}" type="text/javascript"></script>
    <script src="{{asset('public_admin/admin_js/login.js')}}" type="text/javascript"></script>



</body>

</html>
