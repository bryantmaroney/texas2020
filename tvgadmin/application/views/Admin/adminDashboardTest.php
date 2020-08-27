<?php $this->load->view('Admin/adminHeader'); ?>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/charts_loader.js"></script>
<script type="text/javascript">
    var site_url = "<?php echo(base_url()) ?>";
    function officeChanger(office) {
		$.ajax({
	        	url: site_url + 'admin/circl/chart',
	        	dataType: 'json',	
	        	type: 'POST',
	        	data: {office: office},
	        	success:function(response) {
	        		$('.chartArrow').html(response.candidatesCount);
                    if (response.insert_item) {
    	        		let lastActivity = response.insert_item.created_at.split(' ')[0].split('-');
    	        		$('.lastActivity').html(`${lastActivity[1]}/${lastActivity[2]}/${lastActivity[0]}`);	
                    }
                    else {
                        $('.lastActivity').html('No Recent Activity')
                    }
	        	}
	    })
	}
    //Circle chart
    function showChart(office,percent,all) {

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
              pieSliceText: 'none',
              slices: {
                0: { color: '#2D79FA' },
                1: { color: '#203C73' }
              },
            };
            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
          }
    }
    showChart("All", 0, 75);
    officeChanger("All");
</script>

<div class="charts">
    <div class="left_chart">
        <div class="chartTopSection">
            <div>Monthly Responses</div>
            <div class="chartDrDowns">
                <div>
                    <p>
                        <span class="yearShow"></span>
                        <span><img src="<?php echo base_url() ?>assets/images/arrow_bot.png" alt=""></span>
                    </p>
                </div>
            </div>

        </div>
        <div class="chart_back">
            <p class="chartNumbers">
                <span class="monthScale criticalSpan">5</span>
                <span class="monthScale">4</span>
                <span class="monthScale">3</span>
                <span class="monthScale">2</span>
                <span class="monthScale">1</span>
                <span class="monthScale">0</span>
            </p>
       <!--      <div>
                <div data-toggle="tooltip"  month="jan" class="procent" style="height: 16%"></div>
                <span class="mounth">Jan</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="fed" class="procent" style="height: 16%"></div>                
                <span class="mounth">Fed</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="mar" class="procent" style="height: 16%"></div>
                <span class="mounth">Mar</span>
            </div> -->
            <div>
                <div data-toggle="tooltip"  month="apr" class="procent" style="height: 16%"></div>
                <span class="mounth">Apr</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="may" class="procent" style="height: 16%"></div>
                <span class="mounth">May</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="jun" class="procent" style="height: 16%"></div>
                <span class="mounth">Jun</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="jul" class="procent" style="height: 16%"></div>
                <span class="mounth">Jul</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="aug" class="procent" style="height: 16%"></div>
                <span class="mounth">Aug</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="sep" class="procent" style="height: 16%"></div>
                <span class="mounth">Sep</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="oct" class="procent" style="height: 16%"></div>
                <span class="mounth">Oct</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="nov" class="procent" style="height: 16%"></div>
                <span class="mounth">Nov</span>
            </div>
            <div>
                <div data-toggle="tooltip"  month="dec" class="procent" style="height: 16%"></div>
                <span class="mounth">Dec</span>
            </div>
        </div>
    </div>
    <div class="mapChart">
        <div class="mapHeader">
            <div class="traffic">
                <span>Traffic</span>
            </div>
            <div class="mapCandVot">
                <span class="lightSelectede candLight">CANDIDATES</span>
                <span class="votLight">VOTERS</span>
                <span class="canIssuesTally">CANDIDATE ISSUES TALLY</span>
            </div>
        </div>
        <div class="mapcontainer" style="width: 100%; height: 100%">
            <!-- <div class="map">
              
            </div> -->
            <div class="canIssuesTally_section">
                <div class="canIssuesTitleSection">
                    <div class="canIssuesHeaders canIssuesw40"><p class="issue_title">Issues</p></div>
                    <div class="canIssuesHeaders canIssuesw20"><p class="agree_title">Agree</p></div>
                    <div class="canIssuesHeaders canIssuesw20"><p class="disagree_title">Disagree</p></div>
                    <div class="canIssuesHeaders canIssuesw20"><p class="neither_title">Neither</p></div>
                </div>

                <?php foreach ($issues_tally_data as $key => $tally) { ?>
                    <?php $issue_number = $key + 1; ?>
                    <div class="canIssues">
                        <div class="can_issue_title canIssuesw40">
                            <p><?php echo $issue_number; ?>. <?php echo $tally['title']; ?></p>
                        </div>
                        <div class="can_issue_agree_score canIssuesw20">
                            <p><?php echo $tally['agree_total'] ?> &frasl; <?php echo $tally['agree_percent'] ?>%</p>
                        </div>
                        <div class="can_issue_disagree_score canIssuesw20">
                            <p><?php echo $tally['disagree_total'] ?> &frasl; <?php echo $tally['disagree_percent'] ?>%</p>
                        </div>
                        <div class="can_issue_neither_score canIssuesw20">
                            <p><?php echo $tally['neither_total'] ?> &frasl; <?php echo $tally['neither_percent'] ?>%</p>
                        </div>
                    </div>
                <?php } ?>

            </div>

            <div class="world">
                <div class="map"></div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </div>
    <div class="rightChart">
        <p class="activeCandidates"><strong>Total Candidates</strong></p>
       <div class="rchContainer">
            <div class="chartArrow"><img src="<?php echo base_url() ?>assets/images/chartArrow.png" alt=""></div>
           <div id="donutchart">
               
           </div>
           <div class="chertRange">
                <span>0%</span>
                <div>
                    <input type="range" min="0" max="100" step="25" value="0" data-rangeslider>
                    <output></output>
                </div>
            </div>
            <div class="activeNumber">
                <div class="lastActivity" >No Recent Activity</div>
                <span>Last Activity</span>
            </div>
       </div>
    
    </div>
    
</div>
<div class="candidateCobtrolContainer">
    <div>
    	<div class="candidates dashSelOption">
    		<button table="candidatesTable">CANDIDATES</button>
    	</div>
    	<div class="voters dashNotSelOption">
    		<button table="votersTable">VOTERS</button>
    	</div>
    </div>
	<!--<div class="testCandidates clearCandidates">FLUSH</div>-->
</div>

<div class="candidatesTable txAdminTables">
    <?php  $this->load->view('Admin/candidatesTable') ?>
</div>

<div class="votersTable txAdminTables">
    <?php  $this->load->view('Admin/votersTable') ?>
</div>

<!--<div class="testCandidatesTable candidatesTable txAdminTables">
    <?php  $this->load->view('Admin/testCandidatesTable'); ?>
</div>-->


<div class="modal fade" id="cleanCandidatesSuccess" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body modalContainer">
                <div class="row" style="padding: 10px 20px 0 10px; display: flex; justify-content: flex-end;">
                    <span class="close_modal"><img src="<?php echo base_url(); ?>assets/images/close-icon.png" style="cursor: pointer;" /></span>
                </div>
                <div class="row qestModalContainer">
                   <div style="width: 100%;font-size: 25px; color: #213D76;padding: 5%;">Submitted Candidates Have Been Cleared</div>             
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modalManuallyNew" id="reSendEmail" style="display: none">
      <div class="manuallyContainerNew">
          <div class="row" style="padding: 1px 15px 0 10px; display: flex; justify-content: flex-end;">
              <span class="close_mannual_modal"><img src="<?php echo base_url(); ?>assets/images/popupClose.png" style="cursor: pointer;" /></span>
          </div>
          <div class="row qestModalContainer">
            <div class="resultImageShow">
              <img src="<?php echo base_url(); ?>assets/images/pupupSuccess.png" alt="">
            </div>
            <div class="messageTitleShow">Thanks!</div>
             <div class="resultMessageShow">Check your email! We have sent a verification link to confirm your email address. Please click it right away so that we can include you in our survey.</div>      
             <div class="resultLogo"><img src="<?php echo base_url(); ?>assets/images/resultLogo.png" alt=""></div>       
          </div>
      </div>
</div>

</body>

<script>
    
    function updateValue(newValue){    
        document.getElementById("rangeValue").innerHTML = newValue + "%";
    }

    var site_url = "<?php echo base_url() ?>"
        
    $('#testDataTable').DataTable({
        pageLength : 5,
        "bLengthChange": false,
        bFilter: false,
        "ordering": false,
        scrollX: true,
        responsive: false,
        "language": {
            "paginate": {
              "previous": "<<",
              "next": ">>"
            },
            "info": "Showing _START_ - _END_ of _TOTAL_ items",
        }

    });
    $('.votersTable').hide();

</script>


<script src="<?php echo base_url(); ?>assets/js/bootstrap-4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
<script src="<?php echo base_url() ?>assets/js/rangeslider.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/rangeslider.js"></script>



<script>
    $('input[type="range"]').rangeslider({

        polyfill: false,
        rangeClass: 'rangeslider',
        disabledClass: 'rangeslider--disabled',
        horizontalClass: 'rangeslider--horizontal',
        verticalClass: 'rangeslider--vertical',
        fillClass: 'rangeslider__fill',
        handleClass: 'rangeslider__handle',
        onInit: function() {
            $('.chertRange span').html("All");
        },
        onSlide: function(position, value) {
        	var office;
            if (value == 0) {
            	$('.chertRange span').html("All");
            	showChart("All", value, 100 - value);
                office = "All"
            }
            else if (value == 25) {
            	$('.chertRange span').html("U.S. Senate");
                showChart("US Senate", value, 100 - value);
                office = "U.S. Senate";
            }
            else if (value == 50) {
            	$('.chertRange span').html("U.S. House");
                showChart("US House", value, 100 - value);
                office = "U.S. House"
            }
            else if (value == 75) {
            	$('.chertRange span').html("T.X. House");
                showChart("TX House", value, 100 - value);
                office = "T.X. House";
            }
            else if (value == 100) {
            	$('.chertRange span').html("T.X. Senate");
                showChart("TX Senate", value, 100 - value);
                office = "T.X. Senate";
            }

           officeChanger(office); 
        },
        onSlideEnd: function(position, value) {}
    });
    
</script>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js" charset="utf-8"></script> -->
<script src="<?php echo base_url() ?>assets/js/jquery.mousewheel.min.js" charset="utf-8"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js" charset="utf-8"></script> -->
<script src="<?php echo base_url() ?>assets/js/raphael.min.js" charset="utf-8"></script>
<!-- <script src="https://rawgit.com/aterrien/jQuery-Knob/master/dist/jquery.knob.min.js" charset="utf-8"></script> -->
<script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.mapael.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/usa_states.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/map.js" charset="utf-8"></script>
<script>
    var submitted_candidates = <?php echo(json_encode($submitted_candidates)) ?>;
    var voters = <?php echo(json_encode($voters)) ?>;
    var admin = <?php echo(json_encode($admin)) ?>;
</script>
</html>
