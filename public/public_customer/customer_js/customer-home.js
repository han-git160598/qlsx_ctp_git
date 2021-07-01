$(document).ready(function () {
    list_customer_product();
    list_customer_order();

})
function account_customer()
{
    
}
function list_customer_product()
{
    var id_customer = 48;
    var count = 0;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_customer_product', id_customer: id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                var output=``;
                response.data.forEach(function(item) {
                    count +=1;
                    if(count < 4 )
                    {
                        output  +=` <div class="box-item px-0 py-0">
                                        <div class="thumb-nail">
                                            <img src="${urlserver + item.product_img}" alt="">
                                        </div>
                                        <div class="item-content px-1rem mg-t-1rem">
                                            <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem"> ${item.product_name}</h4>
                                            <span class="t-left fw-400 t-cap fz-15rem lh-15rem"> ${item.product_code}</span>
                                        </div>
                                    </div>`;
                    }
                    
                });
                output +=`  <div class="box-item  px-0 py-0">
                                <div class="empty-item">
                                </div>
                            </div>`;
                $('#list_customer_product').html(output);
            }
        }
    })
}

function list_customer_order()
{
    var id_customer = 48;
    var count = 0 
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', id_customer: id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
               
                var output =``;
                response.data.forEach(function(item) {
                    count =count+1;
                    if(count < 4 )
                    {
                        output += `
                            <div class="box-item px-0 py-0">
                                <div class="thumb-nail">
                                    <img src="../public_customer/images/invoice_dashboard.png" alt="">
                                </div>
                                <div class="item-content px-1rem mg-t-1rem">
                                    <span class="fw-400 fz-1rem t-right">Giao vào ${item.order_date_delivery}</span>
                                    <div class="d-flex justify-content-space-between">
                                        <span>Mã đơn hàng:</span>
                                        <span class="fw-600 fz-15rem"> ${item.order_code}</span>
                                    </div>
                                    <div class="d-flex justify-content-space-between">
                                        <span>Tổng giá trị</span>
                                        <span class="fw-600 fz-15rem"> ${item.order_total_cost} đ</span>
                                    </div>
                                </div>
                            </div>
                        `;
                    }
               
                });
                output += `<div class="box-item empty-item px-0 py-0">
                            
                           </div> `;

                $('#list_customer_order').html(output);

            }
        }
    })

}


function all_customer_product()
{
    var id_customer = 48;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_customer_product', id_customer: id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if(response.success=='true')
            {
                var output=``;
                response.data.forEach(function(item) {
                    output  +=` <div class="box-item px-0 py-0">
                                    <div class="thumb-nail">
                                        <img src="${urlserver + item.product_img}" alt="">
                                    </div>
                                    <div class="item-content px-1rem mg-t-1rem">
                                        <h4 class="t-left fw-600 t-cap fz-15rem lh-15rem"> ${item.product_name}</h4>
                                        <span class="t-left fw-400 t-cap fz-15rem lh-15rem"> ${item.product_code}</span>
                                    </div>
                                </div>`;
                   
                    
                });
                $('#list_customer_product').html(output);
                $('#bot-content').html(``);

            }
        }
    })

}

function all_customer_order()
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
               
                var output =``;
                response.data.forEach(function(item) {
                   
                output += `
                    <div class="box-item px-0 py-0">
                        <div class="thumb-nail">
                            <img src="../public_customer/images/invoice_dashboard.png" alt="">
                        </div>
                        <div class="item-content px-1rem mg-t-1rem">
                            <span class="fw-400 fz-1rem t-right">Giao vào ${item.order_date_delivery}</span>
                            <div class="d-flex justify-content-space-between">
                                <span>Mã đơn hàng:</span>
                                <span class="fw-600 fz-15rem"> ${item.order_code}</span>
                            </div>
                            <div class="d-flex justify-content-space-between">
                                <span>Tổng giá trị</span>
                                <span class="fw-600 fz-15rem"> ${item.order_total_cost} đ</span>
                            </div>
                        </div>
                    </div>
                `;
                    
                });

                $('#list_customer_order').html(output);
                $('#top-content').html(``);

            }
        }
    })

}