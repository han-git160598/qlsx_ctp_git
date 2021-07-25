// Chưa làm xong
$(document).ready(function() {
    var item_type = 'product';
    get_list_inventory(item_type);
    $('input[name="search"]').keyup(function() {
        filter = $('input[name="search"]').val();
        get_list_inventory(item_type, 1, filter);
    });
    click_tab_get_item_type();





    current_date();
    // btn_add_product();
    // btn_add_NVL();
    get_type_api();
    // get_list_material_into_select();
    // get_detail_material();



});

function click_tab_get_item_type() {
    $('ul.sub-menu li.sub-item a').click(function() {
        item_type = $(this).attr('data-item_type');
        get_list_inventory(item_type);
        $('input[name="search"]').keyup(function() {
            filter = $('input[name="search"]').val();
            get_list_inventory(item_type, 1, filter);
        });
    });
}

function get_list_inventory(item_type, page = 1, filter = "") {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'inventory_manager', type_manager: 'list_inventory', item_type: item_type, page: page, filter: filter },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                $('.section.list_slide').hide();
                var output = "";
                response.data.forEach(item => {
                    // ${urlserver + '/admin/customer_inventory_detail'}
                    output += `
                            <tr data-id="${item.id_inventory}">
                                <td>${item.inventory_date}</td>
                                <td>${item.inventory_code}</td>
                                <td class="t-center">
                                    <a data-name="inventory_detail" href="${urlserver + 'admin/customer_inventory_detail'}"
                                        class="t-green-main my-1">Chi tiết</a>
                                </td>
                            </tr>
                              `;
                });

                if (item_type == 'product') {
                    $('#product table tbody').html(output);
                } else {
                    $('#material table tbody').html(output);
                }

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
                    get_list_inventory(item_type, page, "");
                });
                inventory_detail(item_type);
            }

        }
    });
}

function inventory_detail(item_type) {
    $('a[data-name="inventory_detail"]').click(function() {
        var id = $(this).parent().parent().attr('data-id');
        localStorage.setItem('id_inventory', id);
        localStorage.setItem('item_type', item_type);
    });
}

function get_type_api() {
    var type_api = 'product';
    $('span[type="add_inventory_product"]').click(function() {
        type_api = 'product';
        btn_add_product(type_api);
        btn_submit(type_api);

    });
    $('span[type="add_inventory_material"]').click(function() {
        type_api = 'material';
        btn_add_NVL(type_api);
        btn_submit(type_api);
    })

}

function btn_add_product(type_api) {
    $('#btn_add_product').click(function() {
        var stt_last_child = $(this).parent().children('div').last().children().last().attr('data-stt');
        var stt_current = 1
        if (typeof(stt_last_child) == 'undefined') {
            var stt_current = 1;
        } else {
            var stt_current = Number(stt_last_child) + 1;
        }
        $(this).parent().children('div').last().append(`
                        <div class="box bg-F6" style="position: relative;" date-type="choose_product" data-stt="${stt_current}">
                            <i class="fas fa-times-circle btn_close"
                                style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i>
                            <div class="form-edit p-3">
                                <div class="form-edit-row-flex">
                                    <div class="form-box-flex w-100">
                                        <label for="inventory_name" class="form-lable">Sản phẩm</label>
                                        <select name="inventory_name" class="form-select">
                                            <option value="0">Chọn sản phẩm</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- chỉ show khi đã chọn NVL -->
                            <div class="t-left px-3" data-type="detail_product" >
                            </div>
                        </div>
        `);
        get_list_material_into_select(type_api);
        get_detail_inventory(type_api);
        btn_delete_element();
        // get_type_api();
        // get_list_material_into_select();
        // get_detail_material();
    });
}

function btn_add_NVL(type_api) {
    $('#btn_add_NVL').click(function() {
        var stt_last_child = $(this).parent().children('div').last().children().last().attr('data-stt');
        var stt_current = 1
        if (typeof(stt_last_child) == 'undefined') {
            var stt_current = 1;
        } else {
            var stt_current = Number(stt_last_child) + 1;
        }
        $(this).parent().children('div').last().append(`
                        <div class="box bg-F6" style="position: relative;" date-type="choose_NVL" data-stt="${stt_current}">
                            <i class="fas fa-times-circle btn_close"
                                style="position:absolute;top:.5rem; right:.5rem; cursor:pointer;"></i>
                            <div class="form-edit p-3">
                                <div class="form-edit-row-flex">
                                    <div class="form-box-flex w-100">
                                        <label for="inventory_name" class="form-lable">NVL</label>
                                        <select name="inventory_name" class="form-select">
                                            <option value="0">Chọn NVL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- chỉ show khi đã chọn NVL -->
                            <div class="t-left px-3" data-type="detail_NVL" >
                            </div>
                        </div>
        `);
        get_list_material_into_select(type_api);
        get_detail_inventory(type_api);
        btn_delete_element();

    });
}

function btn_delete_element() {
    $('.btn_close').click(function() {
        $(this).parent().remove();
    });
}
// list inventory
function get_list_material_into_select(type_api) {

    var detect;
    if (type_api == 'product') {
        detect = 'get_customer_product';
    } else {
        detect = 'get_material_list';
    }
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                response.data.forEach(function(item) {
                    if (detect == 'get_customer_product') {
                        $('select[name="inventory_name"]').append(`
                            <option value="${item.id_product}">${item.product_code}</option>
                            `);
                    } else {
                        $('select[name="inventory_name"]').append(`
                            <option value="${item.id}">${item.material_code}</option>
                            `);
                    }

                });
            }
        }
    });



}
// detail inventory popup
function get_detail_inventory(type_api) {
    var detect;
    if (type_api == 'product') {
        detect = 'get_customer_product';
    } else {
        detect = 'get_material_list';
    }
    $('select[name="inventory_name"]').change(function() {
        var id_inventory = $(this).children("option:selected").val();
        var stt = $(this).parent().parent().parent().parent().attr('data-stt');
        if (Number(id_inventory) != 0) {
            var output = "";
            if (type_api == 'product') {
                call_api_detail_product(detect, id_inventory, stt);
            } else {
                call_api_detail_NVL(detect, id_inventory, stt);
            }

        }
    });
}

function call_api_detail_product(detect, id_inventory, stt) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect, id_product: id_inventory },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                response.data.forEach(function(item) {
                    output = `
                        <p class="my-2">ĐVT: <strong>${item.product_unit_title}</strong></p>
                        <p class="my-2">Số lượng hiện tại: <strong>${item.current_quantity}</strong></p>

                        <div class="d-flex">
                            <p class="my-2 mr-2">Số lượng sau kiểm kê:
                            </p>
                            <div class="amount" style="display: inline-block;">
                                <button class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="text" value="1">
                                <button class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                                 `;

                });
                $('div[date-type="choose_product"][data-stt="' + stt + '"]').children('div[data-type="detail_product"]').html(output);
                plus_minus(stt);
            }
        }
    });
}

function call_api_detail_NVL(detect, id_inventory, stt) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect, id_material: id_inventory },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                response.data.forEach(function(item) {
                    output = `
                        <p class="my-2">ĐVT: <strong>${item.unit_title}</strong></p>
                        <p class="my-2">Số lượng hiện tại: <strong>${item.current_quantity}</strong></p>

                        <div class="d-flex">
                            <p class="my-2 mr-2">Số lượng sau kiểm kê:
                            </p>
                            <div class="amount" style="display: inline-block;">
                                <button class="minus"><img src="../public_admin/images/minus.png" alt=""></button>
                                <input type="text" value="1">
                                <button class="plus"><img src="../public_admin/images/plus.png" alt=""></button>
                            </div>
                        </div>
                                 `;

                });
                $('div[date-type="choose_NVL"][data-stt="' + stt + '"]').children('div[data-type="detail_NVL"]').html(output);
                plus_minus(stt);
            }
        }
    });
}

function btn_submit(type_api) {
    $('.btn_submit').click(function() {
        var list_item = [];
        var id, current_quantity, inventory_quantity, inventory_date, id_admin;
        if (type_api == 'product') {
            $('#element_product div[date-type="choose_product"]').each(function(index) {
                id = $(this).children('div').first().children().children().children('select.form-select').val();
                current_quantity = $(this).children('div').last().children('p').last().children('strong').text();
                inventory_quantity = $(this).children('div').last().children('div').children('div').children('input').val();
                list_item.push({
                    id: id,
                    current_quantity: current_quantity,
                    inventory_quantity: inventory_quantity,
                });
            });
            id_admin = JSON.parse(localStorage.getItem('account_customer')).id;
            inventory_date = $('.modal#add_inventory_product input[name="current_date"]').val();

            console.log(JSON.stringify(list_item));
            if (JSON.stringify(list_item) == "[]" || JSON.stringify(list_item) == "[{\"id\":\"0\",\"current_quantity\":\"\"}]") {
                alert("Vui lòng nhập thông tin kiểm kê");
                return false;
            }
            let api_data = {
                detect: 'inventory_manager',
                type_manager: 'create_inventory',
                id_admin: id_admin,
                inventory_date: inventory_date,
                item_type: type_api,
                list_item: JSON.stringify(list_item),
            }

            api_bool(api_data, 'admin/customer_list_inventory');

        } else {
            $('#element_material div[date-type="choose_NVL"]').each(function(index) {
                id = $(this).children('div').first().children().children().children('select.form-select').val();
                current_quantity = $(this).children('div').last().children('p').last().children('strong').text();
                inventory_quantity = $(this).children('div').last().children('div').children('div').children('input').val();
                list_item.push({
                    id: id,
                    current_quantity: current_quantity,
                    inventory_quantity: inventory_quantity,
                });
            });
            id_admin = JSON.parse(localStorage.getItem('account_customer')).id;
            inventory_date = $('.modal#add_inventory_material input[name="current_date"]').val();
            if (JSON.stringify(list_item) == "[]" || JSON.stringify(list_item) == "[{\"id\":\"0\",\"current_quantity\":\"\"}]") {
                alert("Vui lòng nhập thông tin kiểm kê");
                return false;
            }
            let api_data = {
                detect: 'inventory_manager',
                type_manager: 'create_inventory',
                id_admin: id_admin,
                inventory_date: inventory_date,
                item_type: type_api,
                list_item: JSON.stringify(list_item),
            }

            api_bool(api_data, 'admin/customer_list_inventory');
        }
        // call_api_add_inventory(type_api);
    })
}

// function call_api_add_inventory(type_api) {
//     $.ajax({
//         url: urlapi,
//         method: 'POST',
//         data: { detect: 'inventory_manager', type_manager: 'create_inventory', item_type: type_api },
//         dataType: 'json',
//         headers: headers,
//         success: function(response) {
//             if (response.success == 'false') {
//                 alert(response.message)
//             } else {}
//         }
//     });
// }

function plus_minus(stt) {
    var val = "";
    $('div[data-stt="' + stt + '"] .amount .minus').click(function() {
        val = $(this).parent().children('input[type="text"]').val();
        if (Number(val) > 0) {
            val--;
            $(this).parent().children('input[type="text"]').val(val);
        }
    });
    $('div[data-stt="' + stt + '"] .amount .plus').click(function() {
        val = $(this).parent().children('input[type="text"]').val();
        val++;
        $(this).parent().children('input[type="text"]').val(val);
    });
}

function current_date() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('#add_inventory_product input[name="current_date"]').val(today);
    $('#add_inventory_material input[name="current_date"]').val(today);
}

// type api
function api_bool(api_data, end_point) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: api_data,
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message);
            } else {
                alert(response.message);
                window.location.href = urlserver + end_point;
            }
        }
    });
}