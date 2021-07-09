@extends('layouts.dashboard_admin')

@section('sidebar')
<div id="sidebar-left">
    <ul id="main-menu">
        <li class="item"><a href="customer_index.html">Dasboard</a></li>
        <li class="item active"><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="customer_list_order.html">Đơn hàng</a></li>
        <li class="item"><a href="customer_list_product_inventory.html">Kho hàng</a></li>
        <li class="item"><a href="customer_list_inventory.html">Kiểm kê kho</a></li>

        <li class="item"><a href="customer_list_production.html">Sản xuất</a></li>
        <li class="item"><a href="customer_list_vendor.html">Nhà cung ứng</a></li>
        <li class="item"><a href="customer_list_product.html">Sản phẩm</a></li>
        <li class="item"><a href="customer_list_ship.html">Vận chuyển</a></li>
        <li class="item"><a href="customer_list_account.html">Tài khoản</a></li>
        <li class="item"><a href="customer_setting.html">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')
        
    <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            <a href="{{ URL::to('customer-list-customer')}}" class="mr-3"><i class="fas fa-chevron-left"></i></a> Chỉnh sửa thông tin
        </h1>
        <div class="box p-0">
            <!-- tab -->
            <!-- tabs container -->
            <div class="tabs-container">
                <ul class="sub-menu nav nav-tabs tab-border-top-danger">
                    <li class="sub-item active">
                        <a data-toggle="tab" href="#tab-1" aria-expanded="true"> Thông tin cá nhân</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="customer_address_shipping()" data-toggle="tab" href="#tab-2" aria-expanded="false"  > Địa chỉ gửi</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="customer_address_delivery()" data-toggle="tab" href="#tab-3" aria-expanded="false"> Địa chỉ nhận</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="customer_list_order()" data-toggle="tab" href="#tab-4" aria-expanded="false"> Lịch sử đơn hàng</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-5" aria-expanded="false"> Reset mật khẩu</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <div class="form-info">
                                <div class="form-info-content justify-content-center">
                                    <div class="form-info-right w-60">
                                        <div class="form-info-row align-item-center">
                                            <label for="title" class="form-info-lable">Mã khách hàng</label>
                                            <div class="form-info-input-content">
                                                <input type="text" id="customer_code" placeholder="Nhập mã khách hàng">
                                            </div>
                                        </div>

                                        <div class="form-info-row align-item-center">
                                            <div class="form-info-lable">
                                                <label class="fw-400 lh-12rem">Tên công ty</label>
                                            </div>
                                            <div class="form-info-input-content">
                                                <input type="text" id="customer_company" placeholder="Nhập tên công ty">
                                            </div>
                                        </div>
                                        <div class="form-info-row align-item-center">
                                            <div class="form-info-lable">
                                                <label class="fw-400 lh-12rem">Họ tên</label>
                                            </div>
                                            <div class="form-info-input-content">
                                                <input type="text" id="customer_name" placeholder="Nhập họ tên">
                                            </div>
                                        </div>
                                        <div class="form-info-row align-item-center">
                                            <div class="form-info-lable">
                                                <label class="fw-400 lh-12rem">Số điện thoại</label>
                                            </div>
                                            <div class="form-info-input-content">
                                                <input type="text" id="customer_phone" readonly placeholder="Nhập số điện thoại">
                                            </div>
                                        </div>
                                        <div class="form-info-row align-item-center">
                                            <div class="form-info-lable">
                                                <label class="fw-400 lh-12rem">Email</label>
                                            </div>
                                            <div class="form-info-input-content">
                                                <input type="email" id="customer_email" placeholder="Nhập email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-content t-right mg-t-175rem " id="btn_customer_update">
                                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
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
                                        <th>Tên gợi nhớ
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Liên hệ
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
                                        <th>Địa chỉ
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mặc định
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="admin_list_address_shipping">
                                   <!--  <tr data-id-customer="1" type="edit_address_send" class="click_doubble get_modal">
                                        <td>Phước Bình</td>
                                        <td>Nguyễn Văn A</td>
                                        <td>(+84) 944810055</td>
                                        <td>157/17/1 Nguyen Gia Tri Street... </td>
                                        <td class="t-center">
                                            <input type="radio" checked>
                                        </td>
                                        <td class="t-center">
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1">Xoá</span>
                                        </td>
                                    </tr> -->
                                    
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
                                        <th>Tên công ty
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Người đại diện
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
                                        <th>Địa chỉ
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mặc định
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="admin_list_address_delivery">
                                    <!-- <tr data-id-customer="2" type="edit_address_receive" class="click_doubble get_modal">
                                        <td>Phước Bình</td>
                                        <td>Nguyễn Văn A</td>
                                        <td>(+84) 944810055</td>
                                        <td>157/17/1 Nguyen Gia Tri Street... </td>
                                        <td class="t-center">
                                            <input type="radio">
                                        </td>
                                        <td class="t-center">
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1">Xoá</span>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Mã đơn hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Tổng giá trị
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Ngày đặt hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Ngày nhận hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>
                                            Trạng thái
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="admin_list_order">
                                    <!-- <tr data-id-customer="2" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>223.000.000 đ</td>
                                        <td>2021-05-06</td>
                                        <td>
                                            2021-05-06
                                        </td>
                                        <td>
                                            Đang xử lý
                                        </td>
                                    </tr> -->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane">
                        <div class="panel-body d-flex justify-content-center" style="height: 554px; overflow-y: scroll;align-items: center;">
                            <!-- <div class="d-flex justify-content-center"> -->
                            <div class="form-login w-50">
                                <div class="form-box">
                                    <input type="password" name="pw-old" id="pw-old" placeholder="Nhập mật khẩu mới" class="form-input">
                                    <i class="far fa-eye-slash form-icon" onclick="customer_hidden_password('pw-old')"></i>
                                </div>
                                <div class="form-box">
                                    <input type="password" name="pw-new" id="pw-new"  placeholder="Xác nhận mật khẩu" class="form-input">
                                    <i class="far fa-eye-slash form-icon" onclick="customer_hidden_password('pw-new')"></i>
                                </div>
                                <div class="form-box note-box">
                                    <small class="note" id="lowercase">Ít nhất một kí tự viết thường</small>
                                    <small class="note" id="uppercase">Ít nhất một kí tự viết hoa</small>
                                    <small class="note" id="length">8-16 kí tự và không có khoảng trắng</small>
                                </div>
                                <div class="form-box t-right" onclick="reset_password()">
                                    <button class="btn btn-green t-right">Xác nhận</button>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div> 
                    </div>
                </div>
            </div>

            <!-- <ul class="pagination">
                <li class="item prev"><i class="fas fa-chevron-left"></i></li>
                <li class="item">1</li>
                <li class="item">2</li>
                <li class="item">3</li>
                <li class="item">4</li>
                <li class="item">5</li>
                <li class="item next"><i class="fas fa-chevron-right"></i></li>
            </ul> -->
        </div>
    </div>

@endsection      
@section('modal') 
    <div class="modal" id="delete_module_address">
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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa địa chỉ này?</p>
                </div>
                <div class="t-center mg-t-175rem" id="btn_delete_customer">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>



<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/customer_manager.js')}}" type="text/javascript "></script>
@endsection