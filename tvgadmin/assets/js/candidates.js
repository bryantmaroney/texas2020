$(document).ready(function(){

    var site_url = $('#base_url').val();
    
    /************************* Welcome Popup */

    $('#welcomeMessage').modal('show');
    
    
    
    $('.close_modal_btn').click(function(){
        $(this).parents('.modal').modal('hide')
    })
    
    $('.choose_candidates_btn').click(function(){
        $('#welcomeMessage').modal('hide')
    })

    /************************* Hover */

    $('.cl-1').hover(function(){
        var image_to_replace = $(this).find('.paly-icon img')[0]
        $(image_to_replace).attr("src", function(index, attr){
            return attr.replace('play-icon.png', 'play-icon-red.png')
        })
        
        var play_text = $(this).find('.first-td-txt')[0]
        $(play_text).css('color', '#ff0000')
    })

    $('.cl-1').mouseleave(function(){
        var image_to_replace = $(this).find('.paly-icon img')[0]
        $(image_to_replace).attr("src", function(index, attr){
            return attr.replace('play-icon-red.png', 'play-icon.png')
        })

        var play_text = $(this).find('.first-td-txt')[0]
        $(play_text).css('color', '#213d76')
    })

    /************************* Show Video Modal */

    $(document).on('click touchstart', '.show_video', function() {
        var title = $(this).parent().find('.first-td-txt').text()
        $('#showVideo').find('.title').text(title)

        var key = $(this).data('key');

        if (key == 'gerrymandering') {

            $('#showVideo').find('.vid_sec').append(`<p class="desc">Redistricting should be done openly and transparently
                by an independent commission without conflicts of
                interest to end partisan gerrymandering.</p>`);

            var video_src = "https://www.youtube.com/embed/MXwZabGjFCA"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')
            
        }
        else if (key == 'empower') {

            $('#showVideo').find('.vid_sec').append(`<p class="desc">Provide registered voters with small tax credits to
                be used as contributions for candidates and
                PAC’s who support small donors.</p>`);

            var video_src = "https://www.youtube.com/embed/aM8KgbW5RV4"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')

        }else if (key == 'ranked_choice') {

            $('#showVideo').find('.vid_sec').append(`<p class="desc">Allow voters to rank their candidates, eliminate the
                "spoiler" effect, the need for costly runoffs and elect
                only candidates with a true majority of votes.</p>`);

            var video_src = "https://www.youtube.com/embed/0HwfijCqoNI"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')

        }else if (key == 'term') {

            $('#showVideo').find('.vid_sec').append(`<p class="desc">Set reasonable term limits for incumbents and
                future elected officials so candidates can focus on
                public service instead of remaining in office.</p>`);
            
            var video_src = "https://www.youtube.com/embed/r0BjFLMQAkM"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')
            
        }else if (key == 'auto_reg') {

            $('#showVideo').find('.vid_sec').append(`<p class="desc">Adopt automatic voter registration for all eligible voters when
                interacting with government agencies where voters can
                choose to opt-in or out. Information would be transmitted
                electronically and securely to one central database
                maintained by the state and streamline our current system.</p>`);

            var video_src = "https://www.youtube.com/embed/IUUfBOC5Jm4"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')
        }else if(key == 'LOBBING') {
             $('#showVideo').find('.vid_sec').append(`<p class="desc">Ban covert coordination between candidates and Super-PAC's and
                create a public solution enabling competitive elections via small
                donors. Also, prohibit fundraising during business hours.</p>`);
            
            $('#showVideo').find('.vid_sec').append('<p style="text-align: center; width: 100%; text-align: center; font-size: 24px;" class="commigSoon">Coming Soon . . .</p>')
        }
        else if(key == 'WHOWRITESOURLAWS') {
             $('#showVideo').find('.vid_sec').append(`<p class="desc">Criminalize disinformation ad campaigns and create a
                Misinformation Reporting system to alert officials of the suspected
                spreading of false information and political spending to
                intentionally deceive voters.</p>`);
            
            var video_src = "https://www.youtube.com/embed/AGF--A8px2Q"
            $('#showVideo').find('.vid_sec').append('<iframe width="100%" height="600" src="'+video_src+'"></iframe>')
        }
        else if(key == 'CRIMINALIZE') {
             $('#showVideo').find('.vid_sec').append(`<p class="desc">Prohibit paid lobbyists from donating to or fundraising for incumbents and
                candidates. Close the revolving door of politics by prohibiting politicians
                from accepting paid positions as private sector lobbyists, “consultants”
                or “strategic advisors”.</p>`);
            
            $('#showVideo').find('.vid_sec').append('<p style="text-align: center; width: 100%; text-align: center; font-size: 24px;" class="commigSoon">Coming Soon . . .</p>')
        }
        else if(key == 'LIMIT') {
             $('#showVideo').find('.vid_sec').append(`<p class="desc">Most citizens do not understand the impact of corporate model
                (copycat) legislation and the roll it plays in our state laws which are
                being written by corporations and passed from state to state solely in
                the interest of corporate profits. All bills should fully disclose their
                origins and require all “entities" to register as lobbyists so their role in
                creating legislation is made available to the public.</p>`);
            
            $('#showVideo').find('.vid_sec').append('<p style="text-align: center; width: 100%; text-align: center; font-size: 24px;" class="commigSoon">Coming Soon . . .</p>')
        }
        else if(key == 'CAMPAIGN') {
             $('#showVideo').find('.vid_sec').append(`<p class="desc">Close the infamous “lobbying loophole” that currently allows paid
                strategic “political advisors” or “consultants” to avoid registering as
                lobbyists. Enforce all lobbyist registrations and require all
                lawmakers to be held accountable and financially transparent.</p>`);
            
            $('#showVideo').find('.vid_sec').append('<p style="text-align: center; width: 100%; text-align: center; font-size: 24px;" class="commigSoon">Coming Soon . . .</p>')
        }

       $('#showVideo').modal('show');
      
    })

    $('.close_modal').click(function() {
        if ($(this).parents('#showVideo').find('iframe').length > 0){
            $(this).parents('#showVideo').find('iframe').get(0).remove()
        }
        if($(this).parents('#showVideo').find('.desc').length > 0) {
            $(this).parents('#showVideo').find('.desc').remove();
        }
        if($(this).parents('#showVideo').find('.commigSoon').length > 0) {
            $(this).parents('#showVideo').find('.commigSoon').remove()
        }

        $('#showVideo').modal('hide')
    })

    $(function () {
        $('[data-toggle="popover"]').popover( {
            html:true,
            content: function () { return '<img src="' + $(this).data('img') + '" />'; }
        })
          
    })

    /************************* Show Comments Modal */

    $('.show-comments').click(function(e) {

        var cname = $(this).attr('cname');
        var ccomment = $(this).attr('ccomment');
        var cimage = $(this).attr('cimage');

       $(this).find("#modal_uname").html(cname);
       $(this).find("#modal_ucomment").html(`“${ccomment}”`);
       
        if(cimage!='') {
           $(this).find("#modal_uimage").attr("src", 'https://soheard.dev/dev/texas2020-staging/'+cimage);
        } else {
           $(this).find("#modal_uimage").attr("src", site_url+"assets/images/default_user.png");
        }

        $(this).find('#show_comments_modal').modal('show');
        $(this).find('#show_comments_modal').css('left', -($(this).find('#show_comments_modal').width() - $(this).width())/2);
        $(this).find('#show_comments_modal').css('top', -($(this).find('#show_comments_modal').innerHeight() - 40));
    });

    $(document).on('click', '.close', function(event) {
        $(this).parents('.show-comments').find('#show_comments_modal').modal('hide');
    });
    $('.inner-main-tab-box').find('.nav-tabs').find('.active').next().addClass('unactive');
    
    $('.inner-main-tab-box').find('.nav-tabs').find('.unactive').click(function(e) {
        $('.inner-main-tab-box').find('.nav-tabs').find('li').removeClass('active');
        $('.inner-main-tab-box').find('.nav-tabs').find('li').addClass('unactive');
    })

    var usSenate = {};
    var usHouse = {};
    var txSenate = {};
    var txHouse = {};
    var candidateName;
    
    $(document).on('click', '.btn_select_candidate', function(){
        var class_name = $(this).data('last-name');
        $(this).parents('.tab-content > ').find('.selected_candidate').removeClass('selected_candidate');
        $('.'+class_name).addClass('selected_candidate');
        
        if($(this).attr('section') == "usSenate") {
            candidateName = $(this).parent().find('.title-td1').html();
            usSenateData.forEach(function(item) {
                if((item.first_name + " " + item.last_name).toUpperCase().trim() == candidateName.toUpperCase().trim()) {
                    usSenate = item;
                }
            })
        }
        if($(this).attr('section') == "usHouse") {
            candidateName = $(this).parent().find('.title-td1').html();
            usHouseData.forEach(function(item) {
                if((item.first_name + " " + item.last_name).toUpperCase().trim() == candidateName.toUpperCase().trim()) {
                    usHouse = item;
                }
            })
        }
        if($(this).attr('section') == "txHouse") {
            candidateName = $(this).parent().find('.title-td1').html();
            txHouseData.forEach(function(item) {
                if((item.first_name + " " + item.last_name).toUpperCase().trim() == candidateName.toUpperCase().trim()) {
                    txHouse = item;
                }
            })
        }
        if($(this).attr('section') == "txSenate") {
            candidateName = $(this).parent().find('.title-td1').html();
            txSenateData.forEach(function(item) {
                if((item.first_name + " " + item.last_name).toUpperCase().trim() == candidateName.toUpperCase().trim()) {
                    txSenate = item;
                }
            })
        }

        if($('.selected_candidate').length == 2 * $('#choice_length').val()) {
            
            //usSenate
            if(usSenate.local_profile_photo == ""){
                var src = site_url + "assets/images/candidate_dummy.png"
            }
            else {
                var src = site_url + "assets/uploads/" + usSenate.local_profile_photo;
            }
            $('.modalContainer').find('.usSenate').find('.choiceImg').attr('src',src);
            $('.modalContainer').find('.usSenate').find('.infobox').find('p').first().html(usSenate.first_name);
            $('.modalContainer').find('.usSenate').find('.infobox').find('p').last().html(usSenate.last_name);
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.usSenate').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usSenate.election_agreed}<strong>/${usSenate.election_total}</strong>`    
            );
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.usSenate').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usSenate.money_agreed}<strong>/${usSenate.money_total}</strong>`    
            );
            
            //usHouse
            if(usHouse.local_profile_photo == ""){
                var src = site_url + "assets/images/candidate_dummy.png"
            }
            else {
                var src = site_url + "assets/uploads/" + usHouse.local_profile_photo;
            }
            $('.modalContainer').find('.usHouse').find('.choiceImg').attr('src',src);
            $('.modalContainer').find('.usHouse').find('.infobox').find('p').first().html(usHouse.first_name);
            $('.modalContainer').find('.usHouse').find('.infobox').find('p').last().html(usHouse.last_name);
            $('.modalContainer').find('.usHouse').find('.number-title').html(usHouse.which_district)
            
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.usHouse').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usHouse.election_agreed}<strong>/${usHouse.election_total}</strong>`    
            );
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.usHouse').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usHouse.money_agreed}<strong>/${usHouse.money_total}</strong>`    
            );
            
            //txHouse
            if(txHouse.local_profile_photo == ""){
                var src = site_url + "assets/images/candidate_dummy.png"
            }
            else {
                var src = site_url + "assets/uploads/" + txHouse.local_profile_photo;
            }
            $('.modalContainer').find('.txHouse').find('.choiceImg').attr('src',src);
            $('.modalContainer').find('.txHouse').find('.infobox').find('p').first().html(txHouse.first_name);
            $('.modalContainer').find('.txHouse').find('.infobox').find('p').last().html(txHouse.last_name);
            $('.modalContainer').find('.txHouse').find('.number-title').html(txHouse.which_district)
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.txHouse').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txHouse.election_agreed}<strong>/${txHouse.election_total}</strong>`    
            );
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.txHouse').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txHouse.money_agreed}<strong>/${txHouse.money_total}</strong>`    
            );
            
            //txSenate
            if(txSenate.local_profile_photo == ""){
                var src = site_url + "assets/images/candidate_dummy.png"
            }
            else {
                var src = site_url + "assets/uploads/" + txSenate.local_profile_photo;
            }
            $('.modalContainer').find('.txSenate').find('.choiceImg').attr('src',src);
            $('.modalContainer').find('.txSenate').find('.infobox').find('p').first().html(txSenate.first_name);
            $('.modalContainer').find('.txSenate').find('.infobox').find('p').last().html(txSenate.last_name);
            $('.modalContainer').find('.txSenate').find('.number-title').html(txSenate.which_district)
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.txSenate').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txSenate.election_agreed}<strong>/${txSenate.election_total}</strong>`    
            );
            
            var src = site_url + "assets/images/thumb.png";
            $('.modalContainer').find('.txSenate').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(
            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txSenate.money_agreed}<strong>/${txSenate.money_total}</strong>`    
            );
            
            $('#choiceMessage').modal('show');
        }
        
    })
    
    $(document).on('click','.close_chooice_modal',function() {
        $('.selected_candidate').removeClass('selected_candidate');
    })

})

window.history.pushState({page: 1}, "", "");

window.onpopstate = function(event) {
    if(event){
        window.location.href = 'https://soheard.dev/dev/texas2020/districts';
    }
}
