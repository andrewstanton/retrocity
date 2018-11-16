$(document).ready(function() {
    $('.nav-hide-show').click(function (e){
        e.preventDefault();
        $('.navigation-col').toggleClass('active');
    });
});