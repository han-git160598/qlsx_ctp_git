$(document).ready(function() {

  //  $("#main-menu li:nth-child(2)").addClass("active");
    list_contact_contact();

});

function list_contact_contact() {

    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'contact_manager',
            type_manager: 'list_contact',
            id_account: $('#id_account').val(),
        },
        dataType: 'json',
        //headers: headers,
        success: function(response) {
            var output = ``;
            response.data.forEach(function(item) {
                if (response.success == 'true') {
                    $('#contact_phone').val(response.data[0].contact_phone);
                    $('#contact_Zalo').val(response.data[0].contact_zalo);
                    $('#contact_Viber').val(response.data[0].contact_viber);
                    let output=`<button onClick="update_contact(${response.data[0].id})" class="btn btn-green">Lưu thay đổi</button>`;
                    $('#btn_contact_update').html(output);

                    $('#contact_email').val(response.data[0].contact_email);
                    $('#contact_adress').val(response.data[0].contact_adress[0].adress_street);
                }
            });


        }
    });

}


function update_contact(id) {
    
    $.ajax({
        url: urlapi,
        method: 'POST',
        data: {
            detect: 'contact_manager',
            type_manager: 'update_contact',
            contact_phone:$('#contact_phone').val(),
            contact_zalo:$('#contact_Zalo').val(),
            contact_viber:$('#contact_Viber').val(),

            id_contact: id,
        },
        dataType: 'json',
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

$(".modal span.icon").click(function() {
    $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
});
