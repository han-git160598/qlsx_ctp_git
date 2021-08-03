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
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css')}}">

    <link rel="icon" href="{{asset('ctp/images/logolink.png')}}" type="image/x-icon">

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
            
            span[data-tag='a'] {
                cursor: pointer;
            }
        </style>
        <div class="wp-container">
            <div class="bot-content my-0">
                <div class="wp-content">
                    <div class="step-start">
                        <div class="box-content">
                            <div class="box-left">
                                <div class="w-100">
                                    <img src="{{asset('ctp/images/frame-reg.png')}}" alt="">
                                </div>
                            </div>
                            <div class="box-right">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Đăng nhập</h4>
                                        <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>

                                    </div>
                                    <meta name="csrf-token-login" content="{{ csrf_token() }}" />
                                    <form class="box-request mg-t-1rem" id="login_form">
                                        
                                        <div>
                                            <input type="number" name="login_phone" id="login_phone" class="mt-5" placeholder="Số điện thoại" value="">
                                        </div>
                                        <div>
                                            <input type="password" name="login_password" id="login_password" class="mt-3" placeholder="Nhập mật khẩu" value="">
                                            <span><img src="{{asset('ctp/images/eye.png')}}" alt=""></span>
                                        </div>
                                        
                                    </form>
                                    <div class="t-center">
                                        <small id="txt_err" class="error-text t-center my-3">Vui lòng điền thông tin đăng nhập</small>
                                        <button type="button" class="w-30 m-0 d-inline-block btn btn-green" id="btn_login">Đăng nhập</button>
                                    </div>
                                    <div class="item-content">
                                        <span type="forgot_password" data-tag="a" class="d-block t-green-main fw-400 fz-1rem t-center mg-b-05rem">Quên mật khẩu?</span>
                                        <p class="fw-400 fz-1rem t-center mt-4">Bạn vừa biết đến ứng dụng XYZ? <a href="{{asset('/customer/register')}}" class="d-inline-block t-green-main fw-600 fz-1rem t-left">Đăng ký</a></p>
                                        <a href="index.html" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step-reset-password" style="display: none;" id="forgot_password">
                        <div class="step-1">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Đặt lại mật khẩu</h4>
                                            <p class="short-desc fw-400 fz-125rem t-left">Nhập Email hoặc số điện thoại, chúng tôi sẽ gửi mã OTP về cho bạn</p>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>
                                        </div>

                                        <form method="POST" class="box-request mg-t-1rem t-center">
                                            <input type="text" name="phone_mail_reset" id="phone_mail_reset error-input" class="mg-t-2rem" placeholder="Email/Số điện thoại" value="">
                                            <small class="error-text">Vui lòng nhập số điện thoại</small>
                                        </form>
                                        <div class="t-center">
                                            <button id="submit_step_1" class="mg-t-2rem btn btn-green w-100">Tiếp theo</button>
                                        </div>


                                        <div class="item-content mg-t-2rem">
                                            <span type="step_start" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-2" style="display: none;">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Xác nhận mã OTP</h4>
                                            <p class="short-desc fw-400 fz-125rem t-center mg-t-2rem">Nhập mã OTP đã gửi đến ********89</p>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>

                                        </div>
                                        <form method="get" class="digit-group mg-t-2rem" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2" value="" />
                                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" value="" />
                                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" value="" />
                                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" value="" />
                                            <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" value="" />
                                            <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />


                                        </form>
                                        <small class="error-text t-center mt-3">Vui lòng nhập mã OTP</small>
                                        <div class="item-content mg-t-2rem">
                                            <p class="fw-400 fz-1rem t-center d-block"><a href="#" class="t-green-main fw-400 fz-1rem t-center mg-b-05rem">Gửi lại mã OTP</a> 59s</p>

                                            <button id="submit_step_2" class="btn-submit mg-t-2rem">Tiếp theo</button>
                                            <span type="step_1" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="step-3 form-create-password" style="display: none;">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Tạo mật khẩu</h4>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>
                                        </div>

                                        <form action="" method="post" class="box-request mg-t-1rem" id="reset_pass">
                                            <div>
                                                <input type="password" name="password" id="password" class="mg-t-2rem" placeholder="Mật khẩu" value="">
                                                <span><img src="{{asset('ctp/images/eye.png')}}" alt=""></span>
                                            </div>
                                            <div>
                                                <input type="password" name="password_confirm" id="password_confirm" class="mg-t-2rem" placeholder="Nhập lại mật khẩu" value="">
                                                <span><img src="{{asset('ctp/images/eye.png')}}" alt=""></span>
                                            </div>
                                            <small class="error-text mt-3 t-center">Vui lòng nhập mật khẩu</small>
                                            <small class="success-text mt-3 t-center">Đổi mật khẩu thành công</small>

                                        </form>


                                        <div class="item-content mg-t-2rem">
                                            <button id="submit_step_3" class="btn-submit mg-t-2rem">Tiếp theo</button>
                                            <span type="step_2" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</span>
                                        </div>

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
    <script src="{{asset('ctp/js/jquery-2.2.4.min.js')}}" type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js')}}"></script>
    <script src="{{asset('ctp/js/bootstrap/bootstrap.min.js')}}" type="text/javascript "></script>
    <script src="{{asset('ctp/carousel/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ctp/js/plugins/ckeditor/ckeditor.js')}}" type="text/javascript "></script>

    <script src="{{asset('ctp/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('ctp/js/otp.js')}}" type="text/javascript"></script>


    <script src="{{asset('backend/js/main/customer/customer_login.js')}}" type="text/javascript"></script>
    <script>
    </script>

    <script>
    </script>
</body>

</html>