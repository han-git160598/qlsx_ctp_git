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
    <h1 class="heading">
        Khách hàng
    </h1>
    <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
        <span data-tag="a" type="add_module" class="get_modal t-green-main d-block t-right w-20 t-left">+ Thêm khách hàng</span>
        <!-- filter date -->
        <div class="form-edit-row-flex align-item-center">
            <div class="form-edit-row m-0 mx-3">
                <p>Từ</p>
            </div>
            <div class="form-edit-row m-0">
                <input 
        onchange="cusotmer_pagination(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val() )"  
        type="date" id="date_begin"  class="form-input py-1 px-2">
            </div>
            <div class="form-edit-row m-0 mx-3">
                <p>Đến</p>
            </div>
            <div class="form-edit-row m-0">
            <input 
        onchange="cusotmer_pagination(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val() )" 
            type="date" id="date_end"  class="form-input py-1 px-2">
            </div>
        </div>

        <div class="form-edit-row m-0 w-35">
            <div class="search" style="position: relative;">
                <input type="text" onkeyup="cusotmer_pagination(1,$('#search').val(),$('#date_begin').val(),$('#date_end').val())" name="search" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
                <button class="input d-flex">
                    <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img src="../public_admin/images/search_black.png" alt=""></span>
                </button>
            </div>
        </div>
    </div>
    <div class="box p-0">
        <div style="height: 554px; overflow-y: scroll;">
            <table class="table table-bordered">
                <thead style="background-color: #FFF6E5;">
                    <tr>
                        <th class="th-flex">Mã KH
                            <span class="sort">
                            <i class="fas fa-chevron-up arrow"></i>
                            <i class="fas fa-chevron-down arrow"></i>
                        </span>
                        </th>
                        <th class="th-flex">Họ và tên
                            <span class="sort">
                            <i class="fas fa-chevron-up arrow"></i>
                            <i class="fas fa-chevron-down arrow"></i>
                        </span>
                        </th>
                        <th class="th-flex">Tên công ty
                            <span class="sort">
                            <i class="fas fa-chevron-up arrow"></i>
                            <i class="fas fa-chevron-down arrow"></i>
                        </span>
                        </th>
                        <th class="th-flex">Số điện thoại
                            <span class="sort">
                            <i class="fas fa-chevron-up arrow"></i>
                            <i class="fas fa-chevron-down arrow"></i>
                        </span>
                        </th>
                        <th class="th-flex">Trạng thái
                            <span class="sort">
                            <i class="fas fa-chevron-up arrow"></i>
                            <i class="fas fa-chevron-down arrow"></i>
                        </span>
                        </th>
                        <th class="th-flex">
                        </th>
                    </tr>
                </thead>
                <tbody id="list_customer">
                   <!--  <tr data-id-customer="1">
                        <td>KH1234567</td>
                        <td>Nguyễn Văn A</td>
                        <td>Công ty Cổ Phần ABCD - Chi nh... </td>
                        <td>(+84) 944810055</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                              </label>
                        </td>
                        <td class="t-center">
                            <a href="customer_detail.html" class="t-green-main my-1">Sửa</a>
                            <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                        </td>

                    </tr> -->
                   
                </tbody>
            </table>
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
    <div class="modal" id="add_module">
        <div class="modal-box w-50" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thêm khách hàng</h4>
                <span class="icon" data-tag="a">
                    <img src="../public_admin/images/x-black.png" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="form-info">
                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <form id="create_customer_form">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Mã khách hàng</label>
                                <div class="form-info-input-content">
                                    <input type="text" id="customer_code" placeholder="Nhập mã khách hàng">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="title" class="form-info-lable visible-hidden"></label>
                                </div>

                                <div class="form-info-input-content t-left">
                                    <input type="checkbox" class="d-inline-block w-10" name="is_business" id="is_business">
                                    <label for="is_business">Bạn là doanh nghiệp?</label>
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
                                    <input type="text" id="customer_phone" placeholder="Nhập số điện thoại">
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
                            </form>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Mật khẩu</label>
                                </div>
                                <div class="form-info-input-content">
                                    <div class="form-info-row justify-content-space-between">
                                        <input type="text" id="customer_password" class="w-70 py-1" value="D#)zS0Uu(rUu2EV*UM0Z2QW%" placeholder="Nhập email">
                                        <button class="rand_pass btn btn-green btn-outline py-1">Tạo mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" onclick="create_customer()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa tài khoản này?</p>
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