@extends('dashboard_introduce')
@section('content_introduce')

    <!-- END HEADER -->
    <div id="wrapper" class="process">
        <div class="wp-container">
            <div class="top-content">
                <div class="wp-content">
                    <div class="box-title">
                        <h1 class="title t-up fw-600 t-center fz-25rem">QUY TRÌNH SẢN XUẤT CỦA CHÚNG TÔI</h1>
                        <p class="short-desc fw-400 fz-125rem t-center">Chúng tôi luôn sẵn sàng nhận yêu cầu, trao đổi ý tưởng từ bạn để có thể đưa ra sản phẩm với chất liệu, kích thước, kiểu dáng phù hợp nhất.</p>
                    </div>

                    <div class="box-content justify-content-center">
                        <div class="content">
                            <img src="{{ asset('public_customer/images/production_process.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bot-content">
                <div class="wp-content">
                    <div class="box-title">
                        <h1 class="title t-up fw-600 t-center fz-25rem">QUY TRÌNH ĐẶT HÀNG</h1>
                        <p class="short-desc fw-400 fz-125rem t-center">Để đặt sản phẩm, dịch vụ từ chúng tôi hãy làm theo quy trình dưới đây</p>
                    </div>
                    <div class="box-content">
                        <div class="box-item">
                            <div class="item-title">
                                <h4 class="t-left fz-125rem fw-600">1. Đăng ký tài khoản</h4>
                            </div>
                            <div class="item-content">
                                <p class="fw-400">Nếu bạn chưa có tài khoản, hãy tạo cho mình một tài khoản bằng cách click vào nút đăng lý trên thanh header</p>
                                <div class="step-img">
                                    <p class="mg-t-2rem step-img"><img src="{{ asset('public_customer/images/process_step_1.png')}}" alt=""></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-item">
                            <div class="item-title">
                                <h4 class="t-left fz-125rem  fw-600">2. Đăng nhập</h4>
                            </div>
                            <div class="item-content">
                                <p class="fw-400">Tiếp tục đăng nhập với tài khoản bạn đã đăng ký. Website sẽ chuyển tiếp đến trang mua hàng www.hdgsaj.com</p>
                                <div class="step-img">
                                    <p class="mg-t-2rem step-img"><img src="{{ asset('public_customer/images/process_step_2.png')}}" alt=""></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-item">
                            <div class="item-title">
                                <h4 class="t-left fz-125rem  fw-600">3. Thiết lập thông tin</h4>
                            </div>
                            <div class="item-content">
                                <p class="fw-400">Sau khi đăng nhập thành công tài khoản, tiến hành thiết lập thông tin gồm: Tên, số điện thoại, địa chỉ người nhận.</p>
                                <div class="step-img">
                                    <p class="mg-t-2rem step-img"><img src="{{ asset('public_customer/images/process_step_3.png')}}" alt=""></p>
                                </div>
                            </div>
                        </div>
                        <div class="box-item">
                            <div class="item-title">
                                <h4 class="t-left fz-125rem  fw-600">4. Mua hàng</h4>
                            </div>
                            <div class="item-content">
                                <p class="fw-400">Chọn sản phẩm và tiến hành mua hàng hoặc liên hệ với nhà cung cấp để được hướng dẫn và đặt hàng trực tiếp.</p>
                                <div class="step-img">
                                    <p class="mg-t-2rem"><img src="{{ asset('public_customer/images/process_step_4.png')}}" alt=""></p>
                                </div>
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
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-phone.png ')}}" alt=" "></a>
                                <a href="# " class="item-title ">(+84) 944810055</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-mes.png')}} " alt=" "></a>
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

    <footer>
        <div class="wp-container">
            <div class="box-content">
                <div class="title">
                    <a href="{{URL::to('')}}" class="logo"><img src="{{ asset('public_customer/images/logo.png')}}" alt=""></a>
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
<script type="text/javascript">
$(document).ready(function(){
    let output = `
        <li class="item"><a href="{{URL::to('')}}">Trang chủ</a></li>
        <li class="item"><a href="{{URL::to('about-us')}}">Về chúng tôi</a></li>
        <li class="item active"><a href="{{URL::to('process')}}">Quy trình</a></li>
        <li class="item "><a href="{{URL::to('product')}}">Sản phẩm</a></li>
        <li class="item "><a href="{{URL::to('service')}}">Dịch vụ</a></li>
        <li class="item"><a href="{{URL::to('contact')}}">Liên hệ</a></li>`;
    $('.menu_active').html(output);
})
</script>
@endsection