$(document).ready(function() {
    $('.menu-toggle').click(function() {
        const menu = $('.menu');
        const menuHeight = menu.prop('scrollHeight');

        if (menu.height() === 0) {
            menu.css('height', menuHeight);
        } else {
            menu.css('height', '0');
        }
    });

    // Reset menu height on window resize
    $(window).resize(function() {
        if ($(window).width() > 768) {
            $('.menu').css('height', 'auto');
        } else {
            $('.menu').css('height', '0');
        }
    });
});
