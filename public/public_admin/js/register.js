$(document).ready(function() {

    // step start   
    $('#submit_phone').click(function() {
        if ($('#phone_reg').val() == "") {
            $("#phone_reg").addClass('error-input');
            $("#form_reg ~div> .error-text").addClass('d-block');
        } else {
            $('.step-start').toggleClass('d-none');
            $('.step-otp').toggleClass('d-none');
        }
    });

    // step 1
    $("span[type='step_start']").click(function() {
        $('.step-start').toggleClass('d-none');
        $('.step-otp').toggleClass('d-none');
        $("#form_reg ~div> .error-text").removeClass('d-block');
        $("#phone_reg").removeClass('error-input');

    });
    $(".step-1 #submit_step_1").click(function() {
        if ($("#digit-1").val() == "" || $("#digit-2").val() == "" || $("#digit-3").val() == "" || $("#digit-4").val() == "" || $("#digit-5").val() == "" || $("#digit-6").val() == "") {
            $(".digit-group~.error-text").addClass('d-block');
        } else {
            $(".step-1").toggleClass('d-none');
            $(".step-2").toggleClass('d-none');
            $(".digit-group~.error-text").removeClass('d-block');


            progressbar_point(this);
        }

    });
    // step 2
    $("span[type='step_1']").click(function() {
        $('.step-1').toggleClass('d-none');
        $('.step-2').toggleClass('d-none');
        $(".digit-group~.error-text").removeClass('d-block');
        progressbar_point(this);
    });
    $(".step-2 #submit_step_2").click(function() {
        if ($("#password").val() == "") {
            $("#password").addClass('error-input');
            $("#set_pass div~.error-text").addClass('d-block');

        } else if ($("#password_confirm").val() == "") {
            $("#password_confirm").addClass('error-input');
            $("#password").removeClass('error-input');
            $("#set_pass div~.error-text").addClass('d-block');

        } else {
            if ($("#password").val() == $("#password_confirm").val()) {
                $(".step-2").toggleClass('d-none');
                $(".step-3").toggleClass('d-none');
                $("#set_pass div~.error-text").removeClass('d-block');
                progressbar_point(this);
            } else {

                $("#set_pass div~.error-text").text('Mật khẩu xác nhận không trùng khớp');
                $("#set_pass div~.error-text").addClass('d-block');

            }
        }

    });
    // step 3
    $("span[type='step_2']").click(function() {
        $('.step-2').toggleClass('d-none');
        $('.step-3').toggleClass('d-none');
        $("#set_pass div~.error-text").removeClass('d-block');
        progressbar_point(this);
    });
    $(".step-3 #submit_step_3").click(function() {
        if ($("#name_business").val() == "") {
            $("#name_business").addClass('error-input');
            $("#name_business~.error-text").addClass('d-block');
        } else if ($("#name_user").val() == "") {
            $("#name_user").addClass('error-input');
            $("#name_user~.error-text").addClass('d-block');
            $("#name_business~.error-text").removeClass('d-block');
            $("#name_business").removeClass('error-input');
        } else {
            $(".step-3").toggleClass('d-none');
            $(".step-4").toggleClass('d-none');
            $("#form_info .error-text").removeClass('d-block');
            $("#form_info input").removeClass('error-input');
            progressbar_point(this);
        }
    });
    // step 4
    $("span[type='step_3']").click(function() {
        $('.step-3').toggleClass('d-none');
        $('.step-4').toggleClass('d-none');
        $("#form_address .error-text").removeClass('d-block');
        $("#form_address input").removeClass('error-input');
        progressbar_point(this);
    });
    $(".step-4 #submit_step_4").click(function() {
        if ($("#city").val() == "0") {
            $("#city").addClass('error-input');
        } else if ($("#district").val() == "0") {
            $("#district").addClass('error-input');
            $("#city").removeClass('error-input');
        } else if ($("#ward").val() == "0") {
            $("#ward").addClass('error-input');
            $("#district").removeClass('error-input');
        } else if ($("#address").val() == "0") {
            $("#address").addClass('error-input');
            $("#ward").removeClass('error-input');
        } else {
            $(".step-4").toggleClass('d-none');
            $(".step-5").toggleClass('d-none');
            $("#form_address input").removeClass('error-input');
            progressbar_point(this);
            // step 5
            if ($('.step-5').hasClass('d-none') == false) {
                var sec = 3;
                setInterval(function() {
                    sec--;
                    $('#sec').text(sec + ' giây');
                    if (sec == 0) {
                        $('.step-start').toggleClass('d-none');
                        $('.step-otp').toggleClass('d-none');
                        $('.step-1').toggleClass('d-none');
                        $('.step-5').toggleClass('d-none');
                        window.location.href = 'customer-home.html';
                    }
                }, 1000);
            }
        }
    });







});

function progressbar_point(opject) {
    var step_data;
    var extend = "_active.png";
    var progressbar_point_li;
    var progressbar_point_img;
    var progressbar_point_img_name;
    step_data = $(opject).attr('data-step');
    progressbar_point_li = $(".progressbar-point li[data-step='" + step_data + "']");
    if (progressbar_point_li.hasClass("active")) {
        progressbar_point_li.removeClass("active");
        progressbar_point_img = progressbar_point_li.children(".icon").children("img");
        progressbar_point_img_name = progressbar_point_li.children(".icon").children("img").attr('src').slice(0, -11);
        progressbar_point_img.attr("src", progressbar_point_img_name + ".png");
    } else {
        progressbar_point_li.addClass("active");
        progressbar_point_img = progressbar_point_li.children(".icon").children("img");
        progressbar_point_img_name = progressbar_point_li.children(".icon").children("img").attr('src').slice(0, -4);
        progressbar_point_img.attr("src", progressbar_point_img_name + extend);
    }
}