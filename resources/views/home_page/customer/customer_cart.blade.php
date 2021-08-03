@extends('customer.dashboard_customer')
@section('customer_content')
<div id="wrapper">
    <div class="wp-container">

        <div class="bot-content mt-0">
            <div class="wp-content p-5">
                <span class="fw-600 fz-2rem">Giỏ hàng</span><span class="fw-400 fz-15rem">(800 sản phẩm)</span>

                <!-- empty-box -->
                <div id="cart_empty" class="d-none" style="height: 500px;">
                    <div class="box-content empty-box py-15rem m-0">
                        <span class="empty-box-icon"><img src="{{asset('ctp/images/shopping-cart.png')}}" alt=""></span>
                        <span class="empty-box-text">Không có sản phẩm hiển thị</span>
                    </div>
                </div>
                <!-- has product -->
                <div id="cart_product" class="">
                    <div class="t-right w-55 my-3">
                        <a href="#delete_all_product_in_cart" class="t-green-main fw-400 d-inline-block">Xóa tất cả</a>
                    </div>
                    <div class="box-content d-flex d-none m-0">
                        <div class="box-left w-55">
                            <div class="box-item w-100 p-2 my-1">
                                <div class="box-product" style="position: relative;">
                                    <div class="d-flex product-item">
                                        <span class="thumb-nail w-20 p-2">
                                            <img src="{{asset('ctp/images/product_4.png')}}" alt="">
                                        </span>
                                        <div class="mg-l-2rem">
                                            <p class="fw-600 fz-15rem  my-3">Bao bì kem 2 dòng</p>
                                            <p class="fw-400 fz-15rem my-3">QTR365</p>
                                            <div class="amount w-70">
                                                <button class="minus"><img src="{{asset('ctp/images/minus.png')}}" alt=""></button>
                                                <input type="text" value="1">
                                                <button class="plus"><img src="{{asset('ctp/images/plus.png')}}" alt=""></button>
                                            </div>
                                        </div>
                                        <span class="icon" style="position: absolute; top: 0;right: 0;"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-item w-100 p-2 my-1">
                                <div class="box-product" style="position: relative;">
                                    <div class="d-flex product-item">
                                        <span class="thumb-nail w-20 p-2">
                                            <img src="{{asset('ctp/images/product_4.png')}}" alt="">
                                        </span>
                                        <div class="mg-l-2rem">
                                            <p class="fw-600 fz-15rem  my-3">Bao bì kem 2 dòng</p>
                                            <p class="fw-400 fz-15rem my-3">QTR365</p>
                                            <div class="amount w-70">
                                                <button class="minus"><img src="{{asset('ctp/images/minus.png')}}" alt=""></button>
                                                <input type="text" value="1">
                                                <button class="plus"><img src="{{asset('ctp/images/plus.png')}}" alt=""></button>
                                            </div>
                                        </div>
                                        <span class="icon" style="position: absolute; top: 0;right: 0;"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-item w-100 p-2 my-1">
                                <div class="box-product" style="position: relative;">
                                    <div class="d-flex product-item">
                                        <span class="thumb-nail w-20 p-2">
                                            <img src="{{asset('ctp/images/product_4.png')}}" alt="">
                                        </span>
                                        <div class="mg-l-2rem">
                                            <p class="fw-600 fz-15rem  my-3">Bao bì kem 2 dòng</p>
                                            <p class="fw-400 fz-15rem my-3">QTR365</p>
                                            <div class="amount w-70">
                                                <button class="minus"><img src="{{asset('ctp/images/minus.png')}}" alt=""></button>
                                                <input type="text" value="1">
                                                <button class="plus"><img src="{{asset('ctp/images/plus.png')}}" alt=""></button>
                                            </div>
                                        </div>
                                        <span class="icon" style="position: absolute; top: 0;right: 0;"><img src="{{asset('ctp/images/x-black.png')}}" alt=""></span>
                                    </div>
                                </div>
                            </div>


                            <!-- note -->
                            <div id="note_buy" class="mg-t-175rem">
                                <h1 class="fw-600 fz-15rem  mb-3">Ghi chú</h1>
                                <input type="text" placeholder="Lưu ý cho shop..." class="p-3 w-100" style="height: 80px;">
                            </div>
                        </div>
                        <div class="box-right" style="width: 44%;">
                            <div class="box-item w-100 p-0 my-1" style="height: auto; position: relative;">
                                <!-- address_receive -->
                                <div class="box-address p-4" id="address_receive">
                                    <div class="d-flex justify-content-space-between">
                                        <h1 class="fw-600 fz-1rem">Địa chỉ nhận hàng</h1>
                                        <span data-tag="a" type="choose_address_give_order" class="get_modal fw-400 t-green-main">Sửa</span>

                                    </div>
                                    <div class="p-4 box-address">
                                        <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi nhánh 1</p>
                                        <div class="item-content">
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_account_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">Jemis Kevin</span>
                                            </p>
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_phone_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">(+84) 944810055</span>
                                            </p>
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_location_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">157/17/1 Nguyen Gia Tri Street, Ward 25, Binh Thanh District, HCM City</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .box-address.active {
                                        background-color: #F6F6F6;
                                    }
                                </style>
                                <!-- address_send -->
                                <div class="box-address active p-4" id="address_send">
                                    <div class="d-flex justify-content-space-between">
                                        <h1 class="fw-600 fz-1rem">Địa chỉ gửi hàng</h1>
                                        <div>

                                            <span type="delete_address_send" data-tag="a" class="get_modal fw-400 t-green-main px-2">Xóa</span>
                                            <span type="choose_address_send_order" data-tag="a" class="get_modal fw-400 t-green-main px-2">Sửa</span>
                                        </div>
                                    </div>
                                    <div class="p-4 box-address">
                                        <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi nhánh 1</p>
                                        <div class="item-content">
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_account_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">Jemis Kevin</span>
                                            </p>
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_phone_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">(+84) 944810055</span>
                                            </p>
                                            <p>
                                                <span class="icon"><img src="{{asset('ctp/images/detail_location_black.png')}}" alt=""></span>
                                                <span class="fw-600 fz-1rem">157/17/1 Nguyen Gia Tri Street, Ward 25, Binh Thanh District, HCM City</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4">
                                    <a href="#add_address_send" class="fw-600  t-green-main">+ Thêm địa chỉ gửi</a>
                                </div>

                                <!-- date give order -->
                                <div class="d-flex p-4 mt-4 justify-content-space-between" style="border-top: 1px dashed #EBEBEB ;">
                                    <p class="fw-400">Ngày nhận: </p>
                                    <p class="fw-400">2021-04-05</p>
                                </div>
                                <div style="height: 100px; visibility: hidden;"></div>
                                <div class="t-center w-100" style="position: absolute; bottom: 2rem;">
                                    <span type="choose_date_give_order" data-tag="a" class="get_modal btn btn-green  w-70">Tiến hành đặt hàng</span>
                                    <span type="order_stock" data-tag="a" class="d-none btn btn-green  w-70">Đặt hàng</span>
                                    <!-- text check -->
                                    <i class="d-block fw-400 fz-075rem mt-3 t-black">Xin vui lòng kiểm tra lại đơn hàng trước khi đặt hàng</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- modal choose date give order -->
                <div class="modal" id="choose_date_give_order">
                    <div class="modal-box" style="width: 25%;">
                        <div class="box-content justify-content-center">
                            <div class="box-item w-100 ">
                                <div class="item-title py-3" style="border-bottom: 1px solid #c4c4c4!important;">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Chọn ngày nhận hàng</h4>
                                    <span class="icon"><a href="#cancel_add_attach"><img src="{{asset('ctp/images/x-black.png')}} " alt=" "></a></span>
                                </div>

                                <div class="p-4">
                                    <label for="choose_date" class="fw-400 d-block mb-3 t-left">Ngày nhận</label>
                                    <input type="date" name="choose_date" id="choose_date" class="w-100 py-1 px-3" style="border:  1px solid #C4C4C4;">
                                    <small class="error-text mt-3 t-center">Bạn chưa chọn ngày nhận hàng</small>
                                </div>

                                <div class="item-content t-center mg-t-175rem ">
                                    <button id="submit_choose_date_give_order" class="btn-submit w-50 d-inline-block fz-1rem">Hoàn thành</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal choose address give order -->
                <div class="modal" id="choose_address_give_order">
                    <div class="modal-box w-50" style="overflow-y: scroll; max-height: 600px;">
                        <div class="box-content justify-content-center">
                            <div class="box-item w-100" style="padding: 1.5rem!important;">
                                <div class="item-title py-3" style="border-bottom: 1px solid #c4c4c4!important;">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Chọn địa chỉ nhận hàng</h4>
                                    <span class="icon"><a href="#cancel_add_attach"><img src="{{asset('ctp/images/x-black.png')}} " alt=" "></a></span>
                                </div>

                                <div class="py-3" style="position: relative; text-align: left;">
                                    <input type="radio" name="choose_address_give_order" id="address_1" value="address_1" class="d-inline-block" style="position: relative;top: -4.5rem;">
                                    <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                                        <strong>Công ty Cổ Phần ABC - Chi nhánh 2</strong>
                                        <p>Cecilia Chapman | (257) 563-7401 </p>
                                        <p>Tòa nhà TMA, đường số 10, Công viên phần mềm Quang Trung, P. Tân Chánh Hiệp, Quận 12, TP.HCM </p>
                                    </div>
                                </div>
                                <div class="py-3" style="position: relative;text-align: left;">
                                    <input type="radio" name="choose_address_give_order" id="address_1" value="address_1" class="d-inline-block" style="position: relative;top: -4.5rem;">
                                    <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                                        <strong>Công ty Cổ Phần ABC - Chi nhánh 2</strong>
                                        <p>Cecilia Chapman | (257) 563-7401 </p>
                                        <p>Tòa nhà TMA, đường số 10, Công viên phần mềm Quang Trung, P. Tân Chánh Hiệp, Quận 12, TP.HCM </p>
                                    </div>
                                </div>

                                <div class="t-left mg-t-175rem ">
                                    <a href="#add_address_give_order" class="fw-600 t-green-main">+ Thêm địa chỉ</a>
                                </div>

                                <!-- form add address -->
                                <form action="" method="post" class="form-edit mt-2" style="background-color: #F6F6F6;">
                                    <div class="form-edit-row">
                                        <label class="form-lable">Tên công ty</label>
                                        <input type="text" class="form-input" name="address_name" id="address_name" placeholder="Nhập tên công ty" value="">
                                    </div>
                                    <div class="form-edit-row form-edit-row-flex input-content ">
                                        <div class="form-box-flex">
                                            <label class="form-lable">Người đại diện</label>
                                            <input type="text" class="form-input" name="contact_name" id="contact_name" placeholder="Nhập tên người đại diện" value="">
                                        </div>
                                        <div class="form-box-flex">
                                            <label class="form-lable">Số điện thoại</label>
                                            <input type="text" class="form-input name" name="contact_number" id="contact_number" placeholder="Số điện thoại" value="">
                                        </div>
                                    </div>
                                    <div class="form-edit-row ">
                                        <label class="form-lable ">Thành phố</label>
                                        <select name="city " id="city " class="form-select">
                                                            <option value="0 ">Chọn thành phố</option>
                                                        </select>
                                    </div>
                                    <div class="form-edit-row form-edit-row-flex input-content ">
                                        <div class="form-box-flex ">
                                            <label class="form-lable ">Quận/huyện</label>
                                            <select name="district " id="district " class="form-select">
                                                                    <option value="0 ">Chọn quận/huyện</option>
                                                                </select>
                                        </div>
                                        <div class="form-box-flex ">
                                            <label class="form-lable ">Phường/xã</label>
                                            <select name="ward " id="ward " class="form-select">
                                                                    <option value="0 ">Chọn phường/xã</option>
                                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-edit-row ">
                                        <label class="form-lable ">Địa chỉ</label>
                                        <select name="address " id="address " class="form-select">
                                                            <option value="0 ">Nhập địa chỉ cụ thể</option>
                                                        </select>
                                    </div>
                                    <div class="form-edit-row-check t-left">
                                        <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                        <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                    </div>
                                </form>
                                <!-- end form add address -->
                                <div class="t-right mg-t-175rem ">
                                    <button id="submit_give_order" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal choose address send order -->
                <div class="modal" id="choose_address_send_order">
                    <div class="modal-box w-50" style="overflow-y: scroll; max-height: 600px;">
                        <div class="box-content justify-content-center">
                            <div class="box-item w-100" style="padding: 1.5rem!important;">
                                <div class="item-title py-3" style="border-bottom: 1px solid #c4c4c4!important;">
                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Chọn địa chỉ gửi hàng</h4>
                                    <span class="icon"><a href="#cancel_add_attach"><img src="{{asset('ctp/images/x-black.png')}} " alt=" "></a></span>
                                </div>

                                <div class="py-3" style="position: relative; text-align: left;">
                                    <input type="radio" name="choose_address_send_order" id="address_1" value="address_1" class="d-inline-block" style="position: relative;top: -4.5rem;">
                                    <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                                        <strong>Phước Bình</strong>
                                        <p>Cecilia Chapman | (257) 563-7401 </p>
                                        <p>Tòa nhà TMA, đường số 10, Công viên phần mềm Quang Trung, P. Tân Chánh Hiệp, Quận 12, TP.HCM </p>
                                    </div>
                                </div>
                                <div class="py-3" style="position: relative; text-align: left;">
                                    <input type="radio" name="choose_address_send_order" id="address_1" value="address_1" class="d-inline-block" style="position: relative;top: -4.5rem;">
                                    <div class="lh-15rem mg-l-1rem d-inline-block w-70">
                                        <strong>Phước Bình</strong>
                                        <p>Cecilia Chapman | (257) 563-7401 </p>
                                        <p>Tòa nhà TMA, đường số 10, Công viên phần mềm Quang Trung, P. Tân Chánh Hiệp, Quận 12, TP.HCM </p>
                                    </div>
                                </div>

                                <div class="t-left mg-t-175rem ">
                                    <a href="#add_address_give_order" class="fw-600 t-green-main">+ Thêm địa chỉ</a>
                                </div>

                                <!-- form add address -->
                                <form action="" method="post" class="form-edit mt-2" style="background-color: #F6F6F6;">
                                    <div class="form-edit-row">
                                        <label class="form-lable">Tên gợi nhớ</label>
                                        <input type="text" class="form-input" name="address_name" id="address_name" placeholder="Nhập tên công ty" value="">
                                    </div>
                                    <div class="form-edit-row form-edit-row-flex input-content ">
                                        <div class="form-box-flex">
                                            <label class="form-lable">Liên hệ</label>
                                            <input type="text" class="form-input" name="contact_name" id="contact_name" placeholder="Nhập tên người đại diện" value="">
                                        </div>
                                        <div class="form-box-flex">
                                            <label class="form-lable">Số điện thoại</label>
                                            <input type="text" class="form-input name" name="contact_number" id="contact_number" placeholder="Số điện thoại" value="">
                                        </div>
                                    </div>
                                    <div class="form-edit-row ">
                                        <label class="form-lable ">Thành phố</label>
                                        <select name="city " id="city " class="form-select">
                                                            <option value="0 ">Chọn thành phố</option>
                                                        </select>
                                    </div>
                                    <div class="form-edit-row form-edit-row-flex input-content ">
                                        <div class="form-box-flex ">
                                            <label class="form-lable ">Quận/huyện</label>
                                            <select name="district " id="district " class="form-select">
                                                                    <option value="0 ">Chọn quận/huyện</option>
                                                                </select>
                                        </div>
                                        <div class="form-box-flex ">
                                            <label class="form-lable ">Phường/xã</label>
                                            <select name="ward " id="ward " class="form-select">
                                                                    <option value="0 ">Chọn phường/xã</option>
                                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-edit-row ">
                                        <label class="form-lable ">Địa chỉ</label>
                                        <select name="address " id="address " class="form-select">
                                                            <option value="0 ">Nhập địa chỉ cụ thể</option>
                                                        </select>
                                    </div>
                                    <div class="form-edit-row-check t-left">
                                        <input type="checkbox" class="form-input-check " name="choose_default " id="choose_default ">
                                        <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>
                                    </div>
                                </form>
                                <!-- end form add address -->
                                <div class="t-right mg-t-175rem ">
                                    <button id="submit_send_order" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal choose address send order -->
                <div class="modal" id="delete_address_send">
                    <div class="modal-box w-50" style="overflow-y: scroll; max-height: 600px;">
                        <div class="box-content justify-content-center">
                            <div class="box-item w-100" style="padding: 1.5rem!important;">
                                <div class="item-title py-3" style="border-bottom: 1px solid #c4c4c4!important;">
                                    <h4 class="t-left fw-600 t-cap fz-15rem m-0">Lý do hủy</h4>
                                    <span class="icon"><a href="#cancel_add_attach"><img src="{{asset('ctp/images/x-black.png')}} " alt=" "></a></span>
                                </div>

                                <textarea name="note_cancel_ordernote_cancel_order" cols="30" rows="10" class="mt-3 w-100 p-3 t-placeholder">Ghi lý do hủy đơn</textarea>
                                <!-- end form add address -->
                                <div class="t-right mg-t-175rem ">
                                    <button id="submit_send_order" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- contact box -->
        <div id="contact-box">
            <span class="box-contact-shadow"></span>
            <span class="box-contact-close"></span>
            <div class="box-contact">

                <div class="icon-contact ">
                    <div><img src="{{asset('ctp/images/phone_1.png')}} " alt=" "></div>
                    <p>Liên hệ</p>
                </div>

                <div class="menu-contact ">
                    <span class="triangle "></span>
                    <ul class="content-contact ">
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-phone.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">(+84) 944810055</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-mes.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Messager</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-viber.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Viber</a>
                        </li>
                        <li class="item ">
                            <a href="# " class="item-icon "><img src="{{asset('ctp/images/icon-zalo.png')}} " alt=" "></a>
                            <a href="# " class="item-title ">Zalo</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection