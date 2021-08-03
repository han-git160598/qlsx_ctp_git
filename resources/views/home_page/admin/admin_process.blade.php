@extends('home_page.admin.dashboard_admin')
@section('js')
    <script src="{{asset('public_home/admin/admin_process.js')}}" type="text/javascript "></script>
@endsection

@section('admin_content')
<!-- wp content -->
<div id="wp-content">
            <!-- content -->
            <div id="content" class="w-100" style="float: none;">
                <h1 class="heading">
                    Quy trình
                    <input hidden type="text" value="1" id="id_account">
                </h1>
                <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right my-1">+ Thêm hình ảnh</span>
                <div class="box">
                    <div class="box-head" style="border-bottom:none">
                        <h1 class="heading">Section 1</h1>
                    </div>
                    <div class="box-body py-0">
                        <div class="body-title">
                            <div class="form-edit w-40 p-0">
                                <div class="form-edit-row">
                                    <label class="form-lable">Tiêu đề</label>
                                    <div>
                                        <input type="text" id="section1_process_title_module" readonly class="form-input w-100" name="address_name" data-id="address_name" value="CÁC SẢN PHẨM TIÊU BIỂU">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-content my-3">
                            <!-- module -->
                            <div class="w-40">
                                <div class="form-file" data-target="process_1" data-id="1">
                                    <label class="form-lable">Upload hình</label>
                                    <div class="form-file-box mt-1">

                                        <input type="file" name="attach" id="img_process_module" data-target="process_1" data-id="1" class="form-file-input">
                                        <!-- onchange="readURL(this);" -->
                                        <span class="form-file-img" data-target="process_1" data-id="1"></span>

                                        <span data-tag="a" type="cancel_thumb_nails" data-target="process_1" data-id="1" class="form-file-view-img-close">
                                            <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"   alt="">
                                        </span>
                                        <strong class="form-file-img-title" data-target="process_1" data-id="1">Tải logo của bạn lên đây</strong>
                                        <span class="form-file-view-img" data-target="process_1" data-id="1">
                                            <img src="" id="img_process_module_detail" alt="">
                                        </span>
                                    </div>
                                </div>
                                <div class="t-right" id="section1_moudule_title">
                                    <button class="btn btn-green d-inline-block ml-3">Cập nhật</button>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="box">
                    <div class="box-head" style="border-bottom:none">
                        <h1 class="heading">Section 2</h1>
                    </div>
                    <div class="box-body py-0">
                        <div class="body-title">
                            <div class="form-edit w-40 p-0">
                                <div class="form-edit-row">
                                    <label class="form-lable">Tiêu đề</label>
                                    <div id="section1_module_title">
                                        <input type="text" class="form-input w-60" name="address_name" data-id="address_name" readonly id="section2_process_title_module" value="CÁC SẢN PHẨM TIÊU BIỂU">
                                        <button class="btn btn-green d-inline-block w-30 ml-3">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body-content my-3" id="list_process_process">
                            <!-- module -->
                            <!-- <div class="wp-module">
                                <div class="module">
                                    <div class="module-title">
                                        <div class="heading">Module 1</div>
                                        <span data-tag="a" type="delete_module" class="get_modal icon-close"><img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt=""></span>
                                    </div>
                                    <div class="form-edit p-0">
                                        <div class="form-edit-row my-3">
                                            <label class="form-lable">Tiêu đề</label>
                                            <input type="text" class="form-input" name="title" data-id="title_1" value="CÁC SẢN PHẨM TIÊU BIỂU" readonly>
                                        </div>
                                        <div class="form-file" data-target="process_2" data-id="1">
                                            <div class="form-file-box">
                                                <span data-target="process_2" data-id="1" class="form-file-view-img d-block">
                                                    <img src="{{asset('ctp_admin_web/images/product_1.png')}}" alt="">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="t-right">
                                        <span data-tag="a" type="edit_module" class="get_modal btn btn-green">
                                            Cập nhật</span>
                                    </div>
                                </div>
                            </div> -->
                     

                            <!-- module -->
                            <div class="wp-module">
                                <span data-tag="a" type="add_module" class="get_modal module-empty"></span>
                            </div>
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- modal create / edit -->
    <div class="modal" id="add_process_process"> 
        <div class="modal-box w-35" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Module</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <!-- <label for="attach" class="form-label mb-3">Hình banner</label> -->
                <div class="form-edit p-0">
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Tiêu đề</label>
                        <input type="text" class="form-input" id="process_title" name="title" data-id="title_1">
                    </div>
                    <div class="form-file" data-target="process_2" data-id="0">
                        <div class="form-file-box">
                            <input data-target="process_2" data-id="0" type="file" name="attach" id="img_process_process" class="form-file-input">
                            <span data-target="process_2" data-id="0" class="form-file-img"></span>

                            <span data-target="process_2" data-id="0" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close">
                                <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"  alt="">
                            </span>
                            <strong data-target="process_2" data-id="0" class="form-file-img-title">Tải logo của bạn lên đây</strong>
                            <span data-target="process_2" data-id="0" class="form-file-view-img">
                                <img src="{{asset('ctp_admin_web/images/product_1.png')}}" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="item-content t-center mg-t-175rem ">
                    <button id="add_file" onclick="create_process_process()" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="edit_process_process">
        <div class="modal-box w-35" style=" margin-top: 50px;">
            <div class="modal-title">
                <h4>Module</h4>
                <span class="icon" data-tag="a">
                    <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
                </span>
            </div>
            <div class="modal-content">
                <!-- <label for="attach" class="form-label mb-3">Hình banner</label> -->
                <div class="form-edit p-0">
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Tiêu đề</label>
                        <input type="text" class="form-input" id="title_process_process_detail" name="title" data-id="title_1" value="CÁC SẢN PHẨM TIÊU BIỂU">
                    </div>
                    <div class="form-file" data-target="process_2" data-id="1">
                        <div class="form-file-box">
                            <input data-target="process_2" data-id="1" type="file" name="attach" id="img_process_process_edit" class="form-file-input d-none">
                            <span data-target="process_2" data-id="1" class="form-file-img d-none"></span>

                            <span data-target="process_2" data-id="1" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close d-block">
                                <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"  alt="">
                            </span>
                            <strong data-target="process_2" data-id="1" class="form-file-img-title d-none">Tải logo của bạn lên đây</strong>
                            <span data-target="process_2" data-id="1" class="form-file-view-img d-block">
                                <img src="{{asset('ctp_admin_web/images/product_1.png')}}" id="img_process_process_detail1" alt="">
                            </span> 
                        </div>
                    </div>
                </div>
                <div class="item-content t-center mg-t-175rem " id="update_process_process">
                    <button id="add_file" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>


    <!-- modal delete file attach -->
    <div class="modal" id="delete_process_process">
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
                <div class="t-center mg-t-175rem" id="btn_delete_process">
                    <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                </div>
            </div>
        </div>
    </div>
@endsection