$(document).ready(function($) {

	let issuesPolice = {
		end_gerry : true,
		vote_by_mail: false,
		reval_writers : false,
		reth_reg : false,
		limit_lob : false,
		modern_election : false,
		rank_candidate: false,
		tune_in_texas : false,
		clean_up : false,
		ban_barriers: false
	};


	$("html, body").animate({ scrollTop: 90 });
	$(document).on('click', '.problemHeader', function(event) {
		var pliceName = $(this).parents('.problemContainer').find('.problemBody').find('.step3Submite').attr('name')
		// console.log($(this).parents('.problemContainer').next().find('.problemBody').find('.step3Submite').attr('name'));

		if(issuesPolice[pliceName] == true){
			if (!$(this).hasClass('selectedHeader')) {
				$('.problemContainer').find('.problemHeader').removeClass('selectedHeader');
				$('.problemContainer').find('.problemBody').hide();
				$(this).addClass('selectedHeader');

				if (!$(this).find('p').last().hasClass('agreeSummaryRight') && !$(this).find('p').last().hasClass('disagreeSummaryRight') && !$(this).find('p').last().hasClass('neitherSummaryRight') && !$(this).find('p').last().hasClass('skippedSummaryRight')) {
					$('.problemContainer').find('.problemHeader').find('.arrowImage').attr('src', 'assets/images/arrBottom.png');
					$(this).find('.arrowImage').attr('src', 'assets/images/arrTop.png');
				}
			}
			else {
				$(this).removeClass('selectedHeader');
				if (!$(this).find('p').last().hasClass('agreeSummaryRight') && !$(this).find('p').last().hasClass('disagreeSummaryRight') && !$(this).find('p').last().hasClass('neitherSummaryRight') && !$(this).find('p').last().hasClass('skippedSummaryRight')) {
					$('.problemContainer').find('.problemHeader').find('.arrowImage').attr('src', 'assets/images/arrBottom.png');
					$(this).find('.arrowImage').attr('src', 'assets/images/arrBottom.png');
				}
			}
			$(this).parents('.problemContainer').find('.problemBody').toggle();
		}
		

		
	});


	$(document).on('click', '.agree', function(event) {
		
		$(this).addClass('agreeHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.disagree').removeClass('disAgreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.skip').removeClass('skipHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();

		$(this).addClass('selectedAnswer');

        answers[$(this).data('name') + "_answer"] = "agree";

        $(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
		$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="agreeSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summaryAgree.png" alt="">AGREE</p>`);


		if (Object.keys(answers).length == 20) {
			if ($(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('agreeSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('disagreeSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('neitherSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('skippedSummaryRight')) {
				
				


				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);


				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");

				isChangedAnswer = true;
			}
			else {
				completedSelections(answers);
			}			
		}

	});


	$(document).on('click', '.disagree', function(event) {

		
		
		$(this).addClass('disAgreeHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.agree').removeClass('agreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.skip').removeClass('skipHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();

		$(this).addClass('selectedAnswer');

        answers[$(this).data('name') + "_answer"] = "disagree";

        $(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
		$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="disagreeSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summaryDisAgree.png" alt="">DISAGREE</p>`);


        console.log(answers)

		if (Object.keys(answers).length == 20) {
			if ($(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('agreeSummaryRight') ||
			 	$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('disagreeSummaryRight') ||
			  	$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('neitherSummaryRight') ||
			   	$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('skippedSummaryRight')) {

				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);
				

				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
				isChangedAnswer = true;
	    
			}
			else {
				completedSelections(answers);
			}
			
		}
	});





	$(document).on('click', '.neither', function(event) {

		
		
		$(this).addClass('neitherHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.agree').removeClass('agreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.disagree').removeClass('disAgreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.skip').removeClass('skipHover selectedAnswer').find('.selectedAnswerImage').hide();

		$(this).addClass('selectedAnswer');

		$(this).parents('.problemBody').find('.commentSection textarea').focus();

		if (Object.keys(answers).length == 20) {
			if ($(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('agreeSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('disagreeSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('neitherSummaryRight') || 
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('skippedSummaryRight')) {

				isChangedAnswer = true;
	    
			}
			else {
				completedSelections(answers);
			}
			
		}
	});



	var answers = {};

	$(document).on('click', '.skip', function(event) {

		_this = $(this);

		

		// $(this).parents('.problemContainer').find('.problemHeader').find('.selCandImage').show();
		
		$(this).addClass('skipHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.agree').removeClass('agreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.disagree').removeClass('disAgreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();

		$(this).addClass('selectedAnswer');




		answers[$(this).data('name') + "_answer"] = "skip";
		answers[$(this).data('name') + "_comment"] = "skip";



		


		
		console.log(Object.values(answers).length, Object.values(answers).length == 20);
		if (Object.keys(answers).length == 20) {

			$(this).parents('.problemContainer').find('.problemHeader').removeClass('selectedHeader');
			$(this).parents('.problemContainer').find('.problemBody').slideToggle(500);

			

			if ($(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('agreeSummaryRight') ||
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('disagreeSummaryRight') ||
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('neitherSummaryRight') ||
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().hasClass('skippedSummaryRight')) {

				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
				$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="skippedSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summarySkiped.png" alt="">SKIPPED</p>`);
			

				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);
				

				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
				isChangedAnswer = true;
			}
			else {
				completedSelections(answers);

				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
				$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="skippedSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summarySkiped.png" alt="">SKIPPED</p>`);
			}

			
		
		}
		else {

			$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
			$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="skippedSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summarySkiped.png" alt="">SKIPPED</p>`);

			const issues = $(`.skip`).toArray();
			orderedIssues($(this), issues, answers, 'skip');
			$("html, body").animate({ scrollTop: _this.parents('.problemContainer').next().offset().top - 580 });


			var nextName = $(this).parents('.problemContainer').next().find('.problemBody').find('.step3Submite').attr('name');

			issuesPolice[nextName] = true;
		}
	});


	let isChangedAnswer = false;
	$(document).on('click', '.step3Submite', function(event) {

		
		if ($(this).parents('.problemContainer').find('.selectedAnswer').length != 0) {

			if ($(this).parents('.problemContainer').find('.selectedAnswer').length !=0) {
				answers[$(this).attr('name') + "_answer"] = $(this).parents('.problemContainer').find('.selectedAnswer').data('value').toLowerCase();
				answers[$(this).attr('name') + "_comment"] = $(this).parents('.problemContainer').find('.commentSection > textarea').val();
			}

			if (Object.keys(answers).length == 20) {

				$(this).parents('.problemContainer').find('.problemHeader').removeClass('selectedHeader');
				$(this).parents('.problemContainer').find('.problemBody').slideToggle(500);

				if (!isChangedAnswer) {
					completedSelections(answers);		
				}	
			}
			else {
				var nextName = $(this).parents('.problemContainer').next().find('.problemBody').find('.step3Submite').attr('name');

				issuesPolice[nextName] = true;

				const issues = $(`.step3Submite`).toArray();
				orderedIssues($(this), issues, answers, 'step3Submite');
			}



			if ($(this).parents('.problemBody').find('.buttons').find('.selectedAnswer').data('value') == "agree") {

				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
				$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="agreeSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summaryAgree.png" alt="">AGREE</p>`);


				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);


				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
			}
			else if ($(this).parents('.problemBody').find('.buttons').find('.selectedAnswer').data('value') == "disagree") {

				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
				$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="disagreeSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summaryDisAgree.png" alt="">DISAGREE</p>`);

				


				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);
				

				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
			}
			else if ($(this).parents('.problemBody').find('.buttons').find('.selectedAnswer').data('value') == "neither") {
				$(this).parents('.problemContainer').find('.problemHeader').find('p').last().remove();
				$(this).parents('.problemContainer').find('.problemHeader').append(`<p class="neitherSummaryRight"><img class="arrowImageAnswer" src="${site_url}assets/images/summaryNither.png" alt="">NEITHER</p>`);


				agreeCount = $('.agreeSummaryRight').length;
			    disAgreeCount = $('.disagreeSummaryRight').length;
			    neitherCount = $('.neitherSummaryRight').length;
			 //   skipedCount = $('.skippedSummaryRight').length;

				$('.donutchartAgreeNumber').html(agreeCount);
				$('.donutchartDisAgreeNumber').html(disAgreeCount);
				$('.donutchartNeitherNumber').html(neitherCount);
				// $('.donutchartSkippedNumber').html(skipedCount);
				

				showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
			    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
			    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
			 //   showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
			}

			
		}


	});

	function saveAllAnswers(answers){
		$.ajax({
			url: site_url + 'step3/save',
			type: 'POST',
			data: answers,
			success:function(r){
				window.location.href = site_url + 'step4';
			}
		})	
	}

	let stepArr = [ 'clean_up_answer','end_gerry_answer','limit_lob_answer','modern_election_answer','rank_candidate_answer','reth_reg_answer','reval_writers_answer','t_u_t_answer','tune_in_texas_answer','vote_by_mail_answer'];

	function completedSelections(answers) {
		
	    $('.problemHeader').each(function(index, el) {
	    	$(el).find('p').last().remove();
	    });
    	for(let key in answers) {

	    	if (answers[key] == "agree") {
	    		$(`.problemHeader[data-name=${key}]`).append(`<p class="agreeSummaryRight"><img class="arrowImage" src="${site_url}assets/images/summaryAgree.png" alt="">AGREE</p>`);
	    	}
	    	else if (answers[key] == "disagree") {
	    		$(`.problemHeader[data-name=${key}]`).append(`<p class="disagreeSummaryRight"><img class="arrowImage" src="${site_url}assets/images/summaryDisAgree.png" alt="">DISAGREE</p>`);

	    	}
	    	else if (answers[key] == "neither") {
	    		$(`.problemHeader[data-name=${key}]`).append(`<p class="neitherSummaryRight"><img class="arrowImage" src="${site_url}assets/images/summaryNither.png" alt="">NEITHER</p>`);

	    	}
	    	else {
	    		$(`.problemHeader[data-name=${key}]`).append(`<p class="skippedSummaryRight"><img class="arrowImage" src="${site_url}assets/images/summarySkiped.png" alt="">SKIPPED</p>`);

	    	}
    	}
	    
	    var agreeCount = $('.agreeSummaryRight').length;
	    var disAgreeCount = $('.disagreeSummaryRight').length;
	    var neitherCount = $('.neitherSummaryRight').length;
	   // var skipedCount = $('.skippedSummaryRight').length;

	    $(".stCont").find('.charts').remove();


	    $(".stCont").append(`
	    	<div class="charts">
				<div class="resultCharts">
					<div>
						<div id="donutchartAgree">
	               
	           			</div>
	           			<div class="donutchartAgreeNumber" style="color: #2CA107">${agreeCount}</div>
	           			<div>
	           				<div class="agree row agreeClick" data-value="agree">
								<img src="${site_url}assets/images/like.png" alt="">&nbsp;
								AGREE
								<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png" alt="">
							</div>
	           			</div>
					</div>
					<div>
						<div id="donutchartDisAgree">
	               
	           			</div>
	           			<div class="donutchartDisAgreeNumber" style="color: #C30100">${disAgreeCount}</div>
	           			<div>
	           				<div class="disagree row disagreeClick" data-value="disagree">
								<img src="${site_url}assets/images/dislike.png" alt="">&nbsp;
								DISAGREE
								<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
							</div>
	           			</div>
					</div>
					<div>
						<div id="donutchartNeither">
	               
	           			</div>
	           			<div class="donutchartNeitherNumber" style="color: #6D6D6D">${neitherCount}</div>
	           			<div>
	           				<div class="neither row neitherClick" data-value="neither">
								<img src="${site_url}assets/images/neither.png" alt="">&nbsp;
								NEITHER
								<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
							</div>
	           			</div>
					</div>
				</div>
				<p class="step3Message" style="margin-top: 25px;">YOU MAY CHANGE AND REVIEW YOUR ANSWERS AND THEN PRESS SUBMIT</p>
				<div class="submitSummary">
					<button>ALMOST DONE</button>
				</div>
			</div>
		`);

	    showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
	    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
	    showChart("NEITHER", neitherCount, 10 - neitherCount, "donutchartNeither", "#6D6D6D");
	   // showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");

	}
	
// 	<div>
// 		<div id="donutchartSkipped">
   
//   		</div>
//   		<div class="donutchartSkippedNumber" style="color: #AAAAAA">${skipedCount}</div>
//   		<div>
//   			<div class="skip row skipClick" data-value="skip" data-name="end_gerry">
// 				<img src="${site_url}assets/images/skip.png" alt="">&nbsp;
// 				SKIP
// 				<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
// 			</div>
//   		</div>
// 	</div>

	$(document).on('click', '.submitSummary > button', function(event) {
		saveAllAnswers(answers);
	});
	



	// tooltip
	var $tooltip = $('<div class="lite-tooltip" id="tooltip"></div>'),
			selector = '[data-lite-tooltip]',
			tip_offset = 2,
			tip_size = 6 + tip_offset,
			positions = {
				top: function(o){
					return {
						top: (o.bbox.top + o.st) - o.ttHeight - tip_size,
						left: o.bbox.left + (o.bbox.width / 2) - (o.ttWidth / 2)
					};
				},
				bottom: function(o){
					return {
						top: (o.bbox.bottom + o.st) + tip_size,
						left: o.bbox.left + (o.bbox.width / 2) - (o.ttWidth / 2)
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
					tooltipWidth = data.liteTooltipWidth * 1 || 280,
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



	function orderedIssues(_this, issues, answers ,button) {

		let index  = issues.indexOf(_this[0]);

		// while(true){

			let nextEmlement;
			if(index <= 8) {
				nextEmlement = $(issues[index+1]).parents('.problemContainer').find('.problemHeader');
			}
			else {
				index = -1;
				nextEmlement = $(issues[index+1]).parents('.problemContainer').find('.problemHeader');
			}


			let detectElement = $(nextEmlement).find('p').eq(1)[0];

			if(!$(detectElement).hasClass('agreeSummaryRight') && !$(detectElement).hasClass('disagreeSummaryRight') && 
				!$(detectElement).hasClass('neitherSummaryRight') && !$(detectElement).hasClass('skippedSummaryRight')){
					
				_this.parents('.problemContainer').find('.problemHeader').removeClass('selectedHeader');
				_this.parents('.problemContainer').find('.problemBody').slideToggle(500);


				nextEmlement.addClass('selectedHeader');
				nextEmlement.find('.arrowImage').attr('src', 'assets/images/arrTop.png');
				nextEmlement.parents('.problemContainer').find('.problemBody').toggle();

				// break;

			}
			// else {
			// 	index++;
			// }
			


		// }
		


	}





});


