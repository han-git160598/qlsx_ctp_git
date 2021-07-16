@extends('layouts.dashboard_admin')

@section('sidebar')
<div id="sidebar-left">
    <ul id="main-menu">
        <li class="item"><a href="customer_index.html">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="customer_list_order.html">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-inventory')}}">Kho hàng</a></li>
        <li class="item"><a href="customer_list_inventory.html">Kiểm kê kho</a></li>

        <li class="item active"><a href="{{URL::to('list-production')}}">Sản xuất</a></li>
        <li class="item"><a href="customer_list_vendor.html">Nhà cung ứng</a></li>
        <li class="item"><a href="{{URL::to('list-product')}}">Sản phẩm</a></li>
        <li class="item"><a href="{{URL::to('list-ship')}}">Vận chuyển</a></li>
        <li class="item"><a href="customer_list_account.html">Tài khoản</a></li>
        <li class="item"><a href="customer_setting.html">Cài đặt</a></li>
    </ul>
</div>
@endsection
@section('content')

            <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            Chi tiết lệnh sản xuất
        </h1>

        <div class="box p-0">
            <!-- tab -->
            <!-- tabs container -->
            <div class="tabs-container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="panel-body" style="height: 554px; overflow-y: scroll;">
                            <!--  -->

                        <div class="form-edit-row-flex  align-item-center" style="position: relative;">
                            <div class="form-edit-row my-3 t-left">
                                <p>Lệnh sản xuất: <strong id="production_code"></strong></p>
                                <p>Máy sản xuất: <strong id="machine_title"></strong></p>
                                <select name="" id="week_title">
                                    <option value="0">Chọn tuần</option>
                                    <option value="1">Tuần 5</option>
                                </select>
                                <span id="datetodate"></span>
                            </div>
                            <button class="btn btn-green btn-outline bg-white" style="position:absolute; top:0; right:0;">Xuất dữ liệu</button>
                        </div>

                        <!-- table -->
                        <table class="table table-bordered">
                            <thead style="background-color: #FFF6E5;">
                                <tr>
                                    <td>Thời gian</td>
                                    <td>Ca</td>
                                    <td>Hàng ra</td>
                                    <td>DV đóng gói</td>
                                    <td>Quy cách</td>
                                    <td>Loại nhựa</td>
                                    <td>SL chạy</td>
                                    <td>Ghi chú</td>
                                </tr>
                            </thead>
                            <tbody id="production_detail">
                               <!--  <tr data-id-customer="1" type="info_order_history" class="click_doubble get_modal">
                                    <td>R460</td>
                                    <td>10</td>
                                    <td>1L2x630</td>
                                    <td>PP TRONG</td>
                                    <td>5.0 cuộn</td>
                                    <td>5.0 cuộn</td>
                                    <td>5.0 cuộn</td>
                                    <td rowspan="7" class="align-middle">
                                        CHẠY MẪU THỬ R460
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
           
                           <!-- detail -->
                        </div>
                    </div>
                  
                </div>

            </div>
        </div>

        
    </div>
     
@endsection
@section('modal') 
  





<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_admin/admin_js/production_manager.js')}}" type="text/javascript "></script>
<script type="text/javascript">
    $(document).ready(function(){
        production_detail();
    })
</script>
@endsection