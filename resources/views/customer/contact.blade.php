
@extends('dashboard_introduce')
@section('content_introduce')
    <!-- END HEADER -->
    <div id="wrapper" class="contact">
        <div class="wp-container">
            <div class="bot-content mt-0">
                <div class="wp-content">
                    <div class="box-title">
                        <h1 class="title t-up fw-600 t-center fz-25rem">LIÊN HỆ CHÚNG TÔI</h1>
                        <p class="short-desc fw-400 fz-125rem t-center">Hãy cho chúng tôi biết bạn cần gì. Chúng tôi luôn sẵn sàng trả lời cho bạn</p>
                    </div>
                    <div class="box-content">
                        <div class="box-left">
                            <div class="box-item w-100">
                                <div class="item-title">
                                    <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thông tin liên hệ</h4>
                                </div>
                                <div class="item-content">
                                    <p class="fw-400 d-flex">
                                        <span class="icon"><img src="{{ asset('public_customer/images/detail-phone.png')}}" alt=""></span>
                                        <span class="mg-l-05rem lh-12rem">(+84) 932 653 789</span>
                                    </p>
                                    <p class="fw-400 d-flex">
                                        <span class="icon"><img src="{{ asset('public_customer/images/detail-location.png')}}" alt=""></span>
                                        <span class="mg-l-05rem lh-12rem">A5/6c Nguyễn Cữu Phú, Ấp 01, Tân Kiên Huyện Bình Chánh, TP. Hồ Chí Minh</span>
                                    </p>
                                    <p class="fw-400 d-flex">
                                        <span class="icon"><img src="{{ asset('public_customer/images/detail-gmail.png')}}" alt=""></span>
                                        <span class="mg-l-05rem lh-12rem">cuongthinhphuc@gmail.com</span>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="box-right">
                            <div class="box-item w-100">
                                <form action="" method="post" class="box-request">
                                    <input type="text" name="fullname" id="fullname" placeholder="Họ và tên *">
                                    <input type="text" name="phone" id="phone" placeholder="Số điện thoại *">
                                    <input type="email" name="email" id="email" placeholder="Email *">
                                    <textarea name="messager" id="messager" placeholder="Thông điệp *"></textarea>
                                    <input type="submit" value="Gửi đi">
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
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
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-mes.png')}} " alt=" "></a>
                                <a href="# " class="item-title ">Messager</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-viber.png ')}}" alt=" "></a>
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
<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script type="text/javascript">
$(document).ready(function(){
    let output = `
        <li class="item"><a href="{{URL::to('')}}">Trang chủ</a></li>
        <li class="item "><a href="{{URL::to('about-us')}}">Về chúng tôi</a></li>
        <li class="item"><a href="{{URL::to('process')}}">Quy trình</a></li>
        <li class="item "><a href="{{URL::to('product')}}">Sản phẩm</a></li>
        <li class="item "><a href="{{URL::to('service')}}">Dịch vụ</a></li>
        <li class="item active"><a href="{{URL::to('contact')}}">Liên hệ</a></li>`;
    $('.menu_active').html(output);
})
</script>
@endsection