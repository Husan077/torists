//Инициализируем Swiper
new Swiper('.mySwiper', {
    // Стрелки
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    // Навигация
    // Буллеты, текущее положение, прогресбар
    pagination: {
        el: '.swiper-pagination-bullets',

        // Буллеты
        clickable: true,
        // Динамические буллеты
        // dynamicBullets: true,
        // Кастомные буллеты
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + '</span>';
        },

    },


    // Хаш
    simulateTouch: true,
    //Чувствительность свайпа
    touchRatio: 1,
    //Угол срабатывание свайпа/перетаскивания
    touchAngle: 45,
    // Курсор перптаскивания
    grabCursor: true,
    //Переключение при клике на слайд
    slideToClickedSlide: true,
    // Навигация по хешу
    hashNavigation: {
        //Щтслецивать состояние
        watchState: true,
    },

    // Упраление клавиатурой
    keyboard: {
        // Включить\выключить
        enabled: true,
        // Включить\выключить
        // только когда слайдер
        // В пределах вьюпорта
        onlyInViewport: true,
        // Включить\выключить
        // управление клавищами
        // pageUp, pageDown
        pageUpDown: true,
    },
    loop: true,
    speed: 500,
    effect:'paralax',
    //Дополнение к fade
    fadeEffect: {
    // Параллельная
    // смена прозрачности
    crossFade: true,
    },

});



$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: true,
    navText: [
        "<i class='fa fa-caret-left'></i>",
        "<i class='fa fa-caret-right'></i>"
    ],
    autoplay: false,
    autoplayHoverPause: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1.5
        }
    }
})


$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 10) {
        $(".header-wrap").addClass("stop");
        $("#__next").addClass("active");
    }
    else {
        $(".header-wrap").removeClass("stop");
        $("#__next").removeClass("active");
    }
});
