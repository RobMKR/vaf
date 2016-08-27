$('#loader').ready(function(){
	$('.right_nail, .left_nail').addClass('after');
	setTimeout(function(){
    	$('.char_v').addClass('after')
    }, 800);
    setTimeout(function(){
    	$('.char_a').addClass('after')
    }, 1000);
    setTimeout(function(){
    	$('.char_f').addClass('after')
    }, 1200);
    setTimeout(function(){
    	$('.icon-sofa').addClass('after')
    }, 1400);
	setTimeout(function(){
		$( ".squareBorder").animate({
            opacity: 1,  }, 
        1800);
        $( ".squareBorder45").animate({
            opacity: 1,  }, 
        1800);
	}, 1600);
});
