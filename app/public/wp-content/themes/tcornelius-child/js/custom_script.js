jQuery(document).ready(function($) {

    console.log('work');

    $('.ux-work-teaser')
        .mouseenter(function() {
            $(this).addClass('work-hover');
        })
        .mouseleave(function() {
            $(this).removeClass('work-hover');
        });
});