
$(document).ready(function() {
    $("#main-menu li:nth-child(4)").addClass("active");
    list_product_module();
});
// module_about_us
var id_module_product;

function list_product_module() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'product_module_manager', type_manager: 'list_product_module' },
        dataType: 'json',
        //headers: headers,
        success: function(response) {

            if (response.success == 'true') {

                if (response.data[0].module_img != '') {
                    $("#img_product_module_detail").attr("src", urlserver + response.data[0].module_img);
                } 

                $('#section1_product_title_module').val(response.data[0].module_title);
                let output = `
                <button onclick="update_product_module(${response.data[0].id})" class="btn btn-green d-inline-block ml-3">Cập nhật</button>
                `;
                $('#section1_moudule_title').html(output);

                ////section 2

                $('#section2_product_title_module').val(response.data[1].module_title);
                id_module_product = response.data[1].id;
                list_product_product();
            }
        }
    });
}

function update_product_module(id) {
    try {
        var fileToUpload = $('#img_product_module').prop('files')[0];

        if (fileToUpload == undefined) {
            fileToUpload = '123';
        }
        console.log(fileToUpload)
        console.log($('#id_account').val());
        console.log(id)
        var formData = new FormData();
        formData.append("detect", "product_module_manager");
        formData.append("type_manager", "update_product_module");
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
    } catch (e) {
        e.message;
        console.log(e.message)
    }

}
// list_product_product
function list_product_product() {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'product_product_manager',
            type_manager: 'list_product_product',
            id_account: $('#id_account').val(),
            id_module_product: id_module_product
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            var output = ``;
            if (response.success == 'true') {
                console.log(response)
                response.data.forEach(function(item) {
                    output += `
                    <div class="wp-module">
                    <div class="form-edit px-0 py-4">
                        <div class="form-edits-row-check">`;
                            if(item.product_hot=='N')
                            {
                                output += `<input type="checkbox" onclick="product_hot(${item.id})" name="prod_hot" id="prod_hot${item.id}" class="form-input-check">`;
                            }else{
                                output +=   `<input type="checkbox"  onclick="product_hot(${item.id})" checked name="prod_hot" id="prod_hot${item.id}" class="form-input-check">`;
                            }

                          
                    output += `<label for="prod_hot" class="form-lable-check">Sản phẩm nổi bật</label>
                        </div>
                    </div>
                    <div class="module w-100">
                        <div class="module-title">
                            <div class="heading">Module 1</div>
                            <span data-tag="a" type="delete_module" onclick="show_delete_product_product(${item.id})" class="get_modal icon-close"><img src="../ctp_admin_web/images/x-black.png" alt=""></span>
                        </div>
                        <div class="form-edit p-0">
                            <div class="form-edit-row my-3">
                                <label class="form-lable">Tên sản phẩm</label>
                                <input type="text" class="form-input" name="title" data-id="${item.id}" value="${item.product_title}" readonly>
                            </div>
                            <div class="form-edit-row my-3">
                                <label class="form-lable">Danh mục</label>
                                <input type="text" class="form-input" name="title" data-id="${item.id}" value="${item.product_category}" readonly>
                            </div>
                            <div class="form-file" data-target="process_2" data-id="1">
                                <div class="form-file-box">
                                    <span data-target="process_2" data-id="${item.id}" class="form-file-view-img d-block">
                                        <img src="${urlserver+item.product_img}" alt="">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="t-right">
                            <span data-tag="a" onclick="show_update_product_product(${item.id})" type="edit_module" class="get_modal btn btn-green"> Cập nhật</span>
                        </div>
                    </div>
                </div>
                `;
                });
            }
            output += `
            <div class="wp-module">
                <div class="form-edit px-0 py-4 visible-hidden">
                    <div class="form-edits-row-check">
                        <input type="checkbox" name="prod_hot" id="prod_hot" class="form-input-check">
                        <label for="prod_hot" class="form-lable-check">Sản phẩm nổi bật</label>
                    </div>
                </div>
                <span data-tag="a" onclick="show_create_product_product()" type="add_module" class="get_modal module-empty">
                </span>
            </div>`;
            $('#list_product_product').html(output);

            var module_height = $('.module-empty').parent('.wp-module').prev().children('.module').outerHeight();
            $('.module-empty').css('height', module_height);
        }
    });
}

function show_create_product_product() {
    $('#add_product_product').show();
}

function create_product_product() {
    var fileToUpload = $('#img_product_product').prop('files')[0];
    var formData = new FormData();
    formData.append("detect", "product_product_manager");
    formData.append("type_manager", "create_product_product");
    formData.append("product_title", $('#product_title').val());
    formData.append("product_category", $('#product_category').val());
    formData.append("id_module_product", id_module_product);
    formData.append("product_img", fileToUpload);
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
                list_product_product();
                $('#product_title').val('');
                $('#product_category').val('');
                $('#add_product_product').hide();

            } else {
                alert(response.message);
            }
        }
    });
}

function show_update_product_product(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'product_product_manager',
            type_manager: 'list_product_product',
            id_product: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            $('#title_product_product_detail').val(response.data[0].product_title);
            $('#category_product_product_detail').val(response.data[0].product_category);
            $("#img_product_product_detail1").attr("src", urlserver + response.data[0].product_img);
            let output = `
            <button id="add_file" onclick="update_product_product(${response.data[0].id})" class="btn-submit w-30 d-inline-block fz-1rem">Hoàn thành</button>
            `;
            $('#update_product_product').html(output);
        }
    });

    $('#edit_product_product').show();
}

$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});

function update_product_product(id) {
   var fileToUpload = $('#img_product_detail').prop('files')[0];
    if (fileToUpload == undefined) {
        fileToUpload = '';
    }

    var formData = new FormData();
    formData.append("detect", "product_product_manager");
    formData.append("type_manager", "update_product_product");
    formData.append("product_title", $('#title_product_product_detail').val());
    formData.append("product_category", $('#category_product_product_detail').val());
    formData.append("product_img", fileToUpload);
    formData.append("id_product", id);

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        //headers: headers,
        success: function(response) {
           
            if (response.success == 'true') {
                alert(response.message);
                list_product_product();
                $('#edit_product_product').hide();
            } else {
                alert(response.message);
            }
        }
    });
}

function show_delete_product_product(id) {
    let output = `<button id="add_file" onClick="delete_product_product(${id})" class="btn-submit w-20 d-inline-block fz-1rem">Hoàn thành</button>`;
    $('#btn_delete_product').html(output);
    $('#delete_product_product').show();
}

function delete_product_product(id) {
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'product_product_manager',
            type_manager: 'delete_product_product',
            id_product: id,
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            if (response.success == 'true') {
                alert(response.message);
                list_product_product();
                $('#delete_product_product').hide();
            } else {
                alert(response.message);
            }
        }
    });
}
function product_hot(id)
{
    var checkBox = document.getElementById("prod_hot" +id);
    
    if (checkBox.checked == true){
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: {
                detect: 'product_product_manager',
                type_manager: 'update_product_product',
                product_hot: 'Y',
                id_product: id,
            },
            dataType: 'json',
            //headers: headers,
            success: function(response) {
                if (response.success == 'true') {
                    alert(response.message);
                    //list_product_product();
                    //$('#delete_product_product').hide();
                } else {
                    alert(response.message);
                }
            }
        });
      
    } else {
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: {
                detect: 'product_product_manager',
                type_manager: 'update_product_product',
                product_hot: 'N',
                id_product: id,
            },
            dataType: 'json',
            //headers: headers,
            success: function(response) {
                if (response.success == 'true') {
                    alert(response.message);
                    //list_product_product();
                    //$('#delete_product_product').hide();
                } else {
                    alert(response.message);
                }
            }
        });
       
    }
}