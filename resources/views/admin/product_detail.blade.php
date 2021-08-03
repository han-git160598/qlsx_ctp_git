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
        <li class="item active"><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item "><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')
<div id="wp-content">
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            <a href="{{URL::to('list-product')}}" class="mr-3"><i class="fas fa-chevron-left"></i></a>Chi tiết
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right w-20 t-left">+ Thêm sản phẩm</span>
            <!-- filter date -->
            <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0">
                    <input type="date"  class="form-input py-1 px-2">
                </div>
                <div class="form-edit-row m-0 mx-3">
                    <p>Đến</p>
                </div>
                <div class="form-edit-row m-0">
                    <input type="date"  class="form-input py-1 px-2">
                </div>
            </div>
            <!-- search -->
            <div class="form-edit-row m-0 w-35">
                <div class="search" style="position: relative;">
                    <input type="text" name="search"  id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
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
                <!-- <ul class="sub-menu nav nav-tabs tab-border-top-danger" style="position: relative;">
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
                </ul> -->
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Mã sản phẩm
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
                                        <th>Quy cách đóng
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
                                <tbody id="list_product_detail">
                                    <!-- <tr data-id-customer="1" type="edit_product" class="click_doubble get_modal">
                                        <td>QTR365</td>
                                        <td>6.892</td>
                                        <td>Cái</td>
                                        <td>Pellentesque interdum sed libero sit amet risus pulvinar. Ves...</td>
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


    <div class="modal" id="edit_product">
        <div class="modal-box w-50">
            <div class="modal-title">
                <h4>Thêm sản phẩm</h4>
                <span class="icon" data-tag="a">
                            <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã khách hàng</label>
                        <input type="text" class="form-input" name="product_customer_code" placeholder="Nhập mã khách hàng" id="edit_customer_code" readonly="" value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Mã sản phẩm</label>
                        <input type="text" class="form-input" name="product_code" placeholder="Nhập mã sản phẩm" readonly id="edit_product_code" value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên sản phẩm</label>
                        <input type="text" class="form-input" name="address_name" placeholder="Nhập tên sản phẩm" id="edit_product_name" value="">
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
                                <input data-target="add_module" data-id="0" type="file" name="attach" id="attach" class="form-file-input d-none">
                                <span data-target="add_module" data-id="0" class="form-file-img d-none"></span>

                                <span data-target="add_module" data-id="0" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close d-block">
                                    <img src="{{asset('public_admin/images/x_thumb_nail.png')}}" alt="">
                                </span>
                                <strong data-target="add_module" data-id="0" class="form-file-img-title d-none">Tải hình của bạn lên đây</strong>
                                <span data-target="add_module" data-id="0" class="form-file-view-img d-block">
                                    <img src="" id="edit_product_img" alt="">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label class="form-lable">An toàn kho</label>
                            <div class="amount">
                                <button onclick="decrease('edit_safe_warehouse')" class="minus"><img src="{{asset('public_admin/images/minus.png')}}" alt=""></button>
                                <input type="number" id="nums_edit_safe_warehouse" value="1">
                                <button onclick="increase('edit_safe_warehouse')" class="plus"><img src="{{asset('public_admin/images/plus.png')}}" alt=""></button>
                            </div>
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Số lượng đóng gói</label>
                            <div class="amount">
                                <button onclick="decrease('edit_quantity_packet')" class="minus"><img src="{{asset('public_admin/images/minus.png')}}" alt=""></button>
                                <input type="number" id="nums_edit_quantity_packet" value="1">
                                <button onclick="increase('edit_quantity_packet')" class="plus"><img src="{{asset('public_admin/images/plus.png')}}" alt=""></button>
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
                        <textarea name="" id="edit_product_description" cols="30" class="form-input" rows="5"></textarea>
                    </div>

                </div>
                <div class="item-content t-right mg-t-175rem " id="btn_update_product">
                    <button id="add_file"  class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
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
                    <img src="{{asset('public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="{{asset('public_admin/images/warning-del.png')}} " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
                </div>
                <div class="t-center mg-t-175rem" id="btn_delete_product">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

    
<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/product_manager.js')}}" type="text/javascript "></script>
<script type="text/javascript">
 $(document).ready(function()
 {
    var id_customer = JSON.parse(sessionStorage.getItem('detail_product'))
    product_detail(id_customer)
 })   

</script>
@endsection
