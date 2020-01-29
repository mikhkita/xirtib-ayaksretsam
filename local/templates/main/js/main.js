$(document).ready(function(){	

    var myHeight = 0,
        myWidth = 0,
        isDesktop = false,
        isTablet = false,
        isMobile = false,
        queues = {
            quantity : 0,
        },
        timeoutQuantity = null,
        heightOrig = 0;

    var progress = new KitProgress("#B7968B", 4);

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
        initMobileSliders();
        movePriceMiniCart();

        if(isMobile){
            //Пересчитать высоту меню
            $(".b-menu-mobile").css("height", String(window.innerHeight - $(".b-header").outerHeight()) + "px");
            $(".b-menu").css("max-height", "none");
        }else{
            $(".b-menu-mobile").css("height", "auto");
            $(".b-menu").css("max-height", String(window.innerHeight - $(".b-header").outerHeight()) + "px");
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

    function initStick(){
        if( !isMobile && $('.stick').length) {
            $(".stick").stick_in_parent({offset_top: 40})
        }
    }

    initStick();

    var decCases = [2, 0, 1, 1, 1, 2];
    function decOfNum(number, titles){
        return titles[ (number%100>4 && number%100<20)? 2 : decCases[(number%10<5)?number%10:5] ];
    }

    function formatNumber(number) {
        return String(number).replace(/(\d)(?=(\d{3})+([^\d]|$))/g, '$1 ');
    }

    function positionSearch() {
        if($(".b-search-content").hasClass("results-open")){
            $(".b-search-content").css("top", String($(".b-header").outerHeight() + 30) + "px");
        }else{
            $(".b-search-content").css("top", String(window.innerHeight/2 - 29 + $(".b-header").outerHeight()/2) + "px");
        }
    }

    function initMobileSliders() {
        if(isMobile){
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
        }else{
            $(".mobile-slider").each(function() {
                if($(this).hasClass("slick-initialized")){
                    $(this).slick('unslick');
                }
            });
        }
    }

    function movePriceMiniCart() {
        if(isMobile){
            $(".price-cont-desktop .b-cart-item-price-cont").each(function() {
                var $this = $(this);
                $this.parents(".b-cart-item").find(".price-cont-mobile").append($this);
            });
        }else{
            $(".price-cont-mobile .b-cart-item-price-cont").each(function() {
                var $this = $(this);
                $this.parents(".b-cart-item").find(".price-cont-desktop").append($this);
            });
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

    var cartTextWidth = $('.b-cart-text').innerWidth();
    var cartCountWidth = $('.b-cart-count').innerWidth();
    $('.b-cart-text').animate({
        width : cartTextWidth,
        opacity : "hide"
    }, 100, "swing", function(){
        // $('.b-cart-text-inner').innerWidth($('.b-cart-count').innerWidth());
        $('.b-cart-text-cont').addClass('show');
    });

    $('.b-cart-icon').on('mouseenter', function(){
        setTimeout(function(){
            $('.b-cart-text-inner').stop().animate({
                width : cartTextWidth + cartCountWidth + 24,
                opacity : "show"
            }, 400, "swing", function(){
                $('.b-cart-text').addClass('show');
            });
            $('.b-cart-text').stop().animate({
                opacity : "show"
            }, 300);
        },200);
    });

     $('.b-cart-icon').on('mouseleave', function(){
        $('.b-cart-text').removeClass('show');
        setTimeout(function(){
            $('.b-cart-text-inner').stop().animate({
                width : cartCountWidth + 24,
            }, 400, "swing");
            $('.b-cart-text').stop().animate({
                opacity : "hide"
            }, 300);
        },300);
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

    $(document).on('click', '.b-cart-item-plus', function(){
        var $input = $(this).parents('.b-cart-item-count').find('.input-count');

        if ($input.parents(".b-cart-item-info").attr('data-quantity') != 0) {
            var count = parseInt($input.val()) + 1;
            count = (count > maxBasketCount || isNaN(count) === true) ? maxBasketCount : count;
            $input.val(count).change();
        }

        return false;
    });

    $(document).on('click', '.b-cart-item-minus', function(){

        var $input = $(this).parents('.b-cart-item-count').find('.input-count');
        var count = parseInt($input.val()) - 1; 
        count = (isNaN(count) === true) ? 1 : count;
        $input.val(count).change();
        return false;
    });

    $(document).on('change', '.input-count, .select-count', function(){
        changeQuantity($(this).parents(".b-cart-item"), $(this).val()*1);
    });

    function changeQuantity($item, count) {
        var $input = $item.find(".input-count");
        var $select = $item.find(".select-count");
        var url = "/ajax/index.php";

        count = (count > maxBasketCount || isNaN(count) === true) ? maxBasketCount : count;
        count = (count > $item.attr('data-quantity')*1) ? Number($item.attr('data-quantity')) : count;

        $input.val(count);
        $select.val(count);

        if(count < 1){
            $item.addClass("hidden").animate({
                height : 'hide',
                margin : 'hide',
                opacity : 'hide'
            }, 300, 'swing', function(){
                $item.remove();
            });
        }

        updateMiniCart();

        if(timeoutQuantity){
            clearTimeout(timeoutQuantity);
        }
        timeoutQuantity = setTimeout(function () {
            queues.quantity++;
            $.ajax({
                type: "GET",
                url: url,
                data: { 
                    action : "QUANTITY",
                    QUANTITY : count,
                    ELEMENT_ID : $item.attr("data-id"),
                },
                success: function(msg){
                    var reg = /<!--([\s\S]*?)-->/mig;
                    msg = msg.replace(reg, "");
                    var json = JSON.parse(msg);

                    queues.quantity--;
                    console.log([json.id, json.quantity, queues.quantity]);

                    if( json.result == "success" ){
                        if( queues.quantity == 0 ){
                            $input.val(json.quantity);
                            $select.val(json.quantity);

                            updateMiniCart();
                        }
                    }else{
                        alert("Ошибка изменения количества, пожалуйста, обновите страницу");
                    }
                },
                error: function(){
                    queues.quantity--;
                }
            });
        }, 300);

    }

    function updateMiniCart(){
        var sum = 0;
        $(".b-cart-item:not(.hidden)").each(function(){
            var priceTotal = $(this).attr("data-price-total").replace(/[^0-9\.]+/g,"")*1,
                priceBase = $(this).attr("data-price-base").replace(/[^0-9\.]+/g,"")*1,
                count = $(this).find(".input-count").val().replace(/[^0-9\.]+/g,"")*1;
            $(this).find(".b-cart-item-price .item-val").text(formatNumber(priceTotal * count));
            $(this).find(".b-cart-item-price-discount .item-val").text(formatNumber(priceBase * count));
            sum += priceTotal * count;
        });

        $(".b-cart-sum-cont .item-val").text(formatNumber(sum));

        //обновить счетчик корзины
        var count = $(".b-cart-item:not(.hidden)").length;
        var total = $(".b-cart-sum-cont .item-val").text();
        $(".b-cart-count").text(count);
        $(".b-cart-text .item-val").text(total);

        $(".b-cart-text-dec").text(decOfNum(count, ['товар', 'товара', 'товаров']));

        if(count > 0){
            $(".b-cart-text-cont").addClass("show");
            $(".b-cart-inner-empty").addClass("hide");
            $(".b-cart-inner-list").removeClass("hide");
        }else{
            $(".b-cart-text-cont").removeClass("show");
            $(".b-cart-inner-empty").removeClass("hide");
            $(".b-cart-inner-list").addClass("hide");
        }
    }
    updateMiniCart();

    //Добавление в корзину

    var cardTemplate = $('#card-item-template').html();
    var compiledCardTemplate = Handlebars.compile(cardTemplate);

    $(document).on('click', '.b-btn-cart', function(){
        var $this = $(this),
            href = $(this).attr("href"),
            id = $(this).attr("data-id"),
            url = href+"&element_id="+id;

        progress.start(1.5);
        $this.addClass("hide");
        $(".b-preloader").removeClass("hide");
        $.ajax({
            type: "GET",
            url: url,
            success: function(msg){
                var json = JSON.parse(msg);
                if( json.result == "success" ){
                    var html = compiledCardTemplate(json);
                    var $newItem = $(html);
                    //проставить options
                    var maxQuantity = $newItem.attr("data-quantity")*1,
                        quantity = $newItem.find(".input-count").val()*1;
                    $newItem.find(".select-count option").each(function () {
                        var value = $(this).val()*1;
                        if(value > maxQuantity){
                            $(this).prop("disabled", true);
                        }
                        if(value == quantity){
                            $(this).prop("selected", true);
                        }
                    });
                    $(".b-cart-inner-list").append($newItem);
                    movePriceMiniCart();
                    updateMiniCart();

                    $(".b-cap-text").removeClass("hide");
                    setTimeout(function(){
                        $this.removeClass("hide");
                        $(".b-cap-text").addClass("hide");
                    }, 1500);
                }else{
                    alert("Ошибка добавления в корзину, пожалуйста, обновите страницу");
                }
            },
            error: function(){
                $(".b-cap-text").addClass("hide");
                $this.removeClass("hide");
            },
            complete: function(){
                $(".b-preloader").addClass("hide");
                progress.end();
            }
        });
        return false;
    });

/***************** cart *************************/

/***************** detail options hover *************************/

    function optionHoverInit(){
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

        $(document).on('click', '.b-detail-size input', function(){
            var cont = $(this).parents('.b-detail-option-cont');
            cont.find('.active').removeClass('active');
            cont.find('.option-text').text($(this).attr('data-option'));
            $(this).parents('.b-detail-option').addClass('active');
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
    }

    optionHoverInit();

/***************** detail options hover *************************/

/***************** detail photo hover *************************/

    var isImgClick = false;

    function photoHoverInit(){
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
    }

    photoHoverInit();
    changeHoverImg(true);

    $(document).on('scroll', function(){
        changeHoverImg(false);
    });

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
    var compiledSearchTemplate = Handlebars.compile(searchTemplate);
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
                        var html = compiledSearchTemplate(json);
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

/********** detail handlebars ******************/

$(document).on('click', '.b-color-option input', function(){
    var item = $(this).attr('data-item');
    var id = $(this).attr('id');

    var template = Handlebars.compile($('#detail-template').html());
    $('.b-detail .b-block').html(template(offers[item]));

    $('.b-color-option').removeClass('active');
    $('#'+id).parents('.b-color-option').addClass('active');
    $('#'+id).attr('checked', true);

    initStick();
    optionHoverInit();
    photoHoverInit();
    changeHoverImg(true);
    initMobileSliders();

});

/********** detail handlebars ******************/

/********** add to cart detail ******************/

function convertPrice(price){
    return new Intl.NumberFormat('ru-RU').format(Math.round(price));
}

/********** add to cart detail ******************/

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