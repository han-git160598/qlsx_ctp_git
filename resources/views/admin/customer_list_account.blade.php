<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public_admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/reset.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/global.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/css/font-awesome/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/style.css" rel="stylesheet" type="text/css" />
    <link href="../public_admin/responsive.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../public_admin/carousel/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../public_admin/carousel/owl-carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">

    <link rel="icon" href="../public_admin/images/logolink.png" type="image/x-icon">

    <title>QLSX - Cường Thịnh Phúc</title>
</head>

<body>
    <header>
        <div id="wp-header" class="header-customer">
            <nav class="bot-header">
                <div class="dir-user">
                    <div class="dir-tx">
                        <div class="fz-075rem t-right">Tài khoản</div>
                        <p>Jemis Kevin</p>
                    </div>
                    <div class="icon">
                        <span><img src="../public_admin/images/avatar.png" alt=""></span>
                    </div>
                    <div class="arrow-down">
                        <span><img src="../public_admin/images/arrow_down.png" alt=""></span>
                    </div>
                </div>

                <div class="ring-bell">
                    <!-- header-cart -->
                    <span class="d-block icon"><img src="../public_admin/images/bell.png" alt=""></span>
                    <span class="amount">4</span>
                </div>

                <div class="dir-box" id="dir_box">
                    <span class="triangle"></span>
                    <div class="box-text">
                        <a href="my-info.html">Tài khoản của tôi</a>
                        <a href="my-reset-password.html">Thay đổi mật khẩu</a>
                        <a href="index.html">Đăng xuất</a>
                    </div>
                </div>

                <div class="logo">
                    <a href="#"><img src="../public_admin/images/logo.png" alt=""></a>
                </div>
            </nav>
        </div>
        <div id="header-hidden"></div>
    </header>

    <!-- END HEADER -->
    <div id="wp-admin">
        <!-- sidebar left fixed -->
        <div id="sidebar-left">
            <ul id="main-menu">
                <li class="item"><a href="customer_index.html">Dasboard</a></li>
                <li class="item"><a href="customer_list_customer.html">Khách hàng</a></li>
                <li class="item"><a href="customer_list_order.html">Đơn hàng</a></li>
                <li class="item"><a href="customer_list_product_inventory.html">Kho hàng</a></li>
                <li class="item"><a href="customer_list_inventory.html">Kiểm kê kho</a></li>

                <li class="item"><a href="customer_list_production.html">Sản xuất</a></li>
                <li class="item"><a href="customer_list_vendor.html">Nhà cung ứng</a></li>
                <li class="item"><a href="customer_list_product.html">Sản phẩm</a></li>
                <li class="item"><a href="customer_list_ship.html">Vận chuyển</a></li>
                <li class="item  active"><a href="customer_list_account.html">Tài khoản</a></li>
                <li class="item"><a href="customer_setting.html">Cài đặt</a></li>
            </ul>
        </div>
        <div id="sidebar-left-hidden"></div>
        <!-- wp content -->
        <div id="wp-content">
            <!-- content -->
            <div id="content" class="w-100" style="float: none;">
                <h1 class="heading mb-4">
                    Tài khoản
                </h1>
                <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
                    <span data-tag="a" type="add_module" class="get_modal t-green-main d-block t-right w-20 t-left">+Thêm tài khoản</span>
                    <!-- filter date -->
                    <!-- <div class="form-edit-row-flex align-item-center">
                        <div class="form-edit-row m-0">
                            <input type="date" class="form-input py-1 px-2">
                        </div>
                        <div class="form-edit-row m-0 mx-3">
                            <p>Đến</p>
                        </div>
                        <div class="form-edit-row m-0">
                            <input type="date" class="form-input py-1 px-2">
                        </div>
                    </div> -->

                    <div class="form-edit-row m-0 w-35">
                        <div class="search" style="position: relative;">
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
                            <button class="input d-flex">
                                <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img src="../public_admin/images/search_black.png" alt=""></span>
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

                            <div style="display: flex; justify-content: space-between; position: absolute; top: .5rem; right: .5rem; width: 20%; align-items: center;">
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
                                        <tbody>
                                            <tr data-id-customer="1" type="edit_module" class="click_doubble get_modal">
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
                                                    <span data-tag="a" type="change_pass" class="get_modal t-green-main my-1 ml-4">Mật khẩu</span>
                                                    <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                                </td>
                                            </tr>
                                            <tr data-id-customer="2" type="edit_module" class="click_doubble get_modal">
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
                                                    <span data-tag="a" type="change_pass" class="get_modal t-green-main my-1 ml-4">Mật khẩu</span>
                                                    <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                        <tbody>
                                            <tr data-id-customer="1" type="edit_module" class="click_doubble get_modal">
                                                <td>Admin</td>
                                                <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue...</td>
                                            </tr>
                                            <tr data-id-customer="2" type="edit_module" class="click_doubble get_modal">
                                                <td>Admin</td>
                                                <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue...</td>
                                            </tr>
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
                                        <tbody>
                                            <tr data-id-customer="1" type="edit_module" class="click_doubble get_modal">
                                                <td>Dashboard</td>
                                                <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue...</td>
                                            </tr>
                                            <tr data-id-customer="2" type="edit_module" class="click_doubble get_modal">
                                                <td>Khách hàng</td>
                                                <td>Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue...</td>
                                            </tr>
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

    </div>
    </div>



    <!-- modal create / edit -->
    <div class="modal" id="add_module">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm tài khoản mới</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên đăng nhập</label>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập tên đăng nhập">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Số điện thoại</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Họ và tên</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Email</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="email" class="" value="" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Mật khẩu</label>
                                </div>
                                <div class="form-info-input-content">
                                    <div class="form-info-row justify-content-space-between">
                                        <input type="text" class="w-70 py-1" value="D#)zS0Uu(rUu2EV*UM0Z2QW%" placeholder="Nhập email">
                                        <button class="rand_pass btn btn-green btn-outline py-1">Tạo mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="title" class="">Gửi thông báo</label>
                                </div>

                                <div class="form-info-input-content t-left">
                                    <input type="checkbox" class="d-inline-block w-10" checked name="is_business" id="is_business">
                                    <label for="is_business">Gửi thông báo đến số điện thoại của người dùng mới</label>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <div class="form-info-lable">
                                    <label for="role" class="fw-400 lh-12rem">Vai trò</label>
                                </div>
                                <div class="form-info-input-content">
                                    <select name="role" id="role" class="">
                                        <option value="0">Chọn vai trò</option>
                                        <option value="1">Admistrator</option>
                                    </select>
                                    <ul id="list_role_checked">
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
                                    </ul>
                                    <span data-tag="a" class="t-green-main d-block t-right t-left">Thêm quyền hạn</span>
                                    <ul id="add_role">
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Thêm tài khoản</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="edit_module">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm tài khoản mới</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên đăng nhập</label>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập tên đăng nhập">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Số điện thoại</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập số điện thoại">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Họ và tên</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" value="" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Email</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="email" class="" value="" placeholder="Nhập email">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="title" class="">Gửi thông báo</label>
                                </div>

                                <div class="form-info-input-content t-left">
                                    <input type="checkbox" class="d-inline-block w-10" checked name="is_business" id="is_business">
                                    <label for="is_business">Gửi thông báo đến số điện thoại của người dùng mới</label>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <div class="form-info-lable">
                                    <label for="role" class="fw-400 lh-12rem">Vai trò</label>
                                </div>
                                <div class="form-info-input-content">
                                    <select name="role" id="role">
                                        <option value="0">Chọn vai trò</option>
                                        <option value="1">Admistrator</option>
                                    </select>
                                    <ul id="list_role_checked">
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
                                    </ul>
                                    <span data-tag="a" class="t-green-main d-block t-right t-left">Thêm quyền hạn</span>
                                    <ul id="add_role">
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" class="d-inline-block w-10" checked>
                                                    <label>Khách hàng</label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Thêm tài khoản</button>
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
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-login">
                    <div class="form-box">
                        <input type="password" name="pw-old" id="pw-old" placeholder="Nhập mật khẩu mới" class="form-input">
                        <i class="far fa-eye-slash form-icon"></i>
                    </div>
                    <div class="form-box">
                        <input type="password" name="pw-new" id="pw-new" placeholder="Xác nhận mật khẩu" class="form-input">
                        <i class="far fa-eye-slash form-icon"></i>
                    </div>
                    <div class="form-box note-box">
                        <small class="note">Ít nhất một kí tự viết thường</small>
                        <small class="note">Ít nhất một kí tự viết hoa</small>
                        <small class="note">8-16 kí tự</small>
                    </div>
                    <div class="form-box t-right">
                        <button class="btn btn-green t-right">Xác nhận</button>
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
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="../public_admin/images/warning-del.png " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>


    <!-- END FOOTER -->
    <script src="../public_admin/js/jquery.js " type="text/javascript "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script src="../public_admin/js/bootstrap/bootstrap.min.js " type="text/javascript "></script>
    <script src="../public_admin/carousel/owl-carousel/owl.carousel.min.js "></script>
    <script src="../public_admin/js/plugins/ckeditor/ckeditor.js " type="text/javascript "></script>

    <script src="../public_admin/js/main.js " type="text/javascript "></script>
    <script src="../public_admin/js/app.js " type="text/javascript "></script>

    <script src="../public_admin/js/progress_bar.js " type="text/javascript "></script>
    <script src="../public_admin/js/view_img.js " type="text/javascript "></script>

    <script>
    </script>
</body>

</html>