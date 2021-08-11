$(document).ready(function() {
    // get list order
    var order_status = 0;
    var page = 1;
    var tab = '#tab-1';


    var date_begin = "";
    var date_end = "";
    var filter = "";

    $('input[name="date_end"]').change(function() {
        date_begin = $('input[name="date_begin"]').val();
        date_end = $('input[name="date_end"]').val();
        filter = $('input[name="search"]').val();
        get_list_order(order_status, page, tab, date_begin, date_end, filter);
    })

    $('input[name="search"]').keyup(function() {
        date_begin = $('input[name="date_begin"]').val();
        date_end = $('input[name="date_end"]').val();
        filter = $('input[name="search"]').val();
        get_list_order(order_status, page, tab, date_begin, date_end, filter);
    })
    get_list_order(order_status, page, tab, date_begin, date_end, filter);
    $(".tabs-container .sub-menu .sub-item a[data-toggle='tab']").click(function() {
        order_status = $(this).attr('data-order-status');
        tab = $(this).attr('href');

        get_list_order(order_status, page, tab, date_begin, date_end, filter);
    });



})

function get_list_order(order_status = 0, page = 1, tab, date_begin = "", date_end = "", filter = "") {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', order_status: order_status, page: page, date_begin: date_begin, date_end: date_end, filter: filter },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = ``;
                let status_text = '';
                $('.section.list_slide').hide();
                response.data.forEach(function(item) {
                    switch (item.order_status) {
                        case '1':
                            status_text = 'CHỜ XÁC NHẬN';
                            break;
                        case '2':
                            status_text = 'ĐANG XỬ LÝ';
                            break;
                        case '3':
                            status_text = 'GIAO HÀNG';
                            break;
                        case '4':
                            status_text = 'THANH TOÁN';
                            break;
                        case '5':
                            status_text = 'HOÀN TẤT';
                            break;
                        case '6':
                            status_text = 'HỦY ĐƠN';
                            break;
                    }
                    if (tab == '#tab-1') {
                        output += `
                                <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                    <td>${item.order_code}</td>
                                    <td>${item.customer_code}</td>

                                    <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                    <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                    <td>${item.order_total_cost}</td>
                                    `;
                        if (item.order_status == 5) {
                            output +=
                                `
                                                <td class="t-center bg-blue">
                                                    ${status_text}
                                                </td>
                                            </tr>
                                                `;

                        } else {
                            output +=
                                `
                                                <td class="t-center">
                                                    ${status_text}
                                                </td>
                                            </tr>
                                                `;
                        }
                    }
                    if (tab == '#tab-2') {
                        output += `
                                <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                    <td>${item.order_code}</td>
                                    <td>
                                    `;
                        if (typeof item.order_item_product[0] != 'undefined') {
                            output += `
                                        <span class="rounder">
                                        ${item.order_item_product[0].product_code}
                                        </span>

                                    `;
                        }

                        if (item.order_item_product.length >= 2) {
                            output += `
                                            <span class="rounder">+${item.order_item_product.length - 1}</span>
                                        `;
                        }
                        output += `
                                    </td>
                                    <td>${item.customer_code}</td>
                                    <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                </tr>
                                    `;

                    }
                    if (tab == '#tab-3') {
                        output += `
                        <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                        <td>${item.order_code}</td>
                                        <td>${item.customer_code}</td>
                                        <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                        <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                        <td>${item.order_total_cost} đ</td>
                        </tr>
                                    `;

                    }
                    if (tab == '#tab-4') {
                        output += `
                                    <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                        <td>${item.order_code}</td>
                                        <td>${item.customer_code}</td>
                                        <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                        <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                    </tr>
                                    `;

                    }
                    if (tab == '#tab-5') {
                        output += `
                                <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                    <td>${item.order_code}</td>
                                    <td>${item.customer_code}</td>
                                    <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                    <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                    <td>${item.order_total_cost} đ</td>
                                    <td class="t-center py-1">
                                        <button class="btn btn-green btn-outline py-1 px-4" data-name="complete_order">Hoàn tất</button>
                                    </td>

                                </tr>
                                    `;
                    }
                    if (tab == '#tab-6') {
                        output += `
                                <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                    <td>${item.order_code}</td>
                                    <td>${item.customer_code}</td>
                                    <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                    <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                    <td>2021-05-21</td>
                                    <td>${item.order_total_cost} đ</td>
                                </tr>
                                    `;
                    }
                    if (tab == '#tab-7') {
                        output += `
                                <tr data-id-order="${item.id_order}" type="info_processing" class="click_doubble get_modal">
                                    <td>${item.order_code}</td>
                                    <td>${item.customer_code}</td>
                                    <td>${(item.order_date_create != "" && typeof item.order_date_create != "undefined")?item.order_date_create.slice(0, 10):"-"}</td>
                                    <td>${(item.order_date_delivery != "" && typeof item.order_date_delivery != "undefined")?item.order_date_delivery:"-"}</td>
                                    <td>${item.order_record_cancel_note}</td>
                                </tr>
                                    `;
                    }

                });
                $(tab + ' .panel-body table tbody').html(output);


                // pagination
                var pagination = '';
                var page_count = 0;
                if (page > 1) {
                    pagination += `<li class="item prev" data-value="${page - 1}"><i class="fas fa-chevron-left" ></i></li>`;
                }

                page = Number(page);
                var page_next = page + 1;
                if (response.total_page >= 5) {
                    if (page >= 5) {
                        for (var i = 5; i >= 0; i--) {
                            pagination += `<li class="item" data-value="${page_next - i}">${page_next - i}</li>`;
                        }
                    } else {
                        for (var i = 0; i < response.total_page; i++) {
                            pagination += `<li class="item" data-value="${i+1}">${i+1}</li>`;
                        }
                    }
                } else if (response.total_page <= 5) {
                    for (var i = 0; i < response.total_page; i++) {
                        pagination += `<li class="item" data-value="${i+1}">${i+1}</li>`;
                    }
                }

                if (page < response.total_page) {
                    pagination += `<li class="item next" data-value="${page_next}"><i class="fas fa-chevron-right"></i></li>`;
                }

                // if (response.total_page == 1) {
                //     $('ul.pagination').hide();
                // }

                $('ul.pagination').html(pagination);
                $('ul.pagination li.item').click(function() {
                    page = $(this).attr('data-value');
                    get_list_order(order_status, page, tab);
                });

                // click row
                click_get_id_order();

                // click btn "Hoan thanh"
                update_order_status_payment();

            }
        }
    });
}

function get_order_detail_by_id(order_id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'list_order', order_id: order_id },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = ``;
                let status_text = '';
                response.data.forEach(function(item) {
                    switch (item.order_status) {
                        case '1':
                            status_text = 'CHỜ XÁC NHẬN';
                            break;
                        case '2':
                            status_text = 'ĐANG XỬ LÝ';
                            break;
                        case '3':
                            status_text = 'GIAO HÀNG';
                            break;
                        case '4':
                            status_text = 'THANH TOÁN';
                            break;
                        case '5':
                            status_text = 'HOÀN TẤT';
                            break;
                        case '6':
                            status_text = 'HỦY ĐƠN';
                            break;
                    }

                    let order_record_delivery = JSON.parse(item.order_record_delivery);
                    // let order_record_shipping = JSON.parse(item.order_record_shipping);

                    // order_code
                    $(".modal#info_processing div[data-name='order_code']>div").html(`<p>${item.order_code}</p>`);
                    // order_date_create
                    $(".modal#info_processing div[data-name='order_date_create']>div>p").text(item.order_date_create);

                    // order_date_delivery
                    if (Number(item.order_status) == 1) {
                        $(".modal#info_processing div[data-name='order_date_delivery']>div").html(`
                        <input type="date" name="date_give" id="date_give" class="w-40" value="">
                        `);
                    } else if (Number(item.order_status) > 1) {
                        $(".modal#info_processing div[data-name='order_date_delivery']>div").html(`<p>${item.order_date_delivery}</p>`);
                    }
                    // customer_code
                    $(".modal#info_processing div[data-name='customer_code']>div>p").text(item.customer_code);
                    // company
                    $(".modal#info_processing div[data-name='company']>div>p").text(order_record_delivery.delivery_company);
                    // address
                    $(".modal#info_processing div[data-name='address']>div>p").text(order_record_delivery.delivery_address);
                    // order_status
                    $(".modal#info_processing div[data-name='order_status']>div>p").text(status_text);
                    // $(".modal#info_processing div[data-name='order_status']>div #timelog_status").hide();
                    if (Number(item.order_status) == 5) {
                        let timelog_status = item.order_date_update_status[0];
                        $(".modal#info_processing div[data-name='order_status']>div #timelog_status").show().html(`
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3">${timelog_status.finish.slice(0,10)} | ${timelog_status.finish.slice(11,19)}</p>
                                        <p class="t-blue">HOÀN TẤT</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3">${timelog_status.payment.slice(0,10)} | ${timelog_status.payment.slice(11,19)}</p>
                                        <p>THANH TOÁN</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3">${timelog_status.shipping.slice(0,10)} | ${timelog_status.shipping.slice(11,19)}</p>
                                        <p>GIAO HÀNG</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3">${timelog_status.processing.slice(0,10)} | ${timelog_status.processing.slice(11,19)}</p>
                                        <p>ĐANG XỬ LÝ</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <p class="t-lable mr-3">${timelog_status.await_confirm.slice(0,10)} | ${timelog_status.await_confirm.slice(11,19)}</p>
                                        <p>CHỜ XÁC NHẬN</p>
                                    </div>
                        `);
                    } else {
                        $(".modal#info_processing div[data-name='order_status']>div #timelog_status").hide();
                    }



                    // order_record_cancel_note
                    $(".modal#info_processing div[data-name='order_record_cancel_note']>div>p").text(item.order_record_cancel_note);
                    // total
                    if (Number(item.order_status) == 1) {
                        $(".modal#info_processing div[data-name='order_total_cost']>div").html(`
                        <input type="text" value="" name="order_total_cost" id="order_total_cost" placeholder="Nhập giá trị đơn hàng">
                        `);
                    } else if (Number(item.order_status) > 1) {
                        $(".modal#info_processing div[data-name='order_total_cost']>div").html(`<p>${item.order_total_cost}</p>`);
                    }

                    // cancel order
                    if (Number(item.order_status) == 1) {
                        $(".modal#info_processing div[data-name='input_cancel_order']").show().html(`
                            <div for="title" class="form-info-lable">
                                <input type="checkbox" name="cancel_order" id="cancel_order">
                                <label for="cancel_order">Hủy đơn</label>
                            </div>
                            <div class="form-info-input-content t-left">
                                <textarea name="cancel_reason" id="cancel_reason" placeholder="Lí do hủy đơn...."
                                    class="w-100" cols="30" rows="5"></textarea>
                            </div>
                        `);
                    } else if (Number(item.order_status) > 1) {
                        $(".modal#info_processing div[data-name='input_cancel_order']").hide();
                    }
                    // reason cancel order
                    if (Number(item.order_status) == 6) {
                        $(".modal#info_processing div[data-name='reason_cancel_order']").show().html(`
                            <label for="title" class="form-info-lable">Lý do hủy</label>
                            <div class="form-info-input-content t-left">
                                <p>${item.order_record_cancel_note}</p>
                            </div>
                        `);
                    } else if (Number(item.order_status) < 6) {
                        $(".modal#info_processing div[data-name='reason_cancel_order']").hide();
                    }

                    // product item
                    item.order_item_product.forEach(function(sub_item) {
                        output += `
                                <div class="bg-F6 py-2 px-3 my-1">
                                    <div class="py-2" style="border-bottom: 1px dashed #C4C4C4">
                                        <strong>${sub_item.product_name}</strong>
                                        <p class="mt-2">NML-R365${sub_item.product_code}</p>
                                        <p class="mt-2">x${sub_item.product_quantity_packet} ${sub_item.product_packet_title}</p>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <span class="fz-075rem t-lable mr-3">Đơn vị sản phẩm:</span>
                                        <span>${sub_item.product_unit_title}</span>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <span class="fz-075rem t-lable mr-3">Đơn vị đóng gói:</span>
                                        <span>${sub_item.product_packet_title}</span>
                                    </div>
                                    <div class="d-flex py-2 align-item-center">
                                        <span class="fz-075rem t-lable mr-3">Quy cách đóng:</span>
                                        <span>${sub_item.product_unit_packet} ${sub_item.product_unit_title}/${sub_item.product_packet_title}</span>
                                    </div>
                                </div>
                                    `;
                    });
                    $(".modal#info_processing div[data-name='order_item_product']>div").html(output); //product
                    // button
                    if (Number(item.order_status) == 1) {
                        $(".modal#info_processing div[data-name='btn']").show();
                    } else if (Number(item.order_status) > 1) {
                        $(".modal#info_processing div[data-name='btn']").hide();
                    }
                    // update order status
                    // var order_status = "";
                    // if ($("input[type='checkbox']#cancel_order").is(':checked')) {
                    //     order_status = "6";
                    // } else {
                    //     order_status = "2";
                    // }
                    update_order_status_wait_comfirm(order_id);
                });
            }
        }
    });
}

function click_get_id_order() {
    $(".click_doubble.get_modal").dblclick(function() {
        var id_modal = $(this).attr('type');
        var id = $(this).attr('data-id-order');
        $('#' + id_modal).stop().toggle(300);
        console.log(id);
        get_order_detail_by_id(id);
    });
}

function update_order_status_payment() {
    // update complete order status
    $('button[data-name="complete_order"]').click(function() {
        order_status = 5;
        let id_order = $(this).parent().parent().attr('data-id-order');
        // console.log(id_order);
        // console.log(order_status);
        update_order_status(id_order, order_status, "", "", "");
    })
}

function update_order_status_wait_comfirm(id_order) {
    var order_status = "2";
    $('#cancel_reason').hide();
    $("input[type='checkbox']#cancel_order").click(function() {
        if ($(this).is(':checked')) {
            $(".modal#info_processing div[data-name='order_date_delivery']>div>input[name='date_give']").attr('readonly', 'readondy');
            $(".modal#info_processing div[data-name='order_total_cost']>div>input[name='order_total_cost']").attr('readonly', 'readondy');
            $('#cancel_reason').show();
            order_status = "6";
        } else {
            $(".modal#info_processing div[data-name='order_date_delivery']>div>input[name='date_give']").removeAttr('readonly');
            $(".modal#info_processing div[data-name='order_total_cost']>div>input[name='order_total_cost']").removeAttr('readonly');
            $('#cancel_reason').hide();
            order_status = "2";
        }
    })



    $(".modal#info_processing div[data-name='btn']").click(function() {
        let order_total_cost = $('#order_total_cost').val();
        let order_date_delivery = $('#date_give').val();
        let order_record_cancel_note = $('#cancel_reason').val();

        update_order_status(id_order, order_status, order_total_cost, order_date_delivery, order_record_cancel_note);
        // console.log(order_status);
    })
}

function update_order_status(id_order, order_status, order_total_cost, order_date_delivery, order_record_cancel_note) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'update_status_order', id_order: id_order, order_status: order_status, order_total_cost: order_total_cost, order_date_delivery: order_date_delivery, order_record_cancel_note: order_record_cancel_note },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == "false") {
                alert(response.message);
            } else {
                alert(response.message);
                window.location.href = urlserver + 'admin/customer_list_order';
            }
        }
    });
}
