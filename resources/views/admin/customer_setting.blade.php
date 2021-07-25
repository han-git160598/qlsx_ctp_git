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
        <li class="item "><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item active"><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')
    <!-- content -->
<div id="wp-content">
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Cài đặt
        </h1>

        <div class="box p-0">
            <!-- tab -->
            <!-- tabs container -->
            <div class="tabs-container">
                <ul class="sub-menu nav nav-tabs tab-border-top-danger" style="position: relative;">
                    <li class="sub-item active">
                        <a onclick="list_unit('U')" data-toggle="tab" href="#tab-1" aria-expanded="true">Đơn vị tính</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="list_unit('P')" data-toggle="tab" href="#tab-1" aria-expanded="false">Đơn vị đóng gói</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="list_machine()" data-toggle="tab" href="#tab-3" aria-expanded="false">Bộ phận sản xuất</a>
                    </li>
                    <li class="sub-item">
                        <a onclick="list_product_category()" data-toggle="tab" href="#tab-4" aria-expanded="false">Nhóm sản phẩm</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-5" aria-expanded="false">Cưỡng chế đăng xuất</a>
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
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_unit" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+Thêm đơn vị tính</span>

                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Tên đầy đủ
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Tên viết tắt
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_unit">
                                    <!-- <tr data-id-customer="1" type="edit_unit" class="click_doubble get_modal">
                                        <td>Kilogram</td>
                                        <td>Kg</td>

                                        <td>
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr>
                                    <tr data-id-customer="2" type="edit_unit" class="click_doubble get_modal">
                                        <td>Gram</td>
                                        <td>g</td>

                                        <td>
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_unit" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+Thêm đơn vị đóng gói</span>

                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Tên đầy đủ
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th>Tên viết tắt
                                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_unit_packet">
                                    <!-- <tr data-id-customer="1" type="edit_unit" class="click_doubble get_modal">
                                        <td>Kilogram</td>
                                        <td>Kg</td>

                                        <td>
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr>
                                    <tr data-id-customer="2" type="edit_unit" class="click_doubble get_modal">
                                        <td>Gram</td>
                                        <td>g</td>

                                        <td>
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_machine" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+Thêm máy sản xuất</span>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Tên máy
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_machine">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_product" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+Thêm nhóm sản phẩm</span>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Nhóm sản phẩm
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
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_product_category">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div id="tab-5" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <div id="force">
                                <div class="box-force">
                                    <div class="thumb">
                                        <img class="force-admin" src="../public_admin/images/force_admin.svg" alt="">
                                    </div>
                                    <span data-tag="a" type="force_admin" class="get_modal btn btn-green">Thoát nhân viên</span>
                                </div>
                                <div class="box-force">
                                    <div class="thumb">
                                        <img src="../public_admin/images/force_customer.svg" alt="">
                                    </div>
                                    <span data-tag="a" type="force_customer" class="get_modal btn btn-green">Thoát khách hàng</span>
                                </div>
                            </div>
                        </div>
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

    <!-- modal create / edit -->
    <div class="modal" id="add_unit">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Đơn vị</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên đầy đủ</label>
                                <div class="form-info-input-content">
                                    <input type="text" class="" id="unit_title">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Tên viết tắt</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" id="unit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="btn_add_unit" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_unit">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Đơn vị</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên đầy đủ</label>
                                <div class="form-info-input-content">
                                    <input type="text" class="" id="edit_unit_title" >
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Tên viết tắt</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" class="" id="edit_unit_1" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem" id="btn_update_unit">
                    <button  class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal create / edit -->
    <div class="modal" id="add_product">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm nhóm sản phẩm</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row  align-item-center">
                                <label for="title" class="form-info-lable">Nhóm sản phẩm</label>
                                <div class="form-info-input-content">
                                    <input type="text" id="category_name">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Mô tả</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="category_description">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button onclick="create_product_category()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <!-- sài chung 1 modal edit -->



    <!-- modal create / edit -->
    <div class="modal" id="add_machine">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Chi tiết máy sản xuất</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">

                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Loại máy</label>
                                <div class="form-info-input-content">
                                    <select id="list_category_machine">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-info-row  align-item-center">
                                <label for="title" class="form-info-lable">Tên máy</label>
                                <div class="form-info-input-content">
                                    <input type="text" id="machine_name" >
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Mô tả</label>
                                </div>
                                <div class="form-info-input-content">
                                    <textarea cols="10" rows="5" id="machine_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button onclick="create_machine()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_machine">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Chi tiết máy sản xuất</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Loại máy</label>
                                <div class="form-info-input-content">
                                    <select id="edit_list_category_machine" onchange="list_category_machine($('#edit_list_category_machine').val())">
                                        <option value="T">Chọn đơn vị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên máy</label>
                                <div class="form-info-input-content">
                                    <input type="text" id="edit_machine_name">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Mô tả</label>
                                </div>
                                <div class="form-info-input-content">
                                    <textarea cols="10" rows="5" id="edit_machine_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem" id="btn_update_machine">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>
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
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="../public_admin/images/warning-del.png " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa item này?</p>
                </div>
                <div class="t-center mg-t-175rem" id="btn_delete">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="force_admin">
        <div class="modal-box w-40">
            <div class="modal-title">
                <h4>Cưỡng chế tài khoản nhân viên</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="../public_admin/images/warning_force.svg " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Cưỡng chế tài tất cả tài khoản nhân viên?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="force_customer">
        <div class="modal-box w-40">
            <div class="modal-title">
                <h4>Cưỡng chế tài khoản khách hàng</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="../public_admin/images/warning_force.svg " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Cưỡng chế tất cả tài khoản khách hàng?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
    <script src="{{ asset('public_admin/admin_js/setting_manager.js')}}" type="text/javascript "></script>

@endsection