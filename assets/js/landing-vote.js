jQuery(function ($) {
    
    answers = {};
    
    let firstTime = true;
    
    $(document).on('click touchstart', '.agree', function(event) {
    		
    		$(this).addClass('agreeHover');
    		$(this).find('.selectedAnswerImage').show();
    		$(this).parents('.buttons').find('.disagree').removeClass('disAgreeHover selectedAnswer').find('.selectedAnswerImage').hide();
    		$(this).parents('.buttons').find('.skip').removeClass('skipHover selectedAnswer').find('.selectedAnswerImage').hide();
    		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();
    		
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
    		
    		sendVote($(this).data('name'),"agree");
    		
    		
    		$('.arrow-right').trigger('click')
        
    })
    
    $(document).on('click touchstart', '.disagree', function(event) {
        
		$(this).addClass('disAgreeHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.agree').removeClass('agreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.skip').removeClass('skipHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();
		
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
		
		sendVote($(this).data('name'),"disagree");
		
		$('.arrow-right').trigger('click')
        
    })
    
    $(document).on('click touchstart', '.skip', function(event) {

		$(this).addClass('skipHover');
		$(this).find('.selectedAnswerImage').show();
		$(this).parents('.buttons').find('.agree').removeClass('agreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.disagree').removeClass('disAgreeHover selectedAnswer').find('.selectedAnswerImage').hide();
		$(this).parents('.buttons').find('.neither').removeClass('neitherHover selectedAnswer').find('.selectedAnswerImage').hide();

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
	    
	    sendVote($(this).data('name'),"skip");
		
		
		$('.arrow-right').trigger('click')
        
    })
    
    function sendVote(question, answer){
        $.ajax({
			url: site_url + 'user/vote',
			type: 'POST',
			data: {answer, question},
			success:function(r){
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
				bgcolor = "#263F76";
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
	    
	    showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
	    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
	    showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");
	    
	    $('.donutchartAgreeNumber').html(agreeCount);
		$('.donutchartDisAgreeNumber').html(disAgreeCount);
		$('.donutchartSkippedNumber').html(skipedCount);
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


	    $(".wrapper").append(`
	    	<div class="charts">
				<div class="resultCharts">
					<div>
						<div id="donutchartAgree">
	               
	           			</div>
	           			<div class="donutchartAgreeNumber" style="color: #2CA107">${agreeCount}</div>
	           			<div>
	           				<div class="agree row agreeClick" data-value="agree">
								<img src="${site_url}assets/images/agree.png" alt="">&nbsp;
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
								<img src="${site_url}assets/images/disagree.png" alt="">&nbsp;
								DISAGREE
								<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
							</div>
	           			</div>
					</div>
					<div>
						<div id="donutchartSkipped">
	               
	           			</div>
	           			<div class="donutchartSkippedNumber" style="color: #AAAAAA">${skipedCount}</div>
	           			<div>
	           				<div class="skip row skipClick" data-value="skip" data-name="end_gerry">
								<img src="${site_url}assets/images/skip.png" alt="">&nbsp;
								SKIP
								<img style="display: none" class="selectedAnswerImage" src="${site_url}assets/images/selAns.png">
							</div>
	           			</div>
					</div>
				</div>
			</div>
		`);

	    showChart("AGREE", agreeCount, 10 - agreeCount, "donutchartAgree","#2CA107");
	    showChart("DISAGREE", disAgreeCount, 10 - disAgreeCount, "donutchartDisAgree","#C30100");
	    showChart("SKIPPED", skipedCount, 10 - skipedCount, "donutchartSkipped", "#AAAAAA");

	}

})