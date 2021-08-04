@extends('layouts.dashboard_admin')

@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

        <li class="item "><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
        <li class="item"><a href="{{url('admin/customer_list_vendor')}}">Nhà cung ứng</a></li>
        <li class="item "><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item active"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item "><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')
<div id="wp-content">
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Vận chuyển
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_command" class="get_modal t-green-main d-block t-right w-20 t-left">+ Thêm lệnh vận chuyển</span>
            <!-- filter date -->
            <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0 mx-3">
                    <p><button onclick="reset_date()">Reset</button></p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date" onchange="list_ship($('#stauts_ship').val(),$('#date_begin').val(),$('#date_end').val())" id="date_begin" class="form-input py-1 px-2">
                </div>
                <input type="hidden" id="stauts_ship" name="">
                <div class="form-edit-row m-0 mx-3">
                    <p>Đến</p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date" onchange="list_ship($('#stauts_ship').val(),$('#date_begin').val(),$('#date_end').val())" id="date_end" class="form-input py-1 px-2">
                </div>
            </div>

            <div class="form-edit-row m-0 w-35">
                <div class="search" style="position: relative;">
                    <input type="text" id="search" onkeyup ="list_ship($('#stauts_ship').val(),$('#date_begin').val(),$('#date_end').val(),$('#search').val())"  placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
                    <button class="input d-flex">
                        <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img src="{{asset('public_admin/images/search_black.png')}}" alt=""></span>
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
                        <a onclick="list_ship(1,$('#date_begin').val(),$('#date_end').val())" data-toggle="tab" href="#tab-1" aria-expanded="true">Khởi tạo</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="list_ship(2,$('#date_begin').val(),$('#date_end').val())" data-toggle="tab" href="#tab-1" aria-expanded="false">Hoàn tất</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="list_ship(3,$('#date_begin').val(),$('#date_end').val())" data-toggle="tab" href="#tab-1" aria-expanded="false">Hủy lệnh</a>
                    </li>
                    <!-- filter by pages -->
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
                                        <th>Mã vận chuyển
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã KH
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã đơn hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã sản phẩm
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Ngày giao thực tế
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody id="list_ship">
                                   <!--  <tr data-id-customer="1" type="" class="click_doubble get_modal">
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">
                                                +2
                                            </span>
                                        </td>
                                        <td>2021-05-21</td>

                                    </tr> -->
                                  
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
                                        <th>Mã vận chuyển
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã KH
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã đơn hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã sản phẩm
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Ngày giao thực tế
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id-customer="1" type="info_complete" class="click_doubble get_modal">
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">
                                                +2
                                            </span>
                                        </td>
                                        <td>2021-05-21</td>

                                    </tr>
                                    <tr data-id-customer="2" type="info_complete" class="click_doubble get_modal">
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">
                                                +2
                                            </span>
                                        </td>
                                        <td>2021-05-21</td>
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
                                        <th>Mã vận chuyển
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã KH
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã đơn hàng
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Mã sản phẩm
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Ngày giao thực tế
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id-customer="1" type="info_cancel" class="click_doubble get_modal">
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">
                                                +2
                                            </span>
                                        </td>
                                        <td>2021-05-21</td>

                                    </tr>
                                    <tr data-id-customer="2" type="info_cancel" class="click_doubble get_modal">
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">
                                                +2
                                            </span>
                                        </td>
                                        <td>2021-05-21</td>
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
  
@endsection
@section('modal')

    <!-- Thông tin lệnh vận chuyển vừa khởi tạo -->
    <div class="modal" id="info_init">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thông tin chi tiết</h4>
                <span class="icon" data-tag="a">
                            <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">

                            <div class="form-info-row">
                                <label class="form-info-lable">Mã vận chuyển</label>
                                <div class="form-info-input-content t-left">
                                    <p id="detail_shipping_code"></p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Trạng thái</label>
                                <div class="form-info-input-content t-left">

                                    <p class="t-blue" id="detail_shipping_status"></p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Mã đơn hàng</label>
                                <div class="form-info-input-content t-left">
                                    <p id="detail_order_code"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sau khi chọn / điền mã đơn hàng thì hiển thi box thông tin chi tiết đơn hàng đó -->
                <div class="box bg-F6">
                    <div class="form-info w-100">
                        <div class="form-info-content justify-content-center">
                            <div class="form-info-right w-100">
                                <div class="form-info-row" style="align-items: flex-start;">
                                    <label for="title" class="form-info-lable">Sản phẩm</label>
                                    <div class="form-info-input-content" id="detail_list_product_order">
                                        <!-- product items -->

                                        <!-- <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NGON MÊ LY R365</strong>
                                                <p class="mt-2">NML-R365</p>
                                                <p class="mt-2">x1234 Thùng</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                <span>Ly</span>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                <span>Thùng</span>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                                <span>300 Cái/Thùng</span>
                                            </div>
                                        </div> -->
                                      
                                    </div>
                                </div>
                                <div class="form-info-row">
                                    <label for="title" class="form-info-lable">Ngày nhận</label>
                                    <div class="form-info-input-content t-left">
                                        <p id="detail_order_date_delivery"></p>
                                    </div>
                                </div>
                                <div class="form-info-row">
                                    <label for="title" class="form-info-lable">Mã khách hàng</label>
                                    <div class="form-info-input-content t-left">
                                        <strong id="detail_customer_code"></strong>
                                    </div>
                                </div>
                                <div class="form-info-row">
                                    <label for="title" class="form-info-lable">Tên công ty</label>
                                    <div class="form-info-input-content t-left">
                                        <strong id="detail_company_name"></strong>
                                    </div>
                                </div>
                                <div class="form-info-row align-item-start">
                                    <label for="title" class="form-info-lable">Địa chỉ gửi</label>
                                    <div class="form-info-input-content t-left">
                                        <strong id="detail_shipping_address"></strong>
                                    </div>
                                </div>
                                <div class="form-info-row align-item-start">
                                    <label for="title" class="form-info-lable">Địa chỉ nhận</label>
                                    <div class="form-info-input-content t-left">
                                        <strong id="detail_delivery_address"></strong>
                                    </div>
                                </div>
                                <div class="form-info-row" style="align-items: flex-start;">
                                    <label for="title" class="form-info-lable">Ghi chú</label>
                                    <div class="form-info-input-content t-left">
                                        <p id="detail_order_note"></p>

                                    </div>
                                </div>
                                <div class="form-info-row">
                                    <label for="title" class="form-info-lable">Tổng giá trị</label>
                                    <div class="form-info-input-content t-left">
                                        <strong id="detail_order_total_cost"></strong>
                                    </div>
                                </div>
                                <div class="form-info-row">
                                    <label for="title" class="form-info-lable">Trạng thái</label>
                                    <div class="form-info-input-content t-left">
                                        <p class="t-blue" id="detail_order_status"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">

                            <div class="form-info-row">
                                <label class="form-info-lable">Ngày giao (TT)</label>
                                <div class="form-info-input-content t-left">
                                    <p id="detail_order_date_shipping"></p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <p id="detail_shipping_note"></p>
                                </div>
                            </div>
                            <div class="form-info-row" id="stauts_ship_html">
                               <!--  <div for="title" class="form-info-lable">
                                    <input type="checkbox" name="cancel_order" id="cancel_order">
                                    <label for="cancel_order">Hủy lệnh</label>
                                </div>
                                <div class="form-info-input-content t-left">
                                    <textarea name="cancel_reason" id="cancel_reason" class="w-100" cols="20" rows="5" placeholder="Lí do hủy lệnh...."></textarea>
                                </div> -->
                            </div>

                        </div>  
                    </div>
                </div>
            </div>
            <div class="item-content t-right mb-3" id="btn_cancel_ship">
                
            </div>
        </div>
    </div>
    <!-- Thêm lệnh vận chuyển -->
    <div class="modal" id="add_command">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm lệnh vận chuyển</h4>
                <span class="icon" data-tag="a">
                            <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã đơn hàng</label>
                        <select name="choose_mdh" onchange="list_product_order()" id="choose_mdh" class="form-input">
                            <option value="0">Chọn đơn hàng</option>
                        </select>
                    </div>
                    <!-- sau khi chọn / điền mã đơn hàng thì hiển thi box thông tin chi tiết đơn hàng đó -->
                    <div class="box bg-F6">
                        <div class="form-info w-100">
                            <div class="form-info-content justify-content-center">
                                <div class="form-info-right w-100" id="div_detail_order">
                                    <div class="form-info-row" style="align-items: flex-start;" >
                                        <label for="title" class="form-info-lable">Sản phẩm</label>
                                        <div class="form-info-input-content" id="list_product_order">
                                            <!-- product items -->
                                            <!-- <div class="bg-white py-2 px-3 my-1">
                                                <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                    <strong>NGON MÊ LY R365</strong>
                                                    <p class="mt-2">NML-R365</p>
                                                    <p class="mt-2">x1234 Thùng</p>
                                                </div>
                                                <div class="d-flex py-2 align-item-center">
                                                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                    <span>Ly</span>
                                                </div>
                                                <div class="d-flex py-2 align-item-center">
                                                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                    <span>Thùng</span>
                                                </div>
                                                <div class="d-flex py-2 align-item-center">
                                                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                                    <span>300 Cái/Thùng</span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="form-info-row">
                                        <label for="title" class="form-info-lable">Ngày nhận</label>
                                        <div class="form-info-input-content t-left">
                                            <p id="order_date_delivery">2021-04-21</p>
                                        </div>
                                    </div>
                                    <div class="form-info-row">
                                        <label for="title" class="form-info-lable">Mã khách hàng</label>
                                        <div class="form-info-input-content t-left">
                                            <strong id="customer_code">KH12345678</strong>
                                        </div>
                                    </div>
                                    <div class="form-info-row">
                                        <label for="title" class="form-info-lable">Tên công ty</label>
                                        <div class="form-info-input-content t-left">
                                            <strong id="company_name">Công ty Cổ Phần XYZ</strong>
                                        </div>
                                    </div>
                                    <div class="form-info-row align-item-start">
                                        <label for="title" class="form-info-lable">Địa chỉ</label>
                                        <div class="form-info-input-content t-left">
                                            <strong id="shipping_address">157/17/1 Nguyen Gia Tri Street, Ward 25, Binh Thanh District, HCM City</strong>
                                        </div>
                                    </div>
                                    <div class="form-info-row" style="align-items: flex-start;">
                                        <label for="title" class="form-info-lable">Ghi chú</label>
                                        <div class="form-info-input-content t-left">
                                            <p id="order_note">Ghi chú</p>

                                        </div>
                                    </div>
                                    <div class="form-info-row">
                                        <label for="title" class="form-info-lable">Tổng giá trị</label>
                                        <div class="form-info-input-content t-left">
                                            <strong id="order_total_cost">590.400.000 đ</strong>
                                        </div>
                                    </div>
                                    <div class="form-info-row">
                                        <label for="title" class="form-info-lable">Trạng thái</label>
                                        <div class="form-info-input-content t-left">
                                            <p class="t-blue" id="order_status">ĐANG XỬ LÝ</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-edit-row t-left">
                        <label class="form-lable">Ngày giao (TT)</label>
                        <input type="date" class="form-input w-40 " name="address_name" id="shipping_time" value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Ghi chú</label>
                        <textarea name="" id="shipping_note" cols="30" class="form-input" rows="5">Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue.</textarea>
                    </div>

                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" onclick="create_ship()" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button>
                </div>
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
                    <span class="d-inline-block tick-success "><img src="{{asset('public_admin/images/warning-del.png')}} " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa mục này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/ship_manager.js')}}" type="text/javascript "></script>

@endsection    