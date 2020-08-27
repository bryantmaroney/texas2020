$(document).ready(function(){
    
    var base_url = $('#base_url').val()
    

    $(document).on('click', '.selSec', function(){
 
        $('.candidates-2020').find('img').first().show();
        $('.candidates-2020').find('img').first().next().hide();

        $('.problem-solutions').find('img').first().show();
        $('.problem-solutions').find('img').first().next().hide();

        $('.voter-poll').find('img').first().show();
        $('.voter-poll').find('img').first().next().hide();


        $('.poll-results').find('img').first().show();
        $('.poll-results').find('img').first().next().hide();

        $('.text-side').css({ color: 'white', background: '#C1080D' })
        $('.text-side').find('.on-icon i').css({color: '#C1080D', background: 'white'})
        $('.text-side').parent().find('.icon-side').css({ background: 'white' })
        

        $(this).parent().find('img').first().hide();
        $(this).parent().find('img').first().next().show();

        $(this).css({ background: 'white', color: '#C1080D'})
        $(this).find('.on-icon i').css({color: 'white', background: '#C1080D'})
        $(this).parent().find('.icon-side').css({ background: '#213D76' })


        $('.prSol').hide();
        if ($(this).attr('show') == "welcome_section_message") {
   
            $(`.${$(this).attr('show')}`).show();
        }
        else {
            $(`.${$(this).attr('show')}`).show();
        }
       
        $('.selectedSection').removeClass('selectedSection');
        $(this).addClass('selectedSection');

    })


    $('.text-side').hover(function() {
       
        $(this).parent().find('img').first().hide();

        $(this).parent().find('img').first().next().show()
        
        $(this).css({ background: 'white', color: '#C1080D'})
        $(this).find('.on-icon i').css({color: 'white', background: '#C1080D'})
        $(this).parent().find('.icon-side').css({ background: '#213D76' })
    });


    $('.text-side').mouseleave(function(){

      if (!$(this).hasClass('selectedSection')) {

        $(this).parent().find('img').first().show();
        $(this).parent().find('img').first().next().hide();

       
        $(this).css({ color: 'white', background: '#C1080D' })
        $(this).find('.on-icon i').css({color: '#C1080D', background: 'white'})
        $(this).parent().find('.icon-side').css({ background: 'white' })
          
      }
    })

   
})