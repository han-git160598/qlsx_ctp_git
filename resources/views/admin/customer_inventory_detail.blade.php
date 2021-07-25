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
        <li class="item"><a href="{{url('admin/customer_list_account')}}">Tài khoản</a></li>
        <li class="item "><a href="{{URL::To('unit-setting')}}">Cài đặt</a></li>
    </ul>
</div>
@endsection

@section('content')
<div id="wp-content">
    <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading mb-4">
            <a href="{{url('admin/customer_list_inventory')}}" class="mr-3"><i class="fas fa-chevron-left"></i></a> Chi
            tiết lệnh kiểm kê
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
            <table class="table table-bordered">
                <thead style="background-color: #FFF6E5;">
                    <tr>
                        <th id="code">Mã sản phẩm
                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                        </th>
                        <th>Số lượng hiện tại
                            <span class="sort">
                                <i class="fas fa-chevron-up arrow"></i>
                                <i class="fas fa-chevron-down arrow"></i>
                            </span>
                        </th>
                        <th>Số lượng sau kiểm kê
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
                <tbody id="inventory_detail">
                    {{-- <tr data-id-customer="1" type="edit_address_send" class="click_doubble get_modal">
                        <td>W-R365</td>
                        <td>176.892</td>
                        <td>175.892</td>
                        <td>Cái</td>
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
@endsection

@section('modal')
@endsection

@section('ajax')
<script type="text/javascript">
    $(document).ready(function () {
        var id_inventory = localStorage.getItem('id_inventory');
        var item_type = localStorage.getItem('item_type');
        call_inventory_detail(item_type,id_inventory);
    });

    function call_inventory_detail(item_type,id_inventory) {
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'inventory_manager', type_manager: 'list_inventory', item_type: item_type,id_inventory:id_inventory },
            dataType: 'json',
            headers: headers,
            success: function(response) {
                if (response.success == 'false') {
                    alert(response.message)
                } else {
                    $('.section.list_slide').hide();
                    var output = "";
                    response.data.forEach(item => {
                        item.list_item.forEach(sub_item => {

                            if(item_type == 'product'){
                                $('#code').text("Mã sản phẩm");
                                output += `
                                <tr>
                                    <td>${sub_item.product_code}</td>
                                    <td>${sub_item.current_quantity}</td>
                                    <td>${sub_item.inventory_quantity}</td>
                                    <td>${sub_item.unit_title}</td>
                                </tr>
                            `;
                            }else{
                                $('#code').text("Mã NVl");
                                output += `
                                <tr>
                                    <td>${sub_item.material_code}</td>
                                    <td>${sub_item.current_quantity}</td>
                                    <td>${sub_item.inventory_quantity}</td>
                                    <td>${sub_item.unit_title}</td>
                                </tr>
                                `;
                            }

                        })

                    });

                    $('#inventory_detail').html(output);
                }
            }
        });
    }
</script>
@endsection
