@extends('dashboard_customer')
@section('customer_content')
    <div id="wrapper">
        <div class="wp-container">
            <!-- slider -->

            <!-- top content -->
            <!-- bot content -->
            <div class="bot-content mt-0">
                <div class="wp-content p-5">
                    <div class="box-content m-0">
                        <!-- SIDE BAR -->
                        <!-- Menu of user -->
                        <div class="side-bar box-left">
                            <!-- breadcurmb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb fz-1rem fw-400">
                                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                                    <li class="breadcrumb-item active" aria-current="page" >Đơn mua</li>
                                </ol>
                            </nav>
                            <!-- end  breadcurmb-->
                            <div class="box-item w-100">
                                <div class="item-title d-flex py-3">
                                    <div class="icon w-10">
                                        <a href="#dir_box" class="d-block"><img src="{{ asset('public_customer/images/avatar.png')}}" alt=""></a>
                                    </div>
                                    <h4 class="mg-l-1rem t-left fw-600 t-cap fz-1rem lh-2rem ">Jemis Kevin</h4>
                                </div>
                                <div class="item-content">
                                    <!-- menu side bar -->
                                    <ul class="menu-profile" id="sidebar_menu">
                                        <li class="item active">
                                            <a href="{{URL::to('my-order')}}" class="d-flex">
                                                <span class="icon">
                                                    <img src="{{ asset('public_customer/images/icon-invoice.png')}}" alt="">
                                                </span>
                                                <span class="mg-l-05rem lh-12rem">Đơn mua</span>
                                            </a>
                                        </li>
                                        <li class="item" id="my_info">
                                            <a href="{{URL::to('my-info')}}" class="d-flex">
                                                <span class="icon">
                                                    <img src="{{ asset('public_customer/images/icon-account.png')}}" alt="">
                                                </span>
                                                <span class="mg-l-05rem lh-12rem">Tài khoản của tôi</span>
                                            </a>
                                            <ul class="sub-menu-profile">
                                                <li class="item">
                                                    <a href="#my_profile" class="mg-l-05rem lh-12rem">Hồ sơ</a>
                                                </li>
                                                <li class="item active">
                                                    <a href="#my_address_send" class="mg-l-05rem lh-12rem">Địa chỉ gửi</a>
                                                </li>
                                                <li class="item">
                                                    <a href="#my_address_receive" class="mg-l-05rem lh-12rem">Địa chỉ nhận</a>
                                                </li>
                                                <li class="item">
                                                    <a href="#my_reset_password" class="mg-l-05rem lh-12rem">Đổi mật khẩu</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="item">
                                            <a href="my-announce.html" class="d-flex">
                                                <span class="icon">
                                                    <img src="{{ asset('public_customer/images/icon-announce.png')}}" alt="">
                                                </span>
                                                <span class="mg-l-05rem lh-12rem">Thông báo</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- CONTENT -->
                        <!-- ========================================================== -->
                        <!-- ========================================================== -->
                        <!-- ========================================================== -->
                        <!-- MY INVOICE -->
                        <div class="rcontent" id="my_detail_invoice"></div>
                        <div class="rcontent" id="my_invoice">
                            <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                                <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Thông báo</h4>
                            </div>
                            <div class="box-right w-100">
                                <!-- menu -->
                                <ul class="menu box-item mg-b-1rem w-100" id="menu_invoice">
                                    <li class="item active"><span type="all_order" onclick="list_customer_order()" data-tag="a">Tất cả</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(1)" data-tag="a">Chờ xác nhận</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(2)" data-tag="a">Đang xử lý</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(3)" data-tag="a">Giao hàng</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(4)" data-tag="a">Thanh toán</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(5)" data-tag="a">Hoàn tất</span></li>
                                    <li class="item"><span type="all_order" onclick="status_order(6)" data-tag="a">Hủy đơn</span></li>
                                </ul>
                                <!-- box -->
                                <div class="mcontent" id="all_order">
                                    <!-- <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                        <div class="d-flex mg-b-1rem justify-content-space-between">
                                            <span class="fw-400 fz-125rem t-label">Mã đơn hàng</span>
                                            <span class="fw-400 t-blue">ĐANG XỬ LÝ</span>
                                        </div>
                                        <div class="d-flex justify-content-space-between">
                                            <strong class="fz-15rem">MDH879879</strong>
                                            <p class="t-label">
                                                <span class="fw-400">02:39 PM </span>| <span class="fw-400">2021-04-24</span>
                                            </p>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-space-between">
                                            <a href="my-detail-invoice.html" class="btn btn-green">Chi tiết đơn hàng</a>
                                            <p>Tổng : <strong class="fz-15rem">223.000 đ</strong></p>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- box -->
                               

                            </div>
                        </div>
                   
           
                        
                    </div>

                </div>
            </div>
            <!-- contact box -->
            <div id="contact-box">
                <span class="box-contact-shadow "></span>
                <span class="box-contact-close"></span>
                <div class="box-contact ">

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



@endsection

    

   