jQuery(function ($) {
    answers = {};
    
    let firstTime = true;
    
    $(document).on('click', '.desktopAgree', function(event) {
   
    		$(this).addClass('mobileAgreeHover');
    		$(this).parents('.deskVoteButtons').find('.desktopDisagree').removeClass('mobileDisAgreeHover selectedAnswer');
    		$(this).parents('.item').find('.deskShareSkip').find('.desktopSkip').removeClass('desktopSkipHover selectedAnswer');

    		
    		$(this).addClass('selectedAnswer');
		
    		answers[$(this).data('name') + "_answer"] = "agree";
    		if (Object.keys(answers).length == 10) {
    		    if(firstTime){
    		        completedSelections(answers);
    		        firstTime = false;
    		    }
    		    else {
    		        reShowChart(answers);
    		    }
    		    
    		}
    		
    		Dots.userVote('agree', $(this).data('name'));
			sendVote($(this).data('name'),"agree", true);
    })
    
    $(document).on('click', '.desktopDisagree', function(event) {
        
        $(this).addClass('mobileDisAgreeHover');
		$(this).parents('.deskVoteButtons').find('.desktopAgree').removeClass('mobileAgreeHover selectedAnswer');
		$(this).parents('.item').find('.deskShareSkip').find('.desktopSkip').removeClass('desktopSkipHover selectedAnswer');
		
		$(this).addClass('selectedAnswer');
		
		answers[$(this).data('name') + "_answer"] = "disagree";
		
		if (Object.keys(answers).length == 10) {
		    if(firstTime){
		        completedSelections(answers)
		        firstTime = false;
		    }
		    else {
		        reShowChart(answers);
		    }
		}
		
		Dots.userVote('disagree', $(this).data('name'));
		sendVote($(this).data('name'),"disagree");
    })
    
    $(document).on('click', '.desktopSkip', function(event) {

        $(this).addClass('desktopSkipHover');
		$(this).parents('.item').find('.deskVoteButtons').find('.desktopAgree').removeClass('mobileAgreeHover selectedAnswer');
		$(this).parents('.item').find('.deskVoteButtons').find('.desktopDisagree').removeClass('mobileDisAgreeHover selectedAnswer');
		
		$(this).addClass('selectedAnswer');
		
		answers[$(this).data('name') + "_answer"] = "skip";
		
		if (Object.keys(answers).length == 10) {
		    if(firstTime){
		        completedSelections(answers);
		        firstTime = false;
		    }
		    else {
		        reShowChart(answers);
		    }
	    }
	    
	    Dots.userVote('skip', $(this).data('name'));
		sendVote($(this).data('name'),"skip", true);
    })
    
    function sendVote(question, answer, isNeither=false){
		var owl = $('#carusel-desktop');
        owl.owlCarousel();
        
        $.ajax({
			url: site_url + 'user/vote',
			type: 'POST',
			data: {answer, question},
			success:function(r){
				console.log(r)
				!isNeither && owl.trigger('next.owl.carousel')
			}
		})	
        
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

			var bgcolor = "";
			if($(window).width() > 780){
				bgcolor = "#002A5B";
			}
			else {
				bgcolor = "#1A2E5A";
			}

            var options = {
              pieHole: 0.8,
              legend: 'none',
              pieStartAngle: 270,
              pieSliceText: 'none',
			  pieSliceBorderColor: color,
			  backgroundColor: bgcolor,
			  'width':"33%",
              'height':150,
              slices: {
                0: { color: color },
                1: { color: bgcolor }
              },
            };
            var chart = new google.visualization.PieChart(document.getElementById(chartID));
            chart.draw(data, options);
          }
    }
    
    function reShowChart(answers){
        var agreeCount =0;
	    var disAgreeCount =0;
	    var skipedCount =0;
	    
	    for(let key in answers){
            if(answers[key].includes('disagree')) {
                disAgreeCount++;
            }
            else if(answers[key].includes('agree')) {
                agreeCount++;
            }
            else if(answers[key].includes('skip')) {
                skipedCount++;
            }
	    }
	    // showChart("AGREE", agreeCount, 10 - agreeCount, "deskDonutchartAgree","#2CA107");
	    // showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "deskDonutchartDisAgree","#C30100");
	    // showChart("SKIPPED", skipedCount, 10 - skipedCount, "deskDonutchartSkipped", "#AAAAAA");
	    
	    // $('.donutchartAgreeNumber').html(agreeCount);
		// $('.donutchartDisAgreeNumber').html(disAgreeCount);
		// $('.donutchartSkippedNumber').html(skipedCount);
    }
    
    
    function completedSelections(answers) {
	    var agreeCount =0;
	    var disAgreeCount =0;
	    var skipedCount =0;
	    
	    for(let key in answers){
            if(answers[key].includes('disagree')) {
                disAgreeCount++;
            }
            else if(answers[key].includes('agree')) {
                agreeCount++;
            }
            else if(answers[key].includes('skip')) {
                skipedCount++;
            }
	    }

	    $(".stCont").find('.charts').remove();

	    // $("#carusel-desktop").append(`
	    // 	<div class="chartsMobile">
		// 		<div class="resultCharts">
		// 			<div>
		// 				<div id="deskDonutchartAgree">
	               
	    //        			</div>
	    //        			<div class="donutchartAgreeNumber" style="color: #2CA107">${agreeCount}</div>
	    //        			<div>
	    //        				<div class="agree row agreeClick" data-value="agree">
		// 						<img src="${site_url}assets/images/agree.png" alt="">&nbsp;
		// 						AGREE
		// 						<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png" alt="">
		// 					</div>
	    //        			</div>
		// 			</div>
		// 			<div>
		// 				<div id="deskDonutchartDisAgree">
	               
	    //        			</div>
	    //        			<div class="donutchartDisAgreeNumber" style="color: #C30100">${disAgreeCount}</div>
	    //        			<div>
	    //        				<div class="disagree row disagreeClick" data-value="disagree">
		// 						<img src="${site_url}assets/images/disagree.png" alt="">&nbsp;
		// 						DISAGREE
		// 						<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
		// 					</div>
	    //        			</div>
		// 			</div>
		// 			<div>
		// 				<div id="deskDonutchartSkipped">
	               
	    //        			</div>
	    //        			<div class="donutchartSkippedNumber" style="color: #AAAAAA">${skipedCount}</div>
	    //        			<div>
	    //        				<div class="skip row skipClick" data-value="skip" data-name="end_gerry">
		// 						<img src="${site_url}assets/images/skip.png" alt="">&nbsp;
		// 						SKIP
		// 						<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
		// 					</div>
	    //        			</div>
		// 			</div>
		// 		</div>
		// 	</div>
		// `);

	    // showChart("AGREE", agreeCount, 10 - agreeCount, "deskDonutchartAgree","#2CA107");
	    // showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "deskDonutchartDisAgree","#C30100");
	    // showChart("SKIPPED", skipedCount, 10 - skipedCount, "deskDonutchartSkipped", "#AAAAAA");

	}

})