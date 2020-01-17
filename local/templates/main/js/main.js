$(document).ready(function(){	

    var myHeight = 0,
        myWidth = 0,
        isDesktop = false,
        isTablet = false,
        isMobile = false,
        countQueue = {},
        heightOrig = 0;

    function resize(){
       if( typeof( window.innerWidth ) == 'number' ) {
            myWidth = window.innerWidth;
            myHeight = window.innerHeight;
        } else if( document.documentElement && ( document.documentElement.clientWidth || 
        document.documentElement.clientHeight ) ) {
            myWidth = document.documentElement.clientWidth;
            myHeight = document.documentElement.clientHeight;
        } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
            myWidth = document.body.clientWidth;
            myHeight = document.body.clientHeight;
        }

        if( myWidth > 1199 ){
            isDesktop = true;
            isTablet = false;
            isMobile = false;
        }else if( myWidth > 767 ){
            isDesktop = false;
            isTablet = true;
            isMobile = false;
        }else{
            isDesktop = false;
            isTablet = false;
            isMobile = true;
        }

        positionSearch();

        if(isMobile){
            //Пересчитать высоту меню
            $(".b-menu-mobile").css("height", String(window.innerHeight - $(".b-header").outerHeight()) + "px");
            $(".b-menu").css("max-height", "none");

            $(".mobile-slider").each(function() {
                if(!$(this).hasClass("slick-initialized")){
                    $(this).slick({
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        cssEase: 'ease', 
                        speed: 500,
                        arrows: false
                    });  
                }
            });
            $(".price-cont-desktop .b-cart-item-price-cont").each(function() {
                var $this = $(this);
                $this.parents(".b-cart-item").find(".price-cont-mobile").append($this);
            });
        }else{
            $(".b-menu-mobile").css("height", "auto");
            $(".b-menu").css("max-height", String(window.innerHeight - $(".b-header").outerHeight()) + "px");

            $(".mobile-slider").each(function() {//удалить слайдеры
                if($(this).hasClass("slick-initialized")){
                    $(this).slick('unslick');
                }
            });
            $(".price-cont-mobile .b-cart-item-price-cont").each(function() {
                var $this = $(this);
                $this.parents(".b-cart-item").find(".price-cont-desktop").append($this);
            });
        }



        // if(heightOrig && !isMobile) {
        //     var docHeight = (myHeight - 40 > heightOrig) ? heightOrig : myHeight - 40;
        //     $(".b-detail-right").height(docHeight);
        //     $(".b-detail-right").trigger("sticky_kit:detach");
        //     $(".b-detail-right").stick_in_parent({offset_top: myHeight - docHeight});
        //     $(document.body).trigger("sticky_kit:recalc");
        //     // $(".b-detail-right").css({
        //     //     "margin-left" : (( (390-$(".b-detail-right").width())/2 > 0 )?((390-$(".b-detail-right").width())/2):0)-20
        //     // });
        // }
    }
    $(window).resize(resize);
    resize();

    $.fn.placeholder = function() {
        if(typeof document.createElement("input").placeholder == 'undefined') {
            $('[placeholder]').focus(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                    input.removeClass('placeholder');
                }
            }).blur(function() {
                var input = $(this);
                if (input.val() == '' || input.val() == input.attr('placeholder')) {
                    input.addClass('placeholder');
                    input.val(input.attr('placeholder'));
                }
            }).blur().parents('form').submit(function() {
                $(this).find('[placeholder]').each(function() {
                    var input = $(this);
                    if (input.val() == input.attr('placeholder')) {
                        input.val('');
                    }
                });
            });
        }
    }

    $.fn.placeholder();

    if( !isMobile && $('.stick').length) {
        $(".stick").stick_in_parent({offset_top: 40});  
    }

    function positionSearch() {
        if($(".b-search-content").hasClass("results-open")){
            $(".b-search-content").css("top", String($(".b-header").outerHeight() + 30) + "px");
        }else{
            $(".b-search-content").css("top", String(window.innerHeight/2 - 29 + $(".b-header").outerHeight()/2) + "px");
        }
    }

/***************** slider with drag *************************/


    $(document).find('.b-slider-with-descr-inner-cont').each(function(){
        var slider = $(this)[0];
        var isDown = false;
        var startX;
        var scrollLeft;
        var slideNow = false;
        var timer = 0;
        var timerID = 0;

        slider.addEventListener('mousedown', function(e) {
            isDown = true;
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
            timerID = setInterval(function(){
                timer += 1;
            },1);
        });

        slider.addEventListener('mouseleave', function() {
            isDown = false;
        });

        slider.addEventListener('mouseup', function(e) {

            isDown = false;
            endX = e.pageX - slider.offsetLeft;
            diff = (startX) - (endX);
            clearInterval(timerID);

            if (Math.abs(diff) > 5) {
                slideNow = true;
            }

            mass = 100;

            var speed = diff/timer;
            var impulse = mass * speed;

            if (($(slider).height() - e.offsetY) > 10) {
                inertiaMove(slider, impulse);
            }

            timer = 0;
        });

        slider.addEventListener('mousemove', function(e) {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX);
            slider.scrollLeft = scrollLeft - walk;
        });

        $(this).find('.b-catalog-item').each(function(){
            $(this).on('click',function(){
                if (slideNow) { 
                    slideNow = false;
                    return false; 
                }
            });  
        })

    });

    function inertiaMove(slider, impulse){
        if (Math.abs(impulse) > 10) {
            setTimeout(function(){
                slider.scrollLeft += impulse/5;
                inertiaMove(slider, impulse/1.05);
            },10);
        }
    }

     function setSliderWidth(){
        $(document).find('.b-slider-with-descr-inner').each(function(){
            var maxWidth = 0;
            $(this).find('.b-catalog-item').each(function(){
                maxWidth += $(this).outerWidth(true) + 4;
            });

            bBlockMargin = parseInt($('.b-block').css('margin-left').replace(/\D+/g,""))*2;
            itemMargin = parseInt($('.b-catalog-item').css('margin-right').replace(/\D+/g,""));

            maxWidth = maxWidth + bBlockMargin;

            if (isDesktop) {
                maxWidth -= itemMargin;
            }

            $(this).css('max-width', maxWidth+'px');
        })
    }
    
    setSliderWidth();

    $(window).resize(function(){
        setSliderWidth();
    });


/***************** slider with drag *************************/

/***************** main slider *************************/


    function setMainSliderHeight(){
        if (!isMobile) {
            var width = $('.b-main-slider-cont').width();
            $('.b-main-slider-cont').css('max-height', width/2);
        }
    }

    setMainSliderHeight();

    $(window).resize(function(){
        setMainSliderHeight();
    });
    

    $('.b-main-slider-assets').on('init', function(event, slick){
        $this = $(this);
        setTimeout(function(){
            $this.parents('.b-main-slider-cont').addClass('init');
        },100);
    });

    $('.b-main-slider-assets').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        cssEase: 'ease', 
        speed: 100,
        arrows: false,
        fade: true,
        speed: 500,
        asNavFor: '.b-main-slider',
        touchThreshold: 100,
    });

    $('.b-main-slider').slick({
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        cssEase: 'ease', 
        speed: 500,
        arrows: false,
        asNavFor: '.b-main-slider-assets',
        touchThreshold: 100,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });


/***************** main slider *************************/

/***************** cart *************************/


    $('.b-cart-text').animate({
        width : "hide",
        opacity : "hide"
    }, 100, "swing", function(){
        $('.b-cart-text-cont').addClass('show');
    });

    $('.b-cart-icon').on('mouseenter', function(){
        setTimeout(function(){
            $('.b-cart-text').stop().animate({
                width : "show",
                opacity : "show"
            }, 200, "swing", function(){
                $(this).addClass('show');
            });
        },200);
    });

     $('.b-cart-icon').on('mouseleave', function(){
        $('.b-cart-text').removeClass('show');
        setTimeout(function(){
            $('.b-cart-text').stop().animate({
                width : "hide",
                opacity : "hide"
            }, 200, "swing");
        },200);
    });


    $('.b-header-cart').on('click', function(){
        $('html').addClass('cart-open');
    });

    $('.b-cart-overlay').on('click', function(){
        $('html').removeClass('cart-open');
    });

    $('.b-cart-close').on('click', function(){
        $('html').removeClass('cart-open');
    });

    var maxBasketCount = 20;

    $('.b-cart-item-plus').on('click',function(){
        var $input = $(this).parents('.b-cart-item-count').find('.input-count');

        if ($input.parents(".b-cart-item-info").attr('data-quantity') != 0) {
            var count = parseInt($input.val()) + 1;
            count = (count > maxBasketCount || isNaN(count) === true) ? maxBasketCount : count;
            $input.val(count).change();
        }

        return false;
    });

    $('.b-cart-item-minus').on('click',function(){

        var $input = $(this).parents('.b-cart-item-count').find('.input-count');
        var count = parseInt($input.val()) - 1; 
        count = (isNaN(count) === true) ? 1 : count;
        $input.val(count).change();
        return false;
    });

    $(document).on('change', '.input-count, .select-count', function(){
        changeQuantity($(this).parents(".b-cart-item"), $(this).val());
    });

    function changeQuantity($item, count) {
        var $input = $item.find(".input-count");
        var $select = $item.find(".select-count");

        if(count > $item.attr('data-quantity')*1){
            $input.val(Number($item.attr('data-quantity')));
            $select.val($item.attr('data-quantity'));
        }else{
            $input.val(count);
            $select.val(count);
        }

        if (count == 0){
            $item.animate({
                height : 'hide',
                margin : 'hide',
                opacity : 'hide'
            }, 300, 'swing', function(){
                $item.remove();
            });
        }
    }

/***************** cart *************************/

/***************** detail options hover *************************/


    $(document).on('mouseenter', '.b-detail-option', function(){
        var offsetLeft = $(this)[0].offsetLeft;
        var offsetTop = $(this)[0].offsetTop;
        var hover = $(this).parents('.b-detail-option-cont').find('.b-detail-option-hover');
        
        if ($(this).parents('.b-detail-option-cont').hasClass('b-detail-color')) {
            var borderColor = ($(this).hasClass('black-tick')) ? '#B7968B' : '#FFFFFF';
            hover.css('border-color', borderColor);
        }

        hover.stop().animate({
            left : offsetLeft,
            top : offsetTop,
        }, 300, "swing");
    });

    $(document).on('mouseleave', '.b-detail-option-list-cont', function(){
        var offsetLeft = $(this).parents('.b-detail-option-cont').find('.active')[0].offsetLeft;
        var offsetTop = $(this).parents('.b-detail-option-cont').find('.active')[0].offsetTop;
        var hover = $(this).parents('.b-detail-option-cont').find('.b-detail-option-hover');
        
        if ($(this).parents('.b-detail-option-cont').hasClass('b-detail-color')) {
            var borderColor = ($(this).parents('.b-detail-option-cont').find('.active').hasClass('black-tick')) ? '#B7968B' : '#FFFFFF';
            hover.css('border-color', borderColor);
        }

        hover.stop().animate({
            left : offsetLeft,
            top : offsetTop
        }, 300, "swing");
    });

    $(document).on('click', '.b-detail-option', function(){
        var cont = $(this).parents('.b-detail-option-cont');
        cont.find('.active').removeClass('active');
        $(this).addClass('active');

        cont.find('.option-text').text($(this).find('input').attr('data-option'));
    })

    $(document).find('.b-detail-option-list-cont').each(function(){
        var offsetLeft = $(this).find('.active')[0].offsetLeft;
        var offsetTop = $(this).find('.active')[0].offsetTops;
        var hover = $(this).parents('.b-detail-option-cont').find('.b-detail-option-hover');
        hover.css({
            'left' : offsetLeft,
            'top' : offsetTop,
            'opacity' : '1'
        });
    });

/***************** detail options hover *************************/

/***************** detail photo hover *************************/


    $(document).on('mouseenter', '.b-detail-small-img', function(){
        var offsetTop = $(this)[0].offsetTop*1 - 3;
        var hover = $(this).parents('.b-detail-small-img-list').find('.b-detail-small-img-hover');

        hover.stop().animate({
            top : offsetTop,
        }, 300, "swing");
    });

    $(document).on('mouseleave', '.b-detail-small-img-list', function(){
        var offsetTop = $(this).find('.active')[0].offsetTop*1 - 3;
        var hover = $(this).find('.b-detail-small-img-hover');

        hover.stop().animate({
            top : offsetTop,
        }, 300, "swing");
    });

    var isImgClick = false;

    $(document).on('click', '.b-detail-small-img', function(){
        isImgClick = true;
        var img = $('.b-detail-big-img-list').find('[data-img='+$(this).attr('data-img')+']');

        $('.b-detail-small-img.active').removeClass('active');
        $(this).addClass('active');

        $("body, html").animate({
            scrollTop : img.offset().top-40
        },300, function(){
            isImgClick = false;
        });
    })

    $(document).on('scroll', function(){
        changeHoverImg(false);
    });

    changeHoverImg(true);

    function changeHoverImg(isFirst){

        var flag = false;
        var arImg = [];
        var hover = $('.b-detail-small-img-hover');

        if (!isImgClick) {
            $('.b-detail-big-img-list').find('.b-detail-big-img').each(function(){
                if ($(window).scrollTop() > ($(this).offset().top - 140)) {
                    arImg.push($(this));
                    flag = true;
                }
            });

            if (flag === true) {

                var l = arImg.length;

                var img = $('.b-detail-small-img-list-cont').find('[data-img='+$(arImg[l-1]).attr('data-img')+']');
                var offsetTop = img[0].offsetTop*1 - 3;
                
                if (!img.hasClass('active')) {

                    $('.b-detail-small-img.active').removeClass('active');
                    img.addClass('active');

                    if (isFirst) {
                        hover.css({
                            'top' : offsetTop,
                            'opacity' : 1
                        });
                    } else {
                        hover.stop().animate({
                            top : offsetTop,
                        }, 300, "swing");
                    }
                } else {
                    if (isFirst) {
                        hover.css({
                            'opacity' : 1
                        });
                    }
                }
            } else {
                if (isFirst) {
                    hover.css({
                        'top' : offsetTop,
                        'opacity' : 1
                    });
                }
            }
        }

    }


/***************** detail photo hover *************************/

/***************** search *************************/

    $(".b-header .b-search-icon").on("click", function(){
        if($("html").hasClass("search-open")){
            closeSearch();
        }else{
            $("html").addClass("search-open");
            closeMenu();
        }
    });

    function closeSearch() {
        $("html").removeClass("search-open");
        //сбросить результаты
        $(".b-input-search .b-clear-input").click();
        $(".b-search-result-list").html("");
    }

    var searchTemplate = $('#search-result-template').html();
    var compiledTemplate = Template7.compile(searchTemplate);
    var stackQuery = 0;

    $(document).on("input", ".input-search", function(){
        if($(this).val() !== ""){
            $(this).parent().children(".b-clear-input").addClass("show");
            $(this).parents("form").submit();
        }else{
            $(this).parent().children(".b-clear-input").removeClass("show");
            $(".b-search-content").removeClass("results-open");
            $(".b-search-result-content").removeClass("show");
        }
        positionSearch();
    });

    $(document).on("submit", ".b-search-form", function(){
        var $form = $(this);
        $(".b-search-content").addClass("results-open");
        $(".b-search-result-content").removeClass("show");
        $(".b-search-result .search-preloader").addClass("show");
        stackQuery++;
        setTimeout(function(){
            $.ajax({
                type: $form.attr("method"),
                url: $form.attr("action"),
                data: $form.serialize(),
                success: function(data){
                    stackQuery--;
                    if( stackQuery == 0 ){
                        $(".b-search-result .search-preloader").removeClass("show");
                        $(".b-search-result-content").addClass("show");

                        var json = JSON.parse(data);
                        var html = compiledTemplate(json);
                        $(".b-search-result-list").html(html);
                        if(json.status){
                            $(".search-result-title").show();
                        }else{
                            $(".search-result-title").hide();
                        }
                    }
                },
                complete: function(){

                },
                error: function(){

                },
            });
        },500);
        return false;
    });

    $(document).on("click", ".b-clear-input", function(){
        $(this).parent().children("input").val("").trigger("input");
        $(this).removeClass("show");
    });

/***************** search *************************/

/***************** menu *************************/

$('.b-menu-overlay').on('click', function(){
    $('html').removeClass('menu-open');
});

$(".b-header .b-menu-icon").on("click", function(){
    if($("html").hasClass("menu-open")){
        closeMenu();
    }else{
        $("html").addClass("menu-open");
        closeSearch();
    }
});

function closeMenu () {
    $("html").removeClass("menu-open");
    $(".slide-cont").removeClass("open");
    setTimeout(function () {
       $(".slide-cont").html("");
    }, 200);
}

$(".b-menu-mobile a").on("click", function(){
    if($(this).siblings(".b-menu-sub").length){

        var $items = $(this).siblings(".b-menu-sub").clone();
        var $cont = $(".slide-cont");
        $cont.append("<h3 class='mobile-window-back'>"+"<div class='icon b-arrow-left'></div>"+$(this).text()+"</h3>");
        $cont.append($items);

        $(".mobile-window-back").click(function(){
            var $target = $(this).parent();
            $target.removeClass("open");
            setTimeout(function () {
                $target.html("");
            }, 200);
        });

        setTimeout(function () {
            $cont.addClass("open");
        }, 10);

        return false;
    }
});

/***************** menu *************************/

/******************************************/

    //  var menuSlideout = new Slideout({
    //     'panel': document.getElementById('page'),
    //     'menu': document.getElementById('mobile-menu'),
    //     'side': 'left',
    //     'padding': 300,
    //     'touch': false
    // });

    // var cartSlideout = new Slideout({
    //     'panel': document.getElementById('page'),
    //     'menu': document.getElementById('cart'),
    //     'side': 'right',
    //     'padding': 650,
    //     'touch': false
    // });

    // $('.mobile-menu').removeClass("hide");
    // $('.mobile-catalog').removeClass("hide");

    // $('.burger-menu').click(function() {
    //     menuSlideout.open();
    //     $('.mobile-menu').show();
    //     $('.mobile-catalog').hide();
    //     $(".b-cart-overlay").show();
    //     return false;
    // });

    // $('.b-cart-icon').click(function() {
    //     cartSlideout.open();
    //     $('.b-cart').show();
    //     $('.mobile-menu').hide();
    //     $(".b-cart-overlay").show();
    //     return false;
    // });

    // $('.b-cart-close').click(function() {
    //     menuSlideout.close();
    //     cartSlideout.close();
    //     $('.b-cart-overlay').hide();
    //     return false;
    // });

    // $('.b-cart-overlay').click(function() {
    //     menuSlideout.close();
    //     cartSlideout.close();
    //     $('.b-cart-overlay').hide();
    //     return false;
    // });

    // menuSlideout.on('open', function() {
    //     $('.mobile-menu').removeClass("hide");
    //     $(".b-cart-overlay").show();
    // });

    // cartSlideout.on('open', function() {
    //     $('.b-cart').removeClass("hide");
    //     $(".b-cart-overlay").show();
    // });

    // menuSlideout.on('close', function() {
    //     setTimeout(function(){
    //         $("body").unbind("touchmove");
    //         $("#mobile-catalog, #mobile-menu").hide();
    //         $(".b-cart-overlay").hide();
    //     },100);
    // });

    // cartSlideout.on('close', function() {
    //     setTimeout(function(){
    //         $("body").unbind("touchmove");
    //         $("#cart, #mobile-menu").hide();
    //         $(".b-cart-overlay").hide();
    //     },100);
    // });

/******************************************/



    // $(".b-slider-with-descr").slick({
    //     dots: false,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     infinite: true,
    //     cssEase: 'ease', 
    //     speed: 500,
    //     arrows: false,
    //     touchThreshold: 100,
    //     variableWidth: true,
    // });

    // // Первая анимация элементов в слайде
    // $(".b-step-slide[data-slick-index='0'] .slider-anim").addClass("show");

    // // Кастомные переключатели (тумблеры)
    // $(".b-step-slider").on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //     $(".b-step-tabs li.active").removeClass("active");
    //     $(".b-step-tabs li").eq(nextSlide).addClass("active");
    // });

    // // Анимация элементов в слайде
    // $(".b-step-slider").on('afterChange', function(event, slick, currentSlide, nextSlide){
    //     $(".b-step-slide .slider-anim").removeClass("show");
    //     $(".b-step-slide[data-slick-index='"+currentSlide+"'] .slider-anim").addClass("show");
    // });


    
	// var myPlace = new google.maps.LatLng(55.754407, 37.625151);
 //    var myOptions = {
 //        zoom: 16,
 //        center: myPlace,
 //        mapTypeId: google.maps.MapTypeId.ROADMAP,
 //        disableDefaultUI: true,
 //        scrollwheel: false,
 //        zoomControl: true
 //    }
 //    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

 //    var marker = new google.maps.Marker({
	//     position: myPlace,
	//     map: map,
	//     title: "Ярмарка вакансий и стажировок"
	// });

});