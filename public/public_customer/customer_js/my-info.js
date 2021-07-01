$(document).ready(function() {
    customer_detail();
})
function customer_detail()
{
    var id_customer = item.id;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'list_customer', id_customer: id_customer},
        dataType: 'json',
        headers: headers,
        success: function(response) {
            $('#name_business').val(response.data[0].customer_company);
            $('#name_user').val(response.data[0].customer_name);
            $('#phone_user').val(response.data[0].customer_phone);
            $('#email_user').val(response.data[0].customer_email);
            
            $('#update_customer').html(` <input type="button" onclick="update_customer(${id_customer})" class="btn-submit w-10" value="Lưu">`);
        }
    });
}
function update_customer(id)
{
    var customer_company = $('#name_business').val();
    var customer_name = $('#name_user').val();
    var customer_phone = $('#phone_user').val();
    var customer_email = $('#email_user').val();
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_manager',type_manager:'update_customer', 
        id_customer: id, 
        customer_company:customer_company , customer_name:customer_name , 
        customer_phone:customer_phone , customer_email:customer_email
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);

        }
    })
}   

function list_address_shipping()
{
    var id_customer = item.id;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'shipping' , id_customer: id_customer , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        var output=``;
        response.data.forEach(function(item) {
        if(item.shipping_default == 'Y')
        {
            output+=`
            <div class="box-right w-100">   
                <div class="box-item mg-b-1rem px-3 py-5 w-100">
                    <div class="item-title d-flex">
                        <p class="fw-600 fz-125rem">${item.shipping_reminiscent_name}</p>
                        <span class="fw-600 fz-075rem default">Mặc định</span>
                        <span onClick="edit_address_shipping(${item.id_shipping})" data-tag="a" type="modal_edit_address_send"  class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                    </div>
                    <div class="item-content">
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.shipping_contact_person}</span>
                        </p>
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.shipping_contact_phone}</span>
                        </p>
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.shipping_address}</span>
                        </p>
                        <span data-tag="a" type="modal_delete_address_send" onclick="delete_address_shipping(${item.id_shipping})" class="get_modal btn btn-green">Xóa</span>
                    </div>
                </div>
            </div>`;
        }
        })
        response.data.forEach(function(item) {
            if(item.shipping_default == 'N')
            {
                output+=`
                <div class="box-right w-100">   
                    <div class="box-item mg-b-1rem px-3 py-5 w-100">
                        <div class="item-title d-flex">
                            <p class="fw-600 fz-125rem">${item.shipping_reminiscent_name}</p>
                            <span onClick="edit_address_shipping(${item.id_shipping})" data-tag="a" type="modal_edit_address_send"  class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                        </div>
                        <div class="item-content">
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.shipping_contact_person}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.shipping_contact_phone}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.shipping_address}</span>
                            </p>
                            <span data-tag="a" type="modal_delete_address_send" onclick="delete_address_shipping(${item.id_shipping})" class="get_modal btn btn-green">Xóa</span>
                        </div>
                    </div>
                </div>`;
            }
            })

        $('#list_address_shipping').html(output);
        $('#btn_add_address').html(` <button  onclick="add_address_shipping()" class="btn-submit w-30 ">Hoàn thành</button>`);
        }
    })
 
}
function add_address_shipping()
{
    let id_customer= item.id;
    if( $('#address_shipping').val() == '' ||$('#ward_shipping').val() =='' ||
        $('#district_shipping').val()=='' ||$('#city_shipping').val() =='' )
    {
        alert('Vui lòng điền đẩy đủ thông tin');
    }else{
        let reminiscent_company_name = $('#reminiscent_company_name').val()
        let address_address = $('#address_shipping').val() +", " + $('#ward_shipping').val() +", " + $('#district_shipping').val() +", " + $('#city_shipping').val();
        let contact_person = $('#contact_person').val();
        let address_phone = $('#address_phone').val();
        let address_default ='N';
        if($('#choose_default')[0].checked == true)
        {
            address_default = 'Y';
        }
    
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'customer_address_manager',type_manager:'create_customer_address', 
            type_address:'shipping' , id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
            contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
            },
            dataType: 'json',
            headers: headers,
            success: function(response) {
                alert(response.message);
                list_address_shipping();
                $('#add_address_shipping')[0].reset();
                $('#modal_add_address_send').hide();
    
            }
        });
    }
    
}
function edit_address_shipping(id_shipping){
   // console.log(id_shipping)
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'shipping' , id_address: id_shipping , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        let address_shipping = response.data[0].shipping_address.split(",");;
        let array_record={};
        array_record['address']=address_shipping[0]
        array_record['ward']=address_shipping[1]
        array_record['distric']=address_shipping[2]
        array_record['city']=address_shipping[3]    
        if(response.data[0].shipping_default == 'Y')
        {
            let output =`
            <input type="checkbox" checked class="form-input-check " name="choose_default " id="edit_choose_default">
            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>`;
            $('#btn_checked_default').html(output);
        }else{
            let output =`
            <input type="checkbox"  class="form-input-check " name="choose_default " id="edit_choose_default">
            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>`;
            $('#btn_checked_default').html(output);
        }
        $('#edit_address_shipping').val(array_record['address'])
        $('#edit_ward_shipping').val(array_record['ward'])
        $('#edit_district_shipping').val(array_record['distric'])
        $('#edit_city_shipping').val(array_record['city']) 
       
        $('#edit_reminiscent_company_name').val(response.data[0].shipping_reminiscent_name) 
        $('#edit_contact_person').val(response.data[0].shipping_contact_person)
        $('#edit_address_phone').val(response.data[0].shipping_contact_phone)

        $('#btn_edit_shipping').html(` <button onclick="update_address_shipping(${response.data[0].id_shipping})" class="btn-submit w-30 ">Hoàn thành</button>`)
        }
    });
    $('#modal_edit_address_send').show();
}
function update_address_shipping(id)
{
    let id_customer = item.id ;
    let reminiscent_company_name = $('#edit_reminiscent_company_name').val()
    let address_address = $('#edit_address_shipping').val() +", " + $('#edit_ward_shipping').val() +", " + $('#edit_district_shipping').val() +", " + $('#edit_city_shipping').val();
    let contact_person = $('#edit_contact_person').val();
    let address_phone = $('edit_#address_phone').val();
    let address_default ='N';
    if($('#edit_choose_default')[0].checked == true)
    {
        address_default = 'Y';
    }

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'update_customer_address', 
        type_address:'shipping' ,id_address:id, id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
        contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            $('#modal_edit_address_send').hide();
            list_address_shipping();
        }
    })
}
function delete_address_shipping(id)
{
    $('#btn_delete_shipping').html(`<button onclick="delete_address_shipping1(${id})" class="btn-submit w-30 d-inline-block">Hoàn thành</button>`);
    $('#modal_delete_address_send').show();
}
function delete_address_shipping1(id)
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'delete_customer_address', 
        type_address:'shipping' , id_address: id , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            list_address_shipping();
            $('#modal_delete_address_send').hide();
        }
    });
}
function hidden_password1(id)
{
    var password = document.getElementById(id);
    if(password.getAttribute("type")=="password"){
        password.setAttribute("type","text");
    } else {
        password.setAttribute("type","password");
    }
    

}

function change_password()
{
    var id_customer = item.id;
    var password = $('#password_new').val();
    var old_password = $('#password_old').val();
    var password_confirm = $('#password_confirm').val();
    var flag = 0;
    if(password =='' || old_password=='' || password_confirm=='')
    {
        flag = 1;
        alert('Vui lòng không bỏ trống !');
    }
    if(flag == 0)
    {
        if(password_confirm == password)
        {   
            $.ajax({
                url: urlapi,
                method: 'POST',
                data: { detect: 'customer_manager',type_manager:'update_customer',
                 id_customer:id_customer, old_password:old_password , password: password , 
                },
                dataType: 'json',
                headers: headers,
                success: function(response) {
                
                    alert(response.message);
                
                }   
            });
        }else{
            alert('Mật khẩu không trùng khớp')
        }
    }
    
    
}
/////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////address_delivery////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
function list_address_delivery()
{
    var id_customer = item.id;
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'delivery' , id_customer: id_customer , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        var output=``;
        response.data.forEach(function(item) {
            console.log(response)
        if(item.delivery_default == 'Y')
        {
            output+=`
            <div class="box-right w-100">   
                <div class="box-item mg-b-1rem px-3 py-5 w-100">
                    <div class="item-title d-flex">
                        <p class="fw-600 fz-125rem">${item.delivery_company}</p>
                        <span class="fw-600 fz-075rem default">Mặc định</span>
                        <span onClick="edit_address_delivery(${item.id_delivery})" data-tag="a" type="modal_edit_address_send"  class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                    </div>
                    <div class="item-content">
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.delivery_deputy_phone}</span>
                        </p>
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.delivery_deputy_person}</span>
                        </p>
                        <p>
                            <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                            <span class="fw-600 fz-1rem">${item.delivery_address}</span>
                        </p>
                        <span data-tag="a" type="modal_delete_address_send" onclick="delete_address_delivery(${item.id_delivery})" class="get_modal btn btn-green">Xóa</span>
                    </div>
                </div>
            </div>`;
        }
        })
        response.data.forEach(function(item) {
            if(item.delivery_default == 'N')
            {
                output+=`
                <div class="box-right w-100">   
                    <div class="box-item mg-b-1rem px-3 py-5 w-100">
                        <div class="item-title d-flex">
                            <p class="fw-600 fz-125rem">${item.delivery_company}</p>
                            <span onClick="edit_address_delivery(${item.id_delivery})" data-tag="a" type="modal_edit_address_send"  class="get_modal fw-400 fz-1rem t-green-main">Sửa</span>
                        </div>
                        <div class="item-content">
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_account_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_deputy_phone}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_phone_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_deputy_person}</span>
                            </p>
                            <p>
                                <span class="icon"><img src="../public_customer/images/detail_location_black.png" alt=""></span>
                                <span class="fw-600 fz-1rem">${item.delivery_address}</span>
                            </p>
                            <span data-tag="a" type="modal_delete_address_send" onclick="delete_address_delivery(${item.id_delivery})" class="get_modal btn btn-green">Xóa</span>
                        </div>
                    </div>
                </div>`;
            }
            })

        $('#list_address_shipping').html(output);
        $('#btn_add_address').html(` <button  onclick="add_address_delivery()" class="btn-submit w-30 ">Hoàn thành</button>`);
        }
    })
 
}
function add_address_delivery()
{
    let id_customer= item.id;
    if( $('#address_shipping').val() == '' ||$('#ward_shipping').val() =='' ||
        $('#district_shipping').val()=='' ||$('#city_shipping').val() =='' )
    {
        alert('Vui lòng điền đẩy đủ thông tin');
    }else{
        let reminiscent_company_name = $('#reminiscent_company_name').val()
        let address_address = $('#address_shipping').val() +", " + $('#ward_shipping').val() +", " + $('#district_shipping').val() +", " + $('#city_shipping').val();
        let contact_person = $('#contact_person').val();
        let address_phone = $('#address_phone').val();
        let address_default ='N';
        if($('#choose_default')[0].checked == true)
        {
            address_default = 'Y';
        }
    
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'customer_address_manager',type_manager:'create_customer_address', 
            type_address:'delivery' , id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
            contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
            },
            dataType: 'json',
            headers: headers,
            success: function(response) {
                alert(response.message);
                list_address_delivery();
                $('#add_address_shipping')[0].reset();
                $('#modal_add_address_send').hide();
    
            }
        });
    }
    
}
function edit_address_delivery(id_shipping){
   // console.log(id_shipping)
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'list_customer_address', 
        type_address:'delivery' , id_address: id_shipping , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
        let address_shipping = response.data[0].delivery_address.split(",");;
        let array_record={};
        array_record['address']=address_shipping[0]
        array_record['ward']=address_shipping[1]
        array_record['distric']=address_shipping[2]
        array_record['city']=address_shipping[3]    
        if(response.data[0].shipping_default == 'Y')
        {
            let output =`
            <input type="checkbox" checked class="form-input-check " name="choose_default " id="edit_choose_default">
            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>`;
            $('#btn_checked_default').html(output);
        }else{
            let output =`
            <input type="checkbox"  class="form-input-check " name="choose_default " id="edit_choose_default">
            <label for="choose_default " class="form-lable-check ">Chọn làm địa chỉ mặc định</label>`;
            $('#btn_checked_default').html(output);
        }
        $('#edit_address_shipping').val(array_record['address'])
        $('#edit_ward_shipping').val(array_record['ward'])
        $('#edit_district_shipping').val(array_record['distric'])
        $('#edit_city_shipping').val(array_record['city']) 
       
        $('#edit_reminiscent_company_name').val(response.data[0].delivery_company) 
        $('#edit_contact_person').val(response.data[0].delivery_deputy_person)
        $('#edit_address_phone').val(response.data[0].delivery_deputy_phone)

        $('#btn_edit_shipping').html(` <button onclick="update_address_delivery(${response.data[0].id_delivery})" class="btn-submit w-30 ">Hoàn thành</button>`)
        }
    });
    $('#modal_edit_address_send').show();
}
function update_address_delivery(id)
{
    let id_customer = item.id ;
    let reminiscent_company_name = $('#edit_reminiscent_company_name').val()
    let address_address = $('#edit_address_shipping').val() +", " + $('#edit_ward_shipping').val() +", " + $('#edit_district_shipping').val() +", " + $('#edit_city_shipping').val();
    let contact_person = $('#edit_contact_person').val();
    let address_phone = $('edit_#address_phone').val();
    let address_default ='N';
    if($('#edit_choose_default')[0].checked == true)
    {
        address_default = 'Y';
    }

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'update_customer_address', 
        type_address:'delivery' ,id_address:id, id_customer: id_customer , reminiscent_company_name:reminiscent_company_name,
        contact_person:contact_person, address_phone:address_phone, address_address:address_address,address_default:address_default
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            $('#modal_edit_address_send').hide();
            list_address_delivery();
        }
    })
}
function delete_address_delivery(id)
{
    $('#btn_delete_shipping').html(`<button onclick="delete_address_delivery1(${id})" class="btn-submit w-30 d-inline-block">Hoàn thành</button>`);
    $('#modal_delete_address_send').show();
}
function delete_address_delivery1(id)
{
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_address_manager',type_manager:'delete_customer_address', 
        type_address:'delivery' , id_address: id , 
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            alert(response.message);
            list_address_delivery();
            $('#modal_delete_address_send').hide();
        }
    });
}