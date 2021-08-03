function show_about() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "about_module_manager", type_manager: "list_about_module" },
        success: function(data) {

            var output_content1 = `
                    <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[0].module_title}</h1>
                    <p class="short-desc fw-400 fz-125rem t-center">${data.data[0].module_content}</p>
            `;

            var output_content2 = `
                    <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[1].module_title}</h1>
                    <p class="short-desc fw-400 fz-125rem t-left">${data.data[1].module_content}</p>

            `;
            $("#title_content1").html(output_content1);
            $("#title_content2").html(output_content2);
            $.ajax({
                type: "post",
                url: urlapi,
                data: { detect: "about_about_manager", type_manager: "list_about_about", id_module_about: data.data[0].id },
                dataType: "json",
                success: function(response) {
                    var content1_con = "";
                    if (response.success == "true") {

                        $.each(response.data, function(k, v) {
                            content1_con += `
                                <div class="box-item">
                                    <div class="item-title">
                                        <div class="icon"><img src="${urlserver+v.about_img}" alt=""></div>
                                        <h4 class="t-center fz-125rem fw-600">${v.about_title}</h4>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400">${v.about_content}</p>
                                    </div>
                                </div>
                                `
                        });
                    }
                    $("#content_content1").html(content1_con);

                }
            });


        }
    })

}
$(document).ready(function() {
    $("#main-menu li:nth-child(2)").addClass("active");
    show_about()
});