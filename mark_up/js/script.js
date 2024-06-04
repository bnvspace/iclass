$(function(){//DOM READEY
	if (window.PIE) {
        $('.pie').each(function() {
            PIE.attach(this);
        });
    }
	if ($('input[placeholder]').length || $('textarea[placeholder]').length)$('input[placeholder], textarea[placeholder]').placeholder();
	$('.fancybox').fancybox({'padding':5})
	$('.fancybox_zoom').fancybox({
		'padding':0,
		'wrapCSS':'zoom_out'
	});
	$('.fancybox_event').fancybox({
		'padding':0,
		'wrapCSS':'sign_event'
	});
	$('form').on('submit',function(e){
		$(this).find('input').each(function(index, element) {
			if ($(this).hasClass('placeholder')) $(this).val("");
		});
		$(this).find('textarea').each(function(index, element) {
			if ($(this).hasClass('placeholder')) $(this).val("");
		});
	});
	$('#slider_else').owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		mouseDrag:false
	});
	var owl = $('.news_carousel')
	owl.owlCarousel({
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1100,2],
		itemsDesktopSmall : [992,2], // betweem 900px and 601px
		itemsTablet: [768,2], //2 items between 600 and 0
		itemsMobile : [580,1] // itemsMobile disabled - inherit from itemsTablet option
	});
	$('.news_arrows-carousel a[href="#next"]').click(function(){owl.trigger('owl.next');})
	$('.news_arrows-carousel a[href="#prev"]').click(function(){owl.trigger('owl.prev');})
	
	var owlRightBanner = $('.right_banner')
	owlRightBanner.owlCarousel({
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true,
		mouseDrag:false
	});
	$('.right_banner_arrows-carousel a[href="#next"]').click(function(){owlRightBanner.trigger('owl.next');})
	$('.right_banner_arrows-carousel a[href="#prev"]').click(function(){owlRightBanner.trigger('owl.prev');})
	
	$(document).on('click','.top_menu-button',function(e){
		e.preventDefault();
		$('.top_menu .container ul').slideToggle()
		$(this).toggleClass('opened');
	});
	$(document).on('click','.phone_menu-icon',function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$('.main_menu menu').slideToggle()
	})
	//alert($(window).width());
	$(document).on('click','.event_item-img',function(e){
		e.preventDefault();
		$(this).closest('.event_list-item').find('.event_item-more_text').slideToggle()
	})
});