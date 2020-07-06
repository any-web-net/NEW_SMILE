jQuery(document).ready(function(){
    function htmSlider(){
        /* Зададим следующие параметры */
        /* обертка слайдера */
        var slideWrap = jQuery('.auto_slider-wrap');
        /* кнопки вперед/назад и старт/пауза */
        var nextLink = jQuery('.auto_slider-next-slide');
        var prevLink = jQuery('.auto_slider-prev-slide');
        var playLink = jQuery('.auto_slider-auto');

        /* Проверка на анимацию */
        var is_animate = false;
        /* ширина слайда с отступами */
        var slideWidth = jQuery('.auto_slider-item').outerWidth();
        /* смещение слайдера */
        var scrollSlider = slideWrap.position().left - slideWidth;

        /* Клик по ссылке на следующий слайд */
        nextLink.click(function(){
            if(!slideWrap.is(':animated')) {
                slideWrap.animate({left: scrollSlider}, 500, function(){
                    slideWrap
                        .find('.auto_slider-item:first')
                        .appendTo(slideWrap)
                        .parent()
                        .css({'left': 0});
                });
            }
        });

        /* Клик по ссылке на предыдующий слайд */
        prevLink.click(function(){
            if(!slideWrap.is(':animated')) {
                slideWrap
                    .css({'left': scrollSlider})
                    .find('.auto_slider-item:last')
                    .prependTo(slideWrap)
                    .parent()
                    .animate({left: 0}, 500);
            }
        });

        /* Функция автоматической прокрутки слайдера */
        function autoplay(){
            if(!is_animate){
                is_animate = true;
                slideWrap.animate({left: scrollSlider}, 500, function(){
                    slideWrap
                        .find('.auto_slider-item:first')
                        .appendTo(slideWrap)
                        .parent()
                        .css({'left': 0});
                    is_animate = false;
                });
            }
        }

        setInterval(autoplay, 3000);

        /* Клики по ссылкам старт/пауза */
        playLink.click(function(){
            if(playLink.hasClass('play')){
                /* Изменяем клас у кнопки на клас паузы */
                playLink.removeClass('play').addClass('pause');
                /* Добавляем кнопкам вперед/назад клас который их скрывает */
                jQuery('.navy').addClass('disable');
                /* Инициализируем функцию autoplay() через переменную
                   чтобы потом можно было ее отключить
                */
                timer = setInterval(autoplay, 3000);
            } else {
                playLink.removeClass('pause').addClass('play');
                /* показываем кнопки вперед/назад */
                jQuery('.navy').removeClass('disable');
                /* Отключаем функцию autoplay() */
                clearInterval(timer);
            }
        });

    }

    /* иницилизируем функцию слайдера */
    htmSlider();
});