@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item"><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item"><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
        <li class="item"><a href="{{url('admin/customer_list_order')}}">Đơn hàng</a></li>
        <li class="item"><a href="{{ URL::to('list-product-storage')}}">Kho hàng</a></li>
        <li class="item"><a href="{{url('admin/customer_list_inventory')}}">Kiểm kê kho</a></li>

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
                Tài khoản của tôi
            </h1>
            <div class="box p-5">
                <div class="form-info p-5">

                    <div class="form-info-content">
                        <div class="form-info-right w-100">
                            <div class="form-info-row align-item-center">
                                <label for="title" class="form-info-lable">Tên đăng nhập</label>
                                <div class="form-info-input-content">
                                    <input type="text" readonly id="admin_account">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Số điện thoại</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="admin_phone" readonly >
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Họ và tên</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="admin_name">
                                </div>
                            </div>
                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label class="fw-400 lh-12rem">Email</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="admin_email">
                                </div>
                            </div>

                            <div class="form-info-row align-item-center">
                                <div class="form-info-lable">
                                    <label for="role" class="fw-400 lh-12rem">Vai trò</label>
                                </div>
                                <div class="form-info-input-content">
                                    <input type="text" id="admin_role" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-content t-right mg-t-175rem ">
                        <button onclick="update_info()" class="btn-submit w-20 d-inline-block fz-1rem">Cập nhật</button>
                    </div>
                </div>

            </div>
            <!-- <a href="customer_index.html" class="t-green-main"><i class="fas fa-chevron-left"></i> Quay lại</a> -->

        </div>
    </div>

   <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>


<script type="text/javascript">
 var admin = JSON.parse(localStorage.getItem('account_customer'))
$(document).ready(function() {
    $('#admin_phone').val(admin.phone_number)
    $('#admin_name').val(admin.full_name)
    $('#admin_email').val(admin.email)
    $('#admin_account').val(admin.username)
    $('#admin_role').val(admin.type_description)
})

function update_info()
{
    admin.id
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'account_manager', type_manager:'update_account'
        ,id_user:admin.id
        ,full_name:$('#admin_name').val()
        ,email:$('#admin_email').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                alert(response.message);
                admin.full_name =$('#admin_name').val()
                admin.email = $('#admin_email').val()
                localStorage.setItem('account_customer',JSON.stringify(admin))
            }else{
               alert(response.message); 
            }
            
        }
    })
}

</script>
@endsection
