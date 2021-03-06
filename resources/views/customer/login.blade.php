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
                                    <img src="{{ asset('public_customer/images/frame-reg.png')}}" alt="">
                                </div>
                            </div>
                            <div class="box-right">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Đăng nhập</h4>
                                        <span class="icon"><a href="#"><img src="{{ asset('public_customer/images/help-line.png')}}" alt=""></a></span>

                                    </div>
                                    <form method="post" class="box-request mg-t-1rem" id="login_form">
                                        <div>
                                            <input type="text" name="login_phone" id="login_phone" class="mt-5" placeholder="Số điện thoại" value="">
                                        </div>
                                        <div>
                                            <input type="password" name="login_password" id="login_password" class="mt-3" placeholder="Nhập lại mật khẩu" value="">
                                            <span onclick="hidden_password()"><img src="{{ asset('public_customer/images/eye.png')}}" alt=""></span>
                                        </div>
                                    </form>
                                    <div class="t-center">
                                        <small class="error-text t-center my-3">Vui lòng điền thông tin đăng nhập</small>
                                        <button type="submit" class="w-30 m-0 d-inline-block btn btn-green" id="btn_login">Đăng nhập</button>
                                    </div>
                                    <div class="item-content">
                                        <span type="forgot_password" data-tag="a" class="d-block t-green-main fw-400 fz-1rem t-center mg-b-05rem">Quên mật khẩu?</span>
                                        <p class="fw-400 fz-1rem t-center mt-4">Bạn vừa biết đến ứng dụng XYZ? <a href="{{URL::to('register')}}" class="d-inline-block t-green-main fw-600 fz-1rem t-left">Đăng ký</a></p>
                                        <a href="{{URL::to('')}}" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</a>
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
                                            <!-- <span class="icon"><a href="#"><img src="{{ asset('public_customer/images/help-line.png')}}" alt=""></a></span> -->
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
                                            <!-- <span class="icon"><a href="#"><img src="../public_customer/images/help-line.png" alt=""></a></span> -->

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
                                            <<!-- span class="icon"><a href="#"><img src="../public_customer/images/help-line.png" alt=""></a></span> -->
                                        </div>

                                        <form action="" method="post" class="box-request mg-t-1rem" id="reset_pass">
                                            <div>
                                                <input type="password" name="password" id="password" class="mg-t-2rem" placeholder="Mật khẩu" value="">
                                                <span><img src="{{ asset('public_customer/images/eye.png')}}" alt=""></span>
                                            </div>
                                            <div>
                                                <input type="password" name="password_confirm" id="password_confirm" class="mg-t-2rem" placeholder="Nhập lại mật khẩu" value="">
                                                <span><img src="{{ asset('public_customer/images/eye.png')}}" alt=""></span>
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
    <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="{{ asset('public_customer/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{ asset('public_customer/js/plugins/ckeditor/ckeditor.js')}} " type="text/javascript "></script>

    <script src="{{ asset('public_customer/js/main.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/js/app.js')}} " type="text/javascript "></script>

    <script src="{{ asset('public_customer/js/progress_bar.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/js/view_img.js')}} " type="text/javascript "></script>


    <script src="{{ asset('public_customer/url_global.js')}}" type="text/javascript"></script>
    <script src="{{ asset('public_customer/customer_js/login.js')}}" type="text/javascript"></script>

    <script>
        // $(document).ready(function() {
        //     // login
        //     $("#btn_login").click(function() {
        //         if ($("#login_phone").val() == "") {
        //             $("#login_phone").addClass('error-input');
        //             $("#login_form ~div> .error-text").addClass('d-block');
        //         } else if ($("#login_password").val() == "") {
        //             $("#login_phone").removeClass('error-input');
        //             $("#login_password").addClass('error-input');
        //             $("#btn_login ~ error-text").addClass('d-block');

        //         } else {
        //             $("#login_password").removeClass('error-input');
        //             window.location.href = 'customer-home.html';
        //         }
        //     });
        //     $("span[type='forgot_password']").click(function() {
        //         $('.step-start').toggleClass('d-none');
        //         $('.step-reset-password').toggleClass('d-block');
        //         $("input[name='phone_mail_reset']").removeClass('error-input');
        //         $("input[name='phone_mail_reset']~.error-text").removeClass('d-block');

        //     });
        //     //   step 1
        //     $("span[type='step_start']").click(function() {
        //         $('.step-start').toggleClass('d-none');
        //         $('.step-reset-password').toggleClass('d-block');
        //     });
        //     $(".step-1 #submit_step_1").click(function() {
        //         if ($("input[name='phone_mail_reset']").val() == "") {
        //             $("input[name='phone_mail_reset']").addClass('error-input');
        //             $("input[name='phone_mail_reset']~.error-text").addClass('d-block');
        //         } else {
        //             $(".step-1").toggleClass('d-none');
        //             $(".step-2").toggleClass('d-block');
        //             $("input[name='phone_mail_reset']").removeClass('error-input');
        //             $("input[name='phone_mail_reset']~.error-text").removeClass('d-block');
        //         }
        //     });
        //     // step 2
        //     $("span[type='step_1']").click(function() {
        //         $('.step-1').toggleClass('d-none');
        //         $('.step-2').toggleClass('d-block');
        //         $(".digit-group~.error-text").removeClass('d-block');

        //     });
        //     $(".step-2 #submit_step_2").click(function() {
        //         if ($("#digit-1").val() == "" || $("#digit-2").val() == "" || $("#digit-3").val() == "" || $("#digit-4").val() == "" || $("#digit-5").val() == "" || $("#digit-6").val() == "") {
        //             $(".digit-group~.error-text").addClass('d-block');
        //         } else {
        //             $(".step-2").toggleClass('d-block');
        //             $(".step-3").toggleClass('d-block');
        //             $(".digit-group~.error-text").removeClass('d-block');
        //         }

        //     });
        //     // step 3
        //     $("span[type='step_2']").click(function() {
        //         $('.step-2').toggleClass('d-block');
        //         $('.step-3').toggleClass('d-block');
        //         $(".digit-group~.error-text").removeClass('d-block');

        //     });
        //     $(".step-3 #submit_step_3").click(function() {
        //         if ($("#password").val() == "" || $("#password_confirm").val() == "") {
        //             $("#reset_pass div~.error-text").addClass('d-block');
        //         } else {
        //             $("#reset_pass div~.error-text").removeClass('d-block');
        //             $("#reset_pass div~.success-text").addClass('d-block');

        //             setTimeout(function() {
        //                 $('.step-start').toggleClass('d-none');
        //                 $('.step-1').toggleClass('d-none');
        //                 $('.step-3').toggleClass('d-block');
        //                 $('.step-reset-password').toggleClass('d-block');
        //             }, 2000);

        //         }
        //     });



        // });
    </script>
</body>

</html>