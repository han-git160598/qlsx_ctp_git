$(document).ready(function() {

    $(".form-file-input").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            var file_target = $(this).attr('data-target');
            var file_id = $(this).attr('data-id');

            reader.onload = function(e) {
                $(".form-file-view-img[data-target='" + file_target + "'][data-id='" + file_id + "'] img")
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);

            $(".form-file-view-img[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-block');
            $(".form-file-view-img-close[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-block');
            $(".form-file-img[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
            $(".form-file-input[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
            $(".form-file-img-title[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
        }
        return false;
    });

    // cancel thumb nail
    $(".form-file-view-img-close").click(function() {
        var file_target = $(this).attr('data-target');
        var file_id = $(this).attr('data-id');

        $(".form-file-input[data-target='" + file_target + "'][data-id='" + file_id + "']").val("");

        $(".form-file-view-img[data-target='" + file_target + "'][data-id='" + file_id + "'] img").attr('src', "#");

        $(".form-file-view-img[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-block');
        $(".form-file-view-img-close[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-block');
        $(".form-file-img[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
        $(".form-file-input[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
        $(".form-file-img-title[data-target='" + file_target + "'][data-id='" + file_id + "']").toggleClass('d-none');
        return false;
    });

})