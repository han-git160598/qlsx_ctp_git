@extends('layouts.dashboard_admin')
@section('sidebar')
<div id="sidebar-left"> 
    <ul id="main-menu">
        <li class="item active"><a href="{{url('admin/customer_index')}}">Dasboard</a></li>
        <li class="item "><a href="{{ URL::to('customer-list-customer')}}">Khách hàng</a></li>
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
    <div id="content">
        <h1 class="heading">
            Carousel slider
        </h1>
        <span data-tag="a" type="add_module" class="get_modal t-green-main d-block t-right my-1">+ Thêm hình ảnh</span>
        <div class="box p-0">
            <style>
                .stt {
                    width: 10%;
                }
            </style>
            <table class="table">
                <thead style="background-color: #F6F6F6;">
                    <tr>
                        <th class="stt">STT</th>
                        <th>Hình ảnh</th>
                        <th colspan="2">Tiêu đề</th>
                        <!-- <th>Email</th> -->
                    </tr>
                </thead>
                <tbody id="list_slide">

                    {{-- <tr data-id-slide="1" type="edit_module" class="click_doubble get_modal">
                            <td class="stt">1</td>
                            <td class="thumb-nails"><img src="public_admin/images/slide-1.png" alt=""></td>
                            <td>Đồ nhựa gia dụng</td>
                            <td><span data-tag="a" type="delete_module"
                                    class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                        </tr>
                        <tr data-id-slide="2" type="edit_module" class="click_doubble get_modal">
                            <td class="stt">2</td>
                            <td class="thumb-nails"><img src="public_admin/images/slide-1.png" alt=""></td>
                            <td>Đồ nhựa gia dụng</td>
                            <td><span data-tag="a" type="delete_module"
                                    class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                        </tr>
                        <tr data-id-slide="3" type="edit_module" class="click_doubble get_modal">
                            <td class="stt">3</td>
                            <td class="thumb-nails"><img src="public_admin/images/slide-1.png" alt=""></td>
                            <td>Đồ nhựa gia dụng</td>
                            <td><span data-tag="a" type="delete_module"
                                    class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                        </tr> --}}
                </tbody>
            </table>
        </div>
        <div class="section list_slide">
            <div class="loader loader-1">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- sidebar-right fixed -->
    <div id="sidebar-right">
        <div class="box" style=" overflow: hidden;text-overflow: clip;">
            <div class="box-head">
                <h1 class="heading">Hoạt động gần đây</h1>
            </div>
            <div class="box-body" id="order_nearly" style=" overflow-y: scroll; height: 480px;">
                <div class="section order_nearly">
                        <div class="loader loader-1">
                            <div class="loader-outter"></div>
                            <div class="loader-inner"></div>
                        </div>
                    </div>
                {{-- <div class="mb-2">
                        <div class="body-justify justify-content-space-between py-2">
                            <h1 class="heading">Công ty Cổ Phần ABC</h1>
                            <p class="t-label">09:25 | 2021-05-05</p>
                        </div>
                        <div class="body-justify py-1">
                            <div class="body-title">
                                <p class="p">Đặt</p>
                            </div>
                            <div class="body-content pl-3 bg-F6 w-100" style="flex-direction: column;">
                                <p class="p">x100 thùng | Bao bì kem</p>
                                <p class="p">x200 cây | Ly nhựa nắp tim cứng 500ml</p>
                                <p class="p">x500 thùng | Túi nilon màu</p>
                            </div>
                        </div>
                    </div> --}}

            </div>
            <div class="t-center w-100 pt-5"
                style="height: 88px; position: absolute; bottom: 0; left: 0; background: linear-gradient(180deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 48.44%);">
                <span data-tag="a" class="t-green-main" id="read_more">Xem thêm</span>
            </div>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
@endsection

@section('modal')
<!-- modal create / edit -->
<div class="modal" id="add_module">
    <div class="modal-box w-40" style=" margin-top: 50px;">
        <div class="modal-title">
            <h4>Thêm Slide</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Tiêu đề</label>
                        <input type="text" name="slide_title" class="form-input" value="">
                    </div>
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Số thứ tự</label>
                        <input type="text" name="slide_order" class="form-input" value="">
                    </div>
                </div>
                <!-- upload file -->
                <div class="form-file" data-target="add_module" data-id="1">
                    <div class="form-file-box">
                        <input type="file" name="add_slide" id="add_slide" data-target="add_module" data-id="1"
                            class="form-file-input">
                        <span class="form-file-img" data-target="add_module" data-id="1"></span>

                        <span data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close"
                            data-target="add_module" data-id="1">
                            <img src="{{asset('public_admin/images/x_thumb_nail.png')}}" alt="">
                        </span>
                        <strong class="form-file-img-title" data-target="add_module" data-id="1">Tải logo của bạn lên
                            đây</strong>
                        <span class="form-file-view-img" data-target="add_module" data-id="1">
                            <img src="" alt="">
                        </span>
                    </div>
                </div>
            </form>
            <div class="item-content t-center mg-t-175rem " id="submit_add">
                <button class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="edit_module">
    <div class="modal-box w-40" style=" margin-top: 50px;">
        <div class="modal-title">
            <h4>Thay đổi hình</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="attach" class="form-label mb-3">Hình banner</label>
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Tiêu đề</label>
                        <input type="text" name="slide_title" class="form-input" value="">
                    </div>
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Số thứ tự</label>
                        <input type="text" name="slide_order" class="form-input" value="">
                    </div>
                </div>
                <!-- upload file -->
                <div class="form-file" data-target="edit_module" data-id="">
                    <div class="form-file-box">
                        <input type="file" name="edit_slide" data-target="edit_module" data-id="" name="attach"
                            id="attach" class="form-file-input">
                        <span class="form-file-img" data-target="edit_module" data-id=""></span>

                        <span data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close"
                            data-target="edit_module" data-id="">
                            <img src="{{asset('public_admin/images/x_thumb_nail.png')}}" alt="">
                        </span>
                        <strong class="form-file-img-title" data-target="edit_module" data-id="">Tải logo của bạn lên
                            đây</strong>
                        <span class="form-file-view-img" data-target="edit_module" data-id="">
                            <img src="" alt="">
                        </span>
                    </div>
                </div>
            </form>
            <div class="item-content t-center mg-t-175rem" id="submit_edit" data-id="">
                <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
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
                <img src="{{asset('public_admin/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <div class="mg-t-2rem t-center">
                <span class="d-inline-block tick-success "><img src="{{asset('public_admin/images/warning-del.png')}} "
                        alt=" "></span>
                <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
            </div>
            <div class="t-center mg-t-175rem" id="submit_delete" data-id="">
                <button class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('ajax')
{{-- ajax --}}
<script type="text/javascript ">
    // loader
    // get list slide
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'slide_manager',type_manager:'list_slide' },
            dataType: 'json',
            headers: headers,
            success: function(response) {
                    if (response.success == 'false') {
                        alert(response.message)
                    } else {
                        var output=``;
                        var count=0;
                        response.data.forEach(function(item) {
                            count +=1;
                            output  +=`
                            <tr data-id-slide="${item.id}" type="edit_module" class="click_doubble get_modal">
                                <td class="stt">${count}</td>
                                <td class="thumb-nails"><img src="${urlimg + item.slide_img}" alt=""></td>
                                <td id="slide_title">${item.slide_title}</td>
                                <td><span data-tag="a" type="delete_module" class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                            </tr>
                                    `;

                        });
                        $('#list_slide').html(output);
                        get_modal_edit_item('slide');
                        get_modal_delete_item('slide');
                        $('.section.list_slide').hide();
                    }
            }
        });
    // get list order log
        var page = 1;
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'get_list_order_log', page:page},
            dataType: 'json',
            headers: headers,
            success: function(response) {
                    if (response.success == 'false') {
                        alert(response.message)
                    } else {
                        var output=``;
                        response.data.forEach(function(item) {
                            // console.log(item.order_item_product);
                            output  +=`
                                        <div class="mb-2" data-id-oder="${item.id}">
                                            <div class="body-justify justify-content-space-between py-2">
                                                <h1 class="heading">${item.customer_company}</h1>
                                                <p class="t-label">${item.process_date}</p>
                                            </div>
                                        `
                            item.order_item_product.forEach(sub_item => {
                                output  +=
                                        `
                                        <div class="body-justify py-1" data-id-product="${sub_item.id_product}">
                                            <div class="body-title">
                                                <p class="p">Đặt</p>
                                            </div>
                                            <div class="body-content pl-3 bg-F6 w-100" style="flex-direction: column;">
                                                <p class="p">${sub_item.product_quantity_packet} ${sub_item.product_packet_title} | ${sub_item.product_name}</p>
                                            </div>
                                        </div>
                                        `
                            });

                            output  += `

                                        </div>
                                            `;

                        });
                        $('#order_nearly').html(output);
                    }
            }
        });

        $('#read_more').click(function () {
            page++;
            $.ajax({
                url: urlapi,
                method: 'POST',
                data: { detect: 'get_list_order_log', page:page},
                dataType: 'json',
                headers: headers,
                success: function(response) {
                        if (response.success == 'false') {
                            alert(response.message)
                        } else {
                            var output=``;
                            response.data.forEach(function(item) {
                                // console.log(item.order_item_product);
                                output  +=`
                                            <div class="mb-2" data-id-oder="${item.id}">
                                                <div class="body-justify justify-content-space-between py-2">
                                                    <h1 class="heading">${item.customer_company}</h1>
                                                    <p class="t-label">${item.process_date}</p>
                                                </div>
                                            `
                                item.order_item_product.forEach(sub_item => {
                                    output  +=
                                            `
                                            <div class="body-justify py-1" data-id-product="${sub_item.id_product}">
                                                <div class="body-title">
                                                    <p class="p">Đặt</p>
                                                </div>
                                                <div class="body-content pl-3 bg-F6 w-100" style="flex-direction: column;">
                                                    <p class="p">${sub_item.product_quantity_packet} ${sub_item.product_packet_title} | ${sub_item.product_name}</p>
                                                </div>
                                            </div>
                                            `
                                });

                                output  += `

                                            </div>
                                                `;

                            });
                            $('#order_nearly').append(output);
                        }
                    }
                });
        });

        // CRUD Slider
        $(document).ready(function() {
            // create
            $('.modal#add_module #submit_add button').click(function () {

                // get slide_title
                var slide_title = $('.modal#add_module .modal-content input[name="slide_title"]').val();
                var slide_order = Number($('.modal#add_module .modal-content input[name="slide_order"]').val());
                // var slide_order = 0;
                console.log(slide_title);
                console.log(slide_order);

                if(Object.is(NaN, slide_order)){
                    alert("Số thứ tự phải là chữ số");
                    return false;
                }
                // else{
                //     slide_order = slide_order_number
                // }

                var file_data = $('input[type="file"][name="add_slide"]').prop('files')[0];
                console.log(file_data);
                if(typeof(file_data) == 'undefined'){
                    file_data = "";
                };

                var opj = JSON.parse(localStorage.getItem("account_customer"));
                var id_admin = opj.id;
                console.log(id_admin);

                var form_data = new FormData();
                form_data.append('detect', 'slide_manager');
                form_data.append('type_manager', 'create_slide');
                form_data.append('slide_title', slide_title);
                form_data.append('slide_img', file_data);
                form_data.append('slide_order', slide_order);
                form_data.append('id_admin', id_admin);
                console.log(form_data);

                $.ajax({
                    url: urlapi,
                    method: 'POST',
                    data: form_data,
                    dataType: 'JSON',
                    headers: headers,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success == 'false') {
                            alert(response.message);
                        } else {
                            alert(response.message);
                            window.location.href = urlserver + '/admin/customer_index';
                        }
                    }
                });

            });
            // update
            $('.modal#edit_module #submit_edit button').click(function () {
                    // get slide_title
                    var slide_title = $('.modal#edit_module .modal-content input[name="slide_title"]').val();
                    var slide_order = Number($('.modal#edit_module .modal-content input[name="slide_order"]').val());
                    var id_slide = Number($('.modal#edit_module #submit_edit').attr('data-id'));
                    // var slide_order = 0;
                    console.log(slide_title);
                    console.log(slide_order);

                    if(Object.is(NaN, slide_order)){
                        alert("Số thứ tự phải là chữ số");
                        return false;
                    }
                    // else{
                    //     slide_order = slide_order_number
                    // }

                    var file_data = $('input[type="file"][name="edit_slide"]').prop('files')[0];
                    console.log(file_data);
                    if(typeof(file_data) == 'undefined'){
                        file_data = "";
                    };

                    var opj = JSON.parse(localStorage.getItem("account_customer"));
                    var id_admin = opj.id;
                    console.log(id_admin);

                    var form_data = new FormData();
                    form_data.append('detect', 'slide_manager');
                    form_data.append('type_manager', 'update_slide');
                    form_data.append('slide_title', slide_title);
                    form_data.append('slide_img', file_data);
                    form_data.append('slide_order', slide_order);
                    form_data.append('id_admin', id_admin);
                    form_data.append('id_slide', id_slide);
                    console.log(form_data);

                    $.ajax({
                        url: urlapi,
                        method: 'POST',
                        data: form_data,
                        dataType: 'JSON',
                        headers: headers,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response.success == 'false') {
                                alert(response.message);
                            } else {
                                alert(response.message);
                                window.location.href = urlserver + '/admin/customer_index';
                            }
                        }
                    });

                    });
            // delete
            $('.modal#delete_module #submit_delete button').click(function() {
                var id = $('.modal#delete_module #submit_delete').attr('data-id');
                $.ajax({
                    url: urlapi,
                    method: 'POST',
                    data: { detect: 'slide_manager', type_manager: 'delete_slide', id_slide: id },
                    dataType: 'json',
                    headers: headers,
                    success: function(response) {
                        if (response.success == 'false') {
                            alert(response.message)
                        } else {
                            alert('Xoá slide thành công');
                            window.location.href = urlserver + '/admin/customer_index';
                        }
                    }
                });
            });
        });



</script>
@endsection
