@extends('home_page.home.dasboard_home')
@section('js')
    <script src="{{asset('public_home/home/home_service.js')}}" type="text/javascript "></script>
@endsection
@section('home_content')
<div id="wrapper" class="service">
    <div class="wp-container">
        <div class="bot-content">
            <div class="wp-content">
                <div class="box-title" id="title_content1">
                    
                </div>
                <div class="box-content" id="content_content1">
                    <div class="box-item">
                        <div class="item-title">
                            <div class="icon"><img src="{{asset('ctp/images/bagplastic.png')}}" alt=""></div>
                            <h4 class="t-center fz-125rem fw-600">Túi nhựa</h4>
                        </div>
                        <div class="item-content">
                            <p class="fw-400">Nhóm sản túi nhựa của chúng tôi khẳng định vị thế trên thị trường bằng kiểu dáng, màu sắc và chất lượng ổn định. Đặc biệt đảm bảo các tiêu chuẩn về an toàn thực phẩm.</p>
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
                    <div><img src="{{asset('ctp/images/phone_1.png')}}" alt=" "></div>
                    <p>Liên hệ</p>
                </div>

                <div class="menu-contact ">
                    <span class="triangle "></span>
                    <ul class="content-contact ">
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-phone.png')}}" alt=" "></a>
                            <a href="# " class="item-title ">(+84) 932653789</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-mes.png')}}" alt=" "></a>
                            <a href="# " class="item-title ">Messager</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-viber.png')}}" alt=" "></a>
                            <a href="# " class="item-title ">Viber</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-zalo.png')}}" alt=" "></a>
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