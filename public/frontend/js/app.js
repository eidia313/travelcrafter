
$(document).ready(function(){
	//Navigation Height
	var navElem = $("#nav");
	var navElemHeight = navElem.outerHeight();
	navElem.css("top", -navElemHeight);

	//Scroll Down Video Section
	var scrollDownBtn = $("#video__scroll");
	scrollDownBtn.click(function(e) {
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $("#main").offset().top - navElemHeight
	    }, 1200);
	});


	//VIdeo Element Height assign to main margin top
	var videoElem = $(".video");
	if(videoElem){
		$("#main").css("margin-top", videoElem.height());
	}

	//On Video Scroll show Navigation
	$(window).scroll(function(){
		let windowScrollTop = $(window).scrollTop()
		//console.log(windowScrollTop);
		if(windowScrollTop >= navElem.height()/4){
			if(!(navElem.hasClass("show"))){
				navElem.addClass("show");
			}
		}else{
			navElem.removeClass("show");
		}
	});

	//Top Selling Slider
		jQuery("#topselling-slider").owlCarousel({
		    loop:true,
		    margin:30,
		    responsiveClass:true,
		    dotsEach: true,
		    nav:true,
		    stagePadding: 5,
		    dotsContainer: '.tsctrl__dots',
		    navContainer: '.tsctrl__navs',
		    navText: ['<i class="hct-back"></i>', '<i class="hct-next"></i>'],
		    responsive:{
		        0:{
		            items:1,
		        },
		        600:{
		            items:2,
		        },
		        1000:{
		            items:3,
		        }
		    }
		});

});
