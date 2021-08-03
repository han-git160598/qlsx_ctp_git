$(document).ready(function() {
    list_process_module();

});
// module_about_us
var id_module_process;

function list_process_module() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'process_module_manager', type_manager: 'list_process_module' },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                id_module_process = response.data[1].id;
                if (response.data[0].module_img != '') {
                    $("#img_process_module_detail").attr("src", urlserver + response.data[0].module_img);
                }

                $('#section1_process_title_module').val(response.data[0].module_title);

                let output = `
                <button onClick="update_process_module(${response.data[0].id})" class="btn btn-green d-inline-block w-30 ml-3">Cập nhật</button>
                `;
                $('#section1_moudule_title').html(output);
                //////////////////////////////////////////////
                $('#section2_process_title_module').val(response.data[1].module_title);
                list_process_process();
            }
        }
    });
}

function update_process_module(id) {
    var fileToUpload = $('#img_process_module').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "process_module_manager");
    formData.append("type_manager", "update_process_module");
    formData.append("module_img", fileToUpload);
    formData.append("id_module", id);
    formData.append("id_account", $('#id_account').val());
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

            } else {
                alert(response.message);
            }
        }
    });
}
// list_process_process
function list_process_process() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'process_process_manager',
            type_manager: 'list_process_process',
            id_account: $('#id_account').val(),
            //id_module_about: 1
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
                            <span data-tag="a" onclick="show_delete_process_process(${item.id})" type="delete_module" class="get_modal icon-close"><img src="../ctp_admin_web/images/x-black.png" alt=""></span>
                        </div>
                        <div class="form-edit p-0">
                            <div class="form-edit-row my-3">
                                <label class="form-lable">Tiêu đề</label>
                                <input type="text" class="form-input" name="title" data-id="title_1" value="${item.process_title}" readonly>
                            </div>
                            <div class="form-file" data-target="process_2" data-id="1">
                                <div class="form-file-box">
                                    <span data-target="process_2" data-id="${item.id}" class="form-file-view-img d-block">
                                        <img src="${urlserver+item.process_img}" alt="">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="t-right">
                            <span data-tag="a" onclick="show_update_process_process(${item.id})" type="edit_module" class="get_modal btn btn-green"> Cập nhật</span>
                        </div>
                    </div>
                </div>
                `;
                });
            }
            output += `
            <div class="wp-module">
                <span data-tag="a" onclick="show_create_process_process()" type="add_module" class="get_modal module-empty"></span>
            </div>`;
            $('#list_process_process').html(output);
            var module_height = $('.module-empty').parent('.wp-module').prev().children('.module').outerHeight();
            $('.module-empty').css('height', module_height);
        }
    });
}

function show_create_process_process() {
    $('#add_process_process').show();
}

function create_process_process() {
    var fileToUpload = $('#img_process_process').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "process_process_manager");
    formData.append("type_manager", "create_process_process");
    formData.append("process_title", $('#process_title').val());
    formData.append("process_content", $('#process_title').val());
    formData.append("id_module_process", 2);
    formData.append("process_img", fileToUpload);
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
                list_process_process();
                $('#process_title').val('');
                $('#add_process_process').hide();

            } else {
                alert(response.message);
            }
        }
    });
}

function show_update_process_process(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'process_process_manager',
            type_manager: 'list_process_process',
            id_process: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            $('#title_process_process_detail').val(response.data[0].process_title);
            $("#img_process_process_detail1").attr("src", urlserver + response.data[0].process_img);
            let output = `
            <button id="add_file" onclick="update_process_process(${response.data[0].id})" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
            `;
            $('#update_process_process').html(output);
        }
    });

    $('#edit_process_process').show();
}

$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});

function update_process_process(id) {
    var fileToUpload = $('#img_process_process_edit').prop('files')[0];
    if (fileToUpload == undefined) {
        fileToUpload == '';
    }
    var formData = new FormData();
    formData.append("detect", "process_process_manager");
    formData.append("type_manager", "update_process_process");
    formData.append("process_title", $('#title_process_process_detail').val());
    formData.append("process_img", fileToUpload);
    //formData.append("process_content", $('#content_process_process_detail').val());
    formData.append("id_process", id);
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
                list_process_process();
                $('#edit_process_process').hide();
            } else {
                alert(response.message);
            }
        }
    });
}

function show_delete_process_process(id) {
    let output = `<button id="add_file" onClick="delete_process_process(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
    $('#btn_delete_process').html(output);
    $('#delete_process_process').show();
}

function delete_process_process(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'process_process_manager',
            type_manager: 'delete_process_process',
            id_process: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_process_process();
                $('#delete_process_process').hide();
            } else {
                alert(response.message);
            }
        }
    });
}