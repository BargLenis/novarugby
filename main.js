$(document).ready(function() {
    var social = $('#social');
    var socialTop = social.offset().top;
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop + 90 > socialTop) {
            social.addClass('sticky');
        } else {
            social.removeClass('sticky');
        }
    });
});