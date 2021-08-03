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
                                <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
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
                                <!-- menu profile -->
                                <ul class="menu-profile" id="sidebar_menu">
                                    <li class="item">
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
                                            <li class="item">
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
                                    <li class="item active">
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
                    <!-- My announce-->
                    <div class="rcontent" id="my_announce">
                        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Thông báo</h4>
                        </div>
                        <div class="box-right w-100">
                            <div class="box-item d-flex mg-b-1rem px-3 py-5 w-100">
                                <div class="icon mg-r-15rem"><img src="{{asset('ctp/images/icon-invoice.png')}}" alt=""></div>
                                <div>
                                    <div class="item-title d-flex">
                                        <p class="fw-600 fz-125rem">Chấp nhận yêu cầu hủy đơn</p>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400">Yêu cầu hủy đơn của bạn đã được chấp nhận</p>
                                        <p class="fw-400">Mã đơn hàng <strong>MDH879879</strong> đã được hủy thành công</p>
                                        <p>
                                            <span>02:39 PM </span> | <span>2021-04-24</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-item d-flex mg-b-1rem px-3 py-5 w-100">
                                <div class="icon mg-r-15rem"><img src="{{asset('ctp/images/icon-invoice.png')}}" alt=""></div>
                                <div>
                                    <div class="item-title d-flex">
                                        <p class="fw-600 fz-125rem">Chấp nhận yêu cầu hủy đơn</p>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400">Yêu cầu hủy đơn của bạn đã được chấp nhận</p>
                                        <p class="fw-400">Mã đơn hàng <strong>MDH879879</strong> đã được hủy thành công</p>
                                        <p>
                                            <span>02:39 PM </span> | <span>2021-04-24</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-item d-flex mg-b-1rem px-3 py-5 w-100">
                                <div class="icon mg-r-15rem"><img src="{{asset('ctp/images/icon-invoice.png')}}" alt=""></div>
                                <div>
                                    <div class="item-title d-flex">
                                        <p class="fw-600 fz-125rem">Chấp nhận yêu cầu hủy đơn</p>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400">Yêu cầu hủy đơn của bạn đã được chấp nhận</p>
                                        <p class="fw-400">Mã đơn hàng <strong>MDH879879</strong> đã được hủy thành công</p>
                                        <p>
                                            <span>02:39 PM </span> | <span>2021-04-24</span>
                                        </p>
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
            <span class="box-contact-close d-none "></span>
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

@endsection