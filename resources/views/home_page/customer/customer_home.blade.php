@extends('customer.dashboard_customer')
@section('customer_content')
<div id="wrapper" class="customer-home">
    <div class="wp-container">
        <!-- slider -->
        <div id="slide-home" class="carousel slide py-1rem px-35rem bg-main-content py-1rem bg-white" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#slide-home" data-slide-to="0" class="active"></li>
                <li data-target="#slide-home" data-slide-to="1"></li>
                <li data-target="#slide-home" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('ctp/images/slide_product.png')}}" alt="Los Angeles">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('ctp/images/slide_product.png')}}" alt="Chicago">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('ctp/images/slide_product.png')}}" alt="New York">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev mg-l-35rem mg-t-35rem" href="#slide-home" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next mg-r-35rem mg-t-35rem" href="#slide-home" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

        <!-- top content -->
        <div class="top-content">
            <div class="wp-content px-35rem py-2rem">
                <div class="box-title d-flex justify-content-space-between">
                    <h1 class="title t-up fw-600 t-left fz-25rem">SẢN PHẨM </h1>
                    <span><a href="#" class="fw-400 fz-125rem t-green-main">Xem thêm</a></span>
                </div>

                {{-- <!-- empty-box -->
                <div class="box-content empty-box py-15rem m-0">
                    <span class="empty-box-icon"><img src="{{asset('ctp/images/shopping-cart.png')}}" alt=""></span>
                    <span class="empty-box-text">Không có sản phẩm hiển thị</span>
                </div> --}}
                <!-- content -->
                <div class="box-content py-15rem m-0">
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/product_1.png')}}" alt="">
                        </div>
                        <div class="item-content px-1rem mg-t-1rem">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                            <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                        </div>
                    </div>
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/product_2.png')}}" alt="">
                        </div>
                        <div class="item-content px-1rem mg-t-1rem">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                            <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                        </div>
                    </div>
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/product_3.png')}}" alt="">
                        </div>
                        <div class="item-content px-1rem mg-t-1rem">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                            <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                        </div>
                    </div>
                    
                    <div class="box-item empty-item px-0 py-0">
                       
                    </div>

                </div>
            </div>
        </div>
        <!-- bot content -->
        <div class="bot-content">
            <div class="wp-content pd-35rem">
                <div class="box-title d-flex justify-content-space-between">
                    <h1 class="title t-up fw-600 t-left fz-25rem">ĐƠN HÀNG CHỜ NHẬN </h1>
                    <span><a href="#" class="fw-400 fz-125rem t-green-main">Xem thêm</a></span>
                </div>

                {{-- <!-- empty-box -->
                {{-- <div class="box-content empty-box py-15rem m-0">
                    <span class="empty-box-icon"><img src="{{asset('ctp/images/bill.png')}}" alt=""></span>
                    <span class="empty-box-text">Không có đơn hàng chờ nhận</span>
                </div> --}}
                <!-- content -->
                <div class="box-content">
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/invoice_dashboard.png')}}" alt="">
                        </div>
                        <div class="item-content pd-2rem mg-t-1rem">
                            <span class="fw-400 fz-1rem t-right">Giao vào thứ sáu, 07/05</span>
                            <div class="d-flex justify-content-space-between">
                                <span>Mã đơn hàng:</span>
                                <span class="fw-600 fz-15rem">MDH12345</span>
                            </div>
                            <div class="d-flex justify-content-space-between">
                                <span>Tổng giá trị</span>
                                <span class="fw-600 fz-15rem">999.000 đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/invoice_dashboard.png')}}" alt="">
                        </div>
                        <div class="item-content pd-2rem mg-t-1rem">
                            <span class="fw-400 fz-1rem t-right">Giao vào thứ sáu, 07/05</span>
                            <div class="d-flex justify-content-space-between">
                                <span>Mã đơn hàng:</span>
                                <span class="fw-600 fz-15rem">MDH12345</span>
                            </div>
                            <div class="d-flex justify-content-space-between">
                                <span>Tổng giá trị</span>
                                <span class="fw-600 fz-15rem">999.000 đ</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="{{asset('ctp/images/invoice_dashboard.png')}}" alt="">
                        </div>
                        <div class="item-content pd-2rem mg-t-1rem">
                            <span class="fw-400 fz-1rem t-right">Giao vào thứ sáu, 07/05</span>
                            <div class="d-flex justify-content-space-between">
                                <span>Mã đơn hàng:</span>
                                <span class="fw-600 fz-15rem">MDH12345</span>
                            </div>
                            <div class="d-flex justify-content-space-between">
                                <span>Tổng giá trị</span>
                                <span class="fw-600 fz-15rem">999.000 đ</span>
                            </div>
                        </div>
                    </div>

                    <div class="box-item empty-item px-0 py-0">
                        <!-- this product empty -->
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
                    <div><img src="{{asset('ctp/images/phone_1.png')}} " alt=" "></div>
                    <p>Liên hệ</p>
                </div>

                <div class="menu-contact ">
                    <span class="triangle "></span>
                    <ul class="content-contact ">
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-phone.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">(+84) 944810055</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-mes.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Messager</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-viber.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Viber</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-zalo.png')}} " alt=" "></a>
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
                <a href="#" class="brand"><img src="{{asset('ctp/images/appstore.png')}}" alt=""></a>
                <a href="#" class="brand"><img src="{{asset('ctp/images/ggplay.png')}}" alt=""></a>
            </div>
        </div>
    </div>
</footer>
@endsection