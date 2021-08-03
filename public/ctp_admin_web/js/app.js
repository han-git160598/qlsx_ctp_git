$(document).ready(function() {
    // double click open modal in table

    $(".click_doubble.get_modal").dblclick(function() {
        var id_modal = $(this).attr('type');
        console.log($('#' + id_modal));
        $('#' + id_modal).stop().toggle(300);
        return false;
    });
    // module empty
    var module_height = $('.module-empty').parent('.wp-module').prev().children('.module').outerHeight();
    $('.module-empty').css('height', module_height);

    // main menu
    $("ul#main-menu li.item a").click(function() {
        $("ul#main-menu li.item").removeClass("active");
        $(this).parent().addClass('active');
    });

    // product
    $("#wrapper.product .thumb-nail").click(function() {
        var thumb_nail = $(this).children('img').attr('src');
        $('.show-thumb-nail').addClass('d-block').slideDown('500');
        $('.show-thumb-nail').children('.modal-box').children('img').attr('src', thumb_nail);
    });
    $("#wrapper.product~.show-thumb-nail span").click(function() {
        $('.show-thumb-nail').addClass('d-none').removeClass('d-block');
    });

    // contact box
    $('#contact-box').click(function() {
        $(this).children('.box-contact-close').fadeToggle(); //.toggleClass('d-block')
        $(this).children('.box-contact').children('.icon-contact').fadeToggle(); //.toggleClass('d-none')
        $(this).children('.box-contact').children('.menu-contact ').fadeToggle(); //.toggleClass('d-block')
    });
    // account box
    $('.dir-user .icon').click(function() {
        $('#dir_box').fadeToggle();
    });
    $('.dir-user .arrow-down').click(function() {
        $('#dir_box').fadeToggle();
    });
    // header cart box
    $('.header-cart .icon').click(function() {
        $('.header-cart-box').fadeToggle();
    });

    // MY INFO
    // sidebar menu
    $("#sidebar_menu>li.item>a").click(function() {
        $("#sidebar_menu>li.item").removeClass("active");
        $(this).parent().addClass('active');
        if ($('#my_info').hasClass('active')) {
            $('#my_info').children('.sub-menu-profile').slideToggle();
        }
    });
    if ($('#my_info').hasClass('active')) {
        $('#my_info').children('.sub-menu-profile').slideToggle();
    }
    // sidebar sub menu
    $("#my_info>.sub-menu-profile>li.item>span[data-tag='a']").click(function() {
        $("#my_info>.sub-menu-profile>li.item").removeClass("active");
        $(this).parent().addClass('active');
        var id_rcontent = $(this).attr('type');
        if ($('#' + id_rcontent + '.rcontent').hasClass('d-none')) {
            $('.rcontent').addClass('d-none');
            $('#' + id_rcontent + '.rcontent').removeClass('d-none');
        };
    });
    // My address send
    $("span.get_modal").click(function() {
        var id_modal = $(this).attr('type');
        console.log($('#' + id_modal));
        $('#' + id_modal).fadeToggle();
    });
    $(".modal span.icon").click(function() {
        $(this).parent('.modal-title').parent('.modal-box').parent('.modal').fadeToggle();
    });


    // MY INVOICE
    // menu invoice
    $("#menu_invoice>li.item>span[data-tag='a']").click(function() {
        $("#menu_invoice>li.item").removeClass("active");
        $(this).parent().addClass('active');

        var id_mcontent = $(this).attr('type');
        if ($('#my_invoice.rcontent #' + id_mcontent + '.mcontent').hasClass('d-none')) {
            $('#my_invoice.rcontent .mcontent').addClass('d-none');
            $('#my_invoice.rcontent #' + id_mcontent + '.mcontent').removeClass('d-none');
        };
    });






});