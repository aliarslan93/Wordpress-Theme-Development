    $(".testimonial .indicators li").click(function(){
        var i = $(this).index();
        var targetElement = $(".testimonial .tabs li");
        targetElement.eq(i).addClass('active');
        targetElement.not(targetElement[i]).removeClass('active');
    });
    $(".testimonial .tabs li").click(function(){
        var targetElement = $(".testimonial .tabs li");
        targetElement.addClass('active');
        targetElement.not($(this)).removeClass('active');
    });
    $(".slider .swiper-pagination span").each(function(i){
        $(this).text(i+1).prepend("0");
    });
