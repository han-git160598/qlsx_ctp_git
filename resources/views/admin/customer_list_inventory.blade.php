@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item active"><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

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
        <h1 class="heading">
            Khách hàng
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3"
            style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right w-20 t-left">+ Thêm
                khách hàng</span>
            <!-- filter date -->
            <!-- <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0 mx-3">
                    <p>Từ</p>
                </div>
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
                        <a data-toggle="tab" href="#product" data-item_type="product" aria-expanded="true">Thành
                            phẩm</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#material" data-item_type="material" aria-expanded="false">Nguyên vật
                            liệu</a>
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
                    <div id="product" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_inventory_product"
                                class="get_modal my-2 t-green-main d-block t-right w-20 t-left">+Nhập kiểm kê
                                sản phẩm</span>

                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Ngày kiểm kê
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Mã lệnh kiểm kê
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history"
                                        class="click_doubble get_modal">
                                        <td>2021-05-21</td>
                                        <td>MKK12345</td>
                                        <td class="t-center">
                                            <a href="customer_inventory_detail.html"
                                                class="t-green-main my-1">Chi tiết</a>
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
                    <div id="material" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_inventory_material"
                                class="get_modal my-2 t-green-main d-block t-right w-20 t-left">+Nhập kiểm kê NVL</span>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Ngày kiểm kê
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th>Mã lệnh kiểm kê
                                            <span class="sort">
                                                <i class="fas fa-chevron-up arrow"></i>
                                                <i class="fas fa-chevron-down arrow"></i>
                                            </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr data-id-customer="1" type="info_order_history"
                                        class="click_doubble get_modal">
                                        <td>2021-05-21</td>
                                        <td>MKK12345</td>
                                        <td class="t-center">
                                            <a href="customer_inventory_detail.html"
                                                class="t-green-main my-1">Chi tiết</a>
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
<!-- modal create / edit -->
<div class="modal" id="add_inventory_product">
    <div class="modal-box w-50" style=" margin-top: 50px;">
        <div class="modal-title">
            <h4>Thêm lệnh kiểm kê</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <div class="form-info">
                <div class="form-info-content">
                    <div class="form-info-right w-100">
                        <div class="form-info-row align-item-center">
                            <label for="title" class="form-info-lable t-left">Ngày kiểm kê</label>
                            <div class="form-info-input-content">
                                <input type="date" name="current_date" id="" value="" class="w-40">
                            </div>
                        </div>
                        <div id="element_product">
                            {{-- <div class="box bg-F6" style="position: relative;" date-type="choose_product" data-stt="1">
                                <i class="fas fa-times-circle"
                                    style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i>
                                <div class="form-edit p-3">
                                    <div class="form-edit-row-flex">
                                        <div class="form-box-flex w-100">
                                            <label for="machine_name" class="form-lable">NVL</label>
                                            <select name="machine_name" class="form-select">
                                                <option value="0">Chọn NVL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- chỉ show khi đã chọn NVL -->
                                <div class="t-left px-3" data-type="detail_NVL" >
                                    <p class="my-2">ĐVT: <strong>Kg</strong></p>
                                    <p class="my-2">Số lượng hiện tại: <strong>1.5637</strong></p>

                                    <div class="d-flex">
                                        <p class="my-2 mr-2">Số lượng sau kiểm kê:
                                        </p>
                                        <div class="amount" style="display: inline-block;">
                                            <button class="minus"><img src="{{asset('public_admin/images/minus.png')}}" alt=""></button>
                                            <input type="text" value="1">
                                            <button class="plus"><img src="{{asset('public_admin/images/plus.png')}}" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <span data-tag="a" class="t-green-main d-block t-right w-20 t-left" id="btn_add_product">+Thêm sản phẩm</span>
                    </div>
                </div>
            </div>
            <div class="item-content t-right mg-t-175rem ">
                <button  class="btn_submit btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="add_inventory_material">
    <div class="modal-box w-50" style=" margin-top: 50px;">
        <div class="modal-title">
            <h4>Thêm lệnh kiểm kê</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <div class="form-info">
                <div class="form-info-content">
                    <div class="form-info-right w-100">
                        <div class="form-info-row align-item-center">
                            <label for="title" class="form-info-lable t-left">Ngày kiểm kê</label>
                            <div class="form-info-input-content">
                                <input type="date" name="current_date" id="" value="" class="w-40">
                            </div>
                        </div>
                        <div id="element_material">
                            {{-- <div class="box bg-F6" style="position: relative;" date-type="choose_NVL" data-stt="1">
                                <i class="fas fa-times-circle"
                                    style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i>
                                <div class="form-edit p-3">
                                    <div class="form-edit-row-flex">
                                        <div class="form-box-flex w-100">
                                            <label for="machine_name" class="form-lable">NVL</label>
                                            <select name="machine_name" class="form-select">
                                                <option value="0">Chọn NVL</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- chỉ show khi đã chọn NVL -->
                                <div class="t-left px-3" data-type="detail_NVL" >
                                    <p class="my-2">ĐVT: <strong>Kg</strong></p>
                                    <p class="my-2">Số lượng hiện tại: <strong>1.5637</strong></p>

                                    <div class="d-flex">
                                        <p class="my-2 mr-2">Số lượng sau kiểm kê:
                                        </p>
                                        <div class="amount" style="display: inline-block;">
                                            <button class="minus"><img src="{{asset('public_admin/images/minus.png')}}" alt=""></button>
                                            <input type="text" value="1">
                                            <button class="plus"><img src="{{asset('public_admin/images/plus.png')}}" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <span data-tag="a" class="t-green-main d-block t-right w-20 t-left" id="btn_add_NVL">+Thêm NVL</span>
                    </div>
                </div>
            </div>
            <div class="item-content t-right mg-t-175rem ">
                <button class="btn_submit btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajax')
<script src="{{asset('public_admin/admin_js/customer_list_inventory.js')}}" type="text/javascript"></script>
@endsection
