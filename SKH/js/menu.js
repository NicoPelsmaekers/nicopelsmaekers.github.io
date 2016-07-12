$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.selector == '[name=topcontent]') {
                $("html, body").animate({
                    scrollTop: 0
                }, 700);
                return false;
            }

            if (target.selector != '#topcontent') {
                $('html, body').animate({
                    scrollTop: target.offset().top - 70
                }, 1000);
                return false;
            }
        }
    });
});
var windowsize = $(window).width();
if (windowsize < 767) {
    $('#mobile').find('a').on('click', function (e) {
        $('.navbar-toggle').trigger('click');
    });
    $('#menuontbijt').find('a').on('click', function (e) {
        $('.navbar-toggle').trigger('click');
    });
    $('#home').find('a').on('click', function (e) {
        $('.navbar-toggle').trigger('click');
    });
}