@extends('home_page.home.dasboard_home')
@section('js')
    <script src="{{asset('public_home/home/home_process.js')}}" type="text/javascript "></script>
@endsection
@section('home_content')
<div id="wrapper" class="process">
    <div class="wp-container">
        <div class="top-content">
            <div class="wp-content" id="title_content1">
                {{-- <div class="box-title" >
                    <h1 class="title t-up fw-600 t-center fz-25rem">QUY TRÌNH SẢN XUẤT CỦA CHÚNG TÔI</h1>
                    <p class="short-desc fw-400 fz-125rem t-center">Chúng tôi luôn sẵn sàng nhận yêu cầu, trao đổi ý tưởng từ bạn để có thể đưa ra sản phẩm với chất liệu, kích thước, kiểu dáng phù hợp nhất.</p>
                </div>

                <div class="box-content justify-content-center">
                    <div class="content">
                        <img src="{{asset('ctp/images/production_process.png')}}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="bot-content">
            <div class="wp-content">
                <div class="box-title" id="title_content2">
                    {{-- <h1 class="title t-up fw-600 t-center fz-25rem">QUY TRÌNH ĐẶT HÀNG</h1>
                    <p class="short-desc fw-400 fz-125rem t-center">Để đặt sản phẩm, dịch vụ từ chúng tôi hãy làm theo quy trình dưới đây</p> --}}
                </div>
                <div class="box-content" id="content_content2">
                    {{-- <div class="box-item">
                        <div class="item-title">
                            <h4 class="t-left fz-125rem fw-600">1. Đăng ký tài khoản</h4>
                        </div>
                        <div class="item-content">
                            <p class="fw-400">Nếu bạn chưa có tài khoản, hãy tạo cho mình một tài khoản bằng cách click vào nút đăng lý trên thanh header</p>
                            <div class="step-img">
                                <p class="mg-t-2rem step-img"><img src="{{asset('ctp/images/process_step_1.png')}}" alt=""></p>
                            </div>
                        </div>
                    </div> --}}
                   
                   
                   
                </div>

            </div>
        </div>
        <!-- contact box -->
        <div id="contact-box">
            <span class="box-contact-shadow"></span>
            <span class="box-contact-close"></span>
            <div class="box-contact">

                <div class="icon-contact ">
                    <div><img src="{{asset('ctp/images/phone_1.png')}} " alt=" "></div>
                    <p>Liên hệ</p>
                </div>

                <div class="menu-contact ">
                    <span class="triangle "></span>
                    <ul class="content-contact ">
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('images/icon-phone.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">(+84) 932653789</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('images/icon-mes.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Messager</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('images/icon-viber.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Viber</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('images/icon-zalo.png')}} " alt=" "></a>
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
                <a href="index.html" class="logo"><img src="{{asset('ctp/images/logo.png')}}" alt=""></a>
            </div>
            <div class="content">
                <p class="fw-600">Công ty Cổ Phần Cường Thịnh Phúc</p>
                <p class="fw-400">A5/6c Nguyễn Cữu Phú, Ấp 01, Tân Kiên Huyện Bình Chánh, TP. Hồ Chí Minh</p>
                <p class="fw-400">Email: cuongthinhphuc@gmail.com</p>
            </div>
        </div>
        <div class="box-content">
            <div class="title">
                <h4 class="fw-600 fz-2rem t-cap t-left">Về chúng tôi</h4>
            </div>
            <div class="content">
                <a href="#" class="fw-400">Giới thiệu</a>
                <a href="#" class="fw-400">Bảo hành</a>
                <a href="#" class="fw-400">Tuyển dụng</a>
            </div>
        </div>
        <div class="box-content">
            <div class="title">
                <h4 class="fw-600 fz-2rem t-cap t-left">Tải ứng dụng ABC</h4>
            </div>
            <div class="content">
                <a href="#" class="brand"><img src="{{asset('ctp/images/appstore.png')}}" alt=""></a>
                <a href="#" class="brand"><img src="{{asset('ctp/images/ggplay.png')}}" alt=""></a>
            </div>
        </div>
    </div>
</footer>
@endsection