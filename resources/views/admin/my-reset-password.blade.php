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
            <div class="box p-5 t-center">
                <div class="form-login d-inline-block w-60 p-5">
                    <div class="form-box">
                        <input type="password" name="pw-old" id="pw-old" placeholder="Nhập mật khẩu mới" class="form-input">
                        <i onclick="customer_hidden_password('pw-old')" class="far fa-eye-slash form-icon"></i>
                    </div>
                    <div class="form-box">
                        <input type="password" name="pw-new" id="pw-new" placeholder="Xác nhận mật khẩu" class="form-input">
                        <i onclick="customer_hidden_password('pw-new')" class="far fa-eye-slash form-icon"></i>
                    </div>
                    <div class="form-box note-box">
                        <small class="note" id="lowercase">Ít nhất một kí tự viết thường</small>
                        <small class="note" id="uppercase">Ít nhất một kí tự viết hoa</small>
                        <small class="note" id="length">8-16 kí tự</small>
                    </div>
                    <div class="form-box t-right">
                        <button onclick="reset_password()" class="btn btn-green t-right">Xác nhận</button>
                    </div>
                </div>
            </div>
            <a href="customer_index.html" class="t-green-main"><i class="fas fa-chevron-left"></i> Quay lại</a>
        </div>

    </div>

     <script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script type="text/javascript">
        
    function customer_hidden_password(id)
    {
        var pwd = document.getElementById(id);
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
    }

    $("#pw-old").keyup(function() {
        /*length 5 characters or more*/
        if(this.value.length < 8 || this.value.indexOf(' ') >= 0) {
            document.getElementById("length").style.color = "red"
        }else{
            document.getElementById("length").style.color = "green"
        }
        /*contains lowercase characters*/
        if(this.value.match(/[a-z]+/)) {
            document.getElementById("lowercase").style.color = "green"
        }else{
            document.getElementById("lowercase").style.color = "red"
        }
        /*contains digits*/
        // if(this.value.match(/[0-9]+/)) {
        //     strength++;
        // }
        /*contains uppercase characters*/
        if(this.value.match(/[A-Z]+/)) {
            document.getElementById("uppercase").style.color = "green"
        }else{
            document.getElementById("uppercase").style.color = "red"
        }

    });
    $('#pw-new').keyup(function(){
        if($('#pw-new').val() == $('#pw-old').val())
        {
            document.getElementById("pw-new").style.backgroundColor = "White"
        }else{
            document.getElementById("pw-new").style.backgroundColor = "red"
        }
    });

    function reset_password()
    {
        var length = document.getElementById("length").style.color;
        var lowercase = document.getElementById("lowercase").style.color;
        var uppercase = document.getElementById("uppercase").style.color;
        var pw_unique = document.getElementById("pw-new").style.backgroundColor;
        if(length == "red" || lowercase == "red" || uppercase == "red" || $('#pw-new').val() != $('#pw-old').val() )
        {   
            alert('Mật khẩu không đúng định dạng hoặc không trùng khớp')
        }else{
            let admin = JSON.parse(localStorage.getItem('account_customer'));
            if(admin == null || admin == '')
            {
                alert('Lỗi dữ liệu, vui lòng trở lại danh sách và thực hiện lại')
            }else{
                $.ajax({
                    url: urlapi,
                    method: 'POST',
                    data: { detect: 'account_manager',type_manager:'resset_password_account',
                     id_user: admin.id,password_reset:$('#pw-old').val()
                    },
                    dataType: 'json',
                    headers: headers,
                    success: function(response) {
                        alert(response.message);
                    }
                });
            }
        }
    }


</script>
@endsection


  