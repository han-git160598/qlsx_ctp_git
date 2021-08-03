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
                                <!-- menu side bar -->
                                <ul class="menu-profile" id="sidebar_menu">
                                    <li class="item">
                                        <a href="{{asset('customer/order')}}" class="d-flex">
                                            <span class="icon">
                                                <img src="{{asset('ctp/images/icon-invoice.png')}}" alt="">
                                            </span>
                                            <span class="mg-l-05rem lh-12rem">Đơn mua</span>
                                        </a>
                                    </li>
                                    <li class="item active" id="my_info">
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
                                    <li class="items">
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
                    <!-- My profile -->
                    <div class="rcontent" id="my_profile">
                        <div class="item-title mg-b-05rem py-05rem px-1rem">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Thông tin cá nhân</h4>
                        </div>
                        <div class="box-right w-100">
                            <div class="box-item px-3 py-5 w-100">
                                <!-- FORM INFO -->
                                <form action="" method="post" class="box-request form-info">
                                    <div class="form-info-content">
                                        <div class="form-info-left">
                                            <input type="file" name="avatar" class="form-info-input-file" id="avatar">
                                            <span class="form-info-input-img"><img src="{{asset('ctp/images/account-reg.png')}}" alt=""></span>
                                            <label for="avatar" class="form-info-lable">Dụng lượng file tối đa 1 MB
                                                        Định dạng:.JPEG, .png')}}</label>
                                        </div>

                                        <div class="form-info-right">
                                            <div class="form-info-row">
                                                <div class="form-info-lable">
                                                    <label for="name_business" class="fw-400 lh-12rem">Tên công ty</label>
                                                </div>
                                                <div class="form-info-input-content">
                                                    <input type="text" name="name_business" id="name_business" placeholder="Nhập tên công ty" value="Công ty Cổ Phần XYZ">
                                                </div>
                                            </div>
                                            <div class="form-info-row">
                                                <div class="form-info-lable">
                                                    <label for="name_user" class="fw-400 lh-12rem">Họ và tên</label>
                                                </div>
                                                <div class="form-info-input-content">
                                                    <input type="text" name="name_user" id="name_user" placeholder="Nhập họ và tên" value="Jemis Kevin">
                                                </div>
                                            </div>
                                            <div class="form-info-row">
                                                <div class="form-info-lable">
                                                    <label for="phone_user" class="fw-400 lh-12rem">Số điện thoại</label>
                                                </div>
                                                <div class="form-info-input-content">
                                                    <input type="text" name="phone_user" id="phone_user" class="read-only" readonly value="(+84) 944810055">
                                                </div>
                                            </div>
                                            <div class="form-info-row">
                                                <div class="form-info-lable">
                                                    <label for="email_user" class="fw-400 lh-12rem">Email</label>
                                                </div>
                                                <div class="form-info-input-content">
                                                    <input type="text" name="email_user" id="email_user" class="read-only" readonly value="Jemis.Kevin@qtctek.com">
                                                </div>
                                            </div>
                                            <div class="form-info-row form-info-row-radio">
                                                <div class="form-info-lable">
                                                    <label class="fw-400 lh-12rem">Giới tính</label>
                                                </div>

                                                <div class="form-info-input-content form-info-input-radio">
                                                    <input type="radio" id="male" name="gender" value="male" checked>
                                                    <label for="male">Nam</label>
                                                    <input type="radio" id="female" name="gender" value="female">
                                                    <label for="female">Nữ</label>
                                                    <input type="radio" id="other" name="gender" value="other">
                                                    <label for="other">Khác</label>
                                                </div>

                                            </div>
                                            <div class="form-info-row">
                                                <div class="form-info-lable">
                                                    <label class="fw-400 lh-12rem">Ngày sinh</label>
                                                </div>
                                                <div class="form-info-input-content">
                                                    <select name="day" id="day" class="form-info-select">
                                                            <option value="0">Ngày</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                    <select name="month" id="month" class="form-info-select">
                                                            <option value="0">Tháng</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                    <select name="year" id="year" class="form-info-select">
                                                            <option value="0">Năm</option>
                                                            <option value="1">01</option>
                                                            <option value="2">02</option>
                                                            <option value="3">03</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-info-submit">
                                        <input type="submit" class="btn-submit w-10" value="Lưu">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- My address send -->
                    <div class="rcontent d-none" id="my_address_send">
                        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Địa chỉ gửi</h4>
                            <span data-tag="a" type="modal_add_address_send" class="get_modal fw-400 fw-125rem t-green-main">+ Thêm địa chỉ</span>
                        </div>
                        <div class="box-right w-100">
                            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                <div class="item-title d-flex">
                                    <p class="fw-600 fz-125rem">Phước Bình</p>
                                    <span class="fw-600 fz-075rem default">Mặc định</span>
                                    <span data-tag="a" type="modal_edit_address_send" class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
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
                                        <span class="fw-600 fz-1rem">157/17/1 Nguyen Gia Tri Street, Ward 25, Binh Thanh District, HCM City</span>
                                    </p>
                                    <span data-tag="a" type="modal_delete_address_send" class="get_modal btn btn-green">Xóa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL my address send-->
                    <!-- Modal edit my address send-->
                    <div class="modal" id="modal_edit_address_send">
                        <div class="modal-box">
                            <div class="box-content justify-content-center">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Chỉnh sửa địa chỉ gửi</h4>
                                        <span class="icon"><a href="#"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></a></span>
                                    </div>
                                    <form action="" method="post" class="form-edit">
                                        <div class="form-edit-row">
                                            <label class="form-lable">Tên gợi nhớ</label>
                                            <input type="text" class="form-input" name="address_name" id="address_name" value="Phước Bình">
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex">
                                                <label class="form-lable">Liên hệ</label>
                                                <input type="text" class="form-input" name="contact_name" id="contact_name" value="Jemis Kevin">
                                            </div>
                                            <div class="form-box-flex">
                                                <label class="form-lable">Số điện thoại</label>
                                                <input type="text" class="form-input name" name="contact_number" id="contact_number " value="(+84) 944810055 ">
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Thành phố</label>
                                            <select name="city " id="city " class="form-select">
                                                    <option value="0 ">TP. Hồ Chí Minh</option>
                                                </select>
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Quận/huyện</label>
                                                <select name="district " id="district " class="form-select">
                                                            <option value="0 ">Quận Bình Thạnh</option>
                                                        </select>
                                            </div>
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Phường/xã</label>
                                                <select name="ward " id="ward " class="form-select">
                                                            <option value="0 ">Phường 25</option>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Địa chỉ</label>
                                            <select name="address " id="address " class="form-select">
                                                    <option value="0 ">157/17/1 Nguyen Gia Tri Street</option>
                                                </select>
                                        </div>
                                        <div class="form-edit-row-check ">
                                            <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                        </div>
                                    </form>

                                    <div class="item-content mg-t-2rem d-flex justify-content-end ">
                                        <button class="btn-submit w-30 ">Hoàn thành</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal add my address send-->
                    <div class="modal" id="modal_add_address_send">
                        <div class="modal-box">
                            <div class="box-content justify-content-center">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thêm địa chỉ gửi</h4>
                                        <span class="icon"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></span>
                                    </div>
                                    <form action="" method="post" class="form-edit">
                                        <div class="form-edit-row">
                                            <label class="form-lable">Tên gợi nhớ</label>
                                            <input type="text" class="form-input" name="address_name" id="address_name" placeholder="Nhập tên công ty" value="">
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex">
                                                <label class="form-lable">Liên hệ</label>
                                                <input type="text" class="form-input" name="contact_name" id="contact_name" placeholder="Nhập tên người đại diện" value="">
                                            </div>
                                            <div class="form-box-flex">
                                                <label class="form-lable">Số điện thoại</label>
                                                <input type="text" class="form-input name" name="contact_number" id="contact_number" placeholder="Số điện thoại" value="">
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Thành phố</label>
                                            <select name="city " id="city " class="form-select">
                                                <option value="0 ">Chọn thành phố</option>
                                            </select>
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Quận/huyện</label>
                                                <select name="district " id="district " class="form-select">
                                                        <option value="0 ">Chọn quận/huyện</option>
                                                    </select>
                                            </div>
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Phường/xã</label>
                                                <select name="ward " id="ward " class="form-select">
                                                        <option value="0 ">Chọn phường/xã</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Địa chỉ</label>
                                            <select name="address " id="address " class="form-select">
                                                <option value="0 ">Nhập địa chỉ cụ thể</option>
                                            </select>
                                        </div>
                                        <div class="form-edit-row-check ">
                                            <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                        </div>
                                    </form>

                                    <div class="item-content mg-t-2rem d-flex justify-content-end ">
                                        <button class="btn-submit w-30 ">Hoàn thành</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal delete my address send-->
                    <div class="modal" id="modal_delete_address_send">
                        <div class="modal-box">
                            <div class="box-content justify-content-center">
                                <div class="box-item w-100 ">
                                    <div class="item-title ">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem ">Xóa địa chỉ</h4>
                                        <span class="icon "><a href="# "><img src="{{asset('ctp/images/x-black.png')}} " alt=" "></a></span>
                                    </div>
                                    <div class="item-content mg-t-2rem t-center">
                                        <span class="d-inline-block tick-success "><img src="{{asset('ctp/images/warning-del.png')}} " alt=" "></span>
                                        <p class="t-center mg-t-2rem ">Bạn có chắc muốn xóa địa chỉ này?</p>
                                    </div>

                                    <div class="item-content t-center mg-t-175rem ">
                                        <button class="btn-submit w-30 d-inline-block">Hoàn thành</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========================================================== -->
                    <!-- ========================================================== -->
                    <!-- ========================================================== -->

                    <!-- My address receive -->
                    <div class="rcontent d-none" id="my_address_receive">
                        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Địa chỉ nhận</h4>
                            <span data-tag="a" type="modal_add_address_receive" class="get_modal fw-400 fw-125rem t-green-main">+ Thêm địa chỉ</span>
                        </div>
                        <div class="box-right w-100">
                            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                                <div class="item-title d-flex">
                                    <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi Nhánh 1</p>
                                    <span class="fw-600 fz-075rem default">Mặc định</span>
                                    <span data-tag="a" type="modal_edit_address_receive" class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
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
                                    <span data-tag="a" type="modal_delete_address_send" class="get_modal btn btn-green">Xóa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL my address send-->
                    <!-- Modal edit my address receive-->
                    <div class="modal" id="modal_edit_address_receive">
                        <div class="modal-box">
                            <div class="box-content justify-content-center">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Chỉnh sửa địa chỉ nhận</h4>
                                        <span class="icon"><a href="#"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></a></span>
                                    </div>
                                    <form action="" method="post" class="form-edit">
                                        <div class="form-edit-row">
                                            <label class="form-lable">Tên gợi nhớ</label>
                                            <input type="text" class="form-input" name="address_name" id="address_name" value="Phước Bình">
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex">
                                                <label class="form-lable">Liên hệ</label>
                                                <input type="text" class="form-input" name="contact_name" id="contact_name" value="Jemis Kevin">
                                            </div>
                                            <div class="form-box-flex">
                                                <label class="form-lable">Số điện thoại</label>
                                                <input type="text" class="form-input name" name="contact_number" id="contact_number " value="(+84) 944810055 ">
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Thành phố</label>
                                            <select name="city " id="city " class="form-select">
                                                    <option value="0 ">TP. Hồ Chí Minh</option>
                                                </select>
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Quận/huyện</label>
                                                <select name="district " id="district " class="form-select">
                                                            <option value="0 ">Quận Bình Thạnh</option>
                                                        </select>
                                            </div>
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Phường/xã</label>
                                                <select name="ward " id="ward " class="form-select">
                                                            <option value="0 ">Phường 25</option>
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Địa chỉ</label>
                                            <select name="address " id="address " class="form-select">
                                                    <option value="0 ">157/17/1 Nguyen Gia Tri Street</option>
                                                </select>
                                        </div>
                                        <div class="form-edit-row-check ">
                                            <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                        </div>
                                    </form>

                                    <div class="item-content mg-t-2rem d-flex justify-content-end ">
                                        <button class="btn-submit w-30 ">Hoàn thành</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal add my address receive-->
                    <div class="modal" id="modal_add_address_receive">
                        <div class="modal-box">
                            <div class="box-content justify-content-center">
                                <div class="box-item w-100">
                                    <div class="item-title">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thêm địa chỉ nhận</h4>
                                        <span class="icon"><a href="#"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></a></span>
                                    </div>
                                    <form action="" method="post" class="form-edit">
                                        <div class="form-edit-row">
                                            <label class="form-lable">Tên gợi nhớ</label>
                                            <input type="text" class="form-input" name="address_name" id="address_name" placeholder="Nhập tên công ty" value="">
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex">
                                                <label class="form-lable">Liên hệ</label>
                                                <input type="text" class="form-input" name="contact_name" id="contact_name" placeholder="Nhập tên người đại diện" value="">
                                            </div>
                                            <div class="form-box-flex">
                                                <label class="form-lable">Số điện thoại</label>
                                                <input type="text" class="form-input name" name="contact_number" id="contact_number" placeholder="Số điện thoại" value="">
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Thành phố</label>
                                            <select name="city " id="city " class="form-select">
                                                <option value="0 ">Chọn thành phố</option>
                                            </select>
                                        </div>
                                        <div class="form-edit-row form-edit-row-flex input-content ">
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Quận/huyện</label>
                                                <select name="district " id="district " class="form-select">
                                                        <option value="0 ">Chọn quận/huyện</option>
                                                    </select>
                                            </div>
                                            <div class="form-box-flex ">
                                                <label class="form-lable ">Phường/xã</label>
                                                <select name="ward " id="ward " class="form-select">
                                                        <option value="0 ">Chọn phường/xã</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-edit-row ">
                                            <label class="form-lable ">Địa chỉ</label>
                                            <select name="address " id="address " class="form-select">
                                                <option value="0 ">Nhập địa chỉ cụ thể</option>
                                            </select>
                                        </div>
                                        <div class="form-edit-row-check ">
                                            <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                        </div>
                                    </form>

                                    <div class="item-content mg-t-2rem d-flex justify-content-end ">
                                        <button class="btn-submit w-30 ">Hoàn thành</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal delete my address receive-->

                    <!-- ========================================================== -->
                    <!-- ========================================================== -->
                    <!-- ========================================================== -->

                    <!-- Change password-->
                    <div class="rcontent d-none" id="my_reset_password">
                        <div class="item-title mg-b-05rem py-05rem px-1rem">
                            <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Đổi mật khẩu</h4>
                        </div>

                        <div class="box-right w-100">

                            <div class="box-item w-100 t-center">
                                <div class="t-center warning">
                                    <div class="warning-retangle">
                                        <span class="warning-icon"><a href="# "><img src="{{asset('ctp/images/carbon_warning.png')}} " alt=" "></a></span>
                                        <span class="warning-text">Để bảo đảm an toàn, vui lòng không chia sẻ mật khẩu cho người khác</span>
                                    </div>
                                </div>

                                <form action=" " method="post" class="form-login w-60 d-inline-block">
                                    <div class="form-box">
                                        <input type="password " name="password_old" id="password_old" class="form-input" placeholder="Nhập mật khẩu hiện tại">
                                        <span class="form-icon"><img src="{{asset('ctp/images/eye.png')}} " alt=" "></span>
                                    </div>
                                    <div class="form-box">
                                        <input type="password " name="password_new" id="password_new" class="form-input" placeholder="Nhập mật khẩu mới">
                                        <span class="form-icon"><img src="{{asset('ctp/images/eye.png')}} " alt=" "></span>
                                    </div>
                                    <div class="form-box">
                                        <input type="password" name="password_confirm" id="password_confirm" class="form-input" placeholder="Xác nhận mật khẩu">
                                        <span class="form-icon"><img src="{{asset('ctp/images/eye.png')}} " alt=" "></span>
                                    </div>
                                </form>

                                <div class="item-content mg-t-1rem t-center ">
                                    <button class="btn-submit w-20 mg-t-1rem d-inline-block ">Xác nhận</button>
                                    <a href="# " class="d-block t-green-main fw-600 fz-1rem t-center mg-t-1rem ">Quên mật khẩu?</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ========================================================== -->
                    <!-- ========================================================== -->
                    <!-- ========================================================== -->

                    <!-- My announce-->


                    <!-- ========================================================== -->
                    <!-- ========================================================== -->
                    <!-- ========================================================== -->
                    <!-- MY INVOICE -->


                    <!-- My detail invoice -->


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