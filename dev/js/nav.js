(function($) {

    $(document).ready(function() {
        $('.menu-toggle').click(function (e){
            e.preventDefault();
            $('.main-navigation').toggleClass('active');
        });
    });

})(jQuery);
