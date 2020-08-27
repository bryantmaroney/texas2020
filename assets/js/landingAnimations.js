jQuery(document).ready(function($) {
	if($(window).width() >= 1050) {
		// section2
		$('.solutionLeft, .solutionRight').hide();

		// section3
		$('.sliderTitle').hide();
		$('.cart').find('.videoContainer').hide();
		$('.cart').find('.videoContainer').next().hide();
		$('.arrow-left').hide();
		$('.arrow-right').hide();
		$('.indicators').hide();

		// section4
		$('.districtText').find('p').hide();
		$('.districtBoard').hide();

		// section5
		$('.july4Text').hide();
		$('.july4image').hide();
		$('.secondRed').hide();
		$('.footerSection').hide();
		
	}

	$(document.body).on('touchmove', onScroll);
	$(window).on('scroll', onScroll);	


    function onScroll() {
		if($(window).width() >= 1050) {
			// section1
			if($(this).scrollTop() > $("#Section1").offset().top - 600){
				if(!$('.section1Left').hasClass('animate__slideInLeft') &&
				!$('.header_red_section').hasClass('animate__slideInLeft') &&
				!$('.section1Right').hasClass('animate__slideInRight')){
						$('.section1Left').show().addClass('animate__slideInLeft');
						$('.header_red_section').show().addClass('animate__slideInLeft');
						$('.section1Right').show().addClass('animate__slideInRight');
				}	
			}
			// section2
			if($(this).scrollTop() > $("#Section2").offset().top - 700){
				if(!$('.solutionLeft').hasClass('animate__slideInLeft') &&
				!$('.solutionRight').hasClass('animate__slideInRight')){

					$('.solutionLeft').show().addClass('animate__slideInLeft');
					$('.solutionRight').show().addClass('animate__slideInRight');
				}
			}
			// section3
			if($(this).scrollTop() > $("#Section3").offset().top - 400){

				if(!$('.sliderTitle').hasClass('animate__bounceIn') && !$('.cart').find('.videoContainer').hasClass('animate__slideInLeft')
					&& !$('.cart').find('.videoContainer').next().hasClass('animate__slideInRight') && !$('.indicators').hasClass('animate__zoomInUp')){

					$('.sliderTitle').show().addClass('animate__bounceIn');
					$('.cart').find('.videoContainer').show().addClass('animate__slideInLeft');
					$('.cart').find('.videoContainer').next().show().addClass('animate__slideInRight');
					$('.arrow-left').fadeIn(300);
					$('.arrow-right').fadeIn(300);
					$('.indicators').show().addClass('animate__rubberBand');
				}

				
			}
			// section4
			if($(this).scrollTop() > $("#Section4").offset().top - 400){
				if(!$('.districtText').find('p').hasClass('animate__slideInLeft')  && !$('.districtBoard').hasClass('animate__slideInRight')){
					$('.districtText').find('p').show().addClass('animate__slideInLeft');
					$('.districtBoard').show().addClass('animate__slideInRight');
				}
			}
			// section5
			if($(window).scrollTop() > $("#Section5").offset().top - 800){
				if(!$('.july4Text').hasClass('animate__lightSpeedInLeft')  && !$('.july4image').hasClass('animate__zoomIn')
					 
						&& !$('.secondRed').hasClass('animate__lightSpeedInLeft') && !$('.footerSection').hasClass('animate__fadeInUp') ){

					$('.july4Text').show().addClass('animate__lightSpeedInLeft');
					$('.july4image').show().addClass('animate__zoomIn');	
					
					$('.secondRed').show().addClass('animate__lightSpeedInLeft');	
					$('.footerSection').show().addClass('animate__fadeInUp');
					
								
				}
			}








			// section1
			if($(this).scrollTop() >= $(window).height() - 50){
				$('.section1Left').hide().removeClass('animate__slideInLeft');
				$('.header_red_section').hide().removeClass('animate__slideInLeft');
				$('.section1Right').hide().removeClass('animate__slideInRight');
			}
			// section2
			if($(this).scrollTop() >= $("#Section2").offset().top + $("#Section2").height() || $(this).scrollTop() < 100){
				$('.solutionLeft').hide().removeClass('animate__slideInLeft');
				$('.solutionRight').hide().removeClass('animate__slideInRight');
			}
			// section3
			if($(this).scrollTop() >= $("#Section3").offset().top + $("#Section3").height() || $(this).scrollTop() < $("#Section3").offset().top - $("#Section3").height()){
				$('.sliderTitle').hide().removeClass('animate__bounceIn');
				$('.cart').find('.videoContainer').hide().removeClass('animate__slideInLeft');
				$('.cart').find('.videoContainer').next().hide().removeClass('animate__slideInRight');
				$('.indicators').hide().removeClass('animate__rubberBand');

			}
			// section4
			if($(this).scrollTop() >= $("#Section4").offset().top + $("#Section4").height() - 100 || $(this).scrollTop() < $("#Section4").offset().top - $("#Section4").height()){
				$('.districtText').find('p').hide().removeClass('animate__slideInLeft');
				$('.districtBoard').hide().removeClass('animate__slideInRight');
			}
			// section5
			if($(window).scrollTop() < $("#Section5").offset().top - $("#Section5").height()-300){
				$('.july4Text').hide().removeClass('animate__lightSpeedInLeft');
				$('.july4image').hide().removeClass('animate__zoomIn');	
				$('.learnBotAnim').hide().removeClass('animate__slideInLeft');
				$('.contactUsBottom').hide().removeClass('animate__slideInRight');	
				$('.secondRed').hide().removeClass('animate__lightSpeedInLeft');
				$('.footerSection').hide().removeClass('animate__fadeInUp');		
			}

		}

		

    }

	  	




})