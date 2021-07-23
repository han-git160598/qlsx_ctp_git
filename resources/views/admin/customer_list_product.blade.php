@extends('layouts.dashboard_admin')

@section('sidebar')
<div id="sidebar-left">
    <ul id="main-menu">
        <li class="item"><a href="customer_index.html">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="customer_list_order.html">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item"><a href="customer_list_inventory.html">Kiểm kê kho</a></li>

        <li class="item "><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
        <li class="item"><a href="customer_list_vendor.html">Nhà cung ứng</a></li>
        <li class="item active"><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item"><a href="customer_list_account.html">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')


    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Sản phẩm
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="get_modal visible-hidden t-green-main d-block t-right w-20 t-left">+ Thêm sản phẩm</span>
            <!-- filter date -->
            <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0">
                    <input type="date" onchange="list_product(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val() )" id="date_begin" class="form-input py-1 px-2">
                </div>
                <div class="form-edit-row m-0 mx-3">
                    <p>Đến</p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date" onchange="list_product(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val() )" id="date_end" class="form-input py-1 px-2">
                </div>
            </div>
            <!-- search -->
            <div class="form-edit-row m-0 w-35">
                <div class="search" style="position: relative;">
                    <input type="text" name="search" onkeyup="list_product(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val())" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
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
                        <a data-toggle="tab" href="#tab-1" aria-expanded="true">Thành phẩm</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-2" aria-expanded="false">Nguyên vật liệu</a>
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
                            <span data-tag="a" type="add_product" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm sản phẩm</span>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Mã KH
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th>Họ và tên
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th>Tên công ty
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
                                        <th>Mã sản phẩm
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_product">
                                    <!-- <tr data-id-customer="1" type="" class="click_doubble get_modal">
                                        <td>KH1234567</td>
                                        <td>Nguyễn Văn A</td>
                                        <td>Công ty Cổ Phần ABCD - Chi nh... </td>
                                        <td>(+84) 944810055</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">+2</span>
                                        </td>
                                        <td>
                                            <a href="product_detail.html" class="t-green-main">Chi tiết</a>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <span data-tag="a" type="add_material" class="get_modal t-green-main d-block t-right w-20 t-left p-2">+ Thêm NVL</span>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Mã NVL
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
                                        <th>Nguyên vật liệu
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th>An toàn kho
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th>Đơn vị
                                            <span class="sort">
                        <i class="fas fa-chevron-up arrow"></i>
                        <i class="fas fa-chevron-down arrow"></i>
                    </span>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_material">
                                   <!--  <tr data-id-customer="2" type="edit_material" class="click_doubble get_modal">
                                        <td>NVL365</td>
                                        <td>CU879879</td>
                                        <td>Nhựa PE</td>
                                        <td>6.892</td>
                                        <td>
                                            Kg
                                        </td>
                                        <td>
                                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
       

        <ul class="pagination" id="cusotmer_pagination">
           <!--  <li class="item prev"><i class="fas fa-chevron-left"></i></li>
            <li class="item">1</li>
            <li class="item">2</li>
            <li class="item">3</li>
            <li class="item">4</li>
            <li class="item">5</li>
            <li class="item next"><i class="fas fa-chevron-right"></i></li> -->
        </ul>
         </div>
    </div>
  

@endsection 
@section('modal')

    <!-- Modal info order history-->

    <div class="modal" id="edit_material">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Chi tiết nguyên vật liệu</h4>
                <span class="icon" data-tag="a">
                            <img src="../public_admin/images/x-black.png" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã nhà cung ứng</label>
                        <select name="city " id="edit_list_supplier" class="form-select">
                            <option value="0 ">Chọn mã cung ứng</option>
                        </select>
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Mã NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập mã NVL" id="edit_material_code" value="">

                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập tên NVLL" id="edit_material_name" value="">

                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label class="form-lable">An toàn kho</label>
                            <div class="amount">
                                <button onclick="decrease('edit_safe_warehouse_material')" class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="number" id="nums_edit_safe_warehouse_material" value="1">
                                <button onclick="increase('edit_safe_warehouse_material')" class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Đơn vị</label>
                        <select name="city " id="edit_list_unit_material" class="form-select">
                           
                        </select>
                        </div>
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Quy cách NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập quy cách NVL" id="edit_material_spec" value="">

                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem" id="btn_update_material">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="add_material">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm nguyên vật liệu</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã nhà cung ứng</label>
                        <select name="city " id="list_supplier" class="form-select">
                            <option value="0 ">Chọn mã cung ứng</option>
                        </select>
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Mã NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập mã NVL" id="material_code" value="">

                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập tên NVLL" id="material_name" value="">

                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label class="form-lable">An toàn kho</label>
                            <div class="amount">
                                <button onclick="decrease('safe_warehouse_material')" class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="number" id="nums_safe_warehouse_material" value="1">
                                <button onclick="increase('safe_warehouse_material')" class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Đơn vị</label>
                        <select name="city " id="list_unit_material" class="form-select">
                            
                        </select>
                        </div>
                    </div>
              
                    <div class="form-edit-row">
                        <label class="form-lable">Quy cách NVL</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập quy cách NVL" id="material_spec" value="">

                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button onclick="create_material()" id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="add_product">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm sản phẩm</h4>
                <span class="icon" data-tag="a">
                            <img src="../public_admin/images/x-black.png" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã khách hàng</label>
                        <input type="text" class="form-input" name="product_customer_code" placeholder="Nhập mã khách hàng" id="product_customer_code" value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Mã sản phẩm</label>
                        <input type="text" class="form-input" name="product_code" placeholder="Nhập mã sản phẩm" id="product_code" value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên sản phẩm</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập tên sản phẩm" id="product_name" value="">
                    </div>
                    <div class="form-edit-row ">
                        <label class="form-lable ">Nhóm sản phẩm</label>
                        <select name="city " id="product_category" class="form-select">
                           
                        </select>
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Hình ảnh</label>
                        <div class="form-file" data-target="add_module" data-id="0">
                            <div class="form-file-box">
                                <input data-target="add_module" data-id="0" type="file" name="attach" id="attach" class="form-file-input">
                                <span data-target="add_module" data-id="0" class="form-file-img"></span>

                                <span data-target="add_module" data-id="0" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close">
                                    <img src="../public_admin/images/x_thumb_nail.png" alt="">
                                </span>
                                <strong data-target="add_module" data-id="0" class="form-file-img-title">Tải hình của bạn lên đây</strong>
                                <span data-target="add_module" data-id="0" class="form-file-view-img">
                                    <img src="" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label class="form-lable">An toàn kho</label>
                            <div class="amount">
                                <button onclick="decrease('safe_warehouse')" class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="number" id="nums_safe_warehouse" value="1">
                                <button onclick="increase('safe_warehouse')" class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Số lượng đóng gói</label>
                            <div class="amount">
                                <button onclick="decrease('quantity_packet')" class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="number" id="nums_quantity_packet" value="1">
                                <button onclick="increase('quantity_packet')" class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label for="machine_name" class="form-lable">Đơn vị</label>
                            <select name="machine_name" class="form-select" id="list_unit">
                               
                            </select>
                        </div>
                        <div class="form-box-flex">
                            <label for="machine_name" class="form-lable">Cách đóng gói</label>
                            <select name="ca_name" class="form-select" id="list_unit_packet">
                                    
                            </select>
                        </div>
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Mô tả</label>
                        <textarea name="" id="product_description" cols="30" class="form-input" rows="5"></textarea>
                    </div>

                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" onclick="create_product()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa ?</p>
                </div>
                <div class="t-center mg-t-175rem" id="btn_delete_material">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/product_manager.js')}}" type="text/javascript "></script>
@endsection

    