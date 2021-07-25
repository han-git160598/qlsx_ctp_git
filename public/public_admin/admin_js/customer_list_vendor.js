$(document).ready(function() {
    var detect = 'supplier_manager';
    // call list vendor
    var type_manager = 'list_supplier';
    var page = 1;
    get_list_vendor(detect, type_manager, page);

    var vendor_code;
    var vendor_name;
    var vendor_phone;
    var vendor_email;
    var vendor_address;

    var id_admin;
    // call add vendor
    click_add_vendor(detect);
});

function get_list_vendor(detect, type_manager, page) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect, type_manager: type_manager, page: page },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = "";
                response.data.forEach(item => {
                    output += `
                            <tr data-id-vendor="${item.id}" type="edit_vendor" class="click_doubble get_modal">
                                <td>${item.supplier_code}</td>
                                <td>${item.supplier_name}</td>
                                <td>${item.supplier_phone}</td>
                                <td>${item.supplier_email}</td>
                                <td>
                                    <span data-tag="a" type="delete_module" class="get_modal t-green-main my-1 ml-4">Xoá</span>
                                </td>
                            </tr>
                             `;
                });
                $('#list_vendor').html(output);

                // click get detail vendor
                click_modal_edit_vendor(detect, type_manager);
                // call edit vendor
                click_edit_vendor(detect);
                // delete vendor
                get_modal_delete_item('vendor');
                click_delete_vendor(detect);

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

                if (response.total_page == 1) {
                    $('ul.pagination').hide();
                }

                $('ul.pagination').html(pagination);
                $('ul.pagination li.item').click(function() {
                    page = $(this).attr('data-value');
                    get_list_vendor(detect, type_manager, page);
                });
            }
        }
    });
}

function add_vendor(detect, type_manager, data) {
    // supplier_name:qtc
    // supplier_phone:0336819000
    // supplier_address:Bình Thạnh
    // supplier_code:NCU00233
    // supplier_email:qtc@gmail.com
    let api_data = {
        'detect': detect,
        'type_manager': type_manager,
        'supplier_name': data.vendor_name,
        'supplier_address': data.vendor_address,
        'supplier_phone': data.vendor_phone,
        'supplier_code': data.vendor_code,
        'supplier_email': data.vendor_email,
        'id_admin': data.id_admin
    }
    api_bool(api_data, 'admin/customer_list_vendor');
};

function edit_vendor(detect, type_manager, data) {
    // - update_supplier
    // + id_supplier
    // + supplier_code
    // + supplier_name
    // + supplier_phone
    // + supplier_email
    // + supplier_address
    let api_data = {
        'detect': detect,
        'type_manager': type_manager,
        'id_supplier': data.id_vendor,
        'supplier_name': data.vendor_name,
        'supplier_address': data.vendor_address,
        'supplier_phone': data.vendor_phone,
        'supplier_code': data.vendor_code,
        'supplier_email': data.vendor_email,
        'id_admin': data.id_admin
    }
    api_bool(api_data, 'admin/customer_list_vendor');
}

function delete_vendor(detect, type_manager, data) {
    // - update_supplier
    // + id_supplier
    // + supplier_code
    // + supplier_name
    // + supplier_phone
    // + supplier_email
    // + supplier_address
    let api_data = {
        'detect': detect,
        'type_manager': type_manager,
        'id_supplier': data.id_vendor,
        'id_admin': data.id_admin
    }
    api_bool(api_data, 'admin/customer_list_vendor');
}

// get_vendor_by_id
function get_vendor_by_id(detect, type_manager, id_vendor) {
    // "id": "1",
    // "supplier_code": "NCU00233",
    // "supplier_name": "qtc",
    // "supplier_email": "qtc@gmail.com",
    // "supplier_phone": "0336819000",
    // "supplier_address": "Bình Thạnh"
    console.log(id_vendor);
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect, type_manager: type_manager, id_supplier: id_vendor },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                response.data.forEach(item => {
                    $('.modal#edit_vendor input[name="vendor_code"]').val(item.supplier_code);
                    $('.modal#edit_vendor input[name="vendor_name"]').val(item.supplier_name);
                    $('.modal#edit_vendor input[name="vendor_email"]').val(item.supplier_email);
                    $('.modal#edit_vendor input[name="vendor_phone"]').val(item.supplier_phone);
                    $('.modal#edit_vendor input[name="vendor_address"]').val(item.supplier_address);

                    $('.modal#edit_vendor button#btn_edit_vendor').attr('data-id', item.id);

                    console.log($('.modal#edit_vendor input[name="vendor_code"]').val(item.supplier_code));
                });
            }
        }
    })
}
// btn click
function click_add_vendor(detect) {
    $('#btn_add_vendor').click(function() {
        type_manager = 'create_supplier';
        vendor_code = $('.modal#add_vendor input[name="vendor_code"]').val();
        vendor_name = $('.modal#add_vendor input[name="vendor_name"]').val();
        vendor_phone = $('.modal#add_vendor input[name="vendor_phone"]').val();
        vendor_email = $('.modal#add_vendor input[name="vendor_email"]').val();
        vendor_address = $('.modal#add_vendor input[name="vendor_address"]').val();

        id_admin = JSON.parse(localStorage.getItem('account_customer')).id;

        let data = {
            'vendor_code': vendor_code,
            'vendor_name': vendor_name,
            'vendor_phone': vendor_phone,
            'vendor_email': vendor_email,
            'vendor_address': vendor_address,
            'id_admin': id_admin
        }
        add_vendor(detect, type_manager, data);
    });
}

function click_modal_edit_vendor(detect, type_manager) {
    $(".click_doubble.get_modal").dblclick(function() {
        var id_modal = $(this).attr('type');
        var id = $(this).attr('data-id-vendor');
        console.log(id);
        get_vendor_by_id(detect, type_manager, id);
        $('#' + id_modal).stop().toggle(300);
    });
}

function click_edit_vendor(detect) {
    $('#btn_edit_vendor').click(function() {
        type_manager = 'update_supplier';
        vendor_code = $('.modal#edit_vendor input[name="vendor_code"]').val();
        vendor_name = $('.modal#edit_vendor input[name="vendor_name"]').val();
        vendor_phone = $('.modal#edit_vendor input[name="vendor_phone"]').val();
        vendor_email = $('.modal#edit_vendor input[name="vendor_email"]').val();
        vendor_address = $('.modal#edit_vendor input[name="vendor_address"]').val();

        id_vendor = $(this).attr('data-id');
        id_admin = JSON.parse(localStorage.getItem('account_customer')).id;

        let data = {
            'id_vendor': id_vendor,
            'vendor_code': vendor_code,
            'vendor_name': vendor_name,
            'vendor_phone': vendor_phone,
            'vendor_email': vendor_email,
            'vendor_address': vendor_address,
            'id_admin': id_admin
        }
        edit_vendor(detect, type_manager, data);
    });
}

function click_delete_vendor(detect) {
    $('#submit_delete').click(function() {
        type_manager = 'delete_supplier';

        id_vendor = $(this).attr('data-id');
        id_admin = JSON.parse(localStorage.getItem('account_customer')).id;

        let data = {
            'id_vendor': id_vendor,
            'id_admin': id_admin
        }
        delete_vendor(detect, type_manager, data);
    });
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
