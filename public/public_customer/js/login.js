$(document).ready(function() {

    //   step 1
    $("span[type='step_start']").click(function() {
        $('.step-start').toggleClass('d-none');
        $('.step-reset-password').toggleClass('d-block');
    });
    $(".step-1 #submit_step_1").click(function() {
        if ($("input[name='phone_mail_reset']").val() == "") {
            $("input[name='phone_mail_reset']").addClass('error-input');
            $("input[name='phone_mail_reset']~.error-text").addClass('d-block');
        } else {
            $(".step-1").toggleClass('d-none');
            $(".step-2").toggleClass('d-block');
            $("input[name='phone_mail_reset']").removeClass('error-input');
            $("input[name='phone_mail_reset']~.error-text").removeClass('d-block');
        }
    });
    // step 2
    $("span[type='step_1']").click(function() {
        $('.step-1').toggleClass('d-none');
        $('.step-2').toggleClass('d-block');
        $(".digit-group~.error-text").removeClass('d-block');

    });
    $(".step-2 #submit_step_2").click(function() {
        if ($("#digit-1").val() == "" || $("#digit-2").val() == "" || $("#digit-3").val() == "" || $("#digit-4").val() == "" || $("#digit-5").val() == "" || $("#digit-6").val() == "") {
            $(".digit-group~.error-text").addClass('d-block');
        } else {
            $(".step-2").toggleClass('d-block');
            $(".step-3").toggleClass('d-block');
            $(".digit-group~.error-text").removeClass('d-block');
        }

    });
    // step 3
    $("span[type='step_2']").click(function() {
        $('.step-2').toggleClass('d-block');
        $('.step-3').toggleClass('d-block');
        $(".digit-group~.error-text").removeClass('d-block');

    });
    $(".step-3 #submit_step_3").click(function() {
        if ($("#password").val() == "" || $("#password_confirm").val() == "") {
            $("#reset_pass div~.error-text").addClass('d-block');
        } else {
            $("#reset_pass div~.error-text").removeClass('d-block');
            $("#reset_pass div~.success-text").addClass('d-block');

            setTimeout(function() {
                $('.step-start').toggleClass('d-none');
                $('.step-1').toggleClass('d-none');
                $('.step-3').toggleClass('d-block');
                $('.step-reset-password').toggleClass('d-block');
            }, 2000);

        }
    });



});