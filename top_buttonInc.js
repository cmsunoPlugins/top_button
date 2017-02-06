var scrollTrigger=100,a=document.createElement('a');
a.id="back-to-top";a.href="#";a.title="back to top";
document.getElementsByTagName('body')[0].appendChild(a);
jQuery(document).ready(function(){
	var backToTop=function(){
		var scrollTop=jQuery(window).scrollTop();
		if(scrollTop>scrollTrigger)jQuery('#back-to-top').addClass('show');
		else jQuery('#back-to-top').removeClass('show');
	};
	backToTop();
	jQuery(window).on('scroll',function(){backToTop();});
	jQuery('#back-to-top').on('click',function(e){
		e.preventDefault();
		jQuery('html,body').animate({scrollTop:0},700);
	});
});
