@extends('layouts.dashboard_admin')

@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item "><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item "><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

        <li class="item active"><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
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
            Sản xuất
        </h1>
        <div class="form-edit d-flex justify-content-space-between p-0 mb-3" style="height: 36px; align-items: flex-end;">
            <span data-tag="a" type="add_module" class="get_modal t-green-main d-block t-right w-20 t-left">+Thêm lệnh sản xuất</span>
            <!-- filter date -->
           <!--  <div class="form-edit-row-flex align-item-center">
                <div class="form-edit-row m-0">
                    <select name="" id="" class="">
                        <option value="0">Chọn tuần</option>
                        <option value="1">Tuần 5</option>
                    </select>
                    <span>Từ ngày 2017-03-06 đến ngày 2017-03-12</span>
                </div>
            </div> -->
            <!-- search -->
            <!-- <div class="form-edit-row m-0 w-35">
                <div class="search" style="position: relative;">
                    <input type="text" name="search" id="search" placeholder="Tìm kiếm..." class="form-input py-1 px-2" value="">
                    <button class="input d-flex">
                        <span class="icon" style="position: absolute;top: .5rem; right: .75rem;"><img src="../public_admin/images/search_black.png" alt=""></span>
                    </button>
                </div>
            </div> -->
        </div>
        <div class="box p-0">
            <!-- tab -->
            <!-- tabs container -->
            <div class="tabs-container">
                <ul class="sub-menu nav nav-tabs tab-border-top-danger" style="position: relative;" id="tab_title_machine">
                    <!-- <li class="sub-item active">
                        <a data-toggle="tab" href="#tab-1" aria-expanded="true">Máy màng </a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-2" aria-expanded="false">Máy in</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-3" aria-expanded="false">Thành phẩm</a>
                    </li>
                    <li class="sub-item">
                        <a data-toggle="tab" href="#tab-4" aria-expanded="false">Máy ly</a>
                    </li> -->

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
                            <div class="d-flex my-1" style=" justify-content: flex-end;">
                                <button class="btn btn-green btn-outline bg-white">Xuất dữ liệu</button>
                            </div>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Lệnh sản xuất</th>
                                        <th>Máy sản xuất</th>
                                        <th>Tuần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list_may_mang">
                                    <!-- <tr data-id-customer="1" type="edit_production" class="click_doubble get_modal">
                                        <td></td>
                                        <td>TRẮNG XANH</td>
                                        <td>TRẮNG XANH</td>
                                        <td>65ML +115 ML</td>
                                        <td> </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Chi tiết</button>
                                        </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
                                        </td>
                                    </tr> -->
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <div class="d-flex my-1" style=" justify-content: flex-end;">
                                <button class="btn btn-green btn-outline bg-white">Xuất dữ liệu</button>
                            </div>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Lệnh sản xuất</th>
                                        <th>Máy sản xuất</th>
                                        <th>Tuần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id-customer="1" type="edit_production" class="click_doubble get_modal">
                                        <td></td>
                                        <td>TRẮNG XANH</td>
                                        <td>TRẮNG XANH</td>
                                        <td>65ML +115 ML</td>
                                        <td> </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Chi tiết</button>
                                        </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <div class="d-flex my-1" style=" justify-content: flex-end;">
                                <button class="btn btn-green btn-outline bg-white">Xuất dữ liệu</button>
                            </div>
                            <table class="table table-bordered">
                                <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Lệnh sản xuất</th>
                                        <th>Máy sản xuất</th>
                                        <th>Tuần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id-customer="1" type="edit_production" class="click_doubble get_modal">
                                        <td></td>
                                        <td>TRẮNG XANH</td>
                                        <td>TRẮNG XANH</td>
                                        <td>65ML +115 ML</td>
                                        <td> </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Chi tiết</button>
                                        </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
                                        </td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!-- panel content -->
                            <div class="d-flex my-1" style=" justify-content: flex-end;">
                                <button class="btn btn-green btn-outline bg-white">Xuất dữ liệu</button>
                            </div>
                            <table class="table table-bordered">
                              <thead style="background-color: #FFF6E5;">
                                    <tr>
                                        <th>Lệnh sản xuất</th>
                                        <th>Máy sản xuất</th>
                                        <th>Tuần</th>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-id-customer="1" type="edit_production" class="click_doubble get_modal">
                                        <td></td>
                                        <td>TRẮNG XANH</td>
                                        <td>TRẮNG XANH</td>
                                        <td>65ML +115 ML</td>
                                        <td> </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Chi tiết</button>
                                        </td>
                                        <td class="t-center py-1">
                                            <button class="btn btn-green btn-outline py-1 px-4">Hoàn tất</button>
                                        </td>
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
  


    <div class="modal" id="info_production">
        <div class="modal-box w-60">
            <div class="modal-title">
                <h4>Thêm lệnh sản xuất</h4>
                <span class="icon" data-tag="a">
                            <img src="../public_admin/images/x-black.png" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit-row-flex  align-item-center" style="position: relative;">
                    <div class="form-edit-row my-3 t-left">
                        <select name="" id="">
                            <option value="0">Chọn tuần</option>
                            <option value="1">Tuần 5</option>
                        </select>
                        <span>Từ ngày 2017-03-06 đến ngày 2017-03-12</span>
                    </div>
                    <button class="btn btn-green btn-outline bg-white" style="position:absolute; top:0; right:0;">Xuất dữ liệu</button>
                </div>
                <!-- table -->
                <table class="table table-bordered">
                    <thead style="background-color: #FFF6E5;">
                        <tr>
                            <td>
                                Bộ phận
                            </td>
                            <td colspan="5">MÁY MÀNG</thtd>
                        </tr>
                    </thead>
                    <thead style="background-color: #FFF6E5;">
                        <tr>
                            <td>
                                Ca
                            </td>
                            <td colspan="5">SÁNG</td>
                        </tr>
                    </thead>
                    <thead style="background-color: #FFF6E5;">
                        <tr>
                            <td>
                                Tên hàng ra
                            </td>
                            <td>
                                ĐVT/ĐV ĐÓNG GÓI
                            </td>
                            <td>
                                QUY CÁCH
                            </td>
                            <td>
                                LOẠI NHỰA
                            </td>
                            <td>
                                SỐ LƯỢNG CHẠY
                            </td>
                            <td>
                                Ghi chú
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                            <td>
                                R460
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                1L2x630
                            </td>
                            <td>
                                PP TRONG
                            </td>
                            <td>
                                5.0 cuộn
                            </td>
                            <td rowspan="2" class="align-middle">
                                CHẠY MẪU THỬ R460
                            </td>

                        </tr>
                        <tr data-id-customer="2" type="info_order_history" class="click_doubble get_modal">
                            <td>
                                R460
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                1L2x630
                            </td>
                            <td>
                                PP TRONG
                            </td>
                            <td>
                                5.0 cuộn
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal info order history-->
    <div class="modal" id="add_module">
        <div class="modal-box w-60">
            <div class="modal-title">
                <h4>Thêm lệnh sản xuất</h4>
                <span class="icon" data-tag="a">
                            <img src="../public_admin/images/x-black.png" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit px-0">
                    <div class="form-edit-row-flex mb-3">
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="week" class="form-lable">Tuần</label>
                            <input type="text" class="form-input w-80 ml-2" name="week" placeholder="Nhập tuần" id="week_title">
                        </div>
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="from_date" class="form-lable">Từ</label>
                            <input type="date" onchange="list_date()" name="from_date" class="form-input  w-80 ml-2" id="from_date">
                        </div>
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="to_date" class="form-lable">Đến</label>
                            <input type="date" onchange="list_date()" name="to_date" class="form-input w-80 ml-2" id="to_date">
                        </div>
                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label for="machine_name" class="form-lable">Tên máy sản xuất</label>
                            <select name="machine_name" class="form-select" id="machine_name">
                                <option value="0">Chọn loại máy</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box bg-F6">
                    <div class="form-edit px-0">
                        <div class="form-edit-row-flex">
                            <div class="form-box-flex">
                                <label for="machine_name" class="form-lable">Lịch sản xuất</label>
                                <select name="machine_name" class="form-select" id="datetodate">
                                    <option value="1">Chọn ngày</option>
                                </select>
                            </div>
                            <div class="form-box-flex">
                                <label for="machine_name" class="form-lable">Loại ca</label>
                                <select name="ca_name" class="form-select" id="ca_name">
                                        <option value="T">Ca tối</option>
                                        <option value="S">Ca sáng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box" id="prodution_calender">
                        <div class="form-edit">
                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Sản phẩm</label>
                                    <select  name="choose_prd" id="choose_prd" class="form-input">
                                        <option value="0">Chọn sản phẩm</option>
                                    </select>
                                </div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Số lượng</label>
                                    <div class="amount" style="height: 2.2rem;">
                                        <button onclick="decrease('product')" class="minus" style="width: 2.1rem;"><img src="../public_admin/images/minus.png" alt=""></button>
                                        <input type="number" id="nums_product" min="1" value="1" class="form-input">
                                        <button onclick="increase('product')" class="plus" style="width: 2.1rem;"><img src="../public_admin/images/plus.png" alt=""></button>
                                    </div>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>ĐVT: <strong id="dvt_product"></strong></p>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>Quy cách: <strong id="qc_product"></strong></p>
                                </div>

                            </div>
                            <div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Nguyên vật liệu</label>
                                    <select name="choose_nvl" id="choose_nvl" class="form-input">
                                        <option value="0">Chọn NVL</option>
                                    </select>
                                </div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Số lượng</label>
                                    <div class="amount" style="height: 2.2rem;">
                                        <button onclick="decrease('material')" class="minus" style="width: 2.1rem;"><img src="../public_admin/images/minus.png" alt=""></button>
                                        <input type="number" id="nums_material" min="1" value="1" class="form-input">
                                        <button onclick="increase('material')" class="plus" style="width: 2.1rem;"><img src="../public_admin/images/plus.png" alt=""></button>
                                    </div>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>ĐVT: <strong id="unit_material"></strong></p>
                                </div>
                                <div class="form-edit-row t-right">
                                    <button id="save_product_material" class="btn-submit w-20 d-inline-block fz-1rem">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-edit px-0">
                    <div class="form-edit-row mb-3">
                        <label for="week" class="form-lable">Ghi chú</label>
                        <textarea name="" id="production_note" cols="30" rows="3" class="form-input" placeholder="Nhập ghi chú...."></textarea>
                    </div>

                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file" onclick="create_production()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
  <!--   <div class="modal" id="edit_production">
        <div class="modal-box w-60">
            <div class="modal-title">
                <h4>Thêm lệnh sản xuất</h4>
                <span class="icon" data-tag="a">
                            <img src="../public_admin/images/x-black.png" alt="">
                        </span>
            </div>
            <div class="modal-content">
                <div class="form-edit px-0">
                    <div class="form-edit-row-flex mb-3">
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="week" class="form-lable">Tuần</label>
                            <input type="text" class="form-input w-80 ml-2" name="week" placeholder="Nhập tuần" id="week">
                        </div>
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="from_date" class="form-lable">Từ</label>
                            <input type="date" name="from_date" class="form-input  w-80 ml-2" id="from_date">
                        </div>
                        <div class="form-box-flex w-30 d-flex justify-content-space-between align-item-center">
                            <label for="to_date" class="form-lable">Đến</label>
                            <input type="date" name="to_date" class="form-input w-80 ml-2" id="to_date">
                        </div>
                    </div>
                    <div class="form-edit-row-flex">
                        <div class="form-box-flex">
                            <label for="machine_name" class="form-lable">Tên máy sản xuất</label>
                            <select name="machine_name" class="form-select" id="machine_name">
                                        <option value="0">Chọn loại máy</option>
                                    </select>
                        </div>
                        <div class="form-box-flex">
                            <label for="machine_name" class="form-lable">Loại ca</label>
                            <select name="ca_name" class="form-select" id="ca_name">
                                        <option value="0">Chọn ca</option>
                                    </select>
                        </div>
                    </div>
                </div>
                <div class="box bg-F6">
                    <div class="form-edit px-0">
                        <div class="form-edit-row-flex">
                            <div class="form-box-flex">
                                <label for="machine_name" class="form-lable">Lịch sản xuất</label>
                                <select name="machine_name" class="form-select" id="machine_name">
                                            <option value="0">Chọn ngày</option>
                                            <option value="1">Thứ 2 (2017-03-06)</option>
                                        </select>
                            </div>
                        </div>
                    </div>
                    <div class="box" id="prodution_calender">
                        <div class="form-edit">
                            <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Sản phẩm</label>
                                    <select name="choose_prd" id="choose_prd" class="form-input">
                                        <option value="0">Chọn sản phẩm</option>
                                    </select>
                                </div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Số lượng</label>
                                    <div class="amount" style="height: 2.2rem;">
                                        <button class="minus" style="width: 2.1rem;"><img src="../public_admin/images/minus.png" alt=""></button>
                                        <input type="text" value="1" class="form-input">
                                        <button class="plus" style="width: 2.1rem;"><img src="../public_admin/images/plus.png" alt=""></button>
                                    </div>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>ĐVT: <strong>Cái</strong></p>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>Quy cách: <strong>300 Cái/Thùng</strong></p>
                                </div>

                            </div>
                            <div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Nguyên vật liệu</label>
                                    <select name="choose_nvl" id="choose_nvl" class="form-input">
                                        <option value="0">Chọn NVL</option>
                                    </select>
                                </div>
                                <div class="form-edit-row ">
                                    <label for="machine_name" class="form-lable">Số lượng</label>
                                    <div class="amount" style="height: 2.2rem;">
                                        <button class="minus" style="width: 2.1rem;"><img src="../public_admin/images/minus.png" alt=""></button>
                                        <input type="text" value="1" class="form-input">
                                        <button class="plus" style="width: 2.1rem;"><img src="../public_admin/images/plus.png" alt=""></button>
                                    </div>
                                </div>
                                <div class="form-edit-row t-left">
                                    <p>ĐVT: <strong>Kg</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-edit px-0">
                    <div class="form-edit-row mb-3">
                        <label for="week" class="form-lable">Ghi chú</label>
                        <textarea name="" id="" cols="30" rows="3" class="form-input" placeholder="Nhập ghi chú...."></textarea>
                    </div>

                </div>
                <div class="item-content t-right mg-t-175rem ">
                    <button id="add_file"  class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- modal delete file attach -->
 <!--    <div class="modal" id="delete_module">
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
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
                </div>
                <div class="t-center mg-t-175rem">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div -->>



    
<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment-with-locales.min.js"></script>
<script src="{{ asset('public_admin/admin_js/production_manager.js')}}" type="text/javascript "></script>
@endsection