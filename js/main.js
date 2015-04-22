$(document).ready(function () {
    $(".button-collapse").sideNav();

    $(document).ready(function(){
        $('.slider').slider({full_width: true});
    });
});

$(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
        $('nav').addClass('shrink');
    } else {
        $('nav').removeClass('shrink');
    }
});