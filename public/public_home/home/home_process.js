function show_process() {
    $.ajax({
        url: urlapi,
        method: "post",
        data: { detect: "process_module_manager", type_manager: "list_process_module" },
        success: function(data) {
            console.log(data);
            var output_content1 = `
                    <div class="box-title" >
                            <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[0].module_title}</h1>
                            <p class="short-desc fw-400 fz-125rem t-center">${data.data[0].module_content}</p>
                     </div>

                     <div class="box-content justify-content-center">
                        <div class="content">
                            <img src="${urlserver+data.data[0].module_img}" alt="">
                        </div>
                     </div>
            `;

            var output_content2 = `
                    <h1 class="title t-up fw-600 t-center fz-25rem">${data.data[1].module_title}</h1>
                    <p class="short-desc fw-400 fz-125rem t-center">${data.data[1].module_content}</p>
            
            `;
            $("#title_content1").html(output_content1);
            $("#title_content2").html(output_content2);
            $.ajax({
                type: "post",
                url: urlapi,
                data: { detect: "process_process_manager", type_manager: "list_process_process", id_module_process: data.data[1].id },
                dataType: "json",
                success: function(response) {
                    var content1_con = "";
                    if (response.success == "true") {

                        $.each(response.data, function(k, v) {
                            content1_con += `
                                <div class="box-item">
                                    <div class="item-title">
                                        <h4 class="t-left fz-125rem fw-600">${v.process_title}</h4>
                                    </div>
                                    <div class="item-content">
                                        <p class="fw-400">${v.process_content}</p>
                                        <div class="step-img">
                                            <p class="mg-t-2rem step-img"><img src="${urlserver+v.process_img}" alt=""></p>
                                        </div>
                                    </div>
                                </div>
                                `
                        });
                    }
                    $("#content_content2").html(content1_con);

                }
            });


        }
    })
}
$(document).ready(function() {
    $("#main-menu li:nth-child(3)").addClass("active");
    show_process()
});