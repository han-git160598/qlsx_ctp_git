$(document).ready(function() {

    list_announce();
})
function list_announce()
{
    let id_customer = item.id
    let output =``;
     $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'get_list_order_log',id_customer:id_customer, limit:100},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response)
            response.data.forEach(function(item) {
                output +=`
                <div class="box-item d-flex mg-b-1rem px-3 py-5 w-100">
                    <div class="icon mg-r-15rem"><img src="../public_customer/images/icon-invoice.png" alt=""></div>
                    <div>
                        <div class="item-title d-flex">
                            <p class="fw-600 fz-125rem">Chấp nhận yêu cầu hủy đơn</p>
                        </div>
                        <div class="item-content">
                            <p class="fw-400">Yêu cầu hủy đơn của bạn đã được chấp nhận</p>
                            <p class="fw-400">Mã đơn hàng <strong>${item.order_code}</strong> đã được hủy thành công</p>
                            <p>
                                <span>${item.process_date}</span>
                            </p>
                        </div>
                    </div>
                </div>`;

            });
            $('#list_announce').html(output);
        }
    });

    

    
}