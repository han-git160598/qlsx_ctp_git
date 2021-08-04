$(document).ready(function() {

    order_detail();
})

function order_detail()
{
    var id_order = JSON.parse(localStorage.getItem('detail_order'));
    var id_customer = item.id;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', order_id: id_order, id_customer:id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response)
            let item = response.data[0];
            let order_record_delivery = JSON.parse(item.order_record_delivery);
        let output=`
        <div class="item-title mg-b-05rem py-05rem px-1rem d-flex justify-content-space-between">
        </div>
        <div class="box-right w-100">
            <div class="t-right mg-b-175rem">
                <span class="fw-400 d-inline-block">Mã đơn hàng: ${item.order_code} | Giao vào ${item.order_date_delivery}</span>
            </div>
            <!-- PROGESS BAR -->

            <!-- box -->
            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                <div class="item-title d-flex mg-b-15rem">
                    <p class="fw-600 fz-125rem">Địa chỉ nhận hàng</p>
                    <span onclick="show_edit_address()" data-tag="a" type="modal_edit_address_receive" class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                </div>
                <div class="item-title d-flex">
                    <p class="fw-600 fz-125rem"> ${order_record_delivery.delivery_company}</p>
                </div>
                <div class="item-content">
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_account_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem">${order_record_delivery.delivery_deputy_person}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_phone_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem"> ${order_record_delivery.delivery_deputy_phone}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="${urlserver +'public_customer/images/detail_location_black.png'}" alt=""></span>
                        <span class="fw-600 fz-1rem"> ${order_record_delivery.delivery_address}</span>
                    </p>
                </div>
            </div>
            <!-- box product -->
            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                <div class="item-title d-flex mg-b-15rem">
                    <p class="fw-600 fz-125rem">Sản phẩm</p>
                    <span data-tag="a" class="fw-400 fz-1rem t-blue">${order_status(item.order_status)}</span>

                </div>
                <!-- product item -->
                <div class="box-product">`;
               
                item.order_item_product.forEach(function(item_product) {
              
                    output+=`
                        <a onclick="detail_product(${item_product.id_product})"  class="item-title d-flex flex-start product-item py-2">
                            <span class="fw-600 fz-125rem thumb-nail w-10">
                                <img src="${urlimg_img + item_product.product_img}" alt="">
                            </span>
                            <span class="fw-600 fz-125rem mg-l-125rem t-left">${item_product.product_name}

                                <span class="d-flex py-2 align-item-center">
                                    <span class="t-lable mr-3">x${item_product.product_quantity_packet}</span>
                                </span>
                                <span class="d-flex py-2 align-item-center">
                                    <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                <span class="fz-075rem">${item_product.product_unit_title}</span>
                                </span>
                                <span class="d-flex py-2 align-item-center">
                                    <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                <span class="fz-075rem">${item_product.product_packet_title}</span>
                                </span>
                                <span class="d-flex py-2 align-item-center">
                                    <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                <span class="fz-075rem">${item_product.product_unit_packet} ${item_product.product_unit_title}/${item_product.product_packet_title}</span>
                                </span>
                                <span class="d-flex py-2 align-item-center">
                                    <span class="t-lable mr-3"></span>
                                </span>
                            </span>
                        </a>
                        `;
                
                })
                output +=` 
                </div>
              
                <div class="box-money w-100 border-bottom color-main">
                    <div class="d-flex justify-content-space-between py-2" id="total_money_final">
                        <span class="fw-400 d-inline-block t-right w-80">Tổng:</span>
                        <strong class="d-inline-block t-right w-20">${item.order_total_cost}</strong>
                    </div>
                </div>


            </div>

        </div>

        `;
       // $('#my_invoice').hide();
        //$('#my_detail_invoice').show();
        $('#my_detail_invoice').html(output);
        }
        
    });
}
function detail_product(id)
{

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'product_manager',type_manager:'list_product', id_product: id},
        dataType: 'json',
        headers: headers,
        success: function(response) {
     
            localStorage.setItem('detail_product', JSON.stringify(response.data[0]));
            window.location.href = urlserver+ 'detail-product';
        }
    });
}
function show_edit_address()
{
    $('#choose_address_give_order').show()
}