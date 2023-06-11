document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');
    const closeElem = document.querySelector('.menu__close');
    const overlay = document.querySelector('.menu__overlay');

    hamburger.addEventListener('click', () => {
        menu.classList.add('menu__active');
    });

    closeElem.addEventListener('click', () => {
        menu.classList.remove('menu__active');
    });

    overlay.addEventListener('click', () => {
        menu.classList.remove('menu__active');
    });

    const percents = document.querySelectorAll('.skills__rating-percent');
    const lines = document.querySelectorAll('.skills__rating-line span');

    percents.forEach( (item, i) =>{
        lines[i].style.width = item.innerHTML;
    });

    function blockDoubleClickMenu(e) {
        e.preventDefault();
    }
    const images = document.getElementsByTagName('img');
    for (let i = 0; i < images.length; i++) {
        images[i].addEventListener('contextmenu', blockDoubleClickMenu);
    }

    document.addEventListener('mousedown', function(event) {
        event.preventDefault();
    });
    new WOW().init();

    $(window).scroll(function() {
        if($(this).scrollTop() > 1000) {
            $('.pageup').fadeIn();
        } else {
            $('.pageup').fadeOut();
        }
        });

        $("a[href^='#']").click(function(){
            const _href = $(this).attr("href");
            $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
            return false;
        });
    
        $(document).ready(function() {
            $('.popup').magnificPopup({
                type:'image',
                delegate: 'a',
                });
        });    
});