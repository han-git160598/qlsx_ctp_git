function detail_order() {
    var output = `
  
    <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
        <h4 class="t-left fw-600 t-cap fz-15rem lh-2rem">Đơn hàng</h4>
    </div>
    <div class="box-right w-100">
        <div class="t-right mg-b-175rem">
            <span class="fw-400 d-inline-block">Mã đơn hàng: MDH879879 | Giao vào thứ sáu, 07/05</span>
        </div>
        <!-- PROGESS BAR -->
        <ul class="progressbar mg-b-1rem">
            <li class="active" data-step="1">
                <span class="icon"><img src="../ctp/images/invoice_active.png" alt=""></span>
                <span>Đơn hàng đã đặt</span>
            </li>
            <li data-step="2">
                <span class="icon"><img src="../ctp/images/chalks.png" alt=""></span>
                <span>Chuẩn bị NVL</span>
            </li>
            <li data-step="3">
                <span class="icon"><img src="../ctp/images/engineering.png" alt=""></span>
                <span>Đang gia công</span>
            </li>
            <li data-step="4">
                <span class="icon"><img src="../ctp/images/shipping.png" alt=""></span>
                <span>Đang giao</span>
            </li>
            <li data-step="5">
                <span class="icon"><img src="../ctp/images/tick.png" alt=""></span>
                <span>Đơn hàng đã giao</span>
            </li>
        </ul>

        <!-- box -->
        <div class="box-item mg-b-1rem px-3 py-5 w-100">
            <div class="item-title d-flex mg-b-15rem">
                <p class="fw-600 fz-125rem">Địa chỉ nhận hàng</p>
                <a href="#modal_edit_address_receive" class="fw-400 fz-1rem t-green-main">Sửa</a>
            </div>
            <div class="item-title d-flex">
                <p class="fw-600 fz-125rem">Công ty Cổ Phần ABC - Chi nhánh 1</p>
            </div>
            <div class="item-content">
                <p>
                    <span class="icon"><img src="../ctp/images/detail_account_black.png" alt=""></span>
                    <span class="fw-600 fz-1rem">Jemis Kevin</span>
                </p>
                <p>
                    <span class="icon"><img src="../ctp/images/detail_phone_black.png" alt=""></span>
                    <span class="fw-600 fz-1rem">(+84) 944810055</span>
                </p>
                <p>
                    <span class="icon"><img src="../ctp/images/detail_location_black.png" alt=""></span>
                    <span class="fw-600 fz-1rem">Số 12 Đại lộ Khoa học, P, Ghềnh Ráng, Thành phố Qui Nhơn, Bình Định</span>
                </p>
                <a href="#modal_delete_address_send" class="btn btn-green">Xóa</a>
            </div>
        </div>
        <!-- box product -->
        <div class="box-item mg-b-1rem px-3 py-5 w-100">
            <div class="item-title d-flex mg-b-15rem">
                <p class="fw-600 fz-125rem">Sản phẩm</p>
                <a href="#modal_edit_address_receive" class="fw-400 fz-1rem t-blue">ĐANG GIAO</a>
            </div>
            <!-- product item -->
            <div class="box-product">
                <a href="#detail_product" class="item-title d-flex product-item py-2">
                    <span class="fw-600 fz-125rem thumb-nail w-10">
                        <img src="../ctp/images/product_4.png" alt="">
                    </span>
                    <span class="fw-600 fz-125rem mg-l-125rem">Bao bì kem 2 dòng</span>
                    <span class="fw-400 fz-1rem t-right">
                        <span class="d-block t-right">99.000 đ</span>
                    <span class="d-block t-right">x2 Cái</span>
                    </span>
                </a>
                <a href="#detail_product" class="item-title d-flex product-item py-2">
                    <span class="fw-600 fz-125rem thumb-nail w-10">
                        <img src="../ctp/images/product_4.png" alt="">
                    </span>
                    <span class="fw-600 fz-125rem mg-l-125rem">Bao bì kem 2 dòng</span>
                    <span class="fw-400 fz-1rem t-right">
                        <span class="d-block t-right">99.000 đ</span>
                    <span class="d-block t-right">x2 Cái</span>
                    </span>
                </a>
            </div>
            <!-- total money-->
            <div class="box-money w-100">
                <div class="d-flex justify-content-space-between py-2">
                    <span class="fw-400 d-inline-block t-right w-80">Tổng tiền hàng:</span>
                    <span class="fw-400 d-inline-block t-right w-20" id="total_money_order">198.000 đ</span>
                </div>
                <div class="d-flex justify-content-space-between py-2">
                    <span class="fw-400 d-inline-block t-right w-80">Phí vận chuyển:</span>
                    <span class="fw-400 d-inline-block t-right w-20" id="fee_ship">25.000 đ</span>
                </div>
                <div class="d-flex justify-content-space-between py-2">
                    <span class="fw-400 d-inline-block t-right w-80">Giảm giá:</span>
                    <span class="fw-400 d-inline-block t-right w-20" id="sale_price">0 đ</span>
                </div>
                <div class="d-flex justify-content-space-between py-2" id="total_money_final">
                    <span class="fw-400 d-inline-block t-right w-80">Tổng:</span>
                    <strong class="d-inline-block t-right w-20">223.000 đ</strong>
                </div>
            </div>

        </div>

    </div>

    `
    $("#my_invoice").html(output);
}
$(document).ready(function() {
    console.log(1);
});