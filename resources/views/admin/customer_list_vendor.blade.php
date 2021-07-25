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
        <li class="item active"><a href="{{url('admin/customer_list_vendor')}}">Nhà cung ứng</a></li>
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
                Nhà cung ứng
            </h1>
            <div class="form-edit d-flex justify-content-space-between p-0 mb-3"
                style="height: 36px; align-items: flex-end;">
                <span data-tag="a" type="add_vendor" class="get_modal t-green-main d-block t-right w-20 t-left">+Thêm nhà
                    cung ứng</span>

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
                        <li class="sub-item visible-hidden">
                            <a data-toggle="tab" href="#tab-1" class="" aria-expanded="true">Tất cả </a>
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
                                            <th>Mã cung ứng
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
                                            <th>Email
                                                <span class="sort">
                                                    <i class="fas fa-chevron-up arrow"></i>
                                                    <i class="fas fa-chevron-down arrow"></i>
                                                </span>
                                            </th>
                                            <th>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_vendor">
                                        {{-- <tr data-id-customer="1" type="edit_vendor" class="click_doubble get_modal">
                                            <td>CU879879</td>
                                            <td>Công ty TNHH Hưng Phát</td>
                                            <td>(+84) 944810055</td>
                                            <td>Sample@gmail.com</td>
                                            <td>
                                                <span data-tag="a" type="delete_module"
                                                    class="get_modal t-green-main my-1 ml-4">Xoá</span>

                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
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
    <!-- Modal Thêm nhà cung ứng-->
    <div class="modal" id="add_vendor">
        <div class="modal-box">

            <div class="modal-title">
                <h4>Thêm nhà cung ứng</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <form action="" method="post" class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã nhà cung ứng</label>
                        <input type="text" class="form-input" name="vendor_code" placeholder="Nhập mã cung ứng"
                             value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên nhà cung ứng</label>
                        <input type="text" class="form-input" name="vendor_name" placeholder="Nhập tên nhà cung ứng"
                             value="">
                    </div>
                    <div class="form-edit-row form-edit-row-flex input-content ">
                        <div class="form-box-flex">
                            <label class="form-lable">Số điện thoại</label>
                            <input type="text" class="form-input name" name="vendor_phone"
                                placeholder="Nhập số điện thoại" value="">
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Email</label>
                            <input type="email" class="form-input name" name="vendor_email"
                                placeholder="Nhập emal" value="">
                        </div>
                    </div>
                    <div class="form-edit-row ">
                        <label class="form-lable ">Địa chỉ</label>
                        <input type="text" class="form-input" name="vendor_address" placeholder="Nhập địa chỉ"
                             value="">
                    </div>
                </form>
            </div>

            <div class="item-content mb-3 d-flex justify-content-end ">
                <button class="btn-submit w-30" id="btn_add_vendor">Hoàn thành</button>
            </div>
        </div>
    </div>
    <!-- Modal Thông tin nhà cung ứng-->
    <div class="modal" id="edit_vendor">
        <div class="modal-box">

            <div class="modal-title">
                <h4>Thông tin nhà cung ứng</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <form action="" method="post" class="form-edit">
                    <div class="form-edit-row">
                        <label class="form-lable">Mã nhà cung ứng</label>
                        <input type="text" class="form-input" name="vendor_code" readonly placeholder="Nhập mã cung ứng"
                             value="">
                    </div>
                    <div class="form-edit-row">
                        <label class="form-lable">Tên nhà cung ứng</label>
                        <input type="text" class="form-input" name="vendor_name" placeholder="Nhập tên nhà cung ứng"
                             value="">
                    </div>
                    <div class="form-edit-row form-edit-row-flex input-content ">
                        <div class="form-box-flex">
                            <label class="form-lable">Số điện thoại</label>
                            <input type="text" class="form-input name" name="vendor_phone"
                                placeholder="Nhập số điện thoại" value="">
                        </div>
                        <div class="form-box-flex">
                            <label class="form-lable">Email</label>
                            <input type="email" class="form-input name" name="vendor_email"
                                placeholder="Nhập emal" value="">
                        </div>
                    </div>
                    <div class="form-edit-row ">
                        <label class="form-lable ">Địa chỉ</label>
                        <input type="text" class="form-input name" name="vendor_address"
                                placeholder="Nhập emal" value="">
                    </div>
                </form>
            </div>

            <div class="item-content mb-3 d-flex justify-content-end ">
                <button class="btn-submit w-30" id="btn_edit_vendor" data-id="">Hoàn thành</button>
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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="submit_delete" data-id="" class="btn-submit w-20 d-inline-block fz-1rem">Xoá</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ajax')
<script src="{{asset('public_admin/admin_js/customer_list_vendor.js')}}" type="text/javascript"></script>
@endsection
