@extends('home_page.admin.dashboard_admin')
@section('js')
    <script src="{{asset('public_home/admin/admin_contact.js')}}" type="text/javascript "></script>
@endsection

@section('admin_content')

        <!-- wp content -->
        <div id="wp-content">
            <!-- content -->
            <div id="content" class="w-100" style="float: none;">
                <h1 class="heading">
                    Liên hệ
                </h1>
                <span data-tag="a" type="add_module" class="visible-hidden t-green-main d-block t-right my-1">+ Thêm hình ảnh</span>
                <!-- Hotline -->
                <div class="box" style="width: 49%; float: left;">
                    <div class="box-head" style="border-bottom:none">
                        <h1 class="heading">Hotline</h1>
                    </div>
                    <div class="box-body py-0">
                        <div class="body-content my-3">
                            <div class="form-edit px-4 py-0">
                                <div class="form-edit-row my-2">
                                    <label for="" class="form-lable">Số điện thoại</label>
                                    <input type="text" class="form-input" id="contact_phone" value="(+84) 944810055">
                                </div>
                                <div class="form-edit-row  my-2">
                                    <label for="" class="form-lable">Messeger</label>
                                    <select name="messager" id="messager" class="form-input">
                                        <option value="0">Select page</option>
                                    </select>
                                </div>
                                <div class="form-edit-row my-2">
                                    <label for="" class="form-lable">Viber</label>
                                    <input type="text" id="contact_Viber" class="form-input" value="(+84) 944810055">
                                </div>
                                <div class="form-edit-row my-2">
                                    <label for="" class="form-lable">Zalo</label>
                                    <input type="text" id="contact_Zalo" class="form-input" value="(+84) 944810055">
                                </div>
                                <div class="t-right w-100"  id="btn_contact_update">
                                    <button class="btn btn-green">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact information -->
                <div class="box" style="width: 49%; float: right;">
                    <div class="box-head" style="border-bottom:none">
                        <h1 class="heading">Contact information</h1>
                    </div>
                    <div class="box-body py-0">
                        <div class="body-content my-3">
                            <div class="form-edit px-4 py-0">
                                <div class="form-edit-row my-2">
                                    <label for="" class="form-lable">Email</label>
                                    <input type="text" id="contact_email" class="form-input" value="cuongthinhphuc@gmail.com">
                                </div>
                                <div class="form-edit-row  my-2">
                                    <label for="" class="form-lable">Thành phố</label>
                                    <select name="city" id="city" class="form-input">
                                        <option value="0">TP. Hồ Chí Minh</option>
                                    </select>
                                </div>
                                <div class="form-edit-row-flex my-2">
                                    <div class="form-box-flex">
                                        <label for="" class="form-lable">Quận/huyện</label>
                                        <select name="q" id="q" class="form-input">
                                            <option value="0">Huyện Bình Chánh</option>
                                        </select>
                                    </div>
                                    <div class="form-box-flex">
                                        <label for="" class="form-lable">Phường/xã</label>
                                        <select name="h" id="h" class="form-input">
                                            <option value="0">Tân Kiên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-edit-row my-2">
                                    <label for="" class="form-lable">Địa chỉ</label>
                                    <input type="text" id="contact_adress" class="form-input" value="A5/6c Nguyễn Cữu Phú, Ấp 01">
                                </div>
                                <div class="t-right w-100">
                                    <button class="btn btn-green">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>

        </div>
 
@endsection