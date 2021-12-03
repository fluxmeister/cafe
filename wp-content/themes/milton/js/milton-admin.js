// JavaScript Document
(function($) {
  "use strict";
	
	jQuery(document).ready(function($){
		$('#post-formats-select input').change(checkPostFormat);
		
		// Post format choice
		function checkPostFormat(){
			var format = $('#post-formats-select input:checked').attr('value');
			
			$('#normal-sortables >div[id*=_post_options]').hide();
			$('#normal-sortables >div[id=post_format_'+format+'_post_options]').stop(true,true).fadeIn(500);			
		}
		
		$(window).load(function(){
			checkPostFormat();
		});

		// Agni Slider choice
		function CheckAgniSliderChoice(){
			var format = $('#cmb2-metabox-agni_slides_agni_slider_option input:checked').attr('value');

			$('#normal-sortables >div[id*=agni_slides_]').not('#agni_slides_agni_slider_option').hide();
			$('#normal-sortables >div[id=agni_slides_'+format+'_options]').stop(true,true).fadeIn(500);			
		}
		
		// Slider choice
		$('#cmb2-metabox-agni_slides_agni_slider_option input').change(CheckAgniSliderChoice);
		$(window).load(function(){
			CheckAgniSliderChoice();
		});

		// Portfolio Layout
		function CheckPortfolioLayoutChoice(){
			var layout = $('.cmb2-id-portfolio-layout input:checked').attr('value');

			if( layout != 'plain' ){
				$('.cmb2-id-portfolio-layout-repeatable').show();
			}
			else{
				$('.cmb2-id-portfolio-layout-repeatable').hide();
			}
		}
		$('.cmb2-id-portfolio-layout input').change(CheckPortfolioLayoutChoice);
		$(window).load(function(){
			CheckPortfolioLayoutChoice();
		});

		// Slider Alert
		$('#cmb2-metabox-agni_slides_agni_slider_option input:not(#agni_slides_choice4)').on('click', function(){
			alert('TIP: \nBefore start editing the slider, Add N no. of slides which you want by clicking "Add another Slide" button(at the bottom of each slide) and publish/save the slider. \n\nThank you!');
		})

		// Portfolio Layout Alert
		$('#cmb2-metabox-portfolio_portfolio_options .cmb2-id-portfolio-layout input:not(#portfolio_layout1)').on('click', function(){
			alert('TIP: \nBefore start editing the media, Add N no. of media which you want by clicking "Add another Media" button(at the bottom of each media) and update/save the page. \n\nThank you!');
		})

		// Template Tab default 
		/*$('.vc_ui-template-panel-header-container .vc_ui-tabs-line li').each(function(){
			var $this = $(this);
			if( $this.children('button').data('vc-ui-element-target') == '[data-tab=my_templates]' ){
				console.log("True")
				$this.removeClass('vc_active');
				$this.addClass('hello');
			}
			if( $this.children('button').data('vc-ui-element-target') == '[data-tab=default_templates]' ){
				console.log("Default Template : True")
				$this.addClass('vc_active');
			}
		})
		$('.vc_templates-button').on('click', function(e){
			e.preventDefault();
			
		})*/
		
		$('.vc_ui-flex-row[data-tab="my_templates"]').removeClass('vc_active');
		$('.vc_ui-flex-row[data-tab="default_templates"]').addClass('vc_active');

		// Default template image additon		
		$('.vc_ui-template.vc_templates-template-type-default_templates').each(function(){
			var imge_ele = $(this);
			var image_url = imge_ele.css('background-image'),
		    image;
		    //console.log(image_url);
			image_url = image_url.match(/^url\("?(.+?)"?\)$/);
			if (image_url[1]) {
			    image_url = image_url[1];
			    image = new Image();

			    image.src = image_url;
			    imge_ele.prepend(image);
			    imge_ele.css({'background-image':'none'}); 
			}
		})
		
		
	});
})(jQuery);