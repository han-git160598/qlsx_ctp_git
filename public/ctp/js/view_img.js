function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('.form-file-view-img img')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        $('.form-file-view-img').toggleClass('d-block');
        $('.form-file-view-img-close').toggleClass('d-block');
        $('.form-file-img').toggleClass('d-none');
        $('.form-file-input').toggleClass('d-none');
        $('.form-file-img-title').toggleClass('d-none');

        $('#file_name .file-name').text(input.files[0].name);
    }

}

$(document).ready(function() {

    $("span[type='add_attach_file']").click(function() {
        if ($('#attach').val() == "") {
            $('.form-file-view-img').removeClass('d-block');
            $('.form-file-view-img-close').removeClass('d-block');
            $('.form-file-img').removeClass('d-none');
            $('.form-file-input').removeClass('d-none');
            $('.form-file-img-title').removeClass('d-none');
        }
    });

    // cancel thumb nail
    $("span[type='cancel_thumb_nails']").click(function() {
        $('#attach').val("");
        $('#form_attach .form-file-view-img img').attr('src', "");
        $('#show_info_file #file_name .file-name').text('');
        $('#show_info_file #note').text('');


        $('.form-file-view-img').removeClass('d-block');
        $('.form-file-view-img-close').removeClass('d-block');
        $('.form-file-img').removeClass('d-none');
        $('.form-file-input').removeClass('d-none');
        $('.form-file-img-title').removeClass('d-none');
    });



    if ($('#show_info_file #note').text() == "" && $('#show_info_file #file_name .file-name').text() == "") {
        $('#show_info_file').addClass('visible-hidden');
        if ($("span[type='add_attach_file']").hasClass('d-none')) {
            $("span[type='add_attach_file']").removeClass('d-none');
        }
    }

    $('#add_attach').click(function() {
        if ($('#attach').val() != "") {
            if ($('#show_info_file #note').text() != "" || $('#show_info_file #file_name .file-name').text() != "") {
                $('#show_info_file').toggleClass('visible-hidden');
                $("span[type='add_attach_file']").toggleClass('d-none');
            }
            $('#show_info_file #note').text($('#note_input').val());
            if ($('#show_info_file #note').text() == "") {
                $('#show_info_file #note').addClass('d-none');
            } else {
                if ($('#show_info_file #note').hasClass('d-none')) {
                    $('#show_info_file #note').removeClass('d-none');
                }
            }
            $('#add_attach_file').fadeToggle();
        } else {
            $('#note_input~.error-text').toggleClass('d-block');
        }

    });




    // // add_attach_file .form-file-view-img-close
    // $('#add_attach_file .form-file-view-img-close').click(function() {
    //     $('.form-file-view-img').css({ 'height': '200px', 'opacity': '0' });
    //     $('.form-file-view-img-close').css('opacity', '0');
    //     $('.form-file-img').css('opacity', '1');
    //     $('.form-file-img-title').css('opacity', '1');
    //     $('.form-file-view-img img').attr('src', 'public/images/product_1.png');
    //     $('#file_name .file-name').text('');
    // });

    // // href='#add_attach_file'

    // $("a[href='#add_attach_file']").click(function() {
    //     $('#add_attach_file').removeClass('d-none');

    // });


    // // $("a[href='#cancel_thumb_nails']").click(function() {
    // //     $('.form-file-view-img img').attr('src', "");
    // // });
    // // href='#cancel_add_attach'

    // $("a[href='#cancel_add_attach']").click(function() {
    //     $('#add_attach_file').addClass('d-none');
    //     // $('.form-file-view-img img').attr('src', "");
    //     // alert($('.form-file-view-img img').attr('src'))
    // });

    // // add_attach
    // $('#add_attach').click(function() {
    //     var note_input = $('#add_attach_file #note_input').val();
    //     if (note_input != "") {
    //         $('#show_info_file #note').text(note_input);
    //         // alert(note_input);

    //         $("a[href='#add_attach_file']").addClass('d-none');
    //     }
    //     $('#add_attach_file').addClass('d-none');
    // });



    // //href='#cancel_delete_attach'
    // // $("a[href='#cancel_delete_attach']").click(function() {
    // //     $('#delete_attach_file').removeClass('d-none');
    // // });

    // //delete_attach

    $('#delete_attach').click(function() {
        $('#attach').val("");
        $('#form_attach .form-file-view-img img').attr('src', "");
        $('#show_info_file #file_name .file-name').text('');
        $('#show_info_file #note').text('');
        if ($('#show_info_file #note').text() == "" && $('#show_info_file #file_name .file-name').text() == "") {
            $('#show_info_file').addClass('visible-hidden');
            $("span[type='add_attach_file']").toggleClass('d-none');
        }
        $('#delete_attach_file.modal').fadeToggle();

    });

})