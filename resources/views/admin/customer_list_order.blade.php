@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item active"><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

        <li class="item "><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
        <li class="item"><a href="{{url('admin/customer_list_vendor')}}">Nhà cung ứng</a></li>
        <li class="item "><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item "><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection

@section('content')
<div id="wp-content">
    <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Đơn hàng
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3"
            style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right w-20 t-left">+ Thêm
                hình ảnh</span>
            <!-- filter date -->
            <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0 mx-3">
                    <p>Từ</p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date" name="date_begin" class="form-input py-1 px-2">
                </div>
                <div class="form-edit-row m-0 mx-3">
                    <p>Đến</p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date" name="date_end" class="form-input py-1 px-2">
                </div>
            </div>

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
                        <a data-toggle="tab" href="#tab-1" data-order-status="0" aria-expanded="true">Tất cả </a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-2" data-order-status="1" aria-expanded="false">Chờ xác nhận</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-3" data-order-status="2" aria-expanded="false">Đang xử lý</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-4" data-order-status="3" aria-expanded="false">Giao hàng</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-5" data-order-status="4" aria-expanded="false">Thanh toán</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-6" data-order-status="5" aria-expanded="false">Hoàn tất</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-7" data-order-status="6" aria-expanded="false">Hủy đơn</a>
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
                                        <th>Mã đơn hàng
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
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày nhận
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

                                        <th>Trạng thái
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>- </td>
                                        <td>223.000.000 đ</td>
                                        <td class="t-center bg-blue">
                                            Đang xử lý
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_processing" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">+2</span>
                                        </td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
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
                    <div id="tab-3" class="tab-pane">
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày nhận
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
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>2021-05-21</td>
                                        <td>223.000.000 đ</td>
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày nhận
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>VC7161638</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>2021-05-21</td>
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
                    <div id="tab-5" class="tab-pane">
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày nhận
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>2021-05-21</td>
                                        <td>223.000.000 đ</td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
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
                    <div id="tab-6" class="tab-pane">
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày nhận
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày thanh toán
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
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>2021-05-21</td>
                                        <td>2021-05-21</td>
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
                    <div id="tab-7" class="tab-pane">
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
                                        <th>Mã KH
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày đặt
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Ngày hủy
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Lý do hủy
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                        <td>MDH879879</td>
                                        <td>KH1234567</td>
                                        <td>2021-05-05</td>
                                        <td>2021-05-21</td>
                                        <td>Đổi ý, không mua nữa...</td>
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

                </div>

            </div>
        </div>

        <ul class="pagination">
            {{-- <li class="item prev"><i class="fas fa-chevron-left"></i></li>
            <li class="item">1</li>
            <li class="item">2</li>
            <li class="item">3</li>
            <li class="item">4</li>
            <li class="item">5</li>
            <li class="item next"><i class="fas fa-chevron-right"></i></li> --}}
        </ul>
    </div>
</div>
@endsection

@section('modal')

<div class="modal" id="info_processing" >
    <div class="modal-box">
        <div class="modal-title">
            <h4>Thông tin chi tiết</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <div class="form-info">
                <div class="form-info-content justify-content-center">
                    <div class="form-info-right w-60">
                        <div class="form-info-row" data-name="order_code">
                            <label for="title" class="form-info-lable">Mã đơn hàng</label>
                            <div class="form-info-input-content t-left" >
                                <p><p>
                            </div>
                        </div>

                        <div class="form-info-row" style="align-items: flex-start;" data-name="order_item_product">
                            <label for="title" class="form-info-lable">Sản phẩm</label>
                            <div class="form-info-input-content" >
                                <!-- product items -->
                                {{-- <div class="bg-F6 py-2 px-3 my-1">
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
                                </div> --}}
                            </div>
                        </div>
                        <div class="form-info-row" data-name="order_date_create">
                            <label for="title" class="form-info-lable">Ngày đặt</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                            </div>
                        </div>
                        <div class="form-info-row" data-name="order_date_delivery">
                            <label for="title" class="form-info-lable">Ngày nhận</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                                {{-- <input type="date" name="date_give" id="date_give" class="w-40" value="2021-04-21"> --}}
                            </div>
                        </div>
                        <div class="form-info-row" data-name="customer_code">
                            <label for="title" class="form-info-lable">Mã khách hàng</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                            </div>
                        </div>
                        <div class="form-info-row" data-name="company">
                            <label for="title" class="form-info-lable">Tên công ty</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                            </div>
                        </div>
                        <div class="form-info-row align-item-start" data-name="address">
                            <label for="title" class="form-info-lable">Địa chỉ</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                            </div>
                        </div>

                        <div class="form-info-row" data-name="order_status">
                            <label for="title" class="form-info-lable">Trạng thái</label>
                            <div class="form-info-input-content t-left" >
                                <p class="t-blue"></p>
                                <div class="bg-F6 py-2 px-3 my-1" id="timelog_status">
                                    {{-- <div class="d-flex py-2 align-item-center">
                                        <p>Đơn hoàn thành mới hiện phần này</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3"> 02:39 PM | 2021-04-24</p>
                                        <p class="t-blue">HOÀN TẤT</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3"> 02:39 PM | 2021-04-24</p>
                                        <p>THANH TOÁN</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3"> 02:39 PM | 2021-04-24</p>
                                        <p>GIAO HÀNG</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3"> 02:39 PM | 2021-04-24</p>
                                        <p>ĐANG XỬ LÝ</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3"> 02:39 PM | 2021-04-24</p>
                                        <p>CHỜ XÁC NHẬN</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-info-row" style="align-items: flex-start;" data-name="order_record_cancel_note">
                            <label for="title" class="form-info-lable">Ghi chú</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>

                            </div>
                        </div>
                        <div class="form-info-row" data-name="order_total_cost">
                            <label for="title" class="form-info-lable">Tổng giá trị</label>
                            <div class="form-info-input-content t-left" >
                                <p></p>
                                {{-- <input type="text" value="" placeholder="Nhập giá trị đơn hàng"> --}}
                            </div>
                        </div>
                        <div class="form-info-row" data-name="input_cancel_order">
                            {{-- <div for="title" class="form-info-lable">
                                <input type="checkbox" name="cancel_order" id="cancel_order">
                                <label for="cancel_order">Hủy đơn</label>
                            </div>
                            <div class="form-info-input-content t-left">
                                <textarea name="cancel_reason" id="cancel_reason" placeholder="Lí do hủy đơn...."
                                    class="w-100" cols="30" rows="5"></textarea>
                            </div> --}}
                        </div>
                        <div class="form-info-row" data-name="reason_cancel_order">
                            {{-- <label for="title" class="form-info-lable">Lý do hủy</label>
                            <div class="form-info-input-content t-left">
                                <p>Đơn hủy mới hiện phần này</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-content t-right mg-t-175rem" data-name="btn">
                <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajax')
<script src="{{asset('public_admin/admin_js/customer_list_order.js')}}" type="text/javascript"></script>
@endsection
