$(document).ready(function() {
    list_customer_order();
})
function list_customer_order()
{
    var id_customer = item.id;
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
                //$('#my_detail_invoice').hide();
                $('#all_order').html(output);
                
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
    var id_customer = item.id;
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
    localStorage.setItem('detail_order', JSON.stringify(id_order));
    window.location= urlserver + 'my-detail-invoice';
}
