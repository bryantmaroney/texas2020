jQuery(document).ready(function($){
	jQuery.migrateMute = true;
    let firstTime = true;
    $(document).on('click', '.playVideo', function(e){
        e.stopPropagation();

        if($(window).width() > 780){
          
            let video_url = "https://www.youtube.com/embed/oNZua7UllTU?autoplay=1";
			

            var $t = $('#transition'),
            to = $(this).offset(),
            td = $(document);

			$('.blurBackground ').show();

            card = $(this).parents('.st1Video');
            
			if(firstTime){
				var positionObj = {
					top: card.position().top,
					left: card.position().left,
					display: 'block',
				};		
				firstTime = false;  
			}
			else {
				var positionObj = {
					top: card.position().top - 350,
					left: 0,
					right:0,
					display: 'block',
				};
			}
  
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
        else {
          
            $('html, body').animate({
              scrollTop: $(`.st1Video`).offset().top
            }, 1000);
            $('.videoMobileModal').fadeIn(300);
            let video_url = "https://www.youtube.com/embed/5VYITMYL_yk?autoplay=1";
            $('.videoMobileModal').find('.videoMobileModalContainer').append(`<div class="closeContainer"><img class="closeModal" src="${site_url}assets/images/closeModal.png"></div>`);
            $('.videoMobileModal').find('.videoMobileModalContainer').append(`<iframe class="videoIframe" width="100%" height="100%" src="${video_url}" allow="autoplay" ></iframe>`)
            $('html, body').css({
              'overflow-y': 'hidden'
            });
          }
        
        
    })

	$(document).on('click', '.closeModal', function(){
		if($(window).width() > 780){
			$('.blurBackground').removeClass('addBlur');
			$('.blurBackground').removeClass('blurBackgroundFirefox');

			var $t = $('#transition');
			$(this).parents('.closeContainer').remove();
			$('.videoIframe').remove();

			let card = $('.st1Video');
            
            let positionObj = {
              top: card.position().top-350,
              left: 0,
              display: 'block',
            };

			$t.animate({
				width: card.width(),
				height: card.height()+50			
			}, 600, function() {
				
				$(this).animate(positionObj , 600, function(){
					$('#transition').hide();
					$('.blurBackground').hide();

				});
			
			});
		}
		else {
			$('html, body').css({
				'overflow-y': 'auto'
			}); 
			$('.videoMobileModal').find('.videoMobileModalContainer').find('.closeContainer').remove();
			$('.videoMobileModal').find('.videoMobileModalContainer').find('.videoIframe').remove()
			
			$('.videoMobileModal').fadeOut(300);
		}
		
	})
})
