

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
	var code = $('#verificationCode').val();
	coderesult.confirm(code).then(function(result) {
	    $('#show_modal_info').click();
	}).catch(function(error) {
	    alert("Mã OTP không hợp lệ");
	});
}