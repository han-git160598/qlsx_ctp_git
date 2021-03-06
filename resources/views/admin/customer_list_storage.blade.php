@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item active"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
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
    <!-- content -->
<div id="wp-content">
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Kho hàng
        </h1>
        <div class="tabs-container">
            <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
                <!-- filter date -->
                <ul class="filter-select-date nav nav-tabs w-50">
                    <li class="item active">
                        <a data-toggle="tab" href="#head-tab-1" aria-expanded="true">Thành phẩm</a>
                    </li>
                    <li class="item">
                        <a data-toggle="tab" href="#head-tab-2" aria-expanded="false">Nguyên vật liệu</a>
                    </li>
                </ul>
                <div class="form-edit-row-flex align-item-center" id="filter_date">
                    <div class="form-edit-row m-0 mx-1">
                    </div>
                    <div class="form-edit-row m-0">
                        <input type="date" class="form-input py-1 px-2">
                    </div>
                    <div class="form-edit-row m-0 mx-1">
                        <p>Đến</p>
                    </div>
                    <div class="form-edit-row m-0 mx-1">
                        <input type="date" class="form-input py-1 px-2">
                    </div>
                </div>

                <div class="form-edit-row m-0 w-35">
                    <div class="search" style="position: relative;" id="search_storage">
                        <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
                        <button class="input d-flex">
                        <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img src="{{asset('public_admin/images/search_black.png')}}" alt=""></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="head-tab-1">
                    <div class="box p-0 panel-body">
                        <!-- tabs container -->
                        <div class="tabs-container">
                            <ul class="sub-menu nav nav-tabs" style="position: relative;">
                                <li class="sub-item active">
                                    <a onclick="list_product_inventory('stock')" data-toggle="tab" href="#tab-one-1" aria-expanded="true">Xuất nhập tồn</a>
                                </li>
                                <li class="sub-item">
                                    <a onclick="list_product_inventory('import')" data-toggle="tab" href="#tab-one-2" aria-expanded="false">Nhập kho</a>
                                </li>
                                <li class="sub-item">
                                    <a onclick="list_product_inventory('export')" data-toggle="tab" href="#tab-one-3" aria-expanded="false">Xuất kho</a>
                                </li>

                                <!-- <div style="display: flex; justify-content: space-between; position: absolute; top: .5rem; right: .5rem; width: 20%; align-items: center;">
                                    <p>Chế độ xem</p>
                                    <div>
                                        <select name="filter_by_page" id="filter_by_page" class="py-1 px-3">
                                    <option value="1">Theo trang</option>
                                </select>
                                    </div>
                                </div> -->
                            </ul>
                            <div class="tab-content">
                                <div id="tab-one-1" class="tab-pane active">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->
                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_product('stock')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Mã hàng
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Tồn đầu kỳ
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Tồn cuối kỳ
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>ĐVT
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="product_stock">
                                                <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                                    <td>W-R365</td>
                                                    <td>92</td>
                                                    <td>176.892</td>
                                                    <td>176.892</td>
                                                    <td>176.892</td>
                                                    <td>Thùng</td>

                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-one-2" class="tab-pane">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->

                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            <span id="add_import_product" data-tag="a" type="add_product_import" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm phiếu nhập</span>

                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_product('import')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Phiếu nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ngày nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Lệnh sản xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Bộ phận
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ghi chú
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="product_import">
                                                <tr data-id-customer="1" type="info_product_import" class="click_doubble get_modal">
                                                    <td>W05-01</td>
                                                    <td>2021-05-06</td>
                                                    <td>LSX123454</td>
                                                    <td>Máy ly</td>
                                                    <td>Amet minim mollit non deserunt ullamco est sit...</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-one-3" class="tab-pane">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->
                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            <span id="add_export_product" data-tag="a" type="add_product_export" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm Phiếu xuất</span>
                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_product('export')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Phiếu xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ngày xuất
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
                                                    <th>Mã vận chuyển
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ghi chú
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody id="product_export">
                                                <tr data-id-customer="1" type="info_product_export" class="click_doubble get_modal">
                                                    <td>W05-01</td>
                                                    <td>2021-05-06</td>
                                                    <td>KH1234567</td>
                                                    <td>VC7161638</td>
                                                    <td>Amet minim mollit non deserunt ullamco est sit...</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="head-tab-2">
                    <div class="box p-0 panel-body">
                        <!-- tabs container -->
                        <div class="tabs-container">
                            <ul class="sub-menu nav nav-tabs" style="position: relative;">
                                <li class="sub-item active">
                                    <a onclick="list_material_inventory('stock')" data-toggle="tab" href="#tab-two-1" aria-expanded="true">Xuất nhập tồn</a>
                                </li>
                                <li class="sub-item">
                                    <a onclick="list_material_inventory('import')" data-toggle="tab" href="#tab-two-2" aria-expanded="false">Nhập NVL</a>
                                </li>
                                <li class="sub-item">
                                    <a onclick="list_material_inventory('export')" data-toggle="tab" href="#tab-two-3" aria-expanded="false">Xuất NVL cho sản xuất</a>
                                </li>
                                <!-- filter to page -->
                                <!-- <div style="display: flex; justify-content: space-between; position: absolute; top: .5rem; right: .5rem; width: 20%; align-items: center;">
                                    <p>Chế độ xem</p>
                                    <div>
                                        <select name="filter_by_page" id="filter_by_page" class="py-1 px-3">
                                    <option value="1">Theo trang</option>
                                </select>
                                    </div>
                                </div> -->
                            </ul>
                            <div class="tab-content">
                                <div id="tab-two-1" class="tab-pane active">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->
                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            
                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_material('stock')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Mã NVL
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Tồn đầu kỳ
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Tồn cuối kỳ
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>ĐVT
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="material_stock">
                                             <!--    <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                                    <td>NVL365</td>
                                                    <td>92</td>
                                                    <td>176.892</td>
                                                    <td>176.892</td>
                                                    <td>176.892</td>
                                                    <td>Thùng</td>
                                                </tr> -->
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-two-2" class="tab-pane">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->
                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            <span id="add_import_material" data-tag="a" type="add_material_import" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm phiếu nhập</span>
                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_material('import')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Phiếu nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ngày nhập
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>

                                                    <th>Mã cung ứng
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ghi chú
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="material_import">
                                               <!--  <tr data-id-customer="1" type="info_NVL_import" class="click_doubble get_modal">
                                                    <td>W05-01</td>
                                                    <td>2021-05-06</td>
                                                    <td>CU879879</td>
                                                    <td>Amet minim mollit non deserunt ullamco est sit...</td>
                                                </tr> -->
                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-two-3" class="tab-pane">
                                    <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                                        <!-- panel content -->
                                        <div class="d-flex my-1" style=" justify-content: flex-end;">
                                            <span id="add_export_material" data-tag="a" type="add_material_export" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm phiếu xuất</span>
                                            <button class="btn btn-green btn-outline bg-white" onclick="export_excel_material('export')">Xuất file excel</button>
                                        </div>
                                        <table class="table table-bordered">
                                            <thead style="background-color: #FFF6E5;">
                                                <tr>
                                                    <th>Phiếu xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ngày xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>

                                                    <th>Mã sản xuất
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                    <th>Ghi chú
                                                        <span class="sort">
                                    <i class="fas fa-chevron-up arrow"></i>
                                    <i class="fas fa-chevron-down arrow"></i>
                                </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="material_export">
                                                <!-- <tr data-id-customer="1" type="info_NVL_export" class="click_doubble get_modal">
                                                    <td>W05-01</td>
                                                    <td>2021-05-06</td>
                                                    <td>SX879879</td>
                                                    <td>Amet minim mollit non deserunt ullamco est sit...</td>
                                                </tr> -->
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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

    <!-- Modal info order history-->
    <!-- Thông tin xuất nhập kho sản phẩm -->
    <div class="modal" id="info_product_import">
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
                                <label class="form-info-lable">Phiếu nhập</label>
                                <div class="form-info-input-content t-left">
                                    <p id="tr1">W05-01</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ngày nhập</label>
                                <div class="form-info-input-content t-left">
                                    <p id="tr12">2021-05-06</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Lệnh sản xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="tr123">LSX123454</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Bộ phận</label>
                                <div class="form-info-input-content t-left">
                                    <p id="tr1234">Máy ly</p>
                                </div>
                            </div>
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">Sản phẩm</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_product_import">

                                        <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                <span>Kg</span>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                <span>Kg</span>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng gói:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div>
                                        <!-- <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="py-2">
                                                <p class="mt-2 fz-075rem t-lable mr-3">Đơn vị sản phẩm:</p>
                                                <p class="mt-2 fz-075rem t-lable mr-3">Đơn vị đóng gói:</p>
                                                <p class="mt-2 fz-075rem t-lable mr-3">Quy cách đóng gói:</p>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <p id="note">Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="info_product_export">
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
                                <label class="form-info-lable">Phiếu xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="export_tr1">W05-01</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ngày xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="export_tr12">2021-05-06</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Mã khách hàng</label>
                                <div class="form-info-input-content t-left">
                                    <p id="export_tr123">KH1234567</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Mã vận chuyển</label>
                                <div class="form-info-input-content t-left">
                                    <p id="export_tr1234">VC7161638</p>
                                </div>
                            </div>
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">Sản phẩm</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_product_export">

                                        <!-- <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị tính:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <p id="export_note">Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Thông tin xuất nhập kho nguyên vật liệu -->
    <div class="modal" id="info_NVL_import">
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
                                <label class="form-info-lable">Phiếu nhập</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_import_tr1">W05-01</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ngày nhập</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_import_tr12">2021-05-06</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Mã cung ứng</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_import_tr123">CU123454</p>
                                </div>
                            </div>
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">NVL</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_material_import">

                                       <!--  <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị tính:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                      
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_import_note">Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="info_NVL_export">
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
                                <label class="form-info-lable">Phiếu xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_export_tr1">W05-01</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ngày xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_export_tr12">2021-05-06</p>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Mã sản xuất</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_export_tr123">CU123454</p>
                                </div>
                            </div>
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">NVL</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_material_export">

                                        <!-- <div class="bg-white py-2 px-3 my-1" >
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị tính:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <p id="material_export_note">Pellentesque interdum sed libero sit amet risus pulvinar. Vestibulum ut mauris congue.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="modal" id="info_order_history">
        <div class="modal-box w-65">
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
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Thành phố</label>
                                <div class="form-info-input-content t-left">
                                    <select name="city" id="city">
                                        <option value="0">Chọn thành phố</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Tên NVL</label>
                                <div class="form-info-input-content t-left">
                                    <input type="text" name="materials_name" id="materials_name" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Mã NVL</label>
                                <div class="form-info-input-content t-left">
                                    <input type="text" name="materials_name" id="materials_name" placeholder="Nhập mã sản phẩm">
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Số lượng</label>
                                <div class="form-info-input-content t-left">
                                    <div class="amount ">
                                        <button class="minus"><img src="{{asset('public_admin/images/minus.png')}}" alt=""></button>
                                        <input type="text" class="t-center" value="13.456">
                                        <button class="plus"><img src="{{asset('public_admin/images/plus.png')}}" alt=""></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Đơn vị</label>
                                <div class="form-info-input-content t-left">
                                    <select name="unit" id="unit">
                                        <option value="0">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-info-row align-item-start">
                                <label for="title" class="form-info-lable">Quy cách NVL</label>
                                <div class="form-info-input-content t-left">
                                    <textarea name="materials_specifications" class="w-100" id="materials_specifications" cols="30" rows="10">Nhập quy cách NVL...</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Gửi yêu cầu</button>
                </div>
            </div>
        </div>
    </div> -->

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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa mục này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

    <!-- /////////////////////Cho Quyền quản lý kho hàng//////////////////////////// -->

    <div class="modal" id="add_product_import">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm phiếu nhập kho</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">

                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Lệnh sản xuất</label>
                                <div class="form-info-input-content t-left">
                                    <select name="unit" id="list_production" onchange="list_production($('#list_production').val())">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">Sản phẩm</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_product_import_detail">

                                       <!--  <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <textarea id="note_product_import" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="item-content t-right mb-3" id="btn_cancel_ship"> 
                <button onclick="create_product_import()" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button></div>
        </div>
    </div>

    <div class="modal" id="add_product_export">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm phiếu xuất kho</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">

                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Mã vận chuyển</label>
                                <div class="form-info-input-content t-left">
                                    <select name="unit" id="list_ship" 
                                    onchange="list_ship($('#list_ship').val())">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">Sản phẩm</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_product_export_detail">

                                       <!--  <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <textarea id="note_product_export" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="item-content t-right mb-3" id="btn_cancel_ship"> 
                <button onclick="create_product_export()" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button></div>
        </div>
    </div>

    <div class="modal" id="add_material_import">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm phiếu nhập kho</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">
                           
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">NVL</label>
                                <div class="form-info-input-content t-left" id="list_material_div">

                                    <div class="box bg-F6" style="position: relative;">
                                        <!-- <i class="fas fa-times-circle" style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i> -->
                                        <div class="form-edit p-3">
                                            <div class="form-edit-row-flex">
                                                <div class="form-box-flex w-100">
                                                    <select name="unit" id="list_material0" onchange="list_material($('#list_material0').val())">
                                                        <option value="T">Chọn đơn vị</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- chỉ show khi đã chọn NVL -->
                                        <div class="t-left px-3">
                                            <p class="my-2">ĐVT: <strong id="unit_title0"></strong></p>
                                            <p class="my-2">Số lượng:<strong><input type="number" min="1" value="1" class="form-input w-20 py-1 px-2" id="current_quantity0"></strong></p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable"></label>
                                <div class="form-info-input-content t-left">
                                    <span data-tag="a" class="t-green-main d-block t-right w-50 t-left" onclick="add_div_NVL()">+ Thêm NVL</span>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">
                                    <input id="checkbox_material_import" onchange="checkbox_material_import()" type="checkbox">
                                </label>
                                <div class="form-info-input-content t-left">
                                    <label for="cancel_order">Nguyên vật liệu còn dư sau sản xuất</label>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Mã cung ứng</label>
                                <div class="form-info-input-content t-left">
                                    <select name="unit" id="list_supplier">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <textarea id="note_material_import" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="item-content t-right mb-3" id="btn_cancel_ship"> 
                <button onclick="create_material_import()" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button></div>
        </div>
    </div>

    <div class="modal" id="add_material_export">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm phiếu xuất kho</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content justify-content-center">
                        <div class="form-info-right w-100">

                            <div class="form-info-row">
                                <label for="title" class="form-info-lable">Lệnh sản xuất</label>
                                <div class="form-info-input-content t-left">
                                    <select name="unit" id="list_production_material" onchange="list_production_material($('#list_production_material').val())">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-info-row" style="align-items: flex-start;">
                                <label for="title" class="form-info-lable">NVL</label>
                                <div class="form-info-input-content ">
                                    <!-- product items -->
                                    <div class="bg-F6 py-2 px-3" id="list_material_export_detail">

                                       <!--  <div class="bg-white py-2 px-3 my-1">
                                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                                <strong>NNhựa PE</strong>
                                                <p class="mt-2">NVL 365</p>
                                                <p class="mt-2">x5</p>
                                            </div>
                                            <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                                <span>Kg</span>
                                            </div>
                                             <div class="d-flex py-2 align-item-center">
                                                <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                                <span>Kg</span>
                                            </div>
                                        </div> -->
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-info-row">
                                <label class="form-info-lable">Ghi chú</label>
                                <div class="form-info-input-content t-left">
                                    <textarea id="note_material_exprot" cols="10" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="item-content t-right mb-3"> 
                <button onclick="create_material_export()" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Xác nhận</button></div>
        </div>
    </div>
  



<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script src="{{ asset('public_admin/admin_js/product_storage_manager.js')}}" type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/material_storage_manager.js')}}" type="text/javascript "></script>

<script type="text/javascript">
$(document).ready(function(){
    var admin = JSON.parse(localStorage.getItem('account_customer'))
    console.log(admin.id_type)
    if(admin.id_type == 1 ||admin.id_type == 3 || admin.id_type == 4 )
    {
    $('#add_import_product').remove()
    $('#add_export_product').remove()
    $('#add_import_material').remove()
    $('#add_export_material').remove()
    }
   
})



</script>

@endsection