
function hidden_password()
{
    var pwd = document.getElementById("login_password");
    if(pwd.getAttribute("type")=="password"){
        pwd.setAttribute("type","text");
    } else {
        pwd.setAttribute("type","password");
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
            data: { detect: 'user_login', username: login_phone,password :login_password},
            dataType: 'json',
            headers: headers,
            success: function(response) {
                if(response.success == 'false')
                {
                    alert(response.message)
                    
                }else{
                    localStorage.setItem('account_customer', JSON.stringify(response.data[0]));
                    window.location.href = urlserver+ 'customer-home';
                    

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
