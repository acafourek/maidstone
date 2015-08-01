jQuery(document).ready(function($){

    // Menu interactions
    $(".menu li:has(ul)").addClass("parent").append('<span><b class="caret"></b></span>');
    $('.menu .sub-menu').hide();
    $('.menu span').click(function() {
        $(this).prev(".sub-menu").toggle();
        //$(this).prev("li").addClass("open");
    });

});