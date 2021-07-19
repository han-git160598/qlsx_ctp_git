@extends('dashboard_customer')
@section('customer_content')
<style>
    #my_detail_invoice .box-product .product-item > span:last-child {
        position: relative;
        top: 0;
        right: 0;
    }
</style>
    <!-- END HEADER -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Đơn mua</li>
                                </ol>
                            </nav>
                            <!-- end  breadcurmb-->
                            <div class="box-item w-100">
                                <div class="item-title d-flex py-3">
                                    <div class="icon w-10">
                                        <a href="#dir_box" class="d-block"><img src="{{ asset('public_customer/images/avatar.png')}}" alt=""></a>
                                    </div>
                                    <h4 class="mg-l-1rem t-left fw-600 t-cap fz-1rem lh-2rem " id="username_ac1"></h4>
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
                                            <a href="{{URL::to('my-announce')}}" class="d-flex">
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

                        <!-- My detail invoice -->
                        <div class="rcontent" id="my_detail_invoice">
                            <!-- <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            </div>
                            <div class="box-right w-100">
                                <div class="t-right mg-b-175rem">
                                    <span class="fw-400 d-inline-block">Mã đơn hàng: MDH879879 | Giao vào thứ sáu, 07/05</span>
                                </div>
                              


                     
                                <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                    <div class="item-title d-flex mg-b-15rem">
                                        <p class="fw-600 fz-125rem">Địa chỉ nhận hàng</p>
                                        <span data-tag="a" type="modal_edit_address_receive" class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                                    </div>
                                    <div class="item-title d-flex">
                                        <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi nhánh 1</p>
                                    </div>
                                    <div class="item-content">
                                        <p>
                                            <span class="icon"><img src="public/images/detail_account_black.png" alt=""></span>
                                            <span class="fw-600 fz-1rem">Jemis Kevin</span>
                                        </p>
                                        <p>
                                            <span class="icon"><img src="public/images/detail_phone_black.png" alt=""></span>
                                            <span class="fw-600 fz-1rem">(+84) 944810055</span>
                                        </p>
                                        <p>
                                            <span class="icon"><img src="public/images/detail_location_black.png" alt=""></span>
                                            <span class="fw-600 fz-1rem">Số 12 Đại lộ Khoa học, P, Ghềnh Ráng, Thành phố Qui Nhơn, Bình Định</span>
                                        </p>
                                    </div>
                                </div> 
                
                                <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                    <div class="item-title d-flex mg-b-15rem">
                                        <p class="fw-600 fz-125rem">Sản phẩm</p>
                                        <span data-tag="a" class="fw-400 fz-1rem t-blue">ĐANG GIAO</span>

                                    </div>
                                 
                   
                                 
                                    <div class="box-product">
                                        <a href="detail_product.html" class="item-title d-flex flex-start product-item py-2">
                                            <span class="fw-600 fz-125rem thumb-nail w-10">
                                                <img src="public/images/product_4.png" alt="">
                                            </span>
                                            <span class="fw-600 fz-125rem mg-l-125rem t-left">Bao bì kem 2 dòng
                                      
                                            <span class="d-flex py-2 align-item-center">
                                                <span class="t-lable mr-3">x1000 </span>
                                            </span>
                                            <span class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                            <span class="fz-075rem">Ly</span>
                                            </span>
                                            <span class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                            <span class="fz-075rem">Thùng</span>
                                            </span>
                                            <span class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                            <span class="fz-075rem">300 Cái/Thùng</span>
                                            </span>
                                            <span class="d-flex py-2 align-item-center">
                                                <span class="t-lable mr-3">99.000d</span>
                                            </span>
                                            </span>
                                        </a>
                                    </div>
                             
                                    <div class="box-money w-100">
                                
                                        <div class="d-flex justify-content-space-between py-2" id="total_money_final">
                                            <span class="fw-400 d-inline-block t-right w-80">Tổng:</span>
                                            <strong class="d-inline-block t-right w-20">223.000 đ</strong>
                                        </div>
                                    </div>


                                </div>

                            </div>  -->
                        </div>

                

                    </div>

                </div>
            </div>
            <!-- contact box -->
            <div class="d-none" id="contact-box">
                <span class="box-contact-shadow "></span>
                <span class="box-contact-close d-none "></span>
                <div class="box-contact ">

                    <div class="icon-contact ">
                        <div><img src="public/images/phone_1.png " alt=" "></div>
                        <p>Liên hệ</p>
                    </div>

                    <div class="menu-contact ">
                        <span class="triangle "></span>
                        <ul class="content-contact ">
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="public/images/icon-phone.png " alt=" "></a>
                                <a href="# " class="item-title ">(+84) 944810055</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="public/images/icon-mes.png " alt=" "></a>
                                <a href="# " class="item-title ">Messager</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="public/images/icon-viber.png " alt=" "></a>
                                <a href="# " class="item-title ">Viber</a>
                            </li>
                            <li class="item ">
                                <a href="# " class="item-icon "><img src="public/images/icon-zalo.png " alt=" "></a>
                                <a href="# " class="item-title ">Zalo</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_customer/customer_js/my-detail-invoice.js')}}" type="text/javascript "></script>

@endsection