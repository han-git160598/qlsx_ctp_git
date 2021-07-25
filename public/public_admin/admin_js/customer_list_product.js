$(document).ready(function() {
    var page = 1;
    get_list_product(page);
});

// ====================================================
// =======================PRODUCT======================
// ====================================================
function get_list_product(page) {
    // "id_product": "47",
    // "product_code": "0SWD07Z",
    // "product_name": "Chén",
    // "product_img": "images/product_product/9Hn35fAd2LSyd3AgNjVZcj13ptJvRhCe1YzhXEBNlGZbcgORXkqAmtYUnfxg.png",
    // "product_description": "Revision of Autol Sub in L Knee Jt, Open Approach",
    // "category_title": "Ly Nhựa",
    // "product_unit_title": "Ly",
    // "product_packet_title": "Cây",
    // "product_unit_packet": "51",
    // "safety_stock": "50",
    // "current_quantity": "50"
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'product_manager', type_manager: 'list_product', page: page },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = "";
                response.data.forEach(item => {
                    output += `
                                <tr data-id-product="${item.id_product}">
                                        <td>KH1234567${item.product_code}</td>
                                        <td>Nguyễn Văn A${item.product_name}</td>
                                        <td>Công ty Cổ Phần ABCD - Chi nh... ${item.id}</td>
                                        <td>(+84) 944810055${item.id}</td>
                                        <td>
                                            <span class="rounder">
                                                QTR365
                                            </span>
                                            <span class="rounder">+2</span>
                                        </td>
                                        <td>
                                            <a href="product_detail.html" class="t-green-main">Chi tiết</a>
                                        </td>
                                    </tr>
                             `;
                });
            }
        }
    });
}
