$(document).ready(function (){



    var loc_pathname = window.location.pathname

    var selected_section_name = loc_pathname.substring(loc_pathname.lastIndexOf("/") + 1, loc_pathname.length)

    function lookupVideoAndEmbedUrl(id) {
        $.get('/issues/video-link/'+id, function(data) {
            let video_src = data.link.replace('www.youtube.com/watch?v=','www.youtube.com/embed/').replace('youtu.be/', 'www.youtube.com/embed/');

            $('#showVideo').find('.vid_sec').append('<iframe style="margin-top:20px" width="100%" height="600" src="'+video_src+'?autoplay=1" allow="autoplay" ></iframe>')
        })
    }



    if (selected_section_name == 'us_senate') {

        var selected_section_btn = $('.cmp-btn.usSenate')

        $(selected_section_btn).css({

            'background-color': 'white',

            'color' : "red"

        })



        $(selected_section_btn).parents('.inner-rgt-row').css('background-color','#213D76');

        $(selected_section_btn).parents('.inner-rgt-row').find('.unt-title').css('color','white');



        $(`.${$(selected_section_btn).attr('section')}`).fadeIn(700).css({display: 'table-cell'})



    }else if (selected_section_name == 'us_house') {



        var selected_section_btn = $('.cmp-btn.usHouse')



        $(selected_section_btn).css({

            'background-color': 'white',

            'color' : "red"

        })



        $(selected_section_btn).parents('.inner-rgt-row').css('background-color','#213D76');

        $(selected_section_btn).parents('.inner-rgt-row').find('.unt-title').css('color','white');



        $(`.${$(selected_section_btn).attr('section')}`).fadeIn(700).css({display: 'table-cell'})



    }else if (selected_section_name == 'tx_house') {



        var selected_section_btn = $('.cmp-btn.txHouse')



        $(selected_section_btn).css({

            'background-color': 'white',

            'color' : "red"

        })



        $(selected_section_btn).parents('.inner-rgt-row').css('background-color','#213D76');

        $(selected_section_btn).parents('.inner-rgt-row').find('.unt-title').css('color','white');



        $(`.${$(selected_section_btn).attr('section')}`).fadeIn(700).css({display: 'table-cell'})



    }else if (selected_section_name == 'tx_senate') {



        var selected_section_btn = $('.cmp-btn.txSenate')



        $(selected_section_btn).css({

            'background-color': 'white',

            'color' : "red"

        })



        $(selected_section_btn).parents('.inner-rgt-row').css('background-color','#213D76');

        $(selected_section_btn).parents('.inner-rgt-row').find('.unt-title').css('color','white');



        $(`.${$(selected_section_btn).attr('section')}`).fadeIn(700).css({display: 'table-cell'})



    }else {

        // nothing to do

    }



    // $('#c').change(function(){

    //     var _this = $(this)

    //     if($(this).val() == 'english') {

    //         $.ajax({

    //             type: "POST",

    //             url: site_url+'/home/change_language',

    //             data: {'language':'spanish'},

    //             success: function(response){

    //                 console.log(response)

    //                 _this.val('spanish')

    //                 location.reload();

    //             }

    //        });

    //     }else{

    //         $.ajax({

    //             type: "POST",

    //             url: site_url+'/home/change_language',

    //             data: {'language':'english'},

    //             success: function(response){

    //                 console.log(response)

    //                 _this.val('english') 

    //                 location.reload();

    //             }

    //        });

    //     }

    // });

    

    // if($('#c').val() == 'spanish') {

    //     $('input[type="checkbox"]').prop("checked", true)

    // }



    // var welcome = false;

    $('.float').click(function(){

        // $('#step_2_result').find('.languageContainer').remove();

        

       // if(!welcome) {

       //      $('#welcomeMessage').modal('show');

       //      welcome = true;

       // }



        let url = $(this).attr('section').substring($(this).attr('section').indexOf('dinamic') + 8);



        window.history.pushState('', '', `${url}`);



        $('.dinamic_us_house').hide();

        $('.dinamic_us_senate').hide();

        $('.dinamic_tx_house').hide();

        $('.dinamic_tx_senate').hide();



        $('.inner-rgt-row').css('background-color','white');

        $('.inner-rgt-row').find('.unt-title').css('color','#213D76');

        $('.cmp-btn').css({

            'background-color': '#C1080D',

            'color' : "white"

        })



        // $('#step_2_result').find('.btm-logos').remove();

     

        // $('.left-col-container').animate({ width: "hide"}).css({display: 'none'},1000);

        $(`.${$(this).attr('section')}`).fadeIn(700).css({display: 'table-cell'});



        //  $('#step_2_result').addClass('floatLeft').append(`

        //     <div class="btm-logos">

        //        <ul>

        //           <li><img src="${site_url}assets/images/lay.png" alt="logo"></li>

        //           <li><img src="${site_url}assets/images/us-logo.png" alt="logo"></li>

        //        </ul>

        //       <div class="contuctSection">

        //         <span>About Us</span>

        //         <span>Disclaimer</span>

        //         <span>© Texas2020.org</span>

        //         <span>Contact Us</span>

        //       </div>

        //     </div>

        // `);



         // $('#step_2_result').prepend(`

         //    <div class="languageContainer">

         //          <a class="home-icon" href="https://soheard.dev/dev/texas2020-staging/">

         //            <img src="${site_url}assets/images/home.png">

         //          </a>

         //          <div class="language-content">

         //              <div class="can-toggle can-toggle--size-large">

         //                <input id="c" type="checkbox" value="english">

         //                <label for="c">

         //                  <div class="can-toggle__switch" data-checked="SPANISH" data-unchecked="ENGLISH"></div>

         //                </label>

         //              </div>

         //          </div>

         //    </div>

         //    `)

         // $('.right-col').css('vertical-align', 'initial !important');



        //  $('#step_2_result').find('.right-col').removeClass('right-col');

        //  $('.floatLeft').find('div').css({

        //     'position': 'relative',

        //     'z-index': 1,

        // });

        //  $('.inner-rgh-title').remove();



        $(this).css({

            'background-color': 'white',

            'color' : "red"

        })



        //  $('.btm-logos').css({

        //      'height': '16%',

        //  });

         // $('.inner-right-in').css({

         //     'margin-top': '50px',

         // });



        $(this).parents('.inner-rgt-row').css('background-color','#213D76');

        $(this).parents('.inner-rgt-row').find('.unt-title').css('color','white');

    })



    $(document).on('click touchstart', '.show_video', function() {

        var title = $(this).text()

        $('#showVideo').find('.title').text(title)



        var key = $(this).data('key');

        if (key == 'gerrymandering') {
            lookupVideoAndEmbedUrl(1)
        } else if (key == 'empower') {
            lookupVideoAndEmbedUrl(9)
        } else if (key == 'ranked_choice') {
            lookupVideoAndEmbedUrl(5)
        } else if (key == 'term') {
            lookupVideoAndEmbedUrl(7)
        } else if (key == 'auto_reg') {
            lookupVideoAndEmbedUrl(4)
        } else if(key == 'LOBBING') {
            lookupVideoAndEmbedUrl(7)
        } else if(key == 'WHOWRITESOURLAWS') {
            lookupVideoAndEmbedUrl(3)
        } else if(key == 'CRIMINALIZE') {
            lookupVideoAndEmbedUrl(7)
        } else if(key == 'LIMIT') {
            lookupVideoAndEmbedUrl(3)
        } else if(key == 'CAMPAIGN') {
            lookupVideoAndEmbedUrl(7)
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



    $('.close_modal_btn, .choose_candidates_btn').click(function(){

        $(this).parents('.modal').modal('hide')

    })





    $('.show-comments').click(function(e) {



        var cname = $(this).attr('cname');

        var ccomment = $(this).attr('ccomment');

        var cimage = $(this).attr('cimage');



       $(this).find("#modal_uname").html(cname);

       $(this).find("#modal_ucomment").html(`“${ccomment}”`);

       

        if(cimage!='') {

           $(this).find("#modal_uimage").attr("src", cimage);

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



var sectionsWay = [];

if (+$('#choice_length').val() != 4) {

    sectionsWay = [

        {

            selected: false,

            className: "usSenate",

            sectionClassName: "dinamic_us_senate"

        },

        {

            selected: false,

            className: "usHouse",

            sectionClassName: "dinamic_us_house"

        },

        {

            selected: false,

            className: "txHouse",

            sectionClassName: "dinamic_tx_house"

        },

        

    

    ];

}

else {

    sectionsWay = [

        {

            selected: false,

            className: "usSenate",

            sectionClassName: "dinamic_us_senate"

        },

        {

            selected: false,

            className: "usHouse",

            sectionClassName: "dinamic_us_house"

        },

        {

            selected: false,

            className: "txHouse",

            sectionClassName: "dinamic_tx_house"

        },

        {

            selected: false,

            className: "txSenate",

            sectionClassName: "dinamic_tx_senate",

        }

    ];



}



    var usSenate = {};

    var usHouse = {};

    var txSenate = {};

    var txHouse = {};

    var candidateName;



    $(document).on('click', '.chooseCandidate', function(event) {



        //////////////////////////change section algoritm///////////////////////////////////////////////////////////////////////////////

        $(this).parents('.SenateContainer').find('.selected_candidate').removeClass('selected_candidate'); 

        $(this).parents('.SenateContainer').find(`.${$(this).parent().attr('class').split(' ')[1]}`).addClass('selected_candidate');

        $(this).parents('.SenateContainer').find('.chooseCandidate ').find('img').remove();

        $(this).append(`<img style="position:absolute; right:6%" src="${site_url}assets/images/coosen.png">`)



        firstLoop: for(let i = 0; i < sectionsWay.length; i++) {



            if($(this).parents('.SenateContainer').attr('sectionName') == sectionsWay[i].className) {

                sectionsWay[i].selected = true;

            

                $('.new_left_buttons_section').find(`.${sectionsWay[i].className}`).parents('.inner-rgt-row').css('background-color','white');

                $('.new_left_buttons_section').find(`.${sectionsWay[i].className}`).parents('.inner-rgt-row').find('.unt-title').css('color','#1F3B78');

                $('.new_left_buttons_section').find(`.${sectionsWay[i].className}`).css({

                    'background-color': '#C1080D',

                    'color' : "white"

                })

                $('.new_left_buttons_section').find(`.${sectionsWay[i].className}`).html('Selected');

                // $('.new_left_buttons_section').find(`.${sectionsWay[i].className}`).parents('.right-cl-iiner').find('.unt-title').after('<img class="selCandImage" style="position:absolute; right:3%;width:20px;top:0;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">');



                var limit = sectionsWay.length - 1;



                if (i == limit && $('.selected_candidate').length != 2 * $('#choice_length').val()) {

                    i = -1;

                }



                secondLoop: for(let j = i + 1; j < sectionsWay.length; j++) {



                    if( !sectionsWay[j].selected) {



                        if($('.selected_candidate').length < 2 * $('#choice_length').val()) {



                            $(`.${sectionsWay[j].className}`).parents('.inner-rgt-row').css('background-color','#213D76');

                            $(`.${sectionsWay[j].className}`).parents('.inner-rgt-row').find('.unt-title').css('color','white');

                            $(`.${sectionsWay[j].className}`).css({

                                'background-color': 'white',

                                'color' : "red"

                            });



                            $('.dinamic_us_house').hide();

                            $('.dinamic_us_senate').hide();

                            $('.dinamic_tx_house').hide();

                            $('.dinamic_tx_senate').hide();





                            $(`.${sectionsWay[j].sectionClassName}`).fadeIn(700).css({display: 'table-cell'});

                        }



                        break firstLoop;

                        break secondLoop;

                    }                   

                }

                if($('.selected_candidate').length == 2 * $('#choice_length').val()) {

                    break firstLoop ;                    

                }

            }

        }

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        ////////////getting candidate data//////////////////////////////////////////////////////////////////////////////////////////////



        if( $(this).parents('.SenateContainer').attr('sectionName') == 'usSenate' ) {

            candidateId = $(this).attr('id');

            usSenateData.forEach(function(item) {

                if(item.id == candidateId) {

                    usSenate = item;

                }

            })

        }

        if( $(this).parents('.SenateContainer').attr('sectionName') == 'usHouse' ) {

            candidateId = $(this).attr('id');

            usHouseData.forEach(function(item) {

                if(item.id == candidateId) {

                    usHouse = item;

                }

            })

        }

        if( $(this).parents('.SenateContainer').attr('sectionName') == 'txHouse' ) {

            candidateId = $(this).attr('id');

            txHouseData.forEach(function(item) {

                if(item.id == candidateId) {

                    txHouse = item;

                }

            })

        }

        if( $(this).parents('.SenateContainer').attr('sectionName') == 'txSenate' ) {

            candidateId = $(this).attr('id');

            txSenateData.forEach(function(item) {

                if(item.id == candidateId) {

                    txSenate = item;

                }

            })

        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        /////////////////coice modal show process//////////////////////////////////////////////////////////////////////////////////////////

        if($('.selected_candidate').length == 2 * $('#choice_length').val()) {

            

            if(usSenate.local_profile_photo == null){

                var src = site_url + "assets/images/candidate_dummy.png"

            }

            else {

                var src = usSenate.local_profile_photo;

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


            if(usHouse.local_profile_photo == null){

                var src = site_url + "assets/images/candidate_dummy.png"

            }

            else {

                var src = usHouse.local_profile_photo;

            }

            $('.modalContainer').find('.usHouse').find('.choiceImg').attr('src',src);

            $('.modalContainer').find('.usHouse').find('.infobox').find('p').first().html(usHouse.first_name);

            $('.modalContainer').find('.usHouse').find('.infobox').find('p').last().html(usHouse.last_name);

         
            $('.modalContainer').find('.usHouse').find('.number-title').html($('.usHouse').parents('.inner-rgt-row').find('.number-title').html())




            var src = site_url + "assets/images/thumb.png";

            $('.modalContainer').find('.usHouse').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(

            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usHouse.election_agreed}<strong>/${usHouse.election_total}</strong>`    

            );



            var src = site_url + "assets/images/thumb.png";

            $('.modalContainer').find('.usHouse').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(

            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${usHouse.money_agreed}<strong>/${usHouse.money_total}</strong>`    

            );



            //txHouse
            if(txHouse.local_profile_photo == null){

                var src = site_url + "assets/images/candidate_dummy.png"

            }

            else {

                var src = txHouse.local_profile_photo;

            }

            $('.modalContainer').find('.txHouse').find('.choiceImg').attr('src',src);

            $('.modalContainer').find('.txHouse').find('.infobox').find('p').first().html(txHouse.first_name);

            $('.modalContainer').find('.txHouse').find('.infobox').find('p').last().html(txHouse.last_name);

          
             $('.modalContainer').find('.txHouse').find('.number-title').html($('.txHouse').parents('.inner-rgt-row').find('.number-title').html())

            

            var src = site_url + "assets/images/thumb.png";

            $('.modalContainer').find('.txHouse').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(

            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txHouse.election_agreed}<strong>/${txHouse.election_total}</strong>`    

            );

            

            var src = site_url + "assets/images/thumb.png";

            $('.modalContainer').find('.txHouse').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(

            `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txHouse.money_agreed}<strong>/${txHouse.money_total}</strong>`    

            );

            

            //txSenate

            // if (sectionsWay.length == 4) {
                if( +$('#choice_length').val() == 4) {



                if(txSenate.local_profile_photo == null){

                    var src = site_url + "assets/images/candidate_dummy.png"

                }

                else {

                    var src = txSenate.local_profile_photo;

                }

                $('.modalContainer').find('.txSenate').find('.choiceImg').attr('src',src);

                $('.modalContainer').find('.txSenate').find('.infobox').find('p').first().html(txSenate.first_name);

                $('.modalContainer').find('.txSenate').find('.infobox').find('p').last().html(txSenate.last_name);

                
                $('.modalContainer').find('.txSenate').find('.number-title').html($('.txSenate').parents('.inner-rgt-row').find('.number-title').html())


                

                var src = site_url + "assets/images/thumb.png";

                $('.modalContainer').find('.txSenate').find('.raitContainer').find('.raitCount').first().find('.sen-rat').html(

                `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txSenate.election_agreed}<strong>/${txSenate.election_total}</strong>`    

                );

                

                var src = site_url + "assets/images/thumb.png";

                $('.modalContainer').find('.txSenate').find('.raitContainer').find('.raitCount').last().find('.sen-rat').html(

                `<span class="thumb-icon"><img src=${src} alt="icon"></span>${txSenate.money_agreed}<strong>/${txSenate.money_total}</strong>`    

                );





                $('.modalContainer').find('.txSenate').show();

                $('.modalContainer').find('.txSenate').prev().show();

            }

            else {

                $('.modalContainer').find('.txSenate').hide();

                $('.modalContainer').find('.txSenate').prev().hide();

            }

            

            $('#choiceMessage').modal('show');
            completeSurvey();



        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////completed survey count function/////////////////////////
        function completeSurvey() {
           $.ajax({
               url: site_url + 'complete/survey/choosing',
               type: 'POST',
               success:function(response) {

               }
           })   
        }

        //////////////////////////////////////////////////////////////////////////////////////

        /////////////////send mail///////////////////////////
        $('.mailButton').unbind('click').bind('click', function (e) {
          alert()
            shareOn('mail');
        });
        /////////////////////////////////////////////////////////////////////////////////////////



        /////////remove selected candidates and start again///////////////////////////////////////////////////////////////////////////////

         $(document).on('click','.close_chooice_modal',function() {

            $('.selected_candidate').find('.chooseCandidate ').find('img').remove();
            $('.selected_candidate').removeClass('selected_candidate');


            $('.float').html('Compare Candidates');



            for (var i = 0; i < sectionsWay.length; i++) {

                sectionsWay[i].selected = false;

            }



            $(`.${sectionsWay[0].className}`).parents('.inner-rgt-row').css('background-color','#213D76');

            $(`.${sectionsWay[0].className}`).parents('.inner-rgt-row').find('.unt-title').css('color','white');

            $(`.${sectionsWay[0].className}`).css({

                'background-color': 'white',

                'color' : "red"

            });



            $('.dinamic_us_house').hide();

            $('.dinamic_us_senate').hide();

            $('.dinamic_tx_house').hide();

            $('.dinamic_tx_senate').hide();





            $(`.${sectionsWay[0].sectionClassName}`).fadeIn(700).css({display: 'table-cell'});

            // $('.selCandImage').remove();



        })

         //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    })



    $('#choice_length').val($('.float').length);



})

