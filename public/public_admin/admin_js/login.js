function hidden_password() {
    var pwd = document.getElementById("login_password");
    if (pwd.getAttribute("type") == "password") {
        pwd.setAttribute("type", "text");
    } else {
        pwd.setAttribute("type", "password");
    }

}

$("#btn_login").click(function() {
    if ($("#login_phone").val() == "") {
        $("#login_phone").addClass('error-input');
        $("#login_form ~div> .error-text").addClass('d-block');
    } else if ($("#login_password").val() == "") {
        $("#login_phone").removeClass('error-input');
        $("#login_password").addClass('error-input');
        $("#btn_login ~ error-text").addClass('d-block');

    } else {
        $("#login_password").removeClass('error-input');

        var login_phone = $('#login_phone').val();
        var login_password = $('#login_password').val();
        $.ajax({
            url: urlapi,
            method: 'POST',
            data: { detect: 'user_login', username: login_phone, password: login_password },
            dataType: 'json',
            headers: headers,
            success: function(response) {
           
                if (response.success == 'false') {
                    alert(response.message)

                } else {    
                    if(response.data[0].login_type== 'employee')
                    {
                        localStorage.setItem('account_customer', JSON.stringify(response.data[0]));
                        let account_customer = JSON.parse(localStorage.getItem('account_customer'));
                        if (account_customer.id_type == '3') {
                            window.location.href = urlserver + 'list-ship';
                        }else if(account_customer.id_type == '2')
                        {
                            window.location.href = urlserver + 'list-product-storage';
                        }else if(account_customer.id_type == '4'){
                            window.location.href = urlserver + 'list-production';
                        }else {
                            window.location.href = urlserver + 'admin/customer_index';
                        }   
                    }else{
                        alert('Tài khoản không tồn tại !');
                    }
                    
                }

            }
        })

    }
});

// $("span[type='forgot_password']").click(function() {
//     $('.step-start').toggleClass('d-none');
//     $('.step-reset-password').toggleClass('d-block');
//     $("input[name='phone_mail_reset']").removeClass('error-input');
//     $("input[name='phone_mail_reset']~.error-text").removeClass('d-block');

// });