$(document).ready(function(){
    
    /**
     * Affiche le menu Hamberger
     */
    $('i.iconMenu').click(function(){
        $('nav .nav-list').slideToggle();
    });
    
    $(window).scroll(function (){
        var sc = $(this).scrollTop();
        if (sc > 70) {
            $('header').addClass('sticky');
        }else {
            $('header').removeClass('sticky');
        }

    });
});

