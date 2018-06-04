/* Start Loading GIF Function */
$(window).on('load',function() {
	// Animate loader off screen
	$(".loader-div").fadeOut("slow");;
});
/* End Loading GIF Function */

/* Start Go Top Button */
$(document).ready(function(){

    //Check to see if the window is top if not then display button
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});

$('.scrollToTop').hover(function(){
	$('.fa-angle-double-up').stop(true).animate({
		fontSize: '30px'
	}, "fast");
}, function(){
	$('.fa-angle-double-up').stop(true).animate({
		fontSize: '15px'
	}, "fast");
});
/* End Go Top Button */

