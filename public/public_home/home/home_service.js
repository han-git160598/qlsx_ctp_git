function show_service() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "service_module_manager", type_manager: "list_service_module" },
        success: function(data) {

            var output_content1 = `
            <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[0].module_title}</h1>
            <p class="short-desc fw-400 fz-125rem t-center">${data.data[0].module_content}</p>
            `;



            $("#title_content1").html(output_content1);

            $.ajax({
                type: "post",
                url: urlapi,
                data: { detect: "service_service_manager", type_manager: "list_service_service", id_module_service: data.data[0].id },
                dataType: "json",
                success: function(response) {

                    var content1_content = "";

                    if (response.success == "true") {
                        $.each(response.data, function(k, v) {

                            content1_content += `
                            <div class="box-item">
                                <div class="item-title">
                                    <div class="icon"><img src="${urlserver+v.service_img}" alt=""></div>
                                    <h4 class="t-center fz-125rem fw-600">${v.service_title}</h4>
                                </div>
                                <div class="item-content">
                                    <p class="fw-400">${v.service_content}</p>
                                </div>
                             </div>

                                `;

                        });
                    }

                    $("#content_content1").html(content1_content);


                }
            });


        }
    })
}
$(document).ready(function() {
    $("#main-menu li:nth-child(5)").addClass("active");
    show_service()
});