@extends('dashboard_customer')
@section('customer_content')

    <!-- END HEADER -->
    <div id="wrapper">
        <div class="wp-container">
            <!-- slider -->

            <!-- top content -->
            <!-- bot content -->
            <div class="bot-content mt-0">
                <div class="wp-content p-5">
                    <div class="box-content d-block m-0">
                        <!-- breadcurmb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb fz-1rem fw-400">
                                <li class="breadcrumb-item"><a href="{{URL::to('customer-home')}}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thông tin sản phẩm</li>
                            </ol>
                        </nav>
                        <!-- end  breadcurmb-->
                        <div class="box-item w-100">
                            <div class="box-head d-flex justify-content-space-between mg-b-1rem" style="min-height: 420px;">
                                <div class="thumb-nails w-30">
                                    <img src="{{ asset('public_customer/images/product_1.png')}}" id="product_img" alt="">
                                </div>
                                <div class="w-60" style="min-height: 420px; position: relative;">
                                    <p class="fw-600 fz-3rem mg-b-15rem" id="product_name">Bao bì kem 2 dòng</p>
                                    <p class="fw-400 fz-2rem mg-b-15rem" id="product_code">Mã sản phẩm: QTR365</p>
                                    <div class="w-50 d-flex justify-content-space-between mg-b-15rem" style="align-items: center;">
                                        <span class="fw-400">Số lượng</span>
                                        <div class="amount">
                                            <button class="minus" onclick="min_cart()"><img src="{{ asset('public_customer/images/minus.png')}}" alt=""></button>
                                            <input type="number" id="current_quantity" min="1" value="1">
                                            <button class="plus" onclick="max_cart()" ><img src="{{ asset('public_customer/images/plus.png')}}" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="w-50 d-flex justify-content-space-between mg-b-15rem" style="align-items: center;">
                                        <span class="fw-400">Đơn vị đặt:</span>
                                         <div class="amount" id="product_packet_title">Thùng</div>
                                   
                                    </div>
                                    

                                    <span data-tag="a" type="add_attach_file" class="get_modal fw-400 t-green-main">+Thêm dữ liệu đính kèm sản phẩm</span>
                                    <!-- show_info_file -->
                                    <div id="show_info_file" style="min-height: 120px;">
                                        <!-- class="visible-hidden"-->
                                        <div class="">
                                            <p class="fw-600">Dữ liệu đính kèm</p>
                                            <p id="file_name" class="box-attach">
                                                <span class="file-name"></span>
                                                <span data-tag="a" type="delete_attach_file" class="get_modal file-close" id="">
                                                    <img src="{{ asset('public_customer/images/x_thumb_nail.png')}}" alt="">
                                                </a>
                                            </p>
                                            <p class="fw-600">Ghi chú</p>
                                            <p id="note" class="box-attach"></p>
                                        </div>
                                    </div>

                                    <div style="position: relative;bottom: 0;left: 0; width: 100%;">
                                        <a onclick="add_cart()" class="btn btn-outline btn-green w-30 fz-125rem">Thêm vào giỏ hàng</a>
                                        <a onclick="buy_now()" class="btn btn-green w-30 fz-125rem">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body py-4 border-bottom color-main">
                                <h3 class="fw-600 fz-15rem mg-b-1rem">Quy cách sản phẩm</h3>
                                    <div>
                                        <div class="d-flex justify-content-space-between py-2 px-5">
                                            <strong class="d-inline-block t-left w-20">Đơn vị sản phẩm:</strong>
                                            <span class="fw-400 d-inline-block t-left w-80" id="product_unit_title">Bao bì</span>
                                        </div>
                                        <div class="d-flex justify-content-space-between py-2 px-5">
                                            <strong class="d-inline-block t-left w-20">Đơn vị đóng gói:</strong>
                                            <span class="fw-400 d-inline-block t-left w-80" id="product_unit_packet_title"></span>
                                        </div>
                                        <div class="d-flex justify-content-space-between py-2 px-5">
                                            <strong class="d-inline-block t-left w-20">Quy cách đóng gói:</strong>
                                            <span class="fw-400 d-inline-block t-left w-80" id="product_material">Nhựa, chất dẻo (plastic) và các sản phẩm bằng chất dẻo</span>
                                        </div>
                                    </div>
         
                                    <div class="box-body py-4 border-bottom color-main">
                                        <div class="head d-flex justify-content-space-between">
                                            <h3 class="fw-600 fz-15rem mg-b-1rem">Chi tiết sản phẩm</h3>
                                            <a href="#" class="icon" style="width: 1.5rem;"><img src="{{ asset('public_customer/images/arrow-up.png')}}" alt=""></a>
                                        </div>
                                        <div class="body t-left py-2 px-5" style="line-height: 1.55rem; letter-spacing: 2%;">
                                            <p id="product_description">   </p>
                                        </div> 
                                    </div>
                                </div>

                                <!-- modal insert file attach -->
                                <div class="modal" id="add_attach_file">
                                    <div class="modal-box" style=" margin-top: 50px;">
                                        <div class="box-content justify-content-center">
                                            <div class="box-item w-100 ">
                                                <div class="item-title ">
                                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Thêm dữ liệu đính kèm sản phẩm</h4>
                                                    <span class="icon" data-tag="a" type="cancel_add_attach"><img src="{{ asset('public_customer/images/x-black.png')}} " alt=" "></span>
                                                </div>
                                                <form action="" method="post" class="form-file" id="form_attach">
                                                    <label for="attach" class="form-label">Dữ liệu đính kèm</label>
                                                    <div class="form-file-box">
                                                        <input type="file" name="attach" id="attach" onchange="readURL(this);" class="form-file-input">
                                                        <span class="form-file-img"></span>

                                                        <span data-tag="a" type="cancel_thumb_nails">
                                                        <img src="{{ asset('public_customer/images/x_thumb_nail.png')}}" class="form-file-view-img-close" alt="">
                                                    </span>
                                                        <strong class="form-file-img-title">Tải logo của bạn lên đây</strong>
                                                        <span class="form-file-view-img">
                                                        <img src="" alt=""> <!--{{ asset('public_customer/images/product_1.png')}}-->
                                                    </span>
                                                    </div>

                                                    <label for="note" class="form-label">Ghi chú</label>
                                                    
                                                    <textarea rows="10" id="note_input" class="form-input"></textarea>
                                                    <small class="t-center error-text my-2">Bạn chưa chọn file đính kèm</small>
                                                </form>

                                                <div class="item-content t-right mg-t-175rem ">
                                                    <button id="add_attach" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal delete file attach -->
                                <div class="modal" id="delete_attach_file">
                                    <div class="modal-box">
                                        <div class="box-content justify-content-center">
                                            <div class="box-item w-100 ">
                                                <div class="item-title ">
                                                    <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem ">Xóa thông tin</h4>
                                                    <span class="icon "><a href="#cancel_delete_attach"><img src="{{ asset('public_customer/images/x-black.png')}} " alt=" "></a></span>
                                                </div>
                                                <div class="item-content mg-t-2rem t-center">
                                                    <span class="d-inline-block tick-success "><img src="{{ asset('public_customer/images/warning-del.png')}} " alt=" "></span>
                                                    <p class="t-center mg-t-2rem fz-125rem">Bạn có chắc muốn xóa thông tin này?</p>
                                                </div>

                                                <div class="item-content t-center mg-t-175rem ">
                                                    <button id="delete_attach" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
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
                                    <div><img src="{{ asset('public_customer/images/phone_1.png')}} " alt=" "></div>
                                    <p>Liên hệ</p>
                                </div>

                                <div class="menu-contact ">
                                    <span class="triangle "></span>
                                    <ul class="content-contact ">
                                        <li class="item ">
                                            <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-phone.png')}} " alt=" "></a>
                                            <a href="# " class="item-title ">(+84) 944810055</a>
                                        </li>
                                        <li class="item ">
                                            <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-mes.png')}} " alt=" "></a>
                                            <a href="# " class="item-title ">Messager</a>
                                        </li>
                                        <li class="item ">
                                            <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-viber.png')}} " alt=" "></a>
                                            <a href="# " class="item-title ">Viber</a>
                                        </li>
                                        <li class="item ">
                                            <a href="# " class="item-icon "><img src="{{ asset('public_customer/images/icon-zalo.png')}} " alt=" "></a>
                                            <a href="# " class="item-title ">Zalo</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('public_customer/js/jquery.js')}} " type="text/javascript "></script>
<script src="{{ asset('public_customer/customer_js/detail_product.js')}}" type="text/javascript "></script>
@endsection