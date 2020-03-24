jQuery(document).ready(function($){

	/* product slider js */

	$('.product_slider').owlCarousel({
		loop:true,
		item: 4,
		margin:10,
		dots: false,
		autoplay:true,
		autoplayTimeout:3000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
		
	});

	var owl = $('.product_slider');
	owl.owlCarousel();
	// Go to the next item
	$('.thin-left').click(function() {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.thin-right').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel');


	});

});

jQuery(document).ready(function($){
	
		/* product slides js */
		
	$('.product_slides').owlCarousel({
		loop:true,
		nav:false,
		autoplay:true,
		mouseDrag:false,
		animateOut: 'fadeOutUp',
		animateIn: 'fadeInDown',
		touchDrag:false,
		dots: true,
		autoplayTimeout:5000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	var owl = $('.product_slides');
	owl.owlCarousel();
	// Go to the next item
	$('.owl-dots').click(function() {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.owl-dots').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel', [300]);
	})


	/* home page slider js */

	$('.homepage_slides').owlCarousel({
		loop:true,
		nav:true,
		navText: ["<i class='icofont icofont-line-block-left'></i>","<i class='icofont icofont-line-block-right'></i>"],
		autoplay:true,
		mouseDrag:false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		touchDrag:false,
		dots: false,
		autoplayTimeout:10000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	});

	$(".homepage_slides").on("translate.owl.carousel",function(){
		$(".single_slide_item .slider_text_bg").removeClass("animated fadeInRight");
	});

	$(".homepage_slides").on("translated.owl.carousel",function(){
		$(".single_slide_item .slider_text_bg").addClass("animated fadeInRight");
	});

	$(".homepage_slides").on("translate.owl.carousel",function(){
		$(".single_slide_item h4").removeClass("animated fadeInRight");
	});

	$(".homepage_slides").on("translated.owl.carousel",function(){
		$(".single_slide_item h4").addClass("animated fadeInRight");
	});

	$(".homepage_slides").on("translate.owl.carousel",function(){
		$(".single_slide_item a").removeClass("animated fadeInLeftBig");
	});

	$(".homepage_slides").on("translated.owl.carousel",function(){
		$(".single_slide_item a").addClass("animated fadeInLeftBig");
	});


	/* meet team slider js */

	$('.meet_team_slide').owlCarousel({
		loop:true,
		margin:10,
		autoplay:true,
		item: 4,
		nav:false,
		autoplayTimeout:3000,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:4
			}
		}
	})

	var owl = $('.meet_team_slide');
	owl.owlCarousel();
	// Go to the next item
	$('.owl-nextt').click(function() {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.owl-previous').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel', [300]);
	});




	/* wow js */
	
	new WOW().init();
	
	

	/* Countdown js */
	
	$('#countdown_sec').ClassyCountdown({
		theme: "flat-colors-wide",
		end: $.now() + 10000
	});
	


	/* product checkout js */
	
	$('.close_icon1').on('click', function (c) {
		$('.check1').fadeOut('slow', function (c) {
			$('.check1').remove();
		});
	});
	
	$('.close_icon2').on('click', function (c) {
		$('.check2').fadeOut('slow', function (c) {
			$('.check2').remove();
		});
	});
	
	$('.close_icon3').on('click', function (c) {
		$('.check3').fadeOut('slow', function (c) {
			$('.check3').remove();
		});
	});
	
	
});


$(document).ready(function(){
	$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
		
		
		$('ul#navwrap').slicknav({
		prependTo:'.responsive_menu_wrap'
		});
});

 $(document).ready(function(){
    $(".").sticky({topSpacing:0});
  });


  
    // Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});

  
