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