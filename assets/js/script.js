jQuery(document).ready(function($) {
  $('#carusel-mobile').owlCarousel({
        stagePadding: 200,
        loop: true,
        margin: 5,
        items: 1,
        lazyLoad: true,
        nav:false,
        stagePadding: 0,
        responsive:{
            0:{
                items:1,
                stagePadding: 30
            },
            600:{
                items:1,
                stagePadding: 80
            },
            1000:{
                items:1,
                stagePadding: 200
            },
            1200:{
                items:1,
                stagePadding: 250
            },
            1400:{
                items:1,
                stagePadding: 300
            },
            1600:{
                items:1,
                stagePadding: 350
            },
            1800:{
                items:1,
                stagePadding: 400
            }
        }
    })
     $('#carusel-desktop').owlCarousel({
        stagePadding: 10,
        loop: true,
        margin: 5,
        items: 1,
        lazyLoad: true,
        nav:true,
        stagePadding: 0,
        responsive:{
            0:{
                items:1,
                stagePadding: 80
            },
            600:{
                items:1,
                stagePadding: 80
            },
            1000:{
                items:1,
                stagePadding: 80
            },
            1200:{
                items:1,
                stagePadding: 80
            },
            1400:{
                items:1,
                stagePadding: 80
            },
            1600:{
                items:1,
                stagePadding: 100
            },
            1800:{
                items:1,
                stagePadding: 150
            }
        }
    })
    var addressData = {};
    var exclude_districts_ids = ['2', '3', '5', '7', '8', '9', '10', '14', '15', '16', '17', '23', '25', '30', '31'];
	$(document).on('click', '.searchDistricts', function(event) {
	    $('.loadingDistricts').show();
	    let address = "";
	    if($('.addresDist').length !=0 ){
	        address = $(".addresDist").val();
	    }
	    else {
	        address = $('#selectAddress').val();
	    }
	    let data = {
			email: $('.emailDist').val(),
			address: address,
			city:  $(".cityDist").val(),
			zipcode: $(".zipDist").val(),
		}
		const _this = $(this);
		$.ajax({
			url: site_url + 'get_address_info',
			type: 'POST',
			data: data,
			success:function(response){
				$('.loadingDistricts').hide();
				response = JSON.parse(response);
 				$('.wrongAddressData').remove();
				if (response.status == 'error') {
				    $('.errMess').html(response.errorText)
        			$('.remainError').fadeIn(300,function(){
        				$(this).find('.reminModalContainer').addClass('animate__animated animate__shakeX')
        			});
        			$('html, body').css({
        				'overflow-y': 'hidden'
        			});
				}
				else if(response.status == 'showDistricts'){
					 	$('.district_not_up_txt').remove();
						$('.usHouse').find('.districtNumbers').html(response.us_house_district)
						$('.txHouse').find('.districtNumbers').html(response.texas_house_district)
						if($.inArray(response.texas_senate_district, exclude_districts_ids) < 0) {
							$('.txSenate').find('.districtNumbers').html(response.texas_senate_district)
						}else {
							$('.txSenate').find('.districtNumbers').html('<img src="'+ site_url +'assets/images/not_allowed.png" style="width: 75%; position: absolute;" alt="">')
							$('.txSenate').find('.officeName').addClass('district_not_up_style')
							$('.txSenate').find('.officeName').append('<p class="district_not_up_txt">Your district is not up for re-election</p>')
						}
						$('.cityName').html(data.address + " " + data.city+",");
						$('.streetName').html(" "+data.zipcode);
						$('.districtFormBoard').hide();
						$('.districtNumberBoard').show();
				}
				else {
    				addressData = {
				        address: Object.values(response.address)[0],
				        city: Object.values(response.city)[0],
				        zipcode: Object.values(response.zip)[0],
				        state: Object.values(response.state)[0]
    				} 
					_this.parents('.bodyDistrict').find('.addresDist').val(addressData.address);	
					_this.after(`<p class="addressCorrection">We have standardized your address. Tap "Go" to Continue.</p>`)

				}
			}
		})
	});
	
	$(document).on('click', '.getDistricts', function(event) {
		$('.loadingDistricts').show();
		if($(this).parents('.addressSelection').find('#selectAddress').val() != null) {
		    $.ajax({
			url: site_url + 'get_district_info',
			type: 'POST',
			data: addressData,
			success:function(response){
				$('.loadingDistricts').hide();
				response = JSON.parse(response);
				if (response.success == 0) {
				}
				else {
				    $('.district_not_up_txt').remove();
                    $('.usHouse').find('.districtNumbers').html(response.us_house_district)
                    $('.txHouse').find('.districtNumbers').html(response.texas_house_district)
                    if($.inArray(response.texas_senate_district, exclude_districts_ids) < 0) {
                        $('.txSenate').find('.districtNumbers').html(response.texas_senate_district)
                    }else {
                        $('.txSenate').find('.districtNumbers').html('<img src="'+ site_url +'assets/images/not_allowed.png" style="width: 75%; position: absolute;" alt="">')
                        $('.txSenate').find('.officeName').addClass('district_not_up_style')
                        $('.txSenate').find('.officeName').append('<p class="district_not_up_txt">Your district is not up for re-election</p>')
                    }
					$('.cityName').html(addressData.address + " " + addressData.city+",");
					$('.streetName').html(" "+addressData.zipcode);
					$('.districtFormBoard').hide();
					$('.districtNumberBoard').show();					
				}
			}
		})
		}
	});
	jQuery.migrateMute = true;
    $('.red_section_for_animate').animate({'left': 0}, 4000)
    var exclude_districts_ids = ['2', '3', '5', '7', '8', '9', '10', '14', '15', '16', '17', '23', '25', '30', '31'];
	$(document).on('click', '.searchDistricts111', function(event) {
		let data = {
			email: $('.emailDist').val(),
			address: $(".addresDist").val(),
			city:  $(".cityDist").val(),
			zipcode: $(".zipDist").val(),
		}
		const _this = $(this);
		$('.loadingDistricts').show();
		$.ajax({
			url: site_url + 'get_district_info',
			type: 'POST',
			data: data,
			success:function(response){
				$('.loadingDistricts').hide();
				response = JSON.parse(response);
				$('.districtMachineError').remove();
				if (response.success == 0) {
					if(response.zip_error == 1) {
						_this.parents('.bodyDistrict').append(response.result)
					}
				}
				else {
				    $('.district_not_up_txt').remove();
                    $('.usHouse').find('.districtNumbers').html(response.us_house_district)
                    $('.txHouse').find('.districtNumbers').html(response.texas_house_district)
                    if($.inArray(response.texas_senate_district, exclude_districts_ids) < 0) {
                        $('.txSenate').find('.districtNumbers').html(response.texas_senate_district)
                    }else {
                        $('.txSenate').find('.districtNumbers').html('<img src="'+ site_url +'assets/images/not_allowed.png" style="width: 75%; position: absolute;" alt="">')
                        $('.txSenate').find('.officeName').addClass('district_not_up_style')
                        $('.txSenate').find('.officeName').append('<p class="district_not_up_txt">Your district is not up for re-election</p>')
                    }
					$('.cityName').html(data.address + " " + data.city+",");
					$('.streetName').html(" "+data.zipcode);
					$('.districtFormBoard').hide();
					$('.districtNumberBoard').show();					
				}
			}
		})
	});
	$(document).on('click', '.districtBack > img', function(event) {
		$('.districtNumberBoard').hide();
		$('.districtFormBoard').show();
	});
	$(document).on('click', '.navContainer > div', function(){
		$('.navigateBar').find('img').hide();
		$('.mobileNavigateBar').find('img').hide();
		$(this).find('img').show();
		var fixed_menu_height = $('.navContainer').height()
		var offset = $(`#${$(this).data('to')}`).offset()
		$('html, body').animate({
			scrollTop: offset.top - fixed_menu_height
		}, 1000)
	})
	$(document).on('click', '.mobileNavigateBar', function(event) {
		$('.navigateBar').find('img').hide();
		$('.mobileNavigateBar').find('img').hide();
		$(this).find('img').show();
		var fixed_menu_height = $('.headerContainer').height()
		if ($(this).data('to') == 'Section3') {
			var offset = $(`.mobileCards`).offset()
		}else if($(this).data('to') == 'Section1' && $('.headerContainer').hasClass('fixedHeader')) {
			var offset = $(`.big_image_section`).offset()
		}else {
			var offset = $(`#${$(this).data('to')}`).offset()
		}
		$('.mobileBarVersion').removeClass('animate__fadeInLeft');
		$('.mobileBarVersion').addClass('animate__fadeOutLeft', function(){
			$(this).hide();
		})
		mobileBarOpened = false

		if (!$('.headerContainer').hasClass('fixedHeader')) {
			$('html, body').animate({
				scrollTop: offset.top - fixed_menu_height - 80
			}, 1000)
		}else {
			$('html, body').animate({
				scrollTop: offset.top - fixed_menu_height
			}, 1000)
		}
	});

	$(document).on('click', '.close_red_section', function(){
	    $(this).parent('.firstRed.header_red_section').hide(200)
	})
	$(document).on('click', '.signup, .remind_me', function(){
		const _this = $(this);
		if(!$(this).parents('.redInp').find('.enter_your_email').val().includes('@')){
			// swal("Error!", "Please enter a valid email address.", "error");
			$('.errMess').html('Please enter a valid email address.');
			$('.remainError').fadeIn(300,function(){
				$(this).find('.reminModalContainer').addClass('animate__animated animate__shakeX')
			});
			$('html, body').css({
				'overflow-y': 'hidden'
			});
		}
		else{
			$.ajax({
				url: site_url + 'subscribe/mail',   
				type: 'POST',
				data: { mail: $(this).parents('.redInp').find('.enter_your_email').val() },
				success:function(response){
					// swal("Good job!", "Thanks for subscribing! We will notify you as soon as the Candidate Search has launched.", "success");
					$('.remainSuccess').fadeIn(300,function(){
						$(this).find('.reminModalContainer').addClass('animate__animated animate__rubberBand')
					});
					$('html, body').css({
						'overflow-y': 'hidden'
					});
					_this.parents('.redInp').find('.enter_your_email').val('');
				}
			})
		}
	})
	$(document).on('click', '.closeReminModal', function(){
		$(this).parents('.reminModal').fadeOut(300);
		$('html, body').css({
            'overflow-y': 'auto'
        });
	})
	$(document).on('click', '.neither', function(){
		$('.arrow-right').trigger('click')
	})
	function scrollToCards() {
		let offset = $("#Section3").offset();
		$('html, body').animate({
			scrollTop: offset.top - 50
		}, 1000);
	}
	$(document).on('click', '.prSolDrDown > div', function(){
		const index = document.querySelector('.item.defItem') ? $(this).data('index') + 1 : $(this).data('index');
		$('.owl-stage').trigger('to.owl.carousel', index)
		scrollToCards();
	})
    $(document).on('click', '.arrow-right, .arrow-left', function(){
        console.log($('.indicators ').find('.active').data('index'));
		if(+$('.indicators ').find('.active').data('index')+2 == 11){
			var currentIndex = 1
		}
		else {
			var currentIndex = +$('.indicators ').find('.active').data('index')+2
		}
		$('.sliderDirection').html(currentIndex);
	})
	$(document).on('click', '.indicators > li', function(){
		$('.sliderDirection').html($(this).data('index')+1);
	})
	let card;
	let firstTime = true;
    $(document).on("click tap touchstart", ".videoPlay > img", function(e){
        e.stopPropagation();
		if($(window).width() > 780){
			if(!$(this).parents('.videoPlay').data('video')){
				$(this).parents('.videoPlay').find('p').addClass('centerCommingSoon')
				$(this).parents('.videoPlay').find('p').html('video coming soon');
				$(this).remove();
			}
			else {
				let video_url = $(this).parents('.videoPlay').data('video');
				var $t = $('#transition'),
				to = $(this).offset(),
				td = $(document);
				$('.cart').animate({
					width: "90%"
				},600)
				$('.cart > div').animate({
					width: "43.5%"
				},600)
				$('html, body').animate({
					scrollTop: $(`#Section3`).offset().top + 50
				}, 1000);
				$('html, body').css({
					'overflow-y': 'hidden'
				});
				card = $(this).parents('.videoContainer');
				let positionObj = {};
				if(firstTime){
					positionObj = {
						top: card.position().top - 25,
						left: card.position().left,
						display: 'block',
					};		  
				}
				else {
					positionObj = {
						top: $('.active').find('.cart').find('.videoContainer').position().top - $('.active').find('.cart').find('.videoContainer').height() + 25,
						left: $('.active').find('.cart').find('.videoContainer').position().left - $('.active').find('.cart').find('.videoContainer').width()-172,
						display: 'block',
					}
				}
				firstTime = false;
				$t.css(positionObj).animate({
					top: 0,
					bottom: 0,
					left: 0,
					right:0,
					
				}, 600, function() {
					$t.animate({
						width: $(window).height()/1.3,
						height: $(window).height()/1.3
						
					},600, function(){
						$t.children('div').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`)
						$t.children('div').append(`<iframe class="videoIframe" width="100%" height="100%" src="${video_url}" allow="autoplay" ></iframe>`);
						if(Object.keys(jQuery.browser)[0] == "mozilla") {
							$('.blurBackground').addClass('blurBackgroundFirefox');
						} else{
							$('.blurBackground').addClass('addBlur');
						}
					})
				});
			}
		}
		else {
			if(!$(this).parents('.videoPlay').data('video')){
					$(this).parents('.videoPlay').find('p').addClass('centerCommingSoon')
					$(this).parents('.videoPlay').find('p').html('video coming soon');
					$(this).remove();
			}
			else {
				$('html, body').animate({
					scrollTop: $(`#Section3`).offset().top
				}, 1000);
				$('.videoMobileModal').fadeIn(300);
				let video_url = $(this).parents('.videoPlay').data('video');
				$('.videoMobileModal').find('.videoMobileModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
				$('.videoMobileModal').find('.videoMobileModalContainer').append(`<iframe class="videoIframe" width="100%" height="100%" src="${video_url}" allow="autoplay" ></iframe>`)
				$('html, body').css({
					'overflow-y': 'hidden'
				});
			}
		}
    })
	$(document).on('click', '.closeModal', function(){
    if($(window).width() > 780){
		$('.blurBackground').removeClass('addBlur');
		$('.blurBackground').removeClass('blurBackgroundFirefox');
        var $t = $('#transition');
        $(this).parents('.closeContainer').remove();
        $('.videoIframe').remove();
		card = $(this).parents('.videoModalContainer');
        $('.cart').animate({
          width: "80%"
        },600)
        $('.cart > div').animate({
          width: "48.5%"
        },600)
        $('html, body').css({
            'overflow-y': 'auto'
        });
        $t.animate({
          	width: card.width(),
            height: card.height()			
        }, 600, function() {
          
          $(this).animate({
            display: 'block'
          }, 600, function(){
            $('#transition').hide();
            $('.videoModal').find('.videoModalContainer').find('.mobileCommingSoon').remove();
			$('.videoModal').fadeOut(300);
          });
        });
    }
    else {
        $('html, body').css({
            'overflow-y': 'auto'
        }); 
        $('.videoMobileModal').find('.videoMobileModalContainer').find('.closeContainer').remove();
        $('.videoMobileModal').find('.videoMobileModalContainer').find('.videoIframe').remove();
        $('.videoMobileModal').find('.videoMobileModalContainer').find('.mobileCommingSoon').remove();
        $('.videoMobileModal').fadeOut(300);
    }
	})
	$(document).on('click', '.navContainer > div', function(){
		$('.navContainer').find('div').removeClass('selectedNavBarItem');
		$(this).addClass('selectedNavBarItem');
	})
	let mobileBarOpened = false;
	$(document).on('click', '.headerHamburger', function(){
		if(!mobileBarOpened){
			$('.mobileBarVersion').removeClass('animate__fadeOutLeft');
			$('.mobileBarVersion').show(0, function(){
				$(this).addClass('animate__fadeInLeft')
			})
			mobileBarOpened = true
		}
		else {
			$('.mobileBarVersion').removeClass('animate__fadeInLeft');
			$('.mobileBarVersion').addClass('animate__fadeOutLeft', function(){
				$(this).hide();
			})
			mobileBarOpened = false
		}
	})
	// tooltip
	var $tooltip = $('<div class="lite-tooltip" id="tooltip"></div>'),
			selector = '[data-lite-tooltip]',
			tip_offset = 2,
			tip_size = 6 + tip_offset,
			positions = {
				top: function(o){
					return {
						top: (o.bbox.top + o.st) - o.ttHeight - tip_size,
						left: o.bbox.left + (o.bbox.width / 2) - (o.ttWidth / 2) + 45
					};
				},
				bottom: function(o){
					return {
						top: (o.bbox.bottom + o.st) + tip_size + 3,
						left: o.bbox.left + (o.bbox.width / 2) - (o.ttWidth / 2) + 45
					};
				},
				right: function (o) {
					return {
						top: (o.bbox.bottom + o.st) - (o.ttHeight / 2) - (o.bbox.height / 2),
						left: o.bbox.right + tip_size
					};
				},
				left: function (o) {
					return {
						top: (o.bbox.bottom + o.st) - (o.ttHeight / 2) - (o.bbox.height / 2),
						left: o.bbox.left - o.ttWidth - tip_size
					};
				}
			};
	$(document.body).append($tooltip);

	$(document)
		.on('mouseenter', selector, function(e) {
			if ($(this).parents('.problemContainer').find('.selectedAnswer').length == 0){
				var el = $(this),
					data = el.data(),
					content = data.liteTooltip || 'Tooltip\'s Placeholder',
					position = data.liteTooltipPosition || 'top',
					tooltipWidth = this.offsetWidth * 1 || 280,
					bbox = e.currentTarget.getBoundingClientRect(),
					tooltipHeight;

				// sanity check
				if (!positions[position]) position = 'top';
				// inject content into tooltip
				$tooltip
					.html('')
					.css({ width: tooltipWidth })
					.html(content);

				// grab height after injecting 
				tooltipHeight = $tooltip.outerHeight();
				// calculate tooltip's position
				var ttOffset = positions[position]({
					ttWidth: tooltipWidth,
					ttHeight: Math.ceil(tooltipHeight),
					bbox: bbox,
					st: document.documentElement.scrollTop || document.body.scrollTop
				});
				ttOffset.left = this.getBoundingClientRect().x
				// position and show tooltip
				setTimeout(function() {
					if ( $(selector+':hover').length ) {
						$tooltip
							.css({ top: ttOffset.top, left: ttOffset.left, opacity: 1 })
							.attr('class', 'lite-tooltip ' + (position == 'top' ? '' : 'lite-tooltip-'+position) );
					}
				}, 150);
			}	
		})
		.on('mouseleave', selector, function(e) {
			setTimeout(function() {
				if ( !$tooltip.is(':hover') ) {
					$tooltip.css({ opacity: 0, top: '-100%', left: '-100%' });
				}
			}, 100);
		});
		
	$tooltip.on('mouseleave', function(e) {
		setTimeout(function() {
			if (!$(selector+':hover').length) {
				$tooltip.css({ opacity: 0, top: '-100%', left: '-100%' });
			}
		}, 100);
	});

	$(window).scroll(function(){
		var y = $(window).scrollTop();
		if(y > 170) {
			$('.nav').addClass('fixedNav');
		}
		else {
			$('.nav').removeClass('fixedNav');
		}
		if($(window).width() >= 700){
				$('.headerContainer').removeClass('fixedHeader');
		}
	});

		if($(window).width() <= 700){console.log($(window).width())
			// if(y >=10 ) {
				$('.headerContainer').addClass('fixedHeader');
			// }
			// else {
			// 	$('.headerContainer').removeClass('fixedHeader');
			// }
		}
		else{
			$('.headerContainer').removeClass('fixedHeader');
		}

	$('.selectedNavBarItem').find('img').show();
	$('.navigateBar, .navo').hover(function(){
		$(this).find('img').show()
	})
	$('.navigateBar, .navo').mouseleave(function(){
		if(!$(this).hasClass('selectedNavBarItem')) {
			$(this).find('img').hide();
		}
	})
	$(document).on('click', '.moreInfo', function(){
		    // $(this).parents('.mobSwipeItem1').find('.flip-card-inner').find('.flip-card-front').toggle();
	      $(this).parents('.mobSwipeItem1').find('.flip-card-inner').addClass('hover');
        $(this).parents('.mobSwipeItem1').find('.flip-card-inner').find('.flip-card-front').addClass('flip-card-back-z-index');
	})
	
	$(document).on('click', '.mobFlipBackArrow', function(){
	    $(this).parents('.mobSwipeItem1').find('.flip-card-inner').removeClass('hover');
	})
	
	$(document).on('click', '.playVideoMobile', function(){
	    console.log($(this).data('video'));
	    
    	if($(this).data('video') == undefined){
    	      $('.videoMobileModal').fadeIn(300);
        		$('.videoMobileModal').find('.videoMobileModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
            	$('.videoMobileModal').find('.videoMobileModalContainer').append(`<p class="mobileCommingSoon">Coming Soon!</p>`)
            	$('html, body').css({
            		'overflow-y': 'hidden'
            	});
        }
        else {
        	$('.videoMobileModal').fadeIn(300);
        	let video_url = $(this).data('video');
        	$('.videoMobileModal').find('.videoMobileModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
        	$('.videoMobileModal').find('.videoMobileModalContainer').append(`<iframe class="videoIframe" width="100%" height="100%" src="${video_url}" allow="autoplay" ></iframe>`)
        	$('html, body').css({
        		'overflow-y': 'hidden'
        	});
        }
	    
	})
		$(document).on('click', '.playVideo', function(){
    	if($(this).data('video') == undefined){
    	        $('.videoModal').fadeIn(300);
        		$('.videoModal').find('.videoModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
            	$('.videoModal').find('.videoModalContainer').append(`<p class="mobileCommingSoon">Coming Soon!</p>`)
            	$('html, body').css({
            		'overflow-y': 'hidden'
            	});
        }
        else {
        	$('.videoModal').fadeIn(300);
        	let video_url = $(this).data('video');
        	$('.videoModal').find('.videoModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
        	$('.videoModal').find('.videoModalContainer').append(`<iframe class="videoIframe" width="100%" height="100%" src="${video_url}" allow="autoplay" ></iframe>`)
        	$('html, body').css({
        		'overflow-y': 'hidden'
        	});
        }
	})
	$(function(){
        $( ".owl-prev").html(`<img class="deskArrowLeft" src="${site_url}assets/images/optimized/deskArrowLeft_optimized.png" width="30px" height="auto">`);
        $( ".owl-next").html(`<img class="deskArrowRight" src="${site_url}assets/images/optimized/deskArrowRight_optimized.png" width="30px" height="auto"> `);
    })
    $(document).on('click', '.deskMoreInfo', function(){
	    $(this).parents('.item').find('.flip-card-inner').addClass('hover');
	});
	$(document).on('click', '.back-top-button', function(){
	    $(this).parents('.item').find('.flip-card-inner').removeClass('hover');
	});
	var count = Math.floor(document.querySelectorAll('.owl-item').length / 3)
	if(count === 11) {
		var slideIndex = 0;	
	}
	else {
		var slideIndex = 1;	
	}
    $('.desktopShare, .mobileShare').click(function(e){

        e.preventDefault();
		const _this = $(this);

		if (_this.hasClass('shareInstruction')) {
			slideIndex = 'instruction'
		}

		FB.ui( {
            method: 'share',
            href: site_url + "/slide/index/" + slideIndex
        }, function( response ) {
                console.log(response)
				if(response != undefined) {
					if(_this.hasClass('mobileShare')){
						_this.addClass('mobShareHover')
					}
					else {
						_this.addClass('deskShareHover')
					}
				}
        });
    });
    $('.shareVote').click(e => {

        var index = document.getElementById('voteIndex').dataset.id
        FB.ui({
            method: 'share',
            href: site_url + "/vote/index/" + index
        }, function( response ) {
        });
    })
	var owlDesk = $('#carusel-desktop');
	var owlMob = $('#carusel-mobile');
    owlDesk.owlCarousel();
    owlMob.owlCarousel();
    $('.instructionHide').click(function(e){
		$.ajax({
			url: site_url + 'show/instructions',
			type: 'POST',
            data: { show: false },
			success:function(r){				
			}
		})
		owlDesk.trigger('remove.owl.carousel', 0 );
		owlMob.trigger('remove.owl.carousel', 0 );
		owlDesk.trigger('to.owl.carousel', 0);
		Dots.setActive(1)
	})
    $('.instructionNotHide').click(function(e){
		$.ajax({
			url: site_url + 'show/instructions',
			type: 'POST',
            data: { show: true },
			success:function(r){				
				
			}
		})
		owlDesk.trigger('next.owl.carousel');
	})  
    owlDesk.on('changed.owl.carousel', function(event) {
		slideIndex = event.page.index;
		var count = Math.floor(document.querySelectorAll('.owl-item').length / 3)
		if(count === 11) {
			slideIndex = event.page.index;
		}
		else {
			slideIndex = event.page.index + 1;
		}
		Dots.setActive(slideIndex);
    })
	owlMob.on('changed.owl.carousel', function(event) {
		slideIndex = event.page.index;
		var count = Math.floor(document.querySelectorAll('.owl-item').length / 3)
		if(count === 11) {
			slideIndex = event.page.index;
		}
		else {
			slideIndex = event.page.index + 1;
		}
        Dots.setActive(slideIndex);
    })
    $('.mobInstructionHide').click(function(e){
		$.ajax({
			url: site_url + 'show/instructions',
			type: 'POST',
            data: { show: false },
			success:function(r){
				
			}
		})
		owlMob.trigger('remove.owl.carousel', 0 );
		owlDesk.trigger('remove.owl.carousel', 0 );
		owlMob.trigger('to.owl.carousel', 0);
        Dots.setActive(1)
	})
    $('.mobInstructionNotHide').click(function(e){
		$.ajax({
			url: site_url + 'show/instructions',
			type: 'POST',
            data: { show: true },
			success:function(r){					
			}
		})
		owlMob.trigger('next.owl.carousel');
	})
	$(document).on('click', '#openSummaryModal', () => {
		$('html').css({
			'overflow': 'hidden',
			'-webkit-backface-visibility': 'hidden',
			'-webkit-appearance': 'none'
		})
		$('body').css({
			'overflow': 'hidden',
			'-webkit-backface-visibility': 'hidden',
			'-webkit-appearance': 'none'
		})
		Dots.modalAction('open')
	})
	$('#closeSummaryModal').click(() => {
		$('html').css({
			'overflow': 'initial',
			'-webkit-backface-visibility': 'initial',
			'-webkit-appearance': 'initial'
		})
		$('body').css({
			'overflow': 'initial',
			'-webkit-backface-visibility': 'initial',
			'-webkit-appearance': 'initial'
		})
		Dots.modalAction('close')
    })
})
