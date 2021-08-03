function show_contact() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "contact_manager", type_manager: "list_contact" },
        success: function(data) {
            let url = "";

            var output_content1 = `
                    <div class="box-item w-100">
                    <div class="item-title">
                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">Thông tin liên hệ</h4>
                    </div>
                    <div class="item-content">
                        <p class="fw-400 d-flex">
                            <span class="icon"><img src="../ctp/images/detail-phone.png" alt=""></span>
                            <span class="mg-l-05rem lh-12rem">(+84) ${data.data[0].contact_phone}</span>
                        </p>
                        <p class="fw-400 d-flex">
                            <span class="icon"><img src="../ctp/images/detail-location.png" alt=""></span>
                            <span class="mg-l-05rem lh-12rem">A5/6c Nguyễn Cữu Phú, Ấp 01, Tân Kiên Huyện Bình Chánh, TP. Hồ Chí Minh</span>
                        </p>
                        <p class="fw-400 d-flex">
                            <span class="icon"><img src="../ctp/images/detail-gmail.png" alt=""></span>
                            <span class="mg-l-05rem lh-12rem">${data.data[0].contact_email}</span>
                        </p>

                    </div>
                </div>
            `;



            $("#title_content1").html(output_content1);

        }
    })
}
$(document).ready(function() {
    $("#main-menu li:nth-child(6)").addClass("active");
    //show_contact()
});