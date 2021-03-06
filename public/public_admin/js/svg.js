/*
 * Replace all SVG images with inline SVG
 */
// jQuery('img.svg').each(function() {
//     var $img = jQuery(this);
//     var imgID = $img.attr('id');
//     var imgClass = $img.attr('class');
//     var imgURL = $img.attr('src');
//     console.log(this);

//     jQuery.get(imgURL, function(data) {
//         // Get the SVG tag, ignore the rest
//         var $svg = jQuery(data).find('svg');

//         // Add replaced image's ID to the new SVG
//         if (typeof imgID !== 'undefined') {
//             $svg = $svg.attr('id', imgID);
//         }
//         // Add replaced image's classes to the new SVG
//         if (typeof imgClass !== 'undefined') {
//             $svg = $svg.attr('class', imgClass + ' replaced-svg');
//         }

//         // Remove any invalid XML tags as per http://validator.w3.org
//         $svg = $svg.removeAttr('xmlns:a');

//         // Replace image with new SVG
//         $img.replaceWith($svg);

//     }, 'xml');

// });

// Run once the document is ready.
$(function() {
    // For each image with an SVG class, execute the following function.
    $("img.svg").each(function() {
        // Perf tip: Cache the image as jQuery object so that we don't use the selector muliple times.
        var $img = jQuery(this);
        // Get all the attributes.
        var attributes = $img.prop("attributes");
        // Get the image's URL.
        var imgURL = $img.attr("src");
        // Fire an AJAX GET request to the URL.
        $.get(imgURL, function(data) {
            // The data you get includes the document type definition, which we don't need.
            // We are only interested in the <svg> tag inside that.
            var $svg = $(data).find('svg');
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');
            // Loop through original image's attributes and apply on SVG
            $.each(attributes, function() {
                $svg.attr(this.name, this.value);
            });
            // Replace image with new SVG
            $img.replaceWith($svg);
        });
    });
});