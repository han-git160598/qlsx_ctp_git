function show_home() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "home_manager", type_manager: "list_home" },
        success: function(data) {

            output_stt = "";
            output_content = "";
            $.each(data.data, function(k, v) {
                let active = "";
                if (k == 0) {
                    active = "active";
                } else {
                    active = "";
                }
                output_stt += `
                    <li data-target="#slide-home" data-slide-to="${k}" class="${active}"></li>
                `;
                output_content += `
                    <div class="carousel-item ${active}">
                        <img src="${urlserver+v.home_img}">
                    </div>
                `;
            });
            $("#stt_home").html(output_stt);
            $("#content_home").html(output_content);
        }
    })

}
$(document).ready(function() {
    console.log(1);
    $("#main-menu li:nth-child(1)").addClass("active");
    show_home();
});