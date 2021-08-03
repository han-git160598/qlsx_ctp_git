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

    <title>QLSX - Đăng kí</title>
</head>

<body class="bg-main-content">
    <!-- END HEADER -->
    <style>
        span[data-tag='a'] {
            cursor: pointer;
        }
    </style>
    <div id="wrapper" class="register">

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
                                    <style>
                                        .item-title {
                                            color: #333333!important;
                                            border-bottom: none!important;
                                        }
                                        
                                        .item-title .icon {
                                            width: 1.5rem!important;
                                            height: 1.5rem!important;
                                        }
                                    </style>
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Đăng ký</h4>
                                        <p class="short-desc fw-400 fz-125rem t-left mt-3">Đăng nhập hoặc tạo tài khoản của bạn</p>
                                        <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>

                                    </div>
                                    <form action="" method="post" class="box-request mg-t-1rem" id="form_reg">
                                        <input type="text" name="phone_reg" id="phone_reg" class="mg-t-2rem" placeholder="Nhập số điện thoại">
                                    </form>
                                    <div class="t-center">
                                        <small class="error-text t-center my-3">Vui lòng nhập số điện thoại</small>
                                        <button type="submit" class="mg-t-2rem btn btn-green w-100" id="submit_phone">Tiếp theo</button>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400 fz-1rem t-center">Bằng việc tiếp tục bạn đã chấp nhận</p>
                                        <a href="#" class="d-block t-green-main fw-400 fz-1rem t-center mg-b-05rem">điều khoản sử dụng</a>
                                        <p class="fw-400 fz-1rem t-center mg-t-2rem">Bạn đã có tài khoản? <a href="login.html" class="d-inline-block t-green-main fw-600 fz-1rem t-left">Đăng nhập</a></p>
                                        <a href="index.html" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step-otp d-none">
                        <!-- PROGRESS BAR -->
                        <div class="progress-step t-center">
                            <ul class="progressbar-point">
                                <li class="progressbar-item active" data-step="1">
                                    <span class="icon"><img src="{{asset('ctp/images/Radiobutton_active.png')}}" alt=""></span>
                                    <span>1. Xác minh số điện thoại</span>
                                </li>
                                <li class="progressbar-item" data-step="2">
                                    <span class="icon"><img src="{{asset('ctp/images/Radiobutton.png')}}"  alt=""></span>
                                    <span>2. Tạo mật khẩu</span>
                                </li>
                                <li class="progressbar-item" data-step="3">
                                    <span class="icon"><img src="{{asset('ctp/images/Radiobutton.png')}}"  alt=""></span>
                                    <span>3. Thông tin cá nhân</span>
                                </li>
                                <li class="progressbar-item" data-step="4">
                                    <span class="icon"><img src="{{asset('ctp/images/Radiobutton.png')}}"  alt=""></span>
                                    <span>4. Thêm địa chỉ</span>
                                </li>
                                <li class="progressbar-item" data-step="5">
                                    <span class="icon"><img src="{{asset('ctp/images/Radiobutton.png')}}"  alt=""></span>
                                    <span>5. Hoàn thành</span>
                                </li>
                            </ul>
                        </div>
                        <div class="step-1">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Xác nhận mã OTP</h4>
                                            <p class="short-desc fw-400 fz-125rem t-center mg-t-2rem">Nhập mã OTP đã gửi đến ********89</p>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>

                                        </div>
                                        <form method="get" class="digit-group mg-t-2rem" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                                            <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                                            <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" />


                                        </form>
                                        <small class="error-text t-center mt-3">Vui lòng nhập mã OTP</small>

                                        <div class="item-content mg-t-2rem">
                                            <p class="fw-400 fz-1rem t-center d-block"><a href="#" class="t-green-main fw-400 fz-1rem t-center mg-b-05rem">Gửi lại mã OTP</a> 59s</p>

                                            <button type="submit" class="btn-submit mg-t-2rem" data-step="2" id="submit_step_1">Tiếp theo</button>
                                            <span type="step_start" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-2 form-create-password d-none">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thông tin cá nhân</h4>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>
                                        </div>

                                        <form action="" method="post" class="box-request mg-t-1rem" id="set_pass">
                                            <div>
                                                <input type="password" name="password" id="password" class="mg-t-2rem" placeholder="Mật khẩu">
                                                <span><img src="{{asset('ctp/images/eye.png')}}" alt=""></span>
                                            </div>
                                            <div>
                                                <input type="password" name="password_confirm" id="password_confirm" class="mg-t-2rem" placeholder="Nhập lại mật khẩu">
                                                <span><img src="{{asset('ctp/images/eye.png')}}" alt=""></span>
                                            </div>
                                            <small class="error-text mt-3 t-center">Vui lòng nhập mật khẩu</small>
                                        </form>


                                        <div class="item-content mg-t-2rem">
                                            <button type="submit" class="btn-submit mg-t-2rem" id="submit_step_2" data-step="3">Tiếp theo</button>
                                            <span type="step_1" data-step="2" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center mg-t-2rem">Quay lại</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-3 form-create-info d-none">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <!-- d-none -->
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thông tin cá nhân</h4>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>

                                        </div>
                                        <form action="" method="post" class="box-request mg-t-2rem" id="form_info">
                                            <div class="box-left">
                                                <div class="request-item avatar">
                                                    <input type="file" name="avatar" id="avatar">
                                                    <span class="avatar"><img src="{{asset('ctp/images/account-reg.png')}}" alt=""></span>
                                                    <span class="fw-400 lh-12rem">Dụng lượng file tối đa 1 MB
                                                        Định dạng:.JPEG, .png')}}</span>
                                                </div>
                                            </div>

                                            <div class="box-right">
                                                <div class="request-item is_business">
                                                    <input type="checkbox" name="is_business" id="is_business" placeholder="Mật khẩu">
                                                    <label for="is_business" class="fw-400 lh-12rem">Bạn là doanh nghiệp?</label>
                                                </div>
                                                <div class="request-item fill">
                                                    <div class="input-title">
                                                        <label for="name_business" class="fw-400 lh-12rem">Tên công ty</label>
                                                    </div>
                                                    <div class="input-content">
                                                        <input type="text" name="name_business" id="name_business" placeholder="Nhập tên công ty">
                                                        <small class="error-text mt-2 t-center">Vui lòng nhập tên công ty</small>
                                                    </div>
                                                </div>
                                                <div class="request-item fill">
                                                    <div class="input-title">
                                                        <label for="name_user" class="fw-400 lh-12rem">Họ và tên</label>
                                                    </div>
                                                    <div class="input-content">
                                                        <input type="text" name="name_user" id="name_user" placeholder="Nhập họ và tên">
                                                        <small class="error-text mt-2 t-center">Vui lòng nhập họ và tên</small>
                                                    </div>
                                                </div>
                                                <div class="request-item fill">
                                                    <div class="input-title">
                                                        <label for="email_user" class="fw-400 lh-12rem">Email</label>
                                                    </div>
                                                    <div class="input-content">
                                                        <input type="text" name="email_user" id="email_user" placeholder="Nhập địa chỉ email">
                                                    </div>
                                                </div>
                                                <div class="request-item fill radio-box">
                                                    <div class="input-title">
                                                        <label class="fw-400 lh-12rem">Giới tính</label>
                                                    </div>

                                                    <div class="fill-box input-content">
                                                        <input type="radio" id="male" name="gender" value="male" checked>
                                                        <label for="male">Nam</label>
                                                        <input type="radio" id="female" name="gender" value="female">
                                                        <label for="female">Nữ</label>
                                                        <input type="radio" id="other" name="gender" value="other">
                                                        <label for="other">Khác</label>
                                                    </div>

                                                </div>
                                                <div class="request-item fill">
                                                    <div class="input-title">
                                                        <label class="fw-400 lh-12rem">Ngày sinh</label>
                                                    </div>
                                                    <div class="fill-box input-content">
                                                        <select name="day" id="day">
                                                            <option value="0">Ngày</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                        <select name="month" id="month">
                                                            <option value="0">Tháng</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                        <select name="year" id="year">
                                                            <option value="0">Năm</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="item-content mg-t-2rem">
                                            <span type="step_2" data-step="3" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center p-3">Quay lại</span>
                                            <button type="submit" id="submit_step_3" class="btn-submit w-20" data-step="4">Tiếp theo</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-4 d-none">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title">
                                            <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thêm địa chỉ</h4>
                                            <span class="icon"><a href="#"><img src="{{asset('ctp/images/help-line.png')}}" alt=""></a></span>
                                        </div>
                                        <form action="" method="post" class="box-request mg-t-2rem" id="form_address">
                                            <div>
                                                <label class="fw-400 t-left d-block">Thành phố</label>
                                                <select name="city" id="city" class="mg-t-075rem t-placeholder">
                                                    <option value="0">Chọn thành phố</option>
                                                    <option value="1">TP HCM</option>
                                                </select>
                                            </div>
                                            <div class="request-item fill input-content ">
                                                <div class="fill-box justify-content-space-between w-100">
                                                    <div class="w-45">
                                                        <label class="fw-400 t-left d-block">Quận/huyện</label>
                                                        <select name="district" id="district" class="mg-t-075rem t-placeholder w-100">
                                                            <option value="0">Chọn quận/huyện</option>
                                                            <option value="1">Thủ Đức</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-45">
                                                        <label class="fw-400 t-left d-block">Phường/xã</label>
                                                        <select name="ward" id="ward" class="mg-t-075rem t-placeholder  w-100">
                                                            <option value="0">Chọn phường/xã</option>
                                                            <option value="1">Bình Thạnh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <label class="fw-400 t-left d-block">Địa chỉ</label>
                                                <select name="address" id="address" class="mg-t-075rem t-placeholder">
                                                    <option value="0">Nhập địa chỉ cụ thể</option>
                                                    <option value="1">Công ty QTC</option>
                                                </select>
                                            </div>
                                        </form>

                                        <div class="item-content mg-t-2rem d-flex justify-content-end">
                                            <span type="step_3" data-step="4" data-tag="a" class="d-block t-green-main fw-600 fz-1rem t-center p-3">Quay lại</span>
                                            <button type="submit" id="submit_step_4" class="btn-submit w-30" data-step="5">Tiếp theo</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-5 d-none">
                            <div class="box-content justify-content-center">
                                <div class="box-right">
                                    <div class="box-item w-100">
                                        <div class="item-title mg-b-1rem">
                                            <h4 class="t-center fw-600 t-cap fz-2rem lh-2rem">Đăng ký thành công</h4>
                                        </div>

                                        <div class="item-content mg-t-2rem t-center">
                                            <span class="d-inline-block tick-success"><img src="{{asset('ctp/images/tick-success.png')}}" alt=""></span>
                                            <p class="t-center mg-t-2rem">Bạn đã tạo thành công tài khoản với số điện thoại</p>
                                            <strong class="t-center">(+84) 944810055</strong>
                                            <p class="t-center mg-t-2rem">Bạn sẽ được chuyển hướng đến trang mua sắm trong vòng </p>
                                            <strong class="t-center" id="sec">3 giây</strong>
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
    <!-- <script src="{{asset('ctp/js/jquery-2.2.4.min.js')}} " type="text/javascript "></script> -->
    <script src="{{asset('ctp/js/jquery.js')}} " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js')}}/1.16.0/umd/popper.min.js')}} "></script>
    <script src="{{asset('ctp/js/bootstrap/bootstrap.min.js')}} " type="text/javascript "></script>
    <script src="{{asset('ctp/carousel/owl-carousel/owl.carousel.min.js')}} "></script>
    <script src="{{asset('ctp/js/plugins/ckeditor/ckeditor.js')}} " type="text/javascript "></script>

    <script src="{{asset('ctp/js/main.js')}} " type="text/javascript "></script>
    <script src="{{asset('ctp/js/otp.js')}} " type="text/javascript "></script>

    <script src="{{asset('backend/js/main/customer/customer_register.js')}} " type="text/javascript "></script>
    <!-- <script src="{{asset('ctp/js/progress_bar.js')}} " type="text/javascript "></script> -->

    <script>
    </script>
</body>

</html>