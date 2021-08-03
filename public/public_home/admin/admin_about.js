$(document).ready(function() {

    $("#main-menu li:nth-child(2)").addClass("active");
    list_about_module();

});
// module_about_us
var id_module_about;

function list_about_module() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'about_module_manager', type_manager: 'list_about_module' },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                id_module_about = response.data[0].id;

                let section1 = `
                        <input type="text" readonly class="form-input w-60" id="module_title${response.data[0].id}" name="address_name" data-id="address_name" value="${response.data[0].module_title}">
                        <button onclick="update_about_module(${response.data[0].id})" class="btn btn-green d-inline-block w-30 ml-3">Cập nhật</button>
                        `;
                $('#section1').html(section1);
                //////////////////////////////////////////////
                let section2_title = `<input readonly type="text" class="form-input w-60" id="module_title${response.data[1].id}" name="address_name" data-id="address_name" value="${response.data[1].module_title}">`;
                $('#section2_title').html(section2_title);

                //CKEDITOR.instances['editor1'].setData(response.data[1].module_content);
                CKEDITOR.replace('editor1');
                $("#editor1").text(response.data[1].module_content);

                let btn_update = `
                        <h1 class="heading">Section 2</h1>
                        <button onClick="update_about_module(${response.data[1].id})" class="btn btn-green">Cập nhật</button>
                        `;
                $('#btn_section2').html(btn_update);
                list_about_about();
            }
        }
    });
}

function update_about_module(id) {
    var module_title = $('#module_title' + id).val();
    var module_content = $('#editor1').val();
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'about_module_manager',
            type_manager: 'update_about_module',
            module_title: module_title,
            module_content: module_content,
            id_account: $('#id_account').val(),
            id_module: id
        },
        dataType: 'json',
        // headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
            } else {
                alert(response.message);
            }

        }
    });
}
// about_about_us
function list_about_about() {

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'about_about_manager',
            type_manager: 'list_about_about',
            id_account: $('#id_account').val(),
            id_module_about: id_module_about
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            var output = ``;
            response.data.forEach(function(item) {

                if (response.success == 'true') {
                    output += `
                    <div class="wp-module">
                        <div class="module">
                            <div class="module-title">
                                <div class="heading">Module 1</div>
                                <span data-tag="a" data-id-slide="${item.id}" onclick="show_delete_about_about(${item.id})" type="delete_module" class="get_modal icon-close"><img src="../ctp_admin_web/images/x-black.png" alt=""></span>
                            </div>
                            <div class="module-center  p-3">
                                <span class="item"><img src="../ctp_admin_web/images/icon-badge-check.png" alt=""></span>
                            </div>
                            <div class="form-edit p-0">
                                <div class="form-edit-row my-3">
                                    <label class="form-lable">Tiêu đề</label>
                                    <input type="text" class="form-input" name="title" data-id="title_1" value="${item.about_title}" readonly>
                                </div>
                                <div class="form-edit-row my-3">
                                    <label class="form-lable">Content</label>
                                    <textarea readonly type="text" class="form-input" cols="30" rows="10" name="content" data-id="content_1">${item.about_content}</textarea>
                                </div>
                            </div>
                            <div class="t-right">
                                <span data-tag="a" data-id-slide="${item.id}" onclick="show_update_about_about(${item.id})" type="edit_module" class="get_modal btn btn-green"> Cập nhật</span>
                            </div>
                        </div>
                    </div>
                    `;
                }
            });


            output += `<div class="wp-module">
                        <span data-tag="a" onclick="show_create_about_about()" type="add_module" class="get_modal module-empty"></span>
                </div>`;
            $('#list_about_about').html(output);
            var module_height = $('.module-empty').parent('.wp-module').prev().children('.module').outerHeight();
            $('.module-empty').css('height', module_height);
        }
    });

}

function show_create_about_about() {
    $('#add_about_about').show();
}

function create_about_about() {

    var fileToUpload = $('#img_about_about').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "about_about_manager");
    formData.append("type_manager", "create_about_about");
    formData.append("about_title", $('#title_about_about').val());
    formData.append("about_content", $('#content_about_about').val());
    formData.append("about_img", fileToUpload);
    formData.append("id_module_about", id_module_about);
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
                $('#add_about_about').hide();
                $('#title_about_about').val('');
                $('#content_about_about').val('')
                list_about_about();
            } else {
                alert(response.message);
            }
        }
    });
}

function show_update_about_about(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'about_about_manager',
            type_manager: 'list_about_about',
            id_about: id,
            id_module_about: id_module_about
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                $('#title_about_about_detail').val(response.data[0].about_title);
                $('#content_about_about_detail').text(response.data[0].about_content);

                $("#img_about_about_detail1").attr("src", urlserver + response.data[0].about_img);

                let output = `
                <button id="add_file" onclick="update_about_about(${response.data[0].id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
                `;
                $('#update_about_about').html(output);
            } else {
                alert(response.message);
            }

        }
    });

    $('#edit_about_about').show();
}

$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});

function update_about_about(id) {

    var fileToUpload = $('#img_about_about_detail').prop('files')[0];
    if (fileToUpload == undefined) {
        fileToUpload = '';
    }
    var formData = new FormData();
    formData.append("detect", "about_about_manager");
    formData.append("type_manager", "update_about_about");
    formData.append("about_title", $('#title_about_about_detail').val());
    formData.append("about_content", $('#content_about_about_detail').val());
    formData.append("id_about", id);
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
                 list_about_module();
                $('#edit_about_about').hide();

            } else {
                alert(response.message);
            }

        }
    });
}

function show_delete_about_about(id) {
    let output = `<button id="add_file" onclick="delete_about_about(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
    $('#btn_delete_about_about').html(output);
    $('#delete_about_about').show();
}

function delete_about_about(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'about_about_manager',
            type_manager: 'delete_about_about',
            id_about: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_about_about();
                $('#delete_about_about').hide();
            } else {
                alert(response.message);
            }
        }
    });
}