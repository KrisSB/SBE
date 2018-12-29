$(document).ready(function() {

    var count = $('#slides .slide').length;
    slider_css();
    /*
     for(var i = 1; i <= count; i++) {
     var src = $('#slides .slide:nth-child(' + i + ') img').attr('src');
     $('#slider-tabs').append('<li><img src="' + src + '" /></li>');
     }
     */
    var slide = 1;
    var auto = setInterval(function() {
        if (slide >= count) {
            slide = 0;
        }
        sliding();
        slide += 1;
    }, 10000);

    $('#slider-tabs li img').click(function() {
        slide = $('#slider-tabs li img').index(this);
        sliding();
        return slide;
    });

    $('#slider-left-nav').click(function() {
        slide = slide - 1;
        if (slide < 0) {
            slide = count - 1;
        }
        sliding();
        return slide;
    });
    $('#slider-right-nav').click(function() {
        if (slide >= count) {
            slide = 0;
        }
        sliding();
        slide += 1;
        return slide;
    });
    function sliding() {

        $('#slides').animate({
            marginLeft: $('#slider').width() * (slide * -1)
        }, 1000);
        //Lights off all the tabs
        $('#slider-tabs li img').css({
            boxShadow: 'none'
        });
        //Lights up the current tab
        $('#slider-tabs li:nth-child(' + (slide + 1) + ') img').css({
            boxShadow: '0 0 10px #F00'
        });

    }
    function slider_css() {

        var width = count * $('#slider').width();
        $('#slides').css({
            width: width,
            height: $('#slider').height()
        });

        $('#slider-left-nav').css({
            position: 'absolute',
            top: ($('#slider').height() / 2) - ($('#slider-right-nav').height() / 2),
            right: $('#slider').width() - ($('#slider-right-nav').width() / 2)
        });
        $('#slider-right-nav').css({
            position: 'absolute',
            top: ($('#slider').height() / 2) - ($('#slider-right-nav').height() / 2),
            left: $('#slider').width() - ($('#slider-right-nav').width() / 2)
        });
    }
});
