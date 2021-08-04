@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

        <li class="item "><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
        <li class="item"><a href="{{url('admin/customer_list_vendor')}}">Nhà cung ứng</a></li>
        <li class="item "><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item active"><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection

@section('content')
<div id="wp-content">
    <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Tài khoản
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3"
            style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="get_modal t-green-main d-block t-right w-20 t-left">+Thêm tài
                khoản</span>

            <div class="form-edit-row m-0 w-35">
                <div class="search" style="position: relative;">
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2"
                        value="">
                    <button class="input d-flex">
                        <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img
                                src="{{asset('public_admin/images/search_black.png')}}" alt=""></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="box p-0">
            <!-- tab -->
            <!-- tabs container -->
            <div class="tabs-container">
                <ul class="sub-menu nav nav-tabs tab-border-top-danger" style="position: relative;">
                    <li class="sub-item active">
                        <a data-toggle="tab" href="#tab-1" aria-expanded="true">Danh sách tài khoản</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-2" aria-expanded="false">Quản lý tài khoản</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-3" aria-expanded="false">Quản lý quyền hạn</a>
                    </li>

                    <div
                        style="display: flex; justify-content: space-between; position: absolute; top: .5rem; right: .5rem; width: 20%; align-items: center;">
                        <p>Chế độ xem</p>
                        <div>
                            <select name="filter_by_page" id="filter_by_page" class="py-1 px-3">
                                <option value="1">Theo trang</option>
                            </select>
                        </div>
                    </div>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Username
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Tên
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Vai trò
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Số điện thoại
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Trạng thái
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="list_account">
                                    {{-- <tr data-id-account="1" type="edit_module" class="click_doubble get_modal">
                                        <td>NguyenA</td>
                                        <td>Nguyễn Văn A</td>
                                        <td>Admin</td>
                                        <td>(+84) 944810055</td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <span data-tag="a" type="change_pass"
                                                class="get_modal t-green-main my-1 ml-4">Mật khẩu</span>
                                            <span data-tag="a" type="delete_module"
                                                class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <div class="section list_slide">
                                <div class="loader loader-1">
                                    <div class="loader-outter"></div>
                                    <div class="loader-inner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Vai trò
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Mô tả
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="list_type">
                                    {{-- <tr data-id-account="1" type="edit_module" class="click_doubble get_modal">
                                        <td>Admin</td>
                                        <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut
                                            mauris congue...</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Quyền hạn
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Mô tả
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="list_permission">
                                    {{-- <tr data-id-account="1" type="edit_module" class="click_doubble get_modal">
                                        <td>Dashboard</td>
                                        <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut
                                            mauris congue...</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <ul class="pagination">
            <li class="item prev"><i class="fas fa-chevron-left"></i></li>
            <li class="item">1</li>
            <li class="item">2</li>
            <li class="item">3</li>
            <li class="item">4</li>
            <li class="item">5</li>
            <li class="item next"><i class="fas fa-chevron-right"></i></li>
        </ul>
    </div>
</div>
@endsection

@section('modal')
    <!-- modal create / edit -->
    <div class="modal" id="add_module">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm tài khoản mới</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="username" class="form-info-lable">Tên đăng nhập</label>
                                <div class="form-info-input-content">
                                    <input type="text" id="username" class="" value="" placeholder="Nhập tên đăng nhập">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="phone" class="fw-400 lh-12rem">Số điện thoại</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="number" id="phone" class="" value="" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="fullname" class="fw-400 lh-12rem">Họ và tên</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="fullname" class="" value="" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="email" class="fw-400 lh-12rem">Email</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="email" id="email" class="" value="" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="password" class="fw-400 lh-12rem">Mật khẩu</label>
                                </div>
                                <div class="form-info-input-content">
                                    <div class="form-info-row justify-content-space-between">
                                        <input type="text" id="password" class="w-70 py-1" value=""
                                            placeholder="Nhập email">
                                        <button class="rand_pass btn btn-green btn-outline py-1">Tạo mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                            <!-- {{-- <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="is_business" class="">Gửi thông báo</label>
                                </div>

                                <div class="form-info-input-content t-left">
                                    <input type="checkbox"class="d-inline-block w-10" checked name="is_business"
                                        id="is_business">
                                    <label for="is_business">Gửi thông báo đến số điện thoại của người dùng mới</label>
                                </div>
                            </div> --}} -->
                            <div class="form-info-row">
                                <div class="form-info-lable">
                                    <label for="type_account" class="fw-400 lh-12rem">Vai trò</label>
                                </div>
                                <div class="form-info-input-content">
                                    <select name="type_account" class="">
                                        <option value="0">Chọn vai trò</option>
                                    </select>
                                    <!-- {{-- <ul id="list_role_checked">
                                        <li class="item rounder">
                                            <span>Dashboard</span>
                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                    </ul> --}} -->
                                    <span data-tag="a" class="t-green-main d-block t-right t-left mt-2">Thêm quyền hạn</span>
                                    <ul id="add_role">
                                        <!-- {{-- <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li> --}} -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="btn_add_account" class="btn-submit w-20 d-inline-block fz-1rem">Thêm tài khoản</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="edit_module">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm tài khoản mới</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label  class="form-info-lable">Tên đăng nhập</label>
                                <div class="form-info-input-content">
                                    <input type="text" name="username" class="" readonly value="" placeholder="Nhập tên đăng nhập">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label  class="fw-400 lh-12rem">Số điện thoại</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="number" name="phone" class="" value="" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Họ và tên</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" name="fullname" class="" value="" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Email</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="email" name="email" class="" value="" placeholder="Nhập email">
                                </div>
                            </div>
                            {{-- <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="title" class="">Gửi thông báo</label>
                                </div>

                                <div class="form-info-input-content t-left">
                                    <input type="checkbox" class="d-inline-block w-10" checked name="is_business"
                                        id="is_business">
                                    <label for="is_business">Gửi thông báo đến số điện thoại của người dùng mới</label>
                                </div>
                            </div> --}}
                            <div class="form-info-row">
                                <div class="form-info-lable">
                                    <label for="type_account" class="fw-400 lh-12rem">Vai trò</label>
                                </div>
                                <div class="form-info-input-content">
                                    <select name="type_account">
                                        {{-- <option value="0">Chọn vai trò</option> --}}
                                    </select>
                                    {{-- <ul id="list_role_checked">
                                        <li class="item rounder">
                                            <span>Dashboard</span>
                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                        <li class="item rounder">
                                            <span>Dashboard</span>

                                            <i class="fas fa-times-circle icon"></i>
                                        </li>
                                    </ul> --}}
                                    <span data-tag="a" class="t-green-main d-block t-right t-left">Thêm quyền hạn</span>
                                    <ul id="edit_role">
                                        {{-- <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="btn_edit_account" class="btn-submit w-20 d-inline-block fz-1rem">Sửa tài khoản</button>
                </div>
            </div>
        </div>
    </div>
    <!-- change pass -->
    <div class="modal" id="change_pass">
        <div class="modal-box w-30" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thay đổi mật khẩu</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-login">
                    <div class="form-box">
                        <input type="password" name="pw-old" id="pw-old" placeholder="Nhập mật khẩu mới" class="form-input">
                        <i class="far fa-eye-slash form-icon hidden_pass" ></i>
                    </div>
                    <div class="form-box">
                        <input type="password" name="pw-new" id="pw-new" placeholder="Xác nhận mật khẩu" class="form-input">
                        <i class="far fa-eye-slash form-icon hidden_pass" ></i>
                    </div>
                    <div class="form-box note-box">
                        <small class="note">Ít nhất một kí tự viết thường</small>
                        <small class="note">Ít nhất một kí tự viết hoa</small>
                        <small class="note">8-16 kí tự</small>
                    </div>
                    <div class="form-box t-right">
                        <button class="btn btn-green t-right" id="btn_change_pass">Xác nhận</button>
                    </div>
                </div>
                <!-- <div class="item-content t-right mg-t-175rem ">
                        <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                    </div> -->
            </div>
        </div>
    </div>

    <!-- modal delete file attach -->
    <div class="modal" id="delete_module">
        <div class="modal-box w-40">
            <div class="modal-title">
                <h4>Xóa thông tin</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="{{asset('public_admin/images/warning-del.png')}}" alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa tài khoản này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="submit_delete" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')
<script src="{{asset('public_admin/admin_js/customer_list_account.js')}}" type="text/javascript"></script>
@endsection
