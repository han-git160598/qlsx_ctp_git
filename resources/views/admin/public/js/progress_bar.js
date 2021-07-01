$(document).ready(function() {
    var extend = "_active.png";
    var progressbar_li = $(".progressbar li");
    var progressbar_img;
    var progressbar_img_active;
    var progressbar_img_name;

    progressbar_li.click(function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            progressbar_img = $(this).children(".icon").children("img");
            progressbar_img_name = $(this).children(".icon").children("img").attr('src').slice(0, -11);
            progressbar_img.attr("src", progressbar_img_name + ".png");
        } else {
            $(this).addClass("active");
            progressbar_img = $(this).children(".icon").children("img");
            progressbar_img_name = $(this).children(".icon").children("img").attr('src').slice(0, -4);
            progressbar_img.attr("src", progressbar_img_name + extend);
        }
    });

    var progressbar_point_li = $(".progressbar-point li");
    var progressbar_point_img;
    var progressbar_point_img_active;
    var progressbar_point_img_name;

    progressbar_point_li.click(function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            progressbar_point_img = $(this).children(".icon").children("img");
            progressbar_point_img_name = $(this).children(".icon").children("img").attr('src').slice(0, -11);
            progressbar_point_img.attr("src", progressbar_point_img_name + ".png");
        } else {
            $(this).addClass("active");
            progressbar_point_img = $(this).children(".icon").children("img");
            progressbar_point_img_name = $(this).children(".icon").children("img").attr('src').slice(0, -4);
            progressbar_point_img.attr("src", progressbar_point_img_name + extend);
        }
    });


});