
$('#submit_phone').click(function() {
    if ($('#phone_reg').val() == "") {
        $("#phone_reg").addClass('error-input');
        $("#form_reg ~div> .error-text").addClass('d-block');
    } else {
    	let phone = $('#phone_reg').val();
	 $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_phone_exist', customer_phone: phone},
        dataType: 'json',
        headers: headers,
        success: function(response) { 
        	if(response.success =='true')
        	{
        		var numberVND = "+84" + phone;
                firebase.auth().signInWithPhoneNumber(numberVND, window.recaptchaVerifier).then(function(confirmationResult) {
                    //s is in lowercase
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    console.log(coderesult);
                    $('.step-start').toggleClass('d-none');
	        		$('.step-otp').toggleClass('d-none');
	        		$('#phone_OTP').html('Nhập mã OTP đã gửi đến '+phone);
                }).catch(function(error) {
                    console.log(error)
                    alert("Gưi mã PIN thất bại, thử lại tối đa 5 lần 1 ngày");
                 });
        	}else{
        		alert(response.message);
        	}
        }
    })

        
    }
});	
window.onload = function() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
};

function capcha() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function codeverify() 
{
	
}

function step1(){
    var code = $('#digit-1').val()+$('#digit-2').val()+$('#digit-3').val()+$('#digit-4').val()+$('#digit-5').val()+$('#digit-6').val()
    $('#submit_step_1').click();
    // coderesult.confirm(code).then(function(result) {
    //     $('#submit_step_1').click();
    // }).catch(function(error) {
    //     alert("Mã OTP không hợp lệ");
    // });
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
$("#password").keyup(function() {
    /*length 5 characters or more*/
    if(this.value.length < 8 || this.value.indexOf(' ') >= 0) {
        document.getElementById("length").style.color = "red"
    }else{
        document.getElementById("length").style.color = "green"
    }
    /*contains lowercase characters*/
    if(this.value.match(/[a-z]+/)) {
        document.getElementById("lowercase").style.color = "green"
    }else{
        document.getElementById("lowercase").style.color = "red"
    }
    /*contains digits*/
    // if(this.value.match(/[0-9]+/)) {
    //     strength++;
    // }
    /*contains uppercase characters*/
    if(this.value.match(/[A-Z]+/)) {
        document.getElementById("uppercase").style.color = "green"
    }else{
        document.getElementById("uppercase").style.color = "red"
    }
});
$('#password_confirm').keyup(function(){
    if($('#password_confirm').val() == $('#password').val())
    {
        document.getElementById("password_confirm").style.backgroundColor = "White"
    }else{
        document.getElementById("password_confirm").style.backgroundColor = "red"
    }
});

function step2() {
   var length = document.getElementById("length").style.color;
    var lowercase = document.getElementById("lowercase").style.color;
    var uppercase = document.getElementById("uppercase").style.color;
    var pw_unique = document.getElementById("password_confirm").style.backgroundColor;
    if(length == "red" || lowercase == "red" || uppercase == "red" || $('#pw-new').val() != $('#pw-old').val() )
    {   
        alert('Mật khẩu không đúng định dạng hoặc không trùng khớp')
    }else{
        $('#submit_step_2').click();
    }
}
function step3()
{
    
    var customer_enterprise ='N';
    if($('#is_business').checked == true)
    {
        customer_enterprise = 'Y'
    }
     $.ajax({
        url: urlapi,
        method: 'POST',
        data: { detect: 'customer_register'
        ,customer_name:$('#name_user').val()
        ,customer_password:$('#password').val()
        ,customer_phone:$('#phone_reg').val()
        ,customer_email: $('#email_user').val()  
        ,customer_company:$('#name_business').val()
        ,customer_enterprise:customer_enterprise
        ,customer_address:$('#address_user').val()
        },
        dataType: 'json',
        headers: headers,
        success: function(response) {
            console.log(response)
            if(response.data !='')
            {
                $('#phone_success').text($('#phone_reg').val())
                $('#submit_step_4').click();
                localStorage.setItem('customer_customer', JSON.stringify(response.data[0]));
            }
            else{
                alert('Đăng ký thất bại, vui lòng nhấn F5 để đăng ký lại')
            }
        }
    })



}
