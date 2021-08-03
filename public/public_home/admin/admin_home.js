$(document).ready(function() {
    list_slider();
});

function list_slider() {
    $.ajax({
        url: urlapi,
        method: 'post',
        data: { detect: 'home_manager', type_manager: 'list_home', limit: '100' },
        dataType: 'json',
        // headers :headers,
        success: function(response) {
            if (response.success != 'true') {
                alert('Không có dữ liệu');
            } else {
                var output = ``;
                $('#list_home').html(output);
                response.data.forEach(function(item) {
                    output += `
                    <tr data-id-slide="${item.id}" ondblclick="edit_slider(${item.id})" type="edit_module" class="click_doubble get_modal">
                        <td class="stt">${item.home_priority}</td>
                        <td class="thumb-nails"><img src="${urlserver+item.home_img}" alt=""></td>
                        <td>${item.home_title}</td>
                        <td><span data-tag="a" data-id-slide="${item.id}" onClick="show_model_delete_slider(${item.id})"  type="delete_module" class="get_modal t-green-main d-block t-right my-1">Xoá</span></td>
                    </tr>`;
                });

                $('#list_home').html(output);
            }
        }
    });
}
//on off modal
$("span.get_modal").click(function() {
    var id_modal = $(this).attr('type');
    console.log($('#' + id_modal));
    $('#' + id_modal).fadeToggle();
});
$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});

function create_slider() {
    var fileToUpload = $('#attach').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "home_manager");
    formData.append("type_manager", "create_home");
    formData.append("home_title", $('#home_title').val());
    formData.append("home_priority", $('#home_priority').val());
    formData.append("home_img", fileToUpload);
    formData.append("id_account", $('#id_account').val());
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        // headers :headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_slider();
                $("#add_module").hide();
                $('#home_title').val('');
                $('#home_priority').val('');
                $('#home_priority').val('');

            } else {
                alert(response.message);
            }
        }
    });
}

// edit
function edit_slider(id) {
    $.ajax({
        url: urlapi,
        type: 'POST',
        data: { detect: 'home_manager', type_manager: 'list_home', id_home: id },
        dataType: 'json',
        // headers :headers,
        success: function(response) {
            $('#home_title_detail').val(response.data[0].home_title);
            $('#home_priority_detail').val(response.data[0].home_priority);
            $('#home_img_detail').attr('src', urlserver + response.data[0].home_img);
            var output = `
            <button id="add_file" onclick="update_slider(${response.data[0].id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>
            `;
            $("#btn_edit_home").html(output);
        }
    });
    $('#edit_module_home').show();
}
//update
function update_slider(id) {
    var fileToUpload = $('#home_img_detail').prop('files')[0];
    if (fileToUpload == undefined) {
        fileToUpload = '';
    }
    var formData = new FormData();
    formData.append("detect", "home_manager");
    formData.append("type_manager", "update_home");
    formData.append("home_title", $('#home_title_detail').val());
    formData.append("home_priority", $('#home_priority_detail').val());
    formData.append("home_img", fileToUpload);
    formData.append("id_home", id);
    formData.append("id_account", $('#id_account').val());
    $.ajax({
        url: urlapi,
        type: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        // headers :headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_slider();
                $('#edit_module_home').hide();
            } else {
                alert(response.message);
            }
        }
    });
}

function show_model_delete_slider(id) {
    let output = `<button id="add_file" onclick="delete_slider(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
    $('#btn_delete_home').html(output);
    $('#delete_module_home').show();

}

function delete_slider(id) {
    console.log(123)
    $.ajax({
        url: urlapi,
        type: 'POST',
        data: { detect: 'home_manager', type_manager: 'delete_home', id_home: id },
        dataType: 'json',
        // headers :headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_slider();
                $('#delete_module_home').hide();
            } else {
                alert(response.message);
            }
        }
    });

}