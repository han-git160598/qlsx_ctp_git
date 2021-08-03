function show_product() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "product_module_manager", type_manager: "list_product_module" },
        success: function(data) {

            var output_content1 = `
            <div  class="empty"></div>
            <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[0].module_title}</h1>
            <p class="short-desc fw-400 fz-125rem t-center">${data.data[0].module_content}</p>
            `;

            $("#bg_product").css('background-image', "url('" + urlserver + data.data[0].module_img + "')")
            $("#title_content1").html(output_content1);

            $.ajax({
                type: "post",
                url: urlapi,
                data: { detect: "product_product_manager", type_manager: "list_product_product", id_module_product: data.data[1].id },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    var content_left = "";
                    var content_right = "";
                    if (response.success == "true") {
                        $.each(response.data, function(k, v) {
                            if (k == 0) {
                                content_left += `
                                <div class="box-item w-100 px-0 py-0">
                                    <div class="thumb-nail">
                                        <img src="${urlserver+v.product_img}" alt="">
                                    <div class="item-content pd-2rem mg-t-1rem">
                                        <h4 class="t-left fw-600 t-cap fz-2rem lh-2rem">${v.product_title}</h4>
                                        <span class="t-left fw-400 t-cap fz-2rem lh-2rem">${v.category_title}</span>
                                    </div>
                                </div>
                                
                                `;
                            } else {
                                content_right += `
                                <div class="box-item px-0 py-0">
                                    <div class="thumb-nail">
                                        <img src="${urlserver+v.product_img}" alt="">
                                    </div>
                                    <div class="item-content px-1rem py-05rem">
                                        <h4 class="t-left fw-600 t-cap fz-125rem lh-125rem">${v.product_title}</h4>
                                        <span class="t-left fw-400 t-cap fz-1rem lh-1rem">${v.category_title}</span>
                                    </div>
                                </div>  
                                `;
                            }
                        });
                    }

                    $("#content2_left").html(content_left);
                    $("#content2_right").html(content_right);

                }
            });


        }
    })
}
$(document).ready(function() {
    $("#main-menu li:nth-child(4)").addClass("active");
    show_product()
});