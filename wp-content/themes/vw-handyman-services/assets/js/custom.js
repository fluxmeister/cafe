function vw_handyman_services_menu_open_nav() {
	window.vw_handyman_services_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function vw_handyman_services_menu_close_nav() {
	window.vw_handyman_services_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});

	new WOW().init();
});

jQuery(document).ready(function () {
	window.vw_handyman_services_currentfocus=null;
  	vw_handyman_services_checkfocusdElement();
	var vw_handyman_services_body = document.querySelector('body');
	vw_handyman_services_body.addEventListener('keyup', vw_handyman_services_check_tab_press);
	var vw_handyman_services_gotoHome = false;
	var vw_handyman_services_gotoClose = false;
	window.vw_handyman_services_responsiveMenu=false;
 	function vw_handyman_services_checkfocusdElement(){
	 	if(window.vw_handyman_services_currentfocus=document.activeElement.className){
		 	window.vw_handyman_services_currentfocus=document.activeElement.className;
	 	}
 	}
 	function vw_handyman_services_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.vw_handyman_services_responsiveMenu){
			if (!e.shiftKey) {
				if(vw_handyman_services_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				vw_handyman_services_gotoHome = true;
			} else {
				vw_handyman_services_gotoHome = false;
			}

		}else{

			if(window.vw_handyman_services_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.vw_handyman_services_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.vw_handyman_services_responsiveMenu){
				if(vw_handyman_services_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					vw_handyman_services_gotoClose = true;
				} else {
					vw_handyman_services_gotoClose = false;
				}
			
			}else{

			if(window.vw_handyman_services_responsiveMenu){
			}}}}
		}
	 	vw_handyman_services_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

jQuery('document').ready(function(){
  var owl = jQuery('#services-sec .owl-carousel');
    owl.owlCarousel({
    margin:20,
    nav: true,
    autoplay : true,
    lazyLoad: true,
    autoplayTimeout: 3000,
    loop: false,
    dots:false,
    navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});