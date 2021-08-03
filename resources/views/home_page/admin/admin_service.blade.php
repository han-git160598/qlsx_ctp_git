@extends('home_page.admin.dashboard_admin')
@section('js')
    <script src="{{asset('public_home/admin/admin_service.js')}}" type="text/javascript "></script>
@endsection

@section('admin_content')

        <!-- wp content -->
        <div id="wp-content">
            <!-- content -->
            <div id="content" class="w-100" style="float: none;">
                <h1 class="heading">
                    Dịch vụ
                    <input type="text" hidden id="id_account" value="1">
                </h1>
                <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right my-1">+ Thêm hình ảnh</span>
                <div class="box">
                    <!-- <div class="box-head" style="border-bottom:none">
                        <h1 class="heading">Section 1</h1>
                    </div> -->
                    <div class="box-body py-0">
                        <div class="body-title">
                            <div class="form-edit w-40 p-0">
                                <div class="form-edit-row">
                                    <label class="form-lable">Tiêu đề</label>
                                    <div>
                                        <input type="text" class="form-input w-60" id="section1_service_title_module" name="address_name" readonly data-id="address_name" value="DỊCH VỤ1">
                                        <button class="btn btn-green d-inline-block w-30 ml-3">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-content my-3" id="list_service_service">
                            <!-- module -->
                            <!-- <div class="wp-module">
                                <div class="module">
                                    <div class="module-title">
                                        <div class="heading">Module 1</div>
                                        <span data-tag="a" type="delete_module" class="get_modal icon-close"><img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt=""></span>
                                    </div>
                                    <div class="module-center  p-3">
                                        <span class="item"><img src="{{asset('ctp_admin_web/images/icon-badge-check.png')}}" alt=""></span>
                                    </div>
                                    <div class="form-edit p-0">
                                        <div class="form-edit-row my-3">
                                            <label class="form-lable">Tiêu đề</label>
                                            <input type="text" class="form-input" name="title" data-id="title_1" value="CÁC SẢN PHẨM TIÊU BIỂU" readonly>
                                        </div>
                                        <div class="form-edit-row my-3">
                                            <label class="form-lable">Content</label>
                                            <textarea readonly type="text" class="form-input" cols="30" rows="10" name="content" data-id="content_1">Sử dụng mực in không chì từ Nhật bản. Sử dụng 100% nhựa nguyên sinh. Tất cả các sản phẩm đều được kiểm nghiệm an toàn vệ sinh thực phẩm.</textarea>
                                        </div>
                                    </div>
                                    <div class="t-right">
                                        <span data-tag="a" type="edit_module" class="get_modal btn btn-green">
                                            Cập nhật</span>
                                    </div>
                                </div>
                            </div> -->
                            <!-- module -->
                            <!-- module -->
                            <div class="wp-module">
                                <span data-tag="a" type="add_module" class="get_modal module-empty"></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    <!-- modal create / edit -->
    <div class="modal" id="add_service_service">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Module</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <!-- <label for="attach" class="form-label mb-3">Hình banner</label> -->
                <div class="form-file" data-target="add_module" data-id="0">
                    <div class="form-file-box">
                        <input data-target="add_module" data-id="0" type="file" name="attach" id="img_service_service" class="form-file-input">
                        <span data-target="add_module" data-id="0" class="form-file-img"></span>
                        
                        <span data-target="add_module" data-id="0" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close">
                            <img src=" {{asset('ctp_admin_web/images/x_thumb_nail.png')}}" alt="">
                        </span>
                        <strong data-target="add_module" data-id="0" class="form-file-img-title">Tải logo của bạn lên đây</strong>
                        <span data-target="add_module" data-id="0" class="form-file-view-img">
                            <img src="" alt="">
                        </span>
                    </div>
                </div>
                <div class="form-edit p-0">
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Tiêu đề</label>
                        <input type="text" class="form-input" id="service_title" name="title" data-id="title_1"  >
                    </div>
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Content</label>
                        <textarea  type="text" id="service_content" class="form-input" cols="30" rows="10" name="content" data-id="content_1"></textarea>
                    </div>
                </div>
                <div class="item-content t-center mg-t-175rem ">
                    <button id="add_file" onclick="create_service_service()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_service_service">
        <div class="modal-box w-40" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Module</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <!-- <label for="attach" class="form-label mb-3">Hình banner</label> -->
                <div class="form-file" data-target="process_2" data-id="1">
                    <div class="form-file-box">
                        <input data-target="process_2" data-id="1" type="file" name="attach" id="img_service_detail" class="form-file-input d-none">
                        <span data-target="process_2" data-id="1" class="form-file-img d-none"></span>

                        <span data-target="process_2" data-id="1" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close d-block">
                                <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"   alt="">
                        </span>
                        <strong data-target="process_2" data-id="1" class="form-file-img-title d-none">Tải logo của bạn lên đây</strong>
                        <span data-target="process_2" data-id="1" class="form-file-view-img d-block">
                                <img id="img_service_detail1" src="" alt="">
                        </span>
                    </div>
                </div>
                <div class="form-edit p-0">
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Tiêu đề</label>
                        <input type="text" class="form-input" name="title" data-id="title_1" id="title_service_service_detail">
                    </div>
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Content</label>
                        <textarea  type="text" class="form-input" id="content_service_service_detail" cols="30" rows="10" name="content" data-id="content_1"></textarea>
                    </div>
                </div>
                <div class="item-content t-center mg-t-175rem " id="update_service_service">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete file attach -->
    <div class="modal" id="delete_service_service">
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
                <div class="t-center mg-t-175rem" id="btn_delete_service">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>

@endsection