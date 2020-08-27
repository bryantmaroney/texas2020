jQuery(function ($) {
    answers = {}; 
    let firstTime = true;
    $(document).on('click', '.mobileAgree', function(event) {
    		
    		$(this).addClass('mobileAgreeHover');
    		$(this).parents('.mobileVoteButtons').find('.mobileDisagree').removeClass('mobileDisAgreeHover selectedAnswer');
    		$(this).parents('.item').find('.mobSkipShare').find('.mobileSkip').removeClass('mobileSkipHover selectedAnswer');
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
            sendVote($(this).data('name'),"agree", true);
    		Dots.userVote('agree', $(this).data('name'));
    })
    $(document).on('click', '.mobileDisagree', function(event) {
        $(this).addClass('mobileDisAgreeHover');
		$(this).parents('.mobileVoteButtons').find('.mobileAgree').removeClass('mobileAgreeHover selectedAnswer');
		$(this).parents('.item').find('.mobSkipShare').find('.mobileSkip').removeClass('mobileSkipHover selectedAnswer');
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
		Dots.userVote('disagree', $(this).data('name'));
    })    
    $(document).on('click', '.mobileSkip', function(event) {

        $(this).addClass('mobileSkipHover');
		$(this).parents('.item').find('.mobileVoteButtons').find('.mobileAgree').removeClass('mobileAgreeHover selectedAnswer');
		$(this).parents('.item').find('.mobileVoteButtons').find('.mobileDisagree').removeClass('mobileDisAgreeHover selectedAnswer');
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
	    sendVote($(this).data('name'),"skip", true);
		Dots.userVote('skip', $(this).data('name'));
    })
    
    function sendVote(question, answer, isSkip=false){
		var owl = $('#carusel-mobile');
        owl.owlCarousel();
		
        $.ajax({
			url: site_url + 'user/vote',
			type: 'POST',
			data: {answer, question},
			success:function(r){
				!isSkip && owl.trigger('next.owl.carousel')
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
	}
})