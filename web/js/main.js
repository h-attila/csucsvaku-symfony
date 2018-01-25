(function () {

    // menu animation
    $('.menu__item')
        .on('click', function () {
            $(this).toggleClass('active').siblings().removeClass('active');
        })
    ;

    // menu update on scrolling
    $('.main-slide').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__main-slide').addClass('active').siblings().removeClass('active');
        }
    });

    $('.customer-info').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__customer-info').addClass('active').siblings().removeClass('active');
        }
    });

    $('.functions-info').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__functions-info').addClass('active').siblings().removeClass('active');
        }
    });

    $('.details-info').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__details-info').addClass('active').siblings().removeClass('active');
        }
    });

    $('.benefits-info').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__benefits-info').addClass('active').siblings().removeClass('active');
        }
    });

    $('.order-info').on('inview', function (event, visible) {
        if (visible === true) {
            $('.menu-item__order-info').addClass('active').siblings().removeClass('active');
        }
    });


    // main button handling
    $('.main-slide__button')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.customer-info').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__main-slide')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.main-slide').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__customer-info')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.customer-info').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__functions-info')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.functions-info').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__details-info')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.details-info').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__benefits-info')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.benefits-info').offset().top - 78)
            }, 1500);
        })
    ;

    $('.menu-item__form-info')
        .on('click', function () {
            $('html,body').animate({
                scrollTop: ($('.form-info').offset().top - 78)
            }, 1500);
        })
    ;

    // navigator tabs
    $('.order-info__order-tab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show')
    });

    $('.order-info__message-tab a').on('click', function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    // rules checkbox
    $('#app_bundle_order_form_type_terms_0').on('change', function () {
        var orderBtn = $('.order-form__submit');
        this.checked ? orderBtn.removeClass('disabled') : orderBtn.addClass('disabled');
    });

})();