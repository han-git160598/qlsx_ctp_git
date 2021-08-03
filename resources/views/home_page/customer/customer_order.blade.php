@extends('customer.dashboard_customer')
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
                                <li class="breadcrumb-item active" aria-current="page">Đơn mua</li>
                            </ol>
                        </nav>
                        <!-- end  breadcurmb-->
                        <div class="box-item w-100">
                            <div class="item-title d-flex py-3">
                                <div class="icon w-10">
                                    <a href="#dir_box" class="d-block"><img src="{{asset('ctp/images/avatar.png')}}" alt=""></a>
                                </div>
                                <h4 class="mg-l-1rem t-left fw-600 t-cap fz-1rem lh-2rem ">Jemis Kevin</h4>
                            </div>
                            <div class="item-content">
                                <!-- menu side bar -->
                                <ul class="menu-profile" id="sidebar_menu">
                                    <li class="item active">
                                        <a href="{{asset('customer/order')}}" class="d-flex">
                                            <span class="icon">
                                                <img src="{{asset('ctp/images/icon-invoice.png')}}" alt="">
                                            </span>
                                            <span class="mg-l-05rem lh-12rem">Đơn mua</span>
                                        </a>
                                    </li>
                                    <li class="item" id="my_info">
                                        <a href="{{asset('customer/profile')}}" class="d-flex">
                                            <span class="icon">
                                                <img src="{{asset('ctp/images/icon-account.png')}}" alt="">
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
                                        <a href="{{asset('customer/notify')}}" class="d-flex">
                                            <span class="icon">
                                                <img src="{{asset('ctp/images/icon-announce.png')}}" alt="">
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
                   
                    <div class="rcontent" id="my_invoice">
                        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Thông báo</h4>
                        </div>
                        <div class="box-right w-100">
                            <!-- menu -->
                            <ul class="menu box-item mg-b-1rem w-100" id="menu_invoice">
                                <li class="item active"><span type="all_order" data-tag="a">Tất cả</span></li>
                                <li class="item"><span type="waiting_confirm" data-tag="a">Chờ xác nhận</span></li>
                                <li class="item"><span type="processing" data-tag="a">Đang xử lý</span></li>
                                <li class="item"><span type="delivery" data-tag="a">Giao hàng</span></li>
                                <li class="item"><span type="payment" data-tag="a">Thanh toán</span></li>
                                <li class="item"><span type="complete" data-tag="a">Hoàn tất</span></li>
                                <li class="item"><span type="cancel" data-tag="a">Hủy đơn</span></li>
                            </ul>
                            <!-- box -->
                            <div class="mcontent" id="all_order">
                                <div class="box-item mg-b-1rem px-3 py-5 w-100">
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
                                        <a href="#" onclick="detail_order()" class="btn btn-green">Chi tiết đơn hàng</a>
                                        <p>Tổng : <strong class="fz-15rem">223.000 đ</strong></p>
                                    </div>
                                </div>
                                <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                    <div class="d-flex mg-b-1rem justify-content-space-between">
                                        <span class="fw-400 fz-125rem t-label">Mã đơn hàng</span>
                                        <span class="fw-400 t-blue">HOÀN TẤT</span>
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
                                </div>
                                <div class="box-item mg-b-1rem px-3 py-5 w-100">
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
                                </div>
                            </div>
                            <!-- box -->
                           
                            <!-- box -->
                          
                            <!-- box -->
                          
                            <!-- box -->
                           
                            <!-- box  -->
                           
                            

                        </div>
                    </div>

                    <!-- My detail invoice -->
                    <div class="rcontent d-none" id="my_detail_invoice">
                        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Đơn hàng</h4>
                        </div>
                        <div class="box-right w-100">
                            <div class="t-right mg-b-175rem">
                                <span class="fw-400 d-inline-block">Mã đơn hàng: MDH879879 | Giao vào thứ sáu, 07/05</span>
                            </div>
                            <!-- PROGESS BAR -->
                            <ul class="progressbar mg-b-1rem">
                                <li class="active" data-step="1">
                                    <span class="icon"><img src="{{asset('ctp/images/invoice_active.png')}}" alt=""></span>
                                    <span>Đơn hàng đã đặt</span>
                                </li>
                                <li data-step="2">
                                    <span class="icon"><img src="{{asset('ctp/images/chalks.png')}}" alt=""></span>
                                    <span>Chuẩn bị NVL</span>
                                </li>
                                <li data-step="3">
                                    <span class="icon"><img src="{{asset('ctp/images/engineering.png')}}" alt=""></span>
                                    <span>Đang gia công</span>
                                </li>
                                <li data-step="4">
                                    <span class="icon"><img src="{{asset('ctp/images/shipping.png')}}" alt=""></span>
                                    <span>Đang giao</span>
                                </li>
                                <li data-step="5">
                                    <span class="icon"><img src="{{asset('ctp/images/tick.png')}}" alt=""></span>
                                    <span>Đơn hàng đã giao</span>
                                </li>
                            </ul>

                            <!-- box -->
                            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                <div class="item-title d-flex mg-b-15rem">
                                    <p class="fw-600 fz-125rem">Địa chỉ nhận hàng</p>
                                    <a href="#modal_edit_address_receive" class="fw-400 fz-1rem t-green-main">Sửa</a>
                                </div>
                                <div class="item-title d-flex">
                                    <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi nhánh 1</p>
                                </div>
                                <div class="item-content">
                                    <p>
                                        <span class="icon"><img src="{{asset('ctp/images/detail_account_black.png')}}" alt=""></span>
                                        <span class="fw-600 fz-1rem">Jemis Kevin</span>
                                    </p>
                                    <p>
                                        <span class="icon"><img src="{{asset('ctp/images/detail_phone_black.png')}}" alt=""></span>
                                        <span class="fw-600 fz-1rem">(+84) 944810055</span>
                                    </p>
                                    <p>
                                        <span class="icon"><img src="{{asset('ctp/images/detail_location_black.png')}}" alt=""></span>
                                        <span class="fw-600 fz-1rem">Số 12 Đại lộ Khoa học, P, Ghềnh Ráng, Thành phố Qui Nhơn, Bình Định</span>
                                    </p>
                                    <a href="#modal_delete_address_send" class="btn btn-green">Xóa</a>
                                </div>
                            </div>
                            <!-- box product -->
                            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                <div class="item-title d-flex mg-b-15rem">
                                    <p class="fw-600 fz-125rem">Sản phẩm</p>
                                    <a href="#modal_edit_address_receive" class="fw-400 fz-1rem t-blue">ĐANG GIAO</a>
                                </div>
                                <!-- product item -->
                                <div class="box-product">
                                    <a href="#detail_product" class="item-title d-flex product-item py-2">
                                        <span class="fw-600 fz-125rem thumb-nail w-10">
                                            <img src="{{asset('ctp/images/product_4.png')}}" alt="">
                                        </span>
                                        <span class="fw-600 fz-125rem mg-l-125rem">Bao bì kem 2 dòng</span>
                                        <span class="fw-400 fz-1rem t-right">
                                            <span class="d-block t-right">99.000 đ</span>
                                        <span class="d-block t-right">x2 Cái</span>
                                        </span>
                                    </a>
                                    <a href="#detail_product" class="item-title d-flex product-item py-2">
                                        <span class="fw-600 fz-125rem thumb-nail w-10">
                                            <img src="{{asset('ctp/images/product_4.png')}}" alt="">
                                        </span>
                                        <span class="fw-600 fz-125rem mg-l-125rem">Bao bì kem 2 dòng</span>
                                        <span class="fw-400 fz-1rem t-right">
                                            <span class="d-block t-right">99.000 đ</span>
                                        <span class="d-block t-right">x2 Cái</span>
                                        </span>
                                    </a>
                                </div>
                                <!-- total money-->
                                <div class="box-money w-100">
                                    <div class="d-flex justify-content-space-between py-2">
                                        <span class="fw-400 d-inline-block t-right w-80">Tổng tiền hàng:</span>
                                        <span class="fw-400 d-inline-block t-right w-20" id="total_money_order">198.000 đ</span>
                                    </div>
                                    <div class="d-flex justify-content-space-between py-2">
                                        <span class="fw-400 d-inline-block t-right w-80">Phí vận chuyển:</span>
                                        <span class="fw-400 d-inline-block t-right w-20" id="fee_ship">25.000 đ</span>
                                    </div>
                                    <div class="d-flex justify-content-space-between py-2">
                                        <span class="fw-400 d-inline-block t-right w-80">Giảm giá:</span>
                                        <span class="fw-400 d-inline-block t-right w-20" id="sale_price">0 đ</span>
                                    </div>
                                    <div class="d-flex justify-content-space-between py-2" id="total_money_final">
                                        <span class="fw-400 d-inline-block t-right w-80">Tổng:</span>
                                        <strong class="d-inline-block t-right w-20">223.000 đ</strong>
                                    </div>
                                </div>

                            </div>

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
<script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('backend/js/main/customer/customer_order.js') }}"></script>
@endsection