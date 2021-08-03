@extends('home_page.admin.dashboard_admin')
@section('js')
    <script src="{{asset('public_home/admin/admin_home.js')}}" type="text/javascript "></script>
@endsection
@section('admin_content')
 
 <!-- wp content -->
 <div id="wp-content">
            <!-- content -->
            <div id="content">
                <h1 class="heading">
                    Carousel slider
                    <input hidden type="text" value="1" id="id_account">
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
                        <tbody id="list_home">
                            <!-- <tr data-id-slide="1" type="edit_module" class="click_doubble get_modal">
                                <td class="stt">1</td>
                                <td class="thumb-nails"><img src="{{ asset('ctp_admin_web/images/slide-1.png')}}" alt=""></td>
                                <td>Đồ nhựa gia dụng</td>
                                <td><span data-tag="a" type="delete_module" class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                            </tr>
                             -->
                        </tbody>
                    </table>
                </div>


            </div>
            <!-- sidebar-right fixed -->
            <div id="sidebar-right">
                <div class="box">
                    <div class="box-head">
                        <h1 class="heading">Public</h1>
                    </div>
                    <div class="box-body">
                        <!-- <div class="body-justify justify-content-space-between">
                            <h1 class="heading">Công ty Cổ Phần ABC</h1>
                            <p class="t-label">09:25 | 2021-05-05</p>
                        </div> -->
                        <div class="body-justify">
                            <div class="body-title w-30">
                                <p class="p">Trạng thái:</p>
                                <p class="p">Lịch sử:</p>
                                <p class="p">Ngày đăng:</p>
                            </div>
                            <div class="body-content" style="flex-direction: column;">
                                <p class="p">Đã đăng</p>
                                <p class="p">2 lần chỉnh sửa</p>
                                <p class="p">2021-05-06 lúc 10:45</p>
                            </div>
                        </div>
                    </div>
                    <div class="t-center w-100" style="position: absolute; bottom: 2.5rem;">
                        <button class="btn btn-green">Cập nhật</button>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
    <!-- modal create / edit -->
    <div class="modal" id="add_module">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thay đổi hình</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <label for="attach" class="form-label mb-3">Hình banner</label>
                <div class="form-edit">
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Tiêu đề</label>
                        <input type="text" id="home_title" class="form-input" value="">
                    </div>
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Số thứ tự</label>
                        <input type="text" id="home_priority" class="form-input" value="">
                    </div>
                </div>
                <!-- upload file -->
                <div class="form-file" data-target="add_module" data-id="1">
                    <div class="form-file-box">
                        <input type="file" name="attach" id="attach" data-target="add_module" data-id="1" class="form-file-input">
                        <span class="form-file-img" data-target="add_module" data-id="1"></span>

                        <span data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close" data-target="add_module" data-id="1">
                            <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"  alt="">
                        </span>
                        <strong class="form-file-img-title" data-target="add_module" data-id="1">Tải logo của bạn lên đây</strong>
                        <span class="form-file-view-img" data-target="add_module" data-id="1">
                            <img src="" alt="">
                        </span>
                    </div>
                </div>
                <div class="item-content t-center mg-t-175rem ">
                    <button id="add_file" onclick="create_slider()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_module_home">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Thay đổi hình</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <label for="attach" class="form-label mb-3">Hình banner</label>

                <div class="form-edit">
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Tiêu đề</label>
                        <input type="text" id="home_title_detail" class="form-input" value="Đồ nhựa gia dụng">
                    </div>
                    <div class="form-edit-row">
                        <label for="title" class="form-lable">Số thứ tự</label>
                        <input type="text" id="home_priority_detail" class="form-input" value="1">
                    </div>
                </div>
                <!-- upload file -->
                <div class="form-file" data-target="edit_module" data-id="1">
                    <div class="form-file-box">
                        <input type="file" data-target="edit_module" data-id="1" name="attach" id="home_img_detail" class="form-file-input">
                        <span class="form-file-img" data-target="edit_module" data-id="1"></span>

                        <span data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close" data-target="edit_module" data-id="1">
                            <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}" alt="">
                        </span>
                        <strong class="form-file-img-title" data-target="edit_module" data-id="1">Tải logo của bạn lên đây</strong>
                        <span class="form-file-view-img" data-target="edit_module" data-id="1">
                            <img src="" alt="">
                        </span>
                    </div>
                </div>

                <div class="item-content t-center mg-t-175rem " id="btn_edit_home">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete file attach -->
    <div class="modal" id="delete_module_home">
        <div class="modal-box w-40">
            <div class="modal-title">
                <h4>Xóa thông tin</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <div class="mg-t-2rem t-center">
                    <span class="d-inline-block tick-success "><img src="{{asset('ctp_admin_web/images/warning-del.png')}} " alt=" "></span>
                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
                </div>
                <div class="t-center mg-t-175rem" id="btn_delete_home">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    @endsection