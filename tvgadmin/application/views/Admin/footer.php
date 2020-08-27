</body>

<script>
    
    function updateValue(newValue){    
        document.getElementById("rangeValue").innerHTML = newValue + "%";
    }

    var site_url = "<?php echo base_url() ?>";


            
	    $('#dataTable').DataTable({
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
            },
        });


        $('#votersDataTable').DataTable({
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
        $('#blog_list').DataTable({
            pageLength : 5,
            "bLengthChange": false,
            bFilter: false,
            "ordering": false,
            "columnDefs": [
                { "width": "20%", "targets": 0 }
            ],
            "language": {
                "paginate": {
                    "previous": "<<",
                    "next": ">>"
                },
                "info": "Showing _START_ - _END_ of _TOTAL_ items",
            },
            "dom": 'rt<"bottom"><"left"pi><"clear">'
        });
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
            $('.chertRange span').html("US Senate");
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
                office = "Texas State House";
            }
            else if (value == 100) {
            	$('.chertRange span').html("T.X. Senate");
                showChart("TX Senate", value, 100 - value);
                office = "Texas State Senate";
            }

           officeChanger(office); 
        },
        onSlideEnd: function(position, value) {}
    });
    
</script>

<script>
    jQuery(document).ready(function($) {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<script>
    var submitted_candidates = <?php echo(json_encode($submitted_candidates)) ?>;
    var voters = <?php echo(json_encode($voters)) ?>;
    var admin = <?php echo(json_encode($admin)) ?>;
</script>
</html>