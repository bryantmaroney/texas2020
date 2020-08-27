<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Texas 2020 | Candidates Survey</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="icon" href="<?php echo site_url() ?>assets/images/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/combined.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
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
   
	</script>

</head>

<body>
	<div class="step3Container">
		
		<div class="stCont">
			<!--<p class="st3Title">Step 2: Please choose <span class="agree">Agree</span> or <span class="disagree">Disagree</span> for each of the reforms</p>-->
			<p class="st3Title">Please choose a response that most closely represents your position on each reform.</p>

			<div class="problemContainer">
				<div class="problemHeader selectedHeader" data-name="end_gerry_answer">
					<p class="problemNumber">
						<span class="number">1</span>
						<span>END GERRYMANDERING</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrTop.png" alt=""></p>
				</div>
				<div class="problemBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/end_gerry.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Every 10 years after a census, our elected officials, in both parties, draw district lines around voters to skew elections in their favor.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>END GERRYMANDERING by establishing a non-partisan, independent redistricting commission without conflicts of interest and making redistricting an open and fair process.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="end_gerry">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="end_gerry">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="end_gerry">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="end_gerry"  data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="vote_by_mail_answer">
					<p class="problemNumber">
						<span class="number">2</span>
						<span>VOTE BY MAIL</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/vote_by_mail.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Current restrictions on absentee voting prevent many Texans from voting. This year an unprecedented number will be affected. Voters should never be forced to choose between their right to vote and their health and the health of others.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>VOTE BY MAIL should be an option available (since we can Register to Vote by mail) to every Texan, not just those that meet specific criteria. Expanding the existing practice will guarantee fair, convenient, and safe elections for everyone.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="vote_by_mail">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="vote_by_mail">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="vote_by_mail">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="vote_by_mail" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="reval_writers_answer">
					<p class="problemNumber">
						<span class="number">3</span>
						<span>REVEAL THE WRITERS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/reval_writers.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Corporations have created “Bill Factories” where they write one bill, then create copies for individual states, which legislators pass while concealing the origins and authorship from the public.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>REVEAL THE WRITERS before bills are brought to a vote. Knowing who will likely benefit from the passage of a law should be transparent to voters and legislators.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="reval_writers">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="reval_writers">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="reval_writers">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="reval_writers" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="modern_election_answer">
					<p class="problemNumber">
						<span class="number">4</span>
						<span>MODERNIZE ELECTIONS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/modern_election.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Malfunctions and vulnerabilities plague our archaic voting systems, leaving Texans with no paper backup and no way to verify the accuracy and security of our vote.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>MODERNIZE ELECTIONS with new standardized voting systems and security-enhanced machines that generate a paper trail. Perform random recounts to verify the integrity of voting systems and our votes.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="modern_election">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="modern_election">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="modern_election">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="modern_election" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>

				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="rank_candidate_answer">
					<p class="problemNumber">
						<span class="number">5</span>
						<span>RANK YOUR CANDIDATES</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/rank_candidate.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Conventional elections create party polarization and leave voters dissatisfied with their choice of candidates and "winners" who didn't receive majority support.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>RANKING YOUR CANDIDATES will reduce party polarization. Giving voters more choices without the "spoiler effect" will promote positive campaigning, increase voter satisfaction, and eliminate costly runoffs as election victories require a majority vote.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="rank_candidate">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="rank_candidate">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="rank_candidate">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="rank_candidate" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="ban_barriers_answer">
					<p class="problemNumber">
						<span class="number">6</span>
						<span>BAN THE BARRIERS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/ban_barriers.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Polling location closures, limited polling options, and restrictive polling legislation create barriers for many Texans, denying them equal access to exercise their right to vote.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>BAN THE BARRIERS that prevent suburban, rural, assisted living and college communities from conveniently voting. Overturn laws like the statewide closure of all temporary polling locations which resulted in unrealistic travel distances and unreasonably long lines for many Texas voters.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="ban_barriers">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="ban_barriers">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="ban_barriers">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="ban_barriers" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="limit_lob_answer">
					<p class="problemNumber">
						<span class="number">7</span>
						<span>LIMIT THE LOBBYISTS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/limit_lob.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Paid lobbyists influence our elected officials with campaign donations, and lucrative job offers after they leave office. In exchange, while in office, politicians pass laws that favor the special interests of lobbyists.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>LIMIT THE LOBBYISTS by prohibiting paid lobbyists from donating to — or fundraising for — incumbents and candidates, and prohibit politicians from accepting paid positions as private sector lobbyists.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="limit_lob">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="limit_lob">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="limit_lob">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="limit_lob" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="reth_reg_answer">
					<p class="problemNumber">
						<span class="number">8</span>
						<span>RETHINK REGISTRATION</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/reth_reg.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Our outdated voter registration system results in errors, inefficiencies and wasted taxpayer dollars that fuel partisan disputes over the integrity of voter rolls.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>RETHINK REGISTRATION by implementing Automatic, Online, and Same Day Registration to ensure that every eligible citizen can register to vote in a convenient, fair, secure, and less costly way.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="reth_reg">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="reth_reg">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="reth_reg">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="reth_reg" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="clean_up_answer">
					<p class="problemNumber">
						<span class="number">9</span>
						<span>CLEAN UP ELECTIONS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/clean_up.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>Candidates need access to deep-pocketed donors to run for office. As a result, those who are elected typically serve those wealthy donors rather than the people they represent.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>CLEAN UP ELECTIONS by adopting small donor programs that would allow for a greater diversity of candidates and more competitive races.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="clean_up">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="clean_up">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="clean_up">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="clean_up" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

			<div class="problemContainer">
				<div class="problemHeader" data-name="tune_in_texas_answer">
					<p class="problemNumber">
						<span class="number" style="padding: 3px">10</span>
						<span>TUNE IN TEXAS</span>
						<img class="selCandImage" style="width:20px;margin-left: 15px;" src="https://soheard.dev/dev/texas-voter-guide/assets/images/coosen.png">
					</p>
					<p><img class="arrowImage" src="<?php echo base_url() ?>assets/images/arrBottom.png" alt=""></p>
				</div>
				<div class="problemBody hiddenBody">
					<div class="problemImage">
						<img src="<?php echo base_url() ?>assets/images/tune_in_texas.png">
					</div>
					<div class="problemTextSection">
						<div>
							<p class="prSol">PROBLEM</p>
							<p>The decades-long decline in public engagement has contributed to a decline in the public's influence over which policies our representatives enact and whose interests are served.</p>
						</div>
						<div>
							<p class="prSol">SOLUTION</p>
							<p>TUNE in TEXAS by creating opportunities to involve citizens in the political process. Programs aimed at informing the public and inviting them to collaborate with their representatives empower constituents and builds trust in our democracy.</p>
						</div>
					</div>
					<div class="buttons">
						<div class="agree row agreeClick" data-value="agree" data-name="tune_in_texas">
							<img src="<?php echo base_url() ?>assets/images/like.png" alt="">&nbsp;
							AGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png" alt="">
						</div>
						<div class="disagree row disagreeClick" data-value="disagree" data-name="tune_in_texas">
							<img src="<?php echo base_url() ?>assets/images/dislike.png" alt="">&nbsp;
							DISAGREE
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<div class="neither row neitherClick" data-value="neither">
							<img src="<?php echo base_url() ?>assets/images/neither.png" alt="">&nbsp;
							NEITHER
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>
						<!--<div class="skip row skipClick" data-value="skip" data-name="tune_in_texas">
							<img src="<?php echo base_url() ?>assets/images/skip.png" alt="">&nbsp;
							SKIP
							<img style="display: none" class="selectedAnswerImage" src="<?php echo base_url() ?>assets/images/selAns.png">
						</div>-->
					</div>
					<p class="feelFree">Feel free to share your thoughts about this issue:</p>
					<div class="commentSection">
						<textarea name="" id=""></textarea>		
					</div>
					<div class="submiteSection">
						<button class="step3Submite" name="tune_in_texas" data-lite-tooltip-position="top" data-lite-tooltip='Please make a selection before <br>submitting. Thank you!'>NEXT</button>
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
<script>
	const site_url = "<?php echo base_url() ?>"
</script>
<script src="<?php echo base_url() ?>assets/js/step3.js"></script>
</html>