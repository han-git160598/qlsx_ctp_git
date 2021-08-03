@extends('home_page.admin.dashboard_admin')
@section('js')
    <script src="{{asset('public_home/admin/admin_about.js')}}" type="text/javascript "></script>
@endsection
@section('admin_content') 

<div id="wp-content">
    <!-- content -->
    <div id="content" class="w-100" style="float: none;">
        <h1 class="heading">
            Về chúng tôi
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
                            <div id="section1">
                                <input type="text" class="form-input w-60" id="module_title" name="address_name" data-id="address_name" value="CÁC SẢN PHẨM TIÊU BIỂU">
                                <button class="btn btn-green d-inline-block w-30 ml-3">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-content my-3" id="list_about_about">
                    <!-- module -->

                    <!-- module -->

                    <!-- module -->

                    <!-- module -->
                    <div class="wp-module">
                        <span data-tag="a" type="add_module" class="get_modal module-empty">
                    </span>
                    </div>
                </div>

            </div>
        </div>
        <div class="box">
            <div id="btn_section2" class="box-head d-flex justify-content-space-between" style="border-bottom:none">
                <h1 class="heading">Section 2</h1>
                <button class="btn btn-green">Cập nhật</button>
            </div>
            <div class="box-body py-0">
                <div class="body-title">
                    <div class="form-edit w-40 p-0">
                        <div class="form-edit-row">
                            <label class="form-lable">Tiêu đề</label>
                            <div id="section2_title">
                                <input type="text" class="form-input w-60" id="module_title2" name="address_name" data-id="address_name" value="CÁC SẢN PHẨM TIÊU BIỂU">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-content my-3" id="module_content">
                    <textarea name="description" id="editor1" rows="10" cols="80"></textarea>

                </div>

            </div>
        </div>
    </div>

</div>

<div class="modal" id="add_about_about">
    <div class="modal-box w-40" style=" margin-top: 50px;">
        <div class="modal-title">
            <h4>Module</h4>
            <span class="icon" data-tag="a">
            <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
        </span>
        </div>
        <div class="modal-content">
            <!-- <label for="attach" class="form-label mb-3">Hình banner</label> -->
            <form enctype="multipart/form-data">
                <div class="form-file" data-target="add_module" data-id="0">
                    <div class="form-file-box">
                        <input data-target="add_module" data-id="0" type="file" name="img_about_about" id="img_about_about" class="form-file-input">
                        <span data-target="add_module" data-id="0" class="form-file-img"></span>

                        <span data-target="add_module" data-id="0" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close">
                    <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}" alt="">
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
                        <input type="text" class="form-input" name="title" id="title_about_about" data-id="title_1">
                    </div>
                    <div class="form-edit-row my-3">
                        <label class="form-lable">Content</label>
                        <textarea type="text" class="form-input" id="content_about_about" cols="30" rows="10" name="content" data-id="content_1"></textarea>
                    </div>
                </div>
            </form>
            <div class="item-content t-center mg-t-175rem ">
                <button id="add_file" onclick="create_about_about()" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="edit_about_about">
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
                    <input data-target="process_2" data-id="1" type="file" name="attach" id="img_about_about_detail" class="form-file-input d-none">
                    <span data-target="process_2" data-id="1" class="form-file-img d-none"></span>

                    <span data-target="process_2" data-id="1" data-tag="a" type="cancel_thumb_nails" class="form-file-view-img-close d-block">
                            <img src="{{asset('ctp_admin_web/images/x_thumb_nail.png')}}"   alt="">
                        </span>
                    <strong data-target="process_2" data-id="1" class="form-file-img-title d-none">Tải logo của bạn lên đây</strong>
                    <span data-target="process_2" data-id="1" class="form-file-view-img d-block">
                            <img id="img_about_about_detail1" src="" alt="">
                        </span>
                </div>
            </div>
            <div class="form-edit p-0">
                <div class="form-edit-row my-3">
                    <label class="form-lable">Tiêu đề</label>
                    <input type="text" class="form-input" id="title_about_about_detail" name="title" data-id="title_1">
                </div>
                <div class="form-edit-row my-3">
                    <label class="form-lable">Content</label>
                    <textarea type="text" id="content_about_about_detail" class="form-input" cols="30" rows="10" name="content" data-id="content_1">Sử dụng mực in không chì từ Nhật bản. Sử dụng 100% nhựa nguyên sinh. Tất cả các sản phẩm đều được kiểm nghiệm an toàn vệ sinh thực phẩm.</textarea>
                </div>
            </div>
            <div class="item-content t-center mg-t-175rem " id="update_about_about">
                <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>

        </div>
    </div>
</div>

<!-- modal delete file attach -->
<div class="modal" id="delete_about_about">
    <div class="modal-box w-40">
        <div class="modal-title">
            <h4>Xóa thông tin</h4>
            <span class="icon" data-tag="a">
                <img src="{{asset('ctp_admin_web/images/x-black.png')}}" alt="">
            </span>
        </div>
        <div class="modal-content">
            <div class="mg-t-2rem t-center">
                <span class="d-inline-block tick-success "><img src="{{asset('ctp_admin_web/images/warning-del.png')}}" alt=" "></span>
                <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa hình ảnh này?</p>
            </div>
            <div class="t-center mg-t-175rem" id="btn_delete_about_about">
                <button id="add_file" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            </div>
        </div>
    </div>
</div>



@endsection