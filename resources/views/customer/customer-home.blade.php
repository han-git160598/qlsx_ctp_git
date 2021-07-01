@extends('dashboard_customer')
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
                            <img src="{{ asset('public_customer/images/slide_product.png')}}" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public_customer/images/slide_product.png')}}" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('public_customer/images/slide_product.png')}}" alt="New York">
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

                <style>
                    .customer-home .box-item .thumb-nail{
                        width: 100%;
                        height: 68%!important;
                    }
                </style>
                <!-- top content -->
                
                <div class="top-content">
                    <div class="wp-content px-35rem py-2rem">
                        <div class="box-title d-flex justify-content-space-between">
                            <h1 class="title t-up fw-600 t-left fz-25rem">SẢN PHẨM </h1>
                            <span><a onclick="all_customer_product()" class="fw-400 fz-125rem t-green-main">Xem thêm</a></span>
                        </div>

                        <div class="box-content py-15rem m-0" style="flex-wrap: wrap;" id="list_customer_product">
                            <!-- <div class="box-item px-0 py-0" >
                                <div class="thumb-nail">
                                    <img src="{{ asset('public_customer/images/product_1.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                                </div>
                            </div>
                            <div class="box-item px-0 py-0">
                                <div class="thumb-nail">
                                    <img src="{{ asset('public_customer/images/product_2.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                                </div>
                            </div>
                            <div class="box-item px-0 py-0">
                                <div class="thumb-nail">
                                    <img src="{{ asset('public_customer/images/product_3.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem">Bao bì kem 2 dòng kem 2 dòng</h4>
                                    <span class="t-left fw-400 t-cap fz-15rem lh-15rem">Bao bì nhựa</span>
                                </div>
                            </div>
                            <div class="box-item empty-item px-0 py-0">
                                
                            </div> -->

                        </div>
                    </div>
                </div>
                
                <!-- bot content -->
                
                <div class="bot-content">
                    <div class="wp-content pd-35rem">
                        <div class="box-title d-flex justify-content-space-between">
                            <h1 class="title t-up fw-600 t-left fz-25rem">ĐƠN HÀNG CHỜ NHẬN </h1>
                            <span><a onclick="all_customer_order()" class="fw-400 fz-125rem t-green-main">Xem thêm</a></span>
                        </div>

                        <div class="box-content" style="flex-wrap: wrap;" id="list_customer_order">
                            <!-- <div class="box-item px-0 py-0">
                                <div class="thumb-nail">
                                    <img src="{{ asset('public_customer/images/invoice_dashboard.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
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
                                    <img src="{{ asset('public_customer/images/invoice_dashboard.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
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
                                    <img src="{{ asset('public_customer/images/invoice_dashboard.png')}}" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
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
                                
                            </div> -->
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
    
    <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_customer/customer_js/customer-home.js')}}" type="text/javascript "></script>
@endsection
