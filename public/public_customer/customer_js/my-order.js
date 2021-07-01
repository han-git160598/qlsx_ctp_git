$(document).ready(function() {
    list_customer_order();
})
function list_customer_order()
{
    var id_customer = 48;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', id_customer: id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                var output= ``;
                response.data.forEach(function(item) {
                   output+=`
                    <div class="box-item mg-b-1rem px-3 py-5 w-100">
                        <div class="d-flex mg-b-1rem justify-content-space-between">
                            <span class="fw-400 fz-125rem t-label">Mã đơn hàng</span>
                            <span class="fw-400 t-blue"> ${order_status(item.order_status)} </span>
                        </div>
                        <div class="d-flex justify-content-space-between">
                            <strong class="fz-15rem"> ${item.order_code}</strong>
                            <p class="t-label">
                                <span class="fw-400">${item.order_date_create}</span>
                            </p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-space-between">
                            <a onclick="order_detail(${item.id_order})" class="btn btn-green">Chi tiết đơn hàng</a>
                            <p>Tổng : <strong class="fz-15rem">${item.order_total_cost} đ</strong></p>
                        </div>
                    </div>`;
                })
                $('#all_order').html(output);
                $('#my_detail_invoice').hide();
            }
        }
    })
}
function status_order(status)
{
    // waiting_confirm = 1
    // processing = 2
    // delivery = 3 
    // payment = 4
    // complete = 5
    // cancel = 6  
    var id_customer = 48;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', id_customer: id_customer, order_status:status},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                var output= ``;
                response.data.forEach(function(item) {
                   output+=`
                    <div class="box-item mg-b-1rem px-3 py-5 w-100">
                        <div class="d-flex mg-b-1rem justify-content-space-between">
                            <span class="fw-400 fz-125rem t-label">Mã đơn hàng</span>
                            <span class="fw-400 t-blue"> ${order_status(item.order_status)} </span>
                        </div>
                        <div class="d-flex justify-content-space-between">
                            <strong class="fz-15rem"> ${item.order_code}</strong>
                            <p class="t-label">
                                <span class="fw-400">${item.order_date_create}</span>
                            </p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-space-between">
                        <div>`;
                        if(status == 1)
                        {
                        output += `<a onclick="cancel_order(${item.id_order})" class="btn btn-outline btn-green">Hủy đơn</a>`;
                        }
                        if(status == 3)
                        {
                        output += `<a onclick="delivery_to_payment(${item.id_order})" class="btn btn-outline btn-green">Đã nhận</a>`;
                        }
                        output +=`<a onclick="order_detail(${item.id_order})" class="btn btn-green">Chi tiết đơn hàng</a>
                        </div>
                            <p>Tổng : <strong class="fz-15rem">${item.order_total_cost} đ</strong></p>
                        </div>
                    </div>`;
                })
                $('#all_order').html(output);
            }
        }
    })
}
function cancel_order(id_order)
{
    var order_record_cancel_note = 'áds';
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'cancel_order', id_order: id_order, order_record_cancel_note:order_record_cancel_note},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            status_order(1)
        }
    });

}
function delivery_to_payment(id_order)
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'update_status_order', id_order: id_order, order_status:4},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            status_order(3)
        }
    });
}
///////////my-detail-invoice
function order_detail(id_order)
{
    console.log(id_order)
    var id_customer = 48;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', order_id: id_order, id_customer:id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response);
            let item = response.data[0];
            let order_record_delivery = item.order_record_delivery.split(",");
            let array_record={};
            array_record['company']=order_record_delivery[0]
            array_record['name']=order_record_delivery[1]
            array_record['phone']=order_record_delivery[2]
            array_record['address']=order_record_delivery[3]
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
                    <span data-tag="a" type="modal_edit_address_receive" class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                </div>
                <div class="item-title d-flex">
                    <p class="fw-600 fz-125rem"> ${array_record.company}</p>
                </div>
                <div class="item-content">
                    <p>
                        <span class="icon"><img src="public/images/detail_account_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem">${array_record.name}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="public/images/detail_phone_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem"> ${array_record.phone}</span>
                    </p>
                    <p>
                        <span class="icon"><img src="public/images/detail_location_black.png" alt=""></span>
                        <span class="fw-600 fz-1rem"> ${array_record.address}</span>
                    </p>
                </div>
            </div>
            <!-- box product -->
            <div class="box-item mg-b-1rem px-3 py-5 w-100">
                <div class="item-title d-flex mg-b-15rem">
                    <p class="fw-600 fz-125rem">Sản phẩm</p>
                    <span data-tag="a" class="fw-400 fz-1rem t-blue">ĐANG GIAO</span>

                </div>
                <!-- product item -->
                <div class="box-product">`;
                item.order_item_product.forEach(function(item_product) {
                output+=`
                    <a onclick="detail_product(${item_product.id})" class="item-title d-flex product-item py-2">
                        <span class="fw-600 fz-125rem thumb-nail w-10">
                            <img src="${urlserver+item_product.product_img}" alt="">
                        </span>
                        <span class="fw-600 fz-125rem mg-l-125rem">${item_product.product_name}</span>
                        <span class="fw-400 fz-1rem t-right">
                     
                        <span class="d-block t-right">x${item_product.product_quantity_packet} Cái</span>
                        </span>
                    </a>`;
                })
                output +=` 
                </div>
                <!-- total money-->
                <div class="box-money w-100">
                    <div class="d-flex justify-content-space-between py-2" id="total_money_final">
                        <span class="fw-400 d-inline-block t-right w-80">Tổng:</span>
                        <strong class="d-inline-block t-right w-20">${item.order_total_cost} đ</strong>
                    </div>
                </div>


            </div>

        </div>

        `;
        $('#my_invoice').hide();
        $('#my_detail_invoice').show();
        $('#my_detail_invoice').html(output);
        }
        
    });
}

function detail_product(id)
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_product', id_product: id},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            // $.redirectPost(urllocal+detail_product.html ,
            //     {
            //        response
            //     });
            postRedirect(urllocal+detail_product.html, response);
        }
    });
 
    
  
    
}