$(document).ready(function() {
    var page = 1;
    get_list_account(page);
    $('input[name="search"]').keyup(function() {
        filter = $('input[name="search"]').val();
        get_list_account("", filter);
    })

    get_list_permission(page);
    get_list_type(page);
    hidden_pass();


});

// ===========================================================
// =========================ACCOUNT===========================
// ===========================================================
function get_list_account(page, filter = "") {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'account_manager', type_manager: 'list_account', page: page, filter: filter },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                $('.section.list_slide').hide();
                var output = "";
                response.data.forEach(item => {
                    output += `
                    <tr data-id-account="${item.id}" type="edit_module" class="click_doubble get_modal">
                        <td>${item.username}</td>
                        <td>${item.full_name}</td>
                        <td>${item.type_description}</td>
                        <td>${item.phone_number}</td>
                        `;

                    if (item.status_employee == 'Y') {
                        output +=
                            `
                            <td>
                                <label class="switch">
                                    <input type="checkbox" checked name="status_account" data-id="${item.id}">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            `;
                    } else {
                        output +=
                            `
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="status_account" data-id="${item.id}">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        `;
                    }


                    output +=
                        `
                        <td>
                            <span data-tag="a" type="change_pass"
                                class="get_modal t-green-main my-1 ml-4">Mật khẩu</span>
                            <span data-tag="a" type="delete_module" id="delete_account"
                                class="get_modal t-green-main my-1 ml-4">Xoá</span>
                        </td>
                    </tr>
                    `;
                });
                $('#list_account').html(output);

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
                    get_list_account(page, "");
                });


                add_account();
                get_modal_delete_item('account');
                click_delete_account('account_manager');
                // edit
                // click get detail vendor
                click_modal_edit_account('account_manager', 'list_account');
                // call edit vendor
                click_edit_account('account_manager');
                // update status
                update_status_account('account_manager');
                update_password('account_manager');
            }
        }
    });

    // delete_account();

}
// get_account_by_id
function get_account_by_id(detect, type_manager, id_vendor) {
    // "id": "1",
    // "supplier_code": "NCU00233",
    // "supplier_name": "qtc",
    // "supplier_email": "qtc@gmail.com",
    // "supplier_phone": "0336819000",
    // "supplier_address": "Bình Thạnh"
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: detect, type_manager: type_manager, id_user: id_vendor },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                response.data.forEach(item => {
                    $('.modal#edit_module input[name="username"]').val(item.username);
                    $('.modal#edit_module input[name="phone"]').val(item.phone_number);
                    $('.modal#edit_module input[name="email"]').val(item.email);
                    $('.modal#edit_module input[name="fullname"]').val(item.full_name);
                    // $('.modal#edit_module select[name="type_account"]').val(item.type_account);
                    // $('.modal#edit_module select[name="type_account"]').append(`<option value="${item.type_account}">${item.type_description}</option>`);

                    $('.modal#edit_module button#btn_edit_account').attr('data-id', item.id);

                    var role_permission = "";
                    item.role_permission.forEach(sub_item => {
                        role_permission += sub_item.id + ",";
                    });
                    get_list_permission("", role_permission);
                    get_list_type("", item.type_account);
                });
            }
        }
    })
}

function add_account() {
    var role_permission = "";
    var id_type = "";
    $('.modal#add_module input[data-type="role"]').change(function() {
        if ($('.modal#add_module input[data-type="role"]').is(":checked")) {
            role_permission += $(this).attr('id') + ",";
        }
    })
    $('select[name="type_account"]').change(function() {
        id_type = $(this).val();
    })

    var regex_username = /^[A-Za-z0-9_\.]{1,32}$/;
    // var regex_phone = /^[A-Za-z0-9_\.]{1,32}$/;



    $('#btn_add_account').click(function() {
        let username = $('#username').val();
        let phone_number = $('#phone').val();
        let full_name = $('#fullname').val();
        let email = $('#email').val();
        let password = $('#password').val();

        if (regex_username.test(username) == false) {
            alert("Tên đăng nhập không được chứa các kí tự đặc biệt");
            return false;
        }

        let api_data = {
            'detect': 'account_manager',
            'type_manager': 'create_account',
            'username': username,
            'password': password,
            'full_name': full_name,
            'phone_number': phone_number,
            'id_type': id_type,
            'email': email,
            'role_permission': role_permission,
        }
  
        api_bool(api_data, 'admin/customer_list_account');
    })
}

function delete_vendor(detect, type_manager, data) {

    let api_data = {
        'detect': detect,
        'type_manager': type_manager,
        'id_user': data.id_user
    }
    api_bool(api_data, 'admin/customer_list_account');
}

function click_delete_account(detect) {
    $('#submit_delete').click(function() {
        type_manager = 'delete_account';

        id_user = $(this).attr('data-id');

        let data = {
            'id_user': id_user
        }
        delete_vendor(detect, type_manager, data);
    });
}

function click_modal_edit_account(detect, type_manager) {
    $(".click_doubble.get_modal").dblclick(function() {
        var id_modal = $(this).attr('type');
        var id = $(this).attr('data-id-account');
        // console.log(id);
        get_account_by_id(detect, type_manager, id);
        $('#' + id_modal).stop().toggle(300);
    });
}

function click_edit_account(detect) {
    var role_permission = "";
    // var id_type = "";
    $('.modal#edit_module input[data-type="role"]').change(function() {
        if ($('.modal#edit_module input[data-type="role"]').is(":checked")) {
            role_permission += $(this).attr('id').slice(0, 4) + ",";
        }
    });
    // $('.modal#edit_module input[data-type="role"]:checked').each(function() {
    //     console.log(this);
    //     // role_permission += $(this).attr('id').slice(0, 4) + ",";
    // });


    var regex_username = /^[A-Za-z0-9_\.]{1,32}$/;

    $('#btn_edit_account').click(function() {
        $('.modal#edit_module input[data-type="role"]:checked').each(function() {
            role_permission += $(this).attr('id').slice(5) + ",";
        });

        let username = $('.modal#edit_module input[name="username"]').val();
        let phone_number = $('.modal#edit_module input[name="phone"]').val();
        let full_name = $('.modal#edit_module input[name="fullname"]').val();
        let email = $('.modal#edit_module input[name="email"]').val();
        let password = $('.modal#edit_module input[name="username"]').val();
        let id_type = $('.modal#edit_module select[name="type_account"]').val();
        type_manager = 'update_supplier';

        id_user = $(this).attr('data-id');


        if (regex_username.test(username) == false) {
            alert("Tên đăng nhập không được chứa các kí tự đặc biệt");
            return false;
        }

        let api_data = {
            'detect': detect,
            'type_manager': 'update_account',
            'username': username,
            'password': password,
            'full_name': full_name,
            'phone_number': phone_number,
            'id_type': id_type,
            'email': email,
            'role_permission': role_permission,
            'id_user': id_user
        }
        
        api_bool(api_data, 'admin/customer_list_account');
    });
}

function update_status_account(detect) {
    $('.slider.round').click(function() {
        let id_user = $(this).parent().children('input').attr('data-id');
        var status_account = "";
        var color = $(this).change().css("background-color");
        if (color == "rgb(204, 204, 204)") {
            status_account = "Y";
        } else {
            status_account = "N";
        }

        let api_data = {
                'detect': detect,
                'type_manager': 'update_account',
                'status': status_account,
                'id_user': id_user
            }
            // console.log(api_data);
        api_bool(api_data, "");
    })
}

function update_password(detect) {
    $('span[type="change_pass"]').click(function() {
        var id = $(this).parent().parent().attr('data-id-account');
  
        $('#btn_change_pass').click(function() {
            let pass_old = $('#pw-old').val();
            let pass_new = $('#pw-new').val();

            if (pass_new == "" || pass_old == "") {
                alert("Bạn chưa điền thông tin mật khẩu");
                return false;
            }
            if (pass_new != pass_old) {
                alert("Xác nhận mật khẩu không trùng khớp");
                return false;
            }

            let api_data = {
                'detect': detect,
                'type_manager': 'resset_password_account',
                'id_user': id,
                'password_reset': pass_new,
            }
            api_bool(api_data, 'admin/customer_list_account');
        });
    })
}

function hidden_pass() {
    $('.hidden_pass').click(function() {

        var pwd = $(this).parent().children('input');
     
        if (pwd.attr("type") == "password") {
            pwd.attr("type", "text");
        } else {
            pwd.attr("type", "password");
        }
    })

}
// ===========================================================
// =========================PERMISSION========================
// ===========================================================
function get_list_permission(page, role = "") {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'role_permission_manager', type_manager: 'list_role', page: page },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response)
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = "";
                var output_add = "";
                var output_edit = "";
                response.data.forEach(item => {
                    output += `
                    <tr data-id-account="${item.id}" type="edit_module" class="click_doubble get_modal">
                        <td>${item.permission}</td>
                        <td>${item.description}</td>
                    </tr>
                    `;
                    output_add += `
                                    <li class="item bg-F6">
                                        <div class="form-info-row">
                                            <div class="form-info-input-content t-left">
                                                <input type="checkbox" data-type="role" id="${item.id}" class="d-inline-block w-10">
                                                <label for="${item.id}">${item.description}</label>
                                            </div>
                                        </div>
                                    </li>
                    `;

                    role_arr = role.split(',');
 
                    
                        
                        if (role_arr.includes(item.id)) {
                            output_edit += `
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" data-type="role" id="edit_${item.id}" checked class="d-inline-block w-10">
                                                    <label for="edit_${item.id}">${item.description}</label>
                                                </div>
                                            </div>
                                        </li>
                                    `;
                        } else {
                            output_edit += `
                                        <li class="item bg-F6">
                                            <div class="form-info-row">
                                                <div class="form-info-input-content t-left">
                                                    <input type="checkbox" data-type="role" id="edit_${item.id}" class="d-inline-block w-10">
                                                    <label for="edit_${item.id}">${item.description}</label>
                                                </div>
                                            </div>
                                        </li>
                                        `;
                        }
                    

                });
                $('#list_permission').html(output);
                $('#add_role').html(output_add);
                $('#edit_role').html(output_edit);
            }
        }
    });
}
// ===========================================================
// =========================TYPE ACCOUNT======================
// ===========================================================
function get_list_type(page, type = "") {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'account_type_manager', type_manager: 'list_account_type', page: page },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            if (response.success == 'false') {
                alert(response.message)
            } else {
                var output = "";
                var output_add = "";
                var output_edit = "";
                response.data.forEach(item => {
                    output += `
                    <tr data-id-account="${item.id}" type="edit_module" class="click_doubble get_modal">
                        <td>${item.type_account}</td>
                        <td>${item.description}</td>
                    </tr>
                    `;
                    output_add += `
                    <option value="${item.type_account}">${item.description}</option>
                    `;
                    if (type != "") {
                        if (item.id == type) {
                            output_edit += `
                            <option value="${item.type_account}" selected>${item.description}</option>
                            `;
                        } else {
                            output_edit += `
                            <option value="${item.type_account}">${item.description}</option>
                            `;
                        }

                    }

                });
                $('#list_type').html(output);
                $('.modal#add_module select[name="type_account"]').html(output_add);
                $('.modal#edit_module select[name="type_account"]').html(output_edit);
            }
        }
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
                if (end_point != "") {
                    window.location.href = urlserver + end_point;
                }
            }
        }
    });
}