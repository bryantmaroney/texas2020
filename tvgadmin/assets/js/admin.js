jQuery(document).ready(function($) {
  
const $tableID = $('#table');
 const $BTN = $('#export-btn');
 const $EXPORT = $('#export');

 const newTr = `
<tr class="hide">
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half" contenteditable="true">Example</td>
  <td class="pt-3-half">
    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>
    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>
  </td>
  <td>
    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>
  </td>
</tr>`;

 $('.table-add').on('click', 'i', () => {

   const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');

   if ($tableID.find('tbody tr').length === 0) {

     $('tbody').append(newTr);
   }

   $tableID.find('table').append($clone);
 });

 $tableID.on('click', '.table-remove', function () {

   $(this).parents('tr').detach();
 });


 // A few jQuery helpers for exporting only
 jQuery.fn.pop = [].pop;
 jQuery.fn.shift = [].shift;

 $BTN.on('click', () => {

   const $rows = $tableID.find('tr:not(:hidden)');
   const headers = [];
   const data = [];

   // Get the headers (add special header logic here)
   $($rows.shift()).find('th:not(:empty)').each(function () {

     headers.push($(this).text().toLowerCase());

   });

   // Turn all existing rows into a loopable array
   $rows.each(function () {
     const $td = $(this).find('td');
     const h = {};

     // Use the headers from earlier to name our hash keys
     headers.forEach((header, i) => {

       h[header] = $td.eq(i).text();
     });

     data.push(h);
   });

   // Output the result
   $EXPORT.text(JSON.stringify(data));


 });


  $(document).on('blur', '.pt-3-half', function(event) {

    var _this = $(this);
    var key = $(this).attr('name');
    var data = {};
    data.id = $(this).parents('tr').attr('candidateID');
    data[key] = $(this).text();
    
      $.ajax({
        url: site_url + 'admin/edit/candidates',
        type: 'POST',
        data: data,
        success:function(response) {
          console.log(response);
        }
      })
  });


  $(document).on('click', '.openAnswers', function(event) {
    $(this).parents('.answers').find('#answersModal').fadeIn(300)

  });

  $(document).on('click', '.close_modal', function(event) {
    $(this).parents('.answers').find('#answersModal').fadeOut(300)
  });

  $(document).on('click', '.answersCont > div button', function(event) {
    $(this).parent().find('button').removeClass('selectedVariant');
    $(this).addClass('selectedVariant');
  });

  $(document).on('click', '.editSubm', function(event) {

    var _this = $(this);

    var ansnwers = {
        id : $(this).parents('#answersModal').attr('candidateID'),
        gerrymandering : $(this).parents('#answersModal').find(`[name=gerrymandering]`).find('.selectedVariant').html().toLowerCase(),
        empower : $(this).parents('#answersModal').find(`[name=empower]`).find('.selectedVariant').html().toLowerCase(),
        ranked_choice : $(this).parents('#answersModal').find(`[name=ranked_choice]`).find('.selectedVariant').html().toLowerCase(),
        term : $(this).parents('#answersModal').find(`[name=term]`).find('.selectedVariant').html().toLowerCase(),
        auto_reg : $(this).parents('#answersModal').find(`[name=auto_reg]`).find('.selectedVariant').html().toLowerCase(),
        LOBBING : $(this).parents('#answersModal').find(`[name=LOBBING]`).find('.selectedVariant').html().toLowerCase(),
        WHOWRITESOURLAWS : $(this).parents('#answersModal').find(`[name=WHOWRITESOURLAWS]`).find('.selectedVariant').html().toLowerCase(),
        CRIMINALIZE : $(this).parents('#answersModal').find(`[name=CRIMINALIZE]`).find('.selectedVariant').html().toLowerCase(),
        LIMIT : $(this).parents('#answersModal').find(`[name=LIMIT]`).find('.selectedVariant').html().toLowerCase(),
        CAMPAIGN : $(this).parents('#answersModal').find(`[name=CAMPAIGN]`).find('.selectedVariant').html().toLowerCase(),
    }

     $.ajax({
        url: site_url + 'admin/edit/candidate/answers',
        type: 'POST',
        data: ansnwers,
        success:function(response) {
          console.log(response);
          _this.parents('#answersModal').fadeOut(300);
        }
      })

    console.log(ansnwers)

  });

  $(document).on('click', '.deleteTestCandidate', function(event) {

    var id = $(this).parents('tr').attr('candidateID');

    $.ajax({
        url: site_url + 'admin/delete/testCandidate',
        type: 'POST',
        data: { id : id},
        success:function(response) {
          console.log(response);
        }
      })
  });

  $(document).on('change', '.changePhotoInp', function(event) {
    
    var _this = $(this);
    var formData = new FormData();
      
    formData.append('file', $(this)[0].files[0]); 
    formData.append('id', $(this).parents('tr').attr('candidateID'));



      $.ajax({
          url: site_url + 'admin/edit/testCandidatePhoto',
          data: formData,
          type: 'POST',
          contentType: false, 
          processData: false, 
          success:function(response) {
            console.log(response)
            _this.parents('tr').find('td.image-td').find('img').attr('src', response)
          }
      });

  });


  $(document).on('change', '.changeSubmPhotoInp', function(event) {

    var _this = $(this);
    var formData = new FormData();
      
    formData.append('file', $(this)[0].files[0]); 
    formData.append('id', $(this).parents('tr').attr('candidateID'));


    $.ajax({
        url: site_url + 'admin/edit/submmitedCandidatePhoto',
        data: formData,
        type: 'POST',
        contentType: false, 
        processData: false, 
        success:function(response) {
          _this.parents('tr').find('.imageField').find('img').attr('src', response)
        }
    });

  });
  

  $(document).on('click', '.deleteSubmittedCandidate', function(event) {

  	var _this = $(this);  


	swal({
		title: "Delete candidate",
		text: `ARE YOU SURE YOU WANT TO DELETE?`,
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete!',
		cancelButtonText: "No, cancel pls!",
		closeOnConfirm: false,
		closeOnCancel: false
	},
	function(isConfirm){
		if (isConfirm){

			 $.ajax({
				url: site_url + 'admin/deleteSubmittedCandidate',
				data: { id: _this.parents('tr').attr('candidateID') },
				type: 'POST',
				success:function(response) {
					_this.parents('tr').remove();
					swal("Deleted!", `The candidate has been deleted successfully`, "success");
				}
			});
		} else {
			swal("Cancelled", `Candidate is not deleted`, "error");
		}
	});
  });

  $(document).on('click', '.deleteVoters', function(event) {
      var _this = $(this);  

      $.ajax({
          url: site_url + 'admin/deleteVoters',
          data: { id: $(this).parents('tr').attr('voterID') },
          type: 'POST',
          success:function(response) {
            _this.parents('tr').remove();
          }
      });
  });

   $(document).on('click', '.notVerified', function(event) {

      $.ajax({
          url: site_url + 'admin/resend/email',
          data: { id: $(this).parents('tr').attr('candidateID') },
          type: 'POST',
          success:function(response) {
            $('#reSendEmail').fadeIn(500);
          }
      });
   });

   $(document).on('click', '.close_mannual_modal', function(event) {
     $('#reSendEmail').fadeOut(500);
   });


 
  $(document).on('click', '.profileSlideDown', function(event) {
    $('.profile-slide-down').fadeToggle();
  });

  $(document).on('click', '.clearCandidates', function(event) {
		$.ajax({
			url: site_url + 'admin/clean/candidates',
			type: 'GET',
			success:function(response) {

				console.log(response);
				$('#cleanCandidatesSuccess').css({
					    'opacity': 1,
					    'background': 'rgba(0, 0, 0, 0.5)',
					    'padding-top': '50px',
				});
				$('#cleanCandidatesSuccess').slideDown(200);
				setTimeout(function() {
					$('#cleanCandidatesSuccess').slideUp(200);
				},3000);

				var table = $('#dataTable').DataTable();
 				table.clear().draw();
 				$('.chartArrow').html(0);
 				$('.lastActivity').html('No Recent Activity');
			}
		})
		
	});

	$(document).on('click', '.close_modal', function(event) {
		$('#cleanCandidatesSuccess').slideUp(200);
	});

  $(document).on('click', '.candidateCobtrolContainer > div > div > button', function(event) {
      
      $('.candidateCobtrolContainer > div > div > button').parent().removeClass('dashSelOption');
      $('.candidateCobtrolContainer > div > div > button').parent().addClass('dashNotSelOption');
      $(this).parent().addClass('dashSelOption');

      $('.txAdminTables').hide();
      $(`.${$(this).attr('table')}`).show();

      if ($(this).attr('table') == 'candidatesTable') {
        $('.search input').attr('search','candidates');
        drawMapRequest("candidates");

        $('.votLight').removeClass('lightSelectede');
        $('.canIssuesTally').removeClass('lightSelectede')
        $('.canIssuesTally_section').removeClass('canIssuesTally_show')
        $('.candLight').addClass('lightSelectede');
      }
      else {
         $('.search input').attr('search','voters');
         drawMapRequest("voters");

        $('.candLight').removeClass('lightSelectede');
        $('.canIssuesTally').removeClass('lightSelectede')
        $('.canIssuesTally_section').removeClass('canIssuesTally_show')
        $('.votLight').addClass('lightSelectede');
      }

      $('.search input').attr('readonly','');
  })

  // Candidate issues tally

  $(document).on('click', '.canIssuesTally', function() {

    $('.mapCandVot span').removeClass('lightSelectede')
    $(this).addClass('lightSelectede')
    $('.canIssuesTally_section').addClass('canIssuesTally_show')
  })

  $(document).on('click', '.candLight', function() {
    $('.mapCandVot span').removeClass('lightSelectede')
    $('.canIssuesTally_section').removeClass('canIssuesTally_show')
    $(this).addClass('lightSelectede');
  })

  $(document).on('click', '.votLight', function() {
    $('.mapCandVot span').removeClass('lightSelectede')
    $('.canIssuesTally_section').removeClass('canIssuesTally_show')
    $(this).addClass('lightSelectede');
  })

  $(document).on('click', '.candidates > button', function(event) {
  	candidateMonthChartProgress(new Date().getFullYear() , 'candidates');
  	officeChanger("U.S. Senate")
  	$('.chertRange').show();
    showChart("US Senate", 25, 75);
    $('.activeCandidates > strong').html("Active Candidates");
  });

  $(document).on('click', '.voters > button', function(event) {
  	candidateMonthChartProgress(new Date().getFullYear() , 'voters');

  	$.ajax({
    	url: site_url + 'admin/circl/chart/voters',
    	dataType: 'json',	
    	type: 'POST',
    	success:function(response) {
    		$('.chartArrow').html(response.candidatesCount);
            if (response.insert_item) {
        		let lastActivity = response.insert_item.created_at.split(' ')[0].split('-');
        		$('.lastActivity').html(`${lastActivity[1]}/${lastActivity[2]}/${lastActivity[0]}`);	
            }
            else {
                $('.lastActivity').html('No Recent Activity')
            }
            $('.chertRange').hide();
            showChart("", 0, 100);
            $('.activeCandidates > strong').html("Active Voters");


    	}
	    })

  });
  (function() {
       candidateMonthChartProgress(new Date().getFullYear() , 'candidates');
  })();


  $(document).on('click', '.chartDrDowns', function(event) {
  	$('.years').slideToggle(300);
  });

  (function(){
  	$('.years').empty();
  	for (var i = 2000; i < 2050; i++) {
  		$('.years').append(`<div ${ (i == new Date().getFullYear())? 'class="activeYear"' : '' } >${i}</div>`);
  	}
  	$('.yearShow').html(new Date().getFullYear())
 
  })();

  $(document).on('click', '.years > div', function(event) {
  	$('.activeYear').removeClass('activeYear');
  	$(this).addClass('activeYear');
  	$('.yearShow').html($(this).html());
  	candidateMonthChartProgress(+$(this).html());
  });

  function candidateMonthChartProgress( year = new Date().getFullYear(), dbTable) {
  	 $.ajax({
          url: site_url + 'admin/mounth/chart',
          dataType: 'json',
          type: 'POST',
          data: { year: year,dbTable: dbTable },
          success:function(response) {
        
            let maxValue = Object.values(response).sort((a,b)=>b-a)[0];
            let criticValue = Math.round( maxValue + maxValue/2 );
            let scale = $($('.monthScale').get().reverse());

            var step;
            if (maxValue == 0) {
            	step = 1;
            }
            else {
            	step = Math.ceil(criticValue/5);
            }
            var startValue = -step;

            scale.each(function(index, item){
              $(item).html(startValue += step);
            })

            for(let key in response) {
              $(`[month=${key}]`).css('height', `${Math.floor(16 + (response[key]/+$('.criticalSpan').html()) * 84)}%`);
              $(`[month=${key}]`).attr('data-original-title', response[key]);
              
            }
          }
      });
  }


  $(document).on('click', '.prSectionContainer', function(event) {
    $(this).find('.floatWindow').slideToggle(300);
  });

  $(document).on('click', '.imageField', function(event) {
    // $(this).parents('tr').next().slideDown(300);
    let candidateID = $(this).parents('tr').attr('candidateID')
    let candidate = submitted_candidates.filter((item)=>{
      return item.id == candidateID
    })

    problemSlide($(this), $(this).parents('tr').attr('candidateID'),6,candidate[0]);

  });
  $(document).on('click', '.image-td', function(event) {
    // $(this).parents('tr').next().slideDown(300);

    problemSlide($(this), $(this).parents('tr').attr('candidateID'),5);

  });

  function problemSlide(_this, candidateID, colspan,candidate) {

      let issues = JSON.parse(candidate.issues);

      if ($(`.slideProblemTr[candidateIDSlide=${candidateID}]`).length == 0) {

        $(`[candidateIDSlide=${candidateID}]`).remove();

        if (issues === null) {

          _this.parents('tr').after(`
            <tr class="slideProblemTr" candidateIDSlide=${candidateID}>
              <td colspan="${colspan}" style="padding:0">

                <div class="problemContainer flex_for_charts">
                  
                  <div class="charts_sections">
                    <span class="answers_counts_style" style="color: #2DA107;">${candidate.candidateAgreeCount}</span>
                  </div>
                  <div class="charts_sections">
                    <span class="answers_counts_style" style="color: #C30100;">${candidate.candidateDisAgreeCount}</span>
                  </div>
                  <div class="charts_sections">
                    <span class="answers_counts_style" style="color: #6D6D6D;">${candidate.candidateNeitherCount}</span>
                  </div>
                </div>

                <div class="problemContainer">
                  <div class="prHeader">
                    <div>Question <span>& Answers</span></div>
                    <div>Date: <span> ${candidate.created_at.split(' ')[0].split('-')[1] + "/" + candidate.created_at.split(' ')[0].split('-')[2] + "/" + candidate.created_at.split(' ')[0].split('-')[0]}</span></div>
                    <div>Email: <span> ${candidate.email}</span></div>
                    <div>IP Address: <span> ${candidate.candidateIP}</span></div>
                    <div>Geo Located: <span> ${candidate.geoLocation}</span></div>
                  </div>
                </div>
              </td>
            </tr>
        `)
          _this.addClass('selProblemSlideClass');

          showChart("AGREE", candidate.candidateAgreeCount, 10 - candidate.candidateAgreeCount, "donutchart" + candidateID + 'a' ,"#2DA107");
          showChart("DISAGREE", candidate.candidateDisAgreeCount, 10 - candidate.candidateDisAgreeCount, "donutchart" + candidateID + 'b' ,"#C30100");
          showChart("NEITHER", candidate.candidateNeitherCount, 10 - candidate.candidateNeitherCount, "donutchart" + candidateID + 'c' ,"#6D6D6D");

        }else {

          _this.parents('tr').after(`
            <tr class="slideProblemTr" candidateIDSlide=${candidateID}>
              <td colspan="${colspan}" style="padding:0">

                <div class="problemContainer flex_for_charts">
                  <div class="charts_sections">
                    <div id="donutchart${candidate.id}a"></div>
                    <div class="candidateAdminCount" style="color: #2DA107">${candidate.candidateAgreeCount}</div>
                  </div>
                  <div class="charts_sections">
                    <div id="donutchart${candidate.id}b"></div>
                    <div class="candidateAdminCount" style="color: #C30100">${candidate.candidateDisAgreeCount}</div>
                  </div>
                  <div class="charts_sections">
                    <div id="donutchart${candidate.id}c"></div>
                    <div class="candidateAdminCount" style="color: #6D6D6D">${candidate.candidateNeitherCount}</div>
                  </div>
                </div>

                <div class="problemContainer">
                  <div class="prHeader">
                    <div>Question <span>& Answers</span></div>
                    <div>Date: <span> ${candidate.created_at.split(' ')[0].split('-')[1] + "/" + candidate.created_at.split(' ')[0].split('-')[2] + "/" + candidate.created_at.split(' ')[0].split('-')[0]}</span></div>
                    <div>Email: <span> ${candidate.email}</span></div>
                    <div>IP Address: <span> ${candidate.candidateIP}</span></div>
                    <div>Geo Located: <span> ${candidate.geoLocation}</span></div>
                  </div>
                  <div class="prBody">
                    <div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">1</span>  END GERRYMANDERING</div>
                        <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.end_gerry_answer}Dash.png" alt="">
                              <span class="${issues.end_gerry_answer}answerColor">${issues.end_gerry_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.end_gerry_comment.trim() == 'skip' || issues.end_gerry_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.end_gerry_comment.trim() != '' ? issues.end_gerry_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">2</span>  VOTE BY MAIL</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.vote_by_mail_answer}Dash.png" alt="">
                              <span class="${issues.vote_by_mail_answer}answerColor">${issues.vote_by_mail_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.vote_by_mail_comment.trim() == 'skip' || issues.vote_by_mail_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.vote_by_mail_comment.trim() != '' ? issues.vote_by_mail_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">3</span> REVEAL THE WRITERS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.reval_writers_answer}Dash.png" alt="">
                              <span class="${issues.reval_writers_answer}answerColor">${issues.reval_writers_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.reval_writers_comment.trim() == 'skip' || issues.reval_writers_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.reval_writers_comment.trim() != '' ? issues.reval_writers_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">4</span> MODERNIZE ELECTIONS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.modern_election_answer}Dash.png" alt="">
                              <span class="${issues.modern_election_answer}answerColor">${issues.modern_election_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.modern_election_comment.trim() == 'skip' || issues.modern_election_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.modern_election_comment.trim() != '' ? issues.modern_election_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">5</span> RANK YOUR CANDIDATES</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.rank_candidate_answer}Dash.png" alt="">
                              <span class="${issues.rank_candidate_answer}answerColor">${issues.rank_candidate_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.rank_candidate_comment.trim() == 'skip' || issues.rank_candidate_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.rank_candidate_comment.trim() != '' ? issues.rank_candidate_comment  :'No expanded answers given'}</span></div>
                      </div>

                    </div>

                    <div>
                      
                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">6</span> BAN THE BARRIERS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.ban_barriers_answer}Dash.png" alt="">
                              <span class="${issues.ban_barriers_answer}answerColor">${issues.ban_barriers_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.ban_barriers_comment.trim() == 'skip' || issues.ban_barriers_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.ban_barriers_comment.trim() != '' ? issues.ban_barriers_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">7</span> LIMIT THE LOBBYISTS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.limit_lob_answer}Dash.png" alt="">
                              <span class="${issues.limit_lob_answer}answerColor">${issues.limit_lob_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.limit_lob_comment.trim() == 'skip' || issues.limit_lob_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.limit_lob_comment.trim() != '' ? issues.limit_lob_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">8</span>  RETHINK REGISTRATION</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.reth_reg_answer}Dash.png" alt="">
                              <span class="${issues.reth_reg_answer}answerColor">${issues.reth_reg_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.reth_reg_comment.trim() == 'skip' || issues.reth_reg_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.reth_reg_comment.trim() != '' ? issues.reth_reg_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber">9</span> CLEAN UP ELECTIONS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.clean_up_answer}Dash.png" alt="">
                              <span class="${issues.clean_up_answer}answerColor">${issues.clean_up_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.clean_up_comment.trim() == 'skip' || issues.clean_up_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.clean_up_comment.trim() != '' ? issues.clean_up_comment  :'No expanded answers given'}</span></div>
                      </div>

                      <div class="prSectionContainer">
                        <div><span class="adminissueNumber" style="padding: 3px 4px 3px 3px">10</span> TUNE IN TEXAS</div>
                         <div class="issueRight">
                            <span>
                              <img src="${site_url}/assets/images/${issues.tune_in_texas_answer}Dash.png" alt="">
                              <span class="${issues.tune_in_texas_answer}answerColor">${issues.tune_in_texas_answer.toUpperCase()}</span>
                            </span>
                            <span>
                              ${ (issues.tune_in_texas_comment.trim() == 'skip' || issues.tune_in_texas_comment.trim() == '') ? '' : `<img style="margin-right:15px;" src="${site_url}assets/images/messageDrDown.png">`}
                              <i class="fas fa-sort-down profileSlideDown"></i>
                            </span>
                        </div>
                        <div class="floatWindow">Answers : <span class="flAnsTxt">${issues.tune_in_texas_comment.trim() != '' ? issues.tune_in_texas_comment  :'No expanded answers given'}</span></div>
                      </div>

                    </div>
                  </div>
                </div>
              </td>
            </tr>
        `)
          _this.addClass('selProblemSlideClass');

          showChart("AGREE", candidate.candidateAgreeCount, 10 - candidate.candidateAgreeCount, "donutchart" + candidateID + 'a' ,"#2DA107");
          showChart("DISAGREE", candidate.candidateDisAgreeCount, 10 - candidate.candidateDisAgreeCount, "donutchart" + candidateID + 'b' ,"#C30100");
          showChart("NEITHER", candidate.candidateNeitherCount, 10 - candidate.candidateNeitherCount, "donutchart" + candidateID + 'c' ,"#6D6D6D");

        }

      }
      else {
        $(`[candidateIDSlide=${candidateID}]`).remove();
         _this.removeClass('selProblemSlideClass');
      }
  }

   function showChart(office,percent,all,chartID,color) {

          google.charts.load("current", {packages:["corechart"]});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              [office , percent],
              ['',     all],
            ]);

            var options = {
              'width':80,
              'height':80,
              backgroundColor: 'transparent',
              pieHole: 0.8,
              legend: 'none',
              pieStartAngle: 270,
              pieSliceText: 'none',
              pieSliceBorderColor: color,
              slices: {
                0: { color: color },
                1: { color: '#fff' }
              },
            };

            var chart = new google.visualization.PieChart(document.getElementById(chartID));
            chart.draw(data, options);
          }
    }

    $('#uploadCandidates').on('change', function() {
      var formData = new FormData(),
          file = document.getElementById('uploadCandidates').files[0];

      formData.append('upload', file);

      $.ajax({
        url: site_url + 'admin/upload/candidates',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: res => {
          var result_arr = JSON.parse(res)

          if (result_arr.success) {
            swal("Candidates are imported!", `The candidates have been imported successfully`, "success");
          }
        }
      })
    })
   
   $(document).on('click', '.adminVerifyCandidate', function(event){
        var _this = $(this), button;
        swal({
			title: "Verify candidate",
			text: `Are you sure you want to verify this candidate? They will appear in the voter guide immediately`,
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Yes, verify!',
			cancelButtonText: "No, cancel pls!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
		    if (isConfirm){

		    	$.ajax({
		    		url: site_url + 'admin/adminVerifyCandidate',
		    		type: 'POST',
		    		data: {id: _this.parents('td').attr('candidateID')},
		    		success:function(response){
				      swal("Verified!", `The candidate has been verified successfully`, "success");
				      _this.removeClass('adminVerifyCandidate');
				      _this.attr('data-original-title','Candidate is verified');
				      button = _this.parents('tr')[0].querySelector('.isVerified.padNotFirst').children[0];

				      if(button) {
				        button.classList.remove('notVerified');
				        button.innerText = 'Verified';
				        button.classList.add('verified');
				      }

		    		}
		    	})
		    } else {
		      swal("Cancelled", `Candidate is not verified`, "error");
		    }
		});
   })

  var table_cands = $('#dataTable').DataTable({
    pageLength : 25,
    "bLengthChange": false,
    "searching": true,
    bFilter: false,
    aaSorting: [],
    "ordering": true,
    columnDefs: [{
      orderable: false,
      targets: "no-sorting",

    },
    { targets: 1, type: 'natural' }],
    scrollX: true,
    responsive: false,
    "language": {
        "paginate": {
          "previous": "<<",
          "next": ">>"
        },
        "info": "Showing _START_ - _END_ of _TOTAL_ items",
    }
  })

  $('#votersDataTable').DataTable({
    pageLength : 25,
    "bLengthChange": false,
    bFilter: false,
    "ordering": false,
    "searching": true,
    scrollX: true,
    responsive: false,
    "language": {
        "paginate": {
          "previous": "<<",
          "next": ">>"
        },
        "info": "Showing _START_ - _END_ of _TOTAL_ items",
    }
})

  $('#dataTable').on( 'order.dt', function () {
    var ordered_data = table_cands.rows( { order: 'applied' } ).data()
  })

})
