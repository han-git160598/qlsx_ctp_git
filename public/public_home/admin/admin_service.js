$(document).ready(function() {
    list_service_module();
});
// module_about_us
var id_module_service;

function list_service_module() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'service_module_manager', type_manager: 'list_service_module' },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
          
            if (response.success == 'true') {
                $('#section1_service_title_module').val(response.data[0].module_title);
           
                id_module_service = response.data[0].id;

               list_service_service();
            }
        }
    });
}

// list_service_service
function list_service_service() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'service_service_manager',
            type_manager: 'list_service_service',
            id_account: $('#id_account').val(),
            id_module_service: id_module_service
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
    
            var output = ``;
            if (response.success == 'true') {
                response.data.forEach(function(item) {
                    output += `
                    <div class="wp-module">
                        <div class="module">
                            <div class="module-title">
                                <div class="heading">Module 1</div>
                                <span data-tag="a" onclick="show_delete_product_product(${item.id})" type="delete_module" class="get_modal icon-close"><img src="../ctp_admin_web/images/x-black.png" alt=""></span>
                            </div>
                            <div class="module-center  p-3">
                                <span class="item"><img src="../ctp_admin_web/images/icon-badge-check.png" alt=""></span>
                            </div>
                            <div class="form-edit p-0">
                                <div class="form-edit-row my-3">
                                    <label class="form-lable">Tiêu đề</label>
                                    <input type="text" class="form-input" name="title" data-id="title_1" value="${item.service_title}" readonly>
                                </div>
                                <div class="form-edit-row my-3">
                                    <label class="form-lable">Content</label>
                                    <textarea readonly type="text" class="form-input" cols="30" rows="10" name="content" data-id="content_1">${item.service_content}</textarea>
                                </div>
                            </div>
                            <div class="t-right">
                                <span data-tag="a" onclick="show_update_service_service(${item.id})" type="edit_module" class="get_modal btn btn-green">Cập nhật</span>
                            </div>
                        </div>
                    </div>
                `;
                });
            }
            output += `
            <div class="wp-module">
                <span data-tag="a" onclick="show_create_service_service()" type="add_module" class="get_modal module-empty"></span>
            </div>`;
            $('#list_service_service').html(output);

            var module_height = $('.module-empty').parent('.wp-module').prev().children('.module').outerHeight();
            $('.module-empty').css('height', module_height);
        }
    });
}

function show_create_service_service() {
    $('#add_service_service').show();
}

function create_service_service() {
    var fileToUpload = $('#img_service_service').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "service_service_manager");
    formData.append("type_manager", "create_service_service");
    formData.append("service_title", $('#service_title').val());
    formData.append("service_content", $('#service_content').val());
    formData.append("id_module_service", id_module_service);
    formData.append("service_img", fileToUpload);
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_service_service();
                $('#service_title').val('');
                $('#service_content').val('');
                $('#add_service_service').hide();

            } else {
                alert(response.message);
            }
        }
    });
}

function show_update_service_service(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'service_service_manager',
            type_manager: 'list_service_service',
            id_service: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
         
            $('#title_service_service_detail').val(response.data[0].service_title);
            $('#content_service_service_detail').val(response.data[0].service_content);
            $("#img_service_detail1").attr("src", urlserver + response.data[0].service_img);
            let output = `
            <button id="add_file" onclick="update_service_service(${response.data[0].id})" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
            `;
            $('#update_service_service').html(output);
        }
    });

    $('#edit_service_service').show();
}

$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});

function update_service_service(id) {
    console.log(id)
    var fileToUpload = $('#img_service_detail').prop('files')[0];
    if (fileToUpload == undefined) {
        fileToUpload == '';
    }

    var formData = new FormData();
    formData.append("detect", "service_service_manager");
    formData.append("type_manager", "update_service_service");
    formData.append("service_title", $('#title_service_service_detail').val());
    formData.append("service_content", $('#content_service_service_detail').val());
    formData.append("service_img", fileToUpload);
    formData.append("id_service", id);
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_service_service();
                $('#edit_service_service').hide();
            } else {
                alert(response.message);
            }
        }
    });
}

function show_delete_product_product(id) {
    let output = `<button id="add_file" onClick="delete_service_service(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
    $('#btn_delete_service').html(output);
    $('#delete_service_service').show();
}

function delete_service_service(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'service_service_manager',
            type_manager: 'delete_service_service',
            id_service: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {   
            if (response.success == 'true') {
                alert(response.message);
                list_service_service();
                $('#delete_service_service').hide();
            } else {
                alert(response.message);
            }
        }
    });
}